<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$bh=$_GET[bh];
$mid=$_GET[mid];
$sj=date("Y-m-d H:i:s");
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userid=$rowuser[id];

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=0 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and userid=".$userid." and id=".$mid;mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("taskbjlist.php?bh=".$bh);}

if($_GET[control]=="hz"){
 if(0!=$row[zt]){Audit_alert("����ʧ�ܣ���������","taskbjsel.php?bh=".$bh."&mid=".$mid);}
 $money5=0;
 if(empty($rowtask[yjfs])){$money5=$rowtaskhf[money1]*$rowcontrol[taskyj];}
 elseif($rowtask[yjfs]==2){$money5=$rowtaskhf[money1]*$rowcontrol[taskyj]*0.5;}
 $djmoney=$rowtaskhf[money1]-$rowtask[money4]+$money5;
 if($djmoney>$rowuser[money1]){Audit_alert("���㣬���ȳ�ֵ","taskbjsel.php?bh=".$bh."&mid=".$mid);}
 PointIntoM($rowuser[id],"����ʼ��������(������".$bh.")",$djmoney*(-1));
 PointUpdateM($rowuser[id],$djmoney*(-1));
 $money3=$rowtaskhf[money1]+$money5;
 updatetable("yjcode_task","zt=3,useridhf=".$rowtaskhf[useridhf].",money2=".$rowtaskhf[money1].",money3=".$money3.",money5=".$money5." where id=".$rowtask[id]);
 $rwdq=date("Y-m-d H:i:s",strtotime("+".$rowtask[rwzq]." day"));
 updatetable("yjcode_taskhf","ifxz=1,zbsj='".$sj."',rwdq='".$rwdq."' where id=".$mid);
 $txt="��ѡ�꣬���ַ���ʼ�����񣬲�����Ҫ��".$rwdq."ǰ��������ύ����";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtaskhf[useridhf].",1,'".$txt."','".$sj."',''");
 if(!empty($rowtask[jsbao])){
  while1("bh,useridhf,ifxz","yjcode_taskhf where bh='".$rowtask[bh]."' and ifxz=0");while($row1=mysql_fetch_array($res1)){
   PointIntoB($row1[useridhf],"����δ�б꣬�˻���֤��",$rowtask[jsbao],2);
   PointUpdateB($row1[useridhf],$rowtask[jsbao]); 
  }
 }
 php_toheader("taskbjlist.php?bh=".$bh);
 
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
if(!confirm("ȷ��ѡ����û�ʹ����")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="taskbjsel.php?bh=<?=$bh?>&mid=<?=$mid?>&control=hz";
}
</script>
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('../task/view<?=$rowtask[id]?>.html')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">ѡ���û�</div>
 <div class="d3"></div>
</div>

<? include("taskv.php");?>

<? while2("*","yjcode_user where id=".$rowtaskhf[useridhf]);$row2=mysql_fetch_array($res2);?>
<div class="taskmain1 box"><div class="d1"></div><div class="d2">�û���Ϣ</div></div>
<div class="taskmain2 box"><div class="d1">ѡ���û���</div><div class="d2"><?=$row2[nc]?></div></div>
<div class="taskmain2 box"><div class="d1">��ϵQQ��</div><div class="d2"><a href="javascript:void(0);" onClick="qqtang('<?=$row2[uqq]?>')"><?=$row2[uqq]?></a></div></div>
<? if(!empty($row2[mot])){?>
<div class="taskmain2 box"><div class="d1">��ϵ�绰��</div><div class="d2"><?=$row2[mot]?></div></div>
<? }?>
<div class="taskmain2 box"><div class="d1">�û����ۣ�</div><div class="d2"><strong class="red">��<?=$rowtaskhf[money1]?></strong></div></div>
<div class="taskmain2 box">
 <div class="d1">�н���ã�</div>
 <div class="d2">
 <? 
 if(empty($rowtask[yjfs])){echo "�����е�������Ϊ<strong class='feng'>��".$rowtaskhf[money1]*$rowcontrol[taskyj]."</strong>";}
 elseif($rowtask[yjfs]==1){echo "���ַ��е�";}
 elseif($rowtask[yjfs]==2){echo "˫�����е�һ�룬����Ϊ<strong class='feng'>��".$rowtaskhf[money1]*$rowcontrol[taskyj]*0.5."</strong>";}
 ?>
 </div>
</div>
<div class="taskmain2 box"><div class="d1">����ʱ�䣺</div><div class="d2"><?=$rowtaskhf[sj]?></div></div>
<div class="taskmain2 box"><div class="d1">�ҵ���</div><div class="d2"><strong class="red">��<?=$rowuser[money1]?></strong> [<a href="pay.php">��ֵ</a>]</div></div>
<div class="taskmain2 box"><div class="d1">�������ԣ�</div><div class="d2"><?=strip_tags(returnjgdw($rowtaskhf[txt],"","δ��д�κ�˵��"))?></div></div>
<div class="taskmain2 box"><div class="d1">������֪��</div><div class="d2">ѡ���������Ҫ���ᱨ�۽��(��ȥ����)</div></div>
<div class="taskmain3 box"></div>


<? if(0==$rowtask[zt]){?>
<form name="f1" method="post" onsubmit="return tj()">
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("ѡ�����")?></div>
</div>
</form>
<? }?>

</body>
</html>