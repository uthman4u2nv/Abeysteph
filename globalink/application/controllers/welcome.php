<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        parent::__construct();
        $this->load->model('site');
        $this->load->library('form_validation');
        session_start();
    }
	/*** NEW ADDITIONS **/
	
    public function deleteExp($id) {
		$refNo=$this->site->getAny('expenses',$id,"expensesID","expRefNo");
        $delete = $this->site->deleteExp($id);
        if ($delete) {
			//delete from floatexpenses
			$deletefloatexp=$this->site->deletefloatexp($refNo);
            $username = $_SESSION['username'];
            $action = $_SESSION['username'] . " deleted expenses";
            $date = date("Y-m-d");
            $time = date('h:i:s');
            //$this->logAction($username, $action, $date, $time, $up_status = 1);
            redirect('welcome/expenses/2', 'refresh');
        }
    }
	public function deleteFloat($id) {
		$refNo=$this->site->getAny('floats',$id,"floatID","floatRefNo");
        $delete = $this->site->deleteFloat($id);
        if ($delete) {
			//delete from floatexpenses
			$deletefloatexp=$this->site->deletefloatexp($refNo);
            $username = $_SESSION['username'];
            $action = $_SESSION['username'] . " deleted floats";
            $date = date("Y-m-d");
            $time = date('h:i:s');
            //$this->logAction($username, $action, $date, $time, $up_status = 1);
            redirect('welcome/myfloat/2', 'refresh');
        }
    }
	  public function addExpenses() {
		  $expensesName = $this->input->post('expensesName');
        $jobNo = $this->input->post('jobNo');
        $expensesDesc = $this->input->post('expensesDesc');
        $expensesAmt = $this->input->post('expensesAmt');
        $expensesDate = $this->input->post('date');
        $expensesBy = $_SESSION['adminID'];
		$expRefNo=$this->randomString(6);
		$addedDate=date('Y-m-d');
        $insert = $this->site->addExpensesx($expensesName, $expensesDesc, $expensesAmt, $expensesDate, $expensesBy,$jobNo,$expRefNo,$addedDate);
        if ($insert) {
			//insert into floats table
			$insertfloat=$this->site->insertexpfloat($expRefNo,$expensesDate,$expensesName,$expensesDesc,$expensesAmt,"",$expensesBy);
            $username = $_SESSION['username'];
            $action = $_SESSION['username'] . " added expenses";
            $date = date("Y-m-d");
            $time = date('h:i:s');
            //$this->logAction($username, $action, $date, $time, $up_status = 1);
            redirect('welcome/expenses/1', 'refresh');
        }
    }
	public function addFloat(){
		$floatNo=$this->input->post('floatNo');
		$floatRefNo=$this->randomString(6);
		$floatName=$this->input->post('floatName');
		$floatDesc=$this->input->post('floatDesc');
		$floatAmt=$this->input->post('floatAmt');
		$floatDate=$this->input->post('date');
		$floatBy = $_SESSION['adminID'];
		$addedDate=date('Y-m-d');
		$insert=$this->site->addFloat($floatNo,$floatRefNo,$floatName,$floatDesc,$floatAmt,$floatDate,$floatBy,$addedDate);
		if($insert){
			//insert into floats table
			$insertfloat=$this->site->insertexpfloat($floatRefNo,$floatDate,$floatName,$floatDesc,"",$floatAmt,$floatBy);
            $username = $_SESSION['username'];
            $action = $_SESSION['username'] . " added floats";
            $date = date("Y-m-d");
            $time = date('h:i:s');
            //$this->logAction($username, $action, $date, $time, $up_status = 1);
            redirect('welcome/myfloat/1', 'refresh');
		}
	}

    public function expenses($msg = NULL) {
        //echo $_SESSION['user_id'];
        if (!empty($msg)) {
            $data['msg'] = $msg;
        }
        $date = date('Y-m-d');
        $data['expenses'] = $this->site->getExpenses($date, $_SESSION['adminID']);
        //$this->load->view('headerSalesPerson');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('expenses', $data);
		$this->load->view('footer');
    }
	public function myfloat($msg=NULL){
		if (!empty($msg)) {
            $data['msg'] = $msg;
        }
        $date = date('Y-m-d');
        $data['floats'] = $this->site->getFloats($date, $_SESSION['adminID']);
        //$this->load->view('headerSalesPerson');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('floats', $data);
		$this->load->view('footer');
	}
	public function floatexp(){
		$search=$this->input->post('search');
		if($search){
			$from=$this->input->post('from');
			$to=$this->input->post('to');
			$data['date']=" From:".$from." To:".$to;
			$data['floats'] = $this->site->getMyFloats2($from,$to);
		}else{
			$date = date('Y-m-d');
		$data['date']="for: ".$date;
		
        $data['floats'] = $this->site->getMyFloats($date);     
		}		
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('floatexp', $data);
		$this->load->view('footer');
	}
	public function expensesbrk(){
		$search=$this->input->post('search');
		if($search){
			$jobOrderNo=$this->input->post('orderNo');
			$data['jobs']=$this->site->getjobsbreakdown($jobOrderNo);
		}else{
			$data['jobs']="";  
		}		
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('expensesbrk', $data);
		$this->load->view('footer');
	}
	public function reports(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		//echo $from;
		if(empty($from) && empty($to)){
		$data['largeformat']=$this->site->getjobbytype($id='1',$date=date('Y-m-d'));
		$data['genprinting']=$this->site->getjobbytype2($id='3',$date=date('Y-m-d'));
		$data['di']=$this->site->getjobbytype2($id='4',$date=date('Y-m-d'));
		$data['dicount']=$this->site->getDICountSummary($date=date('Y-m-d'));
		}else{
			$data['search']="From:".$from."-".$to; 
		$data['largeformat']=$this->site->getjobbytypesearch($id='1',$from,$to);
		$data['genprinting']=$this->site->getjobbytype2search($id='3',$from,$to);
		$data['di']=$this->site->getjobbytype2search($id='4',$from,$to);
		$data['dicount']=$this->site->getDICountSummary2($from,$to);
		}
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('reports', $data);
		$this->load->view('footer');
	}
	public function addDICount($msg=null){
		if(!empty($msg)&& $msg==1){
			$data['msg']="Successfully added";
		}elseif(!empty($msg) && $msg==2){
			$data['msg']="Successfully added";
		}
		$data['products']=$this->site->getProductType($id=4);
		$data['dicounts']=$this->site->getAllDICount();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('diCount', $data);
		$this->load->view('footer');
	}
	public function insertDICount(){
		$qty=$this->input->post('qty');
		$type=$this->input->post('type');
		$date=$this->input->post('date');
		$insert=$this->site->insertDICount($qty,$type,$date);
		if($insert){
			redirect('welcome/addDICount/1','refresh');
		}
	}
	public function deletedicount($id){
		$delete=$this->site->deletDICount($id);
		if($delete){
			echo "Deleted";
			//redirect('welcome/addDICount/2','refresh');
		}
	}
	public function addmachinecount(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		//echo $from;
		if(empty($from) && empty($to)){
		$data['jobs']=$this->site->getjobsformachinecount($date=date('Y-m-d'));
		
		}else{
			$data['search']="From:".$from."-".$to; 
		$data['jobs']=$this->site->getjobsformachinecountsearch($from,$to);
		
		}
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('machinecount', $data);
		$this->load->view('footer');
	}
	public function updatestatus($id){
		$update=$this->site->updatestatus($id);
		if($update){
			
			echo "Job Added to machine count";
			echo anchor('welcome/addmachinecount','Go back');
			//header("Refresh:2; url=welcome/addmachinecount");
		}else{
			echo mysql_error();
		}
	}

    public function searchExpenses($msg = NULL) {
        //echo $_SESSION['user_id'];
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $data['from'] = $from;
        $data['to'] = $to;
        $date = date('Y-m-d');
        $username = $_SESSION['username'];
        $action = $_SESSION['username'] . " searched expenses from $from to $to";
        $date = date("Y-m-d");
        $time = date('h:i:s');
		//echo $from." ".$to;
        //$this->logAction($username, $action, $date, $time, $up_status = 1);
        $data['expenses'] = $this->site->getExpenses2($from, $to, $_SESSION['adminID']);
        $this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('searchExpenses', $data);
		$this->load->view('footer');
    }
	public function searchFloats($msg = NULL) {
        //echo $_SESSION['user_id'];
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $data['from'] = $from;
        $data['to'] = $to;
        $date = date('Y-m-d');
        $username = $_SESSION['username'];
        $action = $_SESSION['username'] . " searched expenses from $from to $to";
        $date = date("Y-m-d");
        $time = date('h:i:s');
		//echo $from." ".$to;
        //$this->logAction($username, $action, $date, $time, $up_status = 1);
        $data['floats'] = $this->site->getFloats2($from, $to, $_SESSION['adminID']);
        $this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
        $this->load->view('searchFloats', $data);
		$this->load->view('footer');
    }
	/** END NEW ADDITIONS **/

    public function index() {

        
        $this->login2();
    }
	

    public function updateMyProfile() {
        $surname=$this->input->post('surname');
		$othernames=$this->input->post('othernames');
		$sex=$this->input->post('sex');
		$username=$this->input->post('username');
		
		
		$password=md5($this->input->post('password'));
		//$status=$this->input->post('status');
		$id=$this->input->post('id');
		$check=$this->site->checkUsername($_SESSION['adminID'],$username);
		if($check){
			echo "Username exists, choose another";
			header("refresh: 2; url=".base_url()."welcome/profile");
		}else{
		
		//insert
		$update=$this->site->updateMyProfile($surname,$othernames,$sex,$username,$password,$id);
		if($update){
			
			redirect('welcome/profile/1','refresh');
		}
		}
		
    }


   

    
    public function displayResult($transID,$regNo){
        $data['transID']=$transID;
        $data['regNo']=$regNo;
        $this->load->view('displayResult',$data);
        
    }
    

    //displays payment page
    public function fees() {
        $type = 1;
        $grade = $_SESSION['grade'];
        $data['surname'] = $_SESSION['surname'];
        $data['othernames'] = $_SESSION['othernames'];
        $data['email'] = $_SESSION['email'];
        $data['phone'] = $_SESSION['phone'];
        $data['trxn'] = $_SESSION['trnxId'];
        $date = date('Y-m-d');
        if ($date <= '2014-10-10') {
            $data['fees'] = $this->site->fees(1);
        } else {
            $data['fees'] = $this->site->fees(2);
        }
        $this->load->view('header');
        $this->load->view('fees', $data);
        $this->load->view('footer');
    }

    public function register() {
        $this->load->view('headerReg');
        $this->load->view('register');
        $this->load->view('footer');
    }

    public function checkEmail($email) {
        $data['email'] = $this->site->checkEmail($email);
        $this->load->view('emailCheck', $data);
    }

    public function enrollmentProcedure() {
        $this->load->view('procedures');
    }

    public function checkReport() {
        $data['transaction'] = $this->site->report($_SESSION['id']);
        // $this->load->view('header2');
        $this->load->view('checkReport', $data);
        //$this->load->view('footer');
    }

    public function report() {
        $data['transaction'] = $this->site->report($_SESSION['id']);
        $this->load->view('header2');
        $this->load->view('report', $data);
        $this->load->view('footer');
    }

    public function searchReport() {
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $data['transaction'] = $this->site->reportSearch($_SESSION['id'], $from, $to);
        $this->load->view('header2');
        $this->load->view('report', $data);
        $this->load->view('footer');
    }

    public function randNum($randStringLength) {
        $timestring = microtime();
        $secondsSinceEpoch = (integer) substr($timestring, strrpos($timestring, " "), 100);
        $microseconds = (double) $timestring;
        $seed = mt_rand(0, 1000000000) + 10000000 * $microseconds + $secondsSinceEpoch;
        mt_srand($seed);
        $randstring = "";
        for ($i = 0; $i < $randStringLength; $i++) {
            $randstring .= mt_rand(0, 9);
        }
        return($randstring);
    }

    //generates random numbers for captcha
    public function randomNum() {
        $_SESSION['rand'] = '';
        $num = rand(1000000, 9000000);
        $_SESSION['rand'] = $num;
        $data['num'] = $num;
        $this->load->view('random', $data);
    }

    public function confirmReg() {
        $this->load->library('form_validation');
        $compName = $this->input->post('comp-name');
        $compAddress = $this->input->post('comp-address');
        $compEmail = $this->input->post('comp-email');
        $compPhone = $this->input->post('comp-phone');
        $contact = $this->input->post('contact');
        $compPassword = $this->input->post('comp-password');
        $confPassword = $this->input->post('conf-password');
        $captcha = $this->input->post('captcha');
        $confCaptcha = $this->input->post('conf-captcha');

        $this->form_validation->set_rules('comp-name', 'Enter Company Name', 'required');
        $this->form_validation->set_rules('comp-address', 'Enter Company Address', 'required');
        $this->form_validation->set_rules('comp-email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('comp-phone', 'Company Phone', 'required|numeric');
        $this->form_validation->set_rules('contact', 'Contact Person', 'required');
        $this->form_validation->set_rules('comp-password', 'Password', 'required|matches[conf-password]');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|matches[confirm-captcha]');

        if ($this->form_validation->run() == FALSE) {
            $this->register();
        } else {
            $data['compName'] = $compName;
            $data['compAddress'] = $compAddress;
            $data['compEmail'] = $compEmail;
            $data['compPhone'] = $compPhone;
            $data['contact'] = $contact;
            $data['password'] = $compPassword;
            $this->load->view('header');
            $this->load->view('confirmDetails', $data);
            $this->load->view('footer');
        }
    }

    public function insertRegDetails() {
        $compName = $this->input->post('comp-name');
        $compAddress = $this->input->post('comp-address');
        $compEmail = $this->input->post('comp-email');
        $compPhone = $this->input->post('comp-phone');
        $contact = $this->input->post('contact');
        $date = date('Y-m-d');
        $compPassword = md5($this->input->post('comp-password'));
        $insert = $this->site->createProfile($compName, $compAddress, $compEmail, $compPhone, $contact, $compPassword, $date);
        if ($insert) {
            //send mail with details
            $data['type'] = '1';
            $data['msg'] = 'Profile Created Successfully,login to continue';
            $data['url'] = 'index';
            $this->load->view('header');
            $this->load->view('result', $data);
            $this->load->view('footer');
        } else {
            $data['type'] = '0';
            $data['msg'] = 'Error creating profile';
            $data['url'] = 'index';
            $this->load->view('header');
            $this->load->view('result', $data);
            $this->load->view('footer');
        }
    }

    //updates profile
    public function updateRegDetails() {
        $compName = $this->input->post('comp-name');
        $compAddress = $this->input->post('comp-address');
        $compEmail = $this->input->post('comp-email');
        $compPhone = $this->input->post('comp-phone');
        $contact = $this->input->post('contact');
        $date = date('Y-m-d');
        $compId = $_SESSION['id'];
        $compPassword = md5($this->input->post('comp-password'));
        $update = $this->site->updateProfile($compName, $compAddress, $compEmail, $compPhone, $contact, $compPassword, $compId);
        if ($update) {
            //send mail with details
            $data['type'] = '1';
            $data['msg'] = 'Profile Successfully Updated';
            $data['url'] = 'profile';
            $this->load->view('result', $data);
        } else {
            $data['type'] = '0';
            $data['msg'] = 'Error updating profile';
            $data['url'] = 'profile';
            $this->load->view('result', $data);
        }
    }

    //displays checkout
    public function checkOut() {
        if (!empty($_SESSION['transid'])) {
            $transId = $_SESSION['transid'];
        } else {
            $transid = '0000';
        }
        if (!empty($_SESSION['id'])) {
            $compId = $_SESSION['id'];
        } else {
            $compId = 'o90bw2';
        }
        /* $this->load->library('pagination');
          $config['base_url'] = site_url('home/checkOut');
          $config['total_rows'] = $this->site->checkoutCount($transId,$compId);
          $config['per_page'] = 15;
          $config["uri_segment"] = 3;
          $data['sno']=$config['per_page'];
          $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; */

        //$data['chart']=$this->home_model->dispChart($config['per_page'],$page);
        //$this->pagination->initialize($config);
        //$data['pages']=$this->pagination->create_linkss
        $data['amount'] = $this->site->dispTotalAmount($transId, $compId);
        $this->load->view('header2');
        $this->load->view('checkout', $data);
        $this->load->view('footer');
    }

    

   



    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
		//echo $username;
        //$school=$this->input->post('school');
        //echo $coopNo;
        //$pass=md5($password);
		//$this->load->model('site');
        $check = $this->site->authenticate22($username, $password);
        $confirm = $this->site->checkMyLogin22($username, $password);

        if ($confirm >= 1) {
            foreach ($check as $row) {
                $_SESSION['adminID'] = $row['id'];
                $_SESSION['name'] = $row['surname']." ".$row['othernames'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['user_type'];
				$_SESSION['dept']=$row['dept'];
				$_SESSION['store']=$row['office'];
				$this->switchRole($row['user_type']);
            }
            
        } else {
            $data['msg'] = 'Wrong Username or Password';
            $data['url'] = 'index';
            //$this->load->view('header');
            $this->load->view('loginFail', $data);
            $this->load->view('footer');
        }
    }
	/**AUDITOR **/
	public function auditor(){
		$data['dept']=$this->site->getAll('depts');
		$this->load->view('headerProfileAuditor');
		$this->load->view('leftNav');
		$this->load->view('auditor',$data);
		$this->load->view('footer');
	}
	public function searchJobs(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$dept=$this->input->post('dept');
		$data['from']=$from;
		$data['to']=$to;
		$data['deptName']=$this->site->getAny('depts',$dept,"id","name");
		$data['result']=$this->site->searchJob($from,$to,$dept);
		$this->load->view('headerProfileAuditor');
		$this->load->view('leftNav');
		$this->load->view('auditorSearch',$data);
		$this->load->view('footer');
	}
	public function auditorEdit($order_no,$msg){
		if(!empty($msg)){
			$data['msg']='Job updated';
		}
		$data['job']=$this->site->auditorGetJob($order_no);
		$this->load->view('headerProfileAuditor');
		$this->load->view('leftNav');
		$this->load->view('jobDetails',$data);
		$this->load->view('footer');
	}
	public function auditorUpdate(){
		$difference=$this->input->post('difference');
		$order_no=$this->input->post('order_no');
		$remark=$this->input->post('remark');
		
		$update=$this->site->auditorUpdate($difference,$remark,$order_no);
		if($update){
			redirect('welcome/auditorEdit/'.$order_no."/1",'refresh');
		}
	}
	/** END AUDITOR **/
	/** CUSTOMER CARE **/
	public function customer(){
		$_SESSION['custName']="";
			$_SESSION['custPhone']="";
			$_SESSION['enq']="";
			$_SESSION['enqNo']="";
		$data['enquiries']=$this->site->loadEnquiries($date=date('Y-m-d'));
		$this->load->view('headerProfileCustomer');
		$this->load->view('leftNav');
		$this->load->view('customerCare',$data);
		$this->load->view('footer');
		
	}
	public function viewEnquiry($enqNo){
		$data['enquiries']=$this->site->retrieveEnq($enqNo);
		$this->load->view('headerProfileCustomer');
		$this->load->view('leftNav');
		$this->load->view('viewEnq',$data);
		$this->load->view('footer');
	}
	public function addEnq($msg=NULL){
		if(!empty($msg) && $msg==1){
			$data['msg']='Enquiry Added';
		}elseif(!empty($msg) && $msg==2){
			$data['msg']='Enquiry deleted';
		}
		else{
			$data['msg']='';
		}
		$data['operator']=$this->site->getOperatorzz();
		$this->load->view('headerProfileCustomer');
		$this->load->view('leftNav');
		$this->load->view('addEnq',$data);
		$this->load->view('footer');
	}
	public function insertEnq(){
		$enqNo=$this->randomString(7);
		$name=$this->input->post('name');
		$phone=$this->input->post('phone');
		$item=$this->input->post('item');
		//$amount=$this->input->post('amount');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$amount=$qty*$price;
		$date=date('Y-m-d');
		$entered_by=$_SESSION['adminID'];
		$insert=$this->site->insertEnqTmpxy($enqNo,$name,$phone,$item,$amount,$date,$entered_by,$qty,$price);
		if($insert){
			$_SESSION['custName']=$name;
			$_SESSION['custPhone']=$phone;
			$_SESSION['enq']=$this->site->retrieveEnqTmp($enqNo);
			$_SESSION['enqNo']=$enqNo;
			redirect('welcome/addEnq/1','refresh');
			
		}
	}
	public function insertEnq2(){
		$enqNo=$_SESSION['enqNo'];
		$name=$this->site->getAny('enquiries_tmp',$enqNo,"enqNo","enqName");
		$phone=$this->site->getAny('enquiries_tmp',$enqNo,"enqNo","enqPhone");
		$item=$this->input->post('item');
		//$amount=$this->input->post('amount');
		$qty=$this->input->post('qty');
		$price=$this->input->post('price');
		$amount=$qty*$price;
		$date=date('Y-m-d');
		$entered_by=$_SESSION['adminID'];
		$insert=$this->site->insertEnqTmpxy($enqNo,$name,$phone,$item,$amount,$date,$entered_by,$qty,$price);
		if($insert){
			$_SESSION['enq']="";
			$_SESSION['enq']=$this->site->retrieveEnqTmp($enqNo);
			
			redirect('welcome/addEnq/1','refresh');
			
		}
	}
	public function enterEnq(){
		$enqNo=$this->input->post('enqNo');
		$operator=$this->input->post('operator');
		$enquiries=$this->site->retrieveEnqTmp($enqNo);
		foreach($enquiries as $row){
			$name=$row['enqName'];
			$phone=$row['enqPhone'];
			$item=$row['enqItem'];
			$amount=$row['enqAmount'];
			$date=$row['enqDate'];
			$entered_by=$row['enteredby'];
			$enqQty=$row['enqQty'];
			$enqPrice=$row['enqPrice'];
			$insert=$this->site->enterEnqxy16($enqNo,$name,$phone,$item,$amount,$date,$entered_by,$enqQty,$enqPrice,$operator);
		}
		if($insert){
			//Send Message
			$message="Thank you for making an enquiry from us,call 08170000006 for more enquiries";
			$msg="An enquiry for ".$item." made, amount given was".$amount;
			$phone2="08067346328";
			$this->site->logSMS($phone,'777',$date,$message);
			$this->site->logSMS($phone2,'778',$date,$msg);
			redirect('welcome/printEnq/'.$enqNo,'refresh');
		}
	}
	public function deleteEnq(){
		$enqNo=$this->input->post('enqNo');
		$delete=$this->site->deleteEnq($enqNo);
		if($delete){
			redirect('welcome/addEnq/2','refresh');
		}
	}
	public function printEnq($enqNo){
		$_SESSION['custName']="";
			$_SESSION['custPhone']="";
			$_SESSION['enq']="";
			$_SESSION['enqNo']="";
			$data['enquiries']=$this->site->retrieveEnqTmp($enqNo);
			$this->load->view('printEnq',$data);
	}
	/** END CUSTOMER CARE **/
	/**ACCOUNTANT & SUPER ADMIN**/
	public function managelargeformatinventory(){
		$data['largeformatstaff']=$this->site->getlargeformatstaff();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('managelfinv',$data);
		$this->load->view('footer');
		
	}
	public function addstock($id,$msg=null){
	if(!empty($msg)){
		$data['msg']="Stock successfully added";
	}
		$data['staff']=$this->site->getStaffDetails($id);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('addstock',$data);
		$this->load->view('footer');
	}
	public function insertstaffstock(){
		$id=$this->input->post('id');
		$qty=$this->input->post('qty');
		
		//get the stock balance
		$oldbalance=$this->site->getAny("admin",$id,"id","stockbalance");
		//add new stock balance
		$newbalance=$oldbalance+$qty;
		//update stock balance for staff
		$update=$this->site->updatestockbalance($id,$newbalance);
		//insert into stock history
		$date=date("Y-m-d");
		$insert=$this->site->insertstockhistory($id,$qty,$date);
		if($insert && $update){
			redirect('welcome/addstock/'.$id."/1",'refresh');
		}
	}
	public function stockhistory($id){
		$data['staff']=$this->site->getStaffDetails($id);
		$data['stock']=$this->site->staffstockDetails($id);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('stockhistory',$data);
		$this->load->view('footer');
	}
	public function machineoperator(){
		$adminID= $_SESSION['adminID'];
		$data['StockBalance']=$this->site->getAny('admin',$adminID,'id','stockbalance');
		$data['StockHistory']=$this->site->getMyStockHistory($adminID);
		$this->load->view('headerProfileMachine');
		$this->load->view('leftNav');
		$this->load->view('machineoperator',$data);
		$this->load->view('footer');
	}
	public function largeformatmanager(){
		$data['jobs']=$this->site->getlargeformatjobsx();
		$data['stockhistory']=$this->site->getStockHistoryAssigned();
		$this->load->view('headerProfileLargeFormat');
		$this->load->view('leftNav');
		$this->load->view('largeformat',$data);
		$this->load->view('footer');
	}
	public function assignjob($id,$order_no,$msg=null){
		$data['largeformatstaff']=$this->site->getlargeformatstaff();
		$data['jobdetails']=$this->site->getjobdetailsx($id);
		$data['id']=$id;
		$this->load->view('headerProfileLargeFormat');
		$this->load->view('leftNav');
		$this->load->view('assignjob',$data);
		$this->load->view('footer');
	}
	public function insertassignjob(){
		$assignedTo=$this->input->post('assignedTo');
		$id=$this->input->post('id');
		$size=$this->input->post('size');
		$order_no=$this->input->post('order_no');
		$date=date("Y-m-d");
		//check if the size can go into the balance
		$oldbalance2=$this->site->getAny("admin",$assignedTo,"id","stockbalance");
		//echo $oldbalance."Old Balance";
		if($size > $oldbalance2){
			echo "Operator does not have enough material to print";
			die();
			
		}else{
			//check if the job has been assigned before
			$check=$this->site->CheckAssignedJob($assignedTo,$id,$order_no);
			if($check){
				//
				$obalance=$this->site->getAny("admin",$assignedTo,"id","stockbalance");
		
		$nbalance=0;
		
		
		
				$In=$this->site->getAny("stockhistory",$check,"stockID","In");
				if($In){
					//minus
					$nbalance=$obalance-$In;
				}
				
				$Out=$this->site->getAny("stockhistory",$check,"stockID","Out");
				if($Out){
					//add
					$nbalance=$obalance+$Out;
				}
				$update=$this->site->updatestockbalance($assignedTo,$nbalance);
				//delete the records from the stock history
				$this->site->deleteMyStockHistory($check);
			}
		$oldbalance=$this->site->getAny("admin",$assignedTo,"id","stockbalance");
		//add new stock balance
		$newbalance=$oldbalance-$size;
		//update stock balance for staff
		$update=$this->site->updatestockbalance($assignedTo,$newbalance);
		//insert into stock history
		
		$insert=$this->site->insertstockhistory2($assignedTo,$size,$date,$order_no,$id);	//
		}
		if($insert){
			echo "Job Assigned";
		}
	}
	public function home(){
		$data['trans']=$this->site->retrieveTransaction(date('Y-m-d'));
		$data['cashier']=$this->site->retrieveStaffSales($id=3,$date=date('Y-m-d'));
		$data['bf']=$this->site->retrieveStaffSales($id=5,$date=date('Y-m-d'));
		$data['dept']=$this->site->getAll('depts');
		$data['bfManagerEntry']=$this->site->getBFManagerEntry($date=date('Y-m-d'));
		$data['expenses']=$this->site->spoolExpenses($date=date('Y-m-d'));
		$data['loadOtherOfficeSales']=$this->site->loadOtherOfficeSales($date=date('Y-m-d'));
		
		$data['cashStaff']=$this->site->getCashier();
		$data['operator']=$this->site->getOperatorzz();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}
	
	public function printAllDailyJobOrder(){
		$data['trans']=$this->site->retrieveTransaction(date('Y-m-d'));
		$this->load->view('printAllTransOrder',$data);
		
	}
	public function searchJOrder(){
		
		$order_no=$this->input->post('order_no');
		$date=date('Y-m-d');
		$data['trans']=$this->site->getTrans22($order_no);
		$data['depts']=$this->site->getAll('depts');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('processTrans2',$data);
		$this->load->view('footer');
	
	}
	public function addNewStaff($msg=NULL){
		if(!empty($msg)){
			$data['msg']='Staff Successfully Added';
		}
		$data['usertype']=$this->site->getAll('usertype');
		$data['depts']=$this->site->getAll('depts');
		$data['stores']=$this->site->getAll('stores');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('addNewStaff',$data);
		$this->load->view('footer');
		
	}
	public function editStaff($id,$msg=NULL){
		if(!empty($msg)){
			$data['msg']='Staff records Updated Successfully';
		}
		$data['staff']=$this->site->getStaff($id);
		$data['usertype']=$this->site->getAll('usertype');
		$data['depts']=$this->site->getAll('depts');
		$data['stores']=$this->site->getAll('stores');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('editStaff',$data);
		$this->load->view('footer');
	}
	public function payrollStaff(){
		
		$data['staff']=$this->site->getActiveStaff('staff');
		
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('payrollStaff',$data);
		$this->load->view('footer');
	}
	public function viewPayslip($month,$year){
		$data['payslip']=$this->site->generatePayslip($month,$year);
		$data['depts']=$this->site->getAll('departments');
		$data['staff']=$this->site->getActiveStaff();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('payslips',$data);
		$this->load->view('footer');
	}
	public function viewPaySlip22($staffID){
		$data['staff']=$this->site->getStaff2($staffID);
		$data['staffPayslip']=$this->site->staffPaySlip($staffID);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('viewPayslip',$data);
		$this->load->view('footer');
	}
	public function printPaySlipStaff($staffID,$month,$year){
		$data['staff']=$this->site->getStaff2($staffID);
		$data['payslip']=$this->site->getStaffPayslip($staffID,$month,$year);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('PayslipStaff',$data);
		$this->load->view('footer');
	}
	public function addNewPayrollStaff($msg=NULL){
		if(!empty($msg)){
			$data['msg']='Staff Created Successfully';
		}
		$data['depts']=$this->site->getAll('departments');
		$data['bank']=$this->site->getAll('bank');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('addPayrollStaff',$data);
		$this->load->view('footer');
	}
	public function viewPayrollStaff($id){
		$data['staff']=$this->site->getStaff2($id);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('viewPayrollStaff',$data);
		$this->load->view('footer');
	}
	public function editPayrollStaff($id,$msg=NULL){
		if(!empty($msg)){
			$data['msg']="Staff Updated";
		}
		$data['depts']=$this->site->getAll('departments');
		$data['staff']=$this->site->getStaff2($id);
		
		$data['bank']=$this->site->getAll('bank');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('editPayrollStaff',$data);
		$this->load->view('footer');
	}
	public function insertPayrollStaff(){
		$name=$this->input->post('name');
		$dob=$this->input->post('dob');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$sex=$this->input->post('sex');
		$address=$this->input->post('address');
		$salary=$this->input->post('salary');
		$status=1;
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$dept=$this->input->post('dept');
		//echo "dept".$dept;
		$bank=$this->input->post('bank');
		$accountName=$this->input->post('accountName');
		$accountNo=$this->input->post('accountNo');
		
		$insert=$this->site->insertPayrollStaff($name,$dob,$phone,$email,$sex,$address,$salary,$status,$username,$password,$bank,$accountName,$accountNo,$dept);
		if($insert){
			redirect('welcome/addNewPayrollStaff/1','refresh');
		}else{
			echo mysql_error();
		}
	}
	public function updatePayrollStaff(){
		$name=$this->input->post('name');
		$dob=$this->input->post('dob');
		$phone=$this->input->post('phone');
		$email=$this->input->post('email');
		$sex=$this->input->post('sex');
		$address=$this->input->post('address');
		$salary=$this->input->post('salary');
		$status=1;
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$dept=$this->input->post('dept');
		$bank=$this->input->post('bank');
		$accountName=$this->input->post('accountName');
		$accountNo=$this->input->post('accountNo');
		$id=$this->input->post('staffID');
		$status=$this->input->post('status');
		
		$update=$this->site->updatePayrollStaff($id,$name,$dob,$phone,$email,$sex,$address,$salary,$status,$username,$password,$bank,$accountName,$accountNo,$status,$dept);
		if($update){
			redirect('welcome/editPayrollStaff/'.$id,'/','refresh');
		}
	}
	public function viewDeductions($staffID){
		$data['staff']=$this->site->getStaff2($staffID);
		$data['recurrent']=$this->site->getRecurrentDeductions($staffID);
		$data['deductionss']=$this->site->getDeduction($staffID);
	//print_r($this->site->getDeduction($staffID));
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('deductions',$data);
		$this->load->view('footer');
	}
	public function editDeduction($id,$staffID,$msg){
		if(!empty($msg)){
			$data['msg']='Deduction Updated';
		}
		$data['staff']=$this->site->getStaff2($staffID);
		$data['deduction']=$this->site->getDeduction22($id);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('editDeductions',$data);
		$this->load->view('footer');
	}
	public function addDeductions($staffID,$msg){
		if(!empty($msg)){
			$data['msg']='Deduction Updated';
		}
		$data['staff']=$this->site->getStaff2($staffID);
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('addDeductions',$data);
		$this->load->view('footer');
	}
	public function updateDeductions(){
		$deductionID=$this->input->post('deductionID');
		$item=$this->input->post('item');
		$amount=$this->input->post('amount');
		$recurrent=$this->input->post('recurrent');
		$status=$this->input->post('status');
		$month=$this->input->post('month');
		$year=$this->input->post('year');
		$staffID=$this->site->getAny('deductions',$deductionID,"deductionID","staffID");
		
		$update=$this->site->updateDeduction($deductionID,$item,$amount,$recurrent,$status,$month,$year);
		if($update){
			redirect('welcome/editDeduction/'.$deductionID."/".$staffID."/1",'refresh');
		}
	}
	public function insertDeductions(){
		$date=date('Y-m-d');
		$item=$this->input->post('item');
		$amount=$this->input->post('amount');
		$recurrent=$this->input->post('recurrent');
		$status=$this->input->post('status');
		$month=$this->input->post('month');
		$year=$this->input->post('year');
		$staffID=$this->input->post('staffID');
		
		$insert=$this->site->insertDeduction($date,$item,$amount,$recurrent,$status,$month,$year,$staffID);
		if($insert){
			redirect('welcome/addDeductions/'.$staffID."/1",'refresh');
		}
	}public function generatePayroll(){
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('generatePayroll',$data);
		$this->load->view('footer');
	}
	public function generatePayroll2(){
		$month=$this->input->post('month');
		$year=$this->input->post('year');
		//check if it has been previously generated
		$check=$this->site->checkPayroll($month,$year);
		if($check){
			//delete previous payroll
			$this->site->deletePayroll($month,$year);
		}
		//insert staff salary
		$staff=$this->site->getAllStaff();
		foreach($staff as $s){
			$item='Salary';
			$type=1;
			$amount=$s['salary'];
			$staffID=$s['staffID'];
			$insert=$this->site->insertStaffSalary($item,$type,$month,$year,$amount,$staffID);
		}
		//insert deductions
		$deductions=$this->site->getDeductionForPayslip($month,$year);
		foreach($deductions as $d){
			$item2=$d['item'];
			$amount2=$d['amount'];
			$type2=0;
			$amount=$d['amount'];
			$staffID2=$d['staffID'];
			if($staffID2){
			$insert2=$this->site->insertStaffSalary($item2,$type2,$month,$year,$amount2,$staffID2);
			}
			
			
		}
		if($insert){
			redirect('welcome/viewPayslip/'.$month."/".$year,'refresh');
		}
		
	}
	
	
	public function insertStaff(){
		$title=$this->input->post('title');
		$surname=$this->input->post('surname');
		$othernames=$this->input->post('othernames');
		$sex=$this->input->post('sex');
		$usertype=$this->input->post('usertype');
		$dept=$this->input->post('dept');
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$office=$this->input->post('office');
		//echo "Office:".$office;
		
		$insert=$this->site->insertStaffNew($title,$surname,$othernames,$sex,$usertype,$dept,$username,$password,$office);
		if($insert){
			redirect('welcome/addNewStaff/1','refresh');
		}
	}
	public function updateStaff(){
		$title=$this->input->post('title');
		$surname=$this->input->post('surname');
		$othernames=$this->input->post('othernames');
		$sex=$this->input->post('sex');
		$usertype=$this->input->post('usertype');
		$dept=$this->input->post('dept');
		$username=$this->input->post('username');
		$password=md5($this->input->post('password'));
		$id=$this->input->post('id'); 
		$office=$this->input->post('office');
		
		$update=$this->site->updateStaffNew($id,$title,$surname,$othernames,$sex,$usertype,$dept,$username,$password,$office);
		if($update){
			redirect('welcome/editStaff/'.$id."/1",'refresh');
		}
	}
	
	public function viewDiscount(){
		if(!empty($msg)){
			$data['msg']="Successfully cleared";
		}
		$date=date('Y-m-d');
		$query="SELECT * FROM job_order a,depts c,products d,admin e WHERE a.dept=c.id AND a.job_type=d.id AND a.balance>0 AND a.date <'$date'  AND a.discount >0";
		$data['cashStaff']=$this->site->getBF();
		//$data['trans']=$this->site->executeQuery($query);
		$data['trans']=$this->site->loadDiscount();
		$data['dept']=$this->site->getAll('depts');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('viewDiscount',$data);
		$this->load->view('footer');
	}
	public function viewBF(){
		$date=date('Y-m-d');
		$query="SELECT * FROM job_order a,depts c,products d,admin e WHERE a.dept=c.id AND a.job_type=d.id AND a.balance>0 AND a.date <'$date'";
		$data['cashStaff']=$this->site->getBF();
		//$data['trans']=$this->site->executeQuery($query);
		$data['trans']=$this->site->loadBF22();
		$data['dept']=$this->site->getAll('depts');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('viewBF',$data);
		$this->load->view('footer');
		
	}
	public function viewBF2($msg=null){
		if(!empty($msg)){
			$data['msg']="Successfully cleared";
		}
		$date=date('Y-m-d');
		$query="SELECT * FROM job_order a,depts c,products d,admin e WHERE a.dept=c.id AND a.job_type=d.id AND a.balance>0 AND a.date <'$date' AND a.dept='5'";
		$data['cashStaff']=$this->site->getBF();
		//$data['trans']=$this->site->executeQuery($query);
		$data['trans']=$this->site->loadBF222();
		$data['dept']=$this->site->getAll('depts');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('viewBF2',$data);
		$this->load->view('footer');
		
	}
	public function staff(){
		$data['staff']=$this->site->getAll('admin');
		$data['usertype']=$this->site->getAll('usertype');
		$data['depts']=$this->site->getAll('depts');
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('staff',$data);
		$this->load->view('footer');
		
	}public function searchTransBF(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$cashier=$this->input->post('cashier');
		$dept=$this->input->post('dept');
		
		//$query="SELECT * FROM job_order a,transaction b,depts c,admin d WHERE a.order_no=b.order_no AND d.id=b.entered_by";
		//$query="SELECT * FROM job_order a,depts c,products d,admin e WHERE a.dept=c.id AND a.job_type=d.id AND a.balance > 0 GROUP BY a.order_no";
		$date=date('Y-m-d');
		$query="SELECT * FROM transaction t,job_order j,admin a WHERE t.order_no=j.order_no AND j.generated_by=a.id AND j.balance>'0' AND j.date <'$date'";
		if(!empty($from) && !empty($to)){
			$query.=" AND j.date BETWEEN '$from' AND '$to'";
			$data['date']="Date:(".$from.")-(".$to.")";
			//$data['cashier']=$this->site->retrieveStaffSales2($id=3,$from,$to);
		}
		
		if(!empty($cashier)){
			//$query.=" AND b.entered_by='$cashier'";
			$query.="";
			$data['cashierName']="Cashier:".$this->site->getAny("admin",$cashier,"id","surname")." ".$this->site->getAny("admin",$cashier,"id","othernames");
		}
		if(!empty($dept)){
			$query.=" AND j.dept='$dept'";
			$data['deptName']="Dept:".$this->site->getAny("depts",$dept,"id","name");
		}
		$query.=" GROUP BY j.order_no ORDER BY j.date DESC";
		$data['trans']=$this->site->executeQuery($query);
		
		$data['bf']=$this->site->retrieveStaffSales2($id=5,$from,$to);
		$data['dept']=$this->site->getAll('depts');
		$data['cashStaff']=$this->site->getCashier();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('bfSearch',$data);
		$this->load->view('footer');
	}
	public function searchTransBF2(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$cashier=$this->input->post('cashier');
		$dept=$this->input->post('dept');
		
		//$query="SELECT * FROM job_order a,transaction b,depts c,admin d WHERE a.order_no=b.order_no AND d.id=b.entered_by";
		//$query="SELECT * FROM job_order a,depts c,products d,admin e WHERE a.dept=c.id AND a.job_type=d.id AND a.balance > 0 GROUP BY a.order_no";
		$date=date('Y-m-d');
		$query="SELECT * FROM transaction t,job_order j,admin a WHERE t.order_no=j.order_no AND j.generated_by=a.id AND j.dept='5' AND j.balance>'0' AND j.date <'$date'";
		if(!empty($from) && !empty($to)){
			$query.=" AND j.date BETWEEN '$from' AND '$to'";
			$data['date']="Date:(".$from.")-(".$to.")";
			//$data['cashier']=$this->site->retrieveStaffSales2($id=3,$from,$to);
		}
		
		if(!empty($cashier)){
			//$query.=" AND b.entered_by='$cashier'";
			$query.="";
			$data['cashierName']="Cashier:".$this->site->getAny("admin",$cashier,"id","surname")." ".$this->site->getAny("admin",$cashier,"id","othernames");
		}
		if(!empty($dept)){
			$query.=" AND j.dept='$dept'";
			$data['deptName']="Dept:".$this->site->getAny("depts",$dept,"id","name");
		}
		$query.=" GROUP BY j.order_no ORDER BY j.date DESC";
		$data['trans']=$this->site->executeQuery($query);
		
		$data['bf']=$this->site->retrieveStaffSales2($id=5,$from,$to);
		$data['dept']=$this->site->getAll('depts');
		$data['cashStaff']=$this->site->getCashier();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('bfSearch',$data);
		$this->load->view('footer');
	}
	public function clearbf($orderNo){
		$totalAmt=$this->site->getAny("job_order",$orderNo,"order_no","total_amount");
		$advance=$this->site->getAny("job_order",$orderNo,"order_no","advance");
		$balance=$this->site->getAny("job_order",$orderNo,"order_no","balance");
		$date=date('Y-m-d');
		$adminID=$_SESSION['adminID'];
		//update the job order table and enter into clearance table
		$update=$this->site->updatecleared($orderNo);
		if($update){
			//enter into clearance table
			$insert=$this->site->insertclearance($date,$orderNo,$adminID,$balance);
		}
		if($update && $insert){
			redirect('welcome/viewBF2/1','refresh');
		}
		
	}
	public function cleardiscount($orderNo){
		$totalAmt=$this->site->getAny("job_order",$orderNo,"order_no","total_amount");
		$advance=$this->site->getAny("job_order",$orderNo,"order_no","advance");
		$balance=$this->site->getAny("job_order",$orderNo,"order_no","balance");
		$discount=$this->site->getAny("job_order",$orderNo,"order_no","discount");
		$newdiscount=$totalAmt-$discount;
		$newadvance=$advance+$newdiscount;
		$b=$balance-$newdiscount;
		$date=date('Y-m-d');
		$adminID=$_SESSION['adminID'];
		//update the job order table and enter into clearance table
		$update=$this->site->updatediscountcleared($orderNo,$b,$newadvance);
		if($update){
			//enter into clearance table
			$insert=$this->site->insertclearance($date,$orderNo,$adminID,$discount);
		}
		if($update && $insert){
			redirect('welcome/viewDiscount/1','refresh');
		}
	}
	/*
	public function searchTransBF(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$cashier=$this->input->post('cashier');
		$dept=$this->input->post('dept');
		
		//$query="SELECT * FROM job_order a,transaction b,depts c,admin d WHERE a.order_no=b.order_no AND d.id=b.entered_by";
		$query="SELECT * FROM job_order a,depts c,products d,admin e WHERE a.dept=c.id AND a.job_type=d.id AND a.balance > 0 GROUP BY a.order_no";
		if(!empty($from) && !empty($to)){
			$query.=" AND a.date BETWEEN '$from' AND '$to'";
			$data['date']="Date:(".$from.")-(".$to.")";
			//$data['cashier']=$this->site->retrieveStaffSales2($id=3,$from,$to);
		}
		
		if(!empty($cashier)){
			$query.=" AND b.entered_by='$cashier'";
			$data['cashierName']="Cashier:".$this->site->getAny("admin",$cashier,"id","surname")." ".$this->site->getAny("admin",$cashier,"id","othernames");
		}
		if(!empty($dept)){
			$query.=" AND a.dept='$dept'";
			$data['deptName']="Dept:".$this->site->getAny("depts",$dept,"id","name");
		}
		$data['trans']=$this->site->executeQuery($query);
		
		$data['bf']=$this->site->retrieveStaffSales2($id=5,$from,$to);
		$data['dept']=$this->site->getAll('depts');
		$data['cashStaff']=$this->site->getCashier();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('bfSearch',$data);
		$this->load->view('footer');
	}*/
	
	public function searchTransSuper(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$cashier=$this->input->post('cashier');
		$operator=$this->input->post('operator');
		$dept=$this->input->post('dept');
			
		
		$data['dept']=$this->site->getAll('depts');
		
		$data['cashStaff']=$this->site->getCashier();
		if($cashier){
			$c="AND b.entered_by=e.id";
		}else{
			$c="";
		}
		if($operator){
			$o="AND a.generated_by=e.id";
		}else{
			$o="";
		}
		if(!$cashier && !$operator){
			$c="AND b.entered_by=e.id";
		}
		
		
		//$query="SELECT * FROM job_order a,transaction b,depts c,admin d WHERE a.order_no=b.order_no AND d.id=b.entered_by";
		$query="SELECT * FROM transaction b,job_order a,depts c,products d,admin e WHERE a.order_no=b.order_no ".$c." AND a.dept=c.id ".$o." AND a.job_type=d.id AND (b.status='Paid' OR b.status='Fully Paid')";
		if(!empty($from) && !empty($to)){
			$query.=" AND b.date BETWEEN '$from' AND '$to'";
			$data['date']="Date:(".$from.")-(".$to.")";
			$data['expenses']=$this->site->spoolExpenses2($from,$to);
			$data['cashier']=$this->site->retrieveStaffSales2($id=3,$from,$to);
			$data['loadOtherOfficeSales']=$this->site->loadOtherOfficeSalesSearch($from,$to);
		}
		else{
			$data['cashier']=0;
		}
		if(!empty($cashier)){
			$query.=" AND b.entered_by='$cashier'";
			$data['cashierName']="Cashier:".$this->site->getAny("admin",$cashier,"id","surname")." ".$this->site->getAny("admin",$cashier,"id","othernames");
		}
		if(!empty($operator)){
			$query.=" AND a.generated_by='$operator'";
			$data['operatorName']="Operator:".$this->site->getAny("admin",$operator,"id","surname")." ".$this->site->getAny("admin",$operator,"id","othernames");
		}
		if(!empty($dept)){
			$query.=" AND a.dept='$dept'";
			$data['deptName']="Dept:".$this->site->getAny("depts",$dept,"id","name");
		}
		$query.=" ORDER BY a.id DESC";
		//echo "Yes:".$operator."Yes";
		//echo $query;
		$data['trans']=$this->site->executeQuery($query);
		
		$data['bf']=$this->site->retrieveStaffSales2($id=5,$from,$to);
		$data['dept']=$this->site->getAll('depts');
		$data['cashStaff']=$this->site->getCashier();
		$data['bfManagerEntry']=$this->site->getBFManagerEntry2($from,$to);
		$data['operator']=$this->site->getOperatorzz();
		$this->load->view('headerProfileSuper');
		$this->load->view('leftNav');
		$this->load->view('superSearch',$data);
		$this->load->view('footer');
	}
	/** END ACCOUNTANT **/
	/** BF **/
	public function delBF($order_no){
		$update=$this->site->delBF($order_no);
		if($update){
			echo "BF Deleted<br />";
			echo anchor('welcome/bf','Go Back');
			
		}
	}
	public function bf($msg=NULL){
		if(!empty($msg)){
			$data['msg']='Brought Forward Treated';
		}
		$dept=$_SESSION['dept'];
		if($_SESSION['adminID']==21){
			$data['bf']=$this->site->loadBFx($dept);
		}else{
		$data['bf']=$this->site->loadBF($dept);
		}
		$this->load->view('headerProfileBF');
		$this->load->view('leftNav');
		$this->load->view('bf',$data);
		$this->load->view('footer');
	}
	
	public function cashier2($msg=NULL){
		if(!empty($msg)){
			$data['msg']='Sales Added';
		}
		$this->load->view('headerProfileCashier2');
		$this->load->view('leftNav');
		$data['loadSales']=$this->site->loadSales($date=date('Y-m-d'),$_SESSION['adminID']);
		$this->load->view('sales',$data);
		$this->load->view('footer');
	}
	
	public function addSales($msg=NULL){
		if(!empty($msg)){
			$data['msg']='Sales Added';
		}
		$this->load->view('headerProfileCashier2');
		$this->load->view('leftNav');
		$data['method']=$this->site->getAll('paymentmethod');
		$this->load->view('addSales',$data);
		$this->load->view('footer');
	}
	
	public function insertSales(){
		$salesDate=date("Y-m-d");
		$salesStore=$_SESSION['store'];
		$salesMethod=$this->input->post('salesMethod');
		$salesDescription=$this->input->post('salesDescription');
		$salesOrderNo=$this->input->post('salesOrderNo');
		$salesBy=$_SESSION['adminID'];
		$salesAmount=$this->input->post('salesAmount');
		$insert=$this->site->insertSales($salesDate,$salesStore,$salesMethod,$salesDescription,$salesOrderNo,$salesBy,$salesAmount);
		if($insert){
			redirect('welcome/addSales/1','refresh');
		}
	}
	
	public function deleteSales($salesID){
		$this->load->view('headerProfileCashier2');
		$this->load->view('leftNav');
		$delete=$this->site->deleteSales($salesID);
		if($delete){
			$data['msg']='Sales Deleted';
		}else{
			$data['msg']='Error deleting Sales';
		}
		$this->load->view('deleteSales',$data);
		$this->load->view('footer');
		
		
	}
	
	public function treatBF($order_no){
		$data['trans']=$this->site->getTransBF($order_no);
		$data['method']=$this->site->getAll('paymentmethod');
		$this->load->view('headerProfileBF');
		$this->load->view('leftNav');
		$this->load->view('processTrans22',$data);
		$this->load->view('footer');
	}
	public function processTrans222(){
		$order_no=$this->input->post('order_no');
		$method=$this->input->post('method');
		$amount=$this->input->post('amount');
		$date=date('Y-m-d');
		$total_cost=$this->site->getAny("job_order",$order_no,'order_no','total_amount');
		$advance=$this->site->getAny("job_order",$order_no,'order_no','advance');
		$newAdvance=$advance+$amount;
		$balance=$total_cost-($amount+$advance);
		if($balance==0){
			$status='Fully Paid';
		}
		else{
			$status='Paid';
		}
		$entered_by=$_SESSION['adminID'];
		//insert into transaction and receipt
		$check=$this->site->checkJob2($order_no,$total_cost,$amount,$entered_by,$balance,$date);
		if(!$check){
		$insert=$this->site->insertTransNew($order_no,$date,$total_cost,$amount,$balance,$status,$entered_by,$method);
		$insert2=$this->site->insertReceipt($order_no,$date,$amount,$entered_by);
		if($insert && $insert2){
			//update job_order
			$this->site->updateJobOrder($order_no,$newAdvance,$balance,$remarks='Ordered');
			//Send SMS
			$message="Your Job #".$order_no." is now been processed,AMT:N".$total_cost." ADV:N".$amount." BAL:N".$balance."Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
			$phone=$this->site->getAny('job_order',$order_no,'order_no','cust_phone');
			$this->logSMS($phone,$order_no,$message);
			//$this->sendSMS($phone, $message);
			//redirect to job order & receipt printing
			redirect('welcome/bf/1','refresh');
		}
		}else{
			redirect('welcome/bf/1','refresh');
		}
	}
	
	/** **/
	/**CASHIER **/
	public function sendSMS($phone, $message) {
        $owneremail = "uthman4u2nv@gmail.com";
        $subacct = "ABEYSTEPH";
        $subacctpwd = "@ajagbe@";
//$sendto="08032518766"; /* destination number */
        $sender = "ABEYSTEPH"; /* sender id */
//$message=$_GET['msg']; /* message to be sent */
//sendto=08057071234&
//$message="Your Job #".$order_no." is now been processed,AMT:N".$amount." Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
        $msgtype = 0;
        $url = "http://www.smslive247.com/http/index.aspx?"
                . "cmd=sendquickmsg"
                . "&owneremail=" . UrlEncode($owneremail)
                . "&subacct=" . UrlEncode($subacct)
                . "&subacctpwd=" . UrlEncode($subacctpwd)
                . "&message=" . UrlEncode($message)
                . "&sendto=" . UrlEncode($phone)
                . "&msgtype=" . UrlEncode($msgtype);

        if ($f = @fopen($url, "r")) {
            $answer = fgets($f, 255);
            if (substr($answer, 0, 1) == "+") {
                return 1;
            } else {
                return 2;
//echo "an error has occurred: [$answer].";
            }
        } else {
            return 0;
//echo "Error: URL could not be opened.";
        }
    }
	public function cashier(){
		$dept=$_SESSION['dept'];
		
		$data['jobs']=$this->site->loadJobsX($dept,$date=date('Y-m-d'),$_SESSION['adminID']);
		$this->load->view('headerProfileCashier');
		$this->load->view('leftNav');
		$this->load->view('cashier',$data);
		$this->load->view('footer');
	}
	public function editPrint($orderNo,$msg=NULL){
		if(!empty($msg)){
			$data['msg']='Job status updated successfully';
		}
		$dept=$_SESSION['dept'];
		$data['print']=$this->site->loadPrint($orderNo,$dept);
		$data['machine']=$this->site->loadMachine($dept,10);
		$this->load->view('headerProfilePrintSuper');
		$this->load->view('leftNav');
		$this->load->view('editPrint',$data);
		$this->load->view('footer');
	}
	public function updatePrint(){
		$machine=$this->input->post('machine');
		$status=$this->input->post('status');
		$order_no=$this->input->post('order_no');
		$update=$this->site->updatePrint($machine,$status,$order_no);
		if($update){
			redirect('welcome/editPrint/'.$order_no."/1",'refresh');
		}
	}
	public function printSuper(){
		$dept=$_SESSION['dept'];
		$data['jobs']=$this->site->loadPrintSuper($dept,$date=date('Y-m-d'));
		$this->load->view('headerProfilePrintSuper');
		$this->load->view('leftNav');
		$this->load->view('printSuper',$data);
		$this->load->view('footer');
	}
	
	public function processTrans($order_no){
		$date=date('Y-m-d');
		$data['trans']=$this->site->getTrans($order_no,$date);
		$data['method']=$this->site->getAll('paymentmethod');
		$this->load->view('headerProfileCashier');
		$this->load->view('leftNav');
		$this->load->view('processTrans',$data);
		$this->load->view('footer');
	}
	public function searchTrans(){
		$order_no=$this->input->post('order_no');
		$data['trans']=$this->site->getTrans($order_no);
		$this->load->view('headerProfileCashier');
		$this->load->view('leftNav');
		$this->load->view('processTrans',$data);
		$this->load->view('footer');
	}
	
	public function processTrans2(){
		$order_no=$this->input->post('order_no');
		$method=$this->input->post('method');
		$amount=$this->input->post('amount');
		$discount=$this->input->post('discount');
		$date=date('Y-m-d');
		$total_cost=$this->site->getAny("job_order",$order_no,'order_no','total_amount');
		$advance=$this->site->getAny("job_order",$order_no,'order_no','advance');
		$balance=$total_cost-$amount;
		if($balance==0){
			$status='Fully Paid';
		}
		else{
			$status='Paid';
		}
		$entered_by=$_SESSION['adminID'];
		//check if job exists
		$check=$this->site->checkJob2($order_no,$total_cost,$amount,$balance,$entered_by,$date);
		if(!$check){
		//insert into transaction and receipt
		$insert=$this->site->insertTransNew($order_no,$date,$total_cost,$amount,$balance,$status,$entered_by,$method);
		$insert2=$this->site->insertReceipt($order_no,$date,$amount,$entered_by);
		if($insert && $insert2){
			//update job_order
			$this->site->updateJobOrderNew($order_no,$amount,$balance,$remarks='Ordered',$discount);
			//Send SMS
			$message="Your Job #".$order_no." is now been processed,AMT:N".$total_cost." ADV:N".$amount." BAL:N".$balance."Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
			$phone=$this->site->getAny('job_order',$order_no,'order_no','cust_phone');
			$this->logSMS($phone,$order_no,$message);
			//$this->sendSMS($phone, $message);
			//redirect to job order & receipt printing
			redirect('welcome/printTrans/'.$order_no,'refresh');
		}
		}else{
			redirect('welcome/printTrans/'.$order_no,'refresh');
		}
	}
	public function processTrans22(){
		$order_no=$this->input->post('order_no');
		$method=$this->input->post('method');
		$amount=$this->input->post('amount');
		$date=date('Y-m-d');
		$total_cost=$this->site->getAny("job_order",$order_no,'order_no','total_amount');
		$advance=$this->site->getAny("job_order",$order_no,'order_no','advance');
		$newAdvance=$advance+$amount;
		$balance=$total_cost-($amount+$advance);
		if($balance==0){
			$status='Fully Paid';
		}
		else{
			$status='Paid';
		}
		$entered_by=$_SESSION['adminID'];
		$check=$this->site->checkJob2($order_no,$total_cost,$amount,$entered_by,$balance,$date);
		if(!$check){
		//insert into transaction and receipt
		$insert=$this->site->insertTransNew($order_no,$date,$total_cost,$amount,$balance,$status,$entered_by,$method);
		$insert2=$this->site->insertReceipt($order_no,$date,$amount,$entered_by);
		if($insert && $insert2){
			//update job_order
			$this->site->updateJobOrder($order_no,$newAdvance,$balance,$remarks='Ordered');
			//Send SMS
			$message="Your Job #".$order_no." is now been processed,AMT:N".$total_cost." ADV:N".$amount." BAL:N".$balance."Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
			$phone=$this->site->getAny('job_order',$order_no,'order_no','cust_phone');
			//$this->sendSMS($phone, $message);
			$this->logSMS($phone,$order_no,$message);
			//redirect to job order & receipt printing
			redirect('welcome/printTrans/'.$order_no,'refresh');
		}
		}else{
			redirect('welcome/printTrans/'.$order_no,'refresh');
		}
	}
	public function searchTransByDate(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$adminID=$_SESSION['adminID'];
		$dept=$_SESSION['dept'];
		$data['from']=$from;
		$data['to']=$to;
		$data['jobs']=$this->site->loadJobsByDate($dept,$from,$to,$_SESSION['adminID']);
		$this->load->view('headerProfileCashier');
		$this->load->view('leftNav');
		$this->load->view('cashier2',$data);
		$this->load->view('footer');
	}
	public function searchTransCashier(){
		$order_no=$this->input->post('order_no');
		$date=date('Y-m-d');
		$data['trans']=$this->site->getTrans($order_no,$date);
		$data['method']=$this->site->getAll('paymentmethod');
		$this->load->view('headerProfileCashier');
		$this->load->view('leftNav');
		$this->load->view('processTrans2',$data);
		$this->load->view('footer');
	}
	public function set_barcode($code) {
        //load library
        $this->load->library('zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text' => $code), array());
    }
public function returnJobNumber($order_no,$date,$dept){
	$trans=$this->site->g($date,$dept);
	$rank=0;
	$myposition=0;
	foreach($trans as $row){
		$rank++;
		if($row['order_no']==$order_no){
			
			$myposition=$rank;
		}
	}
	//echo "Position:".$myposition;
	return $myposition;
	//print_r($trans);
}
	/*public function deleteJobOrderItem($id){
		$delete=$this->site->deleteJobOrderItem($id);
		if($delete){
			$this->load->view('deleteJobOrderItem');
		}
	}
	public function deleteJobOrder(){
		$order_no=$this->input->post('order_no');
		$delete=$this->site->deleteJobOrderTmp($order_no);
		if($delete){
			$_SESSION['order_no']='';
			redirect('welcome/operator/3','refresh');
		}
	}*/
	public function insertJobOrder(){
		$order_no=$this->input->post('order_no');
		$custName=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_name');
		$custPhone=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_phone');
		$desc=$this->site->getAny('job_order_tmp',$order_no,'order_no','description');
		$jobType=$this->site->getAny('job_order_tmp',$order_no,'order_no','job_type');
		$jobDetails=$this->site->retrieveTmpOrders($order_no);
		$s1=$this->site->getAny('job_order_tmp',$order_no,'order_no','s1');
		$s2=$this->site->getAny('job_order_tmp',$order_no,'order_no','s2');
		
		$qty=0;
		$totalCost=0;
		foreach($jobDetails as $r){
			$qty+=$r['qty'];
			$totalCost+=$r['total_amount'];
		}
		
		$designer=$this->site->getAny('job_order_tmp',$order_no,'order_no','designer');
		$cashier=$this->site->getAny('job_order_tmp',$order_no,'order_no','cashier');
		$check=$this->site->checkJob($order_no);
		if(!$check){
		//retrieve all job details
		$insert=$this->site->insertJobOrderxy($custName,$custPhone,$desc,$date=date('Y-m-d'),$_SESSION['adminID'],$jobType,$_SESSION['dept'],$qty,$totalCost,$order_no,$designer,$cashier,$s1,$s2);
	if($insert){
		$_SESSION['order_no']='';
		
		redirect('welcome/operator/2','refresh');
	}
		}else{
			$_SESSION['order_no']='';
		
		redirect('welcome/operator/2','refresh');
		}
	
	}
	/*public function addJobOrder(){
		if(empty($_SESSION['order_no'])){
		$custName=$this->input->post('custName');
		$custPhone=$this->input->post('custPhone');
		$jobType=$this->input->post('jobType');
		$desc=$this->input->post('desc');
		$qty=$this->input->post('qty');
		$totalCost=$this->input->post('totalCost');
		//$advance=$this->input->post('advance');
		$designer=$this->input->post('designer');
		$cashier=$this->input->post('cashier');
		//$balance=$totalCost-$advance;
		$date=date('Y-m-d');
		$orderNo=str_shuffle("ASG")."-".$this->randomString(6);
		
		$adminID=$_SESSION['adminID'];
		$_SESSION['order_no']=$orderNo;
		$insert=$this->site->insertJobOrder22($custName,$custPhone,$desc,$date,$_SESSION['adminID'],$jobType,$_SESSION['dept'],$qty,$totalCost,$orderNo,$designer,$cashier);
	if($insert){
		redirect('welcome/operator/1','refresh');
	}
		}else{
			//retrieve other details and insert into temp table
			$order_no=$_SESSION['order_no'];
			$custName=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_name');
			$custPhone=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_phone');
			$desc=$this->input->post('desc');
			$date=$this->site->getAny('job_order_tmp',$order_no,'order_no','date');
			$jobType=$this->input->post('jobType');
			$qty=$this->input->post('qty');
			$totalCost=$this->input->post('totalCost');
			$orderNo=$_SESSION['order_no'];
			$designer=$this->site->getAny('job_order_tmp',$order_no,'order_no','designer');
			$cashier=$this->site->getAny('job_order_tmp',$order_no,'order_no','cashier');
			$insert22=$this->site->insertJobOrder22($custName,$custPhone,$desc,$date,$_SESSION['adminID'],$jobType,$_SESSION['dept'],$qty,$totalCost,$orderNo,$designer,$cashier);
		if($insert22){
		redirect('welcome/operator/1','refresh');
	}
		}
	}*/
	public function operator($msg=null){
		if(!empty($msg) && $msg==1){
			$data['msg']='Job Added to cart Successfully!!!';
		}elseif(!empty($msg) && $msg==2){
			$data['msg']='Job processed Successfully!!!';
		}
		elseif(!empty($msg) && $msg==3){
			$data['msg']='Job order cancelled!!!';
		}
		if(empty($_SESSION['order_no'])){
		$data['jobOrders']=$this->site->retrieveMyJobOrder($_SESSION['adminID'],$date=date('Y-m-d'));
		if($_SESSION['dept']==5){
			$data['job']=$this->site->getAll('products');
		}else{
		$data['job']=$this->site->getJobTypes($_SESSION['dept']);
		}
		$data['designer']=$this->site->getDesigner($_SESSION['dept']);
		if($_SESSION['dept']==5){
			$data['cashier']=$this->site->loadGeneralStaff($role=3);
		}else{
		$data['cashier']=$this->site->loadStaff($_SESSION['dept'],$role=3);
		}
		$this->load->view('headerProfileOperator');
        $this->load->view('leftNav');
        $this->load->view('operator', $data);
		}else{
			$data['tmpOrders']=$this->site->retrieveTmpOrders($_SESSION['order_no']);
			$data['jobOrders']=$this->site->retrieveMyJobOrder($_SESSION['adminID'],$date=date('Y-m-d'));
			if($_SESSION['dept']==5){
			$data['job']=$this->site->getAll('products');
		}else{
		$data['job']=$this->site->getJobTypes($_SESSION['dept']);
		}
		$data['designer']=$this->site->getDesigner($_SESSION['dept']);
		if($_SESSION['dept']==5){
			$data['cashier']=$this->site->loadGeneralStaff($role=3);
		}else{
		$data['cashier']=$this->site->loadStaff($_SESSION['dept'],$role=3);
		}
		$this->load->view('headerProfileOperator');
        $this->load->view('leftNav');
        $this->load->view('operator', $data);
		}
	}
	public function floormanager(){
		$data['jobOrders']=$this->site->retrieveMyJobOrderFM($date=date('Y-m-d'));
		$data['job']=$this->site->getJobTypes($_SESSION['dept']);
		$this->load->view('headerProfileFM');
        $this->load->view('leftNav');
        $this->load->view('floormanager', $data);
	}
	public function deleteJobOrderItem($id){
		$delete=$this->site->deleteJobOrderItem($id);
		if($delete){
			$this->load->view('deleteJobOrderItem');
		}
	}
	public function deleteJobOrder(){
		$order_no=$this->input->post('order_no');
		$delete=$this->site->deleteJobOrderTmp($order_no);
		if($delete){
			$_SESSION['order_no']='';
			redirect('welcome/operator/3','refresh');
		}
	}
	/*public function insertJobOrder(){
		$order_no=$this->input->post('order_no');
		$custName=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_name');
		$custPhone=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_phone');
		$desc=$this->site->getAny('job_order_tmp',$order_no,'order_no','description');
		$jobType=$this->site->getAny('job_order_tmp',$order_no,'order_no','job_type');
		$jobDetails=$this->site->retrieveTmpOrders($order_no);
		
		$qty=0;
		$totalCost=0;
		foreach($jobDetails as $r){
			$qty+=$r['qty'];
			$totalCost+=$r['total_amount'];
		}
		
		$designer=$this->site->getAny('job_order_tmp',$order_no,'order_no','designer');
		$cashier=$this->site->getAny('job_order_tmp',$order_no,'order_no','cashier');
		
		//retrieve all job details
		$insert=$this->site->insertJobOrder($custName,$custPhone,$desc,$date=date('Y-m-d'),$_SESSION['adminID'],$jobType,$_SESSION['dept'],$qty,$totalCost,$order_no,$designer,$cashier);
	if($insert){
		$_SESSION['order_no']='';
		
		redirect('welcome/operator/2','refresh');
	}
	
	}*/
	public function addJobOrder(){
		if(empty($_SESSION['order_no'])){
		$custName=$this->input->post('custName');
		$custPhone=$this->input->post('custPhone');
		$jobType=$this->input->post('jobType');
		$desc=$this->input->post('desc');
		$qty=$this->input->post('qty');
		if($_SESSION['dept']==1 || $_SESSION['dept']==5){
		
		$s1=$this->input->post('s1');
		$s2=$this->input->post('s2');
		$price=$this->site->getAny('products',$jobType,'id','price');
		$totalCost=$price*$s1*$s2*$qty;
		}elseif($_SESSION['dept']==4){
			$price=$this->site->getAny('products',$jobType,'id','price');
		$totalCost=$price*$qty;
		}elseif($_SESSION['dept']==3){
			$totalCost=$this->input->post('totalCost');
		}
		//$totalCost=$this->input->post('totalCost');
		//$advance=$this->input->post('advance');
		$designer=$this->input->post('designer');
		$cashier=$this->input->post('cashier');
		//$balance=$totalCost-$advance;
		$date=date('Y-m-d');
		$orderNo=str_shuffle("ASG")."-".$this->randomString(6);
		
		$adminID=$_SESSION['adminID'];
		$_SESSION['order_no']=$orderNo;
		$insert=$this->site->insertJobOrder22x($custName,$custPhone,$desc,$date,$_SESSION['adminID'],$jobType,$_SESSION['dept'],$qty,$totalCost,$orderNo,$designer,$cashier,$s1,$s2);
		//echo "Insert:".$insert;
	if($insert){
		redirect('welcome/operator/1','refresh');
	}
		}else{
			//retrieve other details and insert into temp table
			$order_no=$_SESSION['order_no'];
			$custName=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_name');
			$custPhone=$this->site->getAny('job_order_tmp',$order_no,'order_no','cust_phone');
			$desc=$this->input->post('desc');
			$date=$this->site->getAny('job_order_tmp',$order_no,'order_no','date');
			$jobType=$this->input->post('jobType');
			$qty=$this->input->post('qty');
			if($_SESSION['dept']=="1" || $_SESSION['dept']==5){
				$s1=$this->input->post('s1');
		$s2=$this->input->post('s2');
		$price=$this->site->getAny('products',$jobType,'id','price');
		$totalCost=$price*$s1*$s2*$qty;
			}elseif($_SESSION['dept']=="4"){
				$price=$this->site->getAny('products',$jobType,'id','price');
		$totalCost=$price*$qty;
			}
			elseif($_SESSION['dept']=="3"){
				//$price=$this->site->getAny('products',$jobType,'id','price');
		//$totalCost=$price*$qty;
		$totalCost=$this->input->post('totalCost');
			}
			
			//$totalCost=$this->input->post('totalCost');
			$orderNo=$_SESSION['order_no'];
			$designer=$this->site->getAny('job_order_tmp',$order_no,'order_no','designer');
			$cashier=$this->site->getAny('job_order_tmp',$order_no,'order_no','cashier');
			$insert22=$this->site->insertJobOrder22x($custName,$custPhone,$desc,$date,$_SESSION['adminID'],$jobType,$_SESSION['dept'],$qty,$totalCost,$orderNo,$designer,$cashier,$s1,$s2);
		if($insert22){
		redirect('welcome/operator/1','refresh');
	}
		}
	}
	public function printTrans($order_no){
		$data['trans22']=$this->site->retrieveJobOrder($order_no);
		//log sms
		$phone=$this->site->getAny('job_order',$order_no,'order_no','cust_phone');
		$amount=$this->site->getAny('job_order',$order_no,'order_no','total_amount');
		//check if sms has been sent before
		$checkSentMSg=$this->site->checkSent($phone,$order_no);
		if(!$checkSentMSg){
			$msg="Your Job #".$order_no." is now been processed,AMT:N".$amount." Thanks for your patronage.Enquiries&Pricing:08170000006,Job Confirmation:08167930124";
			$this->logSMS($phone,$order_no,$msg);
		}
		$data['products']=$this->site->getAll('products');
		$trans=$this->site->retrieveTmpOrders($order_no);
		$data['trans']=$trans;
		$genBy=$this->site->getAny('job_order',$order_no,'order_no','generated_by');
		$data['g']=$this->site->getAny('admin',$genBy,'id','surname')." ".$this->site->getAny('admin',$genBy,'id','othernames');
		$data['dept']=$this->site->getAny('job_order',$order_no,'order_no','dept');
		$this->load->view('printTrans',$data);
		
	}
	
	public function logSMS($phone,$order_no,$msg){
		$this->site->logSMS($phone,$order_no,date('Y-m-d'),$msg);
	}
	
	/** END CASHIER **/
	/** OPERATOR **/
	public function searchJobOrder(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$adminID=$_SESSION['adminID'];
		$data['from']=$from;
		$data['to']=$to;
		$data['jobOrders']=$this->site->searchJobOrder($from,$to,$adminID);
		$this->load->view('headerProfileOperator');
        $this->load->view('leftNav');
        $this->load->view('searchJobOrder', $data);
	}
	public function searchJobOrderFM(){
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		$adminID=$_SESSION['adminID'];
		$data['from']=$from;
		$data['to']=$to;
		$data['jobOrders']=$this->site->searchJobOrderFM($from,$to);
		$this->load->view('headerProfileFM');
        $this->load->view('leftNav');
        $this->load->view('searchJobOrderFM', $data);
	}
	public function changestatus($orderNo,$msg=null){
		if(!empty($msg)){
			$data['msg']='Job Status Changed';
		}
		$data['joborder']=$this->site->retrieveJOrder($orderNo);
		$data['status']=$this->site->getAll('jobstatus');
		$this->load->view('headerProfileFM');
        $this->load->view('leftNav');
        $this->load->view('changestatus', $data);
	}
	public function updatejobstatus(){
		$status=$this->input->post('status');
		$order_no=$this->input->post('order_no');
		$update=$this->site->updateJStatus($order_no,$status);
		if($update){
			redirect('welcome/changestatus/'.$order_no."/1",'refresh');
		}
	}
	
	/** END OPERATOR **/
	
	public function switchRole($role){
		switch ($role){
			case "1";
			redirect('welcome/home','refresh');
			break;
			
			case "2";
			redirect('welcome/home','refresh');
			break;
			
			case "3";
			redirect('welcome/cashier','refresh');
			break;
			
			case "4";
			redirect('welcome/operator','refresh');
			break;
			
			case "5";
			redirect('welcome/bf','refresh');
			break;
			
			case "6";
			redirect('welcome/super','refresh');
			break;
			
			case "7";
			redirect('welcome/customer','refresh');
			break;
			case "9";
			redirect('welcome/auditor','refresh');
			break;
			case "10";
			redirect('welcome/machineoperator','refresh');
			break;
			case "11";
			redirect('welcome/printSuper','refresh');
			break;
			case "12";
			redirect('welcome/cashier2','refresh');
			break;
			case "13";
			redirect('welcome/largeformatmanager','refresh');
			break;
			case "14";
			redirect('welcome/floormanager','refresh');
			break;
		}
	}
    
    public function login2(){
        
        $this->load->view('loginFail', $data);
            $this->load->view('footer');
    }

    
   

 
	
    
    
    
    public function randomString($randStringLength) {
        $timestring = microtime();
        $secondsSinceEpoch = (integer) substr($timestring, strrpos($timestring, " "), 100);
        $microseconds = (double) $timestring;
        $seed = mt_rand(0, 1000000000) + 10000000 * $microseconds + $secondsSinceEpoch;
        mt_srand($seed);
        $randstring = "";
        for ($i = 0; $i < $randStringLength; $i++) {
            $randstring .= mt_rand(0, 9);
        }
        return($randstring);
    }

    public function logout() {
        session_destroy();
        $this->load->view('logout');
    }

   
    
    //displays profile 
    public function profile($msg=NULL) {
        if (!empty($msg)) {
			$data['msg']='Profile Updated';
		}
        $id = $_SESSION['adminID'];
        $data['profile'] = $this->site->profile($id);
        if($_SESSION['role']==4){
        $this->load->view('headerProfileOperator');
		}elseif($_SESSION['role']==3){
		$this->load->view('headerProfileCashier');	
		}
		elseif($_SESSION['role']==2){
		$this->load->view('headerProfileSuper');
		}
		elseif($_SESSION['role']==1){
		$this->load->view('headerProfileSuper');	
		}
		elseif($_SESSION['role']==5){
		$this->load->view('headerProfileBf');	
		}
		elseif($_SESSION['role']==7){
		$this->load->view('headerProfileCustomer');	
		}
		elseif($_SESSION['role']==8){
		$this->load->view('headerProfileDesigner');	
		}
        $this->load->view('leftNav');
        $this->load->view('profile', $data);
        $this->load->view('footer');
        //}
    }

    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
