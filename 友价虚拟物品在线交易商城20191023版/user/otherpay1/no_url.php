<?php
/* *
 * ���ܣ��������첽֪ͨҳ��
 */
include("../../config/conn.php");
include("../../config/function.php");


require_once("epay.config.php");
require_once("lib/epay_notify.class.php");

//����ó�֪ͨ��֤���
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//��֤�ɹ�
	/////////////////////////////////////////////////////////
	
	//�̻�������

	$out_trade_no = $_GET['out_trade_no'];

	//�ʺ���֧�����׺�

	$trade_no = $_GET['trade_no'];

	//�۸�
	$money = $_GET['money'];

$sj=date("Y-m-d H:i:s");
$uip=$_SERVER["REMOTE_ADDR"];
while1("*","yjcode_dingdang where ddbh='".$out_trade_no."' and ddzt='wait'");if($row1=mysql_fetch_array($res1)){
 updatetable("yjcode_dingdang","sj='".$sj."',uip='".$uip."',alipayzt='TRADE_SUCCESS',ddzt='suc',ifok=1 where id=".$row1[id]);
 $money1=$row1["money1"];
 PointIntoM($row1[userid],"v֧����ֵ".$money1."Ԫ",$money1);
 PointUpdateM($row1[userid],$money1);
}

   
        
	echo "success";		//�벻Ҫ�޸Ļ�ɾ��
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //��֤ʧ��
    echo "fail";//�벻Ҫ�޸Ļ�ɾ��

    //�����ã�д�ı�������¼������������Ƿ�����
    //logResult("����д����Ҫ���ԵĴ������ֵ�����������еĽ����¼");
}
?>