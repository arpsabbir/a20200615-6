<?php
/*
2014�����Ѽ��Ŷ�ȫ��Դ�벻�������ܴ���ȫ����Դ�������û����ο�����
ͬʱ���ǽ�����������������û��ṩ����֧�֡�
�����Դ�빺�����ת����Ϊ�����Ǽ�ɾ�������֤�ʺţ�ͬʱҲ�����ṩ�κ�֧�֡�
www.yj99.cn
�Ѽ�Դ��
*/

function sqlzhuru($content) { //ȥ������html��ǩ
        $pattern = "/(select[\s])|(union[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
        if (is_array($content)) {
            foreach ($content as $key=>$value) {
				if(get_magic_quotes_gpc()){$content[$key] = trim($value);}else{$content[$key] = addslashes(trim($value));}
                if(preg_match($pattern,$content[$key])) {
                    $content[$key] = '';
                }
            }
        } else {
			if(get_magic_quotes_gpc()){$content=$content;}else{$content=addslashes($content);}
            if(preg_match($pattern,$content)) {
                $content = '';
            }
        }
        $content=str_ireplace("<?","&lt;?",$content);
        $content=str_ireplace("?>","?&gt;",$content);
        $content=str_ireplace("<%","&lt;%",$content);
        $content=str_ireplace("%>","%&gt;",$content);
        return strip_tags($content);
    }

function sqlzhuru1($content){ //�༭��������HTML��ʽ
        $pattern = "/(select[\s])|(union[\s])|(insert[\s])|(update[\s])|(delete[\s])|(from[\s])|(where[\s])|(drop[\s])/i";
        if (is_array($content)) {
            foreach ($content as $key=>$value) {
				if(get_magic_quotes_gpc()){$content[$key] = trim($value);}else{$content[$key] = addslashes(trim($value));}
                if(preg_match($pattern,$content[$key])) {
                    $content[$key] = '';
                }
            }
        } else {
			if(get_magic_quotes_gpc()){$content=$content;}else{$content=addslashes($content);}
            if(preg_match($pattern,$content)) {
                $content = '';
            }
        }
        $content=str_ireplace("<?","&lt;?",$content);
        $content=str_ireplace("?>","?&gt;",$content);
        $content=str_ireplace("<%","&lt;%",$content);
        $content=str_ireplace("%>","%&gt;",$content);
        return $content;
}

function returndeldian($x){
$a=str_replace(".","",sqlzhuru($x));
$b=str_replace("/","",$a);
return $b;
}

function returnzhekou($m1,$m2){//m1�Żݼ� m2ԭ��
if($m1==0 || $m2==0){return "���ۿ�";}else{return sprintf("%.1f",10*$m1/$m2)."��";}
}

function isDate($dateString ) {
 if(date('Y-m-d H:i:s',strtotime($dateString))==$dateString){return $dateString;}else{return "";}
} 

function getsj(){
return date("Y-m-d H:i:s");
}

function delhtml($a){
 $a=str_replace(" ","",$a);
 $a=str_replace("\r\n", "",$a);
 return $a;
}

function returnzjjk($x){
 $x=intval($x);
 if($x==0){
 return "ϵͳ����";
 }elseif($x==1){
 return "�˹�����֧����";
 }elseif($x==2){
 return "�˹�����΢��";
 }elseif($x==3){
 return "֧������ֵ";
 }elseif($x==4){
 return "΢�ų�ֵ";
 }elseif($x==5){
 return "����Ա����";
 }
}

function getuip(){    
    $ip = '';    
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){        
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];    
    }elseif(isset($_SERVER['HTTP_CLIENT_IP'])){        
        $ip = $_SERVER['HTTP_CLIENT_IP'];    
    }else{        
        $ip = $_SERVER['REMOTE_ADDR'];    
    }
    $ip_arr = explode(',', $ip);
    return $ip_arr[0];
 }

function returndw($m,$d,$t=""){
 if(empty($m)){return $t;}else{return $m.$d;}
}

function returnhz($t){
$a=preg_split("/\./",$t);
return $a[count($a)-1];
}

function returnnotp($t,$a=""){
 $tpv=preg_split("/\./",$t);
 for($i=0;$i<count($tpv)-1;$i++){
  $astr=$astr.$tpv[$i];
  if($i<count($tpv)-2){$astr=$astr.".";}
 }
 $wstr=$astr.$a.".".$tpv[count($tpv)-1];
 if(!check_in("http",$t)){$wstr=weburl.$wstr;}
 return $wstr;
}

function returnguolvty($x){
 if(1==$x){return "IP��ַ";}
 elseif(2==$x){return "�ֻ�����";}
}

function rentser($x,$xv,$y,$yv,$nq="search",$z='',$zv='',$w='',$wv=''){
if(empty($nq)){$nq="search";}
$nstr=$_GET[str];
if(!check_in("_".$x.$xv."v",$nstr)){
if(check_in("_".$x,$nstr)){
 $a=preg_split("/_".$x."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$x.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$x.$xv."v".$d[1];
}else{
 $nstr=$nstr."_".$x.$xv."v";
}
}
if($y!=""){
if(!check_in("_".$y.$yv."v",$nstr)){
if(check_in("_".$y,$nstr)){
 $a=preg_split("/_".$y."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$y.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$y.$yv."v".$d[1];
}else{
 $nstr=$nstr."_".$y.$yv."v";
}
}
}
if($z!=""){
if(!check_in("_".$z.$zv."v",$nstr)){
if(check_in("_".$z,$nstr)){
 $a=preg_split("/_".$z."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$z.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$z.$zv."v".$d[1];
}else{
 $nstr=$nstr."_".$z.$zv."v";
}
}
}
if($w!=""){
if(!check_in("_".$w.$wv."v",$nstr)){
if(check_in("_".$w,$nstr)){
 $a=preg_split("/_".$w."/",$nstr);
 $re3=preg_split("/_/",$a[1]);
 $b=preg_split("/v/",$re3[0]);
 $ssr="";for($ri=0;$ri<count($b);$ri++){$ssr=$ssr.$b[$ri];if($ri<(count($b)-2)){$ssr=$ssr."v";}}
 $d=preg_split("/_".$w.$ssr."v/",$nstr);
 $nstr=$a[0]."_".$w.$wv."v".$d[1];
}else{
 $nstr=$nstr."_".$w.$wv."v";
}
}
}
if($xv==""){$nstr=str_replace("_".$x."v","",$nstr);}
if($yv==""){$nstr=str_replace("_".$y."v","",$nstr);}
if($zv==""){$nstr=str_replace("_".$z."v","",$nstr);}
if($wv==""){$nstr=str_replace("_".$w."v","",$nstr);}
return ($nq.$nstr).".html";}

function inp_tp_upload($ni,$mcnur,$mcname,$gs=""){
 $i=$ni;
 if(check_in(";",$_FILES["inp$i"]["tmp_name"])){exit;}
 if(!empty($_FILES["inp$i"]["tmp_name"])){
 $filetype = strtolower($_FILES["inp$i"]['type']);
 $tp = array("image/gif","image/pjpeg","image/jpeg","image/jpg","image/x-png","image/png","application/x-shockwave-flash","application/octet-stream","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet","video/mpeg4","video/mp4"); 
 if(!in_array($_FILES["inp$i"]["type"],$tp)){ 
 echo "<script>alert('��ʽ����');history.go(-1);</script>";exit;
 }
 $gs=strtolower($gs);
 if($filetype == 'image/jpeg'){$type = '.jpg';}
 if($filetype == 'image/jpg'){$type = '.jpg';}
 if($filetype == 'image/pjpeg'){$type = '.jpg';}
 if($filetype == 'image/gif'){$type = '.gif';}
 if($filetype == 'image/x-png' || $filetype=='image/png'){$type = '.png';}
 if($filetype == 'application/x-shockwave-flash'){$type = '.swf';}
 if($filetype == 'application/octet-stream'){$type = '.flv';}
 if($filetype == 'application/vnd.ms-excel'){$type = '.xls';}
 if($filetype == 'video/mpeg4' || $filetype == 'video/mp4'){$type = '.mp4';}
 $tna=$_FILES["inp$i"]["name"]; 
 if($gs==""){$gsv=$type;}else{$gsv=".".$gs;}
 move_uploaded_file($_FILES["inp$i"]['tmp_name'],$mcnur.$mcname.$gsv);
 $lastB=$mcname.$gsv;}else{$lastB="";}return $lastB;
}

function getDir($dir){$dirArray[]=NULL;if (false != ($handle = opendir ( $dir ))) {$i=0;while ( false !== ($file = readdir ( $handle )) ) {if ($file != "." && $file != ".."&&!strpos($file,".")) {$dirArray[$i]=$file;$i++;}}closedir ( $handle );}return $dirArray;}

function js_unescape($str){  //PHP��escape����
$ret = '';$len = strlen($str);for($i=0;$i<$len;$i++){if ($str[$i] == '%' && $str[$i+1] == 'u'){$val = hexdec(substr($str, $i+2, 4));if ($val < 0x7f) $ret .= chr($val);else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));$i += 5;}else if ($str[$i] == '%'){$ret .= urldecode(substr($str, $i, 3));$i += 2;}else $ret .= $str[$i];}return iconv('utf-8', 'gb2312', $ret);}

 function DateDiff($date1, $date2, $unit = "") {switch($unit){case 's':$dividend = 1;break;case 'i':$dividend = 60;break;case 'h':$dividend = 3600;break;case 'd':$dividend = 86400;break;default:$dividend = 86400;}$time1 = strtotime($date1);$time2 = strtotime($date2);if ($time1 && $time2) return (float)($time1 - $time2) / $dividend;return false;}function read_file_content($FileName) {$fp=fopen($FileName,"r"); $data=""; while(!feof($fp)) {$data.=fread($fp,4096); } fclose($fp); return $data; }function returnsx($x){$nstr=$_GET[str];if(check_in("_".$x,$nstr)){$re1=preg_split("/_".$x."/",$nstr);$re3=preg_split("/_/",$re1[1]);$re2=preg_split("/v/",$re3[0]);$ssr="";for($ri=0;$ri<count($re2);$ri++){$ssr=$ssr.$re2[$ri];if($ri<(count($re2)-2)){$ssr=$ssr."v";}}if($ssr==""){$nr=-1;}else{$nr=$ssr;}return $nr;}else{return -1; }}function check_in($arr, $text){$keys = explode(',',$arr);$result = 0;if($keys){foreach($keys as $key){if(strstr($text,$key)!=''){$result = 1;break;}}}return $result;}function returnjgdw($m,$d,$t="����"){if(empty($m)){return $t;}else{return $m.$d;}}
 
function returntppd($tp1,$tp2){if(is_file($tp1)){return $tp1;}else{return $tp2;}} //��Ϊ������OSS���������ͼƬ�жϺ�������ʧЧ��
 
function safeEncoding($string){global $rowcontrol;if(empty($rowcontrol[sermode])){return base_decode(($string));}else{return $string;}}

function base_encode($str){$src  = array("/","+","=");$dist = array("|a","|b","|c");$old  = base64_encode($str);$new  = str_replace($src,$dist,$old);return $new;}

function base_decode($str){$src = array("|a","|b","|c");$dist  = array("/","+","=");$old  = str_replace($src,$dist,$str);$new = base64_decode($old);return $new;}


function returntitcss($t,$b,$c){$tit=$t;if(1==$b){$tit="<strong>".$tit."</strong>";}if(!empty($c) && $c!="#333"){$tit="<font color='".$c."'>".$tit."</font>";}return $tit;}function returntitdian($t,$l){$len=strlen($t);if($len>$l){return strgb2312($t,0,$l-3)."...";}else{return $t;}}function returnztv($zv,$zvsm=""){if(0==$zv){$ztv="<span class='blue'>��ͨ�����</span>";}elseif(1==$zv){$ztv="<span class='feng'>�������</span>";}elseif(2==$zv){$ztv="<span class='red'>��˲�ͨ��,".$zvsm."</span>";}return $ztv;}function htmlget($url){$ch = curl_init();curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_REFERER, CHR);curl_setopt($ch, CURLOPT_HEADER,0);$output = curl_exec($ch);curl_close($ch);return $output;}function systs($a,$b){if($_GET[t]=="suc"){echo "<div class=\"systs\">".$a."[<a href=\"".$b."\">֪����</a>]</div>";}}
function rnd_num($num){$seedarray =microtime();$seedstr =preg_split("/\s/",$seedarray,5);$seed =$seedstr[0]*10000;srand($seed);return rand(1,$num);}
function strgb2312($str, $start, $len) {$tmpstr = "";$strlen = $start + $len;for($i = 0; $i < $strlen; $i++) {if(ord(substr($str, $i, 1)) > 0xa0) {$tmpstr .= substr($str, $i, 2);$i++;} else$tmpstr .= substr($str, $i, 1);}return $tmpstr;}function dateYMDN($m){$a=preg_split("/\s/",$m);$b=str_replace("-","",$a[0]);$b=str_replace("/","",$b);return $b;}
function returnonecon($x){
 if(1==$x){return "��Աע��Э��";}
 elseif(2==$x){return "��������";}
 elseif(3==$x){return "������";}
 elseif(4==$x){return "��ϵ����";}
 elseif(5==$x){return "��˽����";}
 elseif(6==$x){return "��������";}
 elseif(7==$x){return "����Э��";}
 elseif(8==$x){return "��Ʒ��������";}
 elseif(9==$x){return "��Ʒ���׹���";}
}function dateYMD($m){$a=preg_split("/\s/",$m);return $a[0];}function dateMD($m){$a=dateYMD($m);$b=preg_split("/-/",$a);$mv=$b[1];$dv=$b[2];return $mv."/".$dv;}function dateYMDHM($m){$a=preg_split("/:/",$m);return $a[0].":".$a[1];}function is_date($date){if($date == date('Y-m-d H:i:s',strtotime($date))){return true;}else{return false;}}

function MakePass($length){$possible = "0123456789";$str="";while(strlen($str)<$length){$str.= substr($possible,(rand() % strlen($possible)),1);}return($str);}function MakePassAll($length){$possible = "abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ23456789";$str="";while(strlen($str)<$length){$str.= substr($possible,(rand() % strlen($possible)),1);}return($str);}function returnjgdian($a){$b=preg_split("/\./",$a);if(count($b)>1){return $a;}elseif(0==$a){return 0;}else{return $a.".00";}}function returnyhmoney($m,$m2,$m3,$s1,$s2,$s3,$d){if(2==$m){if($s1>=$s2 && $s1<=$s3){$mv=$m3;}else{$mv=$m2;}if($s1>$s3){updatetable("yjcode_pro","yhxs=1 where id=".$d);}}else{$mv=$m2;}return $mv;}

function returnshopztv($x){
 if(0==$x){return "<span class='hui'>δ�ύ����</span>";}
 elseif(1==$x){return "<span class='feng'>�������</span>";}
 elseif(2==$x){return "<span class='blue'>��������</span>";}
 elseif(3==$x){return "<span class='red'>��˱���</span>";}
 elseif(4==$x){return "<span class='red'>�Ѿ�����</span>";}
}
function returntxzt($x,$y){
 if(1==$x){return "<span class='blue'>���ֳɹ�</span>";}
 elseif(2==$x){return "<span class='hui'>�û��Ѿ���������</span>";}
 elseif(3==$x){return "<span class='red'>����ʧ��,".$y."</span>";}
 elseif(4==$x){return "<span class='green'>�ȴ�����</span>";}
}
function returnadminqx(){
$qx=array("0101,��Ʒ�༭|0102,��Ʒ�鿴|0103,��Ʒɾ��",
		  "0201,��Ѷ�༭|0202,��Ѷ�鿴|0203,��Ѷɾ��",
		  "0301,ȫ�ֱ༭|0302,ȫ�ֲ鿴|0303,ȫ��ɾ��",
		  "0401,�����༭|0402,�����鿴|0403,����ɾ��",
		  "0601,���༭|0602,���鿴|0603,���ɾ��",
		  "0701,��Ա�༭|0702,��Ա�鿴|0703,��Աɾ��"
		  );	
return $qx;
}

function returnorderzt($zv){
if($zv=="suc"){ //���׳ɹ�
$ztv="<span class='green'>���׳ɹ�</span>";
}elseif($zv=="wait"){ //�ȴ�����
$ztv="<span class='red'>�ȴ�����</span>";
}elseif($zv=="db"){ //�ȴ�����ջ�
$ztv="<span class='blue'>�ѷ���</span>";
}elseif($zv=="back"){ //��Ҫ������˿�
$ztv="<span class='feng'>�˿����</span>";
}elseif($zv=="backsuc"){ //�˿�ɹ�
$ztv="<span class='hui'>�˿�ɹ�</span>";
}elseif($zv=="backerr"){ //�˿�����ܾ�
$ztv="<span class='red'>��ͬ���˿�</span>";
}elseif($zv=="wpay"){ //�ȴ���Ҹ���
$ztv="<span class='hui'>�ȴ���Ҹ���</span>";
}elseif($zv=="close"){ //������ȡ��
$ztv="<span class='hui'>����ȡ��</span>";
}elseif($zv=="jf"){ //���״���
$ztv="<span class='red'>���״���</span>";
}elseif($zv=="jfbuy"){ //��ʤ��
$ztv="<span class='blue'>��ʤ��</span>";
}elseif($zv=="jfsell"){ //����ʤ��
$ztv="<span class='green'>����ʤ��</span>";
}
return $ztv;
}

function returntask($zv){
if($zv==0){
$ztv="<span class='hui zt0'>�ȴ�����</span>";
}elseif($zv==1){
$ztv="<span class='feng zt1'>���������</span>";
}elseif($zv==2){
$ztv="<span class='red zt2'>��˲�ͨ��</span>";
}elseif($zv==3){
$ztv="<span class='green zt3'>�ѳн�</span>";
}elseif($zv==4){
$ztv="<span class='feng zt4'>�ȴ�����ȷ��</span>";
}elseif($zv==5){
$ztv="<span class='blue zt5'>���׳ɹ�</span>";
}elseif($zv==6){
$ztv="<span class='hui zt6'>����ȡ������</span>";
}elseif($zv==7){
$ztv="<span class='hui zt7'>���ַ�ȡ������</span>";
}elseif($zv==8){
$ztv="<span class='red zt8'>���׾���,ƽ̨����</span>";
}elseif($zv==9){
$ztv="<span class='hui zt9'>���׹ر�</span>";
}elseif($zv==10){
$ztv="<span class='hui zt10'>�Ѿ�����</span>";
}elseif($zv==100){
$ztv="<span class='red zt100'>�ȴ����ɷ���</span>";
}elseif($zv==101){
$ztv="<span class='green zt101'>���������</span>";
}elseif($zv==102){
$ztv="<span class='blue zt102'>�������</span>";
}elseif($zv==103){
$ztv="<span class='hui zt103'>����ȡ��</span>";
}elseif($zv==104){
$ztv="<span class='hui zt104'>������</span>";
}elseif($zv==105){
$ztv="<span class='feng zt105'>���������</span>";
}elseif($zv==106){
$ztv="<span class='red zt106'>��˲�ͨ��</span>";
}
return $ztv;
}

function returntask1($zv){
if($zv==0){
$ztv="<span class='hui'>����������</span>";
}elseif($zv==1){
$ztv="<span class='feng'>��������</span>";
}elseif($zv==2){
$ztv="<span class='blue'>���׳ɹ�</span>";
}elseif($zv==3){
$ztv="<span class='red'>���ղ�ͨ��</span>";
}elseif($zv==4){
$ztv="<span class='red'>����,ƽ̨����</span>";
}elseif($zv==5){
$ztv="<span class='blue'>���ַ�ȡ������</span>";
}elseif($zv==7){
$ztv="<span class='hui'>���׹ر�</span>";
}
return $ztv;
}

function returngdzt($zv){
if($zv==1){$ztv="<span class='feng'>�ȴ�����</span>";}
elseif($zv==2){$ztv="<span class='blue'>������</span>";}
elseif($zv==3){$ztv="<span class='red'>�ȴ�����</span>";}
elseif($zv==4){$ztv="<span class='green'>�ѽᵥ</span>";}
return $ztv;
}

function returntaskjgxs($x){
if(empty($x)){return "һ�ڼ�";}
elseif($x==1){return "��Χ����";}
elseif($x==2){return "���ű���";}
}

function returntaskxs($x){
if(empty($x)){return "��������";}
elseif($x==1){return "��������";}
}

function returntaskjg($x,$m1,$m2){
if(empty($x)){return $m1;}
elseif($x==1){return $m1."-".$m2;}
elseif($x==2){return "�����̱���";}
}

function returnfhxs($x){
if($x==1){return "�ֶ�����";}
elseif($x==2){return "��������";}
elseif($x==3){return "��վ����";}
elseif($x==4){return "��ʾ����";}
elseif($x==5){return "�������";}
}

function returnshoptype($x){
if(empty($x)){return "רӪ��";}
elseif($x==1){return "�콢��";}
elseif($x==2){return "��Ӫ";}
}

function returnpjlx($x){
if($x==1){return "����";}
elseif($x==2){return "����";}
elseif($x==3){return "���";}
}

function returnmyweb($x,$y){//$x��ʾID $y��ʾ�Զ�����ַ
if(empty($y)){return weburl."shop/view".$x.".html";}
else{return weburl."vip".$y;}
}

function returnbh(){
$a=str_replace(" ","",microtime());
$a=str_replace(".","",$a);
return $a;
}

function cut_str($string, $sublen, $start = 0, $code = 'gb2312')
{
    if($code == 'UTF-8')
    {
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
        preg_match_all($pa, $string, $t_string);
        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen));
        return join('', array_slice($t_string[0], $start, $sublen));
    }
    else
    {
        $start = $start*2;
        $sublen = $sublen*2;
        $strlen = strlen($string);
        $tmpstr = '';
        for($i=0; $i< $strlen; $i++)
        {
            if($i>=$start && $i< ($start+$sublen))
            {
                if(ord(substr($string, $i, 1))>129)
                {
                    $tmpstr.= substr($string, $i, 2);
                }
                else
                {
                    $tmpstr.= substr($string, $i, 1);
                }
            }
            if(ord(substr($string, $i, 1))>129) $i++;
        }
        //if(strlen($tmpstr)< $strlen ) $tmpstr.= "...";
        return $tmpstr;
    }
}
function returnjiami($w){
return cut_str($w,1,0).'***'.cut_str($w,1,strlen($w)/2-1);
}
?>