<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$userid=returnuserid($_SESSION[SHOPUSER]);
$sj=date("Y-m-d H:i:s");

while1("*","yjcode_qiandao where userid=".$userid." order by sj desc limit 1");
if($row1=mysql_fetch_array($res1)){
$a_ux = strtotime($sj);
$a_date = date('Y-m-d',$a_ux);
$b_date = date('Y-m-d',strtotime($row1[sj]));
if($a_date==$b_date){$ifq=1;}else{$ifq=0;}
}else{$ifq=0;}

//��������ʼ
if($_POST[jvs]=="qd"){
 zwzr();
 if(1==$ifq){Audit_alert("������ǩ���������ظ�ǩ��","qiandao.php");}
 $uip=$_SERVER["REMOTE_ADDR"];
 $qdjf=$rowcontrol[qdjf];
 $lxd=0;
 while1("*","yjcode_qiandaojf order by daynum desc limit 1");if($row1=mysql_fetch_array($res1)){
  for($i=2;$i<=$row1[daynum];$i++){
   $iv=$i-1;
   $sjv=date("Y-m-d",strtotime("-".$iv." day"));
   $sj1=$sjv." 00:00:00";
   $sj2=$sjv." 23:59:59";
   while2("*","yjcode_qiandao where userid=".$userid." and sj>='".$sj1."' and sj<='".$sj2."'");if(!$row2=mysql_fetch_array($res2)){break;}else{$lxd++;}
  }
  if($lxd>0){
  $dnum=$lxd+1;
  while3("*","yjcode_qiandaojf where daynum<=".$dnum." order by daynum desc limit 1");if($row3=mysql_fetch_array($res3)){$qdjf=$row3[jf];$lx="(����ǩ��".$dnum."��)";}
  }
 }
 intotable("yjcode_qiandao","userid,sj,uip,tit,jf","".$userid.",'".$sj."','".$uip."','".sqlzhuru($_POST[t1]).$lx."',".$qdjf."");
 PointInto($userid,"ÿ��ǩ��",$qdjf);
 PointUpdate($userid,$qdjf); 
 php_toheader("qiandao.php");
}
//����������

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<link href="css/inf.css" rel="stylesheet" type="text/css" />
<script language="javascript">
function tj(){
if((document.f1.t1.value).replace(/\s/,"")==""){alert("����д��������");document.f1.t1.focus();return false;}
layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
tjwait();
f1.action="qiandao.php?control=add";
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
 
 <? include("rcap8.php");?>
 <script language="javascript">
 document.getElementById("rcap1").className="l1 l2";
 </script>

 <!--��B-->
 <div class="rkuang">
 
 <? while1("*","yjcode_qiandaojf order by daynum desc limit 1");if($row1=mysql_fetch_array($res1)){?>
 <div class="rts">����ǩ���ɻ�ø��ߵĻ��ֽ���(��߿ɻ��<strong class="feng"><?=$row1[jf]?></strong>��)������ǵ�Ҳ��ǩ��Ŷ^_^</div>
 <? }?>
 
 <? if(0==$ifq){$weekarray=array("��","һ","��","��","��","��","��");?>
 <form name="f1" method="post" onsubmit="return tj()">
 <input type="hidden" value="qd" name="jvs" />
 <ul class="uk">
 <li class="l1">�������飺</li>
 <li class="l2"><input name="t1"  style="width:305px;" value="��ʱǩ���Ǹ���ϰ��^_^ ǩ���÷�����" class="inp" type="text" /></li>
 <li class="l3">
 <div id="tjbtn"><input type="submit" value="��<?=$weekarray[date("w")]?>" class="qd" /></div>
 <div id="tjing" style="display:none;color:#F96F39;"><img style="margin:0 0 6px 0;" src="../img/ajax_loader.gif" width="208" height="13" /><br>����ǩ�������Ժ�^_^</div>
 </li>
 </ul>
 </form>
 <? }else{?>
 <ul class="uk">
 <li class="l1">ǩ����ʾ��</li>
 <li class="l21"><strong class="feng">�𾴵��û����������Ѿ�ǩ���ɹ�������Ҳ�ǵ���ǩ��Ŷ^_^</strong></li>
 </ul>
 <? }?>

 <ul class="qiandaocap">
 <li class="l1">ǩ��ʱ��</li>
 <li class="l2">��������</li>
 <li class="l3">ǩ��IP</li>
 <li class="l4">����</li>
 </ul>
   
 <?
 $ses=" where userid=".$userid;
 $page=$_GET["page"];if($page==""){$page=1;}else{$page=intval($_GET["page"]);}
 pagef($ses,30,"yjcode_qiandao","order by sj desc");while($row=mysql_fetch_array($res)){
 ?>
 <ul class="qiandao">
 <li class="l1"><?=$row[sj]?></li>
 <li class="l2"><?=$row[jf]?></li>
 <li class="l3"><a href="http://www.baidu.com/s?wd=<?=$row[uip]?>" target="_blank"><?=$row[uip]?></a></li>
 <li class="l4"><?=$row[tit]?></li>
 </ul>
 <? }?>

 <div class="npa">
 <?
 $nowurl="qiandao.php";
 $nowwd="";
 require("page.php");
 ?>
 </div>
 
 <div class="clear clear15"></div>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>