<?php

/*  328/application2/model/validation.php
    Contains functions to validate data
    in the diner app
    This is part of the MODEL
*/

function validFName($fName){
    return(!empty($fName) && ctype_alpha($fName));
}

function validLName($lName){
    return(!empty($lName) && ctype_alpha($lName));
}

function validEmail($email){
    return (filter_var($email, FILTER_VALIDATE_EMAIL));
}

function validPhone($phone){
    return is_numeric($phone) && strlen($phone) == 10;
}

function validGithub($github){
    return (filter_var($github, FILTER_VALIDATE_URL));
}

function validExp($exp){
    return (!empty($exp));
}

function validSoftwareJobs($sdevJobs){
    $validSdevJobs = DataLayer::getDevJobs();

    foreach ($sdevJobs as $sdevJob) {
        if (!in_array($sdevJob, $validSdevJobs)) {
            return false;
        }
    }
    return true;
}

function validIndustryJobs($industryJobs){
    $validIndustryJobs = DataLayer::getIndustryJobs();

    foreach ($industryJobs as $industryJob) {
        if (!in_array($industryJob, $validIndustryJobs)) {
            return false;
        }
    }
    return true;
}