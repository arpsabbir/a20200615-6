<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$bh=$_GET[bh];
$id=$_GET[id];
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
 <li class="l1 l2"><a href="javascript:void(0);">������ʾ</a></li>
 </ul>

 <div class="czts">
 <strong class="feng">��ϲ�����༭�ɹ���</strong><br>
 <a href="productlist.php">�����б�</a> | <a href="productlx.php">��������Ʒ</a> | <a href="product.php?bh=<?=$bh?>">���ر༭</a> | <a href="../product/view<?=$id?>.html" target="_blank">Ԥ���շ�������Ʒ</a>
 </div>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>