<?php
set_time_limit(0);
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."' and shopzt=2";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("openshop3.php");}
$timestamp=time();
$pwd=$rowuser[pwd];
$userid=$rowuser[id];
$bh=$_GET[bh];
while0("*","yjcode_pro where bh='".$bh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
include ("baidu.php");//���ƺ�
//������ʼ
if($_GET[control]=="update"){
 zwzr();
 $sj=date("Y-m-d H:i:s");
 $myty=preg_split("/yjcode/",sqlzhuru($_POST[mty]));
 $txt=sqlzhuru1($_POST[content]);
 $tit=sqlzhuru($_POST[ttit]);
 $wkey=strgb2312(sqlzhuru($_POST[twkey]),0,240);
 $wdes=strgb2312(sqlzhuru($_POST[twdes]),0,240);
 $yhsj1=sqlzhuru($_POST[tyhsj1]);if(!empty($yhsj1)){$ses="yhsj1='".$yhsj1."',";}
 $yhsj2=sqlzhuru($_POST[tyhsj2]);if(!empty($yhsj1)){$ses=$ses."yhsj2='".$yhsj2."',";}
 $money1=sqlzhuru($_POST[tmoney1]);
 $money2=sqlzhuru($_POST[tmoney2]);
 $money3=sqlzhuru($_POST[tmoney3]);if(!is_numeric($money3)){$money3=0;}
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 if($money1<0 || $money2<0 || $money3<0){Audit_alert("�۸���Ϊ������","productlist.php");}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 if($rowcontrol[ifproduct]=="on"){$nzt=0;}else{$nzt=1;}
 
 $tysx=sqlzhuru($_POST[tysx]);
 $tysxB=intval(sqlzhuru($_POST[tysxBnum]));
 for($i=1;$i<$tysxB;$i++){
  $tysxS=intval(sqlzhuru($_POST["tysxSnum".$i]));
  for($j=1;$j<=$tysxS;$j++){
  $zi=sqlzhuru($_POST["zi_".$i."_".$j]);
  if(!empty($zi)){
  $tysx=$tysx."xcf".$_POST["tysxty1_".$i].":".$zi;
  }
  }
 }
 
 $ifuserjd=intval($_POST[Rifuserdj]);
 if(1==$ifuserjd){
 deletetable("yjcode_prouserdj where probh='".$bh."'");
  for($i=1;$i<intval($_POST[djnum]);$i++){
  $zhekou=$_POST["zhekou_".$i];
  $djname=$_POST["name1_".$i];
  if(!empty($zhekou)){intotable("yjcode_prouserdj","probh,userid,djname,admin,zhi","'".$bh."',".$row[userid].",'".$djname."',1,".$zhekou."");}
  }
 }

 @updatetable("yjcode_pro",$ses."
			 mybh='".sqlzhuru($_POST[tmybh])."',
			 myty1id=".$myty[0].",
			 myty2id=".$myty[1].",
			 tysx='".$tysx."',
			 zt=".$nzt.",
			 tit='".$tit."',
			 wkey='".$wkey."',
			 wdes='".$wdes."',
			 txt='".$txt."',
			 kcnum=".$kcnum.", 
			 money1=".$money1.", 
			 money2=".$money2.",
			 money3=".$money3.",
			 yhxs=".sqlzhuru($_POST[Ryhxs]).",
			 yhsm='".sqlzhuru($_POST[tyhsm])."',
			 fhxs=".$fhxs.",
			 wpurl='".sqlzhuru($_POST[twpurl])."',
			 wppwd='".sqlzhuru($_POST[twppwd])."',
			 wppwd1='".sqlzhuru($_POST[twppwd1])."',
			 upty=".intval($_POST[Rupty]).",
			 ysweb='".sqlzhuru($_POST[tysweb])."',
			 ifuserdj=".$ifuserjd.",
			 txtmb='".sqlzhuru($_POST[ttxtmb])."',
			 zl=".sqlzhuru($_POST[tzl]).",
			 downurl='".sqlzhuru($_POST[tdownurl])."'
			 where bh='".$bh."' and userid=".$userid);
 uploadtp($bh,"��Ʒ",$userid);
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
   $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
   $lj="../upload/".$userid."/".$bh."/";
   move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
   
   if(intval($_POST[Rupty])==0){
    delFile($lj.$row[upf]);
   }elseif(intval($_POST[Rupty])==1){
    include('../config/alioss/Common.php');
    $bucket = Common::getBucketName();
    $ossClient = Common::getOssClient();
    if(!is_null($ossClient)){;
	$ossClient->setTimeout(3600);
	$ossClient->setConnectTimeout(3600);
    $ossClient->createObjectDir($bucket, "upload/".$userid."/".$bh."/");
    $ossClient->uploadFile($bucket,"upload/".$userid."/".$bh."/".$mc,$lj.$mc);
	delFile($lj.$mc);
	$alioss=preg_split("/,/",$rowcontrol[alioss]);
	$mc="https://".$alioss[3].".".$alioss[2]."/"."upload/".$userid."/".$bh."/".$mc;
	}
   }
  
  updatetable("yjcode_pro","upf='".$mc."' where bh='".$bh."' and userid=".$userid);
  }
 }
 //�ϴ�E
 //����B
 if(4==$fhxs){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,userid,ka","yjcode_kc where probh='".$bh."' and ka='".$e[0]."' and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_kc","probh,userid,ka,mi,ifok","'".$bh."',".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc($bh);
 }
 //����E
  // �ٶ����Ϳ�ʼ
  $urlid = $row[id];
    $baidu=baidu("product/view".$row[id].".html");
    if($baidu){
        $dbstatus="���ͳɹ�";
    }else{
        $dbstatus="����ʧ��";
    }
    $dbtime=date("Y-m-d H:i:s");
    $dburl="".weburl."product/view".$row[id].".html";
    $dbtitle=$tit;
    intotable("baiduurl","titles,urls,datetimes,status","'{$dbtitle}','{$dburl}','{$dbtime}','{$dbstatus}'");
	// ����
	while1("*","xiongzhangurl where urls='".$dburl."'");if(!$row1=mysql_fetch_array($res)){
		$mtotal = returncount("xiongzhangurl where datetimes > '".date('Y-m-d')." 00:00:00'");
		if( $mtotal <= 10 ){
			$xiongzhang=xiongzhang("product/view".$urlid.".html");
			if($xiongzhang){
				$dbstatus="���ͳɹ�";
			}else{
				$dbstatus="����ʧ��";
			}
			$dbtime=date("Y-m-d H:i:s");
			$dburl="".weburl."product/view".$urlid.".html";
			$dbtitle=$tit;
			intotable("xiongzhangurl","titles,urls,datetimes,status","'{$dbtitle}','{$dburl}','{$dbtime}','{$dbstatus}'");
		}
	} // �ٶ����ͽ���
 php_toheader("prosuc.php?bh=".$bh."&id=".$row[id]);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/adddate.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script language="javascript">
function tj(){
if((document.f1.ttit.value).replace(/\s/,"")==""){alert("���������");document.f1.ttit.focus();return false;}
a=document.f1.tkcnum.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�Ŀ��");document.f1.tkcnum.focus();return false;}
a=document.f1.tmoney1.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ļ۸�");document.f1.tmoney1.focus();return false;}
a=document.f1.tmoney2.value;if(a.replace("/\s/","")=="" || isNaN(a)){alert("��������Ч�ļ۸�");document.f1.tmoney2.focus();return false;}
r=document.getElementsByName("Rfhxs");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�񷢻���ʽ��");return false;}
cstr="xcf";
c=document.getElementsByName("Csx");
for(i=0;i<c.length;i++){if(c[i].checked==true){cstr=cstr+c[i].value+"xcf";}}
document.f1.tysx.value=cstr;
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
tjwait();
f1.action="product.php?bh=<?=$bh?>&control=update";
}

function yhxsonc(x){
if(1==x){document.getElementById("yhxsul").style.display="none";}	
else if(2==x){document.getElementById("yhxsul").style.display="";}	
}

function fhxsonc(x){
for(i=1;i<=5;i++){
d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
}
d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
}

function djonc(x){
if(0==x){document.getElementById("djv").style.display="none";}else{document.getElementById("djv").style.display="";}
}

function szfz(){
if(!confirm("���뿪��ҳ�棬��ǰҳ���������δ���棬���ᶪʧ��ȷ����")){return false;}
location.href="protypelist.php";
}

function yjkscha(){
m2=document.f1.tmoney2.value;
yjk=document.f1.yjks.value;
if(isNaN(m2) || yjk==""){yj=m2;}else{yj=accMul(m2,yjk);}
document.f1.tmoney1.value=yj;
}
function ysareaonc(){
 layer.open({
  type: 2,
  shadeClose: true,
  area: ['600px', '505px'],
  title:["������������","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['ysarea.php?bh=<?=$bh?>', 'no'] 
 });
}

function tzxh(){
 layer.open({
  type: 2,
  shadeClose: true,
  area: ['610px', '345px'],
  title:["ͼƬ����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['tpxh.php?bh=<?=$bh?>', 'no'] 
 });
}

//��ͼ
function ctonc(x){
 if(x==1){
  document.getElementById("ctv1").style.display="";
 }else if(x==2){
  document.getElementById("ctv1").style.display="none";
  layer.open({
    type: 2,
    area: ['200px', '285px'],
    shadeClose: false,
	closeBtn: 0,
    title:false,
    skin: 'layui-layer-rim', //���ϱ߿�
    content:['wapct.php?admin=6&bh=<?=$bh?>', 'no'] 
  });
 }
}

function videoonc(){
 layer.open({
  type: 2,
  shadeClose: false,
  area: ['901px', '550px'],
  title:["��Ƶ����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['provideolist.php?bh=<?=$bh?>', 'no'] 
 });
}

</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("protop.php");?>
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <!--B-->
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <!--����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">������Ŀ</li><li class="l3"></li></ul>
 <ul class="uk">
 <li class="l1">���ڷ��飺</li>
 <li class="l21">
 <strong>
 <?=returntype(1,$row[ty1id])." - ".returntype(2,$row[ty2id])." - ".returntype(3,$row[ty3id])." - ".returntype(4,$row[ty4id])." - ".returntype(5,$row[ty5id])?>
 </strong>
 [<a href="productlx.php?action=update&id=<?=$row[id]?>">�޸�</a>]
 </li>
 <li class="l1">�Զ�����飺</li>
 <li class="l2">
 <select name="mty" class="inp">
 <option value="0yjcode0">ѡ�����</option>
 <? while1("*","yjcode_protype where admin=1 and zt=0 and userid=".$luserid);while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[id]?>yjcode0"<? if($row1[id]==$row[myty1id] && $row[myty2id]==0){?> selected="selected"<? }?> style="background-color:#EFEFEF;color:#333;"><?=$row1[name1]?></option>
 <? while2("*","yjcode_protype where admin=2 and name1='".$row1[name1]."' and zt=0 and userid=".$luserid);while($row2=mysql_fetch_array($res2)){?>
 <option value="<?=$row1[id]?>yjcode<?=$row2[id]?>"<? if($row1[id]==$row[myty1id] && $row2[id]==$row[myty2id]){?> selected="selected"<? }?>> - <?=$row2[name2]?></option>
 <? }?>
 <? }?>
 </select>
 <span class="fd"> [<a href="javascript:void(0);" onclick="szfz()">���÷���</a>]</span>
 </li>
 <li class="l1">���⣺</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[tit]?>" class="inp" name="ttit" /></li>
 <li class="l1">�Ż���ʽ��</li>
 <li class="l2">
 <label><input name="Ryhxs" type="radio" value="1" onclick="yhxsonc(1)" <? if(1==$row[yhxs]){?>checked="checked"<? }?> /> �����Ż�</label>
 <label><input name="Ryhxs" type="radio" value="2" onclick="yhxsonc(2)" <? if(2==$row[yhxs]){?>checked="checked"<? }?> /> ��ʱ�Ż�</label> 
 </li>
 <li class="l1">��ǰ�ۼۣ�</li>
 <li class="l2">
 <input class="inp" name="tmoney2" value="<?=$row[money2]?>" size="10" type="text"/>
 </li>
 <li class="l1">ԭ�ۣ�</li>
 <li class="l2">
 <input class="inp" name="tmoney1" value="<?=$row[money1]?>" size="10" type="text"/>
 <select name="yjks" class="inp" onchange="yjkscha()">
 <option value="">�������</option>
 <? for($i=1;$i<10;$i++){?>
 <option value="1.<?=$i?>">X1.<?=$i?>(�൱�ڵ�ǰ�ۼ�Ϊ<?=10-$i?>���Ż�)</option>
 <? }?>
 </select>
 </li>
 </ul>
 <ul class="uk uk0" id="yhxsul" style="display:none;">
 <li class="l1">��ʱ�Żݼۣ�</li>
 <li class="l2"><input class="inp" name="tmoney3" value="<?=$row[money3]?>" size="10" type="text"/></li>
 <li class="l1">�Ż�˵����</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[yhsm]?>" class="inp" name="tyhsm" /></li>
 <li class="l1">�Ż�ʱ�䣺</li>
 <li class="l2">
 <input class="inp" name="tyhsj1" value="<?=returnjgdw(isDate($row[yhsj1]),"","")?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/> 
 <span class="fd">��</span> 
 <input class="inp" name="tyhsj2" value="<?=returnjgdw(isDate($row[yhsj2]),"","")?>" readonly="readonly" onclick="SelectDate(this,'yyyy-MM-dd hh:mm:ss')" size="20" type="text"/>
 </li>
 </ul>
 <ul class="uk uk0">
 <li class="l1">������ʽ��</li>
 <li class="l2">
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> ��������</label> &nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> ��վֱ������</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> �㿨����</label>&nbsp;&nbsp;
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"5") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="5" onclick="fhxsonc(5)" <? if(5==$row[fhxs]){?>checked="checked"<? }?> /> ʵ����</label>&nbsp;&nbsp;
 <? }?>
 </li>
 </ul> 
 <ul class="uk uk0" id="kcuk">
 <li class="l1">�������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> <span class="fd hui">(����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</span></li>
 </ul>
 <ul class="uk uk0" id="fhxs2" style="display:none;">
 <li class="l1">���̵�ַ��</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">��ѹ���룺</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk uk0" id="fhxs3" style="display:none;">
 <li class="l1">�ϴ���ʾ��</li>
 <li class="l21">�ļ����֧��<?=ini_get('upload_max_filesize')?></li>
 <li class="l1">�洢��ʽ��</li>
 <li class="l2">
 <? if(!empty($rowcontrol[alioss]) && $rowcontrol[alioss]!=",,,"){?>
 <label><input name="Rupty" type="radio" value="1" <? if(1==$row[upty]){?>checked="checked"<? }?> /> ������OSS�洢<span class="red">(�Ƽ�)</span></label>
 <? }?>
 <label><input name="Rupty" type="radio" value="0" <? if(empty($row[upty])){?>checked="checked"<? }?> /> վ�ڴ洢</label>
 </li>
 <li class="l1">�ϴ��ļ���</li>
 <li class="l2"><label><input type="file" name="inp1" id="inp1" size="25"></label></li>
 <? 
 if(!empty($row[upf])){
 if(empty($row[upty])){$u=weburl."upload/".$row[userid]."/".$row[bh]."/".$row[upf];}else{$u=$row[upf];}
 ?>
 <li class="l1">�ļ�Ԥ����</li>
 <li class="l21">��<a href="<?=$u?>" class="blue" target="_blank">���Ԥ��</a>��</li>
 <? }?>
 </ul>
 <ul class="uk uk0" id="fhxs4" style="display:none;">
 <li class="l1">���ص�ַ��</li>
 <li class="l2"><input class="inp" name="tdownurl" value="<?=$row[downurl]?>" size="80" type="text"/><span class="fd">������</span></li>
 <li class="l1">��棺</li>
 <li class="l21"><strong class="red"><?=$row[kcnum]?>��</strong> [<a href="kclist.php?bh=<?=$bh?>" target="_blank" class="blue">������</a>]</li>
 <li class="l1">˵����</li>
 <li class="l21 red">�����ʽΪ����+�ո�+����(�ɸ��ϸ�������)��һ��һ�飬��AAAAA BBBBB</li>
 <li class="l9">��ӿ��ܣ�</li>
 <li class="l10"><textarea name="s1"></textarea></li>
 </ul>
 <ul class="uk uk0" id="fhxs5" style="display:none;">
 <li class="l1">������</li>
 <li class="l2"><input class="inp" name="tzl" value="<?=sprintf("%.2f",$row[zl])?>" size="10" type="text"/> <span class="fd">KG</span></li>
 </ul>
 <!--����E-->
 
 <!--Ч��ͼ/����B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">Ч��ͼ/����</li><li class="l3"></li></ul>
 <ul class="uk uk0">
 <li class="l1">��ͼ��ʽ��</li>
 <li class="l2">
 <label><input name="Rct" type="radio" value="" onclick="ctonc(1)" checked="checked" /> ���Դ�ͼ</label>
 <label><input name="Rct" type="radio" value="" onclick="ctonc(2)" /> �������΢�Ŵ�ͼ</label>
 <span class="fd">�ֻ�ͼƬ����û��ʾ����<a href="javascript:void(0);" onclick="xgtread('<?=$bh?>');" class="feng">�������ˢ����</a>��</span>
 </li>
 </ul>
 <ul class="uk uk0" id="ctv1">
 <li class="l1">Ч��ͼ��</li>
 <li class="l2">
 <iframe style="float:left;" src="tpupload.php?admin=1&bh=<?=$bh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 <span class="fd" style="margin-left:10px;">������ϴ�7��Ч��ͼ ��<a href="javascript:void(0);" onclick="tzxh()" class="blue">����ͼƬ˳��</a>��</span>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 
 <ul class="uk uk0">
 <li class="l7">��Ʒ���飺</li>
 <li class="l8"><script id="editor" name="content" type="text/plain" style="width:770px;height:330px;"><?=$row[txt]?></script></li>
 </ul>
 <!--Ч��ͼ/����E-->
 
 <!--ѡ��B-->
 <ul class="rcap"><li class="l1"></li><li class="l2">ѡ����Ŀ</li><li class="l3"></li></ul>
 <div class="rts" style="cursor:pointer;" onclick="xtinfonc()">�����<span id="xtzs" class="red">����</span>�� ѡ��ֿ��Բ���д��������ѡ����Ϣ������������Ʒ������ۣ��������Ҳ���������������ƺá�</div>
 <div id="xuantian">
 <div class="tysx">
 <input type="hidden" value="<?=$row[tysx]?>" name="tysx" />
 <? $i=1;while1("*","yjcode_typesx where admin=1 and typeid=".$row[ty1id]." order by xh asc");while($row1=mysql_fetch_array($res1)){?>
 <input type="hidden" value="<?=$row1[id]?>" name="tysxty1_<?=$i?>" />
 <ul class="uk1">
 <li class="l1"><?=$row1[name1]?>��</li>
 <li class="l2">
 <? $j=1;while2("*","yjcode_typesx where admin=2 and name1='".$row1[name1]."' and typeid=".$row1[typeid]." order by xh asc");while($row2=mysql_fetch_array($res2)){?>
 <label><input name="Csx" type="checkbox" value="<?=$row2[id]?>"<? if(strstr($row[tysx],"xcf".$row2[id]."xcf")){?>checked="checked"<? }?> /> <?=$row2[name2]?></label>
 <? $j++;}?>
 <? 
 if(!empty($row1[ifzi])){
 $v="";
 $a1=preg_split("/xcf".$row1[id].":/",$row[tysx]);
 if(count($a1)>1){$b1=preg_split("/xcf/",$a1[1]);$v=$b1[0];}
 ?>
 <input type="text" name="zi_<?=$i?>_<?=$j?>" size="10" value="<?=$v?>" class="inp" />
 <? }?>
 <input type="hidden" value="<?=$j?>" name="tysxSnum<?=$i?>" />
 </li>
 </ul>
 <? $i++;}?>
 </div>
 <input type="hidden" value="<?=$i?>" name="tysxBnum" />
 <ul class="uk">
 <li class="l1">��Ա�ȼ���</li>
 <li class="l2">
 <label><input name="Rifuserdj" type="radio" value="0" onclick="djonc(0)" <? if(empty($row[ifuserdj])){?>checked="checked"<? }?> /> ������</label> 
 <label><input name="Rifuserdj" type="radio" value="1" onclick="djonc(1)" <? if(1==$row[ifuserdj]){?>checked="checked"<? }?> /> ����</label> 
 </li>
 </ul>
 <div id="djv" style="display:none;">
 <ul class="dju1">
 <li class="l1">��Ա�ȼ�</li>
 <li class="l2">�����ۿ�(10��ʾ���ۿۣ�9��ʾ9��)</li>
 </ul>
 <? 
 $j=1;while1("*","yjcode_userdj where zt=0 order by xh asc");while($row1=mysql_fetch_array($res1)){
 while2("*","yjcode_prouserdj where probh='".$bh."' and djname='".$row1[name1]."'");if($row2=mysql_fetch_array($res2)){$zhekou=$row2[zhi];}else{$zhekou=$row1[zhekou];}
 ?>
 <ul class="dju2">
 <li class="l1"><input type="text" readonly="readonly" name="name1_<?=$j?>" value="<?=$row1[name1]?>" /></li>
 <li class="l2"><input type="text" name="zhekou_<?=$j?>" value="<?=$zhekou?>" /></li>
 </ul>
 <? $j++;}?>
 <input type="hidden" value="<?=$j?>" name="djnum" />
 </div>
 <ul class="uk uk0">
 <li class="l1">�ײ����ã�</li>
 <li class="l21">��<strong><a href="taocanlist.php?bh=<?=$row[bh]?>" target="_blank" class="blue">��������ײͱ༭</a></strong>��</li>
 <li class="l1">��������</li>
 <li class="l21">��<a href="javascript:void(0);" onclick="ysareaonc()">�༭���������б�</a>��</li>
 <li class="l1">��ʾ��ַ��</li>
 <li class="l2"><input type="text" size="80" value="<?=$row[ysweb]?>" class="inp" name="tysweb" /></li>
 <li class="l1">չʾģ�壺</li>
 <li class="l2">
 <select name="ttxtmb" class="inp">
 <option value="">Ĭ��ģ��</option>
 <? while1("*","yjcode_txtmb where admin=1 order by mbid asc");while($row1=mysql_fetch_array($res1)){?>
 <option value="<?=$row1[mbid]?>"<? if($row1[mbid]==$row[txtmb]){?> selected="selected"<? }?>><?=$row1[tit]?>(<?=$row1[txt]?>)</option>
 <? }?>
 </select>
 </li>
 <li class="l1">��Ʒ�ؼ��ʣ�</li>
 <li class="l2"><input  name="twkey" value="<?=$row[wkey]?>" size="80" type="text" class="inp" /></li>
 <li class="l9">��Ʒ������</li>
 <li class="l10"><textarea name="twdes"><?=$row[wdes]?></textarea></li>
 <li class="l1">�Զ�����룺</li>
 <li class="l2"><input type="text" size="10" value="<?=$row[mybh]?>" class="inp" name="tmybh" /></li>
 </ul>
 </div>
 <!--ѡ��E-->
 
 <ul class="uk uk0">
 <li class="l3"><? tjbtnr("�ύ","productlist.php")?></li>
 </ul>
 </form>

 <!--E-->
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<script language="javascript">
//ʵ�����༭��
var ue = UE.getEditor('editor');
//ʵ�����༭��
yhxsonc(<?=$row[yhxs]?>);
fhxsonc(<?=$row[fhxs]?>);
djonc(<?=returnjgdw($row[ifuserdj],"",0)?>);

function xgtread(x){
 $.get("protp.php",{bh:x},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("protpdel.php",{id:x},function(result){
  xgtread("<?=$bh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$bh?>");

function xtinfonc(){
if(document.getElementById("xtzs").innerHTML=="չ��"){document.getElementById("xuantian").style.display="";document.getElementById("xtzs").innerHTML="����";}
else{document.getElementById("xuantian").style.display="none";document.getElementById("xtzs").innerHTML="չ��";}
}

</script>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>