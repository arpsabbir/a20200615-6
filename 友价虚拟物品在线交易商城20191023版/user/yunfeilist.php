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
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
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
 
 <? include("sellzf.php");?>

 <!--��B-->
 <div class="rkuang">
 
 <div class="ksedi">
  <div class="d1">
  <a href="javascript:NcheckDEL(11,'yjcode_yunfei')" class="a2">ɾ��</a>
  <a href="yunfeilx.php" class="a1">����ģ��</a>
  </div>
 </div>

 <ul class="yunfeicap">
 <li class="l0"><input name="C2" onclick="xuan()" type="checkbox" /></li>
 <li class="l1">ģ������</li>
 <li class="l2">���ط���</li>
 <li class="l3">�༭ʱ��</li>
 <li class="l4">����</li>
 </ul>
 <?
 $ses=" where zt=0 and userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_yunfei","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="yunfeilist">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1"><a href="yunfei.php?bh=<?=$row[bh]?>"><strong><?=$row[tit]?></strong></a></li>
 <li class="l2"><?=$row[money1]?>Ԫ</li>
 <li class="l3"><?=$row[sj]?></li>
 <li class="l4" onmouseover="glover(<?=$row[id]?>)" onmouseout="glout(<?=$row[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row[id]?>">
  <a href="yunfei.php?bh=<?=$row[bh]?>">�޸���Ϣ</a>
  <a href="yunfeiarea.php?id=<?=$row[id]?>">��������</a>
  </div>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="yunfeilist.php";
 $nowwd="";
 require("page.php");
 ?>
 </div>
 <div class="clear clear15"></div>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>