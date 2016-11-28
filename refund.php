
<?php
ini_set('date.timezone','Asia/Shanghai');
error_reporting(E_ERROR);
require_once "../WxpayAPI/WxpayAPI/lib/WxPay.Api.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
	$transaction_id = $_REQUEST["transaction_id"];
	$total_fee = $_REQUEST["total_fee"];
	$refund_fee = $_REQUEST["refund_fee"];
	$input = new WxPayRefund();
	$input->SetTransaction_id($transaction_id);
	$input->SetTotal_fee($total_fee);
	$input->SetRefund_fee($refund_fee);
    $input->SetOut_refund_no(WxPayConfig::MCHID.date("YmdHis"));
    $input->SetOp_user_id(WxPayConfig::MCHID);
	$data=WxPayApi::refund($input);
	printf_info($data);
//////////////////////////////////////////////////////////////////退款插入
			   	$s="insert into `JingyueWechatRefund` (";
				$s1="";
				$s2="values(";
				$i=1;
		foreach($data as $key => $value)
	   {	
			if(!is_int($value))
			{
				$s1.="$key,";
				$s2.="'$value',";
			}
			else
			{
				$s1.="$key,";
				$s2.="$value,";
			}
			
    		
	   }
$s1=trim($s1,",");
	   $s1.=")";
$s2=trim($s2,",");
	   $s2.=")";

$s.=$s1." ".$s2;
/////////////////////////////////////////////////////////////////////////////////////////////////////
			$user="root";
		$pass=123456;
			try {
				$dbh = new PDO('mysql:host=localhost;dbname=jingyuewechat', $user, $pass);
				$stmt = $dbh->prepare($s);
				
				if($stmt->execute())
					//echo 'success';
					Log::DEBUG(" success:".$s);
				else
				   //echo 'fail';
					Log::DEBUG(" fail:".$s);				   
	    
				$dbh = null;
			} catch (PDOException $e) 
			{
				 Log::DEBUG("Error!: " . $e->getMessage());
				//die();
			}
	
/////////////////////////////////////////////////////////////////////////////////////////////////////////
	exit();
}

//$_REQUEST["out_trade_no"]= "122531270220150304194108";
///$_REQUEST["total_fee"]= "1";
//$_REQUEST["refund_fee"] = "1";
if(isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != ""){
	$out_trade_no = $_REQUEST["out_trade_no"];
	$total_fee = $_REQUEST["total_fee"];
	$refund_fee = $_REQUEST["refund_fee"];
	$input = new WxPayRefund();
	$input->SetOut_trade_no($out_trade_no);
	$input->SetTotal_fee($total_fee);
	$input->SetRefund_fee($refund_fee);
    $input->SetOut_refund_no(WxPayConfig::MCHID.date("YmdHis"));
    $input->SetOp_user_id(WxPayConfig::MCHID);
	$data=WxPayApi::refund($input);
	printf_info($data);
		////////////////////////////////////////////////退款插入
			   	$s="insert into `JingyueWechatRefund` (";
				$s1="";
				$s2="values(";
				$i=1;
		foreach($data as $key => $value)
	   {	
			if(!is_int($value))
			{
				$s1.="$key,";
				$s2.="'$value',";
			}
			else
			{
				$s1.="$key,";
				$s2.="$value,";
			}
			
    		
	   }
$s1=trim($s1,",");
	   $s1.=")";
$s2=trim($s2,",");
	   $s2.=")";

$s.=$s1." ".$s2;
/////////////////////////////////////////////////////////////////////////////////////////////////////
			$user="root";
		$pass=123456;
			try {
				$dbh = new PDO('mysql:host=localhost;dbname=jingyuewechat', $user, $pass);
				$stmt = $dbh->prepare($s);
				
				if($stmt->execute())
					//echo 'success';
					Log::DEBUG(" success:".$s);
				else
				   //echo 'fail';
					Log::DEBUG(" fail:".$s);				   
	    
				$dbh = null;
			} catch (PDOException $e) 
			{
				 Log::DEBUG("Error!: " . $e->getMessage());
				//die();
			}
	
	/////////////////////////////////////////////////////////////////////
	
	
	/////////////////////////////////////////////////////////////////////
	exit();
}
?>
