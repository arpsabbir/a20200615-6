<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
if(empty($_SESSION[SAFEPWD])){Audit_alert("������Ϣ������Ҫ�Ƚ��а�ȫ����֤!","safepwd.php");}
$bh=$_GET[bh];
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
location.href="kclist.php?bh=<?=$bh?>&st1="+document.getElementById("st1").value+"&sd1="+document.getElementById("sd1").value;
}
function glover(x){
 document.getElementById("gl"+x).style.display="";
}
function glout(x){
 document.getElementById("gl"+x).style.display="none";
}
function del(x){
document.getElementById("chk"+x).checked=true;
NcheckDEL(5,'yjcode_kc');
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
 
 <? include("protop.php");?>
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap4").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <ul class="uk uk0">
 <li class="l1">���ͳ�ƣ�</li>
 <li class="l21">
 ��ʹ�ã�<strong class="red"><?=returncount("yjcode_kc where userid=".$luserid." and probh='".$bh."' and ifok=1")?></strong>��&nbsp;&nbsp;&nbsp;&nbsp;
 δʹ�ã�<strong class="blue"><?=returncount("yjcode_kc where userid=".$luserid." and probh='".$bh."' and ifok=0")?></strong>��
 </li>
 </ul> 

 <div class="ksedi uk0">
  <div class="d1">
  <a href="javascript:;" onclick="NcheckDEL(5,'yjcode_kc')" class="a1">ɾ��</a>
  <a href="kc.php?bh=<?=$bh?>" class="a2">�����Ϣ</a>
 </div>
 <div class="d2">
  <input type="button" onclick="ser()" value="��ѯ" class="btn" />
  <select id="sd1">
  <option value="">ȫ��</option>
  <option value="0"<? if($_GET[sd1]=="0"){?> selected="selected"<? }?>>δʹ��</option>
  <option value="1"<? if($_GET[sd1]=="1"){?> selected="selected"<? }?>>��ʹ��</option>
  </select>
  <span class="s1">ʹ�������</span>
  <input type="text" id="st1" value="<?=$_GET[st1]?>" class="inp1" />
  <span class="s1">�ؼ��ʣ�</span>
 </div>
 </div>

 <ul class="kamikccap">
 <li class="l1"><input name="C2" type="checkbox" onclick="xuan()" /></li>
 <li class="l2">����</li>
 <li class="l3">����</li>
 <li class="l4">����</li>
 <li class="l5">ʹ��״��</li>
 <li class="l6">ʹ�û�Ա</li>
 <li class="l7">ʹ��ʱ��</li>
 <li class="l8">�༭</li>
 </ul>
  
 <?
 $ses=" where userid=".$luserid." and probh='".$bh."'";
 if($_GET[st1]!=""){$ses=$ses." and ka like '%".$_GET[st1]."%'";}
 if($_GET[sd1]!=""){$ses=$ses." and ifok=".$_GET[sd1];}
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_kc","order by id asc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="kamikclist">
 <li class="l1"><input name="C1" type="checkbox" id="chk<?=$row[id]?>" value="<?=$row[id]?>" /></li>
 <li class="l2"><?=$row[id]?></li>
 <li class="l3"><?=returntitdian($row[ka],35)?></li>
 <li class="l4"><?=returntitdian($row[mi],35)?></li>
 <li class="l5"><? if(1==$row[ifok]){?><span class="red">��ʹ��</span><? }else{?><span class="blue">δʹ��</span><? }?></li>
 <li class="l6"><?=returnuser($row[userid1])?></li>
 <li class="l7"><?=$row[sj]?></li>
 <li class="l8" onmouseover="glover(<?=$row[id]?>)" onmouseout="glout(<?=$row[id]?>)">
  <span class="s1">����</span>
  <div class="gl" style="display:none;" id="gl<?=$row[id]?>">
  <a href="kc.php?bh=<?=$bh?>&action=update&id=<?=$row[id]?>">�༭��Ϣ</a>
  <a href="javascript:;" onclick="del(<?=$row[id]?>)">ɾ������</a>
  </div>
 </li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="kclist.php";
 $nowwd="bh=".$bh."&st1=".$_GET[st1]."&sd1=".$_GET[sd1];
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