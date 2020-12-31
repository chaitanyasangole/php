<?php

/*

Comparison operators are used to compare two values.

  operator  | Meaning
---------------------------------------
    ==      |  Equal to
---------------------------------------
    !=      |  Not equal to
---------------------------------------
    >       |  greater than
---------------------------------------
    <       |  less than
---------------------------------------
    >=      | greater than or equal to
---------------------------------------
    <=      | less than or equal to
---------------------------------------

*/
$num1 = 50;
$num2 = 50;

if ($num1 == $num2)
    echo $num1 . ' is equal to ' . $num2 . '<br>';
else
    echo $num1 . ' is not equal to ' . $num2 . '<br>';

if ($num1 != $num2)
    echo $num1 . ' is not equal to ' . $num2 . '<br>';
else
    echo $num1 . ' is equal to ' . $num2 . '<br>';

if ($num1 < $num2)
    echo $num1 . ' is less than ' . $num2 . '<br>';
else
    echo $num1 . ' is not less than ' . $num2 . '<br>';

if ($num1 > $num2)
    echo $num1 . ' is greater than ' . $num2 . '<br>';
else
    echo $num1 . ' is not greater than ' . $num2 . '<br>';

if ($num1 <= $num2)
    echo $num1 . ' is less than or equal to ' . $num2 . '<br>';
else
    echo $num1 . ' is not less than nor equal to ' . $num2 . '<br>';

if ($num1 >= $num2)
    echo $num1 . ' is greater than or equal to ' . $num2 . '<br>';
else
    echo $num1 . ' is not greater than nor equal to ' . $num2 . '<br>';
