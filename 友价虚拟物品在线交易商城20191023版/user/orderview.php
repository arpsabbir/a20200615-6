<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}

$ifztcontrol=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/buy.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>

<? if(returncount("yjcode_smsmail where userid=".$userid." and tyid=1")>0){?>
<script language="javascript">
layer.open({
  type: 2,
  area: ['300px', '180px'],
  title:["����ͬ��","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['sms_sell.php', 'no'] 
});
</script>
<? }?>

<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <ul class="wz">
 <li class="l1 l2"><a href="javascript:void(0);">��������</a></li>
 <li class="l1"><a href="order.php">�ҵĶ���</a></li>
 </ul>

 <!--��B-->
 <div class="rkuang">
 
 <? include("orderv.php");?>
 
 <div class="clear clear15"></div>

 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>