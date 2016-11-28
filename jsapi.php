
<?php 
if(isset($_POST['tmoney'])&&$_POST['tmoney']!=0&&isset($_POST['openid']))
{
ini_set('date.timezone','Asia/Shanghai');
//echo "the second";
//error_reporting(E_ERROR);
require_once "../WxpayAPI/WxpayAPI/lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';
//echo "before log";
//初始化日志
$logHandler= new CLogFileHandler("../WxpayAPI/WxpayAPI/logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
//echo "after log";
//打印输出数组信息
function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

Log::DEBUG("begin");
//①、获取用户openid
//$tools = new JsApiPay();
//$openId = $tools->GetOpenid();
//Log::DEBUG("openid :".$openId);
$openId=$_POST['openid'];

//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("test");
$input->SetAttach("test");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee($_POST['moenry']);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("test");
$input->SetNotify_url("http://jingyuetan.jingyue.gov.cn/WxpayAPI/WxpayAPI/example/notify.php");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);

//printf_info($order);
$jsApiParameters = $tools->GetJsApiParameters($order);



//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
 /*
echo " <script type='text/javascript'>	function jsApiCall()	{	WeixinJSBridge.invoke(		'getBrandWCPayRequest',	 $jsApiParameters,	function(res){WeixinJSBridge.log(res.err_msg);alert(res.err_code+res.err_desc+res.err_msg);});}function callpay(){if (typeof WeixinJSBridge == 'undefined'){if( document.addEventListener ){document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);}else if (document.attachEvent){ document.attachEvent('WeixinJSBridgeReady', jsApiCall);  document.attachEvent('onWeixinJSBridgeReady', jsApiCall);}}else{jsApiCall();}}</script>";

//............................................

if($order['return_code']=='success')
{
	echo "<script type='text/javascript'>if (window.confirm('已下单，是否确认支付？')) {callpay();} else { }</script>";
}
else{
	echo "<script type='text/javascript'>alert（'下单失败'）;</script>";
}
 echo "the last";
 */
}
else{echo "no isset";
	 echo isset($_POST['tmoney']);
}




   
   
   
   
   
   



   

	

		

