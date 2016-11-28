<?php
require_once "../WxpayAPI/WxpayAPI/lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once 'log.php';

$tools = new JsApiPay();
$openId = $tools->GetOpenid();
