<?php

try {
    echo factorial(100), "\n";
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}

