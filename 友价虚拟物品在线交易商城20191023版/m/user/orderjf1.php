<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_order where orderbh='".$orderbh."' and (ddzt='jf' or ddzt='jfbuy' or ddzt='jfsell' or ddzt='back' or ddzt='backerr' or ddzt='backsuc') and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}

if(sqlzhuru($_POST[jvs])=="jf"){
 zwzr();
 $txt=sqlzhuru1($_POST[content]);
 if(empty($txt)){Audit_alert("�����������ݲ���Ϊ�գ��������ԣ�","orderjf1.php?orderbh=".$orderbh);}
 intotable("yjcode_orderlog","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",1,'".$txt."','".$sj."'");
 php_toheader("orderjf1.php?orderbh=".$orderbh); 

}

?>
<html>
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
<title>��Ա���� <?=webname?></title>
<? include("../tem/cssjs.html");?>
<link href="css/buy.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../../config/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../../config/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../../config/ueditor/lang/zh-cn/zh-cn.js"></script>

<script language="javascript">
$(function () {
 window.onscroll = function () {
  if ($(window).scrollTop() > 100) {
   $('.return-top').show();
  } else {
   $('.return-top').hide();
  }
 }
})
</script>

</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('orderview.php?orderbh=<?=$orderbh?>')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">��ͨ��¼</div>
 <div class="d3"></div>
</div>

<div class="jflist box">
 <div class="jfgtlist">
  <div class="cap">&nbsp;&nbsp;��ͨ��¼</div>
  <? 
  $i=1;
  while1("*","yjcode_orderlog where orderbh='".$orderbh."' and userid=".$userid." order by sj desc");while($row1=mysql_fetch_array($res1)){
  $txt=$row1[txt];
  if($row1[admin]==1){$tp=returntppd("../../upload/".$row1[userid]."/user.jpg","../img/nonetx.jpg");$sf="��";}
  elseif($row1[admin]==2){$tp=returntppd("../../upload/".$row1[selluserid]."/user.jpg","../img/nonetx.jpg");$sf="����";}
  elseif($row1[admin]==3){$tp="../img/nonetx.jpg";$sf="ƽ̨";}
  ?>
  <ul class="u1<? if($i==1){?> u0<? }?>">
  <li class="l1"><img src="<?=$tp?>" width="40" height="40" /></li>
  <li class="l2">[<?=$sf?>] <?=$txt?><br><?=$row1[sj]?></li>
  </ul>
  <? $i++;}?>
 </div>
</div>

<? if($row[ddzt]=="jf"){?>
<script language="javascript">
function tj(){
if(!confirm("ȷ��Ҫ�ύ����������")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
document.f1.content.value=document.getElementById("contentEditor").innerHTML;
f1.action="orderjf1.php?orderbh=<?=$orderbh?>";
}
</script>
<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="jf" name="jvs" />
<input type="hidden" value="<?=$orderbh?>" name="orderbh" />

<textarea name="content" style="display:none;"><?=$row[txt]?></textarea>
<div class="txtbox box">
<div class="dmain">
 <script id="editor" name="content" type="text/plain" style="width:100%;height:300px;"><?=$row[txt]?></script>
</div>
</div>
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�ύ����")?></div>
</div>

</form>

<div class="tishi box">
<div class="d1">
<strong>* վ����ʾ��</strong><br>
* ��ƽ̨��������У������Լ����ύ�������������֤��
</div>
</div>

<script type="text/javascript">

var ue= UE.getEditor('editor'

, {

            toolbars:[

            [ 'source', '|', 'forecolor',

                 'fontsize', '|',

                'link', 'unlink',

                'simpleupload']

        ]

        });
</script>
<? }?>

<div class="return-top" onClick="gotoTop()" style="display: none;"></div>

</body>
</html>