# php-preconditions
think: Exception Driven Design 

A port(?) of guava preconditions in PHP

https://github.com/google/guava/wiki/PreconditionsExplained


## example
should throw an error if $parameter is null
```
<?php

preconditions()->checkNotNull($parameter);
```

