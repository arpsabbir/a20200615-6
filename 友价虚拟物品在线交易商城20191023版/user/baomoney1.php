<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'utf8'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader(gloweb);}

//��������ʼ
if($_POST[jvs]=="bao"){
 zwzr();
 $t1=floatval($_POST[t1]);
 if($t1>$rowuser[money1]){Audit_alert("����","baomoney1.php");}
 if($t1<=0){Audit_alert("δ֪����","baomoney1.php");}
 PointIntoB($rowuser[id],"���ɱ�֤��",$t1);
 PointUpdateB($rowuser[id],$t1); 
 PointIntoM($rowuser[id],"���ɱ�֤��",$t1*(-1));
 PointUpdateM($rowuser[id],$t1*(-1)); 
 php_toheader("baomoney1.php?t=suc");
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
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�����뱣֤������");document.f1.t1.focus();return false;}	
if(!confirm("ȷ��Ҫ���ɱ�֤����")){return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
tjwait();
f1.action="baomoney1.php";
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
 
 <? include("rcap15.php");?>
 <script language="javascript">
 document.getElementById("rcap2").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ�!","baomoney1.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="bao" name="jvs" />
 <ul class="uk">
 <li class="l1">������</li>
 <li class="l21"><?=sprintf("%.2f",$rowuser[money1])?>Ԫ <a href="pay.php" class="red">����ֵ��</a></li>
 <li class="l1">���ñ�֤��</li>
 <li class="l21"><?=sprintf("%.2f",$rowuser[baomoney])?>Ԫ</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> ���ɱ�֤��</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l3"><?=tjbtnr("���ɱ�֤��")?></li>
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