<?
include("../../config/conn.php");
include("../../config/function.php");
$a=intval($_GET[admin]);
if($a==1){
$str="�����޸ĳɹ������μ�����������";
$errdis="okts";
$bkurl="../user/";

}elseif($a==2){
$str="֧�������޸ĳɹ������μ�";
$errdis="okts";
$bkurl="../user/";

}elseif($a==3){
$str="���������޸ĳɹ�";
$errdis="okts";
$bkurl="../user/inf.php";

}elseif($a==4){
$str="��ϲ������Ʒ����ɹ�";
$errdis="okts";
$bkurl="../user/order.php";

}elseif($a==5){
$str="�˺Ż��������󣬷�������";
$errdis="errts";
$bkurl=$_GET[b];

}elseif($a==6){
if(intval($_GET[lx]=="1")){$str="����Ͷ����Ϣ�ѷ��ͣ��ȴ�����ѡ��";}
elseif(intval($_GET[lx]=="2")){$str="���ѽӵ��ɹ�<br>����������һ����ʱ�ύ����";}
$errdis="okts";
$bkurl="../task/view".$_GET["id"].".html";

}elseif($a==999){
$str="�����ɹ�";
$errdis="okts";
$bkurl=$_GET[b];

}
?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no" />
<meta http-equiv="refresh" content="5;url=<?=$bkurl?>">  
<title>������ʾ - �ֻ���<?=webname?></title>
<? include("../tem/cssjs.html");?>
<style type="text/css">
body{background-color:#EBEBEB;}
</style>
</head>
<body>
<!--��ҳͷ��B-->
<div class="ntop">������ʾ</div>
<!--��ҳͷ��E-->

<div class="<?=$errdis?> box"><div class="dts"><strong><?=$str?></strong><br><a href="<?=$bkurl?>">5���ϵͳ���Զ���ת��Ҳ�ɵ���˴�ֱ����ת</a></div></div>

<? include("../tem/moban/".$rowcontrol[wapmb]."/tem/bottom.php");?>
</body>
</html>