<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
$rowuser=mysql_fetch_array($resuser);

//��������ʼ
if($_POST[yjcode]=="openshop"){
 zwzr();
 updatetable("yjcode_user","shopzt=0 where uid='".$_SESSION[SHOPUSER]."' and shopzt=3");
 php_toheader("openshop1.php");
}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function tj(){
if(!confirm("ȷ�������ύ����������")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="openshop3.php";
}
</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('./')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��Ҫ����</div>
 <div class="d3"></div>
</div>

<? include("kdcap.php");?>
<script language="javascript">
document.getElementById("step3").className="d1 d11";
</script>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="openshop" name="yjcode" />
<div class="uk box">
 <div class="d1">��˽��<span class="s1"></span></div>
 <div class="d21"><?=returnshopztv($rowuser[shopzt])?></div>
</div>
<? if(3==$rowuser[shopzt]){?>
<div class="uk box">
 <div class="d1">����ԭ��<span class="s1"></span></div>
 <div class="d21"><?=$rowuser[shopztsm]?></div>
</div>
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�����ύ")?></div>
</div>
<? }?>

</form>
<? include("bottom.php");?>
</body>
</html>