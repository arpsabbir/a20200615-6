<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
while0("*","yjcode_order where orderbh='".$orderbh."' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}


if(sqlzhuru($_POST[jvs])=="yc" && empty($row[ycshsj]) && $row[ddzt]=="db"){
 zwzr();
 while1("*","yjcode_db where orderbh='".$orderbh."'");$row1=mysql_fetch_array($res1);
 $sj=date('Y-m-d H:i:s');
 $sjv=$row1[dboksj];
 $oksj=date('Y-m-d H:i:s',strtotime ("+".$rowcontrol[ycsj]." day",strtotime($sjv)));
 updatetable("yjcode_db","dboksj='".$oksj."' where id=".$row1[id]);
 updatetable("yjcode_order","ycshsj='".$sj."' where id=".$row[id]);
 php_toheader("orderview.php?orderbh=".$orderbh); 

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
</head>
<body>
<? include("../tem/top.html");?>
<? include("top.php");?>
<div class="yjcode">

<? include("left.php");?>

<!--RB-->
<div class="userright">
 
 <!--��B-->
 <div class="rkuang">
 
 <? include("orderv.php");?>
 <? if(empty($row[ycshsj])){?>
 <script language="javascript">
 function tj(){
 if(confirm("ȷ��Ҫ�ӳ��ջ���")){}else{return false;}
 layer.msg('���ڲ��������Ժ�', {icon: 16  ,time: 0,shade :0.25});
 f1.action="orderyc.php?orderbh=<?=$orderbh?>";
 }
 </script>
 <form name="f1" method="post" onsubmit="return tj()">
 <ul class="ordercz">
 <li class="l1"><strong>�ӳ�����ʱ��</strong></li>
 <li class="l2">�������ӳ�<strong class="red"><?=$rowcontrol[ycsj]?></strong>���ʽ𵣱�ʱ�䣬��ֻ���ӳ�һ�Σ���ȷ����Ҫ�ӳ����������°�ť����</li>
 <li class="l4"><?=tjbtnr("�ӳ�ʱ��")?></li>
 </ul>
 <input type="hidden" value="yc" name="jvs" />
 <input type="hidden" value="<?=$orderbh?>" name="orderbh" />
 </form>
 <? }else{?>
 <ul class="ordercz">
 <li class="l1"><strong>�ӳ�����ʱ��</strong></li>
 <li class="l2">���� <?=$row[ycshsj]?> �Ѿ����й��ӳ�����ʱ������������ٽ��иò�����</li>
 </ul>
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