<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();

$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'utf8'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader(gloweb);}

$ordering=returncount("yjcode_order where selluserid=".$rowuser[id]." and (ddzt='wait' or ddzt='db' or ddzt='back' or ddzt='backerr' or ddzt='jf')");

//��������ʼ
if($_POST[jvs]=="bao"){
 zwzr();
 if($ordering>0){Audit_alert("����ʧ�ܣ���Ϊ�ж���δ����","baomoney2.php");}
 $t1=floatval($_POST[t1]);
 if($t1>$rowuser[baomoney]){Audit_alert("���ñ�֤����","baomoney2.php");}
 if($t1<=0){Audit_alert("δ֪����","baomoney1.php");}
 PointIntoB($rowuser[id],"�ⶳ��֤��",$t1*(-1),0,1);
 PointUpdateB($rowuser[id],$t1*(-1)); 
 php_toheader("baomoney2.php?t=suc");
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
<? if($ordering>0){?>alert("����ʧ�ܣ���Ϊ�ж���δ����");return false;<? }?>
if((document.f1.t1.value).replace(/\s/,"")==""){alert("�����뱣֤������");document.f1.t1.focus();return false;}	
if(!confirm("ȷ��Ҫ�ⶳ��֤����")){return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
tjwait();
f1.action="baomoney2.php";
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
 document.getElementById("rcap3").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ�!","baomoney2.php")?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="bao" name="jvs" />
 <ul class="uk">
 <li class="l1">���ñ�֤��</li>
 <li class="l21"><?=sprintf("%.2f",$rowuser[baomoney])?>Ԫ</li>
 <li class="l1">������</li>
 <li class="l21"><?=sprintf("%.2f",$rowuser[money1])?>Ԫ</li>
 <li class="l1"><span class="red" style="font-weight:normal;">*</span> �ⶳ��֤��</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <? if($ordering==0){?>
 <li class="l3"><?=tjbtnr("�ⶳ��֤��")?></li>
 <? }else{?>
 <li class="l1">������ʾ��</li>
 <li class="l21">����ǰ����<strong class="red"><?=$ordering?></strong>�ʶ���δ��ɴ�����֤����Ҫ�����ж���������Ϻ󣬲�������ⶳ</li>
 <? }?>
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