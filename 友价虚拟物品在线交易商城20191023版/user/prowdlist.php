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
function ser(){
location.href="prowdlist.php?&st1="+document.getElementById("st1").value+"&ifhf="+document.getElementById("sd1").value;
}
function hfonc(x){
layer.open({
  type: 2,
  shadeClose: true,
  area: ['622px', '215px'],
  title:["�ʴ�ظ�","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['prowdhf.php?id='+x, 'no'] 
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
 
 <ul class="wz">
 <li class="l1 l2"><a href="prowdlist.php">��Ʒ�ʴ�</a></li>
 </ul>

 <!--��B-->
 <div class="rkuang">
 
 <div class="ksedi">
 <div class="d1">
 <a href="prowdlist.php?ifhf=no" class="a1">�鿴����δ�ظ��ʴ�(��<?=returncount("yjcode_wenda where selluserid=".$luserid." and hftxt=''")?>��)</a>
 </div>
 <div class="d2">
  <input type="button" onclick="ser()" value="��ѯ" class="btn" />
  <select id="sd1">
  <option value="">ȫ��</option>
  <option value="no"<? if($_GET[ifhf]=="no"){?> selected="selected"<? }?>>δ�ظ�</option>
  <option value="yes"<? if($_GET[ifhf]=="yes"){?> selected="selected"<? }?>>�ѻظ�</option>
  </select>
  <span class="s1">�ظ������</span>
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">�������ݣ�</span>
 </div>
 </div>

 <?
 $ses=" where selluserid=".$luserid;
 if($_GET[ifhf]=="no"){$ses=$ses." and hftxt=''";}
 if($_GET[ifhf]=="yes"){$ses=$ses." and hftxt<>''";}
 if($_GET[st1]!=""){$ses=$ses." and txt like '%".$_GET[st1]."%'";}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,10,"yjcode_wenda","order by sj desc");while($row=mysql_fetch_array($res)){
 while1("*","yjcode_pro where bh='".$row[probh]."'");$row1=mysql_fetch_array($res1);
 ?>
 <ul class="prowdlist">
 <li class="l1">��Ʒ��Ϣ��</li>
 <li class="l2"><strong><a href="../product/view<?=$row1[id]?>.html" target="_blank"><?=$row1[tit]?></a></strong></li>
 <li class="l1">���ʻ�Ա��</li>
 <li class="l3"><?=returnnc($row[userid])?></li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l3"><?=$row[sj]?></li>
 </ul>
 <ul class="prowdlist1">
 <li class="l1">��ѯ���⣺</li>
 <li class="l2">
 <?=$row[txt]?><br>
 </li>
 </ul>
 <ul class="prowdlist1">
 <li class="l1">�ظ����ݣ�</li>
 <li class="l2" style="cursor:pointer;" onclick="hfonc(<?=$row[id]?>)"><? if(empty($row[hftxt])){?><span class="red">����δ�ظ���������лظ���</span><? }else{?><span class="green">�ظ�ʱ�䣺<?=$row[hfsj]?><br>�ظ����ݣ�<?=$row[hftxt]?></span><? }?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="prowdlist.php";
 $nowwd="ifhf=".$_GET[ifhf];
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