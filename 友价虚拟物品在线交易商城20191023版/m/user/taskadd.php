<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
if(panduan("*","yjcode_tasktype where admin=1")==0){Audit_alert("��������δ���ã���ϵ����Ա�����á�����Ա��̨-���-����������á���","./");}

if($_GET[control]=="add"){
 zwzr();
 if(empty($rowuser[uqq])){Audit_alert("���Ȳ���������ϵQQ��","taskadd.php");}
 $sj=date("Y-m-d H:i:s");
 $userid=$rowuser[id];
 $jgxs=intval($_POST[R1]);
 $money1=0;
 $money2=0;
 $jsbao=abs($_POST[tjsbao]);
 if(0==$jgxs){$money1=$_POST[tmoneyu0];}
 elseif(1==$jgxs){$money1=$_POST[tmoneyu1_1];$money2=$_POST[tmoneyu1_2];}
 $money1=abs($money1);
 $money2=abs($money2);
 $rwxs=intval($_POST[R5]);
 if($jgxs!=0){$rwxs=0;}
 if($rwxs==0){ //��������
 $renshu=1;
 }else{ //��������
 $renshu=abs($_POST[trwxsu1]);
 if(empty($renshu)){Audit_alert("��������Ϊ�գ�","taskadd.php");}
 if($money1 % $renshu!=0){Audit_alert("Ԥ��������������������޸ģ�","taskadd.php");}
 }
 $zq=intval($_POST[R2]);
 if($zq==-1){$zq=sqlzhuru($_POST[zqtext]);} 
 if(!is_numeric($zq)){$zq=0;}
 if(empty($zq)){Audit_alert("�������ڲ���Ϊ0��","taskadd.php");}
 $yxq=intval($_POST[R3]);
 if($yxq==-1){$yxq=sqlzhuru($_POST[yxqtext]);} 
 if(!is_numeric($yxq)){$yxq=0;}
 $endsj=date("Y-m-d H:i:s",strtotime("+".$yxq." day"));
 $bh=returnbh();
 if(empty($rowcontrol[taskok])){$zt=1;$zt1=105;}else{$zt=0;$zt1=100;}
 $ty=preg_split("/xcf/",sqlzhuru($_POST[d1]));
 $up1=$_FILES["inp1"]["name"];
 if(!empty($up1)){
 $mc=MakePassAll(2)."-".time()."-".$userid.".".returnhz($up1);
 $lj="../../upload/".$userid."/".$bh."/";
 createDir($lj);
 move_uploaded_file($_FILES["inp1"]['tmp_name'],$lj.$mc);
 }
 if(empty($rwxs)){$t="tasklist.php";$ztv=$zt;}else{$t="taskmoney.php?bh=".$bh;$ztv=$zt1;}
 intotable("yjcode_task","bh,userid,sj,lastsj,zt,tit,txt,type1id,type2id,jgxs,money1,money2,money3,money4,money5,djl,useridhf,rwzq,yxq,yjtx,qqxs,motxs,yjfs,fj,taskty,tasknum,taskcy,jsbao","'".$bh."',".$userid.",'".$sj."','".$sj."',".$ztv.",'".sqlzhuru($_POST[t1])."','".sqlzhuru1($_POST[content])."',".$ty[0].",".$ty[1].",".$jgxs.",".$money1.",".$money2.",0,0,0,0,0,".$zq.",'".$endsj."',".intval($_POST[C1]).",".intval($_POST[qqxsinp]).",".intval($_POST[motxsinp]).",".intval($_POST[R4]).",'".$mc."',".$rwxs.",".$renshu.",0,".$jsbao."");
 //PointIntoM($rowuser[id],"��������Ԥ������(������".$bh.")",$money4*(-1));
 //PointUpdateM($rowuser[id],$money4*(-1));
 php_toheader("../user/".$t);
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>

<script type="text/javascript" src="../../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../../config/ueditor/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript">
function tj(){
 if(document.f1.t1.value==""){layerts("���������");return false;}	
 if(moneyv!=0 && rwxsv==1){layerts("��������ֻ����һ�ڼ۷�ʽ");return false;}	
 if(parseInt(document.getElementById("zqtext").value)==0){layerts("�������ڲ���Ϊ0");return false;}
 layer.open({type: 2,content: '�����ύ',shadeClose:false});
 f1.action="taskadd.php?control=add";
}

var moneyv=0;
function moneycaponc(){
x=document.f1.R1.value;
moneyv=x;
for(i=0;i<=2;i++){
document.getElementById("moneyu"+i).style.display="none";
}
document.getElementById("moneyu"+x).style.display="";
}

var rwxsv=0;
function rwxsonc(){
x=document.f1.R5.value;
rwxsv=x;
if(x==0){document.getElementById("rwxsu1").style.display="none";}else{document.getElementById("rwxsu1").style.display="";}
}

function zqonc(){
x=document.f1.R2.value;
if(x==-1){document.getElementById("zqtextdiv").style.display="";}else{document.getElementById("zqtextdiv").style.display="none";}
}

function yxqonc(){
x=document.f1.R3.value;
if(x==-1){document.getElementById("yxqtext").style.display="";}else{document.getElementById("yxqtext").style.display="none";}
}
</script>

</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('../task/')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��������</div>
 <div class="d3"></div>
</div>

<? if(empty($rowuser[uqq])){?>
<div class="rts box"><div class="d1">���Ȳ�������QQ���룬���ܷ������񡣡�<a href="../user/inf.php">�������</a>��</div></div>
<? }?>

<form name="f1" method="post" onSubmit="return tj()" enctype="multipart/form-data">
<input type="hidden" value="task" name="yjcode" />
<div class="uk box">
 <div class="d1">�������<span class="s1"></span></div>
 <div class="d2"><input type="text" name="t1" class="inp" placeholder="һ�仰������������" /></div>
</div>

<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d21 hui">�뽫��ľ�������д���·����ݿ���</div>
</div>
<div class="txtbox box">
<div class="dmain">
 <script id="editor" name="content" type="text/plain" style="width:100%;height:200px;"></script>
</div>
</div>

<div class="uk box">
 <div class="d1">�ϴ�����<span class="s1"></span></div>
 <div class="d2"><input type="file" name="inp1" id="inp1" size="25"></div>
</div>

<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2">
  <select name="d1" style="font-size:13px;">
  <? while1("*","yjcode_tasktype where admin=1 order by xh asc");while($row1=mysql_fetch_array($res1)){?>
  <option value="<?=$row1[id]?>xcf0"><?=$row1[name1]?></option>
  <? while2("*","yjcode_tasktype where admin=2 and name1='".$row1[name1]."' order by xh asc");while($row2=mysql_fetch_array($res2)){?>
  <option value="<?=$row1[id]?>xcf<?=$row2[id]?>">-----<?=$row2[name2]?></option>
  <? }?>
  <? }?>
  </select>
 </div>
</div>

<div class="uk box">
 <div class="d1">������<span class="s1"></span></div>
 <div class="d2">
  <select name="R1" onChange="moneycaponc()" style="font-size:13px;">
  <option value="0">һ�ڼ�</option>
  <option value="1">��Χ����</option>
  <option value="2">���ű���</option>
  </select>
 </div>
</div>
<div class="uk box" id="moneyu0">
 <div class="d1">һ�ڼ�<span class="s1"></span></div>
 <div class="d2"><input type="text" name="tmoneyu0" class="inp" placeholder="��Ը֧����һ�ڼ۽��" /></div>
</div>
<div class="uk box" id="moneyu1" style="display:none;">
 <div class="d1">�۸�Χ<span class="s1"></span></div>
 <div class="d2"><input type="text" name="tmoneyu1_1" class="inp inpc" placeholder="��ͼ۸�" /></div>
 <div class="d98">-</div>
 <div class="d2"><input type="text" name="tmoneyu1_2" class="inp inpc" placeholder="��߼۸�" /></div>
 <div class="d99">Ԫ</div>
</div>
<div class="uk box" id="moneyu2" style="display:none;">
 <div class="d1">����˵��<span class="s1"></span></div>
 <div class="d21">������Ԥ��۸�ͷ�Χ���ɷ��������ɱ���</div>
</div>

<div class="uk box" style="display:none;">
 <div class="d1">��֤��<span class="s1"></span></div>
 <div class="d2"><input type="text" name="tjsbao" class="inp" value="0" placeholder="�Է�����������Ҫ����ı�֤��" /></div>
</div>

<div class="uk box">
 <div class="d1">������ʽ<span class="s1"></span></div>
 <div class="d2">
  <select name="R5" onChange="rwxsonc()" style="font-size:13px;">
  <option value="0">��������</option>
  <option value="1">��������</option>
  </select>
 </div>
</div>
<div class="uk box" id="rwxsu1" style="display:none;">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2"><input type="text" name="trwxsu1" class="inp" placeholder="���������������������������ϵ" /></div>
</div>

<div class="uk box">
 <div class="d1">�н����<span class="s1"></span></div>
 <div class="d2">
  <select name="R4" style="font-size:13px;">
  <option value="0">�����е�</option>
  <option value="1">���ַ��е�</option>
  <option value="2">˫�����е�һ��</option>
  </select>
 </div>
</div>
<div class="uk box">
 <div class="d1">����˵��<span class="s1"></span></div>
 <div class="d21 hui">������ɺ�ƽ̨����ȡ�ɽ����<strong class="red"><?=$rowcontrol[taskyj]*100?>%</strong>��Ӷ��</div>
</div>

<div class="uk box">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2">
  <select name="R2" onChange="zqonc()" style="font-size:13px;">
  <option value="1">1��</option>
  <option value="3">3��</option>
  <option value="7">7��</option>
  <option value="10">10��</option>
  <option value="-1">�Զ���</option>
  </select>
 </div>
</div>
<div class="uk box" id="zqtextdiv" style="display:none;">
 <div class="d1">��������<span class="s1"></span></div>
 <div class="d2"><input type="text" name="zqtext" id="zqtext" class="inp" placeholder="������Ҫ�����������" /></div>
</div>

<div class="uk box">
 <div class="d1">��Ч��<span class="s1"></span></div>
 <div class="d2">
  <select name="R3" onChange="yxqonc()" style="font-size:13px;">
  <option value="3">3��</option>
  <option value="7">7��</option>
  <option value="15">15��</option>
  <option value="30">30��</option>
  <option value="90">90��</option>
  <option value="-1">�Զ���</option>
  </select>
 </div>
</div>
<div class="uk box" id="yxqtextdiv" style="display:none;">
 <div class="d1">չʾ����<span class="s1"></span></div>
 <div class="d2"><input type="text" name="yxqtext" id="yxqtext" class="inp" placeholder="��������Ϣչʾ����Ч����" /></div>
</div>

<div class="uk box">
 <div class="d1">QQ��ʾ<span class="s1"></span></div>
 <div class="d2">
  <select name="qqxsinp" style="font-size:13px;">
  <option value="1">Ͷ������̿ɼ�</option>
  <option value="0">��¼(���ο�)�ɼ�</option>
  <option value="2">�б�����̿ɼ�</option>
  </select>
 </div>
</div>
<div class="uk box">
 <div class="d1">�绰��ʾ<span class="s1"></span></div>
 <div class="d2">
  <select name="motxsinp" style="font-size:13px;">
  <option value="1">Ͷ������̿ɼ�</option>
  <option value="0">��¼(���ο�)�ɼ�</option>
  <option value="2">�б�����̿ɼ�</option>
  </select>
 </div>
</div>

<div class="uk box">
 <div class="d1">������ʾ<span class="s1"></span></div>
 <div class="d2">
  <select name="C1" style="font-size:13px;">
  <option value="1">���˱������������ʼ�������</option>
  <option value="0">����������</option>
  </select>
 </div>
</div>

<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�ύ����")?></div>
</div>

</form>

<script type="text/javascript">
var ue= UE.getEditor('editor',{toolbars:[[ 'source', '|', 'forecolor','fontsize', '|','link', 'unlink','simpleupload']]});
</script>

</body>
</html>