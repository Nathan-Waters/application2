<?php

/*  328/application2/model/data-layer.php
    Returns data for the application2 app
    This is part of the MODEL
    Eventually, this will read/write the DB
*/
class DataLayer
{

    static function getDevJobs(){
        $devJobs = array("JavaScript", "PHP", "Java", "Python", "HTML", "CSS", "ReactJS", "NodeJS");
        return $devJobs;
    }

    static function getIndustryJobs(){
        $industryJobs = array("SaaS", "Health tech", "Ag tech", "HR tech", "Industrial tech", "Cybersecurity");
        return $industryJobs;
    }
}
