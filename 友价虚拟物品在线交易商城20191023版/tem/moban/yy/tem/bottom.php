<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<!--һ��ģ����ʾ�벻Ҫ��������ֹͣ����-->
<div class="bfb bfbbot">
<div class="yjcode fontyh">
 <ul class="u1">
 <li class="l0 l1">
 <span class="cap"><a href="/help/search_j9v.html" target="_blank">���ָ��</a></span>
 <a href="/help/search_j9v_k14v.html" target="_blank">���ע��</a><br>
 <a href="/help/view3.html" target="_blank">�������</a><br>
 <a href="/help/search_j9v_k16v.html" target="_blank">������Ʒ</a><br>
 <a href="/help/search_j9v_k17v.html" target="_blank">֧����ʽ</a><br>
 </li>
 <li class="l0 l2">
 <span class="cap"><a href="/help/search_j10v.html" target="_blank">����ָ��</a></span>
 <a href="/help/search_j10v_k18v.html" target="_blank">��γ���</a><br>
 <a href="/help/search_j10v_k19v.html" target="_blank">�շѱ�׼</a><br>
 <a href="/help/search_j10v_k20v.html" target="_blank">��פǩԼ</a><br>
 </li>
 <li class="l0 l3">
 <span class="cap"><a href="/help/search_j11v.html" target="_blank">��ȫ����</a></span>
 <a href="/help/search_j11v_k21v.html" target="_blank">�����ƭ</a><br>
 <a href="/help/search_j11v_k22v.html" target="_blank">Ԥ������</a><br>
 <a href="/help/search_j11v_k23v.html" target="_blank">����թƭ</a><br>
 <a href="/help/search_j11v_k24v.html" target="_blank">ʵ����֤</a><br>
 </li>
 <li class="l0 l4">
 <span class="cap"><a href="/help/search_j12v.html" target="_blank">��������</a></span>
 <a href="/help/search_j12v_k25v.html" target="_blank">��γ�ֵ</a><br>
 <a href="/help/search_j12v_k26v.html" target="_blank">�������</a><br>
 <a href="/help/view1.html" target="_blank">VIP�ȼ�˵��</a><br>
 <a href="/help/search_j12v_k28v.html" target="_blank">��������</a><br>
 </li>
 <li class="l5">
<img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=4" width="90" height="90" />
 </li>
 </ul>
 <div class="bq">
 <a href="/">��վ��ҳ</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="/help/aboutview2.html">��������</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="/help/aboutview3.html">������</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="/help/aboutview4.html">��ϵ����</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="/help/aboutview5.html">��˽����</a>&nbsp;&nbsp;|&nbsp;&nbsp;
 <a href="/help/aboutview6.html">��������</a>&nbsp;&nbsp;|&nbsp;&nbsp;<br>
 ������������վ����ģ��/���³�����ԭ���⣬����������ת�أ������κ���Դ���������Ρ������ַ����İ�Ȩ���뼰ʱ��ϵ����ɾ����<br>
CopyRight 2014-2024 <?=webname?> | <?=$rowcontrol[beian]?><br><?=$rowcontrol[webtj]?>
 </div>
 
</div>
</div>

<? while1("*","yjcode_ad where adbh='ADKF' and zt=0 order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?>

<!--***********�Ҳม����ʼ*************-->
<div class="rightfd" style="display:;">

 <div class="d1">
  <span class="s1"></span>
  <div class="sd1">
  <?
  $qq=preg_split("/,/",$rowcontrol[webqqv]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="��վ�ͷ�";}else{$qtit=$qv[1];}
  ?>
  <a href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes" target="_blank"><?=$qtit?></a>
  <? }}?>
	  <i></i>
   </div>
 </div>

 <div class="d2">
  <span class="s1"></span>
  <div class="sd1">
  <strong>��������</strong>
  <p><?=$rowcontrol[webtelv]?></p>
  <i></i>
  </div>
 </div>

 <div class="d3">
  <span class="s1"></span>
  <div class="sd1">
 <img src="<?=weburl?>tem/getqr.php?u=<?=weburl?>m&size=4" width="150" height="150" />
  <p class="fz14">ɨһɨ���ֻ���</p>
  <i></i>
  </div>
 </div>

 <div class="d4" onClick="gotoTop();return false;">
  <span class="s1"></span>
 </div>
 
</div>
<script language="javascript" >
$(".rightfd .d4").hide()

$(window).scroll(function(){
    if($(window).scrollTop() > 100){
        $(".rightfd .d4").fadeIn()
    }else {
        $(".rightfd .d4").fadeOut()
    }
});
</script>
<div style="display:none"><a href="http://www.ytaomb.com">Դ����̳</a></div>
<!--**********�Ҳม������***************-->