<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
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
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("��������Ŀ¼����!");document.f1.t1.select();return false;}
layer1=layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
$.post("../tem/edidirdata.php",{t1v:document.f1.t1.value,yjcode:"edidir"},function(result){
 layer.close(layer1);
 if(result=="err1"){alert("����ʧ�ܣ�ֻ֧�����֡���ĸ���»��ߵĸ�ʽ");return false;}
 else if(result=="err2"){alert("����ʧ�ܣ���ǰĿ¼������������һ��");return false;}
 else if(result=="err3"){alert("����ʧ�ܣ�Ȩ�޲���");return false;}
 else if(result=="ok"){location.href="../"+document.f1.t1.value+"/";return false;}
 else{alert("����ʧ�ܣ�"+result);return false;}
});
return false;
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">

<? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","pwd.php");}?>

<div class="bqu1">
<a class="a1" href="edidir.php">�޸ĺ�̨Ŀ¼</a>
</div>
  
<div class="rkuang">

 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">��Ŀ¼���ƣ�</li>
 <li class="l2"><input type="text" class="inp" value="<?=$rowcontrol[admindir]?>" name="t1" id="t1" size="30" /></li>
 <li class="l1">ϵͳ��ʾ��</li>
 <li class="l21 red">��������漰����ϵͳ��ȫ���޸ĺ����μǺ�̨����</li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>

</div>

</div>

</div>
<? include("bottom.php");?>
</body>
</html>