<?
 if($WAPLJ==1){$wapljv="../";}
 if(panduan("uid","yjcode_user where uid='".$uid."'")==1){Audit_alert("���ʺ��Ѿ���ע�ᣬ�����޸��ʺ�","reg.php");}
 //if(panduan("nc","yjcode_user where nc='".$nc."'")==1){Audit_alert("���ǳ��ѱ�ʹ�ã������޸��ǳ�","reg.php");}
 if(strlen($uid)<4 || strlen($uid)>20 || !preg_match("/^[_a-zA-Z0-9]*$/",$uid)){Audit_alert("��Ա�ʺŸ�ʽ����","reg.php");}
 
 if(!empty($rowcontrol[ipzcnum])){
  if(empty($ifadminreg)){
   $sj1=dateYMD($sj)." 00:00:00";
   $sj2=dateYMD($sj)." 23:59:59";
   if(returncount("yjcode_user where uip='".getuip()."' and sj>'".$sj1."' and sj<'".$sj2."'")>=$rowcontrol[ipzcnum]){Audit_alert("ע�����Ƶ��������������",weburl);}
  }
 }

 if(empty($_COOKIE['tjuserid'])){$tu=0;}else{$tu=$_COOKIE['tjuserid'];}
 $ifmot=returnjgdw($ifmot,"",0);
 if(empty($openid)){$ifqq=0;}else{$ifqq=1;}
 $sqli="insert into yjcode_user(uid,pwd,sj,uip,baomoney,money1,jf,nc,mot,ifmot,email,ifemail,uqq,yxsj,openid,ifqq,djl,pm,zt,openshop,shopzt,zfmm,sellmall,sellmyue,tjuserid,sellbl,sfzrz,wxopenid,unionid,ifmian)values('".$uid."','".sha1($pwd)."','".getsj()."','".getuip()."',0,0,0,'".$nc."','".$mot."',".$ifmot.",'".$email."',0,'".$uqq."','2014-10-15','".$openid."',".$ifqq.",0,0,1,0,0,'".sha1($pwd)."',0,0,".$tu.",".$rowcontrol[sellbl].",3,'".$wxopenid."','".$unionid."',".intval($ifmian).")";
 mysql_query("SET NAMES 'GBK'");mysql_query($sqli,$conn);
 $id=mysql_insert_id($conn);
 if(!empty($rowcontrol[regmoney]) && $rowcontrol[regmoney]>0){PointIntoM($id,"ע���Ա���ͽ��",$rowcontrol[regmoney]);PointUpdateM($id,$rowcontrol[regmoney]);}
 if(!empty($rowcontrol[regjf]) && $rowcontrol[regjf]>0){PointInto($id,"ע���Ա���ͻ���",$rowcontrol[regjf]);PointUpdate($id,$rowcontrol[regjf]);}
 createDir($wapljv."../upload/".$id."/");
 $_SESSION["SHOPUSER"]=$uid;
 $_SESSION["SHOPUSERPWD"]=sha1($pwd);
 intotable("yjcode_loginlog","admin,userid,sj,uip","1,".$id.",'".$sj."','".$uip."'");
?>