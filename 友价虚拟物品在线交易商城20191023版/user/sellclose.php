<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and selluserid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("sellorder.php");}


if(sqlzhuru($_POST[jvs])=="close"){
 zwzr();
 $zfmm=sha1(sqlzhuru($_POST[t1]));
 if(panduan("uid,zfmm","yjcode_user where zfmm='".$zfmm."' and uid='".$_SESSION[SHOPUSER]."'")==0){Audit_alert("֧����������","sellclose.php?orderbh=".$orderbh);}
 if($row[ddzt]!="wait"){Audit_alert("δ֪����","sellorderview.php?orderbh=".$orderbh);}
 $allmoney=$row[money1]*$row[num];
 PointUpdateM($row[userid],$allmoney);
 PointIntoM($row[userid],"����ȡ������",$allmoney);
 $sj=date("Y-m-d H:i:s");
 updatetable("yjcode_order","ddzt='close',closesj='".$sj."' where selluserid=".$userid." and id=".$row[id]);
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
 <? if($row[ddzt]=="wait"){?>
 <script language="javascript">
 function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("������֧������");document.f1.t1.focus();return false;}
 if(!confirm("ȷ��Ҫȡ���ö�����")){return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 tjwait();
 f1.action="sellclose.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1">
 <strong>* վ����ʾ��</strong><br>
 * ����δ������ȡ�����������֧���ķ��ý�ֱ���˻������ʺ���<br>
 </li>
 <li class="l2">����������֧�����룺(<a href="zfmm.php" class="red">����֧�����룿</a>)</li>
 <li class="l3"><input  name="t1" class="inp" size="30" type="password"/></li>
 <li class="l4"><?=tjbtnr("ȡ������")?></li>
 </ul>
 <input type="hidden" value="close" name="jvs" />
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