<?php
require("../../../config/conn.php");
include("../../../config/function.php");

require_once("aliconfig.php");
require_once 'wappay/service/AlipayTradeService.php';


$arr=$_POST;
$alipaySevice = new AlipayTradeService($config); 
$alipaySevice->writeLog(var_export($_POST,true));
$result = $alipaySevice->check($arr);

/* ʵ����֤���̽����̻��������У�顣
1���̻���Ҫ��֤��֪ͨ�����е�out_trade_no�Ƿ�Ϊ�̻�ϵͳ�д����Ķ����ţ�
2���ж�total_amount�Ƿ�ȷʵΪ�ö�����ʵ�ʽ����̻���������ʱ�Ľ���
3��У��֪ͨ�е�seller_id������seller_email) �Ƿ�Ϊout_trade_no��ʵ��ݵĶ�Ӧ�Ĳ��������е�ʱ��һ���̻������ж��seller_id/seller_email��
4����֤app_id�Ƿ�Ϊ���̻�����
*/
if($result) {//��֤�ɹ�
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//������������̻���ҵ���߼������

	
	//�������������ҵ���߼�����д�������´�������ο�������
	
    //��ȡ֧������֪ͨ���ز������ɲο������ĵ��з������첽֪ͨ�����б�
	
	//�̻�������

	$out_trade_no = $_POST['out_trade_no'];

	//֧�������׺�

	$trade_no = $_POST['trade_no'];

	//����״̬
	$trade_status = $_POST['trade_status'];


    if($_POST['trade_status'] == 'TRADE_FINISHED' || $_POST['trade_status'] == 'TRADE_SUCCESS') {


$dingdanbh=preg_split("/\|/",$out_trade_no);
$userid=$dingdanbh[1];
$sql="select * from yjcode_dingdang where ddbh='".$out_trade_no."' and ifok=0 and userid=".$userid;mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql);
if($row=mysql_fetch_array($res)){
 if(1==$row[ifok]){echo "success";exit;}
 updatetable("yjcode_dingdang","sj='".getsj()."',uip='".getuip()."',alipayzt='".$trade_status."',ddzt='suc',ifok=1,jyh='".$trade_no."' where id=".$row[id]);
 $money1=$row["money1"];
 PointIntoM($userid,"֧������ֵ".$money1."Ԫ",$money1,3,$trade_no);
 PointUpdateM($userid,$money1);
 if(!empty($row[sxf])){
 $sxf=$row[sxf]*(-1);
 PointIntoM($row[userid],"֧���ӿ�������",$sxf,0,$trade_no);
 PointUpdateM($row[userid],$sxf);
 }
 updatetable("yjcode_dingdang","ifok=1 where id=".$row1[id]);
 $caridarr=$row[carid];
 if(!empty($caridarr)){
 include("../../../user/buy.php");
 }
 echo "success";exit;
}




    }
	//�������������ҵ���߼�����д�������ϴ�������ο�������
        
	echo "success";		//�벻Ҫ�޸Ļ�ɾ��
		
}else {
    //��֤ʧ��
    echo "fail";	//�벻Ҫ�޸Ļ�ɾ��

}

?>

