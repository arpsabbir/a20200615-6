<?
include("../config/conn.php");
include("../config/function.php");
$id=intval($_GET[id]);
$sqluser="select * from yjcode_user where id=".$id;mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("./");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$rowuser[nc]?>�ĸ�����ҳ - <?=webname?></title>
<? include("../tem/cssjs.html");?>
</head>
<body>
<? include("../tem/top.html");?>

<? include("top.php");?>
<script language="javascript">
document.getElementById("mytopa2").className="a1";
</script>

<div class="yjcode">
 <? include("left.php");?>
 <!--��B-->
 <div class="myright">
  <ul class="myjs">
  <li class="l1">�ҵĽ���</li>
  <li class="l2"><?=$rowuser[mytxt]?></li>
  </ul>
 </div>
 <!--��E-->
 
</div>
<? include("../tem/bottom.html");?>
</body>
</html>