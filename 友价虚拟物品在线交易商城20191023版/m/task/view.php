<?
include("../../config/conn.php");
include("../../config/function.php");
$id=$_GET[id];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_task where id=".$id);if(!$row=mysql_fetch_array($res)){php_toheader("./");}
$bh=$row[bh];
taskok($row["id"]);

$sqluser="select * from yjcode_user where id=".$row[userid]."";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);$rowuser=mysql_fetch_array($resuser);
$userid=0;
$xgnum=0;
$userbaomoney=0;
if(!empty($_SESSION[SHOPUSER])){
$sqluserM="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuserM=mysql_query($sqluserM);$rowuserM=mysql_fetch_array($resuserM);
$userid=$rowuserM[id];
$userbaomoney=$rowuserM[baomoney];
$taskjs=1;
if(strstr($rowcontrol[taskjs],"xcf1xcf")){if($rowuserM[ifmot]!=1){$taskjs=0;}}
if(strstr($rowcontrol[taskjs],"xcf2xcf")){if($rowuserM[ifemail]!=1){$taskjs=0;}}
if(strstr($rowcontrol[taskjs],"xcf3xcf")){if($rowuserM[sfzrz]!=1){$taskjs=0;}}
if(strstr($rowcontrol[taskjs],"xcf4xcf")){if($rowuserM[shopzt]!=2){$taskjs=0;}}
while1("*","yjcode_taskhf where bh='".$bh."' and useridhf=".$userid."");if($row1=mysql_fetch_array($res1)){$xgnum=$row1[xgnum];$mybh=$row1[mybh];$myid=$row1[id];$mymoney=$row1[money1];$mytxt=$row1[txt];}
}

if($_GET[control]=="add"){ //��������
 if(empty($_SESSION[SHOPUSER])){Audit_alert("���ȵ�¼��","../reg/");}
 if(empty($taskjs)){Audit_alert("������������������","view".$id.".html");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 if(0!=$row[zt]){Audit_alert("������ֹͣ���ձ��ۣ�","view".$id.".html");}
 if($xgnum>1){Audit_alert("���Ѿ��޸Ĺ�������ı��ۣ��������޸ģ�","view".$id.".html");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($userid==$row[userid]){Audit_alert("�޷����Լ��������ύ���ۣ�","view".$id.".html");}
 $money1=sqlzhuru($_POST[t1]);
 if(!is_numeric($money1)){Audit_alert("������Ч��","view".$id.".html");}
 if($money1<=0){Audit_alert("������Ч��","view".$id.".html");exit;}
 $txt=sqlzhuru($_POST[s1]);
 if(panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")==0){
  if(!empty($row[jsbao])){
   if($row[jsbao]>$userbaomoney){Audit_alert("���ı�֤���㣬���Ƚ��ɣ����ѽ��ɣ���ˢ��ҳ�������ύ��","view".$id.".html");}
   PointIntoB($userid,"�������񣬶��ᱣ֤��(�������ղ�ͨ�������������)",$row[jsbao]*(-1),2);
   PointUpdateB($userid,$row[jsbao]*(-1)); 
  }
 $mybh=time()."t".$userid;
 intotable("yjcode_taskhf","mybh,bh,uip,userid,useridhf,sj,txt,money1,ifxz,xgnum,taskty","'".$mybh."','".$row[bh]."','".$uip."',".$row[userid].",".$userid.",'".$sj."','".$txt."',".$money1.",0,1,0");
 }else{
 updatetable("yjcode_taskhf","money1=".$money1.",txt='".$txt."',xgnum=xgnum+1 where bh='".$row[bh]."' and useridhf=".$userid."");
 }
 
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && $row[yjtx]==1){
 require("../../config/mailphp/sendmail.php");
 $str="���˸��������ˣ��뾡�촦��<br>����".$row[tit]."<br>���ۣ�<font color='red' style='font-size:18px;'>".$money1."</font><br>��".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
 @yjsendmail("����������ѡ�".webname."��",$rowuser[email],$str,"../");
 }

 php_toheader("../tishi/index.php?admin=6&lx=1&id=".$id);

}elseif($_GET[control]=="add1"){ //��������
 if(empty($_SESSION[SHOPUSER])){Audit_alert("���ȵ�¼��","../reg/");}
 if(empty($taskjs)){Audit_alert("������������������","view".$id.".html");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 if(101!=$row[zt]){Audit_alert("������ֹͣ�������룡","view".$id.".html");}
 if($row[taskcy]>=$row[tasknum]){Audit_alert("��������������","view".$id.".html");}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if($userid==$row[userid]){Audit_alert("���ܽ����Լ�������","view".$id.".html");}
 if(panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid." and (zt=0 or zt=1 or zt=3 or zt=4)")==1){Audit_alert("��������δ��ɣ������ٴνӵ���","view".$id.".html");}
 $txt=sqlzhuru($_POST[s1]);
 $mybh=returnbh();
 $money1=$row[money1]/$row[tasknum];
 $rwdq=date("Y-m-d H:i:s",strtotime("+".$row[rwzq]." day"));
 if(!empty($row[jsbao])){
  if($row[jsbao]>$userbaomoney){Audit_alert("���ı�֤���㣬���Ƚ��ɣ����ѽ��ɣ���ˢ��ҳ�������ύ��","view".$id.".html");}
  PointIntoB($userid,"�������񣬶��ᱣ֤��(�������ղ�ͨ�������������)",$row[jsbao]*(-1),2);
  PointUpdateB($userid,$row[jsbao]*(-1)); 
 }
 intotable("yjcode_taskhf","mybh,bh,uip,userid,useridhf,sj,txt,money1,ifxz,xgnum,taskty,zt,zbsj,rwdq","'".$mybh."','".$row[bh]."','".$uip."',".$row[userid].",".$userid.",'".$sj."','".$txt."',".$money1.",0,1,1,0,'".$sj."','".$rwdq."'");
 $uf=$row[useridhf]."yj".$userid."yj";
 updatetable("yjcode_task","useridhf='".$uf."' where id=".$id);
 $txt="���ֳɹ�����ʼ����������".$rwdq."ǰ������񣬲��ύ����";
 intotable("yjcode_tasklog","bh,userid,useridhf,admin,txt,sj,fj","'".$bh."',".$row[userid].",".$userid.",2,'".$txt."','".$sj."',''");
 
 if(!empty($rowuser[email]) && $rowuser[ifemail]==1 && $row[yjtx]==1){
 require("../../config/mailphp/sendmail.php");
 $str="���˽���������������ע������ȡ�<br>����".$row[tit]."<br>��".webname."��<hr>���ʼ�Ϊϵͳ����������ظ�";
 @yjsendmail("����������ѡ�".webname."��",$rowuser[email],$str,"../");
 }

 php_toheader("../tishi/index.php?admin=6&lx=2&id=".$id);
}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<meta name="keywords" content="<?=$row[wkey]?>">
<meta name="description" content="<?=$row[wdes]?>">
<title><?=$row[tit]?> - <?=webname?></title>
<? include("../tem/cssjs.html");?>
<script language="javascript">
function tj(){
t1v=parseFloat(document.f1.t1.value);
if(isNaN(t1v)){layerts("��������Ч�ı���");return false;}
<? if(!empty($row[jsbao])){?>
if(<?=$row[jsbao]?>><?=$userbaomoney?>){layerts("���ı�֤���㣬���Ƚ��ɣ����ѽ��ɣ���ˢ��ҳ�������ύ��");return false;}
<? }?>
if(!confirm("ȷ��Ҫ�ύ��")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="view.php?control=add&id=<?=$id?>";
}
function tbxg(){
document.getElementById("tbedit").style.display="none";
document.getElementById("baojia").style.display="";
}
function tj1(){
<? if(!empty($row[jsbao])){?>
if(<?=$row[jsbao]?>><?=$userbaomoney?>){layerts("���ı�֤���㣬���Ƚ��ɣ����ѽ��ɣ���ˢ��ҳ�������ύ��");return false;}
<? }?>
if(!confirm("ȷ��Ҫ���ָ�������")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
f1.action="view.php?control=add1&id=<?=$id?>";
}
</script>
</head>
<body>
<? $nowpagetit="��������";$nowpagebk="./";include("../tem/moban/".$rowcontrol[wapmb]."/tem/top.php");?>

<div class="infmain box">
<div class="dmain flex">
  <div class="d1"><?=$row[tit]?></div>
  <div class="d2">
   <ul class="ujg">
   <li class="l1"><?=returntaskjgxs($row[jgxs])?></li>
   <li class="l2">
   ��<strong><?=returntaskjg($row[jgxs],$row[money1],$row[money2])?> </strong>
   <span><? if($row[taskty]==1){echo "(��Ҫ".$row[tasknum]."�ˣ�����Ӷ��".$row[money1]/$row[tasknum]."Ԫ)";}?></span>
   </li>
   <li class="l4">����������Ҫ֧�������ѣ�<span class="s1"><?=$rowcontrol[taskyj]*100?>%</span> (<? if(empty($row[yjfs])){echo "����֧��";}elseif($row[yjfs]==1){echo "���ַ�֧��";}else{echo "˫�����е�50%";}?>)</li>
   </ul>
  </div>
  <?
  $yxq=strtotime($row[yxq]);
  $nsj=strtotime($sj);
  if(0==$row[zt] || 1==$row[zt] || 2==$row[zt] || 100==$row[zt] || 101==$row[zt] || 105==$row[zt] || 106==$row[zt]){
  ?>
  <div class="tasjdjs">
  <? 
  if($yxq>=$nsj){$dqsj=str_replace("-","/",$row[yxq]);
  ?>
  ������ֵ���ʱ��
  <span id="nowsj" style="display:none;"><?=str_replace("-","/",date("Y-m-d H:i:s"))?></span>
  <span id="dqsj" style="display:none;"><?=$dqsj?></span>
  <span class="djs" id="djs">���ڼ���</span>
  <script language="javascript">userChecksj();</script>
  <? }else{?>
  �ѽ���
  <? }?>
  </div>
  <? }?>
</div>
</div>

<div class="infcap box">
 <div class="d1"></div>
 <div class="d2">������Ϣ</div>
 <div class="d3 flex"></div>
</div>
<div class="inftxt box">
 <div class="dmain flex">
 ����״̬��<strong><? $bmnum=returncount("yjcode_taskhf where bh='".$row[bh]."'");?>
 <? if(0==$row[zt] && $bmnum==0){echo "�ȴ�����";?>
 <? }elseif(0==$row[zt] && $bmnum>0){echo "����ѡ��";?>
 <? }elseif(1==$row[zt] || 105==$row[zt]){echo "�������";?>
 <? }elseif(2==$row[zt] || 106==$row[zt]){echo "����ر�";?>
 <? }elseif(3==$row[zt]){echo "���ַ�������";?>
 <? }elseif(4==$row[zt]){echo "�ȴ���������";?>
 <? }elseif(5==$row[zt]){echo "�������";?>
 <? }elseif(8==$row[zt]){echo "ƽ̨�������";?>
 <? }elseif(9==$row[zt]){echo "�ж�����ʤ��";?>
 <? }elseif(10==$row[zt] || 104==$row[zt]){echo "������";?>
 <? }elseif(100==$row[zt]){echo "�ȴ����ɷ���";?>
 <? }elseif(101==$row[zt]){echo "���������";?>
 <? }elseif(102==$row[zt]){echo "ƽ̨�������";?>
 <? }?></strong>
 <br>
 �����ţ�<?=$row[bh]?><br>
 ������ʽ��<?=returntaskxs($row[taskty])?><br>
 ����ʱ�䣺<?=dateYMD($row[sj])?><br>
 �������ڣ�<?=$row[rwzq]?>��
 </div>
</div>

<?
$sqlsell="select * from yjcode_user where id=".$row[userid];mysql_query("SET NAMES 'GBK'");$ressell=mysql_query($sqlsell);
if(!$rowsell=mysql_fetch_array($ressell)){php_toheader("../");}
?>
<div class="inf4 box">
 <div class="d1"><img src="<?="../../upload/".$rowsell[id]."/user.jpg";?>" /></div>
 <div class="d2">
  <span class="sling"><?=$rowsell[nc]?></span>
  <?
  if($row[qqxs]==1){$qqxsvalue="Ͷ������̿ɲ鿴QQ";}elseif($row[qqxs]==2){$qqxsvalue="�б�����̿ɲ鿴QQ";}elseif(empty($row[qqxs])){$qqxsvalue="��¼��鿴QQ";}
  if($row[motxs]==1){$motxsvalue="Ͷ������̿ɲ鿴�绰";}elseif($row[motxs]==2){$motxsvalue="�б�����̿ɲ鿴�绰";}elseif(empty($row[motxs])){$motxsvalue="��¼��鿴�绰";}
  if(empty($row[qqxs]) && !empty($_SESSION[SHOPUSER])){$qqxs=1;}
  elseif(1==$row[qqxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")>0){$qqxs=1;}
  elseif(2==$row[qqxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and ifxz=1 and useridhf=".$userid."")>0){$qqxs=1;}
  elseif($userid==$row[userid]){$qqxs=1;}
  else{$qqxs=0;}
  if(empty($row[motxs]) && !empty($_SESSION[SHOPUSER])){$motxs=1;}
  elseif(1==$row[motxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid."")>0){$motxs=1;}
  elseif(2==$row[motxs] && returncount("yjcode_taskhf where bh='".$row[bh]."' and ifxz=1 and useridhf=".$userid."")>0){$motxs=1;}
  elseif($userid==$row[userid]){$motxs=1;}
  else{$motxs=0;}
  ?>
  <? if(1==$qqxs){?>
  <span class="s1 s0">QQ��<a href="javascript:void(0);" onClick="qqtang('<?=$rowuser[uqq]?>')"><?=$rowuser[uqq]?></a></span>
  <? }else{?>
  <span class="s1"><?=$qqxsvalue?></span>
  <? }?>
  <? if($motxs==1){?>
  <span class="s1 s0">�ֻ���<?=$rowuser[mot]?></span>
  <? }else{?>
  <span class="s1"><?=$motxsvalue?></span>
  <? }?>
 </div>
</div>

<div class="infcap box">
 <div class="d1"></div>
 <div class="d2">��������</div>
 <div class="d3 flex"></div>
</div>
<div class="inftxt box">
 <div class="dmain flex">
 <?=$row[txt]?><br><? $fj="../../upload/".$row[userid]."/".$row[bh]."/".$row[fj];if(is_file($fj)){?><a href="<?=$fj?>" class="downfj" target="_blank">���ظ���</a><? }?>
 </div>
</div>

<div class="dtaskjs box">
<div class="dmain flex">
  <!--��������ʼ-->
  <? if(empty($row[taskty])){?>
  <div class="baojia" id="baojia"<? if(empty($userid) || (!empty($userid)) && $userid!=$row[userid] && $xgnum==0){?><? }else{?> style="display:none;"<? }?>>
   <form name="f1" method="post" onSubmit="return tj()">
   <ul class="u1">
   <li class="l1">���񱨼ۣ�</li>
   <li class="l2"><input type="text" name="t1" value="<?=$mymoney?>" /> <span class="fd">Ԫ��������Ԥ��Ϊ��<?=returntaskjg($row[jgxs],$row[money1],$row[money2])?>Ԫ)</span></li>
   <li class="l3">����˵����</li>
   <li class="l4"><textarea name="s1"><?=$mytxt?></textarea></li>
   <? if(!empty($userid)){?>
   <li class="l6">���ָ�������Ҫ�������ı�֤��<strong class="red" style="font-size:20px;"><?=$row[jsbao]?></strong>Ԫ������ǰ���ñ�֤��Ϊ��<strong class="blue" style="font-size:20px;"><?=$userbaomoney?></strong>Ԫ [<a href="../user/baomoney1.php" class="red">���ɱ�֤��</a>]</li>
   <? }?>
   <li class="l5">
   <? if(!empty($userid)){?>
    <? if($taskjs==1){?><input type="submit" value="�ύ����" /><? }else{include("taskjs.php");}?>
   <? }else{?>
   <input class="inp1" type="button" value="���ȵ�¼" onClick="gourl('../reg/')" />
   <? }?>
   </li>
   </ul>
   </form>
  </div>
 
  <? if(!empty($userid) && $userid!=$row[userid] && $xgnum==1){?>
  <div class="jisuan" id="tbedit">
  ����Ͷ��ţ�<?=$mybh?>����<a href="#tb<?=$myid?>" class="blue">�鿴</a>��&nbsp;&nbsp;��<a href="javascript:void(0);" onClick="tbxg()" class="blue">�޸�</a>��
  </div>
  <? }?>
 
  <? if($userid==$row[userid]){$cy=returncount("yjcode_taskhf where bh='".$row[bh]."'");?>
  <? if($cy==0){?>
  <div class="jisuan">
  <strong>�������ã���ʱû���˸������ۣ��������ע</strong><br>
  </div>
  <? }else{?>
  <div class="jisuan">
  <strong>�������ã���ǰ����<?=$cy;?>�˲���������</strong><br>
  <?
  $zh=returnsum("money1","yjcode_taskhf where bh='".$row[bh]."'");
  while1("*","yjcode_taskhf where bh='".$bh."' order by money1 desc");$row1=mysql_fetch_array($res1);$moneyg=$row1[money1];
  while1("*","yjcode_taskhf where bh='".$bh."' order by money1 asc");$row1=mysql_fetch_array($res1);$moneyd=$row1[money1];
  ?>
  �����ۣ�<span class="feng"><?=sprintf("%.2f",$zh/$cy)?></span>Ԫ����߱��ۣ�<span class="red"><?=$moneyg?></span>Ԫ����ͱ���<span class="green"><?=$moneyd?></span>Ԫ��
  </div>
  <? }?>
  <? }?>
  <? }?>
  <!--�����������-->
 
  <!--��������ʼ-->
  <? if($row[taskty]==1 && $userid!=$row[userid] && panduan("*","yjcode_taskhf where bh='".$row[bh]."' and useridhf=".$userid." and (zt=0 or zt=1 or zt=3 or zt=4)")==0){?>
  <div class="baojia">
   <form name="f1" method="post" onSubmit="return tj1()">
   <ul class="u1">
   <li class="l3">����˵����</li>
   <li class="l4"><textarea name="s1">���ѽӵ����ᰴҪ�󾡿��깤^_^</textarea></li>
   <? if(!empty($userid)){?>
   <li class="l6">���ָ�������Ҫ�������ı�֤��<strong class="red" style="font-size:20px;"><?=$row[jsbao]?></strong>Ԫ������ǰ���ñ�֤��Ϊ��<strong class="blue" style="font-size:20px;"><?=$userbaomoney?></strong>Ԫ [<a href="../user/baomoney1.php" class="red">���ɱ�֤��</a>]</li>
   <? }?>
   <li class="l5">
   <? if(!empty($userid)){?>
    <? if($taskjs==1){?><input type="submit" value="�ӵ�" /><? }else{include("taskjs.php");}?>
   <? }else{?>
   <input class="inp1" type="button" value="���ȵ�¼" onClick="tclogin()" />
   <? }?>
   </li>
   </ul>
   </form>
  </div>
  <? }?>
  <!--�����������-->
</div>
</div>

<div class="taskhfm box">
<div class="dmain flex">
  <?
  while1("*","yjcode_taskhf where bh='".$bh."' order by sj desc");while($row1=mysql_fetch_array($res1)){
  while2("*","yjcode_user where id=".$row1[useridhf]);$row2=mysql_fetch_array($res2);
  ?>
  <a name="tb<?=$row1[id]?>"></a>
  <div class="taskhf">
   <ul class="u1">
   <li class="l1"><img src="<?=returntppd("../../upload/".$row1[useridhf]."/user.jpg","../../img/none60x60.gif")?>" width="60" height="60" /></li>
   <li class="l2">
   <strong><?=$row2[nc]?></strong><br>
   ��ϵQQ��<? if($userid==$row[userid]){?><a href="javascript:void(0);" onClick="qqtang('<?=$row2[uqq]?>')"><?=$row2[uqq]?></a><? }else{?>�����ɼ�<? }?>
   </li>
   <li class="l3">
   <? if($userid==$row[userid] && 0==$row[zt]){?><a href="../user/taskbjsel.php?bh=<?=$row[bh]?>&mid=<?=$row1[id]?>" class="xz">ѡ��<br>Ͷ��</a><? }?>
   <? if($row[useridhf]==$row2[id]){?><img src="img/suc.gif" class="zb" /><? }?>
   </li>
   </ul>
   <div class="hftxt">���񱨼ۣ�<strong class="feng"><? if($userid==$row[userid]){?>��<?=$row1[money1]?><? }else{?>�����ɼ�<? }?></strong><br><?=$row1[txt]?><br><br><span class="hui">Ͷ���ţ�<?=$row1[mybh]?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����ʱ�䣺<?=$row1[sj]?></span></div>
  </div>
  <?
  }
  ?>
</div>
</div>

</body>
</html>