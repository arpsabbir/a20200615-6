<?
include("../config/conn.php");
include("../config/function.php");
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$getstr=$_GET[str];
//���б�ǩ a b c d e f g h i j k l m n o p q s
$tit="��Ʒ�б�";
$ses=" where zt=0 and ifxj=0";
$ty1id=returnsx("j");if($ty1id!=-1){
 $sqlty1="select * from yjcode_type where admin=1 and id=".$ty1id;mysql_query("SET NAMES 'GBK'");$resty1=mysql_query($sqlty1);$rowty1=mysql_fetch_array($resty1);
 $ty1name=$rowty1[type1];
 $ty1propx=intval($rowty1[propx]);
 $ses=$ses." and ty1id=".$ty1id;
 if(empty($rowty1[seotit])){$tit=$ty1name;}else{$tit=$rowty1[seotit];}
 $seokey=$rowty1[seokey];
 $seodes=$rowty1[seodes];
}

$ty2id=returnsx("k");if($ty2id!=-1){
 $sqlty2="select * from yjcode_type where admin=2 and id=".$ty2id;mysql_query("SET NAMES 'GBK'");$resty2=mysql_query($sqlty2);$rowty2=mysql_fetch_array($resty2);
 $ty2name=$rowty2[type2];
 $ses=$ses." and ty2id=".$ty2id;
 if(empty($rowty2[seotit])){$tit=$tit."/".$ty2name;}else{$tit=$rowty2[seotit];}
 $seokey=$rowty2[seokey];
 $seodes=$rowty2[seodes];
}

$ty3id=returnsx("m");if($ty3id!=-1){$ty3name=returntype(3,$ty3id);$ses=$ses." and ty3id=".$ty3id;$tit=$tit."/".$ty3name;}
$ty4id=returnsx("i");if($ty4id!=-1){$ty4name=returntype(4,$ty4id);$ses=$ses." and ty4id=".$ty4id;$tit=$tit."/".$ty4name;}
$ty5id=returnsx("l");if($ty5id!=-1){$ty5name=returntype(5,$ty5id);$ses=$ses." and ty5id=".$ty5id;$tit=$tit."/".$ty5name;}
if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
 $tit=$tit."/".$skey;
}
if(returnsx("b")!=-1){$mon1=returnsx("b");$ses=$ses." and money2>=".$mon1;}
if(returnsx("c")!=-1){$mon2=returnsx("c");$ses=$ses." and money2<=".$mon2;}
if(returnsx("a")!=-1){$ifjx=returnsx("a");$ses=$ses." and iftj>0";}
if(returnsx("d")!=-1){$ifzdfh=returnsx("d");$ses=$ses." and (fhxs=2 or fhxs=3 or fhxs=4)";}
if(returnsx("g")!=-1){$ifuserdj=returnsx("g");$ses=$ses." and ifuserdj=1";}
$area1=returnsx("n");$area2=returnsx("o");$area3=returnsx("q");
if($area1!=-1 && $area2==-1 && $area3==-1){$x1="|".$area1.",";$ses=$ses." and (ysarea like '%".$x1."%' or ysarea is null or ysarea='')";}
elseif($area1!=-1 && $area2!=-1 && $area3==-1){$x1="|".$area1.",".$area2.",";$ses=$ses." and (ysarea like '%".$x1."%' or ysarea is null or ysarea='')";}
elseif($area1!=-1 && $area2!=-1 && $area3!=-1){$x1="|".$area1.",".$area2.",".$area3."|";$ses=$ses." and (ysarea like '%".$x1."%' or ysarea is null or ysarea='')";}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
$px="order by lastsj desc";
$pxv=returnsx("f");
if($pxv==1){$px="order by lastsj asc";}
elseif($pxv==2){$px="order by xsnum desc";}
elseif($pxv==3){$px="order by xsnum asc";}
elseif($pxv==4){$px="order by djl desc";}
elseif($pxv==5){$px="order by djl asc";}
elseif($pxv==6){$px="order by money2 desc";}
elseif($pxv==7){$px="order by money2 asc";}
elseif($pxv==8){$px="order by lastsj desc";}
elseif($pxv==9){$px="order by lastsj asc";}

if(!empty($_SESSION[SHOPUSER])){$myuserid=returnuserid($_SESSION[SHOPUSER]);}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=$seokey?>">
<meta name="description" content="<?=$seodes?>">
<title><?=$tit?> - <?=webname?></title>
<? include("../tem/cssjs.html");?>
<style type="text/css">
body{background-color:#F2F2F3;}
</style>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>
<script language="javascript">topjconc(1,'��Ʒ');document.getElementById("topt").value="<?=$skey?>";</script>

<div class="yjcode">
 
 <ul class="mydqwz">
 <li class="l1">
 ��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> > 
 <? if($ty1id!=-1){?><a href="search_j<?=$ty1id?>v.html"><?=$ty1name?></a> > <? }?>
 <? if($ty2id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html"><?=$ty2name?></a> > <? }?>
 <? if($ty3id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html"><?=$ty3name?></a> > <? }?>
 <? if($ty4id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html"><?=$ty4name?></a> > <? }?>
 <? if($ty5id!=-1){?><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$ty5id?>v.html"><?=$ty5name?></a><? }?>
 </li>
 </ul>
 
 <!--ɸѡB-->
 <div class="proxuan" id="proxuan">
 
  <ul class="u1">
  <li class="l1">��Ʒ��Ŀ��</li>
  <li class="l2">
  <span><a href="./" class="<? if($ty1id==-1){echo "ah";}else{echo "an";}?>">ȫ��</a></span>
  <? while1("*","yjcode_type where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <span><a href="search_j<?=$row1[id]?>v.html"  class="<? if(check_in("_j".$row1[id]."v",$getstr)){echo "a1";}?>"><?=$row1[type1]?></a></span>
  <? }?>
  </li>
  </ul>
 
  <? if($ty1id!=-1){if(panduan("*","yjcode_type where admin=2 and type1='".$ty1name."'")==1){?>
  <ul class="u1">
  <li class="l1"><?=$ty1name?>��</li>
  <li class="l2">
  <span><a href="search_j<?=$ty1id?>v.html" class="<? if($ty2id==-1){echo "ah";}else{echo "an";}?>">����</a></span>
  <? while1("*","yjcode_type where admin=2 and type1='".$ty1name."' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <span><a href="search_j<?=$ty1id?>v_k<?=$row1[id]?>v.html" <? if(check_in("_k".$row1[id]."v",$getstr) && check_in("_k".$row1[id]."v",$getstr)){?> class="a1"<? }?>><?=$row1[type2]?></a></span>
  <? }?>
  </li>
  </ul>
  <? }}?>
 
 <? if($ty2id!=-1){if(panduan("*","yjcode_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."'")==1){?>
 <ul class="u1">
 <li class="l1"><?=$ty2name?>��</li>
 <li class="l2">
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="<? if($ty3id==-1){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while3("*","yjcode_type where admin=3 and type1='".$ty1name."' and type2='".$ty2name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$row3[id]?>v.html" <? if(check_in("_m".$row3[id]."v",$getstr)){?> class="a1"<? }?>><?=$row3[type3]?></a></span>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty3id!=-1){if(panduan("*","yjcode_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."'")==1){?>
 <ul class="u1">
 <li class="l1"><?=$ty3name?>��</li>
 <li class="l2">
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="<? if($ty4id==-1){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while3("*","yjcode_type where admin=4 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$row3[id]?>v.html" <? if(check_in("_i".$row3[id]."v",$getstr)){?> class="a1"<? }?>><?=$row3[type4]?></a></span>
 <? }?>
 </li>
 </ul>
 <? }}?>
 
 <? if($ty4id!=-1){if(panduan("*","yjcode_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."'")==1){?>
 <ul class="u1">
 <li class="l1"><?=$ty4name?>��</li>
 <li class="l2">
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class="<? if($ty5id==-1){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while3("*","yjcode_type where admin=5 and type1='".$ty1name."' and type2='".$ty2name."' and type3='".$ty3name."' and type4='".$ty4name."' order by xh asc");while($row3=mysql_fetch_array($res3)){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$row3[id]?>v.html" <? if(check_in("_l".$row3[id]."v",$getstr)){?> class="a1"<? }?>><?=$row3[type5]?></a></span>
 <? }?>
 </li>
 </ul>
 <? }}?>

 <? 
 $si=0;
 $sbarr=array();
 while1("*","yjcode_typesx where admin=1 and typeid=".$ty1id." and ifsel=1 order by xh asc");while($row1=mysql_fetch_array($res1)){
 $ev="e".$row1[id]."_";
 $sbarr[$si]=$ev;
 ?>
 <ul class="u1">
 <li class="l1"><?=$row1[name1]?>��</li>
 <li class="l2">
 <span><a href="<?=rentser($ev,'','','');?>" class="<? if(check_in("_".$ev."_v",$getstr) || !check_in("_".$ev,$getstr)){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while2("*","yjcode_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <span><a href="<?=rentser($ev,$row2[id],'','');?>" <? if(check_in("_".$ev.$row2[id]."v",$getstr)){?> class="a1"<? }?>><?=$row2[name2]?></a></span>
 <? }?>
 </li>
 </ul>
 <? 
 $si++;
 }
 for($si=0;$si<count($sbarr);$si++){if(returnsx($sbarr[$si])!=-1){$nsx="xcf".returnsx($sbarr[$si])."xcf";$ses=$ses." and tysx like '%".$nsx."%'";}}
 ?>
 
 <? if(!empty($rowcontrol[ifarea])){?>
 <ul class="u1">
 <li class="l1">���۵�����</li>
 <li class="l2">
 <span><a href="<?=rentser('n','','o','','search','q','')?>" class="<? if($area1==-1){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while3("*","yjcode_city where level=1 order by id asc");while($row3=mysql_fetch_array($res3)){?>
 <span><a href="<?=rentser('n',$row3[bh],'o','','search','q','')?>" <? if(check_in("_n".$row3[bh]."v",$getstr)){?> class="a1"<? }?>><?=$row3[name1]?></a></span>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <? if($area1!=-1){?>
 <ul class="u1">
 <li class="l1"><?=returnarea($area1)?>��</li>
 <li class="l2">
 <span><a href="<?=rentser('o','','q','')?>" class="<? if($area2==-1){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while3("*","yjcode_city where level=2 and parentid='".$area1."' order by id asc");while($row3=mysql_fetch_array($res3)){?>
 <span><a href="<?=rentser('o',$row3[bh],'q','')?>" <? if(check_in("_o".$row3[bh]."v",$getstr)){?> class="a1"<? }?>><?=$row3[name1]?></a></span>
 <? }?>
 </li>
 </ul>
 <? }?>
 
 <? if($area2!=-1){?>
 <ul class="u1">
 <li class="l1"><?=returnarea($area2)?>��</li>
 <li class="l2">
 <span><a href="<?=rentser('q','','','')?>" class="<? if($area3==-1){echo "ah";}else{echo "an";}?>">����</a></span>
 <? while3("*","yjcode_city where level=3 and parentid='".$area2."' order by id asc");while($row3=mysql_fetch_array($res3)){?>
 <span><a href="<?=rentser('q',$row3[bh],'','')?>" <? if(check_in("_q".$row3[bh]."v",$getstr)){?> class="a1"<? }?>><?=$row3[name1]?></a></span>
 <? }?>
 </li>
 </ul>
 <? }?>

 <!--��ѡ����B-->
 <div class="nser" id="nser">
 
 <div class="xsm">��ѡ������</div>
 
 <div class="xuan" id="xuan">
 
 <? if($ty1id!=-1){?>
 <span><a href="./" class="g_ac0"><?=$ty1name?></a></span>
 <? }?>
 
 <? if($ty2id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v.html" class="g_ac0"><?=$ty2name?></a></span>
 <? }?>
 
 <? if($ty3id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v.html" class="g_ac0"><?=$ty3name?></a></span>
 <? }?>
 
 <? if($ty4id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v.html" class="g_ac0"><?=$ty4name?></a></span>
 <? }?>
 
 <? if($ty5id!=-1){?>
 <span><a href="search_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v.html" class="g_ac0"><?=$ty5name?></a></span>
 <? }?>
 
 <? 
 for($si=0;$si<count($sbarr);$si++){
  $tsx=returnsx($sbarr[$si]);
  if($tsx!=-1){
   while1("*","yjcode_typesx where id=".$tsx);if($row1=mysql_fetch_array($res1)){
   if($row1[admin]==2){
 ?>
 <span><a href="<?=rentser($sbarr[$si],'','','');?>" class="g_ac0"><?=$row1[name1]."��".$row1[name2]?></a></span>
 <? }}}}?>
 
 <? 
 if(returnsx("b")!=-1 || returnsx("c")!=-1){ 
  if(returnsx("c")!=-1 && returnsx("b")!=-1){$tjv=returnsx("b")."-".returnsx("c")."Ԫ";}
  elseif(returnsx("c")==-1){$tjv=returnsx("b")."Ԫ����";}
  elseif(returnsx("b")==-1){$tjv=returnsx("c")."Ԫ����";}
 ?>
 <span><a href="<?=rentser('b','','c','');?>" class="g_ac0"><?=$tjv?></a></span>
 <? }?>
 
 <? if($skey!=""){?>
 <span><a href="<?=rentser('s','','','');?>" class="g_ac0"><?=$skey?></a></span>
 <? }?>
 
 <? if($ifjx==1){?>
 <span><a href="<?=rentser('a','','','');?>" class="g_ac0">��վ��ѡ</a></span>
 <? }?>
 
 <? if($ifzdfh==1){?>
 <span><a href="<?=rentser('d','','','');?>" class="g_ac0">�Զ�����</a></span>
 <? }?>
 
 <? if($area1!=-1){?>
 <span><a href="<?=rentser('n','','o','','search','q','');?>" class="g_ac0"><?=returnarea($area1)?></a></span>
 <? }?>
 
 <? if($area2!=-1){?>
 <span><a href="<?=rentser('o','','q','');?>" class="g_ac0"><?=returnarea($area2)?></a></span>
 <? }?>
 
 <? if($area3!=-1){?>
 <span><a href="<?=rentser('q','','','');?>" class="g_ac0"><?=returnarea($area3)?></a></span>
 <? }?>
 
 </div>
  
 </div>
 <script language="javascript">
 a=(document.getElementById("xuan").innerHTML).replace(/\s*/g,"");
 if(a==""){document.getElementById("nser").style.display="none";}
 </script>
 <!--��ѡ����E-->

 <!--����B-->
 <div class="paixu">
  <div class="d1">
  <? 
  $pxv=returnsx("f");
  $p1s=-1;
  $p2s=2;
  $p3s=4;
  $p4s=6;
  $p5s=8;
  if($pxv==-1){$p1a="a1";$p1s="1";}elseif($pxv==1){$p1a="a2";$p1s="-1";}
  if($pxv==2){$p2a="a1";$p2s="3";}elseif($pxv==3){$p2a="a2";$p2s="2";}
  if($pxv==4){$p3a="a1";$p3s="5";}elseif($pxv==5){$p3a="a2";$p3s="4";}
  if($pxv==6){$p4a="a1";$p4s="7";}elseif($pxv==7){$p4a="a2";$p4s="6";}
  if($pxv==8){$p5a="a1";$p5s="9";}elseif($pxv==9){$p5a="a2";$p5s="8";}
  ?>
  <a href="<?=rentser('f',$p1s,'','');?>"<? if($pxv==-1 || $pxv==1){?> class="<?=$p1a?> g_ac1_h"<? }?>>�ۺ�</a>
  <a href="<?=rentser('f',$p5s,'','');?>"<? if($pxv==8 || $pxv==9){?> class="<?=$p5a?> g_ac1_h"<? }?>>ʱ��</a>
  <a href="<?=rentser('f',$p2s,'','');?>"<? if($pxv==2 || $pxv==3){?> class="<?=$p2a?> g_ac1_h"<? }?>>����</a>
  <a href="<?=rentser('f',$p3s,'','');?>"<? if($pxv==4 || $pxv==5){?> class="<?=$p3a?> g_ac1_h"<? }?>>����</a>
  <a href="<?=rentser('f',$p4s,'','');?>"<? if($pxv==6 || $pxv==7){?> class="<?=$p4a?> g_ac1_h"<? }?>>�۸�</a>
  </div>
  <form name="f1" method="post" onSubmit="return psear('_j<?=$ty1id?>v_k<?=$ty2id?>v_m<?=$ty3id?>v_i<?=$ty4id?>v_l<?=$ty5id?>v')">
  <div class="d2">
  <ul class="u2">
  <li class="l2"><label><input id="C1" type="checkbox" value="1"<? if($ifjx==1){?> checked<? }?>> <span>��ѡ</span></label></li>
  <li class="l2"><label><input id="C2" type="checkbox" value="1"<? if($ifzdfh==1){?> checked<? }?>> <span>�Զ�����</span></label></li>
  <li class="l2"><label><input id="C3" type="checkbox" value="1"<? if($ifuserdj==1){?> checked<? }?>> <span>��Ա�ۿ�</span></label></li>
  <li class="l4">�۸�</li>
  <li class="l5"><input name="money1" id="money1" value="<?=$mon1?>" type="text" /></li>
  <li class="l6">-</li>
  <li class="l5"><input name="money2" id="money2" value="<?=$mon2?>" type="text" /></li>
  <li class="l7">�ؼ��֣�</li>
  <li class="l8"><input name="ink1" value="<?=$skey?>" id="ink1" type="text" /></li>
  <li class="l9"><input name="" value="����" type="submit" /></li>
  </ul>
  </div>
  </form>
 </div>
 <!--����E-->

 </div>
 <!--ɸѡE-->


 <!--����B-->
 <div class="projyi" id="projyi">
  <?
  $inittjarr=array(0,0,0,0);
  $inittjb=preg_split("/,/",$rowcontrol[inittj]);
  for($i=0;$i<count($inittjb);$i++){
  if(is_numeric($inittjb[$i])){$inittjarr[$i]=$inittjb[$i];}
  }
  ?>
  <div class="ptj">��<?=number_format($inittjarr[3]+returnsum("money1*num","yjcode_order where ddzt<>'backsuc' and ddzt<>'close'"),2)?></div>
  <ul class="u1">
  <li class="l1"></li>
  <li class="l2">���׶�̬</li>
  <li class="l3"></li>
  <li class="l4">��վ��ʵ��������</li>
  </ul>
 <!--������ʼ-->
 <div class="gdmain" id="Marquee1">
 <? 
 $i=1;while1("*","yjcode_order where (ddzt='wait' or ddzt='db' or ddzt='suc') order by sj desc limit 50");while($row1=mysql_fetch_array($res1)){
 while2("id,bh,tit","yjcode_pro where bh='".$row1[probh]."'");$row2=mysql_fetch_array($res2);
 ?>
 <div class="gd">
 <ul class="u2">
 <li class="l1"><?=dateMD($row1[sj])?></li>
 <li class="l2"><?=returnjiami(returnnc($row1[userid]))?> ��<?=$row1[money1]?></li>
 <li class="l3"><span><a href="view<?=$row2[id]?>.html" target="_blank"><?=$row2[tit]?></a></span></li>
 </ul>
 </div>
 <? $i++;}?>
 <script>
 var Mar1 = document.getElementById("Marquee1");
 var child_div1=Mar1.getElementsByTagName("div")
 var picH1 = 70;//�ƶ��߶�
 var scrollstep1=3;//�ƶ�����,Խ��Խ��
 var scrolltime1=40;//�ƶ�Ƶ��(����)Խ��Խ��
 var stoptime1=2000;//���ʱ��(����)
 var tmpH1 = 0;
 Mar1.innerHTML += Mar1.innerHTML;
 function start1(){
	if(tmpH1 < picH1){
		tmpH1 += scrollstep1;
		if(tmpH1 > picH1 )tmpH1 = picH1 ;
		Mar1.scrollTop = tmpH1;
		setTimeout(start1,scrolltime1);
	}else{
		tmpH1 = 0;
		Mar1.appendChild(child_div1[0]);
		Mar1.scrollTop = 0;
		setTimeout(start1,stoptime1);
	}
 }
 start1();
 </script>
 </div>
 <!--��������-->
 <div class="clear clear10"></div>
 </div>
 <!--����E-->

 <script language="javascript">
 a=document.getElementById("proxuan").offsetHeight;
 b=a-191;
 document.getElementById("Marquee1").style.height=b+"px";
 document.getElementById("projyi").style.height=a+"px";
 </script>

  <? pagef($ses,20,"yjcode_pro",$px);?>
  
  <? if(empty($ty1propx)){?>
  <!--ͼƬB-->
  <div class="biglist">
  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  while1("*","yjcode_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tit=strgb2312($row[tit],0,60);
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  $tp=returntp("bh='".$row[bh]."' order by xh asc","-1");
  $xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));
  ?>
  <ul class="u1<? if($i % 5==0){echo " u0";}?>">
  <li class="l1">
  <? if(!empty($row[ysweb])){?>
  <div class="d1">
  <a href="<?=$au?>" class="s1" target="_blank">�鿴����</a>
  <a target="_blank" href="<?=$row[ysweb]?>" class="s2">�鿴��ʾ</a>
  </div>
  <? }?>
  <a href="<?=$au?>" target="_blank"><img alt="<?=$row[tit]?>" onerror="this.src='../img/none180x180.gif'" src="<?=$tp?>" /></a>
  </li>
  <li class="l3">
  <? if($row[iftj]>0){?><span class="s1 st">��վ</span><span class="s2 st">��ѡ</span><? }?>
  <a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></a>
  </li>
  <li class="l2">��<?=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]))?></li>
  <li class="l5"><a href="<?=returnmyweb($row1[id],$row1[myweb])?>" charset="g_ac2" title="<?=$row1[shopname]?>" target="_blank"><?=$row1[shopname]?></a></li>
  <li class="l6">
  <span class="s0"><?=returnshoptype($row1[shoptype])?></span>
  <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?>
  <span class="s1" title="�Զ�������Ʒ������󼴿ɻ�ȡ����Ʒ�ķ�����Ϣ�������ص�ַ���������ȣ�">��</span>
  <? }?>
  <? if(1==$row[ifuserdj]){?><span class="s1" title="����Ʒ�Ѿ������Ա�ȼ��ۿ���ϵ����վ��Ա����������Ӧ���ۼ��Ż�">��</span><? }?>
  <? if($row1[baomoney]>0){?><span class="s1" title="�Ѽ����������̼��ѽ���(<?=sprintf("%.2f",$row1[baomoney])?>Ԫ)��֤��">��</span><? }?>
  </li>
  </ul>
  <? $i++;}?>
  </div>
  <!--ͼƬE-->
  <? }else{?>
  <!--�б�B-->
  <?
  $i=1;
  while($row=mysql_fetch_array($res)){
  $au="view".$row[id].".html";
  $money1=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
  $tit=$row[tit];
  if(!empty($skey)){$tit=str_replace($skey,"<span class='red'>".$skey."</span>",$tit);}
  while1("*","yjcode_user where id=".$row[userid]);$row1=mysql_fetch_array($res1);
  $tp=returntp("bh='".$row[bh]."' order by xh asc","-1");
  $xy=returnjgdw($row1[xinyong],"",returnxy($row[userid],1));
  ?>
  <div class="list">
   <div class="listl">
    <div class="d1"><img src="<?=returntppd("../upload/".$row1[id]."/shop.jpg","../img/none60x60.gif")?>" /><span><a href="<?=$au?>" title="<?=$row[tit]?>" target="_blank"><?=$tit?></a></span></div>
    <div class="d2"><span>��Ʒ����</span><br><?=returntype(1,$row[ty1id])?></div>
    <div class="d2"><span>��������</span><br><?=sprintf("%.2f",$row1[pf1])?></div>
    <div class="d2"><span>�����ٶ�</span><br><?=sprintf("%.2f",$row1[pf2])?></div>
    <div class="d2"><span>����̬��</span><br><?=sprintf("%.2f",$row1[pf3])?></div>
    <div class="d2"><span>�ѽ���֤��</span><br><?=sprintf("%.2f",$row1[baomoney1])?></div>
    <div class="d3"><span class="s1">��</span><span class="s2"><?=$money1?></span></div>
    <div class="d4">
     <span class="s1"><?=returnshoptype($row1[shoptype])?></span>
     <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?>
     <span class="s1" title="�Զ�������Ʒ������󼴿ɻ�ȡ����Ʒ�ķ�����Ϣ�������ص�ַ���������ȣ�">�Զ�����</span>
     <? }?>
     <? if(1==$row[ifuserdj]){?><span class="s1" title="����Ʒ�Ѿ������Ա�ȼ��ۿ���ϵ����վ��Ա����������Ӧ���ۼ��Ż�">��Ա�ۿ�</span><? }?>
     <? if($row1[baomoney]>0){?><span class="s1" title="�Ѽ����������̼��ѽ���(<?=sprintf("%.2f",$row1[baomoney])?>Ԫ)��֤��">�ѽ��ɱ�֤��</span><? }?>
     <span class="s3">����ʱ�䣺<?=dateYMD($row[lastsj])?></span>
     <span class="s2">��Ʒ������<?=$row[xsnum]?></span>
    </div>
   </div>
   <div class="listr"><a href="<?=$au?>" target="_blank"><img alt="<?=$row[tit]?>" onerror="this.src='../img/none180x180.gif'" src="<?=$tp?>" /></a></div>
  </div>
  <? }?>
  <!--�б�B-->
  <? }?>
  
  <div class="npa">
  <?
  $nowurl="search";
  $nowwd="";
  require("../tem/page.html");
  ?>
  </div>

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>