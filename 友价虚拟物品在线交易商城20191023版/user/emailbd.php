<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

if($_GET[control]=="bd"){
 zwzr();
 if(panduan("uid,ifemail","yjcode_user where uid='".$_GET[email]."' and ifemail=1")==1){Audit_alert("��֤ʧ�ܣ������ʺ��Ѿ���֤���������ظ���֤","emailbd.php");}
 if(empty($_GET[yz])){Audit_alert("��֤������","emailbd.php");}
 if(panduan("uid,bdemail","yjcode_user where bdemail='".$_GET[yz]."' and uid='".$_SESSION[SHOPUSER]."'")==0){
 Audit_alert("��֤������������������֤","emailbd.php");
 }
 updatetable("yjcode_user","ifemail=1,bdemail='".returnbh()."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("emailbd.php?t=suc"); 

}elseif($_GET[control]=="delbd"){
 if(panduan("uid,bdemail","yjcode_user where bdemail='".$_GET[yz]."' and uid='".$_SESSION[SHOPUSER]."'")==0){
 Audit_alert("��֤�����������������ύ","emailbd.php");
 }
 updatetable("yjcode_user","ifemail=0,bdemail='".returnbh()."' where uid='".$_SESSION[SHOPUSER]."'");
 php_toheader("emailbd.php?t=suc"); 

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<script language="javascript">
//��֤��ʼ
var sz;
var xmlHttp = false;
try {
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttp = false;
  }
}
if (!xmlHttp && typeof XMLHttpRequest != 'undefined') {
  xmlHttp = new XMLHttpRequest();
}


function updatePage() {
  if (xmlHttp.readyState == 4) {
    var response = xmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	if(response=="True"){
		alert("�������Ѿ�����֤�������");
		document.getElementById("uk1").style.display="";document.getElementById("uk2").style.display="none";return false;
	}else{
		sz=setInterval("sjzou()",1000);return false;
	}
  }
}

function yzonc(){
 if((document.getElementById("t1").value).replace("/\s/","")==""){alert("�������ʼ���ַ");document.getElementById("t1").focus();return false;}
 document.getElementById("sjzouv").innerHTML=120;
 document.getElementById("uk1").style.display="none";
 document.getElementById("uk2").style.display="";
 document.getElementById("fsid1").style.display=""; 
 document.getElementById("fsid2").style.display="none"; 
 var url = "emailchk.php?email="+document.getElementById("t1").value;
 xmlHttp.open("get", url, true);
 xmlHttp.onreadystatechange = updatePage;
 xmlHttp.send(null);
}

function sjzou(){
 s=parseInt(document.getElementById("sjzouv").innerHTML);
 if(s<=0){
  clearInterval(sz);
  document.getElementById("fsid1").style.display="none"; 
  document.getElementById("fsid2").style.display=""; 
  return false;
 }else{document.getElementById("sjzouv").innerHTML=s-1;}
}

function bd(){
 if((document.getElementById("t2").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("t2").focus();return false;}
 location.href="emailbd.php?control=bd&yz="+document.getElementById("t2").value;
}

//���ʼ
var delsz;
var delxmlHttp = false;
try {
  delxmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    delxmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    delxmlHttp = false;
  }
}
if (!delxmlHttp && typeof XMLHttpRequest != 'undefined') {
  delxmlHttp = new XMLHttpRequest();
}


function delupdatePage() {
  if (delxmlHttp.readyState == 4) {
    response = delxmlHttp.responseText;
	response=response.replace(/[\r\n]/g,'');
	delsz=setInterval("delsjzou()",1000);
  }
}

function delbd(){
 if(!confirm("ȷ��Ҫ������������֤��")){return false;}
 document.getElementById("delsjzouv").innerHTML=120;
 document.getElementById("uk3").style.display="none";
 document.getElementById("uk4").style.display="";
 document.getElementById("fsid3").style.display=""; 
 document.getElementById("fsid4").style.display="none"; 
 var url = "emailchkdel.php";
 delxmlHttp.open("post", url, true);
 delxmlHttp.onreadystatechange = delupdatePage;
 delxmlHttp.send(null);
}

function delsjzou(){
 s=parseInt(document.getElementById("delsjzouv").innerHTML);
 if(s<=0){
  clearInterval(delsz);
  document.getElementById("fsid3").style.display="none"; 
  document.getElementById("fsid4").style.display=""; 
  return false;
 }else{document.getElementById("delsjzouv").innerHTML=s-1;}
}

function deltj(){
 if((document.getElementById("t4").value).replace("/\s/","")==""){alert("��������֤��");document.getElementById("t4").focus();return false;}
 location.href="emailbd.php?control=delbd&yz="+document.getElementById("t4").value;
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
 
 <? include("rcap1.php");?>
 <script language="javascript">
 document.getElementById("rcap5").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ�!","emailbd.php")?>

 <? if(1==$rowuser[ifemail]){?>
 <ul class="uk" id="uk3">
 <li class="l1">����֤���䣺</li>
 <li class="l21"><?=$rowuser["email"]?></li>
 <li class="l3"><input type="button" class="btn1" onclick="delbd()" onmouseover="this.className='btn1 btn2';" onmouseout="this.className='btn1';" value="���������֤" /></li>
 </ul>

 <ul class="uk" id="uk4" style="display:none;">
 <li class="l1"></li>
 <li class="l21 blue">�������ԭ�����ַ�Ѿ���ʧ������ϵ��վ�ͷ�����</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��֤�룺</li>
 <li class="l2"><input type="text" class="inp" id="t4"  /></li>
 <li class="l1"></li>
 <li class="l21" id="fsid3">��鿴<?=$rowuser[email]?>��������,�����С���(<span id="delsjzouv" class="red">120</span>����ط�)</li>
 <li class="l21" id="fsid4" style="display:none;">[<a href="#" onclick="javascript:delbd();">���·���</a>]</li>
 <li class="l3"><input type="button" class="btn1" onclick="deltj()" onmouseover="this.className='btn1 btn2';" onmouseout="this.className='btn1';" value="��һ��" /></li>
 </ul>
 
 <? }else{?>
 <ul class="uk" id="uk1">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ������룺</li>
 <li class="l2"><input type="text" class="inp" name="t1" id="t1" value="<?=$rowuser["email"]?>" /></li>
 <li class="l3"><input type="button" class="btn1" onclick="yzonc()" onmouseover="this.className='btn1 btn2';" onmouseout="this.className='btn1';" value="��һ��" /></li>
 </ul>
 <ul class="uk" id="uk2" style="display:none;">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��֤�룺</li>
 <li class="l2"><input type="text" class="inp" name="t2" id="t2"  /></li>
 <li class="l1"></li>
 <li class="l21" id="fsid1">�����С���(<span id="sjzouv" class="red">120</span>����ط�)</li>
 <li class="l21" id="fsid2" style="display:none;">[<a href="#" onclick="javascript:yzonc();">���·���</a>]</li>
 <li class="l3"><input type="button" class="btn1" onclick="bd()" onmouseover="this.className='btn1 btn2';" onmouseout="this.className='btn1';" value="��֤����" /></li>
 </ul>
 
 <? }?>
 
 <ul class="uk uk0">
 <li class="l1">������ʾ��</li>
 <li class="l21 red">����ÿ������ϵͳ��ȫ���ò�ͬ���ʼ��п��ܱ����˵�����������û�յ��ʼ�����ͨ���������������ҿ���</li>
 </ul>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>