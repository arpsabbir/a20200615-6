<?
include("../../config/conn.php");
include("../../config/function.php");
$admin=intval(returnsx("a"));
$bh=returnsx("b");
$mybh=returnsx("c");
$pwd=returnsx("d");
$sqluser="select uid,pwd,mybh from yjcode_user where mybh='".$mybh."' and pwd='".$pwd."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){echo weburl."m/";exit;}
$_SESSION["SHOPUSER"]=$rowuser[uid];
$_SESSION["SHOPUSERPWD"]=$pwd;
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>�ֻ���ͼ</title>
<? include("../tem/cssjs.html");?>
</head>
<body>
<div class="uk box">
 <div class="d1">������ʾ<span class="s1"></span></div>
 <div class="d21">Ч��ͼ����֮�󣬿�����ʱ�ر����ҳ��</div>
</div>
<!--Ч��ͼB-->
<div class="uk box">
 <div class="d1">Ч �� ͼ<span class="s1"></span></div>
 <div class="d2"><iframe style="float:left;" src="tpupload.php?admin=<?=$admin?>&bh=<?=$bh?>" width="103" scrolling="no" height="103" frameborder="0"></iframe></div>
</div>
<div class="xgtp box">
<div class="xgtpm">
 <div id="xgtp1" style="display:none;">���ڴ���</div>
 <div id="xgtp2"></div>
</div>
</div>
<!--Ч��ͼE-->

<script type="text/javascript">
function xgtread(x){
 $.get("readtp.php",{bh:"<?=$bh?>",admin:<?=$admin?>},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("tpdel.php",{id:x,admin:<?=$admin?>},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");
</script>
</body>
</html>