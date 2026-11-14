<?php

use somewhere\out\there\MyClass;
use somewhere\out\there\MyClass\Child;
use somewhere\out\there\MyClass\Child\Pet;

print_r(new MyClass);
print_r(new Child);
print_r(Pet::cat);


var_dump(MyClass::Child);
var_dump(MyClass::Child::Pet);

print_r(new (MyClass::Child));
print_r(MyClass::Child::Pet::dog);
