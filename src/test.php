<?php
require "../vendor/autoload.php";

$tests = array(
    new \Test\PHP56Test(),
    new \Test\PHP55Test(),
    new \Test\PHP54Test()
);

foreach($tests as $test)
{
    echo "=== ".get_class($test)." ====".PHP_EOL;

    $test->runTest();
}