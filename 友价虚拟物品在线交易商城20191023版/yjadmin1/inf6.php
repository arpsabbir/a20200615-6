<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
while0("*","yjcode_control");$row=mysql_fetch_array($res);

if(sqlzhuru($_POST[jvs])=="control"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","yjcode_control")==0){intotable("yjcode_control","webnamev","'����ʧ��'");}
 updatetable("yjcode_control","
			  websyposv=".sqlzhuru($_POST[d1]).",
			  picys=".sqlzhuru($_POST[Rpicys])."
			  ");
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../img/logo.png");
 move_uploaded_file($_FILES["inp2"]['tmp_name'], "../img/shuiyin.png");
 move_uploaded_file($_FILES["inp4"]['tmp_name'], "../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");
 move_uploaded_file($_FILES["inp3"]['tmp_name'], "../m/img/logo.png");
 move_uploaded_file($_FILES["inp5"]['tmp_name'], "../img/none60x60.gif");
 move_uploaded_file($_FILES["inp6"]['tmp_name'], "../img/none180x180.gif");
 move_uploaded_file($_FILES["inp7"]['tmp_name'], "../img/none200x200.gif");
 move_uploaded_file($_FILES["inp8"]['tmp_name'], "../img/none300x300.gif");
 move_uploaded_file($_FILES["inp9"]['tmp_name'], "../img/none200x160.gif");
 move_uploaded_file($_FILES["inp10"]['tmp_name'], "../user/img/logo.png");
 move_uploaded_file($_FILES["inp11"]['tmp_name'], "../img/favicon.ico");
 move_uploaded_file($_FILES["inp12"]['tmp_name'], "img/logo.png");
 move_uploaded_file($_FILES["inp13"]['tmp_name'], "../m/tem/moban/".$rowcontrol[wapmb]."/homeimg/logo.png");
 move_uploaded_file($_FILES["inp14"]['tmp_name'], "../img/none100x75.gif");
 php_toheader("inf6.php?t=suc");

}elseif($_GET[control]=="del"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 delFile("../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png");
 php_toheader("inf6.php?t=suc");

}elseif($_GET[control]=="del1"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 delFile("../m/tem/moban/".$rowcontrol[wapmb]."/homeimg/logo.png");
 php_toheader("inf6.php?t=suc");

}

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
<script language="javascript">
function tj(){
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
f1.action="inf6.php?fh="+str;
}
function deltemlogo(){
if(confirm("ȷ��Ҫɾ��ģ��LOGO��")){location.href="inf6.php?control=del";}else{return false;}
}
function deltemlogo1(){
if(confirm("ȷ��Ҫɾ���ֻ�ģ��LOGO��")){location.href="inf6.php?control=del1";}else{return false;}
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
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","inf6.php");}?>
 <? include("rightcap1.php");?>
 <script language="javascript">document.getElementById("rtit7").className="a1";</script>
 
 <!--Begin-->
 <div class="rkuang">
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" name="jvs" value="control" />
 <ul class="uk">
 <li class="l1">��վLOGO��</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/logo.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">ģ��LOGO��</li>
 <li class="l2"><input type="file" name="inp4" id="inp4" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">�������գ�������գ��������վLOGO</span></li>
 <? if(is_file("../tem/moban/".$rowcontrol[nowmb]."/homeimg/logo.png")){?>
 <li class="l8"></li>
 <li class="l9"><img src="../tem/moban/<?=$rowcontrol[nowmb]?>/homeimg/logo.png?t=<?=rnd_num(100)?>" height="40" /><br>[<a href="javascript:void(0);" onclick="deltemlogo()">ɾ��</a>]</li>
 <? }?>
 
 <li class="l1">�ֻ���LOGO��</li>
 <li class="l2"><input type="file" name="inp3" id="inp3" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <? $t="../m/img/logo.png";if(is_file($t)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$t?>?t=<?=rnd_num(100)?>" height="54" /></li>
 <? }?>
 <li class="l1">�ֻ�ģ��LOGO��</li>
 <li class="l2"><input type="file" name="inp13" id="inp13" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">�������գ�������գ�������ֻ���LOGO</span></li>
 <? if(is_file("../m/tem/moban/".$rowcontrol[wapmb]."/homeimg/logo.png")){?>
 <li class="l8"></li>
 <li class="l9"><img src="../m/tem/moban/<?=$rowcontrol[wapmb]?>/homeimg/logo.png?t=<?=rnd_num(100)?>" height="40" /><br>[<a href="javascript:void(0);" onclick="deltemlogo1()">ɾ��</a>]</li>
 <? }?>
 
 <li class="l1">��Ա����LOGO��</li>
 <li class="l2"><input type="file" name="inp10" id="inp10" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <? $t="../user/img/logo.png";if(is_file($t)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$t?>?t=<?=rnd_num(100)?>" height="54" /></li>
 <? }?>
 
 <li class="l1">ICOͼ�꣺</li>
 <li class="l2"><input type="file" name="inp11" id="inp11" class="inp1" size="15" accept=".ico"><span class="fd">������icoͼ�꣬�ߴ�Ϊ32*32</span></li>
 <? $t="../img/favicon.ico";if(is_file($t)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$t?>?t=<?=rnd_num(100)?>" height="54" /></li>
 <? }?>
 
 <li class="l1">�����̨LOGO��</li>
 <li class="l2"><input type="file" name="inp12" id="inp12" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">�ߴ�Ϊ260*70</span></li>
 <? $t="img/logo.png";if(is_file($t)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$t?>?t=<?=rnd_num(100)?>" height="54" /></li>
 <? }?>
 
 <li class="l1">ˮӡλ�ã�</li>
 <li class="l2">
 <select name="d1" class="inp">
 <?
 $syarr=array("","���˾���","���˾���","���˾���","�в�����","�в�����","�в�����","�׶˾���","�׶˾���","�׶˾���");
 for($i=1;$i<=9;$i++){
 ?>
 <option value="<?=$i?>" <? if($row[websyposv]==$i){?> selected="selected"<? }?>><?=$syarr[$i]?></option>
 <?
 }
 ?>
 </select>
 </li>
 <li class="l1">��վˮӡ��</li>
 <li class="l2"><input type="file" name="inp2" id="inp2" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/shuiyin.png?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">ͼƬѹ��ģʽ��</li>
 <li class="l2">
 <label><input name="Rpicys" type="radio" value="1" <? if(1==$row[picys]){?> checked="checked"<? }?> /> ������ü�(���пհף���ͼƬ����)</label>
 <label><input name="Rpicys" type="radio" value="0" <? if(empty($row[picys])){?> checked="checked"<? }?> /> ����ü�(�޿հף���ͼƬ���ܱ��ü�)</label>
 </li>
 <li class="l1">60x60Ĭ��ͼ��</li>
 <li class="l2"><input type="file" name="inp5" id="inp5" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/none60x60.gif?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">180x180Ĭ��ͼ��</li>
 <li class="l2"><input type="file" name="inp6" id="inp6" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/none180x180.gif?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">200x160Ĭ��ͼ��</li>
 <li class="l2"><input type="file" name="inp9" id="inp9" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/none200x160.gif?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">200x200Ĭ��ͼ��</li>
 <li class="l2"><input type="file" name="inp7" id="inp7" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/none200x200.gif?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">300x300Ĭ��ͼ��</li>
 <li class="l2"><input type="file" name="inp8" id="inp8" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/none300x300.gif?t=<?=rnd_num(100)?>" height="54" /></li>
 <li class="l1">100x75Ĭ��ͼ��</li>
 <li class="l2"><input type="file" name="inp14" id="inp14" class="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"></li>
 <li class="l8"></li>
 <li class="l9"><img src="../img/none100x75.gif?t=<?=rnd_num(100)?>" height="54" /></li>
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