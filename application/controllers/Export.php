<?php
class Export extends CI_Controller {
public function index() {
//$json = file_get_contents('php://input');
//$data = json_decode($json);
//$html = $data->data;
$html='<html>ddddd</html>';
//$this->load->library('excel');
$tmpfile = '/cdn/export/'.time().'.html';
file_put_contents($tmpfile, $html);$rand=rand();
	
       echo $rand;
}
}
?>