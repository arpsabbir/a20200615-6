<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

//��������ʼ
if($_POST[jvs]=="password"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 $pwd1=sha1(sqlzhuru($_POST[t2]));
 $pwd2=sqlzhuru($_POST[t2]);
 $uid=$_SESSION[SHOPUSER];
 if(panduan("*","yjcode_user where uid='".$uid."' and pwd='".$pwd."'")==0){Audit_alert("ԭ������֤ʧ�ܣ��������ԣ�","pwd.php");}
 updatetable("yjcode_user","pwd='".$pwd1."' where uid='".$_SESSION[SHOPUSER]."'");
 include("../tem/uc/pwd.php");
 $_SESSION["SHOPUSERPWD"]=$pwd1;
 php_toheader("pwd.php?t=suc");
}
//����������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<script language="javascript">
function tj(){
 v=document.f1.t1.value;if(v.length == 0 || v.indexOf(" ")>=0){alert("�����������");document.f1.t1.focus();return false;}	
 v=document.f1.t2.value;if(v.length == 0 || v.indexOf(" ")>=0){alert("������������");document.f1.t2.focus();return false;}	
 if(document.f1.t2.value!=document.f1.t3.value){alert("��������������벻һ��");document.f1.t3.focus();return false;}	
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 tjwait();
 f1.action="pwd.php";
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
 document.getElementById("rcap3").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ�!","pwd.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="password" name="jvs" />
 <ul class="uk">
 <? 
 while1("id,uid,pwd,shopzt","yjcode_user where uid='".$_SESSION[SHOPUSER]."'");$row1=mysql_fetch_array($res1);
 if(strcmp(sha1("123456"),$row1[pwd])==0){
 ?>
 <li class="l1">��ʾ��</li>
 <li class="l21">�𾴵� <strong class="blue"><?=returnnc($luserid)?></strong>��Ϊ�������ʻ���ȫ�������޸�����(����ʹ��123456����򵥵�����)</li>
 <? }?>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ǰ���룺</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �����룺</li>
 <li class="l2"><input type="password" class="inp" name="t2" /></li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ȷ�����룺</li>
 <li class="l2"><input type="password" class="inp" name="t3" /></li>
 <li class="l3"><?=tjbtnr("�����޸�")?></li>
 </ul>
 </form>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>