<?php
/**/
$age = 260;
if ($age < 5 && $age > 0)
    echo 'You are baby';
else if ($age >= 5 && $age <= 10)
    echo 'You are child';
elseif ($age > 10 && $age < 18)
    echo 'You are teenager';
else if ($age >= 18 && $age <= 25)
    echo 'You are adult';
else if ($age > 25 && $age <= 100)
    echo 'You are elder person';
else
    echo 'Age is not valid';
