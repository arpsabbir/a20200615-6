<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function myok(x,y){
if(!confirm("��ȷ���Ѿ���ɸ���������")){return false;}
location.href="taskhflist.php?control=ok&id="+x+"&bh="+y;
}
function myclo(x,y){
if(!confirm("��ȷ��Ҫȡ����������")){return false;}
location.href="taskhflist.php?control=clo&id="+x+"&bh="+y;
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("rcap9.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <div class="ksedi">
 <div class="d1">
 <a href="javascript:NcheckDEL('3a','yjcode_taskhf')" class="a1">ɾ��</a>
 <a href="../task/" target="_blank" class="a2">ȥ������</a>
 </div>
 </div>
 <ul class="taskhfcap">
 <li class="l0"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l1">����</li>
 <li class="l2">����Ԥ��</li>
 <li class="l3">����</li>
 <li class="l4">״̬</li>
 <li class="l5">����</li>
 </ul>
  
 <?
 $ses=" where taskty=0 and useridhf=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_taskhf","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_task where bh='".$row[bh]."'");$row1=mysql_fetch_array($res1);
 $au="../task/view".$row1[id].".html";
 ?>
 <ul class="taskhflist">
 <li class="l0"><? if($row[ifxz]==0){?><input name="C1" type="checkbox" value="<?=$row[bh]?>" /><? }?></li>
 <li class="l1"><a href="<?=$au?>" title="<?=$row1[tit]?>" target="_blank"><?=strgb2312(strip_tags($row1[tit]),0,100)?></a><span class="sj"><?=$row[sj]?></span></li>
 <li class="l2"><strong><?=$row1[money1]?></strong>Ԫ</li>
 <li class="l3"><strong><?=$row[money1]?></strong>Ԫ</li>
 <li class="l4">
 <? if(3==$row1[zt] && 1==$row[ifxz]){?>
 <span class="s1">���б�</span>
 <span class="s2"><?=$row[rwdq]?><br>ǰ�ύ����</span>
 <? }else{?><span class="zt"><?=returntask($row1[zt])?></span><? }?>
 &nbsp;
 </li>
 <li class="l5">
 <? if(1==$row[ifxz]){?>
 <? if(3==$row1[zt]){?>
 <a href="taskysjs.php?bh=<?=$row[bh]?>" class="btna btna1">������</a>
 <? }?>
 <a href="taskgt.php?bh=<?=$row[bh]?>" class="btna btna3">��ͨ��¼</a>
 <? }?>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="taskhflist.php";
 $nowwd="";
 require("page.php");
 ?>
 </div>
 
 <div class="clear clear10"></div>
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>