<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$bh=$_GET[bh];
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userid=$rowuser[id];
$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=1 and userid=".$userid." and zt=100";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist1.php");}


if($_GET[control]=="jn"){
 $zjm=0;
 if(empty($rowtask[yjfs])){$zjm=$rowtask[money1]*$rowcontrol[taskyj];}
 elseif($rowtask[yjfs]==2){$zjm=$rowtask[money1]*$rowcontrol[taskyj]*0.5;}
 $money3=$rowtask[money1]+$zjm;
 $djmoney=$money3-$rowtask[money4];
 if($djmoney>$rowuser[money1]){Audit_alert("���㣬���ȳ�ֵ","taskmoney.php?bh=".$bh);}
 PointIntoM($rowuser[id],"����ʼ��������(������".$bh.")",$djmoney*(-1));
 PointUpdateM($rowuser[id],$djmoney*(-1));
 updatetable("yjcode_task","zt=101,money2=".$rowtask[money1].",money3=".$money3." where id=".$rowtask[id]);
 php_toheader("tasklist1.php");
 
}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function tj(){
if(!confirm("ȷ��Ҫ���ɷ�����")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="taskmoney.php?bh=<?=$bh?>&control=jn";
}
</script>
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('../task/view<?=$rowtask[id]?>.html')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">���ɷ���</div>
 <div class="d3"></div>
</div>

<? include("taskv.php");?>

<div class="taskmain1 box"><div class="d1"></div><div class="d2">����˵��</div></div>
<div class="taskmain2 box">
 <div class="d1">�н���ã�</div>
 <div class="d2">
 <? 
 $zjm=0;
 if(empty($rowtask[yjfs])){$zjm=$rowtask[money1]*$rowcontrol[taskyj];echo "�����е�������Ϊ<strong class='feng'>��".$zjm."</strong>";}
 elseif($rowtask[yjfs]==1){echo "���ַ��е�";}
 elseif($rowtask[yjfs]==2){$zjm=$rowtask[money1]*$rowcontrol[taskyj]*0.5;echo "˫�����е�һ�룬����Ϊ<strong class='feng'>��".$zjm."</strong>";}
 ?>
 </div>
</div>
<div class="taskmain2 box">
 <div class="d1">���ɷ��ã�</div>
 <div class="d2"><strong class="feng"><?=sprintf("%.2f",$zjm+$rowtask[money1])?></strong>Ԫ</div>
</div>
<div class="taskmain2 box">
 <div class="d1">�ҵ���</div>
 <div class="d2"><strong class="red"><?=sprintf("%.2f",$rowuser[money1])?></strong>Ԫ&nbsp;&nbsp;&nbsp;&nbsp;<a href="pay.php">[��ֵ]</a></div>
</div>
<div class="taskmain3 box"></div>

<form name="f1" method="post" onSubmit="return tj()">
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("���ɷ���")?></div>
</div>
</form>

</body>
</html>