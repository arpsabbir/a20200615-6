<? include("../tem/openwv.php");?>
<? include("../tem/top.html");?>

<?
checkdjl("c1",$uid,"yjcode_user");
$sj1=date("Y-m-d H:i:s",strtotime("-30 day"));
$c=returncount("yjcode_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='suc') and sj>='".$sj1."' and sj<='".$sj."'");
$f=sprintf("%.2f",returnsum("money1*num","yjcode_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='suc') and sj>='".$sj1."' and sj<='".$sj."'"));
$sucnum=returnjgdw($rowuser[xinyong],"",returnxy($uid,1));

$mspf=returnjgdw(returnjgdian($rowuser[pf1]),"","5.00");
$fhpf=returnjgdw(returnjgdian($rowuser[pf2]),"","5.00");
$shpf=returnjgdw(returnjgdian($rowuser[pf3]),"","5.00");
?>
<div class="yjcode">
 <div class="shoptop1">
  <div class="d1"><a href="<?=returnmyweb($uid,$rowuser[myweb])?>"><?=$rowuser[shopname]?></a></div>

 <div class="d2" id="d2div" onmouseenter="topd2over()" onmouseleave="topd2out()">
  <span class="s2">
  <img src="<?=weburl?>img/dj/<?=returnxytp($sucnum)?>" title="<?=$sucnum?>��" />
  </span>
  <span class="s3">
  <? if(1==$rowuser[ifmot]){?><img src="<?=weburl?>shop/img/sj1.gif" title="�ֻ���ͨ����֤" /><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" title="�ֻ�δ��֤" /><? }?>
  <? if(1==$rowuser[ifemail]){?><img src="<?=weburl?>shop/img/yx1.gif" title="������ͨ����֤" /><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" title="����δ��֤" /><? }?>
  </span>
  <span class="s4">[ ������<span class="green"><?=$mspf?></span> | ������<span class="green"><?=$fhpf?></span> | �ۺ�<span class="green"><?=$shpf?></span> ]</span>
   <!--����B-->
  <div id="lkuang" style="display:none;">
  <ul class="u1">
  <li class="l1">�ƹ�<?=$rowuser[nc]?><br>
  <? if(!empty($rowuser[uqq])){?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$rowuser[uqq]?>&site=<?=gloweb?>&menu=yes" target="_blank"><img src="<?=weburl?>img/qq5.gif" border="0" /> <?=$rowuser[uqq]?></a>
  <? }?>
  </li>
  <li class="l2"><span>������֤��Ϣ<br><?=dateYMD($rowuser[sj])?></span></li>
  <li class="l3">
  <? if(1==$rowuser[ifmot]){?><img src="<?=weburl?>shop/img/sj1.gif" title="�ֻ���ͨ����֤" /><? }else{?><img src="<?=weburl?>shop/img/sj0.gif" title="�ֻ�δ��֤" /><? }?>
  <? if(1==$rowuser[ifemail]){?><img src="<?=weburl?>shop/img/yx1.gif" title="������ͨ����֤" /><? }else{?><img src="<?=weburl?>shop/img/yx0.gif" title="����δ��֤" /><? }?>
  <br>
  <? if(1==$rowuser[ifmot]){?>�ֻ�����֤ <? }?>
  <? if(1==$rowuser[ifemail]){?> ��������֤<? }?><br>
  <? if($rowuser[baomoney]>0){?>��֤��<span class="red"><?=sprintf("%.2f",$rowuser[baomoney])?>Ԫ</span><? }?>
  </li>
  <li class="l4">
  �����ۺ�ָ��<br>
  ��Ʒ������<span class="red"><?=returncount("yjcode_pro where userid=".$rowuser[id]." and zt=0")?></span><br>
  �ۼƷÿͣ�<span class="red"><?=$rowuser[djl]?></span><br>
  �ۺ����֣�<span class="red"><?=sprintf("%.2f",($mspf+$fhpf+$shpf)/3)?></span><br>
  </li>
  <li class="l5">
  ���̾�Ӫָ��<br>
  �����ף�<span class="red"><?=returncount("yjcode_order where selluserid=".$rowuser[id])?></span>��<br>
  �½��ף�<span class="red"><?=$c?></span>��<br>
  �³ɽ���<span class="red"><?=$f?></span>Ԫ
  </li>
  <li class="l6">
  <? 
  $a1="none";$a2="none";
  $nuid=returnuserid($_SESSION["SHOPUSER"]);
  if($_SESSION["SHOPUSER"]==""){$a1="";}else{
  if(panduan("*","yjcode_shopfav where shopid=".$rowuser[id]." and userid=".$nuid."")==1){$a2="";}else{$a1="";}
  }
  ?>
  <a id="favsno" style="display:<?=$a1?>;" href="javascript:shopfavInto(<?=$rowuser[id]?>)">�ղص���</a>
  <a id="favsyes" style="display:<?=$a2?>;" href="<?=weburl?>user/favshop.php">���ղ�</a>
  </li>
  </ul>
  </div>
  <!--����E-->
 </div>

  <div class="d4">��һ�³ɽ���<span><?=$c?></span>�� ����<span><?=$f?></span>Ԫ</div>
  <div class="d6"></div>
  <div class="d5">
  <a id="favsno1" style="display:<?=$a1?>;" href="javascript:shopfavInto(<?=$rowuser[id]?>)">�ղص���</a>
  <a id="favsyes1" style="display:<?=$a2?>;" href="<?=weburl?>user/favshop.php">���ղ�</a>
  </div>
 </div>
</div>
<?
while1("*","yjcode_ad where adbh='ADSHOP01' and zt=0 order by xh asc limit 1");$row1=mysql_fetch_array($res1);
$bannar=returntppd("../upload/".$rowuser[id]."/bannar.jpg","../".returnjgdw($rowcontrol[addir],"","gg")."/".$row1[bh].".".$row1[jpggif]);
?>
<div class="bfb shopbfb" style="background:url(<?=$bannar?>) center top no-repeat;"></div>

<div class="bfb bfbshopm">
<div class="yjcode">
 <div class="menu">
 <div class="d1"><a href="<?=returnmyweb($uid,$rowuser[myweb])?>" class="a1">������ҳ</a></div>
 <? if(panduan("*","yjcode_shopmenu where zt=0 and userid=".$uid)==0){?>
 <div class="d1"><a href="<?=weburl?>shop/prolist_i<?=$uid?>v.html" class="a1">���б���</a></div>
 <div class="d1"><a href="<?=weburl?>shop/aboutview<?=$uid?>.html" class="a1">��������</a></div>
 <div class="d1"><a href="<?=weburl?>shop/pjlist_i<?=$uid?>v.html" class="a1">�û�����</a></div>
 <? }else{?>
  <? 
  while1("*","yjcode_shopmenu where zt=0 and admin=1 and userid=".$uid);while($row1=mysql_fetch_array($res1)){
  if($row1[targ]==1){$t="_self";}else{$t="_blank";}
  ?>
  <div class="d1" onmouseleave="topm2out(<?=$row1[id]?>)" onmouseenter="topm2over(<?=$row1[id]?>)">
   <a href="<?=$row1[aurl]?>" target="<?=$t?>" class="a1"><?=$row1[tit1]?></a>
   <? if(panduan("*","yjcode_shopmenu where zt=0 and admin=2 and tit1='".$row1[tit1]."' and userid=".$uid)){?>
   <div class="d2" style="display:none;" id="topm2_<?=$row1[id]?>">
   <? 
   while2("*","yjcode_shopmenu where zt=0 and admin=2 and tit1='".$row1[tit1]."' and userid=".$uid);while($row2=mysql_fetch_array($res2)){
   if($row2[targ]==1){$t="_self";}else{$t="_blank";}
   ?>
   <a href="<?=$row2[aurl]?>" target="<?=$t?>" class="a2"><?=$row2[tit2]?></a>
   <? }?>
   </div>
   <? }?>
  </div>
  <? }?>
 <? }?>
 </div>
</div>
</div>