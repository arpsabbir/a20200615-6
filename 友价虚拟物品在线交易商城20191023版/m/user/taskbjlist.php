<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$bh=$_GET[bh];
$userid=returnuserid($_SESSION[SHOPUSER]);
$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=0 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/task.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('../task/view<?=$rowtask[id]?>.html')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">Ͷ�����</div>
 <div class="d3"></div>
</div>

<? include("taskv.php");?>

<div class="taskmain1 box"><div class="d1"></div><div class="d2">Ͷ����Ϣ</div></div>
 <?
 $ses=" where taskty=0 and bh='".$bh."'";
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,20,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while2("*","yjcode_user where id=".$row[useridhf]);$row2=mysql_fetch_array($res2);
 ?>
 <div class="taskbjlist box">
  <div class="d1"><img src="../../upload/<?=$row2[id]?>/user.jpg" onerror="this.src='../../img/none180x180.gif'" /></div>
  <div class="d2 flex">
  <strong><?=$row2[nc]?></strong><br>
  ���ۣ�<?=$row[money1]?>Ԫ<br>
  �ɹ�<?=returncount("yjcode_task where zt=5 and useridhf=".$row[useridhf]."")?>�� / ʧ��<?=returncount("yjcode_task where zt=9 and useridhf=".$row[useridhf]."")?>��<br>
  QQ <?=$row2[uqq]?> / �ֻ� <?=$row2[mot]?>
  </div>
  <div class="d3">
  <? if(0==$rowtask[zt]){?>
  <a href="taskbjsel.php?bh=<?=$bh?>&mid=<?=$row[id]?>" class="btna1">ѡ��TA</a>
  <? }elseif(3==$rowtask[zt] && $rowtask[useridhf]==$row[useridhf]){?>
  <a href="taskgts.php?bh=<?=$bh?>" class="btna2">���б�</a>
  <? }?>
  </div>
 </div>
 <div class="taskbjlist1 box">
  <div class="d1 flex">
  �������ԣ�<?=strip_tags(returnjgdw($row[txt],"","δ��д�κ�˵��"))?>
  </div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="taskbjlist.php";
 $nowwd="bh=".$bh;
 require("page.html");
 ?>
 </div>

</body>
</html>