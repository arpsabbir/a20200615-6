<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sj=date("Y-m-d H:i:s");
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../swiper/css/swiper.min.css">
<script src="../swiper/js/swiper.min.js"></script>
<style type="text/css">
body{background-color:#F9F9F9;}
</style>
</head>
<body>
<? include("topuser.php");?>

<div class="selltop box">
 <div class="d1 flex">
  <a href="./">������Ұ�</a>
 </div>
</div>

<div class="selltop1 box">
 <div class="dmain flex">
  <div class="d1"><img src="<?=$shoplogo?>" /><br><?=$rowuser[shopname]?></div>
  <div class="d2"><strong><?=returncount("yjcode_order where selluserid=".$rowuser[id])?></strong><br>�ܶ���</div><span class="x"></span>
  <div class="d2"><strong><?=$rowuser[money1]?></strong><br>�������</div><span class="x"></span>
  <div class="d2"><strong><?=$rowuser[jf]?></strong><br>����</div>
 </div>
</div>

<div class="iorder ikuang box">
<div class="dmain flex">
 <div class="dcap"><span class="s1">��������</span><span class="s2"><a href="sellorder.php">����></a></span></div>
 <ul class="u1">
 <? $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='wait'");?>
 <li<? if($a>0){?> class="l1"<? }?> onClick="gourl('sellorder.php?ddzt=wait')"><span class="s1">��Ҫ����</span><span class="s2"><?=$a?>��</span></li>
 <? $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='back'");?>
 <li<? if($a>0){?> class="l1"<? }?> onClick="gourl('sellorder.php?ddzt=back')"><span class="s1">�˿�������</span><span class="s2"><?=$a?>��</span></li>
 <? $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='jf'");?>
 <li<? if($a>0){?> class="l1"<? }?> onClick="gourl('sellorder.php?ddzt=jf')"><span class="s1">���״���</span><span class="s2"><?=$a?>��</span></li>
 <? $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='db'");?>
 <li onClick="gourl('sellorder.php?ddzt=db')"><span class="s1">���ڵ���</span><span class="s2"><?=$a?>��</span></li>
 <? $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='backerr'");?>
 <li onClick="gourl('sellorder.php?ddzt=backerr')"><span class="s1">��ͬ���˿�</span><span class="s2"><?=$a?>��</span></li>
 <? $a=returncount("yjcode_order where selluserid=".$rowuser[id]." and ddzt='suc'");?>
 <li onClick="gourl('sellorder.php?ddzt=suc')"><span class="s1">���׳ɹ�</span><span class="s2"><?=$a?>��</span></li>
 </ul>
</div>
</div>

<div class="iorder ikuang box">
<div class="dmain flex">
 <div class="dcap"><span class="s1">��Ʒ����</span><span class="s2"><a href="propjlist.php">����></a></span></div>
 <ul class="u1">
 <? $a=returncount("yjcode_propj where selluserid=".$rowuser[id]." and (hf='' or hf is null)")?>
 <li<? if($a>0){?> class="l1"<? }?> onClick="gourl('propjlist.php?ifhf=no')"><span class="s1">��Ҫ�ظ�</span><span class="s2"><?=$a?>��</span></li>
 <? $a=returncount("yjcode_propj where selluserid=".$rowuser[id])?>
 <li onClick="gourl('propjlist.php')"><span class="s1">��������</span><span class="s2"><?=$a?>��</span></li>
 </ul>
</div>
</div>

<div class="iproduct ikuang box">
<div class="dmain flex">
 <div class="dcap"><span class="s1">��Ʒ����</span><span class="s2"><a href="productlist.php">����></a></span></div>
 
 <div class="swiper-containerpp">
  <div class="swiper-containerp1">
   <div class="swiper-wrapper">
   <? 
   $i=1;
   while1("*","yjcode_pro where zt<>99 and userid=".$rowuser[id]." order by lastsj desc limit 10");while($row1=mysql_fetch_array($res1)){
   $money1=returnyhmoney($row1[yhxs],$row1[money2],$row1[money3],$sj,$row1[yhsj1],$row1[yhsj2],$row1[id]);
   $au="product.php?bh=".$row1[bh];
   ?>
   <div class="swiper-slide" onClick="gourl('<?=$au?>')">
    <div class="dv">      
     <div class="d1"><img src="<?=returntp("bh='".$row1[bh]."' order by xh asc","-1")?>" onerror="this.src='../../img/none200x200.gif'" /></div>
     <div class="d2"><?=returntitdian($row1[tit],50)?></div>
     <div class="d3">��<?=sprintf("%.2f",$money1)?></div>
    </div>
   </div>
   <? $i++;}?>
   </div>
   <div class="swiper-paginationp1"></div>
  </div>
 </div>
 <script>
 swiperp1 = new Swiper('.swiper-containerp1', {
 slidesPerView: 3.7,
 spaceBetween:20,
 freeMode: true,
 pagination: {
 el: '.swiper-paginationp1',
 clickable: true,
 },
 });
 </script>
 
 <div class="txtadd">+�������Ʒ</div>
 
</div>
</div>

</body>
</html>