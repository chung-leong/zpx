<?php

show_options("hello");
show_options("hello", param_a: true);
show_options("hello", param_b: 123, param_c: 'ugly' );
show_options("hello", [ 'param_b' => 123, 'param_c' => 'ugly' ]);
