<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
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
 <div class="d1" onClick="gourl('sell.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">��Ʒ����</div>
 <div class="d3"></div>
</div>
<div class="propjcap box">
 <div class="d1<? if($_GET[ifhf]=="no"){?> d11<? }?>" onClick="gourl('propjlist.php?ifhf=no')">δ�ظ�</div>
 <div class="d1<? if($_GET[ifhf]=="yes"){?> d11<? }?>" onClick="gourl('propjlist.php?ifhf=yes')">�ѻظ�</div>
 <div class="d1<? if($_GET[ifhf]==""){?> d11<? }?>" onClick="gourl('propjlist.php')">ȫ��</div>
</div>

<div class="propjlist box">
<div class="dmain flex">
 <?
 $ses=" where selluserid=".$rowuser[id];
 if($_GET[ifhf]=="no"){$ses=$ses." and (hf='' or hf is null)";}
 if($_GET[ifhf]=="yes"){$ses=$ses." and hf<>''";}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,10,"yjcode_propj","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_pro where bh='".$row[probh]."'");$row1=mysql_fetch_array($res1);
 ?>
 <ul class="u1">
 <li class="l1">��Ʒ��Ϣ</li>
 <li class="l2"><strong><a href="../product/view<?=$row1[id]?>.html" target="_blank"><?=$row1[tit]?></a></strong></li>
 <li class="l1">���ۻ�Ա</li>
 <li class="l3"><?=returnnc($row[userid])?></li>
 <li class="l1">��������</li>
 <li class="l3">����</li>
 <li class="l1">����ʱ��</li>
 <li class="l3"><?=$row[sj]?></li>
 <li class="l1">��������</li>
 <li class="l3"><?=$row[pf1]?>��</li>
 <li class="l1">��������</li>
 <li class="l3"><?=$row[pf2]?>��</li>
 <li class="l1">�ۺ�����</li>
 <li class="l3"><?=$row[pf3]?>��</li>
 </ul>
 <ul class="u2">
 <li class="l1">��������</li>
 <li class="l2">
 <?=$row[txt]?><br>
 <? 
 if(1==$row[iftp]){
 while2("*","yjcode_tp where bh='".$row[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
 ?>
 <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" style="margin:5px 0 0 0;" width="50" height="50" /></a>&nbsp;&nbsp;
 <? }}?>
 </li>
 </ul>
 <ul class="u2">
 <li class="l1">�ظ�����</li>
 <li class="l2" style="cursor:pointer;" onClick="gourl('propjhf.php?id=<?=$row[id]?>')"><? if(empty($row[hf])){?><span class="hui">����δ�ظ���������лظ���</span><? }else{?><span class="green">�ظ�ʱ�䣺<?=$row[hfsj]?><br>�ظ����ݣ�<?=$row[hf]?></span><? }?></li>
 </ul>
 <? }?>
</div>
</div>

<div class="npa">
<?
$nowurl="propjlist.php";
$nowwd="ifhf=".$_GET[ifhf];
require("page.html");
?>
</div>
</body>
</html>