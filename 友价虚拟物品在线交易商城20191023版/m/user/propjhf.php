<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sj=date("Y-m-d H:i:s");
$id=intval($_GET[id]);
$userid=returnuserid($_SESSION[SHOPUSER]);

while0("*","yjcode_propj where selluserid=".$userid." and id=".$id);if(!$row=mysql_fetch_array($res)){Audit_alert("��Դ����","propjlist.php");}

if($_GET[control]=="update"){
 zwzr();
 updatetable("yjcode_propj","hf='".sqlzhuru($_POST[s1])."',hfsj='".$sj."' where selluserid=".$userid." and id=".$id);
 php_toheader("propjlist.php");
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
if(document.f1.s1.value==""){layerts("������ظ�����");return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="propjhf.php?control=update&id=<?=$id?>";
}
</script>
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop2 box">
 <div class="d1" onClick="gourl('propjlist.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">��Ʒ���ۻظ�</div>
 <div class="d3"></div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="hf" name="yjcode" />
<div class="uk box">
 <div class="d1">�û�����<span class="s1"></span></div>
 <div class="d21"><?=$row[txt]?></div>
</div>
<div class="uk box">
 <div class="d1">�ظ�����<span class="s1"></span></div>
 <div class="d2"><textarea name="s1" placeholder="������ظ�����"><?=$row[hf]?></textarea></div>
</div>

<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�ύ�ظ�")?></div>
</div>

</form>

</body>
</html>