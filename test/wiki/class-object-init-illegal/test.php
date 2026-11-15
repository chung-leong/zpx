<?php

try {
    $object = new Example(123, 456);
} catch (Exception $e) {
    echo $e;
}
