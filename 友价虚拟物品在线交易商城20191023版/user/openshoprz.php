<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <ul class="wz">
 <li class="l1 l2"><a href="openshoprz.php">������֤</a></li>
 <li class="l1"><a href="openshop1.php">��Ҫ����</a></li>
 </ul>

 <!--��B-->
 <div class="rkuang">
 
 <ul class="uk">
 <li class="l1">��ܰ��ʾ��</li>
 <li class="l21 red"><strong>�𾴵��û����ѣ������ύ������֤��Ϣ�������뿪��</strong></li>
 </ul>

 <? if($rowuser[sfzrz]!=0 && $rowuser[sfzrz]!=1 && strstr($rowcontrol[shoprz],"xcf3xcf")){?>
 <ul class="urz1">
 <li class="l1 err">ʵ����֤</li>
 <li class="l2">ͨ��ʵ����֤������������Ϊ���ṩ���õķ���</li>
 <li class="l3"><a href="smrz.php">�ύ��֤</a></li>
 </ul>
 <? }?>

 <? if(1!=$rowuser[ifmot] && strstr($rowcontrol[shoprz],"xcf1xcf")){?>
 <ul class="urz1">
 <li class="l1 err">�ֻ���</li>
 <li class="l2">�������ֻ�������ע��ʱ���ʺ��ϣ�����ʻ����ʽ�ȫ��</li>
 <li class="l3"><a href="mobbd.php">���ֻ�</a></li>
 </ul>
 <? }?>
 
 <? if(1!=$rowuser[ifemail] && strstr($rowcontrol[shoprz],"xcf2xcf")){?>
 <ul class="urz1">
 <li class="l1 err">���������</li>
 <li class="l2">�������ǵ�¼����ʱ������ͨ�������һ�����</li>
 <li class="l3"><a href="emailbd.php">������</a></li>
 </ul>
 <? }?>
 
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