<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>֧����ת��...</title>
</head>
<?php
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
sesCheck();

require_once("epay.config.php");
require_once("lib/epay_submit.class.php");

$userid=returnuserid($_SESSION["SHOPUSER"]);
$sj=date("Y-m-d H:i:s");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$money1=sqlzhuru($_POST[t1]);
$ddbh=time().$userid.rnd_num(1000);	
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok","'".$bh."','".$ddbh."',".$userid.",'".$sj."','".$uip."',".$money1.",'wait','','otherpay',0");

		

/**************************�������**************************/
		
		//�̻�������
        $out_trade_no =$ddbh;//�̻���վ����ϵͳ��Ψһ�����ţ�����

        //������
        $total_fee = $money1;//���� ��Ϊ����

		//��Ʒ����
        $subject = 'recharge-'.time();
		
		//�������첽֪ͨҳ��·��
        $notify_url = weburl."user/otherpay/no_url.php";
        //��http://��ʽ������·�������ܼ�?id=123�����Զ������

        //ҳ����תͬ��֪ͨҳ��·��
        $return_url = weburl."user/paylog.php";
        //��http://��ʽ������·�������ܼ�?id=123�����Զ������������д��http://localhost/
       

/************************************************************/

//����Ҫ����Ĳ������飬����Ķ�
$parameter = array(
		"pid" => trim($alipay_config['partner']),
		"type" => 'qqpay',
		"notify_url"	=> $notify_url,
		"return_url"	=> $return_url,
		"out_trade_no"	=> $out_trade_no,
		"name"	=> $subject,
		"money"	=> $total_fee,
		"sitename"	=> 'youjiashop'
);

//��������
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,'POST','recharge');
echo $html_text;


?>
</body>
</html>