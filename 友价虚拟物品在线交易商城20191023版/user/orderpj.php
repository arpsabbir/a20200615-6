<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$sqluser="select * from yjcode_user where uid='".$_SESSION[SHOPUSER]."'";mysql_query("SET NAMES 'GBK'");$resuser=mysql_query($sqluser);
if(!$rowuser=mysql_fetch_array($resuser)){php_toheader("../reg/");}
$userid=$rowuser[id];

$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and ddzt='suc' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}
if(panduan("bh","yjcode_pro where bh='".$row[probh]."'")==0){Audit_alert("����Ʒ�ѱ�ɾ�����޷��������ۣ�","order.php");}
$sqlpj="select * from yjcode_propj where orderbh='".$orderbh."' and userid=".$userid;mysql_query("SET NAMES 'GBK'");$respj=mysql_query($sqlpj);
if($rowpj=mysql_fetch_array($respj)){$ifpj=1;}else{$ifpj=0;}

if(sqlzhuru($_POST[jvs])=="pj"){
 zwzr();
 if(1==$ifpj){Audit_alert("�������۹��������ظ�������","orderpj.php?orderbh=".$orderbh);}
 $sj=date("Y-m-d H:i:s");
 $uip=$_SERVER["REMOTE_ADDR"];
 if(panduan("*","yjcode_tp where bh='".$orderbh."'")==1){$iftp=1;}else{$iftp=0;}
 intotable("yjcode_propj","probh,selluserid,userid,sj,uip,pf1,pf2,pf3,txt,orderbh,pjlx,iftp","'".$row[probh]."',".$row[selluserid].",".$row[userid].",'".$sj."','".$uip."',".sqlzhuru($_POST[hpjjf1]).",".sqlzhuru($_POST[hpjjf2]).",".sqlzhuru($_POST[hpjjf3]).",'".sqlzhuru($_POST[s1])."','".$row[orderbh]."',".$_POST[Rpj].",".$iftp."");$id=mysql_insert_id();
 if(empty($id)){Audit_alert("�������۹��������ظ�������","orderpj.php?orderbh=".$orderbh);}
 $sql1="select avg(pf1) as pf1v,avg(pf2) as pf2v,avg(pf3) as pf3v from yjcode_propj where probh='".$row[probh]."' and selluserid=".$row[selluserid];mysql_query("SET NAMES 'GBK'");$res1=mysql_query($sql1);
 $row1=mysql_fetch_array($res1);
 updatetable("yjcode_pro","pf1=".round($row1[pf1v],2).",pf2=".round($row1[pf2v],2).",pf3=".round($row1[pf3v],2)." where bh='".$row[probh]."'");
 PointInto($userid,"���׳ɹ���������Ʒ��û���",$rowcontrol[pjjf]);
 PointUpdate($userid,$rowcontrol[pjjf]); 
 updatetable("yjcode_order","ifpj=1 where orderbh='".$orderbh."'");

 $sqlp="select avg(pf1) pf1v,avg(pf2) pf2v,avg(pf3) pf3v from yjcode_pro where zt=0 and userid=".$row[selluserid];mysql_query("SET NAMES 'GBK'");
 $resp=mysql_query($sqlp);$rowp=mysql_fetch_array($resp);
 updatetable("yjcode_user","pf1=".round($rowp[pf1v],2).",pf2=".round($rowp[pf2v],2).",pf3=".round($rowp[pf3v],2)." where id=".$row[selluserid]);

 $ur="../upload/".$row[userid]."/".$orderbh."/";createDir($ur);$u=inp_tp_upload(1,$ur,"video");if(!empty($u)){updatetable("yjcode_propj","ifvideo=1 where id=".$id);}
 
 php_toheader("orderpj.php?orderbh=".$orderbh);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/buy.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function pjover(x,y){
document.getElementById("pjbg"+x).style.backgroundImage="url(img/pj"+y+"v.gif)";
if(y==0){sv="δ���";}
else if(y==1){sv="ʧ��";}
else if(y==2){sv="����";}
else if(y==3){sv="һ��";}
else if(y==4){sv="����";}
else if(y==5){sv="��ϲ";}
document.getElementById("pjf"+x).innerHTML=y+"��&nbsp;"+sv;
}

function pjonc(x,y){
document.getElementById("hpjjf"+x).value=y;
}

function pjout(x,y){
 pjjf=parseInt(document.getElementById("hpjjf"+x).value);
 if(pjjf!=0){pjover(x,pjjf);}
 else{pjover(x,0);}
}

function tj(){
 if(parseInt(document.getElementById("hpjjf1").value)==0){alert("���ȶ�����������");return false;}
 if(parseInt(document.getElementById("hpjjf2").value)==0){alert("���ȶԷ����ٶȴ��");return false;}
 if(parseInt(document.getElementById("hpjjf3").value)==0){alert("���ȶԷ���̬�ȴ��");return false;}
 if((document.f1.s1.value).replace(/\s/,"")==""){alert("�������Ҫ�ĵ�������");document.f1.s1.focus();return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 tjwait();
 f1.action="orderpj.php?orderbh=<?=$orderbh?>";
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
 
 <ul class="wz">
 <li class="l1 l2"><a href="javascript:void(0);">��������</a></li>
 <li class="l1"><a href="order.php">�ҵĶ���</a></li>
 </ul>

 <!--��B-->
 <div class="rkuang">
 
 <? include("orderv.php");?>
 
 <? if(0==$ifpj){?>
 <form name="f1" method="post" onsubmit="return tj()" enctype="multipart/form-data">
 <input type="hidden" value="pj" name="jvs" />
 <input type="hidden" id="hpjjf1" name="hpjjf1" value="0" />
 <input type="hidden" id="hpjjf2" name="hpjjf2" value="0" />
 <input type="hidden" id="hpjjf3" name="hpjjf3" value="0" />
 <div class="orderpj">
 <ul class="u1">
 <li class="l1">��д��ʵ������Ϣ���ɻ����վ���͵�<?=$rowcontrol[pjjf]?>����</li>
 <li class="l2">����<br>��Ʒ</li>
 <li class="l3"><textarea name="s1"></textarea></li>
 <li class="l61">��Ƶ</li>
 <li class="l6">
 <input type="file" name="inp1" id="inp1" size="15" accept=".mp4">
 </li>
 <li class="l41">ͼƬ</li>
 <li class="l4">
 <iframe style="float:left;" src="tpupload.php?admin=2&bh=<?=$orderbh?>" width="150" scrolling="no" height="33" frameborder="0"></iframe>
 </li>
 <li class="l5">(����ϴ�����)</li>
 </ul>
 <ul class="u2">
 <li class="l1">���������</li>
 <li class="l2" id="pjbg1"><? for($i=1;$i<=5;$i++){?><span class="s1" onclick="pjonc(1,<?=$i?>)" onmouseout="pjout(1,<?=$i?>)" onmouseover="pjover(1,<?=$i?>)"></span><? }?><span id="pjf1" class="pjf"></span></li>
 <li class="l1">�����ٶȣ�</li>
 <li class="l2" id="pjbg2"><? for($i=1;$i<=5;$i++){?><span class="s1" onclick="pjonc(2,<?=$i?>)" onmouseout="pjout(2,<?=$i?>)" onmouseover="pjover(2,<?=$i?>)"></span><? }?><span id="pjf2" class="pjf"></span></li>
 <li class="l1">����̬�ȣ�</li>
 <li class="l2" id="pjbg3"><? for($i=1;$i<=5;$i++){?><span class="s1" onclick="pjonc(3,<?=$i?>)" onmouseout="pjout(3,<?=$i?>)" onmouseover="pjover(3,<?=$i?>)"></span><? }?><span id="pjf3" class="pjf"></span></li>
 <li class="l3">�ۺ����ۣ�</li>
 <li class="l4">
 <label><input name="Rpj" type="radio" value="1" checked="checked" /> ����</label> 
 <label><input name="Rpj" type="radio" value="2" /> ����</label> 
 <label><input name="Rpj" type="radio" value="3" /> ����</label>
 </li>
 </ul>
 <div class="xgtp">
  <div id="xgtp1" style="display:none;">���ڴ���</div>
  <div id="xgtp2"></div>
 </div>
 <div class="pjbtn"><? tjbtnr("��������")?></div>
 </div>
 </form>
 
 <? }else{?>
 <div class="orderv1 orderv0">
  <table class="table1" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td class="td1">��������</td>
  <td class="td2">
  ���� <?=$rowpj[sj]?> �Ա��ν��׽��������ۣ�<br>
  <strong class="feng">���������<?=$rowpj[pf1]?>�֣������ٶ�<?=$rowpj[pf2]?>�֣����ҷ���̬��<?=$rowpj[pf3]?>��</strong><br>
  ���ۣ�<?=$rowpj[txt]?><br>
  <? $u="../upload/".$rowuser[id]."/".$orderbh."/video.mp4";if(is_file($u)){?>
  <a href="<?=$u?>" target="_blank"><img src="../img/video.jpg" width="50" height="50" /></a>&nbsp;&nbsp;
  <? }?>
  <? while1("*","yjcode_tp where bh='".$orderbh."' order by xh asc");while($row1=mysql_fetch_array($res1)){$tp="../".str_replace(".","-1.",$row1[tp]);?>
  <a href="../<?=$row1[tp]?>" target="_blank"><img src="<?=$tp?>" width="50" height="50" /></a>&nbsp;&nbsp;
  <? }?>
  </td>
  </tr>
  </table>
 </div>
 <? }?>
 
 <div class="clear clear15"></div>

 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<script language="javascript">
function xgtread(x){
 $.get("protp.php",{bh:x},function(result){
  $("#xgtp2").html(result);
 });
}
function deltp(x){
 document.getElementById("xgtp1").style.display="";
 $.get("protpdel.php",{id:x},function(result){
  xgtread("<?=$orderbh?>");
  document.getElementById("xgtp1").style.display="none";
 });
}
xgtread("<?=$orderbh?>");
</script>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>