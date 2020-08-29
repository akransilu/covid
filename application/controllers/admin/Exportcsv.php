<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exportcsv extends CIF_Controller {
 public $module = 'exportcsv';
    public function __construct() {
        parent::__construct();
        $this->permission();
    }
    public function exportdetails(){
        $data = array();        
        $where = $_COOKIE['filter'];
        
        $sql="select fname, lname, company, email, phoneNo, traveledRecently, returnedFrom, returnedDate, covidContact, symptoms, risk, createdDate
         from user_details where " .$where ." order by risk DESC, createdDate DESC";
        $data=$this->db->query($sql)->result_array();
        
        $recordsTotal = count($data);
        $recordsFiltered = $recordsTotal;

        header("Content-type: application/csv");
        header("Content-Disposition: attachment; filename=\"covid-form-details".".csv\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        $fp = fopen('php://output', 'w');

        //Adding header
        fputcsv($fp, array('First Name', 'Last Name', 'Company', 'Email', 'Phone No', 'Traveled Recently'
            , 'Returned From', 'Returned Date', 'Exposed to Covid', 'Symptoms', 'Risk Level', 'Submitted At'));

        foreach ($data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        exit;
    }
}
?>