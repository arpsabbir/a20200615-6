<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if($_GET[action]=="del"){
updatetable("yjcode_user","ifqq=0,openid='' where uid='".$_SESSION[SHOPUSER]."'");	
php_toheader("qq.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/inf.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap6").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ�!","qq.php")?>
 <? if(0==$rowuser[ifqq]){?>
 <ul class="qqtxt">
 <li class="l1">
 <a href="../config/qq/oauth/index.php"><img border="0" src="../img/qq_login.png" /></a><br>
 �����ť��������QQ�ʺ�
 </li>
 <li class="l2">
 ʹ��QQ�ʺŵ�¼��վ�������ԡ���<br>
 ��QQ�ʺ����ɵ�¼<br>
 �����ס��վ���ʺź����룬��ʱʹ��QQ�ʺ��������ɵ�¼
 </li>
 </ul>
 <? }else{?>
 <ul class="qqtxt">
 <li class="l3">
 <strong>���ѽ���վ�ʺ���QQ�����</strong><br>
 ����Ѱ��ʺţ�<br>
 <input type="button" class="btn1" onclick="gourl('qq.php?action=del')" onmouseover="this.className='btn1 btn2';" onmouseout="this.className='btn1';" value="ȷ�Ͻ��" />
 </li>
 </ul>
 <? }?>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>