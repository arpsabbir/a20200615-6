<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if($_POST){
 //print_r($_POST);
 zwzr();

 updatetable("baidu","
			  urls='".sqlzhuru($_POST[urls])."',
			  token='".sqlzhuru($_POST[token])."'
			   where id = 0");
 updatetable("baidu","
			  urls='".sqlzhuru($_POST[urls1])."',
			  token='".sqlzhuru($_POST[token1])."'
			   where id = 1");
updatetable("baidu","
			  urls='".sqlzhuru($_POST[urls2])."',
			  token=''
			   where id = 2");
 //move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/logo.png");
 //move_uploaded_file($_FILES["inp2"]['tmp_name'], "../img/shuiyin.png");
 //move_uploaded_file($_FILES["inp4"]['tmp_name'], "../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");

}

while0("*","baidu");
//$row=mysql_fetch_array($res);
$rows = array();
while($row=mysql_fetch_array($res)){
	array_push($rows,$row);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
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
document.getElementById("menu1").className="a1";
</script>
<? if(!strstr($adminqx,",0,") && !strstr($adminqx,",0302,")){echo "<div class='noneqx'>��Ȩ��</div>";exit;}?>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit6").className="a1";</script>
 

 <!--Begin-->
 <div class="rkuang">
 <form method="post" action="inf11.php">
  <ul class="uk" style="width:100%;text-align:center;margin: 10px 0px 10px 380px;font-size: 16px;font-weight: bold;">
<li>�ٶ����ͽӿ�</li>
</ul>
 <ul class="uk">
 <li class="l1">�ӿ�SITE��</li>
 <li class="l2">
     <input type="text" class="inp" name="urls" size="30" value="<? echo $rows[0]['urls']; ?>" />
     <span class="fd red">��ȡ����:�ٶ�������Դƽ̨-->�����ύ-->�ӿڵ��õ�ַ-->��site=���������ַ</span>
 </li>
 <li class="l1">�ӿ�TOKEN��</li>
 <li class="l2">
 <input type="text" class="inp" name="token" value="<? echo $rows[0]['token']; ?>" size="30" />
 <span class="fd red">��ȡ����:�ٶ�������Դƽ̨-->�����ύ-->�ӿڵ��õ�ַ-->��token=��������ַ���</span>
 </li>

<ul class="uk" style="width:100%;text-align:center;margin: 10px 0px 10px 380px;font-size: 16px;font-weight: bold;">
<li>���ƺŽӿ�</li>
</ul>

 <ul class="uk">
 <li class="l1">�ӿ�APPID��</li>
 <li class="l2">
     <input type="text" class="inp" name="urls1" size="30" value="<? echo $rows[1]['urls']; ?>" />
     <span class="fd red">��ȡ����:�ٶ�������Դƽ̨-->վ����Դ����-->�켶��¼-->��appid=���������ַ</span>
 </li>
 <li class="l1">�ӿ�TOKEN��</li>
 <li class="l2">
 <input type="text" class="inp" name="token1" value="<? echo $rows[1]['token']; ?>" size="30" />
 <span class="fd red">��ȡ����:�ٶ�������Դƽ̨-->վ����Դ����-->�켶��¼-->��token=��������ַ���</span>
 </li>


 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<? include("bottom.php");?>
</body>
</html>