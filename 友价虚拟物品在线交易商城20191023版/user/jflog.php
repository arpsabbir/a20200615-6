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
<link href="css/inf.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("rcap8.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <ul class="jflogcap">
 <li class="l1">ʱ��</li>
 <li class="l2">����</li>
 <li class="l3">��/֧</li>
 <li class="l4">˵��</li>
 </ul>
   
 <?
 $ses=" where userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_jfrecord","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="jflog">
 <li class="l1"><?=$row[sj]?></li>
 <li class="l2"><?=$row[jfnum]?></li>
 <li class="l3"><? if($row[jfnum]>0){?><span class="blue">��</span><? }else{?><span class="red">֧</span><? }?></li>
 <li class="l4"><?=$row[tit]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="jflog.php";
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