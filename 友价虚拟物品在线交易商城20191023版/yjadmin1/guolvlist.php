<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$ses=" where zt=1";
$admin=intval($_GET[admin]);
if(!empty($admin)){$ses=$ses." and admin=".$admin;}
if($_GET[st1]!=""){$ses=$ses." and (tit like '%".$_GET[st1]."%')";}
$page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function ser(){
location.href="guolvlist.php?st1="+document.getElementById("st1").value+"&admin=<?=$admin?>";	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=7;include("menu_user.php");?>

<div class="right">
 
 <div class="bqu1">
 <a class="a1" href="guolvlist.php">�������б�</a>
 </div>
 <!--B-->
 <ul class="psel">
 <li class="l1">�ؼ��ʣ�</li><li class="l2"><input value="<?=$_GET[st1]?>" type="text" id="st1" size="15" /></li>
 <li class="l3"><a href="javascript:ser()" class="a2">����</a></li>
 </ul>
 <ul class="ksedi">
 <li class="l2">
 <a href="javascript:checkDEL(44,'yjcode_guolv')" class="a1">ɾ��</a>
 <a href="guolvlx.php" class="a2">����������</a>
 </li>
 </ul>
 <ul class="qjlistcap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">��������Ϣ</li>
 <li class="l3">����</li>
 <li class="l4">�༭ʱ��</li>
 <li class="l5">����</li>
 </ul>
 <?
 pagef($ses,20,"yjcode_guolv","order by sj desc");while($row=mysql_fetch_array($res)){
 $aurl="guolv.php?bh=".$row[bh];
 ?>
 <ul class="qjlist2">
 <li class="l1"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l2"><a href="<?=$nu?>"><?=$row[tit]?></a></li>
 <li class="l3"><?=returnguolvty($row[admin])?></li>
 <li class="l4"><?=$row[sj]?></li>
 <li class="l5">
 <a class="edi" href="<?=$aurl?>">�޸���Ϣ</a>
 </li>
 </ul>
 <? }?>
 <?
 $nowurl="guolvlist.php";
 $nowwd="st1=".$_GET[st1]."&admin=".$admin;
 include("page.php");
 ?>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>