<?
include("../config/conn.php");
include("../config/function.php");
sesCheck();
$money1=$_GET[money1];
$sj=date("Y-m-d H:i:s");
if(sqlzhuru($_POST[jvs])=="pay"){
 zwzr();
 $t1=sqlzhuru($_POST[t1]);
 $t2=sqlzhuru($_POST[t2]);
 if(empty($t1)){Audit_alert("��������ɨ��֧��һ�µĽ��","alipay_ewm.php");}
 if(empty($t2)){Audit_alert("������ɨ��֧���ɹ����֧����������","alipay_ewm.php");}
 if(panduan("*","yjcode_payreng where ddbh='".$t2."'")){Audit_alert("��֧�����������Ѿ�¼�룬�޷��ظ��ύ","alipay_ewm.php");}
 $userid=returnuserid($_SESSION[SHOPUSER]);
 intotable("yjcode_payreng","money1,type1,userid,ddbh,sj,ifok","".$t1.",1,".$userid.",'".$t2."','".$sj."',1");
 php_toheader("alipay_ewm.php?t=suc"); 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="x-ua-compatible" content="ie=7" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�û�������� - <?=webname?></title>
<? include("cssjs.html");?>
<script language="javascript">
function tj(){
 if((document.f1.t1.value).replace("/\s/","")==""){alert("��������ɨ��֧��һ�µĽ��");document.f1.t1.focus();return false;}
 if((document.f1.t2.value).replace("/\s/","")==""){alert("������ɨ��֧���ɹ����֧����������");document.f1.t2.focus();return false;}
 if(!confirm("ȷ���Ѿ�ɨ��֧��������������Ϣ����ʵ")){return false;}
 layer.msg('�����ύ', {icon: 16  ,time: 0,shade :0.25});
 tjwait();
 f1.action="alipay_ewm.php";
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
 <li class="l1 l2"><a href="alipay_ewm.php">ɨ��֧��</a></li>
 </ul>

 <!--��B-->
 <div class="rkuang">
 
 <? systs("��ϲ���������ɹ���<strong>���ǽ������ʵ����</strong>�����Ե�!","alipay_ewm.php")?>
 <ul class="uk1">
 <li class="l1"></li>
 <li class="l2"><img src="../img/alipay_ewm.jpg" width="150" height="150" /></li>
 </ul>
 
 <form name="f1" method="post" onSubmit="return tj()">
 <input type="hidden" value="pay" name="jvs" />
 <ul class="uk">
 <li class="l1">������ʾ��</li>
 <li class="l21">����ֻ�<span class="red">֧����</span>��ɨ�����϶�ά���ֵת�ˣ��������ʣ�����ѯ�Ҳ�ͷ�QQ</li>
 <li class="l1">��ֵ��</li>
 <li class="l2"><input type="text" class="inp" name="t1" value="<?=$money1?>" /> <span class="red fd">�������ʵ�ʳ�ֵ����һ��</span></li>
 <li class="l1">֧���������ţ�</li>
 <li class="l2"><input type="text" class="inp" name="t2" /> <span class="red fd">������ɨ��֧���ɹ����֧����������</span></li>
 <li class="l3"><? tjbtnr("�ύ��ֵ")?></li>
 </ul>
 </form>
 
 </div>
 <!--��E-->

</div> 
<!--RE-->

</div>

<div class="clear clear15"></div>
<? include("../tem/bottom.html");?>
</body>
</html>