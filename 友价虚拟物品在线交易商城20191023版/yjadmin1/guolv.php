<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$bh=$_GET[bh];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_guolv where bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("guolvlist.php");}
$adminty=returnguolvty($row[admin]);
//������ʼ
if($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0701,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $tit=sqlzhuru($_POST[ttit]);
 if(check_in(".",$tit)){
  $nip=preg_split("/\./",getuip());
  if($tit==getuip() || $tit==$nip[0].".*.*.*" || $tit==$nip[0].".".$nip[1].".*.*" || $tit==$nip[0].".".$nip[1].".".$nip[2].".*"){Audit_alert("���ܼ��Լ���IP�������Լ�����������վ��~","guolv.php?bh=".$bh);}
  $a=preg_split("/\./",$tit);$ses="ip1='".$a[0]."',ip2='".$a[1]."',ip3='".$a[2]."',ip4='".$a[3]."',";
 }
 updatetable("yjcode_guolv",$ses."
			 tit='".$tit."',
			 txt='".sqlzhuru($_POST[ttxt])."',
			 sj='".$sj."',
			 zt=1 where bh='".$bh."'");
 php_toheader("guolv.php?t=suc&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu2").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0702,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=7;include("menu_user.php");?>

<div class="right">
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���[<a href='guolvlx.php?admin=".$row[admin]."'>���������Ϣ</a>]","guolv.php?bh=".$bh);}?>


 <div class="bqu1">
 <a href="javascript:void(0);" class="a1"><?=$adminty?>��Ϣ</a>
 <a href="guolvlist.php?admin=<?=$row[admin]?>">�����б�</a>
 </div> 

 <!--B-->
 <div class="rkuang">
 <script language="javascript">
 function tj(){
 if((document.f1.ttit.value).replace(/\s/,"")==""){alert("������<?=$adminty?>");document.f1.ttit.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="guolv.php?bh=<?=$bh?>&control=update";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="uk">
 <li class="l1">���������ͣ�</li>
 <li class="l21"><?=$adminty?></li>
 <li class="l1"><span class="red">*</span> <?=$adminty?>��</li>
 <li class="l2"><input type="text" size="30" value="<?=$row[tit]?>" class="inp" name="ttit" /><span class="fd">֧��ͨ���(*)����100.100.*.* ��ʾ��100.100�µ�����IP������</span></li>
 <li class="l4">��ע��</li>
 <li class="l5"><textarea name="ttxt"><?=$row[txt]?></textarea></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--E-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>