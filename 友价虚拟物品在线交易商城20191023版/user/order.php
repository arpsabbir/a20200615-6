<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where userid=".$userid;
if($_GET[ddzt]!=""){$ses=$ses." and ddzt='".$_GET[ddzt]."'";}
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";}
if($_GET[t2v]!=""){$ses=$ses." and sj>='".$_GET[t2v]."'";}
if($_GET[t3v]!=""){$ses=$ses." and sj<='".$_GET[t3v]."'";}
if($_GET[t4v]!=""){$ses=$ses." and orderbh='".$_GET[t4v]."'";}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/buy.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/adddate.js" ></script> 
<script language="javascript">
function psel(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&ddzt="+document.getElementById("ddztv").value;
 location.href="order.php?"+str;
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
 
 <!--����B-->
 <ul class="kssel">
 <li class="l1">�������⣺</li>
 <li class="l2"><input type="text" value="<?=$_GET[t1v]?>" id="t1" style="width:150px;" /></li>
 <li class="l1">������ţ�</li>
 <li class="l2"><input type="text" value="<?=$_GET[t4v]?>" id="t4" style="width:150px;" /></li>
 <li class="l1">����״̬��</li>
 <li class="l2">
 <select id="ddztv">
 <option value="">����</option>
 <option value="wait"<? if($_GET[ddzt]=="wait"){?> selected="selected"<? }?>>�ȴ�����</option>
 <option value="db"<? if($_GET[ddzt]=="db"){?> selected="selected"<? }?>>�ȴ����ȷ��</option>
 <option value="suc"<? if($_GET[ddzt]=="suc"){?> selected="selected"<? }?>>���׳ɹ�</option>
 <option value="back"<? if($_GET[ddzt]=="back"){?> selected="selected"<? }?>>�˿�������</option>
 <option value="backerr"<? if($_GET[ddzt]=="backerr"){?> selected="selected"<? }?>>��ͬ����˿�</option>
 <option value="backsuc"<? if($_GET[ddzt]=="backsuc"){?> selected="selected"<? }?>>�˿�ɹ�</option>
 </select>
 </li>
 <li class="l1">��ʼʱ�䣺</li>
 <li class="l2">
 <input type="text" value="<?=$_GET[t2v]?>" style="width:155px;" id="t2" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" />
 </li>
 <li class="l1">����ʱ�䣺</li>
 <li class="l2">
 <input type="text" value="<?=$_GET[t3v]?>" style="width:155px;" id="t3"readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" />
 </li>
 <li class="ltj"><input type="button" onclick="psel()" value="����" /> <input type="button" onclick="gourl('order.php')" value="����" /></li>
 </ul>
 <!--����E-->

 <!--��B-->
 <div class="rkuang">

 <ul class="ordercap">
 <li class="l0"><input name="C2" onclick="xuan()" type="checkbox" /></li>
 <li class="l1">��Ʒ����</li>
 <li class="l2">�����ܶ�</li>
 <li class="l3">����</li>
 <li class="l4">����״̬</li>
 <li class="l5">����</li>
 </ul>
 <!--�б�ʼ-->
 <?
 pagef($ses,10,"yjcode_order","order by sj desc");while($row=mysql_fetch_array($res)){
 $tp=returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $au="orderview.php?orderbh=".$row[orderbh];
 $cz="";
 if($row[ddzt]=="suc"){ //���׳ɹ�
  if(panduan("userid,orderbh","yjcode_propj where orderbh='".$row[orderbh]."' and userid=".$userid)==0){
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."' class='btn feng'>����</a>";
  }else{
  $cz="<a href='orderpj.php?orderbh=".$row[orderbh]."' class='blue'>������</a><br>";
  }
  $cz=$cz."<a href='../product/view".returnproid($row[probh]).".html' target=_blank>�ٴι���</a>";
 
 }elseif($row[ddzt]=="wait"){ //�ȴ�����
  $cz="<a href='javascript:void(0);' onclick='opentangqq(\"".returnqq($row[selluserid])."\")' class='blue'>�������ҷ���</a>";
  $cz=$cz."<br><a href='ordertk.php?orderbh=".$row[orderbh]."' class='hui'>�˿�</a>";
 
 }elseif($row[ddzt]=="back"){ //�˿����
  $cz="<a href='orderjf1.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //�˿�ɹ�
  $cz="<a href='../product/view".returnproid($row[probh]).".html' target=_blank>���¹���</a>";
  $cz=$cz."<a href='orderjf1.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";
 
 }elseif($row[ddzt]=="backerr"){ //�˿�ʧ�ܣ���ͬ���˿�
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='btn'>�ջ�</a>";
  $cz=$cz."<br><a href='ordertk.php?orderbh=".$row[orderbh]."' class='blue'>�ٴ������˿�</a>";
  $cz=$cz."<br><a href='orderjf.php?orderbh=".$row[orderbh]."' class='hui'>����ͷ�����</a>";

 }elseif($row[ddzt]=="db"){ //������
  $cz="<a href='shouhuo.php?orderbh=".$row[orderbh]."' class='btn'>�ջ�</a>";
  $cz=$cz."<br><a href='ordertk.php?orderbh=".$row[orderbh]."' class='hui'>�˿�</a>";

 }elseif($row[ddzt]=="close"){ //����ȡ��
  $cz="<a href='../product/view".returnproid($row[probh]).".html' target=_blank>���¹���</a>";

 }elseif($row[ddzt]=="jf"){ //���״�����
  $cz="<a href='orderjf1.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="jfbuy"){ //���ʤ��
  $cz="<a href='orderjf1.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="jfsell"){ //����ʤ��
  $cz="<a href='orderjf1.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";
  
 }
 ?>
 <ul class="order1">
 <li class="l1"><? if($row[ddzt]=="wpay"){?><input name="C1" id="ck<?=$row[id]?>" type="checkbox" value="<?=$row[id]?>" /><? }?></li>
 <li class="l2"><?=dateYMD($row[sj])?></li>
 <li class="l3">������ţ�<?=$row[orderbh]?></li>
 <li class="l4">�̼ң�<?=returnjiami(returnnc($row[selluserid]))?></li>
 <li class="l5"><a href="javascript:void(0);" onclick="opentangqq('<?=returnqq($row[selluserid])?>')"><img src="../img/qq.png" border="0" /></a></li>
 </ul>
 <ul class="order2">
 <li class="l1"><a href="<?=$au?>"><img class="tp" src="<?=$tp?>" onerror="this.src='img/none60x60.gif'" /></a></li>
 <li class="l2">
 <a title="<?=$row["tit"]?>" href="<?=$au?>" class="a1"><?=returntitdian($row["tit"],102)?></a><br>
 ������ʽ��<?=returnfhxs($row[fhxs])?><br>
 <? if(!empty($row[tcv])){?>�ײͣ�<?=$row[tcv]?><? }?>
 </li>
 <li class="l3">��<?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?></li>
 <li class="l4"><?=$row[num]?></li>
 <li class="l5"><?=returnorderzt($row[ddzt])?><br><a href="<?=$au?>">��������</a></li>
 <li class="l6"><?=$cz?></li>
 </ul>
 <? }?>
 <!--�б����-->
 <div class="npa">
 <?
 $nowurl="order.php";
 $nowwd="ddzt=".$_GET[ddzt]."&t1v=".$_GET[t1v]."&t2v=".$_GET[t2v]."&t3v=".$_GET[t3v]."&t4v=".$_GET[t4];
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