<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

//��������ʼ
if($_POST[jvs]=="safepwd"){
 zwzr();
 $pwd=sha1(sqlzhuru($_POST[t1]));
 if(panduan("*","yjcode_user where uid='".$_SESSION[SHOPUSER]."' and zfmm='".$pwd."'")==0){Audit_alert("��ȫ����֤ʧ�ܣ��������ԣ�","safepwd.php");}
 $_SESSION[SAFEPWD]=$pwd;
 php_toheader("safepwd.php");
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
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <!--��B-->
 <div class="rkuang">
 
 <? if(empty($_SESSION[SAFEPWD])){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("�����밲ȫ��");document.f1.t1.focus();return false;}	
 tjwait();
 f1.action="safepwd.php";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="safepwd" name="jvs" />
 <ul class="uk">
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ��ȫ�룺</li>
 <li class="l2"><input type="password" class="inp" name="t1" /></li>
 <li class="l1"></li>
 <li class="l21 blue">���û�����ð�ȫ�룬�����ʺ�������е�¼��Ϊ�˰�ȫ�����������<a href="zfmm.php" class="red">���ö����İ�ȫ��</a></li>
 <li class="l3"><?=tjbtnr("��¼")?></li>
 </ul>
 </form>
 <? }else{?>
 <ul class="uk">
 <li class="l1"></li>
 <li class="l21 blue">���İ�ȫ���Ѿ�ͨ����֤���ɽ��и������</li>
 </ul>
 <? }?>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>