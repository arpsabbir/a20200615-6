<?
include("../../config/conn.php");
include("../../config/function.php");
$sj=date("Y-m-d H:i:s");
$id=$_GET[id];
checkdjl("c3",$id,"yjcode_pro");
while0("*","yjcode_pro where zt<>99 and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("../");}
$nowmoney=returnjgdian(returnyhmoney($row[yhxs],$row[money2],$row[money3],$sj,$row[yhsj1],$row[yhsj2],$row[id]));
$nuid=returnuserid($_SESSION["SHOPUSER"]);

$nch="";
if(isset($_COOKIE['prohistoy'])){
$nch=$_COOKIE['prohistoy'];
if(check_in($row[id]."xcf",$nch)){$nch=str_replace($row[id]."xcf","",$nch);}
$a=preg_split("/xcf/",$nch);
if(count($a)>20){$ni=20;}else{$ni=count($a);}
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
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title><?=$row[tit]?> <?=webname?></title>
<? $cssjsty="a";include("../tem/cssjs.html");?>
<link href="view.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="view.js"></script>
</head>
<body>
<div id="zhezhao" onClick="tcclose()"></div>
<div class="yjcode">

<!--ͷ��B-->
<? $nowpagetit="��Ʒ����";include("../tem/moban/".$rowcontrol[wapmb]."/tem/top.php");?>
<!--ͷ��E-->

<? while3("*","yjcode_provideo where probh='".$row[bh]."' and gs='mp4' and zt=0 and iftj=1");if($row3=mysql_fetch_array($res3)){$provideo=1;}else{$provideo=0;}?>
<? if(empty($provideo)){?>
<!--ͼƬB-->
<div class="qh">
<div class="addWrap">
 <div class="swipe" id="mySwipe">
   <div class="swipe-wrap">
   <?
   $i=0;
   while1("*","yjcode_tp where bh='".$row[bh]."' order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){
   ?>
   <div><a href="#"><img class="img-responsive" src="<?=returnnotp($row1[tp],"-1")?>" onerror="this.src='../../img/none300x300.gif'" /></a></div>
   <? $i++;}?>
   <? if($i==0){?><div><a href="#"><img class="img-responsive" src="../../img/none300x300.gif" /></a></div><? $i=1;}?>
   </div>
  </div>
  <ul id="position"><? for($j=0;$j<$i;$j++){?><li class="<? if(0==$j){?>cur<? }?>"></li><? }?></ul>
</div>
<script src="../js/swipe.js"></script> 
<script type="text/javascript">
var bullets = document.getElementById('position').getElementsByTagName('li');
var banner = Swipe(document.getElementById('mySwipe'), {
auto: 2000,
continuous: true,
disableScroll:false,
callback: function(pos) {
var i = bullets.length;
while (i--) {
bullets[i].className = ' ';
}
bullets[pos].className = 'cur';
}});
</script>
</div>
<!--ͼƬE-->
<? }else{?>
<!--��ƵB-->
<div class="qhvideo box">
 <div class="d1"><iframe name="fvideo" id="fvideo" marginwidth="0" marginheight="0" width="100%" height="350px" border="0" frameborder=0 src="../../video/index.php?id=<?=$row3[id]?>&w=100%&h=350"></iframe></div>
</div>
<!--��ƵE-->
<? }?>

<div class="tit box"><div class="d1"><?=$row[tit]?></div></div>

<div class="money box">
 <div class="d1">��<span id="nowmoney"><?=$nowmoney?></span></div>
 <div class="d2">
 <s id="yuanjia">��<?=returnjgdian($row[money1])?></s>&nbsp;&nbsp;&nbsp;&nbsp;
 <span id="zhukou"><? if(!empty($row[money1])){echo sprintf("%.1f",$nowmoney/$row[money1]*10)."��";}else{echo "���ۿ�";}?></span>
 </div>
</div>

<div class="changg box">
 <div class="d1 d11">���� <span class="feng"><?=$row[xsnum]?></span></div>
 <div class="d1 d12">�ղ� <span class="feng" id="shounum"><?=returncount("yjcode_profav where probh='".$row[bh]."'")?></span></div>
 <div class="d1 d13" onClick="gourl('pjlist_i<?=$row[id]?>v.html');">���� <span class="feng"><?=returncount("yjcode_propj where probh='".$row[bh]."'")?></span></div>
 <div class="d1 d14">��� <span class="feng"><span id="nowkcnum"><?=$row[kcnum]?></span></span></div>
</div>

<? 
$cara1="none";$cara2="none";
if(empty($nuid)){$cara1="";}else{
 $carnum=returncount("yjcode_car where userid=".$nuid);
 if(panduan("probh,userid","yjcode_car where probh='".$row[bh]."' and userid=".$nuid)==1){$cara2="";}else{$cara1="";}
}
?>
<!--��B-->
<div id="taocandiv" style="height:0px;">

<!--��ѡ��B-->
<div class="yixuanze box">
 <div class="d1"><img src="<?=returntppd("../../".returntp("bh='".$row[bh]."' order by xh asc","-2"),"../../img/none300x300.gif")?>" /></div>
 <div class="d2">
  <span class="s0">��<strong id="tcmoney"><?=$nowmoney?></strong></span>
  <span class="s1" id="yxzsl">������1��</span>
  <span class="s2" id="yxztc"></span>
 </div>
 <div class="d3" onClick="tcclose()"><img src="../img/close.png" width="20" /></div>
</div>
<!--��ѡ��E-->

<!--���ײ�B-->
<? $alli=returncount("yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."'");if($alli>0){?>
<div class="taocanm">
<div id="tcnum" style="display:none;"><?=$alli?></div>
<div class="taocan box">
<div class="d1">
 <div class="tcsm">ѡ���ײ�</div>
 <div class="tcmain"> 
 <? 
 $i=1;
 $ja=0;
 while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
 if(empty($row1[fhxs])){$k=$row[kcnum];}else{$k=$row1[kcnum];}
 $oncj="taocanonc(".$i.",".$alli.",".$row1[money1].",".$row1[money2].",".$row1[id].",".sprintf("%.1f",$row1[money1]/$row1[money2]*10).",".$k.",'".$row1[tit]."')";
 if($i==1){$ja=$row1[id];}
 ?>
 <a href="javascript:void(0);" id="taocana<?=$i?>" onClick="<?=$oncj?>"><?=$row1[tit]?><i></i></a>
 <? $i++;}?>
 </div>
</div>
</div>
   
<?
while1("*","yjcode_taocan where admin is null and zt=0 and probh='".$row[bh]."' order by xh asc");while($row1=mysql_fetch_array($res1)){
$alli2=returncount("yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."'");if($alli2>0){
$i=1;
?>
<span id="tc2num<?=$row1[id]?>" style="display:none;"><?=$alli2?></span>
<div class="taocan box" id="tc2div<?=$row1[id]?>" style="display:none;">
<div class="d1">
 <div class="tcsm">�����ײ�</div>
 <div class="tcmain"> 
 <? 
 while2("*","yjcode_taocan where admin=2 and zt=0 and tit='".$row1[tit]."' and probh='".$row[bh]."' order by xh asc");while($row2=mysql_fetch_array($res2)){
 if(empty($row2[fhxs])){$k=$row[kcnum];}else{$k=$row2[kcnum];}
 ?>
 <a href="javascript:void(0);" id="taocan2a<?=$row1[id]?>_<?=$i?>" onClick="taocan2onc(<?=$i?>,<?=$alli2?>,<?=$row2[money1]?>,<?=$row2[money2]?>,<?=$row2[id]?>,<?=sprintf("%.1f",$row2[money1]/$row2[money2]*10)?>,<?=$k?>,'<?=$row2[tit2]?>')"><?=$row2[tit2]?><i></i></a>
 <? $i++;}?>
 </div>
</div>
</div>
<? }}?>
   
<script language="javascript">
pretc1id=<?=$ja?>;
</script>
</div>
<? }?>
<!--���ײ�E-->

<!--û���ײ�B-->
<? if($alli<=0){?>

<? }?>
<!--û���ײ�E-->

<div class="gmsl box">
 <div class="d1">��������</div>
 <div class="d2" onClick="shujian()"><img src="../img/jian.png" width="20" /></div>
 <div class="d3" id="buynum">1</div>
 <div class="d4" onClick="shujia()"><img src="../img/jia.png" width="20" /></div>
</div>

<div class="tbuy box" id="tbuy">
 <div class="d3" style="display:<?=$cara1?>;" id="cara1" onClick="carInto('<?=$row[bh]?>')">���빺�ﳵ</div>
 <div class="d3" style="display:<?=$cara2?>;" id="cara2" onClick="gourl('../user/car.php');">���ڹ��ﳵ</div>
 <div class="d4" onClick="buyInto('<?=$row[bh]?>')">��������</div>
</div>

</div>
<!--��E-->

<? if(!empty($row[txt])){?>
<div class="viewcap box"><div class="d1"></div><div class="d2">��Ʒ����</div><div class="d3"></div></div>
<div class="protxt box">
<div class="protxtM">
<!--���B-->
<div class="txtad"><? adwhile("ADMT05");?></div>
<!--���E-->

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
 <ul class="probq">
 <li class="l1"><?=$sx1arr[$i]?>��</li><li class="l2"><? $b=preg_split("/xcf/",$sxall);for($j=0;$j<=count($b);$j++){if(check_in($sx1arr[$i],$b[$j])){echo str_replace($sx1arr[$i].":","",$b[$j])." ";}}?></li>
 </ul>
 <? }?>

<?=$row[txt]?>
</div>
</div>
<? }?>

<? if(returncount("yjcode_provideo where zt=0 and probh='".$row[bh]."' and gs='mp4'")>0){?>
<div class="viewcap box"><div class="d1"></div><div class="d2">��Ʒ��Ƶ</div><div class="d3"></div></div>
<div class="provideo box">
<div class="video1">
<? while1("*","yjcode_provideo where zt=0 and probh='".$row[bh]."' and gs='mp4' order by sj desc");while($row1=mysql_fetch_array($res1)){?>
 <div class="d1"><span class="s1"><a href="videoview.php?id=<?=$row1[id]?>"><img src="../../upload/<?=$row1[userid]?>/<?=$row1[probh]?>/<?=$row1[bh]?>.jpg" onerror="this.src='../img/videop.png'" /></a></span><span class="s2"><?=$row1[tit]?></span></div>
<? }?>
</div>
</div>
<? }?>

</div>

<!--����B-->
<div id="cgbuy">
<div class="buym"></div>
<div class="buy box">
 <div class="d1"><a href="../shop/view<?=$row[userid]?>.html"><img src="img/shopv.png" height="23" /><br>����</a></div>
 <? $uqq=returnqq($row[userid]);if(!empty($uqq)){?>
 <div class="d1"><a href="javascript:void(0);" onClick="qqtang('<?=$uqq?>')"><img src="../img/kefu.png" height="23" /><br>�ͷ�</a></div>
 <? }?>
 <div class="d1" onClick="gourl('../user/car.php')"><span id="gwcnum" <? if(empty($carnum)){?> style="display:none;"<? }?>><?=intval($carnum)?></span><img src="../img/car.png" height="23" /><br>���ﳵ</div>
 <? 
 $a1="none";$a2="none";
 if(empty($nuid)){$a1="";}else{
  if(panduan("probh,userid","yjcode_profav where probh='".$row[bh]."' and userid=".$nuid)==1){$a2="";}else{$a1="";}
 }
 ?>
 <div class="d1" id="favpno" style="display:<?=$a1?>;" onClick="profavInto('<?=$row[bh]?>')"><img src="img/fav.png" height="22" /><br>�ղ�</div>
 <div class="d1" id="favpyes" style="display:<?=$a2?>;" onClick="gourl('../user/favpro.php')"><img src="img/fav1.png" height="22" /><br>���ղ�</div>
 <div class="d3" style="display:<?=$cara1?>;" onClick="tctang()">���빺�ﳵ</div>
 <div class="d3" style="display:<?=$cara2?>;" onClick="gourl('../user/car.php');">���ڹ��ﳵ</div>
 <div class="d4" onClick="tctang()">��������</div>
</div>
</div>
<!--����E-->

<script language="javascript">
//���빺�ﳵ
function carInto(x){
 if(document.getElementById("tcnum")){if(taocanid==0){alert("����ѡ���ײ�");return false;}}
 if(document.getElementById("tc2div"+taocanid)){if(taocanid2==0){alert("����ѡ���ײ�");return false;}taocanid=taocanid2;}
 $.get("../../tem/carInto.php",{bh:x,kcnum:document.getElementById("buynum").innerHTML,tcid:taocanid},function(result){
  if(result=="err1"){location.href="../reg/index.php?reurl=<?=weburl?>m/product/view<?=$row[id]?>.html";return false;}
  else if(result=="err2"){alert("��~���ܽ��Լ�����Ʒ���빺�ﳵŶ");return false;}
  else if(result=="ok"){
  a=parseInt(document.getElementById("gwcnum").innerHTML);
  document.getElementById("gwcnum").innerHTML=a+1;
  document.getElementById("gwcnum").style.display="";
  document.getElementById("cara2").style.display="";
  document.getElementById("cara1").style.display="none";
  layerts("�Ѽ��빺�ﳵ��");
  tcclose();
  }else{alert("δ֪������ˢ������");return false;}
 });
	
}

//��������
function buyInto(x){
 if(document.getElementById("tcnum")){if(taocanid==0){alert("����ѡ���ײ�");return false;}}
 if(document.getElementById("tc2div"+taocanid)){if(taocanid2==0){alert("����ѡ���ײ�");return false;}taocanid=taocanid2;}
 $.get("../../tem/buyInto.php",{bh:x,kcnum:document.getElementById("buynum").innerHTML,tcid:taocanid},function(result){
  if(result=="err1"){location.href="../reg/index.php?reurl=<?=weburl?>m/product/view<?=$row[id]?>.html";return false;}
  else if(result=="err2"){alert("��~���ܹ����Լ�����ƷŶ");return false;}
  else if(result=="ok"){location.href="../user/car.php";}else{alert("δ֪������ˢ������");return false;}
 });
}


//��Ʒ�ղ�
function profavInto(x){
$.get("../../tem/favproInto.php",{bh:x},function(result){
 if(result=="err1"){location.href="../reg/index.php?reurl=<?=weburl?>m/product/view<?=$row[id]?>.html";return false;}
 else if(result=="err2"){alert("��~�����ղ��Լ�����ƷŶ");return false;}
 else if(result=="ok"){
 document.getElementById("favpyes").style.display="";document.getElementById("favpno").style.display="none";
 document.getElementById("shounum").innerHTML=parseInt(document.getElementById("shounum").innerHTML)+1;
 }else{alert("δ֪������ˢ������");return false;}
});
}

</script>

<div style="display:none;"><?=$rowcontrol[webtj]?></div>
</body>
</html>