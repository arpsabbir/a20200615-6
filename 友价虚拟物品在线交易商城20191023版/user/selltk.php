<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=getsj();
while0("*","yjcode_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="tk"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","yjcode_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("֧����������","selltk.php?orderbh=".$orderbh);}
 if($row[ddzt]!="back"){Audit_alert("δ֪����","sellorderview.php?orderbh=".$orderbh);}
 while1("*","yjcode_tk where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 //ͬ��B
 if(sqlzhuru($_POST[R1])=="yes"){
  $allmoney=$row[money1]*$row[num];
  $tkjg="����ͬ���˿�����";
  PointUpdateM($row[userid],$allmoney);
  PointIntoM($row[userid],$tkjg,$allmoney);
  updatetable("yjcode_order","ddzt='backsuc',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("yjcode_tk where orderbh='".$orderbh."' and selluserid=".$userid);
  deletetable("yjcode_db where orderbh='".$orderbh."' and selluserid=".$userid);
 //ͬ��E
 //��ͬ��B
 }elseif(sqlzhuru($_POST[R1])=="no"){
  $tkjg="���Ҳ�ͬ���˿�";
  updatetable("yjcode_order","ddzt='backerr',tksj='".$row1[sj]."',tkly='".$row1[tkly]."',tkjg='".sqlzhuru($_POST[t2])."',tkoksj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
  deletetable("yjcode_tk where orderbh='".$orderbh."' and selluserid=".$userid);
  $dbsj=$rowcontrol[dbsj];
  $sqlpro="select * from yjcode_pro where bh='".$row[probh]."'";mysql_query("SET NAMES 'GBK'");$respro=mysql_query($sqlpro);if($rowpro=mysql_fetch_array($respro)){
  $sqldb="select * from yjcode_type where id=".$rowpro[ty1id];mysql_query("SET NAMES 'GBK'");$resdb=mysql_query($sqldb);if($rowdb=mysql_fetch_array($resdb)){
  if(!empty($rowdb[dbsj])){$dbsj=$rowdb[dbsj];}
  }
  }
  $oksj=date("Y-m-d H:i:s",strtotime("+".$dbsj." day"));
  $c_tit="���Ҳ�ͬ���˿������뵣���׶Σ��ȴ���Ҳ���";
  $allmoney=$row[money1]*$row[num];
  intotable("yjcode_db","money1,sj,selluserid,userid,dboksj,probh,tit,orderbh","".$allmoney.",'".$sj."',".$row[selluserid].",".$row[userid].",'".$oksj."','".$row[probh]."','".$c_tit."','".$orderbh."'");
 }
 //��ͬ��E

 $tkjg=$tkjg.",���ɣ�".sqlzhuru($_POST[t2]);
 intotable("yjcode_orderlog","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",2,'".$tkjg."','".$sj."'");
 
 php_toheader("sellorderview.php?orderbh=".$orderbh); 

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/sell.css" rel="stylesheet" type="text/css" />
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <? include("sellzf.php");?>

 <!--��B-->
 <div class="rkuang">
 
 <? include("sellorderv.php");?>
 <? 
 if($row[ddzt]=="back"){
 while1("*","yjcode_tk where selluserid=".$row[selluserid]." and orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 ?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("������֧������");document.f1.t1.focus();return false;}
 if(!confirm("ȷ���ύ��")){return false;}
 layer.msg('���ڴ����У����Ժ�', {icon: 16  ,time: 0,shade :0.25});
 tjwait();
 f1.action="selltk.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* վ����ʾ��</strong><br>
 * ���� <span class="red"><?=$row1[tkoksj]?></span> ǰ��������ϵͳĬ���������˿����룬������Զ��˻�����ʻ�<br>
 * �����ͬ�Ȿ���˿��������ҹ�ͨ���������𲻱�Ҫ�ķ���<br>
 * ����ʱ�䣺<?=$row1[sj]?><br>
 * �˿��������£�<br>
 </li>
 <li class="l6"><?=$row1[tkly]?></li>
 <li class="l2">�Ƿ�ͬ���˿</li>
 <li class="l3">
 <label><input name="R1" type="radio" value="yes" checked="checked" /> ͬ��</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <label><input name="R1" type="radio" value="no" /> ��ͬ��</label> 
 </li>
 <li class="l2">ԭ��</li>
 <li class="l3"><input  name="t2" class="inp" size="80" type="text"/></li>
 <li class="l2">����������֧�����룺(<a href="zfmm.php" class="red">����֧�����룿</a>)</li>
 <li class="l3"><input  name="t1" class="inp" size="30" type="password"/></li>
 <li class="l4"><?=tjbtnr("�ύ")?></li>
 </ul>
 <input type="hidden" value="tk" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }?>
 <div class="clear clear10"></div>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>