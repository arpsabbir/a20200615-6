<?
include("../../config/conn.php");
include("../../config/function.php");
$getstr=$_GET[str];
$ses=" where (zt=0 or zt=3 or zt=4 or zt=5 or zt=101 or zt=102)";
$taskty=returnsx("a");if($taskty!=-1){$ses=$ses." and taskty=".$taskty;}
$taskzt=returnsx("b");if($taskzt==-1){$ses=$ses." and (zt=0 or zt=3 or zt=4 or zt=101)";}else{$ses=$ses." and (zt=5 or zt=102)";}
$ty1id=returnsx("j");if($ty1id!=-1){$ses=$ses." and type1id=".$ty1id;$ty1name=returntasktype(1,$ty1id);$lastty=$ty1name;}
$ty2id=returnsx("k");if($ty2id!=-1){$ses=$ses." and type2id=".$ty2id;$ty2name=returntasktype(2,$ty2id);$lastty=$ty2name;}
if(returnsx("s")!=-1){
 $skey=safeEncoding(returnsx("s"));
 $a=preg_split("/\s/",$skey);
 $bs="(";
 for($i=0;$i<=count($a);$i++){
 if(!empty($a[$i])){$bs=$bs."tit like '%".$a[$i]."%' and ";}
 }
 $ses=$ses." and ".$bs." tit<>'')";
}

if(returnsx("p")!=-1){$page=returnsx("p");}else{$page=1;}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>������� - <?=webname?></title>
<? include("../tem/cssjs.html");?>
</head>
<body>
<? $nowpagetit="�������";$nowpagebk="../";include("../tem/moban/".$rowcontrol[wapmb]."/tem/top.php");?>

<div class="listtop box">
 <div class="d1" onClick="gourl('../search/main.php?admin=3')"><span class="s1"><img src="../img/ser.png" /></span><span class="s2"><?=returnjgdw($skey,"","�����������ؼ��ʣ�")?></span></div>
</div>

<!--ѡ��1B-->
<div class="psel box">
 <div class="search">
 
  <div class="d1" onClick="sertjonc(1,2)"><span class="s1"><span><?=returnjgdw($lastty,"","ȫ������")?></span></span></div>
  <div class="d1 d0" onClick="sertjonc(2,2)"><span class="s1"><span><?=returnjgdw(returntaskxs($taskty),"","��������")?></span></span></div>
 
 </div>
</div>
<!--ѡ��1E-->
<!--ѡ��2B-->
<div class="sertj box" id="sertj1" style="display:none;">

 <div class="d1">
 <a href="<?=rentser('j','','k','');?>"<? if($ty1id==-1){?> class="nx"<? }?>>����</a>
 <? while1("*","yjcode_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <a href="<?=rentser('j',$row1[id],'','');?>" <? if(check_in("_j".$row1[id]."v",$getstr)){?> class="nx"<? }?>><?=$row1[name1]?></a>
 <? }?>
 </div>
 
 <? if($ty1id!=-1){?>
 <div class="d1">
 <a href="<?=rentser('j',$ty1id,'k','');?>"<? if($ty2id==-1){?> class="nx"<? }?>>����</a>
 <? while2("*","yjcode_tasktype where admin=2 and name1='".$ty1name."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <a href="<?=rentser('j',$ty1id,'k',$row2[id]);?>" <? if(check_in("_k".$row2[id]."v",$getstr)){?> class="nx"<? }?>><?=$row2[name2]?></a>
 <? }?>
 </div>
 <? }?>
 
</div>
<div class="sertj box" id="sertj2" style="display:none;">
 <div class="d1">
 <a href="<?=rentser('a','','','');?>" <? if(check_in("_av",$getstr) || !check_in("_a",$getstr)){?> class="nx"<? }?>>����</a>
 <a href="<?=rentser('a',0,'','');?>" <? if(check_in("_a0v",$getstr)){?> class="nx"<? }?>>��������</a>
 <a href="<?=rentser('a',1,'','');?>" <? if(check_in("_a1v",$getstr)){?> class="nx"<? }?>>��������</a>
 </div>
</div>
<!--ѡ��2E-->

 <?
 pagef($ses,30,"yjcode_task","order by sj desc");while($row=mysql_fetch_array($res)){
 taskok($row[id]);
 ?>
 <div class="tasklist box">
  <div class="d1"><a href="../task/view<?=$row[id]?>.html"><?=$row[tit]?></a></div>
  <div class="d2 feng"><?=returntask($row[zt])?></div>
 </div>
 <div class="tasklist1 box">
  <div class="d1 flex">
   <span class="s5">��Ԥ�� <?=$row[money1]?>Ԫ</span>
   <span class="s3"><?=returntaskxs($row[taskty])?></span>
   <? if($row[money3]>0){?><span class="s1">���йܽ��</span><? }else{?><span class="s2">ѡ����й�</span><? }?>
   <? if(empty($row[taskty])){?>
   <span class="s4">ʣ<? if(empty($row[zt])){?><strong>1</strong>��<? }else{?><strong>0</strong>��<? }?></span>
   <? }else{?>
   <span class="s4">ʣ<font class="red"><?=$row[tasknum]-$row[taskcy]?></font>��(��<?=$row[tasknum]?>��)</span>
   <? }?>
  </div>
 </div>
 <div class="tasklist2 box">
  <div class="d0"><?=$row[sj]?></div>
  <div class="d1 flex">
   <? if((empty($row[taskty]) && 0==$row[zt]) || (1==$row[taskty] && 101==$row[zt])){?>
   <a href="view<?=$row[id]?>.html" class="btna btna1">��������</a>
   <? }else{?>
   <a href="view<?=$row[id]?>.html" class="btna btna2">�鿴����</a>
   <? }?>
  </div>
 </div>
 <? }?>
 <div class="npa">
 <? 
 $nowurl="";
 $nowwd="";
 require("../tem/page.html");
 ?>
 </div>

<div class="fbrwv"></div>
<div class="fbrw box"><div class="d1 flex" onClick="gourl('../user/taskadd.php')">��Ҫ��������</div></div>


</body>
</html>