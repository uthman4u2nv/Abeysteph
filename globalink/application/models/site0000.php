<?php 

Class Site extends CI_Model {
    
	
	/** NEW ADDITIONS **/
	public function updatestatus($id){
		$data=array('print_status'=>1);
		$this->db->where('id',$id);
		return $this->db->update('job_order',$data);
	}
	public function getjobsformachinecount($date){
		$query=$this->db->query("SELECT a.id,a.cust_name,a.date,a.description,a.qty,d.name FROM job_order a,products b,transaction c,depts d WHERE a.job_type=b.id AND a.order_no=c.order_no AND a.dept=d.id AND (a.dept='3' or a.dept='4') AND a.date='$date' AND a.print_status='0' ");
		return $query->result_array();
	}
	public function getjobsformachinecountsearch($from,$to){
		$query=$this->db->query("SELECT a.id,a.cust_name,a.date,a.description,a.qty,d.name FROM job_order a,products b,transaction c,depts d WHERE a.job_type=b.id AND a.order_no=c.order_no AND a.dept=d.id AND (a.dept='3' or a.dept='4') AND a.date BETWEEN '$from' AND '$to' AND a.print_status='0' ");
		return $query->result_array();
	}
	public function getjobbytype($id,$date){
		$query=$this->db->query("SELECT b.name,SUM(a.s1*a.s2) as qty FROM job_order a,products b,transaction c WHERE a.job_type=b.id AND a.order_no=c.order_no  AND a.dept='$id' AND a.date='$date' group by a.job_type");
		return $query->result_array();
		
	}
	public function getjobbytypesearch($id,$from,$to){
		$query=$this->db->query("SELECT b.name,SUM(a.s1*a.s2) as qty FROM job_order a,products b,transaction c WHERE a.job_type=b.id AND a.order_no=c.order_no AND a.dept='$id' AND a.date BETWEEN '$from' AND '$to' group by a.job_type");
		return $query->result_array();
		
	}
	public function getjobbytype2($id,$date){
		$query=$this->db->query("SELECT b.name,SUM(a.qty) as qty FROM job_order a,products b,transaction c WHERE a.job_type=b.id AND a.order_no=c.order_no AND a.dept='$id' AND a.date='$date' AND a.print_status='1' group by a.job_type");
		return $query->result_array();
		
	}
	public function getjobbytype2search($id,$from,$to){
		$query=$this->db->query("SELECT b.name,SUM(a.qty) as qty FROM job_order a,products b,transaction c WHERE a.job_type=b.id AND a.order_no=c.order_no AND a.dept='$id' AND a.date BETWEEN '$from' AND '$to' AND a.print_status='1' group by a.job_type");
		return $query->result_array();
		
	}
	public function getStockHistoryAssigned(){
		$query=$this->db->query("SELECT * FROM admin a,stockhistory b WHERE a.id=b.adminID");
		return $query->result_array();
	}
	public function getlargeformatjobs(){
		$query=$this->db->query("SELECT a.order_no,a.id,a.cust_name,a.date,a.description,a.s1,a.s2 FROM job_order a,transaction b WHERE a.order_no=b.order_no AND a.DATE <= ( NOW( )) AND a.DATE >= ( NOW( ) - INTERVAL 2880 MINUTE ) AND (a.dept='1' or a.dept='3') order by a.date DESC ");
		return $query->result_array();
	}
	
	public function getjobdetails($id){
		$this->db->where('id',$id);
		return $this->db->get('job_order')->result_array();
	}
	public function getlargeformatstaff(){
		$query=$this->db->query("SELECT * FROM admin WHERE user_type='10' OR user_type='13'");
		return $query->result_array();
	}
	public function getStaffDetails($id){
		$this->db->where('id',$id);
		return $this->db->get('admin')->result_array();
	}
	public function updatestockbalance($id,$newbalance){
		$data=array('stockbalance'=>$newbalance);
		$this->db->where('id',$id);
		return $this->db->update('admin',$data);
	}
	public function insertstockhistory($id,$qty,$date){
		$data=array('adminID'=>$id,'In'=>$qty,'stockDate'=>$date);
		return $this->db->insert('stockhistory',$data);
	}
	public function insertstockhistory2($id,$qty,$date,$orderNo,$jobId){
		$data=array('adminID'=>$id,'Out'=>$qty,'stockDate'=>$date,'orderNo'=>$orderNo,'jobID'=>$jobId);
		return $this->db->insert('stockhistory',$data);
	}
	public function staffstockDetails($id){
		$this->db->where('adminID',$id);
		return $this->db->get('stockhistory')->result_array();
	}
	 public function getExpenses($date,$user_id){
        $query=$this->db->query("SELECT * FROM expenses WHERE expensesDate='$date' AND expensesBy='$user_id'");
        return $query->result_array();
    }
	public function deleteExp($id)
	{
    $this->db->where('expensesID',$id);
    return $this->db->delete('expenses');
	}
public function addExpenses($expensesName,$expensesDesc,$expensesAmt,$expensesDate,$expensesBy){
    $data=array('expenses'=>$expensesName,'expensesDesc'=>$expensesDesc,'expensesAmt'=>$expensesAmt,'expensesDate'=>$expensesDate,'expensesBy'=>$expensesBy);
    return $this->db->insert('expenses',$data);
}
public function addExpensesx($expensesName,$expensesDesc,$expensesAmt,$expensesDate,$expensesBy,$jobNo){
    $data=array('expenses'=>$expensesName,'expensesDesc'=>$expensesDesc,'expensesAmt'=>$expensesAmt,'expensesDate'=>$expensesDate,'expensesBy'=>$expensesBy,'jobNo'=>$jobNo);
    return $this->db->insert('expenses',$data);
}
public function getExpenses2($from,$to,$user_id){
        $query=$this->db->query("SELECT * FROM expenses WHERE expensesDate BETWEEN '$from' AND '$to' AND expensesBy='$user_id'");
        return $query->result_array();
    }
	
	public function loadOtherOfficeSales($date){
		$query=$this->db->query("SELECT * FROM sales WHERE salesDate='$date'");
		//return $this->db->get('sales')
		return $query->result_array();
	}
	public function loadOtherOfficeSalesSearch($from,$to){
		$query=$this->db->query("SELECT * FROM sales WHERE salesDate BETWEEN '$from' AND '$to'");
		//return $this->db->get('sales')->result_array();
		return $query->result_array();
	}
	
	
	public function spoolExpenses($date){
		$this->db->where('expensesDate',$date);
		return $this->db->get('expenses')->result_array();
	}
	public function spoolExpenses2($from,$to){
		$query=$this->db->query("SELECT * FROM expenses WHERE expensesDate BETWEEN '$from' AND '$to'");
		return $query->result_array();
		//$this->db->where('expensesDate',$date);
		//return $this->db->get('expenses')->result_array();
	}
	/** END NEW ADDITIONS **/
	public function checkEmail($email){
		$this->db->select();
		$this->db->from('members');
		$this->db->where('emailAddress',$email);
		$query=$this->db->get();
		return $query->num_rows();
		}  
		public function insertJobOrder22($custName,$custPhone,$desc,$date,$adminID,$jobType,$dept,$qty,$totalCost,$orderNo,$designer,$cashier){
			$data=array('cust_name'=>$custName,'cust_phone'=>$custPhone,'description'=>$desc,'date'=>$date,'generated_by'=>$adminID,'job_type'=>$jobType,'dept'=>$dept,'qty'=>$qty,'total_amount'=>$totalCost,'order_no'=>$orderNo,'designer'=>$designer,'cashier'=>$cashier);
			return $this->db->insert('job_order_tmp',$data);
		}
		public function insertJobOrder22x($custName,$custPhone,$desc,$date,$adminID,$jobType,$dept,$qty,$totalCost,$orderNo,$designer,$cashier,$s1,$s2){
			$data=array('cust_name'=>$custName,'cust_phone'=>$custPhone,'description'=>$desc,'date'=>$date,'generated_by'=>$adminID,'job_type'=>$jobType,'dept'=>$dept,'qty'=>$qty,'total_amount'=>$totalCost,'order_no'=>$orderNo,'designer'=>$designer,'cashier'=>$cashier,'s1'=>$s1,'s2'=>$s2);
			return $this->db->insert('job_order_tmp',$data);
		}
		public function retrieveTmpOrders($order_no){
			$this->db->where('order_no',$order_no);
			return $this->db->get('job_order_tmp')->result_array();
		}
		
		public function deleteJobOrderItem($id){
			$this->db->where('id',$id);
			return $this->db->delete('job_order_tmp');
		}
		
		public function retrieveTransaction($date){
			$query=$this->db->query("SELECT * FROM transaction b,job_order a,depts c,products d,admin e WHERE a.order_no=b.order_no AND b.entered_by=e.id AND a.dept=c.id AND a.job_type=d.id AND a.date='$date' AND (b.status='Paid' OR b.status='Fully Paid')  ORDER BY a.id DESC ");
			return $query->result_array();
		}
		public function retrieveTransaction2x($date){
			$query=$this->db->query("SELECT * FROM transaction b,job_order a,depts c,products d,admin e WHERE a.order_no=b.order_no AND b.entered_by=e.id AND a.dept=c.id AND a.job_type=d.id AND a.date='$date' AND (b.status='Paid' OR b.status='Fully Paid') GROUP BY b.order_no ORDER BY a.id DESC ");
			return $query->result_array();
		}
		public function retrieveStaffSales($id,$date){
			//$query=$this->db->query("SELECT * FROM transaction b,job_order a,depts c,products d,admin e WHERE a.order_no=b.order_no AND b.entered_by=e.id AND a.dept=c.id AND a.job_type=d.id AND a.date='$date' AND (b.status='Paid' OR b.status='Fully Paid') GROUP BY b.order_no ORDER BY a.id DESC ");
			$query=$this->db->query("SELECT  SUM(amount_paid) as amt,a.surname,a.othernames,a.dept FROM admin a,transaction b WHERE a.id=b.entered_by AND b.date='$date' AND a.user_type='$id' GROUP BY b.entered_by");
			return $query->result_array();
		}
		public function retrieveStaffSales2($id,$from,$to){
			$query=$this->db->query("SELECT DISTINCT SUM(amount_paid) as amt,a.surname,a.othernames,a.dept FROM admin a,transaction b WHERE a.id=b.entered_by AND b.date BETWEEN '$from' AND '$to' AND a.user_type='$id' GROUP BY b.entered_by");
			return $query->result_array();
		}
		public function getCashier(){
			$this->db->where('user_type',3);
			return $this->db->get('admin')->result_array();
		}
		public function getOperatorzz(){
			$this->db->where('user_type',4);
			return $this->db->get('admin')->result_array();
		}
		public function getBF(){
			$this->db->where('user_type',5);
			return $this->db->get('admin')->result_array();
		}
		public function insertStaff($title,$surname,$othernames,$sex,$usertype,$dept,$username,$password){
			$data=array('title'=>$title,'surname'=>$surname,'othernames'=>$othernames,'sex'=>$sex,'user_type'=>$usertype,'dept'=>$dept,'status'=>1,'username'=>$username,'password'=>$password);
			return $this->db->insert('admin',$data);
		}
		public function insertStaffNew($title,$surname,$othernames,$sex,$usertype,$dept,$username,$password,$office){
			$data=array('title'=>$title,'surname'=>$surname,'othernames'=>$othernames,'sex'=>$sex,'user_type'=>$usertype,'dept'=>$dept,'status'=>1,'username'=>$username,'password'=>$password,'office'=>$office);
			return $this->db->insert('admin',$data);
		}
		public function loadSales($date,$adminID){
			$query=$this->db->query("SELECT * FROM sales a,paymentmethod b WHERE a.salesMethod=b.methodID AND a.salesDate='$date' AND a.salesBy='$adminID'");
			return $query->result_array();
			
		}
		public function insertSales($salesDate,$salesStore,$salesMethod,$salesDescription,$salesOrderNo,$salesBy,$salesAmount){
			$data=array('salesDate'=>$salesDate,'salesStore'=>$salesStore,'salesMethod'=>$salesMethod,'salesDescription'=>$salesDescription,'salesOrderNo'=>$salesOrderNo,'salesBy'=>$salesBy,'salesAmount'=>$salesAmount);
			return $this->db->insert('sales',$data);
		}
		public function deleteSales($salesID){
			$this->db->where('salesID',$salesID);
			return $this->db->delete('sales');
		}
		public function updateStaff($id,$title,$surname,$othernames,$sex,$usertype,$dept,$username,$password){
			$data=array('title'=>$title,'surname'=>$surname,'othernames'=>$othernames,'sex'=>$sex,'user_type'=>$usertype,'dept'=>$dept,'status'=>1,'username'=>$username,'password'=>$password);
			$this->db->where('id',$id);
			return $this->db->update('admin',$data);
		}
		public function updateStaffNew($id,$title,$surname,$othernames,$sex,$usertype,$dept,$username,$password,$office){
			$data=array('title'=>$title,'surname'=>$surname,'othernames'=>$othernames,'sex'=>$sex,'user_type'=>$usertype,'dept'=>$dept,'status'=>1,'username'=>$username,'password'=>$password,'office'=>$office);
			$this->db->where('id',$id);
			return $this->db->update('admin',$data);
		}
		public function insertPayrollStaff($name,$dob,$phone,$email,$sex,$address,$salary,$status,$username,$password,$bank,$accountName,$accountNo,$dept){
			$data=array('name'=>$name,'dob'=>$dob,'phone'=>$phone,'email'=>$email,'sex'=>$sex,'address'=>$address,'salary'=>$salary,'status'=>$status,'username'=>$username,'password'=>$password,'bank'=>$bank,'accountName'=>$accountName,'accountNo'=>$accountNo,'departmentID'=>$dept);
			return $this->db->insert('staff',$data);
		}
		public function getStaff2($id){
			$query=$this->db->query("SELECT * FROM staff a,bank b WHERE a.bank=b.bankID AND a.staffID='$id'");
			
			return $query->result_array();
		}
		public function updatePayrollStaff($id,$name,$dob,$phone,$email,$sex,$address,$salary,$status,$username,$password,$bank,$accountName,$accountNo,$statusz,$dept){
			$data=array('name'=>$name,'dob'=>$dob,'phone'=>$phone,'email'=>$email,'sex'=>$sex,'address'=>$address,'salary'=>$salary,'status'=>$status,'username'=>$username,'password'=>$password,'bank'=>$bank,'accountName'=>$accountName,'accountNo'=>$accountNo,'status'=>$status,'departmentID'=>$dept);
			$this->db->where('staffID',$id);
			return $this->db->update('staff',$data);
		}
		public function getRecurrentDeductions($staffID){
			$this->db->where('staffID',$staffID);
			$this->db->where('recurrent',1);
			$this->db->where('status',1);
			return $this->db->get('deductions')->result_array();
		}
		public function getDeduction22($id){
			$this->db->where('deductionID',$id);
			return $this->db->get('deductions')->result_array();
		}
		public function loadEnquiries($date){
			$query=$this->db->query("SELECT * FROM enquiries a,admin b WHERE a.enteredBy=b.id AND a.enqDate='$date' GROUP BY a.enqNo");
			return $query->result_array();
			
		}
		public function insertEnqTmp($enqNo,$name,$phone,$item,$amount,$date,$entered_by){
			$data=array('enqNo'=>$enqNo,'enqName'=>$name,'enqPhone'=>$phone,'enqItem'=>$item,'enqAmount'=>$amount,'enqDate'=>$date,'enteredby'=>$entered_by);
			return $this->db->insert('enquiries_tmp',$data);
		}
		public function insertEnqTmpxy($enqNo,$name,$phone,$item,$amount,$date,$entered_by,$qty,$price){
			$data=array('enqNo'=>$enqNo,'enqName'=>$name,'enqPhone'=>$phone,'enqItem'=>$item,'enqAmount'=>$amount,'enqDate'=>$date,'enteredby'=>$entered_by,'enqQty'=>$qty,'enqPrice'=>$price);
			return $this->db->insert('enquiries_tmp',$data);
		}
		public function enterEnq($enqNo,$name,$phone,$item,$amount,$date,$entered_by){
			$data=array('enqNo'=>$enqNo,'enqName'=>$name,'enqPhone'=>$phone,'enqItem'=>$item,'enqAmount'=>$amount,'enqDate'=>$date,'enteredby'=>$entered_by);
			return $this->db->insert('enquiries',$data);
		}
		public function enterEnqxy($enqNo,$name,$phone,$item,$amount,$date,$entered_by,$enqQty,$enqPrice){
			$data=array('enqNo'=>$enqNo,'enqName'=>$name,'enqPhone'=>$phone,'enqItem'=>$item,'enqAmount'=>$amount,'enqDate'=>$date,'enteredby'=>$entered_by,'enqQty'=>$enqQty,'enqPrice'=>$enqPrice);
			return $this->db->insert('enquiries',$data);
		}
		public function deleteEnq($enqNo){
			$this->db->where('enqNo',$enqNo);
			return $this->db->delete('enquiries_tmp');
		}
		public function auditorUpdate($difference,$remark,$order_no){
			$data=array('difference'=>$difference,'auditorRemark'=>$remark);
			$this->db->where('order_no',$order_no);
			return $this->db->update('job_order',$data);
		}
		
		public function retrieveEnqTmp($enqNo){
			$this->db->where('enqNo',$enqNo);
			return $this->db->get('enquiries_tmp')->result_array();
		}
		public function retrieveEnq($enqNo){
			$this->db->where('enqNo',$enqNo);
			return $this->db->get('enquiries')->result_array();
		}
		public function searchJob($from,$to,$dept){
			$query=$this->db->query("SELECT * FROM transaction b,job_order a,depts c,products d,admin e WHERE a.order_no=b.order_no AND b.entered_by=e.id AND a.dept=c.id AND a.job_type=d.id AND (b.status='Paid' OR b.status='Fully Paid') AND a.date BETWEEN '$from' AND '$to' AND a.dept='$dept' GROUP BY b.order_no ORDER BY a.id DESC");
			return $query->result_array();
		}
		public function auditorGetJob($order_no){
			$query=$this->db->query("SELECT * FROM job_order a,products b WHERE a.job_type=b.id AND a.order_no='$order_no'");
			return $query->result_array();
		}
		public function getStaffPayslip($staffID,$month,$year){
			$this->db->where('staffID',$staffID);
			$this->db->where('month',$month);
			$this->db->where('year',$year);
			return $this->db->get('payslip')->result_array();
		}
		public function staffPaySlip($staffID){
			$query=$this->db->query("SELECT * FROM payslip WHERE staffID='$staffID' GROUP BY month");
			return $query->result_array();
		}
		public function updateDeduction($deductionID,$item,$amount,$recurrent,$status,$month,$year){
			$data=array('item'=>$item,'amount'=>$amount,'recurrent'=>$recurrent,'status'=>$status,'month'=>$month,'year'=>$year);
			$this->db->where('deductionID',$deductionID);
			return $this->db->update('deductions',$data);
		}
		public function insertDeduction($date,$item,$amount,$recurrent,$status,$month,$year,$staffID){
			$data=array('item'=>$item,'amount'=>$amount,'recurrent'=>$recurrent,'status'=>$status,'month'=>$month,'year'=>$year,'staffID'=>$staffID,'date'=>$date);
			return $this->db->insert('deductions',$data);
		}
		public function deletePayroll($month,$year){
			$this->db->where('month',$month);
			$this->db->where('year',$year);
			return $this->db->delete('payslip');
		}
		public function checkPayroll($month,$year){
			$this->db->where('month',$month);
			$this->db->where('year',$year);
			$query=$this->db->get('payslip');
			return $query->num_rows();
		}
		public function getAllStaff(){
			$this->db->where('status',1);
			return $this->db->get('staff')->result_array();
		}
		public function insertStaffSalary($item,$type,$month,$year,$amount,$staffID){
			$data=array('item'=>$item,'type'=>$type,'month'=>$month,'year'=>$year,'amount'=>$amount,'staffID'=>$staffID);
			return $this->db->insert('payslip',$data);
		}
		public function generatePayslip($month,$year){
			$query=$this->db->query("SELECt * FROM payslip WHERE month='$month' AND year='$year' ORDER BY type DESC");
			return $query->result_array();
		}
		public function getDeductionForPayslip($month,$year){
			$this->db->where('status',1);
			$this->db->where('month',$month);
			$this->db->where('year',$year);
			return $this->db->get('deductions')->result_array();
		}
		public function getDeduction($staffID){
			$query=$this->db->query("SELECt * FROM deductions WHERE staffID='$staffID' AND recurrent='0' AND status='1'");
			return $query->result_array();
			//$this->db->where('staffID',$staffID);
			//$this->db->where('recurrent',0);
			//$this->db->where('status',1);
			//return $this->db->get('deductions')->result_array();
		}
		public function getActiveStaff(){
			$query=$this->db->query("SELECT * FROM staff a,bank b WHERE a.bank=b.bankID AND a.status=1");
			return $query->result_array();
			//$this->db->where('status',1);
			//return $this->db->get('staff')->result_array();
		}
		public function getStaff($id){
			$this->db->where('id',$id);
			return $this->db->get('admin')->result_array();
		}
         
        //Authenticate a returning applicant
        public function authenticate22($username,$password){
			//$query=$this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' AND status='1'");
			//return $query->result_array();
            $this->db->select();
            $this->db->from('admin');
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $this->db->where('status',1);
           return $this->db->get()->result_array();
            
                
        }
        public function checkMyLogin22($username,$password){
            $this->db->where('username',$username);
            $this->db->where('password',$password);
            $this->db->where('status',1);
            $query=$this->db->get('admin');
            return $query->num_rows();
        }
        
        
        //selects all from a table
        public function getAll($table){
            return $this->db->get($table)->result_array();
        }
        public function getMany($table,$value,$field){
            $this->db->where($field,$value);
            return $this->db->get($table)->result_array();
        }
        //updates profile
        public function updateProfile($compName, $compAddress, $compEmail, $compPhone, $contact, $compPassword,$compId){
           $data=array('mycomp_address'=>$compAddress,'mycomp_name'=>$compName,'mycomp_email'=>$compEmail,'mycomp_phone'=>$compPhone,'mycomp_password'=>$compPassword,'mycomp_contact'=>$contact);
           $this->db->where('id',$compId); 
           return $this->db->update('company',$data); 
            
        }
        //returns profile
        public function profile($id){
            $this->db->where('id',$id);
            return $this->db->get('admin')->result_array();
        }
		public function updateAreaOffice($name,$address,$email,$phone,$state,$manager,$password,$status,$id){
			$data=array('areaofficeName'=>$name,'areaofficeAddress'=>$address,'areaofficeEmail'=>$email,'areaofficePhone'=>$phone,'areaofficeState'=>$state,'areaofficeManager'=>$manager,'areaofficePassword'=>$password,'areaofficeStatus'=>$status);
			$this->db->where('areaofficeID',$id);
			return $this->db->update('areaoffice',$data);
		}
		public function profile223($app_num){
            $this->db->where('app_num',$app_num);
            return $this->db->get('admin')->result_array();
        }
		
		public function getDesigner($dept){
			$this->db->where('dept',$dept);
			$this->db->where('user_type',8);
			return $this->db->get('admin')->result_array();
		}
		
		public function loadJobs($dept,$date,$adminID){
			$this->db->where('date',$date);
			$this->db->where('dept',$dept);
			$this->db->where('cashier',$adminID);
			return $this->db->get('job_order')->result_array();
		}
		public function loadPrintSuper($dept,$date){
			$query=$this->db->query("SELECT * FROM job_order a,transaction b,admin c,depts d WHERE a.order_no=b.order_no AND c.dept=d.id AND a.dept=d.id AND a.dept='$dept' AND a.machine=c.id AND b.date='$date'");
			
			return $query->result_array();
		}
		public function updatePrint($machine,$status,$order_no){
			$data=array('machine'=>$machine,'print_status'=>$status);
			$this->db->where('order_no',$order_no);
			return $this->db->update('job_order',$data);
		}
		public function loadPrint($orderNo,$dept){
			$date=date("Y-m-d");
			$query=$this->db->query("SELECt * FROM job_order WHERE order_no='$orderNo' AND dept='$dept' AND date='$date'");
			return $query->result_array();
		}
		public function loadMachine($dept,$usertype){
			$this->db->where('dept',$dept);
			$this->db->where('user_type',$usertype);
			return $this->db->get('admin')->result_array();
		}
		public function loadJobsByDate($dept,$from,$to,$adminID){
			$query=$this->db->query("SELECT * FROM job_order WHERE date BETWEEN '$from' AND '$to' AND cashier='$adminID' AND dept='$dept'");
			return $query->result_array();
		}
		public function checkJob($order_no){
			$this->db->where('order_no',$order_no);
			return $this->db->get('job_order')->num_rows();
		}
		public function getBFManagerEntry($date){
			$query=$this->db->query("SELECT * FROM job_order a,transaction b,admin c,depts d WHERE a.order_no=b.order_no AND c.dept=d.id AND b.entered_by=c.id AND c.user_type='5' AND b.date='$date'");
			return $query->result_array();
		}
		public function getBFManagerEntry2($from,$to){
			$query=$this->db->query("SELECT * FROM job_order a,transaction b,admin c, depts d WHERE a.order_no=b.order_no AND c.dept=d.id AND b.entered_by=c.id AND c.user_type='5' AND b.date BETWEEN '$from' AND '$to' ");
			return $query->result_array();
		}
		public function checkJob2($order_no,$total_cost,$amount,$entered_by,$balance,$date){
			$this->db->where('order_no',$order_no);
			$this->db->where('total_cost',$total_cost);
			$this->db->where('amount_paid',$amount);
			$this->db->where('balance',$balance);
			$this->db->where('entered_by',$entered_by);
			$this->db->where('date',$date);
			return $this->db->get('transaction')->num_rows();
		}
		
		public function loadBF($dept){
			$date=date('Y-m-d');
			//$query=$this->db->query("SELECT * FROM job_order a,products b WHERE a.job_type=b.id AND a.dept='$dept' AND a.balance >0 AND a.date <'$date' ORDER BY a.date DESC");
			$query=$this->db->query("SELECT * FROM transaction t,job_order j WHERE t.order_no=j.order_no AND j.dept='$dept' AND j.balance > '0' AND j.date <'$date'  GROUP BY j.order_no ORDER BY j.date DESC");
			return $query->result_array();
			
		}
		public function loadBFx($dept){
			$date=date('Y-m-d');
			//$query=$this->db->query("SELECT * FROM job_order a,products b WHERE a.job_type=b.id AND a.dept='$dept' AND a.balance >0 AND a.date <'$date' ORDER BY a.date DESC");
			$query=$this->db->query("SELECT * FROM transaction t,job_order j WHERE t.order_no=j.order_no AND j.dept='$dept' AND j.balance > '0' AND j.date <'$date' AND j.bff='0'  GROUP BY j.order_no ORDER BY j.date DESC");
			return $query->result_array();
			
		}
		public function delBF($order_no){
			$data=array('bff'=>1);
			$this->db->where('order_no',$order_no);
			return $this->db->update('job_order',$data);
		}
		public function loadBF22(){
			$date=date('Y-m-d');
			//$query=$this->db->query("SELECT * FROM job_order a,products b WHERE a.job_type=b.id AND a.balance >0 AND a.date <'$date' ORDER BY a.date DESC");
			$query=$this->db->query("SELECT * FROM transaction t,job_order j,admin a WHERE t.order_no=j.order_no AND j.generated_by=a.id AND j.balance > '0' AND j.date <'$date' GROUP BY j.order_no ORDER BY j.date DESC");
			return $query->result_array();
			
		}
		public function insertJobOrder($custName,$custPhone,$desc,$date,$adminID,$jobType,$dept,$qty,$totalCost,$orderNo,$designer,$cashier){
			$data=array('cust_name'=>$custName,'cust_phone'=>$custPhone,'description'=>$desc,'date'=>$date,'generated_by'=>$adminID,'job_type'=>$jobType,'dept'=>$dept,'qty'=>$qty,'total_amount'=>$totalCost,'order_no'=>$orderNo,'designer'=>$designer,'cashier'=>$cashier);
			return $this->db->insert('job_order',$data);
		}
		public function insertJobOrderxy($custName,$custPhone,$desc,$date,$adminID,$jobType,$dept,$qty,$totalCost,$orderNo,$designer,$cashier,$s1,$s2){
			$data=array('cust_name'=>$custName,'cust_phone'=>$custPhone,'description'=>$desc,'date'=>$date,'generated_by'=>$adminID,'job_type'=>$jobType,'dept'=>$dept,'qty'=>$qty,'total_amount'=>$totalCost,'order_no'=>$orderNo,'designer'=>$designer,'cashier'=>$cashier,'s1'=>$s1,'s2'=>$s2);
			return $this->db->insert('job_order',$data);
		}
		
		public function retrieveMyJobOrder($adminID,$date){
			$query=$this->db->query("SELECT * FROM job_order a,products b WHERE a.job_type=b.id AND a.generated_by='$adminID' AND a.date='$date'");
			return $query->result_array();	
			
		}
		public function checkSent($phone,$order_no){
			$query=$this->db->query("SELECt * FROM sms WHERE smsPhone='$phone' AND order_no='$order_no'");
			return $query->num_rows();
		}
		public function logSMS($phone,$order_no,$date,$msg){
			$data=array('smsPhone'=>$phone,'order_no'=>$order_no,'smsDate'=>$date,'smsMsg'=>$msg);
			return $this->db->insert('sms',$data);
		}
		public function retrieveJobOrder($order_no){
			$this->db->where('order_no',$order_no);
			return $this->db->get('job_order')->result_array();
		}
		public function updateJobOrder($order_no,$amount,$balance,$remarks){
			$data=array('advance'=>$amount,'balance'=>$balance,'remarks'=>$remarks);
			$this->db->where('order_no',$order_no);
			return $this->db->update('job_order',$data);
		}
		public function insertTrans($order_no,$date,$total_cost,$amount,$balance,$status,$entered_by){
			$data=array('order_no'=>$order_no,'date'=>$date,'total_cost'=>$total_cost,'amount_paid'=>$amount,'balance'=>$balance,'status'=>$status,'entered_by'=>$entered_by);
			return $this->db->insert('transaction',$data);
		}
		public function insertTransNew($order_no,$date,$total_cost,$amount,$balance,$status,$entered_by,$method){
			$data=array('order_no'=>$order_no,'date'=>$date,'total_cost'=>$total_cost,'amount_paid'=>$amount,'balance'=>$balance,'status'=>$status,'entered_by'=>$entered_by,'paymethod'=>$method);
			return $this->db->insert('transaction',$data);
		}
		public function insertReceipt($order_no,$date,$amount,$entered_by){
			$data=array('order_no'=>$order_no,'date'=>$date,'amount'=>$amount,'entered_by'=>$entered_by);
			return $this->db->insert('receipts',$data);
		}
		public function getTrans($order_no,$date){
			$this->db->where('date',$date);
			$this->db->where('order_no',$order_no);
			return $this->db->get('job_order')->result_array();
		}
		public function getTrans22($order_no){
			//$this->db->where('date',$date);
			$this->db->where('order_no',$order_no);
			return $this->db->get('job_order')->result_array();
		}
		public function getTransBF($order_no){
			$this->db->where('order_no',$order_no);
			return $this->db->get('job_order')->result_array();
		}
		public function loadStaff($dept,$role){
			$this->db->where('dept',$dept);
			$this->db->where('user_type',$role);
			return $this->db->get('admin')->result_array();
		}
		public function searchJobOrder($from,$to,$adminID){
			$query=$this->db->query("SELECT * FROM job_order a,products b WHERE a.job_type=b.id AND a.generated_by='$adminID' AND date BETWEEN '$from' AND '$to'");
			return $query->result_array();
		}
		public function checkUsername($adminID,$username){
			$query=$this->db->query("SELECT username FROM admin WHERE username='$username' AND id !='$adminID'");
			return $query->num_rows();
		}
		
		public function updateMyProfile($surname,$othernames,$sex,$username,$password,$id){
			$this->db->where('id',$id);
			$data=array('surname'=>$surname,'othernames'=>$othernames,'sex'=>$sex,'username'=>$username,'password'=>$password);
			return $this->db->update('admin',$data);
		}
		
		public function executeQuery($query){
			$query=$this->db->query($query);
			return $query->result_array();
		}
		public function g($date,$dept){
			$query=$this->db->query("SELECT * FROM job_order a,transaction b WHERE a.order_no=b.order_no AND a.dept='$dept' AND a.date='$date'");
			return $query->result_array();
			//$this->db->where('dept',$dept);
			//$this->db->where('date',$date);
			//return $this->db->get('job_order')->result_array();
		}
		
        
        //returns any particular
        public function getAny($table,$value,$field,$output){
            $this->db->where($field,$value);
            $query=$this->db->get($table);
            $row=$query->row_array();
            return $row["$output"];
        }
		
		public function getJobTypes($id){
			$this->db->where('dept',$id);
			return $this->db->get('products')->result_array();
		}
       
}