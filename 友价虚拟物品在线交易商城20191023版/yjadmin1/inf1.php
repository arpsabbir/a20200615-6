<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();

if($_POST[jvs]=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("code_control","webnamev","'����ʧ��'");}
 $regmob=sqlzhuru($_POST[Rregmob]);
 updatetable("yjcode_control","
			  ifsell='".sqlzhuru($_POST[Rifsell])."',
			  openshop=".intval($_POST[topenshop]).",
			  openbao=".intval($_POST[topenbao]).",
			  ifproduct='".sqlzhuru($_POST[Rifproduct])."',
			  ifkf='".sqlzhuru($_POST[Rifkf])."',
			  taskok=".sqlzhuru($_POST[Rtaskok]).",
			  shoprz='".$_GET[shoprz]."',
			  ifuc=".$_POST[Rifuc].",
			  ifwap=".$_POST[Rifwap].",
			  iftask=".$_POST[Riftask].",
			  regmob=".$regmob.",
			  taskjs='".$_GET[taskjs]."',
			  ifshell=".intval($_POST[Rifshell]).",
			  fenxiang=".intval($_POST[Rfenxiang]).",
			  qzmot=".intval($_POST[Rqzmot]).",
			  ipzcnum=".intval($_POST[tipzcnum]).",
			  ipnewsnum=".intval($_POST[tipnewsnum]).",
			  ifopenshop='".sqlzhuru($_POST[Rifopenshop])."',
			  mrbuy=".intval($_POST[Rmrbuy])."
			  ");
			  
 deletetable("yjcode_openyue");
 $al=intval($_POST[yuenum]);
 for($i=1;$i<=$al;$i++){
 $yue=$_POST["yue_".$i];
 $money1=$_POST["money1_".$i];
 intotable("yjcode_openyue","yue,money1","".$yue.",".$money1."");
 }
  
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/anzhuo.apk");
 php_toheader("inf1.php?t=suc");

}

while0("*","yjcode_control");$row=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=webname?>����ϵͳ</title>
<link href="css/basic.css" rel="stylesheet" type="text/css" />
<link href="css/quanju.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/basic.js"></script>
<script language="javascript" src="js/layer.js"></script>
<script language="javascript">
function tj(){
c=document.getElementsByName("C1");str="xcf";for(i=0;i<c.length;i++){if(c[i].checked){str=str+c[i].value+"xcf";}}
c=document.getElementsByName("C2");str1="xcf";for(i=0;i<c.length;i++){if(c[i].checked){str1=str1+c[i].value+"xcf";}}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf1.php?shoprz="+str+"&taskjs="+str1;
}
function shoprzonc(x){
if(x=="on"){document.getElementById("shoprz1").style.display="none";}
else if(x=="off"){document.getElementById("shoprz1").style.display="";}
}
function yueadd2(){
a=parseInt(document.f1.yuenum.value);
document.f1.yuenum.value=a+5;
str=document.getElementById("yue2").innerHTML;
for(i=1;i<=5;i++){
b=a+i;
str=str+"<ul class=\"yue\"><li class=\"l1\"><input type=\"text\" name=\"yue_"+b+"\" /></li><li class=\"l2\"><input type=\"text\" name=\"money1_"+b+"\" /></li></ul>";
}
document.getElementById("yue2").innerHTML=str;
}
</script>
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
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf1.php");}?>
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit2").className="a1";</script>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="l1">���ҿ���Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="Rifsell" onclick="shoprzonc('off')" type="radio" value="off" <? if($row[ifsell]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rifsell" onclick="shoprzonc('on')" type="radio" value="on" <? if($row[ifsell]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 <span class="fd">������ò���Ҫ��ˣ�ϵͳ���������һ��Ŀ���ʱ��</span>
 </li>
 </ul>
 
 <div id="shoprz1" style="display:none;">
 <ul class="uk">
 <li class="l1">������˷ѣ�</li>
 <li class="l2"><input type="text" class="inp" name="topenshop" size="10" value="<?=$row[openshop]?>" /></li>
 <li class="l1">���걣֤��</li>
 <li class="l2"><input type="text" class="inp" name="topenbao" size="10" value="<?=$row[openbao]?>" /></li>
 <li class="l1">������֤��</li>
 <li class="l2">
 <label><input name="C1" type="checkbox" value="1" <? if(strstr($row[shoprz],"xcf1xcf")){?> checked="checked"<? }?> /> ��Ҫͨ���ֻ���֤</label>
 <label><input name="C1" type="checkbox" value="2" <? if(strstr($row[shoprz],"xcf2xcf")){?> checked="checked"<? }?> /> ��Ҫͨ��������֤</label>
 <label><input name="C1" type="checkbox" value="3" <? if(strstr($row[shoprz],"xcf3xcf")){?> checked="checked"<? }?> /> ��Ҫͨ������ʵ����֤</label>
 </li>
 </ul>
 <ul class="openyf">
 <li class="l1">��������</li>
 <li class="l2">�������</li>
 </ul>
 <? $j=1;while1("*","yjcode_openyue order by yue asc");while($row1=mysql_fetch_array($res1)){?>
 <ul class="yue">
 <li class="l1"><input type="text" name="yue_<?=$j?>" value="<?=$row1[yue]?>" /></li>
 <li class="l2"><input type="text" name="money1_<?=$j?>" value="<?=$row1[money1]?>" /></li>
 </ul>
 <? $j++;}?>
 <? for($i=1;$i<=2;$i++){?>
 <ul class="yue">
 <li class="l1"><input type="text" name="yue_<?=$j?>" /></li>
 <li class="l2"><input type="text" name="money1_<?=$j?>" /></li>
 </ul>
 <? $j++;}?>
 <div id="yue2"></div>
 <ul class="uk uk0"><li class="l1"></li><li class="l21"><a href="javascript:void(0);" onclick="yueadd2()">���������С�</a></li></ul>
 <input type="hidden" value="<?=$j?>" name="yuenum" />
 </div>

 
 <ul class="uk uk0">
 <li class="l1">��ƷչʾȨ�ޣ�</li>
 <li class="l2">
 <label><input name="Rifproduct" type="radio" value="off" <? if($row[ifproduct]=="off"){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rifproduct" type="radio" value="on" <? if($row[ifproduct]=="on"){?> checked="checked"<? }?> /> ����Ҫ���</label>
 </li>
 <li class="l1">ע�������֤��</li>
 <li class="l2">
 <label><input name="Rregmob" type="radio" value="1" <? if(1==$row[regmob]){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rregmob" type="radio" value="0" <? if(0==$row[regmob]){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">Ĭ�Ϲ���ʽ��</li>
 <li class="l2">
 <label><input name="Rmrbuy" type="radio" value="0" <? if(empty($row[mrbuy])){?> checked="checked"<? }?> /> �����˺ŵ�¼</label>
 <label><input name="Rmrbuy" type="radio" value="1" <? if($row[mrbuy]==1){?> checked="checked"<? }?> /> ���¼��ʽ</label>
 </li>
 <li class="l1">�Ҳ�ͷ���</li>
 <li class="l2">
 <label><input name="Rifkf" type="radio" value="on" <? if($row[ifkf]=="on"){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rifkf" type="radio" value="off" <? if($row[ifkf]=="off"){?> checked="checked"<? }?> /> ������</label>
 </li>
 <li class="l1">���������</li>
 <li class="l2">
 <label><input name="Riftask" type="radio" value="0" <? if(empty($row[iftask])){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Riftask" type="radio" value="1" <? if($row[iftask]==1){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">�������Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="Rtaskok" type="radio" value="0" <? if(empty($row[taskok])){?> checked="checked"<? }?> /> ��Ҫ���</label>
 <label><input name="Rtaskok" type="radio" value="1" <? if($row[taskok]==1){?> checked="checked"<? }?> /> �������</label>
 </li>
 <li class="l1">�������Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="C2" type="checkbox" value="1" <? if(strstr($row[taskjs],"xcf1xcf")){?> checked="checked"<? }?> /> ��Ҫͨ���ֻ���֤</label>
 <label><input name="C2" type="checkbox" value="2" <? if(strstr($row[taskjs],"xcf2xcf")){?> checked="checked"<? }?> /> ��Ҫͨ��������֤</label>
 <label><input name="C2" type="checkbox" value="3" <? if(strstr($row[taskjs],"xcf3xcf")){?> checked="checked"<? }?> /> ��Ҫͨ������ʵ����֤</label>
 <label><input name="C2" type="checkbox" value="4" <? if(strstr($row[taskjs],"xcf4xcf")){?> checked="checked"<? }?> /> ��Ҫ��������</label>
 </li>
 <li class="l1">�ֻ��棺</li>
 <li class="l2">
 <label><input name="Rifwap" type="radio" value="0" <? if(empty($row[ifwap])){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rifwap" type="radio" value="1" <? if($row[ifwap]==1){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">��׿APP��</li>
 <li class="l2"><input class="inp1" type="file" name="inp1" id="inp1" size="15" accept=".apk"></li>
 <? if(is_file("../img/anzhuo.apk")){?>
 <li class="l8"></li>
 <li class="l9"><a href="../img/anzhuo.apk" target="_blank"><img border="0" src="img/anzhuo.png" width="54" height="54" /></a></li>
 <? }?>
 <li class="l1">�Ƿ���UC��</li>
 <li class="l2">
 <label><input name="Rifuc" type="radio" value="0" <? if(empty($row[ifuc])){?> checked="checked"<? }?> /> ������</label>
 <label><input name="Rifuc" type="radio" value="1" <? if($row[ifuc]==1){?> checked="checked"<? }?> /> ���� (<a href="http://www.yj99.cn/faq/view41.html" target="_blank">�鿴�̳�</a>)</label>
 </li>
 <li class="l1">���ű�Ȩ�ޣ�</li>
 <li class="l2">
 <label><input name="Rifshell" type="radio" value="0" <? if(empty($row[ifshell])){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rifshell" type="radio" value="1" <? if($row[ifshell]==1){?> checked="checked"<? }?> /> �ر�</label>
 <span class="fd"><a href="http://www.yj99.cn/faq/view133.html" class="red" target="_blank">�鿴˵��</a></span>
 </li>
 <li class="l1">ҳ�����</li>
 <li class="l2">
 <label><input name="Rfenxiang" type="radio" value="0" <? if(empty($row[fenxiang])){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rfenxiang" type="radio" value="1" <? if($row[fenxiang]==1){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">ǿ���ֻ���֤��</li>
 <li class="l2">
 <label><input name="Rqzmot" type="radio" value="0" <? if(empty($row[qzmot])){?> checked="checked"<? }?> /> ��ǿ��</label>
 <label><input name="Rqzmot" type="radio" value="1" <? if($row[qzmot]==1){?> checked="checked"<? }?> /> ǿ��</label>
 <span class="fd"><a href="http://www.yj99.cn/faq/view149.html" class="red" target="_blank">�鿴˵��</a></span>
 </li>
 <li class="l1">�������ͨ����</li>
 <li class="l2">
 <label><input name="Rifopenshop" type="radio" value="on" <? if($row[ifopenshop]=="on"){?> checked="checked"<? }?> /> ����</label>
 <label><input name="Rifopenshop" type="radio" value="off" <? if($row[ifopenshop]=="off"){?> checked="checked"<? }?> /> �ر�</label>
 </li>
 <li class="l1">IPע�����ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="tipzcnum" size="10" value="<?=intval($row[ipzcnum])?>" /><span class="fd">ͬ��IP��ַ24Сʱ��ע���Ա������0��ʾ������</span></li>
 <li class="l1">IP�������ƣ�</li>
 <li class="l2"><input type="text" class="inp" name="tipnewsnum" size="10" value="<?=intval($row[ipnewsnum])?>" /><span class="fd">ͬ��IP��ַ24Сʱ�ڷ���������0��ʾ������</span></li>
 </ul>
 
 <ul class="uk uk0">
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 </div>
 <!--End-->
 
</div>
</div>

<script language="javascript">
shoprzonc("<?=$row[ifsell]?>");
</script>
<? include("bottom.php");?>
</body>
</html>