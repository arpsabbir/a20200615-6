<?
include("../config/conn.php");
include("../config/function.php");
require("../config/tpclass.php");
sesCheck();

$sj=date("Y-m-d H:i:s");
$bh=returndeldian($_GET[bh]);
$userid=returnuserid($_SESSION[SHOPUSER]);
while0("*","yjcode_pro where userid=".$userid." and bh='".$bh."'");if(!$row=mysql_fetch_array($res)){php_toheader("productlist.php");}
$tit=$row[tit];
$id=$_GET[id];

while0("*","yjcode_taocan where userid=".$userid." and id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("taocanlist.php?bh=".$bh);}
 
//������ʼ
if($_GET[control]=="update"){
 zwzr();
 if(panduan("*","yjcode_taocan where userid=".$userid." and probh='".$bh."' and admin is null and tit='".sqlzhuru($_POST[t1])."' and id<>".$id)==1){Audit_alert("���ײ������Ѵ��ڣ�","taocan.php?id=".$_GET[id]."&bh=".$bh);}
 
 $kcnum=sqlzhuru($_POST[tkcnum]);if(!is_numeric($kcnum)){$kcnum=0;}
 $fhxs=intval(sqlzhuru($_POST[Rfhxs]));
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."',
                              xh=".sqlzhuru($_POST[t2]).",
							  money1=".sqlzhuru($_POST[tmoney1]).",
							  money2=".sqlzhuru($_POST[tmoney2]).",
							  zt=0,
			                  fhxs=".$fhxs.",
			                  wpurl='".sqlzhuru($_POST[twpurl])."',
			                  wppwd='".sqlzhuru($_POST[twppwd])."',
			                  wppwd1='".sqlzhuru($_POST[twppwd1])."',
							  kcnum=".$kcnum."
							  where id=".$id);
							  
 updatetable("yjcode_taocan","tit='".sqlzhuru($_POST[t1])."' where tit='".sqlzhuru($_POST[oldty1])."' and probh='".$bh."'");
 
 uploadtpnodata(2,"upload/".$row[userid]."/".$row[probh]."/","tc".$id.".png","allpic",350,350,34,34,"no");
 //�ϴ�B
 if(3==$fhxs){
  $up1=$_FILES["inp1"]["name"];
  if(!empty($up1)){
  $mc=MakePassAll(15)."-".time()."-".$userid.".".returnhz($up1);
  $lj="../upload/".$userid."/".$bh."/";
  move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
  delFile($lj.$row[upf]);
  updatetable("yjcode_taocan","upf='".$mc."' where id=".$id." and userid=".$userid);
  }
 }
 //�ϴ�E
 //����B
 if(4==$fhxs){
 $c=str_replace("\r","",($_POST[s1]));
 $d=preg_split("/\n/",$c);
 for($i=0;$i<=count($d);$i++){
  if(!empty($d[$i])){
   $e=preg_split("/\s/",$d[$i]);
     if(panduan("probh,tcid,userid,ka","yjcode_taocan_kc where probh='".$bh."' and ka='".$ka."' and tcid=".$id." and userid=".$userid)==0){
     $mi="";
	 if(count($e)>=2){for($ei=1;$ei<count($e);$ei++){$mi=$mi." ".$e[$ei];}}
	 intotable("yjcode_taocan_kc","probh,tcid,userid,ka,mi,ifok","'".$bh."',".$id.",".$userid.",'".$e[0]."','".$mi."',0");
	 }
  }
 }
 kamikc_tc($bh,$id);
 }
 //����E
 
 php_toheader("taocan.php?id=".$id."&bh=".$bh);

}elseif($_GET[control]=="del"){
 zwzr();
 delFile("../upload/".$row[userid]."/".$row[probh]."/tc".$row[id].".png");
 php_toheader("taocan.php?id=".$id."&bh=".$bh);

}
//�������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
<script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace(/\s/,"")==""){alert("�������ײ�˵����");document.f1.t1.focus();return false;}
 if((document.f1.tmoney2.value).replace(/\s/,"")==""){alert("������ԭ�ۣ�");document.f1.tmoney2.focus();return false;}
 if((document.f1.tmoney1.value).replace(/\s/,"")==""){alert("�������Żݼۣ�");document.f1.tmoney1.focus();return false;}
 if((document.f1.t2.value).replace(/\s/,"")=="" || isNaN(document.f1.t2.value)){alert("��������Ч������ţ�");document.f1.t2.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 tjwait();
 f1.action="taocan.php?control=update&id=<?=$row[id]?>&bh=<?=$bh?>";
 }
 function fhxsonc(x){
 for(i=0;i<=4;i++){
 d=document.getElementById("fhxs"+i);if(d){d.style.display="none";}
 }
 d=document.getElementById("fhxs"+x);if(d){d.style.display="";}
 if(x==4){document.getElementById("kcuk").style.display="none";}else{document.getElementById("kcuk").style.display="";}
 }
function deltp(){
 if(confirm("ȷ��Ҫɾ����ͼ����")){location.href="taocan.php?id=<?=$id?>&bh=<?=$bh?>&control=del";}else{return false;}
}
</script>
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("protop.php");?>
 <? include("rcap3.php");?>
 <script language="javascript">
 document.getElementById("rcap3").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="<?=$row[tit]?>" name="oldty1" />
 <ul class="uk">
 <li class="l1">��Ӧ��Ʒ��</li>
 <li class="l2"><input type="text" class="inp redony" value="<?=$tit?>" size="80" /></li>
 <li class="l1">�ײ�˵����</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$row[tit]?>" /></li>
 <li class="l1">�ײ�ͼ�꣺</li>
 <li class="l2"><span class="finp"><input type="file" class="inp1" name="inp2" id="inp2" size="15" accept=".jpg,.gif,.jpeg,.png"> �Ƽ��ߴ磺350*350,���ϴ�����ʾ������ʽ</span></li>
 <? $ntp="../upload/".$row[userid]."/".$row[probh]."/tc".$row[id].".png";if(is_file($ntp)){?>
 <li class="l5"></li>
 <li class="l6"><img src="<?=$ntp?>" width="55" height="55" /><br><br>[<a href="javascript:void(0);" onclick="deltp()">ɾ��</a>]</li>
 <? }?>
 <li class="l1">ԭ�ۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney2" value="<?=$row[money2]?>" /> Ԫ</li>
 <li class="l1">�Żݼۣ�</li>
 <li class="l2"><input type="text" class="inp" name="tmoney1" value="<?=$row[money1]?>" /> Ԫ</li>
 <li class="l1">����</li>
 <li class="l2"><input type="text" class="inp" name="t2" value="<?=$row[xh]?>" /> <span class="fd">���ԽС��Խ��ǰ</span></li>
 </ul>
 
 <ul class="uk uk0" id="kcuk">
 <li class="l1"><span class="red">*</span> �������</li>
 <li class="l2"><input class="inp" name="tkcnum" value="<?=returnjgdw($row[kcnum],"",0)?>" size="10" type="text"/> <span class="fd">(����ǵ㿨�����࣬���ֵ������д�����Զ���ȡ)</span></li>
 </ul>
 <ul class="uk uk0">
 <li class="l1 red"><span class="red">*</span> ������ʽ��</li>
 <li class="l2">
 <label><input name="Rfhxs" type="radio" value="0" onclick="fhxsonc(0)" <? if(0==$row[fhxs]){?>checked="checked"<? }?> /> ����һ��</label>
 <? if(strstr($rowcontrol[fhxs],"1") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="1" onclick="fhxsonc(1)" <? if(1==$row[fhxs]){?>checked="checked"<? }?> /> �ֶ�����</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"2") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="2" onclick="fhxsonc(2)" <? if(2==$row[fhxs]){?>checked="checked"<? }?> /> ��������</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"3") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="3" onclick="fhxsonc(3)" <? if(3==$row[fhxs]){?>checked="checked"<? }?> /> ��վ����</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"4") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="4" onclick="fhxsonc(4)" <? if(4==$row[fhxs]){?>checked="checked"<? }?> /> �㿨����</label>
 <? }?>
 <? if(strstr($rowcontrol[fhxs],"5") || empty($rowcontrol[fhxs])){?>
 <label><input name="Rfhxs" type="radio" value="5" onclick="fhxsonc(5)" <? if(5==$row[fhxs]){?>checked="checked"<? }?> /> ʵ����</label>
 <? }?>
 </li>
 </ul> 
 <ul class="uk uk0" id="fhxs2" style="display:none;">
 <li class="l1">���̵�ַ��</li>
 <li class="l2"><input class="inp" name="twpurl" value="<?=$row[wpurl]?>" size="80" type="text"/></li>
 <li class="l1">�������룺</li>
 <li class="l2"><input class="inp" name="twppwd" value="<?=$row[wppwd]?>" size="20" type="text"/></li>
 <li class="l1">��ѹ���룺</li>
 <li class="l2"><input class="inp" name="twppwd1" value="<?=$row[wppwd1]?>" size="20" type="text"/></li>
 </ul>
 <ul class="uk uk0" id="fhxs3" style="display:none;">
 <li class="l1">�ϴ��ļ���</li>
 <li class="l2"><input type="file" name="inp1" id="inp1" size="25"></li>
 <? if(!empty($row[upf])){?>
 <li class="l1">�ļ�Ԥ����</li>
 <li class="l21">��<a href="../upload/<?=$row[userid]?>/<?=$row[bh]?>/<?=$row[upf]?>" class="blue" target="_blank">���Ԥ��</a>��</li>
 <? }?>
 </ul>
 <ul class="uk uk0" id="fhxs4" style="display:none;">
 <li class="l1">��棺</li>
 <li class="l21"><strong class="red"><?=$row[kcnum]?>��</strong> [<a href="kclist_tc.php?bh=<?=$bh?>&tcid=<?=$row[id]?>" class="blue">������</a>]</li>
 <li class="l1">˵����</li>
 <li class="l21 red">�����ʽΪ����+�ո�+����(�ɸ��ϸ�������)��һ��һ�飬��AAAAA BBBBB</li>
 <li class="l9">�������ݣ�</li>
 <li class="l10"><textarea name="s1"></textarea></li>
 </ul>

 <ul class="uk uk0">
 <li class="l3"><? tjbtnr("�����޸�","taocanlist.php?bh=".$bh);?></li>
 </ul>
 </form>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<script language="javascript">
fhxsonc(<?=$row[fhxs]?>);
</script>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>