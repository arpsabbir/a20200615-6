<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$ses=" where selluserid=".$userid;
$sestj=$ses;
if($_GET[t1v]!=""){$ses=$ses." and tit like '%".$_GET[t1v]."%'";$sestj=$ses;}
if($_GET[t2v]!=""){$ses=$ses." and sj>='".$_GET[t2v]."'";$sestj=$ses;}
if($_GET[t3v]!=""){$ses=$ses." and sj<='".$_GET[t3v]."'";$sestj=$ses;}
if($_GET[t4v]!=""){$ses=$ses." and orderbh='".$_GET[t4v]."'";$sestj=$ses;}
if($_GET[ddzt]!=""){$ses=$ses." and ddzt='".$_GET[ddzt]."'";}
if($_GET[page]!=""){$page=$_GET[page];}else{$page=1;}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/adddate.js" ></script> 
<script language="javascript">
function ser(){
 str="t1v="+document.getElementById("t1").value;
 str=str+"&t2v="+document.getElementById("t2").value;
 str=str+"&t3v="+document.getElementById("t3").value;
 str=str+"&t4v="+document.getElementById("t4").value;
 str=str+"&ddzt="+document.getElementById("ddztv").value;
 location.href="sellorder.php?"+str;
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
 <? include("rcap6.php");?>
 <script language="javascript">
 document.getElementById("rcap<?=$_GET[ddzt]?>").className="l1 l2";
 </script>

 <!--����B-->
 <div class="kssel">
 <ul class="u1">
 <li class="l1">�������⣺</li>
 <li class="l2"><input type="text" value="<?=$_GET[t1v]?>" id="t1" style="width:155px;" /></li>
 <li class="l1">������ţ�</li>
 <li class="l2"><input type="text" value="<?=$_GET[t4v]?>" id="t4" style="width:155px;" /></li>
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
 <li class="ltj"><input type="button" onclick="ser()" class="bt1" value="����" /> <input type="button" onclick="gourl('sellorder.php')" class="bt2" value="����" /></li>
 </ul>
 </div>
 <!--����E-->

 <!--��B-->
 <div class="rkuang">

 <div class="ksedi">
  <div class="d1">
  <a href="javascript:codecheckDEL(3,'code_down')" class="a1">ɾ������</a>
  </div>
  <div class="d3">
  <?
  $sqlq="select sum(money1*num+yunfei) as orderall from yjcode_order".$sestj." and ddzt='db'";mysql_query("SET NAMES 'GBK'");$resq=mysql_query($sqlq);$rowq=mysql_fetch_array($resq);
  $money1=sprintf("%.2f",$rowq[orderall]);
  ?>
  ���ڵ�����<strong class="blue"><?=$money1?>Ԫ</strong>��
  </div>
 </div>

 <ul class="sellordercap">
 <li class="l0"><input name="C2" onclick="xuan()" type="checkbox" /></li>
 <li class="l1">��Ʒ��Ϣ</li>
 <li class="l2">�����۸�</li>
 <li class="l3">����</li>
 <li class="l4">������Ϣ</li>
 <li class="l5">����</li>
 </ul>
 <!--�б�ʼ-->
 <?
 pagef($ses,10,"yjcode_order","order by sj desc");while($row=mysql_fetch_array($res)){
 $au="sellorderview.php?orderbh=".$row[orderbh];
 $tp=returntp("bh='".$row[probh]."' order by iffm desc","-2");
 $cz="";
 if($row[ddzt]=="suc"){ //���׳ɹ�
 
 }elseif($row[ddzt]=="wait"){ //�ȴ�����
 $cz="<a href='fahuo.php?orderbh=".$row[orderbh]."' class='btn'>����</a>";
 $cz=$cz."<br><a href='sellclose.php?orderbh=".$row[orderbh]."' class='hui'>ȡ������</a>";
 
 }elseif($row[ddzt]=="back"){ //�˿����
 $cz="<a href='selltk.php?orderbh=".$row[orderbh]."' class='hui'>�����˿�</a>";
 $cz=$cz."<a href='orderjf2.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="backerr"){ //�˿ͬ��
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="backsuc"){ //�˿�ɹ�
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="db"){ //������

 }elseif($row[ddzt]=="wpay"){ //�ȴ���Ҹ���

 }elseif($row[ddzt]=="jf"){ //���״����� 
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="jfbuy"){ //���ʤ�� 
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";

 }elseif($row[ddzt]=="jfsell"){ //����ʤ�� 
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."' class='btn'>��ͨ</a>";
  
 }
 ?>
 <ul class="sellorder1">
 <li class="l1"><? if($row[ddzt]=="wpay"){?><input name="C1" type="checkbox" value="<?=$row[id]?>" /><? }?></li>
 <li class="l2"><?=dateYMD($row[sj])?></li>
 <li class="l3">������ţ�<?=$row[orderbh]?></li>
 <li class="l4">��ң�<?=returnnc($row[userid])?></li>
 <li class="l5"><a href="javascript:void(0);" onclick="opentangqq('<?=returnqq($row[userid])?>')"><img src="../img/qq.png" border="0" /></a></li>
 </ul>
 <ul class="sellorder2">
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
 $nowurl="sellorder.php";
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