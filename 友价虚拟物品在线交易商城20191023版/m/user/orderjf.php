<?
include("../../config/conn.php");
include("../../config/function.php");
sesCheck_m();
$userid=returnuserid($_SESSION["SHOPUSER"]);
$orderbh=$_GET[orderbh];
$sj=date("Y-m-d H:i:s");
while0("*","yjcode_order where orderbh='".$orderbh."' and ddzt='backerr' and userid=".$userid);if(!$row=mysql_fetch_array($res)){php_toheader("order.php");}

if(sqlzhuru($_POST[jvs])=="jf"){
 zwzr();
 $txt=sqlzhuru1($_POST["content"]);
 if(empty($txt)){Audit_alert("�����������ݲ���Ϊ�գ��������ԣ�","orderjf.php?orderbh=".$orderbh);}
 intotable("yjcode_orderlog","orderbh,userid,selluserid,admin,txt,sj","'".$orderbh."',".$row[userid].",".$row[selluserid].",1,'".$txt."','".$sj."'");
 updatetable("yjcode_order","ddzt='jf' where orderbh='".$orderbh."'");
 deletetable("yjcode_db where orderbh='".$orderbh."' and userid=".$userid);
 deletetable("yjcode_tk where orderbh='".$orderbh."' and userid=".$userid);
 php_toheader("orderview.php?orderbh=".$orderbh); 

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

<script src="../eleditor/jquery.min.js"></script>
<script src="../eleditor/eleditor.min.js"></script>
<script src="../eleditor/webuploader.min.js"></script>
<script language="javascript">
var Edr = new Eleditor({
el: '#contentEditor',
upload:{
server: '../eleditor/upload.json',
},
});
</script>

</head>
<body>
<? include("topuser.php");?>

<div class="bfbtop1 box">
 <div class="d1" onClick="gourl('order.php')"><img src="img/topleft.png" height="21" /></div>
 <div class="d2">����ͷ�����</div>
 <div class="d3"></div>
</div>


<script language="javascript">
function tj(){
if(!confirm("ȷ��Ҫ����ͷ�������")){return false;}
layer.open({type: 2,content: '�����ύ',shadeClose:false});
document.f1.content.value=document.getElementById("contentEditor").innerHTML;
f1.action="orderjf.php?orderbh=<?=$orderbh?>";
}
</script>
<form name="f1" method="post" onSubmit="return tj()">
<input type="hidden" value="jf" name="jvs" />
<input type="hidden" value="<?=$orderbh?>" name="orderbh" />

<textarea name="content" style="display:none;"><?=$row[txt]?></textarea>
<div class="txtbox box">
<div class="dmain">
 <div id="contentEditor"><?=returnjgdw($row[txt],"","������б༭����")?></div>
</div>
</div>
<div class="fbbtn box">
 <div class="d1"><? tjbtnr_m("�ύ����")?></div>
</div>

</form>

<div class="tishi box">
<div class="d1">
<strong>* վ����ʾ��</strong><br>
* ������ʽ𽫱�����ֱ�����������<br>
* �ṩ��ϸ���˿��������ɣ�����������ƽ̨�����ξ���	
</div>
</div>

<script>
var contentEditor = new Eleditor({
						el: '#contentEditor',
						upload:{
							server: '../eleditor/',
							formData: {
								'token': '123123'
							},
							compress: false,
							fileSizeLimit: 2
						},
						/*��ʼ����ɹ���*/
						mounted: function(){

						},
						changer: function(){
							console.log('�ĵ��޸�');
						},
						/*�Զ��尴ť������*/
						toolbars: [
							'insertText',
							'editText',
							//'insertImage',
							'insertLink',
							'insertHr',
							'delete',
			              'undo',
			              'cancel'
						]
						//placeHolder: 'placeHolder����ռλ��'
					});
</script>

</body>
</html>