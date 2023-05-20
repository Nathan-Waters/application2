<?php

/*  328/application2/model/validation.php
    Contains functions to validate data
    in the diner app
    This is part of the MODEL
*/

function validMeal($meal)
{
    // If meal is not empty
    // and is in the array of
    // valid meals, return true
    // Otherwise, return false
    /*
    if (!empty($meal) && in_array($meal, getMeals())) {
        return true;
    }
    else {
        return false;
    }
    */
    return (!empty($meal) && in_array($meal, getMeals()));
    //return true;
}

/* Add a validFood() function */
function validFood($food)
{
    $food = trim($food);
    return (strlen($food) >= 2 && !ctype_digit($food));
}