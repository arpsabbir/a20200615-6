<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if($_GET[action]=="del"){
updatetable("yjcode_user","wxopenid='',unionid='' where uid='".$_SESSION[SHOPUSER]."'");	
php_toheader("weixin.php");
}

$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);

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
 document.getElementById("rcap9").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ�!","weixin.php")?>
 <? if(empty($rowuser[wxopenid])){?>
 <ul class="qqtxt">
 <li class="l1">
 <a href="https://open.weixin.qq.com/connect/qrconnect?appid=<?=$wxlogin[0]?>&redirect_uri=<?=urlencode(weburl."reg/wxlogin.php")?>&response_type=code&scope=snsapi_login#wechat_redirect"><img src="img/wx.gif" width="50" /></a>
 <br>
 �����ť��������΢���ʺ�
 </li>
 <li class="l2">
 ʹ��΢���ʺŵ�¼��վ�������ԡ���<br>
 ��΢���ʺ����ɵ�¼<br>
 �����ס��վ���ʺź����룬��ʱʹ��΢��ɨһɨ���ɵ�¼
 </li>
 </ul>
 <? }else{?>
 <ul class="qqtxt">
 <li class="l3">
 <strong>���ѽ���վ�ʺ���΢�ź����</strong><br>
 ����Ѱ��ʺţ�<br>
 <input type="button" class="btn1" onclick="gourl('weixin.php?action=del')" value="ȷ�Ͻ��" />
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