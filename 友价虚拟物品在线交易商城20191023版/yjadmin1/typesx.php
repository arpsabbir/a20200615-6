<?php
include("../config/conn.php");
include("../config/function.php");
AdminSes_audit();
$typeid=$_GET[typeid];if(empty($typeid)){php_toheader("default.php");}
$sj=date("Y-m-d H:i:s");

//������ʼ
if($_GET[control]=="add"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 if(panduan("*","yjcode_typesx where admin=1 and name1='".sqlzhuru($_POST[t1])."' and typeid=".$typeid)==1){Audit_alert("�ø���ѡ���Ѵ��ڣ�","typesx.php?typeid=".$typeid);}
 intotable("yjcode_typesx","typeid,name1,sj,xh,admin,ifjd,ifzi,ifsel","".$typeid.",'".sqlzhuru($_POST[t1])."','".$sj."',".sqlzhuru($_POST[t2]).",1,".sqlzhuru($_POST[Rifjd]).",".sqlzhuru($_POST[Rifzi]).",".sqlzhuru($_POST[Rifsel])."");
 $id=mysql_insert_id();
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../tem/moban/".$rowcontrol[nowmb]."/homeimg/typesx1_".$id.".png");
 php_toheader("typesx.php?t=suc&typeid=".$typeid);
 
}elseif($_GET[control]=="update"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $id=intval($_GET[id]);
 if(panduan("*","yjcode_typesx where admin=1 and name1='".sqlzhuru($_POST[t1])."' and id<>".$id." and typeid=".$typeid)==1){Audit_alert("�ø���ѡ���Ѵ��ڣ�","typesx.php?action=update&id=".$id."&typeid=".$typeid);}
 updatetable("yjcode_typesx","name1='".sqlzhuru($_POST[t1])."' where name1='".sqlzhuru($_POST[oldty1])."' and typeid=".$typeid);
 updatetable("yjcode_typesx","sj='".$sj."',xh=".sqlzhuru($_POST[t2]).",ifjd=".sqlzhuru($_POST[Rifjd]).",ifzi=".sqlzhuru($_POST[Rifzi]).",ifsel=".sqlzhuru($_POST[Rifsel])." where id=".$_GET[id]);
 move_uploaded_file($_FILES["inp1"]['tmp_name'], "../tem/moban/".$rowcontrol[nowmb]."/homeimg/typesx1_".$id.".png");
 php_toheader("typesx.php?t=suc&action=update&id=".$id."&typeid=".$typeid);

}elseif($_GET[control]=="del"){
 if(!strstr($adminqx,",0,") && !strstr($adminqx,",0301,")){Audit_alert("Ȩ�޲���","default.php");}
 zwzr();
 $id=intval($_GET[id]);
 delFile($_GET[tp]);
 php_toheader("typesx.php?action=update&id=".$id."&typeid=".$typeid);

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
 
 <? if($_GET[t]=="suc"){systs("��ϲ���������ɹ���","typesx.php?action=".$_GET[action]."&id=".$_GET[id]."&typeid=".$_GET[typeid]);}?>
 <div class="bqu1">
 <a href="javascript:void(0);" class="a1"><?=returntype(1,$typeid)?>����ѡ��</a>
 <a href="typesxlist.php?typeid=<?=$typeid?>">�����б�</a>
 </div> 
 
 <!--begin-->
 <div class="rkuang">
 <? if($_GET[action]!="update"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("������ѡ�����ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="typesx.php?control=add&typeid=<?=$typeid?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <ul class="uk">
 <li class="l1">����ѡ�</li>
 <li class="l2"><input type="text" class="inp" name="t1" /></li>
 <li class="l1">������ʾ��</li>
 <li class="l2">
 <label><input name="Rifjd" type="radio" value="0" /> ��ͨ</label>
 <label><input name="Rifjd" type="radio" checked="checked" value="1" /> ������ʾ������������ʾ������ҳ���㲿�֣�</label>
 </li>
 <li class="l1">�ֶ���д��</li>
 <li class="l2">
 <label><input name="Rifzi" type="radio" checked="checked" value="0" /> ��֧��</label>
 <label><input name="Rifzi" type="radio" value="1" /> ֧��</label>
 </li>
 <li class="l1">ɸѡ������</li>
 <li class="l2">
 <label><input name="Rifsel" type="radio" value="0" /> ��</label>
 <label><input name="Rifsel" type="radio" checked="checked" value="1" /> �ǣ�����������Ϊɸѡ������ʾ����Ʒ�б�ҳ��</label>
 </li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=returnxh("yjcode_typesx"," and admin=1 and typeid=".$typeid)?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">ͼ�꣺</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">����ʵ������ϴ�(ÿ��ģ�嶼�Ƕ�����)</span></li>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? 
 }elseif($_GET[action]=="update"){
 $id=intval($_GET[id]);
 while0("*","yjcode_typesx where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("typesxlist.php?typeid=".$typeid);}
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("���������ƣ�");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 f1.action="typesx.php?control=update&id=<?=$row[id]?>&typeid=<?=$typeid?>";
 }
 function deltp(x){
  if(confirm("ȷ��Ҫɾ����ͼ����")){location.href="typesx.php?id=<?=$id?>&typeid=<?=$typeid?>&control=del&tp="+x;}else{return false;}
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[name1]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">����ѡ�</li>
 <li class="l2"><input type="text" value="<?=$row[name1]?>" class="inp" name="t1" /></li>
 <li class="l1">������ʾ��</li>
 <li class="l2">
 <label><input name="Rifjd" type="radio"<? if(empty($row[ifjd])){?> checked="checked"<? }?> value="0" /> ��ͨ</label>
 <label><input name="Rifjd" type="radio"<? if(!empty($row[ifjd])){?> checked="checked"<? }?> value="1" /> ������ʾ������������ʾ������ҳ���㲿�֣�</label>
 </li>
 <li class="l1">�ֶ���д��</li>
 <li class="l2">
 <label><input name="Rifzi" type="radio"<? if(empty($row[ifzi])){?> checked="checked"<? }?> value="0" /> ��֧��</label>
 <label><input name="Rifzi" type="radio"<? if(!empty($row[ifzi])){?> checked="checked"<? }?> value="1" /> ֧��</label>
 </li>
 <li class="l1">ɸѡ������</li>
 <li class="l2">
 <label><input name="Rifsel" type="radio"<? if(empty($row[ifsel])){?> checked="checked"<? }?> value="0" /> ��</label>
 <label><input name="Rifsel" type="radio"<? if(!empty($row[ifsel])){?> checked="checked"<? }?> value="1" /> �ǣ�����������Ϊɸѡ������ʾ����Ʒ�б�ҳ��</label>
 </li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 <li class="l1">ͼ�꣺</li>
 <li class="l2"><input type="file" class="inp1" name="inp1" id="inp1" size="15" accept=".jpg,.gif,.jpeg,.png"><span class="fd">����ʵ������ϴ�(ÿ��ģ�嶼�Ƕ�����)</span></li>
 <? $ntp="../tem/moban/".$rowcontrol[nowmb]."/homeimg/typesx1_".$row[id].".png";if(is_file($ntp)){?>
 <li class="l8"></li>
 <li class="l9"><img src="<?=$ntp?>" style="max-height:55px;" /> [<a href="javascript:void(0);" onclick="deltp('<?=$ntp?>')">ɾ��</a>]</li>
 <? }?>
 <li class="l3"><input type="submit" value="�����޸�" class="btn1" /></li>
 </ul>
 </form>
 
 <? }?>
 </div>
 <!--end-->
 
</div>
</div>
<?php include("bottom.php");?>
</body>
</html>