<?
if(empty($uid) || empty($pwd)){Audit_alert("�ʺŻ������������󣬷�������","./");}
 $sql="select * from yjcode_user where (uid='".$uid."' or (mot='".$uid."' and ifmot=1)) and pwd='".sha1($pwd)."'";mysql_query("SET NAMES 'GBK'");$res=mysql_query($sql,$conn);
 ;if(!$row=mysql_fetch_array($res)){Audit_alert("�ʺ�������֤�����뷵������","./");}
 if(0==$row[zt]){Audit_alert("�����ʺ��ѱ����ã�����ϵ��վ�ͷ�����","./");}
 $sj=date("Y-m-d H:i:s");
 intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$row[id].",'".$sj."','".getuip()."'");
 $_SESSION["SHOPUSER"]=$row[uid];
 $_SESSION["SHOPUSERPWD"]=$row[pwd];
?>