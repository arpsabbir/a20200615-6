<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--һ��ģ����ʾ�벻Ҫ��������ֹͣ����-->
<div class="bfb bfbtop1">
<div class="yjcode">
 <div class="top1">
  <h1 class="logo"><a href="<?=weburl?>"><img alt="<?=webname?>" border="0" src="<?=weburl?>img/logo.png" /></a></h1>
  
  
  <form name="topf1" method="post" onSubmit="return topftj()">
  <ul class="u1">
  <li class="l1" onMouseOver="topover()" onMouseOut="topout()">
  <span id="topnwd">��Ʒ</span>
  <div id="topdiv" style="display:none;">
  <a href="javascript:void();" onClick="topjconc(1,'��Ʒ')">��Ʒ</a>
  <a href="javascript:void();" onClick="topjconc(2,'����')">����</a>
  <a href="javascript:void();" onClick="topjconc(3,'��Ѷ')">��Ѷ</a>
  </div>
  </li>
  <li class="l2"><input name="topt" id="topt" type="text" /></li>
  <li class="l3"><input type="image" src="<?=weburl?>homeimg/btn1.gif" width="40" height="40" /></li>
  </ul>
  </form>
  
  
  <div class="topsad"><? adread("ADI05",250,75)?></div>
 
  <div class="menu fontyh">
   <!--��B-->
   <? $ai=returncount("yjcode_type where admin=1");?>
   <span id="typeallnum" style="display:none;"><?=$ai?></span>
   <div class="m1" onmouseover="leftmenuover()" onmouseout="leftmenuout()">
   <span class="t">ȫ������</span>
   <!--������������ʼ-->
   <div class="menun fontyh" id="leftmenu" style="display:none;">
    <!--��ƷB-->
   <? 
	while3("*","yjcode_ad where zt=0 and adbh='ppt_07' order by xh asc limit 6");
	$i=1;while1("*","yjcode_type where admin=1 order by xh asc limit 6");while($row1=mysql_fetch_array($res1)){
	$row3=mysql_fetch_array($res3);
	?>
    <div class="menu1" id="yhmenu<?=$i?>" onmouseover="yhmenuover(<?=$i?>)" onmouseout="yhmenuout(<?=$i?>)">
     <ul class="lu1">
     <li class="l1"><img src="<?=weburl?>gg/<?=$row3[bh].".".$row3[jpggif]?>" width="20"/>&nbsp;&nbsp;<a href="<?=weburl?>product/search_j<?=$row1[id]?>v.html"><?=$row1[type1]?></a> 
	 </li>
	</ul>
     <div class="rmenu rmenu1" style="display:none;margin-top:-<?=70*$i-1?>px;min-height:<?=47*$ai-6?>px;" id="rmenu<?=$i?>">
     <? while2("*","yjcode_type where type1='".$row1[type1]."' and admin=2 order by xh asc");while($row2=mysql_fetch_array($res2)){?> 
	 <ul class="ru1">	  
       <li class="l1"><?=$row2[type2]?></li>
       <li class="l2">
	     <?
	  $ys=0;
      $sqla="select * from yjcode_type where type1='".$row1[type1]."' and type2='".$row2[type2]."' and admin=3 order by xh asc";mysql_query("SET NAMES 'GBK'");
	  $resa=mysql_query($sqla);while($rowa=mysql_fetch_array($resa)){
	  $a="";
	  $ys++;if($ys<=2){$a="ays";}
	  ?>
      <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v_m<?=$rowa[id]?>v.html" class="<?=$a?>"><?=$rowa[type3]?></a>&nbsp;&nbsp;|&nbsp;&nbsp;
      <? }?>
      <a href="<?=weburl?>product/search_j<?=$row1[id]?>v_k<?=$row2[id]?>v.html">����</a>
      </li>
      </ul>
     <? }?>
  
	 </div>
  </div>
	<? $i++;}?>
    <!--��ƷE-->
   </div>
   <!--��������������-->
   </div> 
   <!--��E-->

   <div class="m2">
   <a href="<?=weburl?>" id="topmenu1">��ҳ</a>
   <? while1("*","yjcode_ad where adbh='ADI02' and type1='����' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="<?=$row1[aurl]?>"><?=$row1[tit]?></a>
   <? }?>
      </div>
  </div>
 
 </div>
</div>
</div>