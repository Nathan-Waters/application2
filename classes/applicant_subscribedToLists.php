<?php
/**
 * Applicant_SubscribedToLists class that extends applicant.
 * @author Nathan Waters
 * @date May 24, 2023
 * @version v1.0
 */

class Applicant_SubscribedToList extends Applicant
{

    private $_devJobs;
    private $_industryJobs;

    function __construct()
    {
        parent::__construct();
        $this->_devJobs = "";
        $this->_industryJobs = "";
    }

    /**
     * devJobs Getter/Setter
     */
    public function setDevJobs ($devJobs)
    {
        $this->_devJobs = $devJobs;
    }
    public function getDevJobs()
    {
        return $this->_devJobs;
    }

    /**
     * industryJobs Getter/Setter
     */
    public function setIndustryJobs ($industryJobs)
    {
        $this->_industryJobs = $industryJobs;
    }
    public function getIndustryJobs()
    {
        return $this->_industryJobs;
    }
}