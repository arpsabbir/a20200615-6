<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
?>
<div class="bfb bfbbot">
<div class="yjcode">
 <div class="bottom">
 <ul class="u1">
 <? while1("*","yjcode_helptype where admin=1 order by xh asc limit 5");while($row1=mysql_fetch_array($res1)){?>
 <li>
 <span class="fontyh"><a href="<?=weburl?>help/search_j<?=$row1[id]?>v.html"><?=$row1[name1]?></a></span>
 <? 
 while2("*","yjcode_helptype where admin=2 and name1='".$row1[name1]."' order by xh asc limit 5");while($row2=mysql_fetch_array($res2)){
 $aurl="search_j".$row1[id]."v_k".$row2[id]."v.html";
 if(returncount("yjcode_help where ty1id=".$row1[id]." and ty2id=".$row2[id])==1){
 while3("id,ty1id,ty2id","yjcode_help where ty1id=".$row1[id]." and ty2id=".$row2[id]);$row3=mysql_fetch_array($res3);
 $aurl="view".$row3[id].".html";
 }
 ?>
 <a href="<?=weburl?>help/<?=$aurl?>" class="a1"><?=$row2[name2]?></a><br>
 <? }?>
 </li>
 <? }?>
 </ul>
 <div class="ad"><? adwhile("ADI01");?></div>
 <div class="bq">
 <a href="<?=weburl?>">��վ��ҳ</a> | 
 <a href="<?=weburl?>help/aboutview2.html">��������</a> | 
 <a href="<?=weburl?>help/aboutview3.html">������</a> | 
 <a href="<?=weburl?>help/aboutview4.html">��ϵ����</a> | 
 <a href="<?=weburl?>help/aboutview5.html">��˽����</a> | 
 <a href="<?=weburl?>help/aboutview6.html">��������</a><br>
 CopyRight 2014-2024 <?=webname?> | <a href="http://www.miitbeian.gov.cn/" target="_blank"><?=$rowcontrol[beian]?></a><br><?=$rowcontrol[webtj]?>
 </div>
 </div>
 
</div>
</div>
<? while1("*","yjcode_ad where adbh='ADKF' and zt=0 order by xh asc limit 1");if($row1=mysql_fetch_array($res1)){echo $row1[txt];}?>

<!--***********�Ҳม����ʼ*************-->
<div id="floatTools" class="rides-cs" style="display:<? if($rowcontrol[ifkf]=="off"){?>none<? }?>;">
  <div class="floatL">
  	<a style="display:block" id="aFloatTools_Show" class="btnOpen" title="�鿴���߿ͷ�" style="top:20px" href="javascript:void(0);">չ��</a>
  	<a style="display:none" id="aFloatTools_Hide" class="btnCtn" title="�ر����߿ͷ�" style="top:20px" href="javascript:void(0);">����</a>
  </div>
  <div id="divFloatToolsView" class="floatR" style="display: none;width: 140px;">
    <div class="cn">
      <h3 class="titZx">���߿ͷ�</h3>
      <ul>
        <?
  $qq=preg_split("/,/",$rowcontrol[webqqv]);
  for($qqi=0;$qqi<count($qq);$qqi++){
  $qv=preg_split("/\*/",$qq[$qqi]);
  if($qv[0]!=""){
  if($qv[1]==""){$qtit="��վ�ͷ�";}else{$qtit=$qv[1];}
  ?>

        <li><span><?=$qtit?></span> <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?=$qv[0]?>&site=<?=weburl?>&menu=yes"><img border="0" src="<?=weburl?>homeimg/online.png" alt="���������ҷ���Ϣ" title="���������ҷ���Ϣ"/></a> </li>
         <? }}?>
            <div class="div_clear"></div>
        </li>
        <li style="border:none;"><span>�绰��<?=$rowcontrol[webtelv]?></span> </li>
      </ul>
    </div>
  </div>
</div>
<script language="javascript">
	$(function(){
		$("#aFloatTools_Show").click(function(){
			$('#divFloatToolsView').animate({width:'show',opacity:'show'},100,function(){$('#divFloatToolsView').show();});
			$('#aFloatTools_Show').hide();
			$('#aFloatTools_Hide').show();				
		});
		$("#aFloatTools_Hide").click(function(){
			$('#divFloatToolsView').animate({width:'hide', opacity:'hide'},100,function(){$('#divFloatToolsView').hide();});
			$('#aFloatTools_Show').show();
			$('#aFloatTools_Hide').hide();	
		});
	});
</script>
<div style="display:none"><a href="http://www.ytaomb.com">Դ����̳</a></div>
<!--**********�Ҳม������***************-->
