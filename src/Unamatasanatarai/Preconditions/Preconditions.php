<?php

namespace Unamatasanatarai\Preconditions;

use Unamatasanatarai\Preconditions\Exception\IllegalArgumentException;
use Unamatasanatarai\Preconditions\Exception\IllegalStateException;
use Unamatasanatarai\Preconditions\Exception\IndexOutOfBoundsException;
use Unamatasanatarai\Preconditions\Exception\NullPointerException;

class Preconditions
{

    static private $instance;


    public static function getInstance()
    {
        if ( empty(self::$instance) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    public function checkArgument($expression, $message = null, ...$messageParams)
    {
        if ( ! $expression ) {
            throw new IllegalArgumentException($this->getErrorMessage($message, $messageParams));
        }

        return $expression;
    }


    private function getErrorMessage($message = null, $messageParams)
    {
        $errorMessage = $message;
        if ( ! empty($messageParams) ) {
            $errorMessage = sprintf($message, ...$messageParams);
        }

        return $errorMessage;
    }


    public function checkState($expression, $message = null, ...$messageParams)
    {
        if ( ! $expression ) {
            throw new IllegalStateException($this->getErrorMessage($message, $messageParams));
        }

        return $expression;
    }


    public function checkNotNull($reference, $message = null, ...$messageParams)
    {
        if ( is_null($reference) ) {
            throw new NullPointerException($this->getErrorMessage($message, $messageParams));
        }

        return $reference;
    }


    public function checkElementIndex($index, $size, $desc = "Index")
    {
        if ( $index < 0 || $index >= $size ) {
            throw new IndexOutOfBoundsException($this->getBadElementIndex($index, $size, $desc));
        }

        return $index;
    }


    protected function getBadElementIndex($index, $size, $desc)
    {
        return $this->getBadValueMessage($index, $size, $desc, "%s (%s) must be less than size (%s)");
    }


    protected function getBadValueMessage($index, $size, $desc, $message)
    {
        if ( $index < 0 ) {
            return sprintf("%s (%s) must not be negative", $desc, $index);
        }
        if ( $size < 0 ) {
            throw new IllegalArgumentException("Negative size: " . $size);
        }

        return sprintf($message, $desc, $index, $size);

    }


    public function checkPositionIndex($index, $size, $desc = "Position")
    {
        if ( $index < 0 || $index > $size ) {
            throw new IndexOutOfBoundsException($this->getBadPositionIndex($index, $size, $desc));
        }

        return $index;
    }


    protected function getBadPositionIndex($index, $size, $desc)
    {
        return $this->getBadValueMessage($index, $size, $desc, "%s (%s) must not be greater than size (%s)");
    }


    public function checkPositionIndexes($start, $end, $size)
    {
        if ( $start < 0 || $end < $start || $end > $size ) {
            throw new IndexOutOfBoundsException($this->getBadPositionIndexes($start, $end, $size));
        }
        return true;
    }


    protected function getBadPositionIndexes($start, $end, $size)
    {
        if ( $start < 0 || $start > $size ) {
            return $this->getBadPositionIndex($start, $size, "Start Index");
        }
        if ( $end < 0 || $end > $size ) {
            return $this->getBadPositionIndex($end, $size, "End Index");
        }

        return sprintf("End Index (%s) must not be less than start index (%s)", $end, $start);
    }

}
