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
<link href="css/task.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('./')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">�ҽ��ֵĵ�������</div>
 <div class="d3"></div>
</div>

 <?
 $ses=" where taskty=0 and useridhf=".$rowuser[id];
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 $au="../task/view".$row1[id].".html";
 ?>
 <div class="taskhflist box">
  <div class="d1"><input name="C1" type="checkbox" value="<?=$row[bh]?>"<? if($row[ifxz]!=0){?> disabled<? }?> /></div>
  <div class="d2 flex"><a href="../task/view<?=$row1[id]?>.html"><?=$row1[tit]?></a></div>
 </div>
 <div class="taskhflist1 box">
  <div class="d1 flex">
   <span class="s2">�б�� <?=$row[money1]?>Ԫ</span>
   <span class="s1">����Ԥ�� <?=$row1[money1]?>Ԫ</span>
  </div>
  <div class="d2">
   <? if(3==$row1[zt] && 1==$row[ifxz]){?>
   <span class="s1">���б�</span>
   <span class="s2"><?=$row[rwdq]?><br>ǰ�ύ����</span>
   <? }else{?><span class="zt"><?=strip_tags(returntask($row1[zt]))?></span><? }?>
  </div>
 </div>
 <div class="taskhflist2 box">
  <div class="d0"><?=$row[sj]?></div>
  <div class="d1 flex">
   <? if(1==$row[ifxz]){?>
   <? if(3==$row1[zt]){?>
   <a href="taskysjs.php?bh=<?=$row[bh]?>" class="btna btna1">������</a>
   <? }?>
   <a href="taskgt.php?bh=<?=$row[bh]?>" class="btna btna3">��ͨ��¼</a>
   <? }?>
  </div>
 </div>
 <? }?>
 <div class="npa">
 <? 
 $nowurl="taskhflist.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</body>
</html>