<?php

if (ini_set('ini_restricted.integer', 1234) === false) {
    echo "could not set integer\n";
}
if (ini_set('ini_restricted.string', "Hello world") === false) {
    echo "could not set string\n";
}
