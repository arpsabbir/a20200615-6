<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorder.php");}
$sj=getsj();
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
</head>
<body>

<? include("topuser.php");?>

<div class="ordervtopfd">
<div class="ordervtop box">
 <div class="d1" onClick="gourl('sellorder.php')"><img src="img/topleft1.png" height="21" /></div>
 <div class="d2">��������</div>
 <div class="d3"><img onClick="gourl('./')" src="../img/tx.png" height="21" /></div>
</div>
</div>
<div class="ordervtopfdv"></div>

<?
$sqlpro="select * from yjcode_pro where bh='".$row[probh]."'";mysql_query("SET NAMES 'GBK'");$respro=mysql_query($sqlpro);$rowpro=mysql_fetch_array($respro);
$protp=returntp("bh='".$row[probh]."' order by iffm desc","-2");
$prourl="../product/view".$rowpro[id].".html";
$tcfhxs=0;if(!empty($row[tcid])){$sqltc="select * from yjcode_taocan where id=".$row[tcid];mysql_query("SET NAMES 'GBK'");$restc=mysql_query($sqltc);if($rowtc=mysql_fetch_array($restc)){$tcfhxs=$row2[fhxs];}}
$sqlbuy="select * from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$resbuy=mysql_query($sqlbuy);$rowbuy=mysql_fetch_array($resbuy);
?>
<div class="ordervtop1 box">
 <div class="d1">
  <strong><?=strip_tags(returnorderzt($row[ddzt]))?></strong><br>
  <? 
  if($row[ddzt]=="wait"){
   $second=strtotime($sj)-strtotime($row[sj]);
   $day = floor($second/(3600*24));
   $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
   $hour = floor($second/3600);
   $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
   $minute = floor($second/60);
   $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
   $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
   echo "�ѹ�ȥ".$sjcv;
  
  }elseif($row[ddzt]=="db"){
   while1("*","yjcode_db where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
   $second=strtotime($row1[dboksj])-strtotime($sj);
   $day = floor($second/(3600*24));
   $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
   $hour = floor($second/3600);
   $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
   $minute = floor($second/60);
   $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
   $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
   echo "��ʣ".$sjcv."�Զ�ȷ��";
  
  }elseif($row[ddzt]=="close"){
   echo $row[closesj];
    
  }elseif($row[ddzt]=="back"){
   while1("*","yjcode_tk where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
   $second=strtotime($row1[tkoksj])-strtotime($sj);
   $day = floor($second/(3600*24));
   $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
   $hour = floor($second/3600);
   $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
   $minute = floor($second/60);
   $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
   $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
   echo "����".$sjcv."�ڴ���";

  }elseif($row[ddzt]=="backerr"){
   while1("*","yjcode_db where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
   $second=strtotime($row1[dboksj])-strtotime($sj);
   $day = floor($second/(3600*24));
   $second = $second%(3600*24);//��ȥ����֮��ʣ���ʱ��
   $hour = floor($second/3600);
   $second = $second%3600;//��ȥ��Сʱ֮��ʣ���ʱ�� 
   $minute = floor($second/60);
   $second = $second%60;//��ȥ������֮��ʣ���ʱ�� 
   $sjcv=$day."��".$hour."ʱ".$minute."��".$second."��";
   echo $sjcv."���Զ�������";
 
  }elseif($row[ddzt]=="suc"){
   echo "�ٽ�������ף�����쿪��";
  
  }
  ?>
 </div>
 <div class="d2"><img src="img/ddzt_<?=$row[ddzt]?>.png" /></div>
</div>

<!--����B-->
<script language="javascript">
function wuliu1onc(){
if(document.getElementById("wuliu1d2").className=="d2"){
 document.getElementById("wuliu1d2").className="d2 d21";
 document.getElementById("wuliu1img").src="../img/jiantop.png";
 }else{
 document.getElementById("wuliu1d2").className="d2";
 document.getElementById("wuliu1img").src="../img/jiandown.png";
 }
}
</script>
<? if((5==$rowpro[fhxs] && empty($tcfhxs)) || 5==$tcfhxs){?>
<div class="wuliu1 box" onClick="wuliu1onc()">
 <div class="d1"><img src="img/add1.png" /></div>
 <div class="d2" id="wuliu1d2">
 <? if(!empty($row[kdid])){while1("*","yjcode_kuaidi where id=".$row[kdid]);if($row1=mysql_fetch_array($res1)){$kdbh=$row1[kdbh];$kddh=$row[kddh];?>
 <a href="<?=$row1[kdweb]?>" target="_blank"><?=$row1[tit]?></a> (<span><?=$row[kddh]?></span>)<br>
 <? while1("*","yjcode_chajian where cjbh='cj001' and zt=0");if($row1=mysql_fetch_array($res1)){include("../../config/chajian/cj001/index.php");}else{echo "<br>�����Ը��ƿ�ݵ��ţ�Ȼ������ݹ�˾���ƽ�����վ��ѯ��ʱ��������Ϣ";}?>
 <? }}else{echo "���޿��/������Ϣ<br>�ɼ�ʱ��ע��������<br>���ʵ�Ƿ�¼������ȷ�Ŀ����Ϣ";}?>
 </div>
 <div class="d3"><img id="wuliu1img" src="../img/jiandown.png" /></div>
</div>
<div class="wuliu2 box">
 <div class="d1"><img src="img/add2.png" /></div>
 <div class="d2"><?=$row[shdz]?></div>
</div>
<? }?>
<!--����E-->

<!--��ƷB-->
<div class="orderpro1 box" onClick="gourl('<?=$prourl?>')">
 <div class="d1"><img src="<?=$protp?>" onerror="this.src='../img/none70x70.gif'" width="70" height="70" /></div>
 <div class="d2"><?=$row["tit"]?><br><? if(!empty($row[tcv])){echo "<span class='hui'>".$row[tcv]."</span>";}?></div>
 <div class="d3">��<?=$row[money1]?><br><span class="hui">x<?=$row[num]?></span></div>
</div>
<!--��ƷE-->

<!--������ϢB-->
<? if($row[ddzt]=="db" || $row[ddzt]=="suc"){?>
<div class="ordermain1 box"><div class="d1"></div><div class="d2">ȡ����ʽ</div></div>
<div class="ordermain2 box">
 <div class="d1">ȡ����ʽ:</div>
 <div class="d2">
 <span class="feng">
 <? if((1==$rowpro[fhxs] && empty($tcfhxs)) || 1==$tcfhxs){?>�ö�������Ʒ�������ֶ�����������ϵ����<? }?>
 <? if(2==$rowpro[fhxs] && empty($tcfhxs)){?>���̵�ַ��<?=$rowpro[wpurl]?><br>�������룺<?=$rowpro[wppwd]?><br>��ѹ���룺<?=$rowpro[wppwd1]?><? }?>
 <? if(2==$tcfhxs){?>���̵�ַ��<?=$rowtc[wpurl]?><br>�������룺<?=$rowtc[wppwd]?><br>��ѹ���룺<?=$rowtc[wppwd1]?><? }?>
 <? if(3==$rowpro[fhxs] && empty($tcfhxs)){if(empty($rowpro[upty])){$u=weburl."upload/".$rowpro[userid]."/".$rowpro[bh]."/".$rowpro[upf];}else{$u=$rowpro[upf];}?>
 �ö�������Ʒ�Ѿ���������������������ͼ���������<br>
 <a href="<?=$u?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.png" height="25" /></a>
 <? }?>
 <? if(3==$tcfhxs){if(empty($rowpro[upty])){$u=weburl."upload/".$rowpro[userid]."/".$rowpro[bh]."/".$rowtc[upf];}else{$u=$rowtc[upf];}?>
 �ö�������Ʒ�Ѿ���������������������ͼ���������<br>
 <a href="<?=$u?>" target="_blank"><img border="0" style="margin-top:5px;" src="img/down.png" height="25" /></a>
 <? }?>
 <? if((4==$rowpro[fhxs] && empty($tcfhxs)) || 4==$tcfhxs){?>
 �����Ǳ��εĿ�����Ϣ<br>
 <? if(!empty($rowpro[downurl])){echo "������ص�ַ��<a href='".$rowpro[downurl]."' target='_blank'>��������������</a><br>";}?>
 <?=$row[txt]?>
 <? }?>
 </span>
 </div>
</div>
<div class="ordermain3 box"></div>
<? }?>
<div class="ordermain1 box"><div class="d1"></div><div class="d2">������Ϣ</div></div>
<div class="ordermain2 box"><div class="d1">�������:</div><div class="d2"><?=$orderbh?></div></div>
<div class="ordermain2 box"><div class="d1">�µ�ʱ��:</div><div class="d2"><?=$row[sj]?></div></div>
<? if(!empty($row[liuyan])){?>
<div class="ordermain2 box"><div class="d1">��������:</div><div class="d2"><?=$row[liuyan]?></div></div>
<? }?>
<? if(!empty($row[buyform])){?>
<div class="ordermain2 box"><div class="d1">������Ϣ:</div><div class="d2"><?=$row[buyform]?></div></div>
<? }?>
<? if(!empty($row[fhtxt])){?>
<div class="ordermain2 box"><div class="d1">���ұ�ע</div><div class="d2"><?=$row[fhtxt]?></div></div>
<? }?>
<div class="ordermain2 box"><div class="d1">�����ܶ�:</div><div class="d2"><?=returnjgdian($row[money1]*$row[num]+$row[yunfei])?><? if(!empty($row[yunfei])){?>(���˷�<?=$row[yunfei]?>Ԫ)<? }?></div></div>
<div class="ordermain3 box"></div>
<!--������ϢE-->

<? if($row[ddzt]=="back" || $row[ddzt]=="backerr" || $row[ddzt]=="backsuc" || $row[ddzt]=="jf" || $row[ddzt]=="jfbuy" || $row[ddzt]=="jfsell"){?>
<!--�˿�B-->
<div class="ordermain1 box"><div class="d1"></div><div class="d2">�˿���Ϣ</div></div>
<div class="ordermain2 box"><div class="d1">����ʱ��:</div><div class="d2"><?=$row[tksj]?></div></div>
<div class="ordermain2 box"><div class="d1">�˿�ԭ��:</div><div class="d2"><?=$row[tkly]?></div></div>
<? if(!empty($row[tkoksj])){?>
<div class="ordermain2 box"><div class="d1">����ʱ��:</div><div class="d2"><?=$row[tkoksj]?></div></div>
<div class="ordermain2 box"><div class="d1">������:</div><div class="d2"><?=$row[tkjg]?></div></div>
<? }?>
<div class="ordermain2 box" onClick="gourl('orderjf2.php?orderbh=<?=$orderbh?>')"><div class="d1">Э����ʷ:</div><div class="d2">����鿴�����˿������Ϣ&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/jianright.png" height="10" /></div></div>
<div class="ordermain3 box"></div>
<!--�˿�E-->
<? }?>

<!--����B-->
<div class="orderbuy box"><div class="d1"></div><div class="d2">�����Ϣ</div></div>
<div class="orderbuy1 box"><div class="d1">��ϵQQ:</div><div class="d2"><?=$rowbuy[uqq]?></div></div>
<div class="orderbuy1 box"><div class="d1">΢�ź���:</div><div class="d2"><?=$rowbuy[weixin]?></div></div>
<div class="orderbuy2 box"></div>
<!--����E-->

<div class="ordermain1 box"><div class="d1"></div><div class="d2">��ͨ��¼</div></div>
<div class="jflist box">
 <div class="jfgtlist">
  <? 
  $i=1;
  while1("*","yjcode_orderlog where orderbh='".$orderbh."' and selluserid=".$userid." order by sj desc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../../upload/".$row1[userid]."/user.jpg","../img/nonetx.jpg");$sf="��";}
  elseif($row1[admin]==2){$tp=returntppd("../../upload/".$row1[selluserid]."/user.jpg","../img/nonetx.jpg");$sf="����";}
  elseif($row1[admin]==3){$tp="../img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1<? if($i==1){?> u0<? }?>">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? $i++;}?>
 </div>
</div>

<!--״̬B-->
<? 
 $cz="";
 if($row[ddzt]=="suc"){ //���׳ɹ�
 
 }elseif($row[ddzt]=="wait"){ //�ȴ�����
 $cz="<a href='fahuo.php?orderbh=".$row[orderbh]."' class='a1'>����</a>";
 $cz=$cz."<a href='sellclose.php?orderbh=".$row[orderbh]."'>ȡ������</a>";
 
 }elseif($row[ddzt]=="back"){ //�˿����
 $cz="<a href='selltk.php?orderbh=".$row[orderbh]."'>�����˿�</a>";
 
 }elseif($row[ddzt]=="backsuc"){ //�˿�ɹ�
 $cz="";

 }elseif($row[ddzt]=="db"){ //������

 }elseif($row1[ddzt]=="wpay"){ //�ȴ���Ҹ���

 }elseif($row[ddzt]=="jf"){ //���״����� 
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."'>��ͨ</a>";

 }elseif($row[ddzt]=="jfbuy"){ //���ʤ�� 
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."'>��ͨ</a>";

 }elseif($row[ddzt]=="jfsell"){ //����ʤ�� 
 $cz="<a href='orderjf2.php?orderbh=".$row[orderbh]."'>��ͨ</a>";
  
 }
?>
<? if(!empty($cz)){?>
<div class="ordermain4fd">
<div class="ordermain4 box">
 <div class="d1"><?=$cz?></div>
</div>
</div>
<div class="ordermain4fdv"></div>
<? }?>
<!--״̬E-->
</body>
</html>