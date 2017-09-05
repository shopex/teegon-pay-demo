<?php

require_once(__DIR__ . '/../src/TeegonClient.php');

class TeegonPay{
	
	private $client =null;
	function __construct()
	{
		# code...
		$this->client = new TeegonClient();
	}

	/*
	 扫码支付
	 参数 
	 		order_no:订单号
			 channel:支付渠道
			 return_url:支付成功调转url
			 amount:金额
			 subject：商品名
			 notify_url：回调通知地址
			 client_ip:ip
	返回
			{
		    "ecode": 0,
		    "emsg": "",
		    "result": {
		        "charge_id": "8anll0xxbkecxwqdbmg9u0nq", //支付单号
		        "domain_id": "cv3qxd0o",
		        "order_no": "dde970279d1dc2889079327b", 订单号
		        "amount": 0.01,
		        "channel": "wxpaynative_pinganpay",
		        "subject": "支付0.01",
		        "device_id": "",
		        "paid": false, //是否支付
		        "created": 1503996298,
		        "refund": false,
		        "transaction_no": "",
		        "action": {
		            "type": "url",
		            "url": "https://api.teegon.com/app/checkout/open?id=8anll0xxbkecxwqdbmg9u0nq&channel=wxpaynative_pinganpay&j=", //扫码支付地址(如果为H5支付，则为移动支付地址)
		            "params": null
		        }
		    }
		}		 
	*/
	public function paycode()
	{
		// 
		$path = 'teegon.payment.charge.paycode';
		$params = array(
            'order_no' =>$_POST['order_no'],
            'channel' =>$_POST['channel'],
            'return_url' => 'http://www.baidu.com',
            'amount' => $_POST['amount'],
            'subject' =>$_POST['subject'],
            'metadata' => '',
            'notify_url' => 'http://www.baidu.com',
            'client_ip' => $_SERVER['REMOTE_ADDR']
            );
       // print_r($params);
		$res = $this->client->post($path,$params);
		$new_res = json_decode($res,true);
		if ($new_res['ecode'] != 0){
			echo $new_res['emsg'];
			return;
		}

		$url = $new_res['result']['action']['url'];

		echo "<script>window.location.href='$url'</script>";
	}
}

$teegon_pay = new TeegonPay();
$teegon_pay->paycode();