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
<script language="javascript">
function addshdz(){
layer.open({
  type: 2,
  area: ['700px', '420px'],
  title:["�༭�ջ���ַ","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['shdzlx.php', 'no'] 
});
}

function ediadd(b){
layer.open({
  type: 2,
  area: ['700px', '420px'],
  title:["�༭�ջ���ַ","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['shdz.php?bh='+b, 'no'] 
});
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
 
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap8").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <div class="ksedi">
  <div class="d1">
  <a href="javascript:NcheckDEL(10,'yjcode_shdz')" class="a2">ɾ��</a>
  <a href="javascript:void(0);" onclick="addshdz()" class="a1">������ַ</a>
  </div>
 </div>

 <ul class="shdzlistcap">
 <li class="l0"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l1">��ϸ��ַ</li>
 <li class="l2">�ջ���</li>
 <li class="l3">��ϵ�绰</li>
 <li class="l4">�༭ʱ��</li>
 </ul>
 <?
 $ses=" where zt=0 and userid=".$luserid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_shdz","order by sj desc");while($row=mysql_fetch_array($res)){
 $addr=returnarea($row[add1])." ".returnarea($row[add2])." ".returnarea($row[add3])." ".$row[addr];
 ?>
 <ul class="shdzlist">
 <li class="l0"><input name="C1" type="checkbox" value="<?=$row[id]?>" /></li>
 <li class="l1"><? if(1==$row[ifmr]){?><span class="red">[Ĭ�ϵ�ַ]</span> <? }?><a href="javascript:void(0);" onclick="ediadd('<?=$row[bh]?>')"><?=$addr?></a></li>
 <li class="l2"><?=$row[lxr]?></li>
 <li class="l3"><?=$row[mot]?></li>
 <li class="l4"><?=$row[sj]?></li>
 </ul>
 <? }?>
 <div class="npa">
 <?
 $nowurl="shdzlist.php";
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