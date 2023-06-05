<?php
/**
 * Applicant class that represents a new applicant.
 * @author Nathan Waters
 * @date May 24, 2023
 * @version v1.0
 */

class Applicant
{
    private $_fName;
    private $_lName;
    private $_email;
    private $_state;
    private $_phone;

    private $_bio;
    private $_github;
    private $_exp;
    private $_relocate;
//
//    private $_devJobs;
//    private $_industryJobs;


    /**
     * default constructor
     */
     function __construct()
     {
         $this->_fName = "";
         $this->_lName = "";
         $this->_email = "";
         $this->_state = "";
         $this->_phone = "";

         $this->_bio = "";
         $this->_github = "";
         $this->_exp = "";
         $this->_relocate = "";
     }

    /**
     * First Name Getter/Setter
     */
    public function setFName ($fName)
    {
        $this->_fName = $fName;
    }
     public function getFName()
     {
         return $this->_fName;
     }

    /**
     * Last Name Getter/Setter
     */
    public function setLName ($lName)
    {
        $this->_lName = $lName;
    }
    public function getLName()
    {
        return $this->_lName;
    }

    /**
     * email Getter/Setter
     */
    public function setEmail ($email)
    {
        $this->_email = $email;
    }
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * state Getter/Setter
     */
    public function setState ($state)
    {
        $this->_state = $state;
    }
    public function getState()
    {
        return $this->_state;
    }

    /**
     * phone Getter/Setter
     */
    public function setPhone ($phone)
    {
        $this->_phone = $phone;
    }
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * bio Getter/Setter
     */
    public function setBio ($bio)
    {
        $this->_bio = $bio;
    }
    public function getBio()
    {
        return $this->_bio;
    }

    /**
     * github Getter/Setter
     */
    public function setGithub ($github)
    {
        $this->_github = $github;
    }
    public function getGithub()
    {
        return $this->_github;
    }

    /**
     * exp Getter/Setter
     */
    public function setExp ($exp)
    {
        $this->_exp = $exp;
    }
    public function getExp()
    {
        return $this->_exp;
    }

    /**
     * relocate Getter/Setter
     */
    public function setRelocate ($relocate)
    {
        $this->_relocate = $relocate;
    }
    public function getRelocate()
    {
        return $this->_relocate;
    }
//    /**
//     * devJobs Getter/Setter
//     */
//    public function setDevJobs ($devJobs)
//    {
//        $this->_devJobs = $devJobs;
//    }
//    public function getDevJobs()
//    {
//        return $this->_devJobs;
//    }
//
//    /**
//     * industryJobs Getter/Setter
//     */
//    public function setIndustryJobs ($industryJobs)
//    {
//        $this->_industryJobs = $industryJobs;
//    }
//    public function getIndustryJobs()
//    {
//        return $this->_industryJobs;
//    }
}

//test code
//$newApp = new Applicant();
//$newApp->setFName("sam");
//echo $newApp->getFName();