<?php

ini_set('ini_enum.speed', Speed::fastest->value);
ini_set('ini_enum.flags', Flags::is_good | Flags::is_cheap);

show_ini_entries();
