<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}

if(sqlzhuru($_POST[yjcode])=="jfbank"){
 zwzr();
 $fs=intval($_GET[fsv]);
 if($fs==1){ //���ֻ������
  $tnum=intval($_POST[t1]);
  if($tnum<=0){Audit_alert("�һ���ֵ��Ч��","jfbank.php");}
  if($tnum>$rowuser[jf]){Audit_alert("�һ�ֵ�������Ŀ��û��֣�","jfbank.php");}
  $m=sprintf("%.2f",$tnum/$rowcontrol[jfmoney]);
  PointIntoM($rowuser[id],"���ֶһ���Ǯ",$m);PointUpdateM($rowuser[id],$m);
  PointInto($rowuser[id],"���ֶһ���Ǯ",$tnum*(-1));PointUpdate($rowuser[id],$tnum*(-1));
 }elseif($fs==2){ //����һ�����
  $tnum=intval($_POST[t2]);
  if($tnum<=0){Audit_alert("�һ���ֵ��Ч��","jfbank.php");}
  if($tnum>$rowuser[money1]){Audit_alert("�һ�ֵ�������Ŀ�����","jfbank.php");}
  $jf=sprintf("%.2f",$tnum*$rowcontrol[jfmoney]);
  PointIntoM($rowuser[id],"���ֶһ���Ǯ",$tnum*(-1));PointUpdateM($rowuser[id],$tnum*(-1));
  PointInto($rowuser[id],"���ֶһ���Ǯ",$jf);PointUpdate($rowuser[id],$jf);
 }
 
 php_toheader("../tishi/index.php?admin=999&b=../user/jfbank.php"); 
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/buy.css" rel="stylesheet" type="text/css" />
<script language="javascript">
var fs=1;
function tj(){
 if(fs==1){zhi=document.f1.t1.value;}
 else if(fs==2){zhi=document.f1.t2.value;}
 if(zhi=="" || isNaN(zhi)){layerts('��������Ч�Ķһ�����');return false;}
 if(!confirm("ȷ��Ҫ���жһ���")){return false;}	
 layer.open({type: 2,content: '�����ύ',shadeClose:false});
 f1.action="jfbank.php?fsv="+fs;
}

function jfxs(){
fs=parseInt(document.f1.d1.value);
document.getElementById("uk1").style.display="none";
document.getElementById("uk2").style.display="none";
document.getElementById("uk"+fs).style.display="";
}

</script>
</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('shezhi.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��������</div>
 <div class="d3"></div>
</div>

<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="jfbank" name="yjcode" />
<div class="uk box">
 <div class="d1">�һ���ʽ<span class="s1"></span></div>
 <div class="d2">
 <select name="d1" onChange="jfxs()" style="font-size:13px;">
 <option value="1">���ֻ������</option>
 <option value="2">����һ�����</option>
 </select>
 </div>
 <div class="d3"><img src="../img/rightjian.png" height="13" /></div>
</div>

<div id="uk1">
 <div class="uk box">
  <div class="d1">���û���<span class="s1"></span></div>
  <div class="d21"><strong class="red"><?=$rowuser[jf]?></strong>��</div>
 </div>
 <div class="uk box">
  <div class="d1">�������<span class="s1"></span></div>
  <div class="d21"><strong class="red"><?=sprintf("%.2f",$rowuser[money1])?></strong>Ԫ</div>
 </div>
 <div class="uk box">
  <div class="d1">�һ�����<span class="s1"></span></div>
  <div class="d21"><?=$rowcontrol[jfmoney]?>��=1Ԫ�����</div>
 </div>
 <div class="uk box">
  <div class="d1">�һ�����<span class="s1"></span></div>
  <div class="d2"><input type="text" name="t1" class="inp" placeholder="���������Ļ���" /></div>
 </div>
</div>

<div id="uk2" style="display:none;">
 <div class="uk box">
  <div class="d1">�������<span class="s1"></span></div>
  <div class="d21"><strong class="red"><?=sprintf("%.2f",$rowuser[money1])?></strong>Ԫ</div>
 </div>
 <div class="uk box">
  <div class="d1">���û���<span class="s1"></span></div>
  <div class="d21"><strong class="red"><?=$rowuser[jf]?></strong>��</div>
 </div>
 <div class="uk box">
  <div class="d1">�һ�����<span class="s1"></span></div>
  <div class="d21">1Ԫ�����=<?=$rowcontrol[jfmoney]?>��</div>
 </div>
 <div class="uk box">
  <div class="d1">�� �� ��<span class="s1"></span></div>
  <div class="d2"><input type="text" name="t2" class="inp" placeholder="���������������" /></div>
 </div>
</div>


<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("����")?></div>
</div>

</form>

<? include("bottom.php");?>
<script language="javascript">
bottomjd(4);
</script>
</body>
</html>