<?php
/*
If statement  :- If statement executes statements when one condition is true.
syntax :- 
    for one statement you can omit curly braces.
    1) if(condition)
       statement1;

    for multiple statement you have to give curly brackets.
    2) if(condition)
    {
        statement1;
        statement2;
        statement3;
        ------------
        -------------
    }
*/
$day = 'monday';
if ($day == 'monday')
    echo 'Holiday';

$num = 35;
if ($num < 35)
    echo 'You are failed';
