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

// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();

// Define a default route
$f3->route('GET /', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET /home', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /info', function($f3) {
    var_dump($_SESSION);
    var_dump($_GET);

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        var_dump($_POST);
        var_dump($_GET);

        $fName = $_POST['fName'];
        $f3->set('SESSION.fName', $fName);

        $lName = $_POST['lName'];
        $f3->set('SESSION.lName', $lName);

        $email = $_POST['email'];
        $f3->set('SESSION.email', $email);

        $state = $_POST['state'];
        $f3->set('SESSION.state', $state);

        $phone = $_POST['phone'];
        $f3->set('SESSION.phone', $phone);

        $f3->reroute('exp');
    }

    $view = new Template();
    echo $view->render('views/info.html');
});

$f3->route('GET|POST /exp', function($f3) {
    var_dump($_SESSION);
    var_dump($_POST);
    // Display a view page
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $bio = $_POST['bio'];
        $f3->set('SESSION.bio', $bio);

        $github = $_POST['github'];
        $f3->set('SESSION.github', $github);

        $exp = $_POST['exp'];
        $f3->set('SESSION.exp', $exp);

        $relocate = $_POST['relocate'];
        $f3->set('SESSION.relocate', $relocate);

        $f3->reroute('jobs');
    }
    $view = new Template();
    echo $view->render('views/exp.html');
});

$f3->route('GET|POST /jobs', function($f3) {
//    var_dump($_SESSION);
//    var_dump($_POST);
    // Display a view page

    if($_SERVER['REQUEST_METHOD'] == "POST"){
            var_dump($_POST);
//        $softwareJobs = $_POST['softwareJobs'];


        $softwareJobs = implode(", ",$_POST['softwareJobs']);
        $f3->set('SESSION.softwareJobs', $softwareJobs);

        $specificJobs = implode(", ",$_POST['specificJobs']);
        $f3->set('SESSION.specificJobs', $specificJobs);

        $f3->reroute('summary');
    }
    $view = new Template();
    echo $view->render('views/jobs.html');
});

$f3->route('GET /summary', function() {
    var_dump($_SESSION['fName']);
    var_dump($_POST);
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();

?>