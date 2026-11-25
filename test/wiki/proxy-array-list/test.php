<?php

$object = new Example();
$list = $object->list;
debug_zval_dump($list);
$list[0] = "Hello";
$list = null;
