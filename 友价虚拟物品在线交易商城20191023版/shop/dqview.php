<?
include("../config/conn.php");
include("../config/function.php");
$sj=date("Y-m-d H:i:s");
$uid=$_GET[id];
$sqluser="select * from yjcode_user where shopzt=4 and id=".$uid;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���̵������� - <?=webname?></title>
<link href="<?=weburl?>css/basic.css" rel="stylesheet" type="text/css" />
<? include("../tem/cssjs.html");?>
<link href="shop.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="yjcode">

 <div class="shopdq">
 <ul class="u1">
 <li class="l1">��ܰ��ʾ�������ʵĵ����Ѿ����ڡ�</li>
 <li class="l2">������ǵ������ˣ��뼰ʱ����[�����Ա����-���-������Ѱ�ť]</li>
 <li class="l3"><a href="../user/openshop4.php" class="a1">���ǵ�������������</a><a href="../user/openshop1.php" class="a2">��û�е��̣�������פ</a></li>
 </ul>
 </div>

</div>

<? include("../tem/bottom.html");?>
</body>
</html>