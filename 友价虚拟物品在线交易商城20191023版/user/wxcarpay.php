<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$ddbh=$_GET[ddbh];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <!--��B-->
 <div class="rkuang">
 
 <ul class="wz">
 <li class="l1 l2"><a href="javascript:void(0);">΢�Ž���</a></li>
 </ul>
 
 <div id="wxpay_t1">
  <iframe name="wxpay_f" id="wxpay_f" marginwidth="1" marginheight="1" frameborder="0" height="420" width="100%" border="0" src="wxpay/example/buy_native.php?ddbh=<?=$ddbh?>"></iframe>
 </div>
 
 <div class="clear clear10"></div>
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>