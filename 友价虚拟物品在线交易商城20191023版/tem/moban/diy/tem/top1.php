<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
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
  <li class="l2"><input name="topt" id="topt" type="text" placeholder="�������������ݹؼ���" /></li>
  <li class="l3"><input type="image" src="<?=weburl?>homeimg/btn1.gif" width="40" height="40" /></li>
  </ul>
  </form>

  <div class="nexDL_part">
     <div class="nexlogin">                 
       <div class="nexdenglu">
         	   <ul>
			    <div class="" id="notloginb">
                <li class="nexDL_ZC cur"><a href="/user/" style="color: rgb(255, 255, 255);">ע��</a></li>
                <li class="nexDL_DL"><a href="/reg/" style="color: rgb(255, 68, 1);">��¼</a></li>
                <li class="nexDL_sliders" style="left: 0px;"></li>
                <div class="clear"></div>
               </div>
			   	<div class="worbli" id="yesloginb" style="display:none;">
				<li class="s1"><a href="/user/">����</a></li>
				<li class="s2"> <a href="/user/" id="yesuidb"></a></li>
				</div>
            </ul>
        </div>  
     </div>
 </div>
 
  <div class="menu fontyh">
   <!--��B-->
   <? $ai=returncount("yjcode_type where admin=1");?>
   <span id="typeallnum" style="display:none;"><?=$ai?></span>
   <div class="m1" onmouseover="leftmenuover()" onmouseout="leftmenuout()">
   <span class="t">��վ��ҳ</span>
   <!--������������ʼ-->
   <div class="menun fontyh" id="leftmenu" style="display:none;">
    <!--��ƷB-->
    <? $i=1;while1("*","yjcode_type where admin=1 order by xh asc limit 8");while($row1=mysql_fetch_array($res1)){?>
    <div class="menu1" id="yhmenu<?=$i?>" onmouseover="yhmenuover(<?=$i?>)" onmouseout="yhmenuout(<?=$i?>)">
     <ul class="lu1">
     <li class="l1"><a href="<?=weburl?>product/search_j<?=$row1[id]?>v.html"><?=$row1[type1]?></a></li>
     </ul>
     </div>
    <? $i++;}?>
    <!--��ƷE-->
   </div>
   <!--��������������-->
   </div> 
   <!--��E-->

   <div class="m2">
   <? while1("*","yjcode_ad where adbh='ADI02' and type1='����' order by xh asc");while($row1=mysql_fetch_array($res1)){?>
   <a href="<?=$row1[aurl]?>"><?=$row1[tit]?></a>
   <? }?>
   </div>
  </div>
 
 </div>
</div>
</div>
