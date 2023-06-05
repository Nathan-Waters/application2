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
//require_once('model/data-layer.php');
require_once('model/validation.php');

//$testApp = new Applicant();
$dataLayer = new DataLayer();
// Create an F3 (Fat-Free Framework) object
$f3 = Base::instance();
$con = new Controller($f3);

// Define a default route
$f3->route('GET /', function() {

    // Display a view page
    $view = new Template();
    echo $view->render('views/home.html');
});

// added to be able to go back to the home page
$f3->route('GET /home', function() {

    // Display a view page

    $GLOBALS['con']->home();
});

$f3->route('GET|POST /info', function() {

    // Display a view page

    $GLOBALS['con']->info();

//    $fName = "";
//    $lName = "";
//    $email = "";
//    $phone = "";
//
//    //check for POST
//    if($_SERVER['REQUEST_METHOD'] == "POST"){
//
//        //set post data and store it in the sessions array
//
//
//        if (isset($_POST["true"])){
//           $newApp = new Applicant_SubscribedToList();
//            $f3->set('SESSION.mailingList', true);
//        } else{
//            $newApp = new Applicant();
//            $f3->set('SESSION.mailingList', false);
//        }
//
//
//        //first name validation
//        if (isset($_POST['fName'])){
//            $fName = $_POST['fName'];
//        }
//        if(validFName($fName)){
//            $newApp->setFName($fName);
//        } else {
//            $f3->set('errors["fName"]', 'Invalid First Name');
//        }
//
//        //last name validation
//        if (isset($_POST['lName'])){
//            $lName = $_POST['lName'];
//        }
//        if (validLName($lName)){
//            $newApp->setLName($lName);
//        } else{
//            $f3->set('errors["lName"]', 'Invalid Last Name');
//        }
//
//        //email validation
//        if (isset($_POST['email'])){
//            $email = $_POST['email'];
//        }
//        if(validEmail($email)){
//            $newApp->setEmail($email);
//        } else {
//            $f3->set('errors["email"]', 'Invalid Email');
//        }
//
//        $state = $_POST['state'];
//        $newApp->setState($state);
//
//        //phone validation
//        if (isset($_POST['phone'])){
//            $phone = $_POST['phone'];
//        }
//        if(validPhone($phone)){
//            $newApp->setPhone($phone);
//        } else {
//            $f3->set('errors["phone"]', 'Invalid Phone Number');
//        }
//
//        if(empty($f3->get('errors'))){
//            //add order object to session array
//            $f3->set('SESSION.app', $newApp);
//            $f3->reroute('exp');
//        }
//    }
//
//    $view = new Template();
//    echo $view->render('views/info.html');
});

$f3->route('GET|POST /exp', function($f3) {

    // Display a view page
    $GLOBALS['con']->exp();

//    $newApp = $f3->get('SESSION.app');
//
//    $bio = "";
//    $github = "";
//    $exp = "";
//
//    //check for POST
//    if($_SERVER['REQUEST_METHOD'] == "POST"){
//        //set post data and store it in the sessions array
//        $bio = $_POST['bio'];
//        $newApp->setBio($bio);
//
//        if (isset($_POST['github'])){
//            $github = $_POST['github'];
//        }
//        if(validGithub($github)){
//            $newApp->setGithub($github);
//        } else {
//            $f3->set('errors["github"]', 'Invalid Github URL');
//        }
//
//        if (isset($_POST['exp'])){
//            $exp = $_POST['exp'];
//        }
//        if(validExp($exp)){
//            $newApp->setExp($exp);
//        } else {
//            $f3->set('errors["exp"]', 'Must Select Value');
//        }
//
//        $relocate = $_POST['relocate'];
//        $newApp->setRelocate($relocate);
//        $f3->set('SESSION.relocate', $relocate);
//
//        if(empty($f3->get('errors'))){
//            $f3->set('SESSION.app', $newApp);
//            $mailing = $f3->get('SESSION.mailingList');
//            if($mailing){
//                $f3->reroute('jobs');
//            } else {
//                $f3->reroute('summary');
//            }
//
//        }
//    }
//    $view = new Template();
//    echo $view->render('views/exp.html');
});

$f3->route('GET|POST /jobs', function($f3) {
    // Display a view page
    $GLOBALS['con']->jobs();

//    $newApp = $f3->get('SESSION.app');
//
//    $devJobs = "";
//
//    //check for POST
//    if($_SERVER['REQUEST_METHOD'] == "POST"){
//        var_dump($_SESSION);
//        //set post data and store it in the sessions array
//
//        //if dev jobs have been selected
//        if (!empty($_POST['devJobs'])){
//
//            $devJobs = $_POST['devJobs'];
//            if(validSoftwareJobs($devJobs)){
//                $devJobs = implode(", ",$devJobs);
//                $newApp->setDevJobs($devJobs);
//            } else {
//                $f3->set('errors["devJobs"]', 'Go away!');
//            }
//        }
//
//        if (!empty($_POST['industryJobs'])){
//
//            $industryJobs = $_POST['industryJobs'];
//            if(validIndustryJobs($industryJobs)){
//                $industryJobs = implode(", ",$industryJobs);
//                $newApp->setIndustryJobs($industryJobs);
//            } else {
//                $f3->set('errors["industryJobs"]', 'Go away!');
//            }
//        }
//
//        if(empty($f3->get('errors'))){
//            $f3->set('SESSION.app', $newApp);
//            $f3->reroute('summary');
//        }
//    }
//
//    $f3->set('devJobs', DataLayer::getDevJobs());
//    $f3->set('industryJobs', DataLayer::getIndustryJobs());
//
//    $view = new Template();
//    echo $view->render('views/jobs.html');
});

$f3->route('GET /summary', function() {
    $view = new Template();
    echo $view->render('views/summary.html');
});

// Run Fat-Free
$f3->run();

?>