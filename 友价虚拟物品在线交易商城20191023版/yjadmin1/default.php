<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$today1=dateYMD($sj)." 00:00:00";
$today2=dateYMD($sj)." 23:59:59";
if($_GET[control]=="ret"){deletetable("yjcode_update");php_toheader("default.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link rel="stylesheet" href="layui/css/layui.css">
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript" src="js/gx.js"></script>
<script language="javascript">
function retgx(){
if(confirm("����������ʧ�ܵ�����²��ύ����������ȷ����")){location.href="default.php?control=ret";}else{return false;}	
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">

<div class="bqu1">
<a class="a1" href="default.php">ȫ�ֹ���</a>
</div>
  
<!--B-->
<div class="rkuang">

<!--��������B-->
<div class="ishuju">
 <ul class="u1 u11">
 <li class="l1"><img src="img/icon1.png" /></li>
 <li class="l2"><strong><?=sprintf("%.1f",returnsum("moneynum","yjcode_moneyrecord where sj>='".$today1."' and sj<='".$today2."'"));?></strong> Ԫ<br>���������ܶ�</li>
 </ul>
 <ul class="u1 u12">
 <li class="l1"><img src="img/icon2.png" /></li>
 <li class="l2"><strong><?=returncount("yjcode_user where shopzt=2 and sj>='".$today1."' and sj<='".$today2."'")?></strong> ��<br>���������̼�</li>
 </ul>
 <ul class="u1 u13">
 <li class="l1"><img src="img/icon3.png" /></li>
 <li class="l2"><strong><?=returncount("yjcode_pro where zt=0 and lastsj>='".$today1."' and lastsj<='".$today2."'")?></strong> ��<br>���ո�����Ʒ</li>
 </ul>
 <ul class="u1 u14">
 <li class="l1"><img src="img/icon4.png" /></li>
 <li class="l2"><strong><?=returncount("yjcode_news where zt=0 and lastsj>='".$today1."' and lastsj<='".$today2."'")?></strong> ƪ<br>���ո�����Ѷ</li>
 </ul>
 <ul class="u1 u15">
 <li class="l1"><img src="img/icon5.png" /></li>
 <li class="l2"><strong><?=returncount("yjcode_order where sj>='".$today1."' and sj<='".$today2."'")?></strong> ��<br>���ն�������</li>
 </ul>
 <ul class="u1 u16">
 <li class="l1"><img src="img/icon6.png" /></li>
 <li class="l2"><strong><?=$rowcontrol[smskc]?></strong> ��<br>����ʣ����</li>
 </ul>
</div>
<!--��������E-->

<!--��Ա����B-->
<div class="iuser">
 <div class="d1">��Աע����������ͼ</div>
 <iframe marginwidth="1" marginheight="1" width="100%" height="141px" border="0" frameborder="0" src="iuser.php"></iframe>
</div>
<!--��Ա����E-->

<!--��ʼ�жϸ�Σ-->
<? $errnum=0;?>
<div class="gaowei" id="gaowei" style="display:none;">
 <span class="gaocap">������վ����<strong id="errnum"></strong>����Σ©�����뾡���޸�������������ʧ</span>
 <?
 if(empty($rowcontrol[ifshell])){
 $testv="yes";
 $dirarr=array("img/",
			   returnjgdw($rowcontrol[addir],"","gg")."/",
			   "ckeditor/attached/",
			   "config/ueditor/php/upload/",
			   "config/ueditor/php/upload1/",
			   "config/ueditor/php/upload2/",
			   "config/ueditor/php/upload3/",
			   "config/ueditor_mini/php/upload/",
			   "config/ueditor_mini/php/upload1/",
			   "config/ueditor_mini/php/upload2/",
			   "config/ueditor_mini/php/upload3/",
			   "upload/"
			   );
 for($i=0;$i<count($dirarr);$i++){
 createDir("../".$dirarr[$i]);
 $fp= fopen("../".$dirarr[$i]."shell.php","w");fwrite($fp,$testv);fclose($fp);if(@htmlget(weburl.$dirarr[$i]."shell.php")=="yes"){
  $errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="http://www.yj99.cn/faq/view20.html" target="_blank">�޸�����</a></li>
 <li class="l2">�ļ��У�<strong><?=$dirarr[$i]?></strong> ���ڿ�ִ�нű�Ȩ��©�����б�ע�벢����ľ��ķ���</li>
 </ul>
 <? }}}else{?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="inf1.php">�������</a></li>
 <li class="l2">���ĺ�̨�ر��� [�ű�ִ��Ȩ�޼�⿪��]�����ȷ������©���Ѿ��޸����ɺ��Ա�����ʾ</li>
 </ul>
 <? $errnum++;}?>
 
 <?
 while1("*","yjcode_admin where adminuid='".$_SESSION["SHOPADMIN"]."'");$row1=mysql_fetch_array($res1);
 if(strcmp("admin",$row1[adminuid])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="adminlist.php">�����޸�</a></li>
 <li class="l2">�벻Ҫ����admin֮������ױ��µ����ַ���Ϊ����Ա�˺�</li>
 </ul>
 <? }?>
 
 <?
 if(strcmp(sha1("admin"),$row1[adminpwd])==0 || strcmp(sha1("123456"),$row1[adminpwd])==0 || strcmp(sha1("admin888"),$row1[adminpwd])==0){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="pwd.php">�����޸�</a></li>
 <li class="l2">�벻Ҫ����admin��123456��admin888֮������ױ��µ����ַ���Ϊ����</li>
 </ul>
 <? }?>

 <?
 if(@htmlget(weburl."config/conn.php?id=1%20and%201=1")=="4004"){$errnum++;
 ?>
 <ul class="u1" onmouseover="this.className='u1 u2';" onmouseout="this.className='u1';">
 <li class="l1"><a href="http://www.yj99.cn/faq/view129.html" target="_blank">����޸�</a></li>
 <li class="l2">��������/������δ��װ��վ��ȫ������������鰲װ���������ܹ���</li>
 </ul>
 <? }?>
 
</div>
<script language="javascript">
if(<?=$errnum?>==0){document.getElementById("gaowei").style.display="none";}else{document.getElementById("gaowei").style.display="";document.getElementById("errnum").innerHTML=<?=$errnum?>;}
</script>
<!--�����жϸ�Σ--> 

<!--����B-->
<form name="f1" method="post" onsubmit="return callServer()">
<div class="gx" id="gx1" style="display:none;">
<span class="gxts">��⵽���²�����������������</span>
<ul class="uk">
<li class="l1">��̨���룺</li>
<li class="l2"><input type="password" class="inp" name="t1" size="20" onfocus="inpf(this)" onblur="inpb(this)" /></li>
<li class="l1"></li>
<li class="l21">
�����󣬻�ͬ�����������°汾��<strong class="red">�����й����ο������������ñ���</strong>��
��<a href="http://www.yj99.cn/faq/view35.html" class="blue" target="_blank">����������������ϸ˵��</a>��
</li>
<li class="l3"><input type="submit" value="��ʼ����" class="btn1" /></li>
</ul>
</div>

<div class="gx" id="gx2" style="display:none;">
<span class="gxts">���İ汾�������°� <span style="font-size:12px;color:#94B5DC;font-weight:100;cursor:pointer;" onClick="retgx()">[��������]</span></span>
</div>

<div class="gx" id="gx3" style="display:;">
<span class="gxts">���ڻ�ȡ���°汾��Ϣ����</span>
</div>
</form>
<script language="javascript">gxchk();</script>
<!--����E-->

<!--��������B-->
<div class="idai">
 <div class="d1">�������������ͳ��</div>
 
 <? $anum=returncount("yjcode_user where shopzt=1");?>
 <ul class="u2">
 <li class="l1">�������</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="userlist.php?shopzt=1">(<?=$anum?>)</a> ��</li>
 </ul>
 
 <? $anum=returncount("yjcode_baomoneyrecord where zt=1");?>
 <ul class="u2">
 <li class="l1">�ⶳ��֤��</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="baomoneylist.php?zt=1">(<?=$anum?>)</a> ��</li>
 </ul>
 
 <? $anum=returncount("yjcode_tixian where zt=4");?>
 <ul class="u2">
 <li class="l1">��Ҫ��������</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="txlist.php?zt=4">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_user where sfzrz=0");?>
 <ul class="u2">
 <li class="l1">ʵ����֤���</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="userlist.php?rz=xy">(<?=$anum?>)</a> λ</li>
 </ul>

 <? $anum=returncount("yjcode_payreng where ifok=1");?>
 <ul class="u2">
 <li class="l1">�˹��������</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="renglist.php?zt=1">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_user");?>
 <ul class="u2">
 <li class="l1">���û���</li>
 <li class="l2"><a href="userlist.php">(<?=$anum?>)</a> λ</li>
 </ul>

 <? $anum=returncount("yjcode_pro where zt=1");?>
 <ul class="u2">
 <li class="l1">��Ҫ�����Ʒ</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="productlist.php?zt=1">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_pro where zt<>99");?>
 <ul class="u2">
 <li class="l1">������Ʒ</li>
 <li class="l2"><a href="productlist.php">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_order where ddzt='wait'");?>
 <ul class="u2">
 <li class="l1">�ȴ���������</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="orderlist.php?ddzt=wait">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_order where ddzt='jf'");?>
 <ul class="u2">
 <li class="l1">���׾���</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="orderlist.php?ddzt=jf">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_jubao where zt=1");?>
 <ul class="u2">
 <li class="l1">��Ҫ����ٱ�</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="jubaolist.php?zt=1">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_news where zt=1");?>
 <ul class="u2">
 <li class="l1">��Ҫ��˸��</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="newslist.php?zt=1">(<?=$anum?>)</a> ƪ</li>
 </ul>

 <? $anum=returncount("yjcode_task where zt=1");?>
 <ul class="u2">
 <li class="l1">��Ҫ�������</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="tasklist.php?zt=1">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_task where zt=8");?>
 <ul class="u2">
 <li class="l1">�о��׵�����</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="tasklist.php?zt=8">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_gd where gdzt=1 and zt<>99");?>
 <ul class="u2">
 <li class="l1">�ȴ�������</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="gdlist.php?gdzt=1">(<?=$anum?>)</a> ��</li>
 </ul>

 <? $anum=returncount("yjcode_newspj where zt=1");?>
 <ul class="u2">
 <li class="l1">�����Ѷ����</li>
 <li class="l2"><a class="<? if($anum>0){?>red<? }?>" href="newspjlist.php?zt=1">(<?=$anum?>)</a> ��</li>
 </ul>
</div>
<!--��������E-->

<!--ϵͳ����B-->
<div class="isys">
 <div class="d1">ϵͳ��Ϣ</div>
 <ul class="u2">
 <li class="l1">PHP�汾</li>
 <li class="l2"><? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "�鿴Ȩ�޲���";}else{echo phpversion();}?></li>
 </ul>
 <ul class="u2">
 <li class="l1">MYSQL�汾</li>
 <li class="l2"><?=mysql_get_server_info()?></li>
 </ul>
 <ul class="u2">
 <li class="l1">������ϵͳ</li>
 <li class="l2"><? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "�鿴Ȩ�޲���";}else{echo php_uname('s').php_uname('r');}?></li>
 </ul>
 <ul class="u2">
 <li class="l1">PHP���л���</li>
 <li class="l2"><? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "�鿴Ȩ�޲���";}else{echo $_SERVER['SERVER_SOFTWARE'];}?></li>
 </ul>
 <ul class="u2">
 <li class="l1">������IP</li>
 <li class="l2"><?=GetHostByName($_SERVER['SERVER_NAME'])?></li>
 </ul>
 <ul class="u2">
 <li class="l1">PHP����ϴ�</li>
 <li class="l2"><?=ini_get('upload_max_filesize')?></li>
 </ul>
 <ul class="u2">
 <li class="l1">�Ƿ�֧��CURL</li>
 <li class="l2"><? $a=function_exists('curl_init');if($a==1){echo "֧��";}else{echo "<span class=red>��֧��</span>";}?></li>
 </ul>
 <ul class="u2">
 <li class="l1">��ǰϵͳʱ��</li>
 <li class="l2"><?=getsj()?></li>
 </ul>
</div>
<!--ϵͳ����E-->

</div>
<!--E-->

</div>
</div>
<? include("bottom.php");?>
</body>
</html>