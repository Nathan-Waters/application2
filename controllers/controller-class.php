<?php

class Controller
{
    //F3 object
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        //echo '<h1>Testing!</h1>';

        // Display a view page
        $view = new Template();
        echo $view->render('views/home.html');
    }


    function info()
    {

        $fName = "";
        $lName = "";
        $email = "";
        $phone = "";

        //check for POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            //set post data and store it in the sessions array


            if (isset($_POST["true"])){
                $newApp = new Applicant_SubscribedToList();
                $this->_f3->set('SESSION.mailingList', true);
            } else{
                $newApp = new Applicant();
                $this->_f3->set('SESSION.mailingList', false);
            }


            //first name validation
            if (isset($_POST['fName'])){
                $fName = $_POST['fName'];
            }
            if(validFName($fName)){
                $newApp->setFName($fName);
            } else {
                $this->_f3->set('errors["fName"]', 'Invalid First Name');
            }

            //last name validation
            if (isset($_POST['lName'])){
                $lName = $_POST['lName'];
            }
            if (validLName($lName)){
                $newApp->setLName($lName);
            } else{
                $this->_f3->set('errors["lName"]', 'Invalid Last Name');
            }

            //email validation
            if (isset($_POST['email'])){
                $email = $_POST['email'];
            }
            if(validEmail($email)){
                $newApp->setEmail($email);
            } else {
                $this->_f3->set('errors["email"]', 'Invalid Email');
            }

            $state = $_POST['state'];
            $newApp->setState($state);

            //phone validation
            if (isset($_POST['phone'])){
                $phone = $_POST['phone'];
            }
            if(validPhone($phone)){
                $newApp->setPhone($phone);
            } else {
                $this->_f3->set('errors["phone"]', 'Invalid Phone Number');
            }

            if(empty($this->_f3->get('errors'))){
                //add order object to session array
                $this->_f3->set('SESSION.app', $newApp);
                $this->_f3->reroute('exp');
            }
        }

        $view = new Template();
        echo $view->render('views/info.html');
    }

    function exp()
    {
        $newApp = $this->_f3->get('SESSION.app');

        $bio = "";
        $github = "";
        $exp = "";

        //check for POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            //set post data and store it in the sessions array
            $bio = $_POST['bio'];
            $newApp->setBio($bio);

            if (isset($_POST['github'])){
                $github = $_POST['github'];
            }
            if(validGithub($github)){
                $newApp->setGithub($github);
            } else {
                $this->_f3->set('errors["github"]', 'Invalid Github URL');
            }

            if (isset($_POST['exp'])){
                $exp = $_POST['exp'];
            }
            if(validExp($exp)){
                $newApp->setExp($exp);
            } else {
                $this->_f3->set('errors["exp"]', 'Must Select Value');
            }

            $relocate = $_POST['relocate'];
            $newApp->setRelocate($relocate);
            $this->_f3->set('SESSION.relocate', $relocate);

            if(empty($this->_f3->get('errors'))){
                $this->_f3->set('SESSION.app', $newApp);
                $mailing = $this->_f3->get('SESSION.mailingList');
                if($mailing){
                    $this->_f3->reroute('jobs');
                } else {
                    $this->_f3->reroute('summary');
                }

            }
        }
        $view = new Template();
        echo $view->render('views/exp.html');
    }

    function jobs()
    {
        $newApp = $this->_f3->get('SESSION.app');

        $devJobs = "";

        //check for POST
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            var_dump($_SESSION);
            //set post data and store it in the sessions array

            //if dev jobs have been selected
            if (!empty($_POST['devJobs'])){

                $devJobs = $_POST['devJobs'];
                if(validSoftwareJobs($devJobs)){
                    $devJobs = implode(", ",$devJobs);
                    $newApp->setDevJobs($devJobs);
                } else {
                    $this->_f3->set('errors["devJobs"]', 'Go away!');
                }
            }

            if (!empty($_POST['industryJobs'])){

                $industryJobs = $_POST['industryJobs'];
                if(validIndustryJobs($industryJobs)){
                    $industryJobs = implode(", ",$industryJobs);
                    $newApp->setIndustryJobs($industryJobs);
                } else {
                    $this->_f3->set('errors["industryJobs"]', 'Go away!');
                }
            }

            if(empty($this->_f3->get('errors'))){
                $this->_f3->set('SESSION.app', $newApp);
                $this->_f3->reroute('summary');
            }
        }

        $this->_f3->set('devJobs', DataLayer::getDevJobs());
        $this->_f3->set('industryJobs', DataLayer::getIndustryJobs());

        $view = new Template();
        echo $view->render('views/jobs.html');
    }


} // end class
