<?
include("../config/xy.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
checkdjl("c3",$id,"yjcode_pro");
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]);

$sqlsell="select * from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$ressell=mysql_query($sqlsell);
if(!$rowsell=mysql_fetch_array($ressell)){php_toheader("../");}

$nuid=returnuserid($_SESSION["SHOPUSER"]);

$nch="";
if(isset($_COOKIE['prohistoy'])){
$nch=$_COOKIE['prohistoy'];
if(check_in($row[id]."xcf",$nch)){$nch=str_replace($row[id]."xcf","",$nch);}
$a=preg_split("/xcf/",$nch);
if(count($a)>6){$ni=6;}else{$ni=count($a);}
 $nch="";
 for($i=0;$i<=$ni;$i++){
 $nch=$nch.$a[$i]."xcf";
 }
}

$Month = 864000 + time();
setcookie(prohistoy,$row[id]."xcf".$nch, $Month,'/');
$nch=$_COOKIE['prohistoy'];
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content="<?=returnjgdw($row[wkey],"",$row[tit])?>">
<meta name="description" content="<?=delhtml(returnjgdw($row[wdes],"",strgb2312(strip_tags($row[txt]),0,250)))?>">
<title><?=$row[tit]?> - <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="view.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="view.js"></script>
<script type="text/javascript" src="jquery-plugin-slide.js"></script>
<script type="text/javascript" src="../js/lyz.delayLoading.min.js"></script>
<script language="javascript">
<? if(empty($rowcontrol[ifwap])){?>
if(is_mobile()) {document.location.href= '<?=weburl?>m/product/view<?=$row[id]?>.html';}
<? }?>
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("../tem/top1.html");?>

<div class="bfb bfbmain fontyh">
<div class="yjcode">

 <div class="dqwz">
 <ul class="u1">
 <li class="l1">
 ��ǰλ�ã�<a href="<?=weburl?>">��ҳ</a> > <a href="search_j<?=$row[ty1id]?>v.html"><?=returntype(1,$row[ty1id])?></a>
 <? if(0!=$row[ty2id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v.html"><?=returntype(2,$row[ty2id])?></a><? }?>
 <? if(0!=$row[ty3id]){?> > <a href="search_j<?=$row[ty1id]?>v_k<?=$row[ty2id]?>v_m<?=$row[ty3id]?>v.html"><?=returntype(3,$row[ty3id])?></a><? }?>
 </li>
 </ul>
 </div>

 <div class="jbmain">

  <!--ͼƬ��B-->
  <? while3("*","yjcode_provideo where probh='".$row[bh]."' and zt=0 and iftj=1");if($row3=mysql_fetch_array($res3)){$provideo=1;}else{$provideo=0;}?>
  <div class="qhtp">
  <? if(empty($provideo)){?>
  <!--�л�B-->
  <div class="protp">
   <div class ='Homeslide' >
   <div class ='Homeslide_bigwrap'>
    <div class='Homeslide_hand0'></div>
    <div class='Homeslide_hand1'></div>
    <div class='Homeslide_bigpicdiv'><a href='../tp/showpic.php?bh=<?=$row[bh]?>' target="_blank" id="tupiana"><img src=""></a></div>
   </div>
   <div class='Homeslide_thumb' style="display:none;"><ul></ul></div>
   </div>
   <script type="text/javascript">
   var home_slide_data = 
   [
   <? $tpses="yjcode_tp where bh='".$row[bh]."' order by xh asc";$i=1;while1("*",$tpses);while($row1=mysql_fetch_array($res1)){?>
   <? if($i>1){?>,<? }?>{"title":"","onc":"","image":"<?=returnnotp($row1[tp],"-1")?>","thumb":"<?=returnnotp($row1[tp],"-1")?>","mark":"<?=$i?>"}
   <? $i++;}?>
   <? if($i==1){?>{"title":"","onc":"","image":"../img/none300x300.gif","thumb":"../img/none100x75.gif","mark":"1"}<? }?>
   ]; 
   $('.Homeslide').homeslide(home_slide_data,false,3000);
   </script>
 </div>
 <!--�л�E-->
 <? }else{?>
 <!--��ƵB-->
 <div class="video">
 <? if($provideo==1){?>
 <iframe name="videofr" id="videofr" marginwidth="1" marginheight="1" width="100%" height="380" border="0" frameborder=0 src="../video/index.php?bh=<?=$row[bh]?>&w=340&h=378&id=<?=$row3[id]?>"></iframe>
 <? }?>
 </div>
 <!--��ƵE-->
 <? }?>
  
  <ul class="u1">
  <? 
  $a1="none";$a2="none";
  if(empty($nuid)){$a1="";}else{
   if(panduan("probh,userid","yjcode_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
  }
  ?>
  <li class="l1" id="favpno" style="display:<?=$a1?>;"><a href="javascript:void(0);" onClick="profavInto('<?=$row[bh]?>')">�����ղ�</a></li>
  <li class="l1" id="favpyes" style="display:<?=$a2?>;"><a href="../user/favpro.php">���ղ�</a></li>
  <li class="l2"><a href="javascript:void();" onClick="jbtang(1,<?=$row[id]?>)">�ٱ�</a></li>
  </ul>

 
  </div>
  <!--ͼƬ��E-->

 <!--�м�B-->
 <div class="jbmiddle" id="jbmiddle">
   <h1><?=$row[tit]?></h1>
   <? $plnum=returncount("yjcode_propj where probh='".$row[bh]."'");if($plnum>0){?>
   <ul class="pful">
   <li class="l1">
   <img src="../img/x1.png" class="img1" width="92" height="15" />
   <? $pf=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2);?>
   <div class="pf" style="width:<?=$pf/5*92?>px;"><img src="../img/x2.png" title="<?=$pf?>��" width="92" height="15" /></div>
   </li>
   <li class="l2"><a href="#pj"><?=$plnum?>������</a></li>
   <? if(empty($rowcontrol[ifwap])){?>
   <li class="l3" onMouseOver="motewmover()" onMouseOut="motewmout()"><span class="s1">ɨһɨ���ֻ�����</span><span class="s2" id="motewm" style="display:none;"><img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m/product/view<?=$row[id]?>.html&size=5" width="145" height="145" /></span></li>
   <? }?>
   </ul>
   <? }?>
   
   <div class="jg">
   
    <? if(1==$row[ifuserdj]){?>
    <div id="vipmoney" style="display:none;">
    <ul class="djmcap">
    <li class="l1">�ȼ�����</li>
    <li class="l2">�����ۿ�</li>
    <li class="l3">�ۺ��</li>
    </ul>
    <? 
    while1("*","yjcode_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
    while2("*","yjcode_prouserdj where probh='".$row[bh]."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
	if($zhekou==10){$zhekouv="��";}elseif($zhekou==0){$zhekouv="--";}else{$zhekouv=$zhekou;}
    ?>
    <ul class="djm">
    <li class="l1"><?=$row1[name1]?></li>
    <li class="l2"><?=$zhekouv?></li>
    <li class="l3"><?=sprintf("%.2f",$nowmoney*$zhekou/10)?>Ԫ</li>
    </ul>
    <? }?>
    <ul class="djkt">
    <li class="l1"><a href="../user/userdj.php" target="_blank">��ͨ��Ա�ȼ�</a></li>
    <li class="l2">˵����������Ѿ���ͨ��Ա�ȼ�����Ʒ����ʱ���Զ������ۺ�ۡ�</li>
    </ul>
    </div>
    <? }?>
    <div class="jgm">
    <div class="d0">��վ�Żݼ�</div>
    <div class="dvip"><? if(1==$row[ifuserdj]){?><span onClick="djmonc()">(�鿴��Ա�۸�)</span><? }?></div>
    <div class="d1">��<span id="nowmoney"><?=sprintf("%.2f",$nowmoney)?></span><span id="nowmoneyY" style="display:none;"><?=$nowmoney?></span></div>
    <div class="d2">
     <span class="s1" id="zhekou"><? if(!empty($row[money1])){echo sprintf("%.1f",$nowmoney/$row[money1]*10)."��";}else{echo "���ۿ�";}?></span>
     <span class="s2">ԭ�ۣ�<s id="yuanjia">��<?=returnjgdian($row[money1])?></s></span>
    </div>
    </div>
    
    <ul class="kc">
    <li class="l1">���</li>
    <li class="l1">����</li>
    <li class="l2"><span id="nowkcnum"><?=$row[kcnum]?></span></li>
    <li class="l2"><?=$row[xsnum]?></li>
    </ul>
    
   </div>
   
   <? 
   if(2==$row[yhxs] && $sj<=$row[yhsj2]){
   if($sj<$row[yhsj1]){$a=1;}else{$a=2;}
   ?>
   <span id="nyhsj1" style="display:none;"><?=str_replace("-","/",$row[yhsj1])?></span>
   <span id="nyhsj2" style="display:none;"><?=str_replace("-","/",$row[yhsj2])?></span>
   <span id="nmoney2" style="display:none;"><?=returnjgdian($row[money2])?></span>
   <span id="nmoney3" style="display:none;"><?=returnjgdian($row[money3])?></span>
   <span id="nowsj" style="display:none;"><?=str_replace("-","/",$sj)?></span>
   <ul class="u5" id="xsyh">
   <li class="l1">����</li>
   <li class="l2"><span class="s1"><?=$row[yhsm]?></span><span class="s2">(��������<span id="yhsjv"></span>)</span></li>
   </ul>
   <script language="javascript" src="yhsj.js"></script>
   <script language="javascript">yhsj(<?=$a?>);</script>
   <? }?>
   
   <ul class="u0">
   <li class="l1">����</li>
   <li class="l2">��"<a href="../shop/view<?=$rowsell[id]?>.html" target="_blank"><strong><?=$rowsell[shopname]?></strong></a>"���������ṩ�ۺ����</li>
   </ul>
   
   <!--�ײ�B-->
   <? $alli=returncount("yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."'");if($alli>0){?>
   <div id="tcnum" style="display:none;"><?=$alli?></div>
   <ul class="utc" id="utc1">
   <li class="l1">�ײ�</li>
   <li class="l2">
   <? 
   $i=1;
   $ja=0;
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   if(empty($row1[fhxs])){$k=$row[kcnum];}else{$k=$row1[kcnum];}
   if($i==1){$ja=$row1[id];}
   $bgtp="../upload/".$row1[userid]."/".$row1[probh]."/tc".$row1[id]."-1.png";
   if(is_file($bgtp)){$tit="";$tp="../upload/".$row1[userid]."/".$row1[probh]."/tc".$row1[id].".png";}
   else{$tp="";$tit=$row1[tit];}
   $oncj="taocanonc(".$i.",".$alli.",".$row1[money1].",".$row1[money2].",".$row1[id].",".sprintf("%.1f",$row1[money1]/$row1[money2]*10).",".$k.",'".$tp."')";
   ?>
   <a href="javascript:void(0);" id="taocana<?=$i?>" style="background:url(<?=$bgtp?>) center center no-repeat;" title="<?=$row1[tit]?>" onClick="<?=$oncj?>"><?=$tit?></a>
   <? $i++;}?>
   </li>
   </ul>
   
   <?
   while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
   $alli2=returncount("yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."'");if($alli2>0){
   $i=1;
   ?>
   <span id="tc2num<?=$row1[id]?>" style="display:none;"><?=$alli2?></span>
   <ul class="utc" id="tc2div<?=$row1[id]?>" style="display:none;">
   <li class="l1">ѡ��</li>
   <li class="l2">
   <? 
   while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
   if(empty($row2[fhxs])){$k=$row[kcnum];}else{$k=$row2[kcnum];}
   $bgtp="../upload/".$row2[userid]."/".$row2[probh]."/tc".$row2[id]."-1.png";
   if(is_file($bgtp)){$tit="";$tp="../upload/".$row2[userid]."/".$row2[probh]."/tc".$row2[id].".png";}
   else{$tp="";$tit=$row2[tit2];}
   ?>
   <a href="javascript:void(0);" id="taocan2a<?=$row1[id]?>_<?=$i?>" title="<?=$row2[tit2]?>" style="background:url(<?=$bgtp?>) center center no-repeat;" onClick="taocan2onc(<?=$i?>,<?=$alli2?>,<?=$row2[money1]?>,<?=$row2[money2]?>,<?=$row2[id]?>,<?=sprintf("%.1f",$row2[money1]/$row2[money2]*10)?>,<?=$k?>,'<?=$tp?>')"><?=$tit?></a>
   <? $i++;}?>
   </li>
   </ul>
   <? }}?>
   
   <script language="javascript">pretc1id=<?=$ja?>;</script>
   <? }?>
   <!--�ײ�E-->

   <ul class="u6">
   <li class="l1"><input type="text" onChange="moneycha()" id="tkcnum" value="1" /></li>
   <li class="l2"><a href="javascript:void(0);" onClick="shujia()" class="a1">+</a><a href="javascript:void(0);" onClick="shujian()" class="a2">-</a></li>
   </ul>
   <ul class="u4">
   <li class="l1">
   <? if(empty($row[ifxj])){?>
   
   <a href="javascript:void(0);" onClick="buyInto('<?=$row[bh]?>')" class="buy">��������</a>
   <? 
   $a1="none";$a2="none";
   if($_SESSION["SHOPUSER"]==""){$a1="";}else{
	if(panduan("probh,userid","yjcode_car where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
   }
   ?>
   <a href="javascript:void(0);" onClick="carInto('<?=$row[bh]?>')" id="cara1" style="display:<?=$a1?>;" class="car">���빺�ﳵ</a>
   <a href="../user/car.php" id="cara2" style="display:<?=$a2?>;" class="carok">���ڹ��ﳵ</a>
   <? if(!empty($row[ysweb])){?><a href="../tem/gotourl.php?u=<?=$row[ysweb]?>" target="_blank" class="ysweb">�鿴��ʾ</a><? }?>
   
   <? }else{?>
   <a href="javascript:void(0);" class="buy">��Ʒ���¼�</a>
   <? }?>
   
   </li>
   </ul>
   
   <ul class="u3">
   <li class="l1">��ɫ</li>
   <li class="l2">
   <a href="javascript:void(0);" onMouseOver="tscapover(1)" id="tscap1" class="a1">��������</a>
   <? if($row[fhxs]==2 || $row[fhxs]==3 || $row[fhxs]==4){?><a href="javascript:void(0);" onMouseOver="tscapover(2)" id="tscap2">�Զ�����</a><? }?>
   <? if(1==$row[ifuserdj]){?><a href="javascript:void(0);" onMouseOver="tscapover(3)" id="tscap3">VIP�ۿ�</a><? }?>
   </li>
   </ul>
   <div class="tsmain" id="tsmain1">�������ף���ȫ��֤�������ⲻ����������˿</div>
   <div class="tsmain" id="tsmain2" style="display:none;">�Զ�������Ʒ����ʱ���Թ�����ȴ���</div>
   <div class="tsmain" id="tsmain3" style="display:none;">��ͬ��Ա�ȼ�����ͬ�����ۿۡ�</div>
   
   <? if(empty($rowcontrol[fenxiang])){?>
   <ul class="fx"><li class="l1">����</li><li class="l2"><? include("../tem/fenxiang.php");?></li></ul>
   <? }?>

  </div>
 <!--�м�E-->
 
  <!--����B-->
  <? $xy=returnjgdw($rowsell[xinyong],"",returnxy($row[userid],1));?>
  <div class="jbuser">
  <ul class="u1">
  <li class="l1"><img src="../img/userbao.gif" width="200" height="72" /></li>
  </ul>
  <div class="d1">
  <h3><?=$rowsell[shopname]?></h3>
  <ul class="du0"><li class="l1">������</li><li class="l2"><img title="����ֵ<?=$xy?>" src="../img/dj/<?=returnxytp($xy)?>" /></li></ul>
  <ul class="du1"><li class="l1">�ƹ�</li><li class="l2"><?=$rowsell[nc]?></li></ul>
  <ul class="du1"><li class="l1">������</li><li class="l2"><?=returncount("yjcode_pro where userid=".$rowsell[id]." and zt=0")?>��</li></ul>
  <ul class="du1"><li class="l1">���꣺</li><li class="l2"><?=dateYMD($rowsell[sj])?></li></ul>
  <ul class="du2"><li class="l1">��ϵ��</li><li class="l2"><a href="javascript:void(0);" onClick="opentangqq('<?=returnqq($row[userid])?>')"><img src="../img/qq.png" width="77" height="22" border="0" /></a></li></ul>
  <? if($rowsell[baomoney]>0){?>
  <div class="dub">�ѽ��ɱ�֤��<strong><?=sprintf("%.2f",$rowsell[baomoney])?></strong>Ԫ</div>
  <? }?>
  <ul class="du3">
  <li class="l1">����<br><span class="g_ac99_h"><?=returnjgdian($rowsell[pf1])?></span></li>
  <li class="l1">����<br><span class="g_ac99_h"><?=returnjgdian($rowsell[pf2])?></span></li>
  <li class="l0">�ۺ�<br><span class="g_ac99_h"><?=returnjgdian($rowsell[pf3])?></span></li>
  </ul>
  <ul class="du4">
  <li class="l1"><a href="<?=returnmyweb($rowsell[id],$rowsell[myweb])?>" class="g_ac99" target="_blank">�������</a></li>
  <? 
  $a1="none";$a2="none";
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","yjcode_shopfav where shopid=".$rowsell[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  <li class="l2" id="favsno" style="display:<?=$a1?>;"><a class="g_ac99" href="javascript:shopfavInto(<?=$rowsell[id]?>)">�ղص���</a></li>
  <li class="l2" id="favsyes" style="display:<?=$a2?>;"><a class="g_ac99" href="../user/favshop.php">���ղ�</a></li>
  </ul>
  </div>
  </div>
  <!--����E-->
 </div>
 </div>
</div>

<div class="yjcode">
 <!--���B-->
 <div class="left">
 <? adwhile("ADP01",0,200,200)?>
 <ul class="u1">
 <li class="l1">�������۰�</li>
 <? while1("*","yjcode_pro where userid=".$row[userid]." and zt=0 and ifxj=0 order by xsnum desc limit 10");while($row1=mysql_fetch_array($res1)){$tp=returntp("bh='".$row1[bh]."' order by xh asc","-2");?>
 <li class="l2"><a href="view<?=$row1[id]?>.html"><img alt="<?=$row1[tit]?>" src="<?=$tp?>" onerror="this.src='../img/none60x60.gif'" width="50" height="50" align="left"></a><a href="view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],37)?></a><br><strong class="feng">��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <? }?>
 </ul>
 <ul class="u1">
 <li class="l1">���������¼</li>
 <? 
 $a=preg_split("/xcf/",$nch);
 for($i=0;$i<=count($a);$i++){
 if($a[$i]!=""){
  while1("*","yjcode_pro where id=".$a[$i]);if($row1=mysql_fetch_array($res1)){$tp=returntp("bh='".$row1[bh]."' order by xh asc","-2");
 ?>
 <li class="l2"><a href="view<?=$row1[id]?>.html"><img alt="<?=$row1[tit]?>" src="<?=$tp?>" onerror="this.src='../img/none60x60.gif'" width="50" height="50" align="left"></a><a href="view<?=$row1[id]?>.html" title="<?=$row1[tit]?>"><?=returntitdian($row1[tit],37)?></a><br><strong class="feng">��<?=returnjgdian(returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]))?></strong></li>
 <?
  }
 }
 }
 ?>
 </ul>
 </div>
 <!--���E-->
 
 <!--�Ҳ�B-->
 <div class="right">
 <ul class="ucap">
 <li class="l1 g_bc0_h" id="bqcap1" onClick="bqonc(1)">��Ʒ����</li>
 <? $videonum=returncount("yjcode_provideo where probh='".$row[bh]."' and zt=0");if($videonum>0){?>
 <li class="l0" id="bqcap4" onClick="bqonc(4)">��Ƶ�鿴<strong class="g_ac0_h"><?=$videonum?></strong></li>
 <? }?>
 <li class="l0" id="bqcap2" onClick="bqonc(2)">�ۼ�����<strong class="g_ac0_h"><? $allpj=returncount("yjcode_propj where probh='".$row[bh]."'");echo $allpj;?></strong></li>
 <li class="l0" id="bqcap5" onClick="bqonc(5)">��Ʒ�ʴ�</li>
 <li class="l0" id="bqcap3" onClick="bqonc(3)">���׹���</li>
 </ul>
 <div class="viewtxt" id="bqdiv1">
 
 <!--���Ľ���B-->
 <div class="probqm">
 <ul class="probq">
 <? 
 $a=preg_split("/xcf/",$row[tysx]);
 $sx1arr=array();
 $sxall="xcf";
 $m=0;
 for($i=0;$i<=count($a);$i++){
  $ai=$a[$i];
  if($ai!=""){
   if(!is_numeric($ai)){$z1=preg_split("/:/",$ai);$ai=$z1[0];}
   while1("*","yjcode_typesx where id=".$ai);if($row1=mysql_fetch_array($res1)){
    while2("*","yjcode_typesx where name1='".$row1[name1]."' and admin=1 and ifjd=1");if($row2=mysql_fetch_array($res2)){
     if(!in_array($row1[name1],$sx1arr)){$sx1arr[$m]=$row1[name1];$m++;}
     if(!is_numeric($a[$i])){$z1=preg_split("/:/",$a[$i]);$v=$z1[1];}else{$v=$row1[name2];}
     $sxall=$sxall.$row1[name1].":".$v."xcf";
    }
   }
  }
 }
 for($i=0;$i<count($sx1arr);$i++){
 ?>
 <li class="l1"><?=$sx1arr[$i]?>��</li><li class="l2"><? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></li>
 <? }?>
 </ul>
 </div>
 <?=$row[txt]?>
 <!--���Ľ���E-->
 </div>
 
 <? if($videonum>0){?>
 <div id="bqdiv4">
  <ul class="bqcap">
  <li class="l1">��Ƶչʾ</li>
  </ul>
  <div class="videofr"><iframe name="videofr" id="videofr" marginwidth="1" scrolling="no" marginheight="1" width="100%" height="470px" border="0" frameborder=0 src="../video/index.php?bh=<?=$row[bh]?>"></iframe></div>
  <div class="videolist">
  <? $i=1;while1("*","yjcode_provideo where zt=0 and probh='".$row[bh]."' order by sj desc");while($row1=mysql_fetch_array($res1)){?>
  <a href="javascript:void(0);" onClick="videodian(<?=$row1[id]?>,<?=$i?>)"<? if($i==1){?> class="a1"<? }?> id="videoa<?=$i?>"><span><?=$i?>��</span><?=$row1[tit]?></a>
  <? $i++;}?>
  <span id="videoall" style="display:none;"><?=$i?></span>
  </div>
 </div>
 <? }?>
 
 <div id="bqdiv2">
 <a name="pj"></a>
 <ul class="pjcap">
 <li class="l1">��Ʒ����</li>
 <li class="l2">�������<br><strong class="g_ac0_h"><?=$row[pf1]?></strong></li>
 <li class="l2">�����ٶ�<br><strong class="g_ac0_h"><?=$row[pf2]?></strong></li>
 <li class="l2">����̬��<br><strong class="g_ac0_h"><?=$row[pf3]?></strong></li>
 <li class="l2">�ۺ�����<br><strong class="g_ac0_h"><?=round(($row[pf1]+$row[pf2]+$row[pf3])/3,2)?></strong></li>
 <li class="l3"><a href="../user/order.php?ddzt=suc">д����׬����</a></li>
 </ul>
 <? 
 while1("*","yjcode_propj where probh='".$row[bh]."' order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){
 $usertx="../upload/".$row1[userid]."/user.jpg";
 if(!is_file($usertx)){$usertx="../user/img/nonetx.gif";}else{$usertx=$usertx."?id=".rnd_num(1000);} 
 ?>
 <div class="pj pj<?=$row1[pjlx]?>">
  <ul class="u1"><li class="l1"><img src="<?=$usertx?>" width="50" height="50" /></li><li class="l2"><?=returnjiami(returnnc($row1[userid]))?></li></ul>
  <ul class="u2">
  <li class="l1">
  <?=$row1[txt]?><br>
  <? if(1==$row1[ifvideo]){?>
  <a href="<?="../upload/".$row1[userid]."/".$row1[orderbh]."/video.mp4"?>" target="_blank"><img src="../img/video.jpg" width="50" height="50" /></a>&nbsp;&nbsp;
  <? }?>
  <? 
  if(1==$row1[iftp]){
  while2("*","yjcode_tp where bh='".$row1[orderbh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){$tp="../".str_replace(".","-1.",$row2[tp]);
  ?>
  <a href="../<?=$row2[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? }}?>
  </li>
  <? if(!empty($row1[hf])){?><li class="l2">���һظ���<?=$row1[hf]?></li><? }?>
  <li class="l3"><?=$row1[sj]?></li>
  </ul>
  <div class="d2">
  <? if(1==$row1[pjlx]){?><span class="s1">����</span><? }?>
  <? if(2==$row1[pjlx]){?><span class="s2">����</span><? }?>
  <? if(3==$row1[pjlx]){?><span class="s3">����</span><? }?>
  </div>
  <div class="d3">
  <img src="../img/x1.png" class="img1" width="76" height="15" />
  <? $pf=round(($row1[pf1]+$row1[pf2]+$row1[pf3])/3,2);?>
  <div class="pf" style="width:<?=$pf/5*76?>px;"><img src="../img/x2.png" title="<?=$pf?>��" width="76" height="15" /></div>
  </div>
 </div>
 <? }?>
 <div class="allpj">[<a href="pjlist_i<?=$row[id]?>v.html" target="_blank">�鿴ȫ������</a>]</div>
 </div>
 
 <!--�ʴ�B-->
 <div id="bqdiv5">
  <ul class="bqcap">
  <li class="l1">��Ʒ�ʴ�</li>
  </ul>
  <? while1("*","yjcode_wenda where probh='".$row[bh]."' and (hftxt<>'') order by sj desc limit 10");while($row1=mysql_fetch_array($res1)){?>
  <div class="wdlist">
   <ul class="u1">
   <li class="l1"><span>��</span></li>
   <li class="l2"><?=$row1[txt]?></li>
   <li class="l3"><?=returnjiami(returnnc($row1[userid]))?> <?=$row1[sj]?></li>
   </ul>
   <? if(!empty($row1[hftxt])){?>
   <ul class="u2">
   <li class="l1"><span>��</span></li>
   <li class="l2"><?=$row1[hftxt]?></li>
   <li class="l3">�̼� <?=$row1[hfsj]?></li>
   </ul>
   <? }?>
  </div>
  <? }?>
  <ul class="wenda1">
  <li class="l1"><a href="javascript:void(0);" onClick="wendaonc(<?=$row[id]?>)">�ύ��ѯ����</a></li>
  <li class="l2">����<? $a=returncount("yjcode_wenda where probh='".$row[bh]."' and hftxt<>''");echo $a?>���ʴ�<? if($a>0){?> / <a href="">����鿴����>></a><? }?></li>
  </ul>
 </div>
 <!--�ʴ�E-->
 
 <div id="bqdiv3">
  <ul class="bqcap">
  <li class="l1">���׹���</li>
  </ul>
  <div class="viewtxt fontyh">
  <? 
  while1("*","yjcode_type where id=".intval($row[ty1id]));if($row1=mysql_fetch_array($res1)){$gz=$row1[jygz];}
  if(empty($gz)){
   while1("*","yjcode_onecontrol where tyid=9");if($row1=mysql_fetch_array($res1)){$gz=$row1[txt];}
  }
  echo $gz;
  ?>
  </div>
 </div>
 
 </div>
 <!--�Ҳ�E-->

</div>
<script language="javascript">
$(function () {
 $("img").delayLoading({
  defaultImg: "../img/nonebg.png",           // Ԥ����ǰ��ʾ��ͼƬ
  errorImg: "",                        // ��ȡͼƬ����ʱ�滻ͼƬ(Ĭ�ϣ���defaultImgһ��)
  imgSrcAttr: "src",                  // ��ȡͼƬ��src
  setImg: "originalSrc",              //��¼ͼƬ·��������(Ĭ�ϣ�originalSrc����ҳ��img��src����ֵ����originalSrc����)
  beforehand: 0,                       // Ԥ����ǰ�������ؼ���ͼƬ(Ĭ�ϣ�0)
  event: "scroll",                     // ��������ͼƬ�¼�(Ĭ�ϣ�scroll)
  duration: "normal",                  // ����Ԥ������(��)�ٶ�֮һ���ַ���("slow", "normal", or "fast")���ʾ����ʱ���ĺ�����ֵ(�磺1000),Ĭ��:"normal"
  container: window,                   // ������ص�λ������(Ĭ�ϣ�window)
  success: function (imgObj) { },      // ����ͼƬ�ɹ���Ļص�����(Ĭ�ϣ���ִ���κβ���)
  error: function (imgObj) { }         // ����ͼƬʧ�ܺ�Ļص�����(Ĭ�ϣ���ִ���κβ���)
  });
});
</script>
<? include("../tem/bottom.html");?>
</body>
</html>