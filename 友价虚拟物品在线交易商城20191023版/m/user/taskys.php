<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();

$bh=$_GET[bh];
$sj=date("Y-m-d H:i:s");
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userid=$rowuser[id];

$sqltask="select * from yjcode_task where bh='".$bh."' and taskty=0 and zt=4 and userid=".$userid."";mysql_query("SET NAMES 'GBK'");$restask=mysql_query($sqltask);
if(!$rowtask=mysql_fetch_array($restask)){php_toheader("tasklist.php");}

$sqltaskhf="select * from yjcode_taskhf where bh='".$bh."' and taskty=0 and useridhf=".$rowtask[useridhf]." and ifxz=1";mysql_query("SET NAMES 'GBK'");$restaskhf=mysql_query($sqltaskhf);
if(!$rowtaskhf=mysql_fetch_array($restaskhf)){php_toheader("tasklist.php");}

if($_GET[control]=="ys"){
 $zt=$_POST[R1];
 if($zt=="yes"){
  $money1=$rowtask[money2];
  PointIntoM($rowtask[useridhf],"������ɣ����Ӷ��(������".$bh.")",$money1);
  PointUpdateM($rowtask[useridhf],$money1);
  if(1==$rowtask[yjfs]){
  $m=$rowcontrol[taskyj]*$money1*(-1);
  PointIntoM($rowtask[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
  PointUpdateM($rowtask[useridhf],$m);
  }elseif(2==$row[yjfs]){
  $m=$rowcontrol[taskyj]*$money1*(-1)*0.5;
  PointIntoM($rowtask[useridhf],"������ɣ��۳�ƽ̨�н��(������".$bh.")",$m);
  PointUpdateM($rowtask[useridhf],$m);
  }
  updatetable("yjcode_task","zt=5 where id=".$rowtask[id]);
  $txt="����ͨ��";
  intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",1,'".$txt."','".$sj."',''");
  if(!empty($rowtask[jsbao])){
   PointIntoB($rowtask[useridhf],"�������ͨ�����գ��˻���֤��",$rowtask[jsbao],2);
   PointUpdateB($rowtask[useridhf],$rowtask[jsbao]); 
  }
 }elseif($zt=="no"){
  $txt="���ղ�ͨ��������ƽ̨����";
  intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$rowtask[userid].",".$rowtask[useridhf].",1,'".$txt."','".$sj."',''");
  updatetable("yjcode_task","zt=8 where id=".$rowtask[id]);
 }
 
 php_toheader("tasklist.php");
 
}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/task.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../../config/ueditor/lang/zh-cn/zh-cn.js"></script>
<script language="javascript">
function tj(){
r=document.getElementsByName("R1");rr="";for(i=0;i<r.length;i++){if(r[i].checked==true){rr=r[i].value;}}if(rr==""){alert("��ѡ�����״̬��");return false;}
if(!confirm("ȷ���ύ�ò�����")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="taskys.php?bh=<?=$bh?>&control=ys";
}
</script>
</head>
<body>
<? include("topuser.php");?>
<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('../task/view<?=$rowtask[id]?>.html')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">������������</div>
 <div class="d3"></div>
</div>

<? include("taskv.php");?>

<? while2("*","yjcode_user where id=".$rowtaskhf[useridhf]);$row2=mysql_fetch_array($res2);?>
<div class="taskmain1 box"><div class="d1"></div><div class="d2">�б���Ϣ</div></div>
<div class="taskmain2 box">
 <div class="d1">�б��û���</div>
 <div class="d2"><?=$row2[nc]?></div>
</div>
<div class="taskmain2 box">
 <div class="d1">����ʱ�䣺</div>
 <div class="d2"><?=$rowtaskhf[sj]?></div>
</div>
<div class="taskmain2 box">
 <div class="d1">�б�ʱ�䣺</div>
 <div class="d2"><?=$rowtaskhf[zbsj]?></div>
</div>
<div class="taskmain2 box">
 <div class="d1">��ϵQQ��</div>
 <div class="d2"><a href="javascript:void(0);" onClick="qqtang('<?=$row2[uqq]?>')"><?=$row2[uqq]?></a></div>
</div>
<? if(!empty($row2[mot])){?>
<div class="taskmain2 box">
 <div class="d1">��ϵ�绰��</div>
 <div class="d2"><?=$row2[mot]?></div>
</div>
<? }?>
<div class="taskmain2 box">
 <div class="d1">�û����ۣ�</div>
 <div class="d2"><strong class="red">��<?=$rowtaskhf[money1]?></strong></div>
</div>
<div class="taskmain2 box">
 <div class="d1">�н���ã�</div>
 <div class="d2">
 <? 
 if(empty($rowtask[yjfs])){echo "�����е�������Ϊ<strong class='feng'>��".$rowtaskhf[money1]*$rowcontrol[taskyj]."</strong>";}
 elseif($rowtask[yjfs]==1){echo "���ַ��е�";}
 elseif($rowtask[yjfs]==2){echo "˫�����е�һ�룬����Ϊ<strong class='feng'>��".$rowtaskhf[money1]*$rowcontrol[taskyj]*0.5."</strong>";}
 ?>
 </div>
</div>
<div class="taskmain3 box"></div>

<div class="taskmain1 box"><div class="d1"></div><div class="d2 red">ʱ������</div></div>
<div class="taskmain2 box">
 <div class="d1">�����ֹ��</div>
 <div class="d2"><?=$rowtaskhf[rwdq]?></div>
</div>
<div class="taskmain2 box">
 <div class="d1">���ս�ֹ��</div>
 <div class="d2">����Ҫ��<span class="red"><?=$rowtaskhf[oksj]?></span>ǰ�������������գ�����ϵͳ�Զ��ж�Ϊ���պϸ�</div>
</div>
<div class="taskmain3 box"></div>


<? if($rowtask[zt]==3 || $rowtask[zt]==4){?>
<form name="f1" method="post" onSubmit="return tj()">
<div class="taskmain1 box"><div class="d1"></div><div class="d2">����˵��</div></div>
<div class="txtbox box">
<div class="dmain">
 <script id="editor" name="content" type="text/plain" style="width:100%;height:200px;"></script>
</div>
</div>
<div class="uk box">
 <div class="d1">���ղ���</div>
 <div class="d2">
 <label class="blue"><input name="R1" type="radio" value="yes" /> ȷ������</label>
 <label class="red"><input name="R1" type="radio" value="no" /> �������⣬Ҫ��ƽ̨����</label>
 </div>
</div>
<div class="uk box"><div class="d1">������ʾ</div><div class="d21 red">����ظ����ַ�ȷ�Ϻ��ٽ��в���</div></div>

<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�ύ����")?></div>
</div>
</form>
<? }?>

<script type="text/javascript">
var ue= UE.getEditor('editor',{toolbars:[[ 'source', '|', 'forecolor','fontsize', '|','link', 'unlink','simpleupload']]});
</script>

</body>
</html>