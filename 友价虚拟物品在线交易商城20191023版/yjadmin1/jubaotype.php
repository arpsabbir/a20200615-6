<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$sj=date("Y-m-d H:i:s");
$bh=sqlzhuru($_GET[bh]);
while0("*","yjcode_jubaotype where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("jubaotypelist.php");}

//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 updatetable("yjcode_jubaotype","tit='".sqlzhuru($_POST[ttit])."',sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",admin=".sqlzhuru($_POST[d1]).",zt=0 where bh='".$bh."'");
 php_toheader("jubaotype.php?t=suc&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>�����̨</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='jubaotypelx.php'>�������</a>]","jubaotype.php?bh=".$bh);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1">�ٱ����͹���</a>
 <a href="jubaotypelist.php">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("������ٱ����ͣ�");document.f1.ttit.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="jubaotype.php?control=update&bh=<?=$bh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1"><span class="red">*</span> �ٱ����ͣ�</li>
 <li class="l2"><input type="text" value="<?=$row[tit]?>" size="80" class="inp" name="ttit" /></li>
 <li class="l1"><span class="red">*</span> ��Զ���</li>
 <li class="l2">
 <select name="d1" class="inp">
 <? $arr=array("��Ʒ");for($i=0;$i<count($arr);$i++){?>
 <option value="<?=$i+1?>"<? if(($i+1)==$row[admin]){?> selected="selected"<? }?>><?=$arr[$i]?></option>
 <? }?>
 </select>
 </li>
 <li class="l1"><span class="red">*</span> ����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--end-->
 
</div>

</div>

<?php include("bottom.php");?>
</body>
</html>