<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title>֧����ת��...</title>
</head>
<?php
include("../../config/conn.php");
include("../../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$sj=date("Y-m-d H:i:s");
include("../buycheck.php");
if(sqlzhuru($_POST[jvs])=="carpay"){
if($needmoney<=$usermoney){Audit_alert("���Ŀ��������㣬�������ֱ��֧����","../carpay.php?carid=".$carid);}
zwzr();
updatetable("yjcode_user","uqq='".sqlzhuru($_POST[tuqq])."' where uid='".$_SESSION[SHOPUSER]."'");
$bh=time();
$uip=$_SERVER["REMOTE_ADDR"];
$ddbh=time()."|".$rowuser[id];	
$money1=($needmoney*10-$usermoney*10)/10;
$buyformarr=sqlzhuru($_POST[buyformv]);
$shdzarr=sqlzhuru($_POST[shdzv]);
intotable("yjcode_dingdang","bh,ddbh,userid,sj,uip,money1,ddzt,alipayzt,bz,ifok,probh,pronum,tcid,buyform,shdz","'".$bh."','".$ddbh."',".$rowuser[id].",'".$sj."','".$uip."',".$money1.",'wait','','otherpay',0,'".$bharr."','".$numarr."','".$tcidarr."','".$buyformarr."','".$shdzarr."'");
}
require_once("epay.config.php");
require_once("lib/epay_submit.class.php");

		

/**************************�������**************************/
		
		//�̻�������
        $out_trade_no =$ddbh;//�̻���վ����ϵͳ��Ψһ�����ţ�����

        //��������
        $subject = 'recharge-'.time();

        //������
        $total_fee = $money1;//���� ��Ϊ����
		
		
		//�������첽֪ͨҳ��·��
        $notify_url = weburl."user/otherpay/buy_no_url.php";
        //��http://��ʽ������·�������ܼ�?id=123�����Զ������

        //ҳ����תͬ��֪ͨҳ��·��
        $return_url = weburl."user/sms_sell.php";
        //��http://��ʽ������·�������ܼ�?id=123�����Զ������������д��http://localhost/


/************************************************************/

//����Ҫ����Ĳ������飬����Ķ�
$parameter = array(
		"pid" => trim($alipay_config['partner']),
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