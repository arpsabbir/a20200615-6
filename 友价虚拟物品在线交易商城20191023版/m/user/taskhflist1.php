<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$userid=returnuserid($_SESSION[SHOPUSER]);

if($_GET[control]=="ok"){ //���
 $bh=$_GET[bh];
 while0("*","yjcode_taskhf where bh='".$bh."' and taskty=1 and id=".$_GET[id]." and useridhf=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist1.php");}
 $sj=date("Y-m-d H:i:s");
 $txt="�Ѿ�������񣬷�����������";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 updatetable("yjcode_taskhf","zt=1 where id=".$_GET[id]." and zt=0 and useridhf=".$userid);
 php_toheader("taskhflist1.php");
 
}elseif($_GET[control]=="pt"){ //����ƽ̨����
 while0("*","yjcode_taskhf where id=".$_GET[id]." and taskty=1 and zt=3 and useridhf=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("taskhflist1.php");}
 updatetable("yjcode_taskhf","zt=4 where id=".$row[id]);
 $sj=date("Y-m-d H:i:s");
 $txt="���������ղ�ͨ������������ͬ��Ҫ��ƽ̨����";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$row[bh]."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 php_toheader("taskhflist1.php");

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
function myok(x,y){
if(!confirm("��ȷ���Ѿ���ɸ���������")){return false;}
location.href="taskhflist1.php?control=ok&id="+x+"&bh="+y;
}
function ptjr(x){
if(!confirm("ȷ��Ҫ����ƽ̨������")){return false;}
location.href="taskhflist1.php?control=pt&id="+x;
}
</script>
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('./')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">�ҽ��ֵĶ�������</div>
 <div class="d3"></div>
</div>

 <?
 $ses=" where taskty=1 and useridhf=".$userid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 $au="../task/view".$row1[id].".html";
 ?>
 <div class="taskhflist box">
  <div class="d1"><input name="C1" type="checkbox" value="<?=$row[bh]?>"<? if($row[ifxz]!=0){?> disabled<? }?> /></div>
  <div class="d2 flex"><a href="../task/view<?=$row1[id]?>.html"><?=$row1[tit]?></a></div>
 </div>
 <div class="taskhflist3 box">
  <div class="d1 flex">
   <span class="s1">����Ԥ�� <?=$row1[money1]?>Ԫ</span>
   <span class="s2">����Ӷ�� <?=$row[money1]?>Ԫ</span>
  </div>
  <div class="d2">
   <span class="s1"><?=returntask1($row[zt])?></span>
   <? if(0==$row[zt]){?>
   <span class="s2"><?=$row[rwdq]?> ǰ�ύ����</span>
   <? }?>
  </div>
 </div>
 <div class="taskhflist2 box">
  <div class="d0"><?=$row[sj]?></div>
  <div class="d1 flex">
   <? if(0==$row[zt]){?>
   <a href="taskysjs1.php?bh=<?=$row[bh]?>&hfid=<?=$row[id]?>" class="btna btna1">������</a>
   <? }elseif(3==$row[zt]){?>
   <a href="javascript:void(0);" onClick="ptjr(<?=$row[id]?>)" class="btna btna1">����ƽ̨����</a>
   <? }?>
   <a href="taskgt1.php?bh=<?=$row[bh]?>&hfid=<?=$row[id]?>" class="btna btna3">��ͨ��¼</a>
  </div>
 </div>
 <? }?>
 <div class="npa">
 <? 
 $nowurl="taskhflist1.php";
 $nowwd="";
 require("page.html");
 ?>
 </div>

</body>
</html>