<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
$tit="�̼ҷ��";
$ses=" where zt=1 and shopzt=2 and shopname<>''";
if(returnsx("s")!=-1){$skey=safeEncoding(returnsx("s"));$ses=$ses." and shopname like '%".$skey."%'";$tit=$tit." ".$skey;}
if(returnsx("q")!=-1){$ses=$ses." and uqq='".returnsx("q")."'";}
if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by yxsj desc";
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=$tit?> - <?=webname?></title>
<? include("../tem/cssjs.html");?>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<script language="javascript">topjconc(2,'����');document.getElementById("topt").value="<?=$skey?>";</script>

<div class="yjcode fontyh">

<? if($page==1 && $skey==""){?>
<!--�Ƽ�B-->
<div class="tuijian">
 <? 
 $i=1;
 while1("*","yjcode_user where zt=1 and shopzt=2 and pm>0 order by pm asc limit 3");while($row1=mysql_fetch_array($res1)){
 $au=returnmyweb($row1[id],$row1[myweb]);
 $sucnum=returnjgdw($row1[xinyong],"",returnxy($row1[id],1));
 ?>
 <div class="dlist dlist<?=$i?>">
  <div class="d1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?="../upload/".$row1[id]."/shop.jpg"?>" onerror="this.src='../img/none180x180.gif'" width="120" height="120" /></a></div>
  <ul class="u1">
  <li class="l1"><span class="s0"><?=returnshoptype($row1[shoptype])?></span><a href="<?=$au?>" target="_blank"><?=$row1[shopname]?></a></li>
  <li class="l2"><img src="../img/dj/<?=returnxytp($sucnum)?>" title="����ֵ<?=$sucnum?>" /></li>
  <li class="l3">����������<?=returncount("yjcode_pro where zt=0 and ifxj=0 and userid=".$row1[id])?>��</li>
  <li class="l4"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row1[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank">���ٹ�ͨ</a><a href="view<?=$row1[id]?>.html" target="_blank">�������</a></li>
  </ul>
  <div class="d2">
  ����:
  <? while2("*","yjcode_protype where zt=0 and admin=1 and userid=".$row1[id]." order by xh asc limit 4");while($row2=mysql_fetch_array($res2)){?>
  <a href="prolist_i<?=$row1[id]?>v_j<?=$row2[id]?>v.html" target="_blank"><?=$row2[name1]?></a>&nbsp;
  <? }?> 
  </div>
  <div class="d3">
  <?
  while2("*","yjcode_pro where userid=".$row1[id]." and zt=0 and ifxj=0 order by lastsj desc limit 4");while($row2=mysql_fetch_array($res2)){
  $au="../product/view".$row2[id].".html";
  $tp=returntp("bh='".$row2[bh]."' order by iffm desc","-2");
  ?>
  <a href="<?=$au?>" target="_blank" title="<?=$row2[tit]?>"><img src="<?=$tp?>" onerror="this.src='../img/none180x180.gif'" width="70" height="70" border="0" /></a>
  <? }?>
  </div>
 </div>
 <? $i++;}?>
 <? if($i<4){$j=4-$i;}elseif($i>4 && $i<7){$j=7-$i;}for($m=1;$m<=$j;$m++){?>
 <div class="xuwei"><a href="../help/aboutview4.html" target="_blank">��λ�Դ�</a></div>
 <? }?>
</div>
<!--�Ƽ�E-->
<? }?>

<? adwhile("ADSHOP02");?>

<!--��B-->
<div class="sleft">
 <?
 pagef($ses,10,"yjcode_user",$px);while($row=mysql_fetch_array($res)){
 $au="view".$row[id].".html";
 $sucnum=returnjgdw($row[xinyong],"",returnxy($row[id],1));
 $mspf=returnjgdw(returnjgdian($row[pf1]),"","5.00");
 $fhpf=returnjgdw(returnjgdian($row[pf2]),"","5.00");
 $shpf=returnjgdw(returnjgdian($row[pf3]),"","5.00");
 ?>
 <div class="slist">
  <div class="d1"><a href="<?=$au?>" target="_blank"><img border="0" src="<?="../upload/".$row[id]."/shop.jpg"?>" onerror="this.src='../img/none180x180.gif'" /></a><br>���� <?=$row[djl]?> �˹�ע</div>
  <ul class="u1">
  <li class="l1"><span class="s0"><?=returnshoptype($row[shoptype])?></span><a href="<?=$au?>" target="_blank"><?=$row[shopname]?></a></li>
  <li class="l2">
  <? if(1==$row[ifmot]){?><span class="s1" title="�ֻ��Ѿ���֤">�ֻ�</span><? }?>
  <? if(1==$row[ifemail]){?><span class="s2" title="�����Ѿ���">����</span><? }?>
  <? if(1==$row[sfzrz]){?><span class="s3" title="���֤ͨ����֤">���֤</span><? }?>
  <? if($row[baomoney]>0){?><span class="s4" title="�ѽ��ɱ�֤��">��</span><span class="s5"><?=$row[baomoney]?>Ԫ</span><? }?>
  <span class="s6" title="��Ʒ����">��</span><span class="s7"><?=returncount("yjcode_pro where zt=0 and ifxj=0 and userid=".$row[id])?>��</span>
  </li>
  <li class="l3">
  ����:
  <? while2("*","yjcode_protype where zt=0 and admin=1 and userid=".$row[id]." order by xh asc limit 4");while($row2=mysql_fetch_array($res2)){?>
  <a href="prolist_i<?=$row[id]?>v_j<?=$row2[id]?>v.html" target="_blank"><?=$row2[name1]?></a>&nbsp;
  <? }?> 
  </li>
  <li class="l4"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$row[uqq]?>&site=<?=weburl?>&menu=yes" target="_blank" class="a1">��TA��ϵ��ͨ</a><a href="<?=$au?>" target="_blank" class="a2">�������</a></li>
  </ul>
  <div class="d2">
  ���������<span><?=$mspf?></span>��<br>�����ٶȣ�<span><?=$fhpf?></span>��<br>����̬�ȣ�<span><?=$shpf?></span>��<br>�ۺ����֣�<strong><?=$shpf?></strong>
  </div>
 </div>
 <? }?>
 <div class="npa">
 <?
 $nowurl="search";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>
</div>
<!--��E-->

<!--��B-->
<div class="sright">
 <? adwhile("ADS01",0,238,0)?>
 <div class="hotsp">
 <ul class="u1">
 <li class="l1">������Ʒ</li>
 <li class="l2"><a href="../">����</a></li>
 <li class="l3">����</li>
 <li class="l4">�۸�</li>
 </ul>
 <? 
 $i=1;
 while1("*","yjcode_pro where zt=0 and ifxj=0 order by djl desc limit 8");while($row1=mysql_fetch_array($res1)){
 ?>
 <ul class="u2">
 <li class="l1"><span class="s<?=$i?>"><?=$i?></span></li>
 <li class="l2"><a href="../product/view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],20)?></a></li>
 <li class="l3"><?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></li>
 </ul>
 <? $i++;}?>
 </div>
 
 <div class="hotnew">
 <ul class="u1">
 <li class="l1">������Ѷ</li>
 <li class="l2"><a href="../news/">����>></a></li>
 </ul>
 <ul class="u2">
 <? $i=1;while1("*","yjcode_news where zt=0 order by lastsj desc limit 10");while($row1=mysql_fetch_array($res1)){?>
 <li class="l1"><span class="s<?=$i?>"><?=$i?></span></li>
 <li class="l2"><a href="../news/txtlist_i<?=$row1[id]?>v.html" title="<?=$row1[tit]?>"><?=strgb2312($row1[tit],0,30)?></a></li>
 <? $i++;}?>
 </ul>
 </div>
</div>
<!--��E-->

</div>
<? include("../tem/bottom.html");?>
</body>
</html>