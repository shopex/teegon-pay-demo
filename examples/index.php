<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>支付</title>
</head>
<body>

<div  style="margin-left:40%; width:410px; height:50px; border-radius: 15px; border:0px #FE6714 solid; cursor: pointer;    font-size:26px;">天工收银扫码支付</div><br/>
<form action="TeegonPay.php" method="post">
	<div style="margin-left:2%;">订单号:</div><br/>
	<input style="width:30%;height:25px;margin-left:2%;" type="text" name="order_no" value="<?php echo substr(md5(time() . print_r($_SERVER, 1)), 0, 24)?>" /><br>
	<div style="margin-left:2%;">金额:</div><br/>
	<input style="width:30%;height:25px;margin-left:2%;" type="text" name="amount" value="0.01" /><br>
	<div style="margin-left:2%;">商品名:</div><br/>
	<input style="width:30%;height:25px;margin-left:2%;" type="text" name="subject" value="test" /><br>
	<div style="margin-left:2%;">渠道:</div><br/>
	<select style="width:30%;height:25px;margin-left:2%;" name="channel">
  		<option value="wxpaynative_pinganpay">微信支付</option>
 		<option value="alipay_pinganpay">支付宝</option>
  	 	<option value="jdh5_pinganpay">京东支付</option>
	</select>
	<div align="left" style="margin-top: 50px;margin-left:2%;width:30%;">
    	<input type="submit" style="width:100%; height:50px; border-radius: 15px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" value="支付">
    </div>
</form>

</body>
</html>