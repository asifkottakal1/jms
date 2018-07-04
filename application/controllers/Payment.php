<?php
class Payment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Mdl_payment');
	}

	public function index()
	{
		if(isset($_SESSION['userDetails']))
		{
			$paydet['data']=$this->Mdl_payment->get_payment($_SESSION['userDetails']['uniqid']);
			$this->load->view('user/header');
			if($paydet['data'])
			{
				$paydet['data']['flag']=1;
				$this->load->view('user/payment',$paydet);
			}
			else
			{
				$paydet['data']['flag']=0;
				$this->load->view('user/payment',$paydet);
			}
			$this->load->view('user/footer');
		}
		else
		{
			echo "<h2><center>404: Page not found</center></h2>";
		}
	}

	public function payumoney()
	{
		if(isset($_SESSION['userDetails']))
		{
			if($res=$this->Mdl_payment->get_userinfo($_SESSION['userDetails']['uniqid']))
			{
				$data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			    $data['email'] = $res[0]['email'];
			    $data['firstName'] = $res[0]['Firstname'];
			    $data['lastName'] = $res[0]['Lastname'];
			    $data['totalCost'] = 1000;
			    $data['paystatus'] = $res[0]['paystatus'];
			    $data['mobile'] = $res[0]['mobile'];
			    $data['uniqid'] = $_SESSION['userDetails']['uniqid'];
			    $data['hash']         = '';

			    //$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
			    $hash_string = MERCHANT_KEY."|".$data['txnid']."|".$data['totalCost']."|"."productinfo|".$data['firstName']."|".$data['email']."|".$_SESSION['userDetails']['uniqid']."||||||||||".SALT;
			    $data['hash'] = strtolower(hash('sha512', $hash_string));
			    $data['action'] = PAYU_BASE_URL . '/_payment';  
			    $this->load->view('user/payumoney',$data);
			}
			else
			{
				echo "<h2><center>Invalid User!</center></h2>";
			}
		}
		else
		{
			echo "<h2><center>404: Page not found</center></h2>";
		}
	}

	public function order_success()
	{
		$status = $this->input->post("status");
	    $firstname = $this->input->post("firstname");
	    $amount = $this->input->post("amount");
	    $txnid = $this->input->post("txnid");
	    $posted_hash = $this->input->post("hash");
	    $key = $this->input->post("key");
	    $productinfo = $this->input->post("productinfo");
	    $email = $this->input->post("email");
	    $uniqid = $this->input->post("udf1");
	    $salt = "IVUVYgtE70";

	    if ($this->input->post("additionalCharges")) {
	        $additionalCharges = $this->input->post("additionalCharges");
	        $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '||||||||||'.$uniqid.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
	    } else {

	        $retHashSeq = $salt . '|' . $status . '||||||||||'.$uniqid.'|' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
	    }
	    $hash = hash("sha512", $retHashSeq);

	    if ($hash != $posted_hash) {
	        $data['msg'] = "Invalid Transaction. Please try again";
	    } 
	    else 
	    {
	        // $data['msg'] = "<h3>Thank You. Your order status is " . $status . ".</h3>";
	        // $data['msg'] .= "<h4>Your Transaction ID for this transaction is " . $txnid . ".</h4>";
	        // $data['msg'] .= "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

	        $res=array('status'=>$status,'firstname'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'email'=>$email,'user_uniqid'=>$uniqid);
	    	if($this->Mdl_payment->add_payment($res))
	    	{
	    		$res['data']=array('status'=>$status,'firstname'=>$firstname,'amount'=>$amount,'txnid'=>$txnid,'email'=>$email,'user_uniqid'=>$uniqid);
	    		$this->load->view('user/order_success', $res);
	    	}
	    	else
	    	{
	    		echo "<center>An error occured! Please note you transaction ID: ".$txnid."</center>";
	    	}
	    }	    
	}

	public function order_fail()
	{
		$status = $this->input->post("status");
	    $firstname = $this->input->post("firstname");
	    $amount = $this->input->post("amount");
	    $txnid = $this->input->post("txnid");
	    $posted_hash = $this->input->post("hash");
	    $key = $this->input->post("key");
	    $productinfo = $this->input->post("productinfo");
	    $email = $this->input->post("email");
	    $salt = "fGxoywOg8S";
	    If ($this->input->post("additionalCharges")) {
	        $additionalCharges = $this->input->post("additionalCharges");
	        $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
	    } else {
	        $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
	    }
	    $hash = hash("sha512", $retHashSeq);
	    if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
	    } else {
	        $data['msg'] = "<h3>Your order status is " . $status . ".</h3>";
	        $data['msg'] .= "<h4>Your transaction id for this transaction is " . $txnid . ". You may try making the payment by clicking the link below.</h4>";
	    }
	    $data['msg'] .= '<p><a href="'.base_url().'"> Try Again</a></p>';
	    echo $data['msg'];
	}

}
?>