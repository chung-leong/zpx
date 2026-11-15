<?php

use somewhere\out\there\ThatClass;
use somewhere\out\there\ThatClass\Child;
use somewhere\out\there\ThatClass\Child\Pet;

print_r(new ThatClass);
print_r(new Child);
print_r(Pet::cat);

var_dump(ThatClass::Child);
var_dump(ThatClass::Child::Pet);

print_r(new (ThatClass::Child));
print_r(ThatClass::Child::Pet::dog);
