<?
include("../../config/conn.php");
include("../../config/function.php");
if($_SESSION["SHOPUSER"]!="" && $_SESSION["SHOPUSERPWD"]!=""){php_toheader("../user/");}
if(!empty($_GET[reurl])){$_SESSION["tzURL"]=$_GET[reurl];}

//��¼��֤��ʼ
if($_GET[action]=="login" && sqlzhuru($_POST[yj])=="yjcode"){
 zwzr();
 $mot=sqlzhuru($_POST[tmot]);
 while0("*","yjcode_yzm where tit='".$mot."' and yzm='".sqlzhuru($_POST[tyzm])."' and admin=2");if(!$row=mysql_fetch_array($res)){Audit_alert("������֤���������󣬷�������","index1.php");}
 deletetable("yjcode_yzm where tit='".$mot."'");
 $sj=getsj();
 $uip=getuip();
 while1("*","yjcode_user where mot='".$mot."' and ifmot=1");if($row1=mysql_fetch_array($res1)){
  if(0==$row1[zt]){Audit_alert("�����ʺ��ѱ����ã�����ϵ��վ�ͷ�����","./");}
  $uid=$row1[uid];
  $pwd1=$row1[pwd];
  $userid=$row1[id];
 }else{
  $bh=time();
  $uid="mot".$bh.rnd_num(300);
  $pwd="123456";
  $ifmot=1;
  $nc=$mot;
  $email=$uid."@qq.com";
  $WAPLJ=1;
  include("../../reg/reg_tem.php");
  $pwd1=sha1($pwd);
 }
 intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$userid.",'".$sj."','".$uip."'");
 $_SESSION["SHOPUSER"]=$uid;
 $_SESSION["SHOPUSERPWD"]=$pwd1;
 php_toheader(returnjgdw($_SESSION["tzURL"],"","../user/"));

}
//��¼��֤����
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<title>���ŵ�¼ - �ֻ���<?=webname?></title>
<? include("../tem/cssjs.html");?>
<script language="javascript">
function login(){
mobile=document.getElementById("tmot").value;
var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(16[0-9]{1})|(17[0-9]{1})|(18[0-9]{1})|(19[0-9]{1}))+\d{8})$/; 
if(!myreg.test(mobile)){layerts("�ֻ������ʽ����");return false;}
if(mobile.replace(/\s/,"")==""){layerts("�ֻ������ʽ����");return false;}
if((document.f1.tyzm.value).replace(/\s/,"")==""){layerts("�������յ�����֤��");return false;}
layer.open({type: 2,content: '������֤',shadeClose:false});
f1.action="index1.php?action=login";
}
//���Ϳ�ʼ
var sz;
function yzonc(){
 objhtml("sjzouv",60);
 objdis("fsid1","none");objdis("fsid2","");
 sz=setInterval("sjzou()",1000);
 $.get("motLoginchk.php",{mob:document.getElementById("tmot").value},function(result){
  if(result=="err1"){huifu();layerts("�ֻ������ʽ����");}
 });
}
function sjzou(){
 miao=parseInt(document.getElementById("sjzouv").innerHTML);
 if(miao<=0){huifu();}else{document.getElementById("sjzouv").innerHTML=miao-1;}
}
function objdis(x,y){
document.getElementById(x).style.display=y;
}
function objhtml(x,y){
document.getElementById(x).innerHTML=y;
}
function huifu(){
clearInterval(sz);objdis("fsid1","");objdis("fsid2","none");objhtml("sjzouv",60);
}
</script>
</head>
<body>
<!--��ҳͷ��B-->
<div class="ntop box">
 <div class="d1" onClick="javascript:history.back(-1)"><img src="../img/back-vector.png" height="20" /></div>
 <div class="d2">���ŵ�¼</div>
 <div class="d3"></div>
</div>
<!--��ҳͷ��E-->

<form name="f1" method="post" onSubmit="return login()">
<input type="hidden" value="yjcode" name="yj" />
<div class="reg">

 <div class="inpbox box">
  <div class="d1"><input type="text" id="tmot" placeholder="�����ֻ���" name="tmot" /></div>
  <div class="d2">
   <div id="fsid1" onClick="javascript:yzonc();">������֤��</div>
   <div id="fsid2" style="display:none;">(<span id="sjzouv">60</span>)���»�ȡ</div>
  </div>
 </div>
 
 <div class="inpbox box">
  <div class="d1"><input type="text" value="" placeholder="�����������֤��" name="tyzm" id="tyzm" /></div>
 </div>

 <div class="regbtn box">
  <div class="d1"><input type="submit" class="tjinput" value="��¼" /></div>
 </div>
 
</div>
</form>

<div class="qh">
<a href="../../config/qq/oauth/index.php?tz=wap">QQ��¼</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php">�˺������¼</a>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="reg.php">���ע���Ա</a>
</div>

<? include("../tem/moban/".$rowcontrol[wapmb]."/tem/bottom.php");?>
</body>
</html>