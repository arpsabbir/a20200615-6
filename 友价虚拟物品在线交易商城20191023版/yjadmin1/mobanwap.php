<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if($_GET[control]=="update"){
 $mb=str_replace(".","",sqlzhuru($_GET[mb]));
 $mb=str_replace("/","",$mb);
 if(!preg_match("/^[_a-zA-Z0-9]*$/",$mb)){php_toheader("mobanwap.php");}
 updatetable("yjcode_control","wapmb='".$mb."'");
 php_toheader("tohtml.php?admin=0&action=gx");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.right .mblist{float:left;width:100%;margin:10px 0 0 0;}
.right .mblist .d1{float:left;width:120px;padding:10px;height:160px;margin:10px 5px 0 0;text-align:center;line-height:18px;}
.right .mblist .d1 .s1{float:left;position:absolute;background-color:#ff0000;color:#fff;padding:5px 0 0 0;text-align:center;width:120px;height:17px;line-height:normal;}
.right .mblist .d1 img{margin:0 0 5px 0;}
.right .mblist .d11{background-color:#e1e1e1;}
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function mbcha(x){
 if(confirm("�Ƿ�����"+x+"ģ��")){location.href="mobanwap.php?control=update&mb="+x;}else{return false;}
}
</script>
</head>
<body>
<? include("top.php");?>
<script language="javascript">
document.getElementById("menu1").className="a1";
</script>

<div class="yjcode">
 <? $leftid=1;include("menu_quan.php");?>

<div class="right">
 
 <? include("rightcap5.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 
 <!--Begin-->
 <div class="rights">
 ��ܰ��ʾ��<br>
 1��������վĿǰ��������<strong class="red" id="mbnum">...</strong>���ֻ���ģ�壬����ģ�������<a href="http://www.yj99.cn" target="_blank" class="blue">�Ѽ۹���</a>��ȡ<br>
 2�����ģ��ͼƬ���Բ鿴ȫͼ����Ϊ�˽�ʡ���Ĵ���Ч��ͼ���ø�ѹ��ģʽ�������ú�������վ�Ǹ���Ч��<br>
 </div>
 <div class="mblist">
 <? $i=0;foreach(getDir("../m/tem/moban/") as $color){if(is_file("../m/tem/moban/".$color."/homeimg/moban_small.jpg")){?>
  <div class="d1" onmouseover="this.className='d1 d11';" onmouseout="this.className='d1';"><? if($rowcontrol[wapmb]==$color){?><span class="s1">��ǰģ��</span><? }?><a href="../m/tem/moban/<?=$color?>/homeimg/moban_big.jpg" target="_blank"><img border="0" src="../m/tem/moban/<?=$color?>/homeimg/moban_small.jpg" width="120" height="120" /></a><br><?=$color?><br><a href="javascript:void(0);" onclick="mbcha('<?=$color?>')">�������</a></div>
 <? $i++;}}?>
 </div>
 <script language="javascript">
 document.getElementById("mbnum").innerHTML=<?=$i?>;
 </script>
 <!--End-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>