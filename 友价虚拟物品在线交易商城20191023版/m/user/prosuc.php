<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$bh=$_GET[bh];
$id=$_GET[id];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop2 box">
 <div class="d1" onClick="gourl('productlist.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">��ϲ�����༭�ɹ�</div>
 <div class="d3"></div>
</div>

<div class="czts box">
 <div class="d1">
 <a href="productlist.php">�����б�</a>
 <a href="productlx.php">��������Ʒ</a>
 <a href="product.php?bh=<?=$bh?>">���±༭</a>
 <a href="product1.php?bh=<?=$bh?>">�޸�����</a>
 <a href="../product/view<?=$id?>.html">Ԥ���շ�������Ʒ</a>
 </div>
</div>

</body>
</html>