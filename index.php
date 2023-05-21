<?php

/*
 * Nathan Waters
 * 5/10/2023
 * 328/application2/index.php
 * Controller for application2 project
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validation.php');

// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// added to be able to go back to the home page
$f3->route('GET /home', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /info', function($f3) {

    // Display a view page

    $fName = "";
    $lName = "";
    $email = "";
    $phone = "";

    //check for POST
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //set post data and store it in the sessions array

        //first name validation
        if (isset($_POST['fName'])){
            $fName = $_POST['fName'];
        }
        if(validFName($fName)){
            $f3->set('SESSION.fName', $fName);
        } else {
            $f3->set('errors["fName"]', 'Invalid First Name');
        }

        //last name validation
        if (isset($_POST['lName'])){
            $lName = $_POST['lName'];
        }
        if (validLName($lName)){
            $f3->set('SESSION.lName', $lName);
        } else{
            $f3->set('errors["lName"]', 'Invalid Last Name');
        }

        //email validation
        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(validEmail($email)){
            $f3->set('SESSION.email', $email);
        } else {
            $f3->set('errors["email"]', 'Invalid Email');
        }

        $state = $_POST['state'];
        $f3->set('SESSION.state', $state);

        //phone validation
        if (isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        if(validPhone($phone)){
            $f3->set('SESSION.phone', $phone);
        } else {
            $f3->set('errors["phone"]', 'Invalid Phone Number');
        }

        if(empty($f3->get('errors'))){
            $f3->reroute('exp');
        }
    }

    $view = new Template();
    echo $view->render('views/info.html');
});

$f3->route('GET|POST /exp', function($f3) {

    // Display a view page

    $github = "";
    $exp = "";

    //check for POST
    if($_SERVER['REQUEST_METHOD'] == "POST"){

        //set post data and store it in the sessions array
        $bio = $_POST['bio'];
        $f3->set('SESSION.bio', $bio);

        if (isset($_POST['github'])){
            $github = $_POST['github'];
        }
        if(validGithub($github)){
            $f3->set('SESSION.github', $github);
        } else {
            $f3->set('errors["github"]', 'Invalid Github URL');
        }

        if (isset($_POST['exp'])){
            $exp = $_POST['exp'];
        }
        if(validExp($exp)){
            $f3->set('SESSION.exp', $exp);
        } else {
            $f3->set('errors["exp"]', 'Must Select Value');
        }



        $relocate = $_POST['relocate'];
        $f3->set('SESSION.relocate', $relocate);

        if(empty($f3->get('errors'))){
            $f3->reroute('jobs');
        }
    }
    $view = new Template();
    echo $view->render('views/exp.html');
});

$f3->route('GET|POST /jobs', function($f3) {
    // Display a view page

    //check for POST
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        var_dump($_POST);
        //set post data and store it in the sessions array
        $devJobs = implode(", ",$_POST['devJobs']);
        $f3->set('SESSION.devJobs', $devJobs);

        $industryJobs = implode(", ",$_POST['industryJobs']);
        $f3->set('SESSION.industryJobs', $industryJobs);

        $f3->reroute('summary');
    }

    $f3->set('devJobs', getDevJobs());
    $f3->set('industryJobs', getIndustryJobs());

    $view = new Template();
    echo $view->render('views/jobs.html');
});

$f3->route('GET /summary', function() {
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();

?>