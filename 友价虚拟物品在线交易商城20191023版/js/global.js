//�������Ѽ��̳�ϵͳȫ��JS��
//����ģ��Ӱ�죬
//�����κ�ģ�嶼���Ի���ܵ��õ�һЩͨ����ʽ��д������
//www.yj99.cn�������޸�

//�ֻ����ж�
function is_mobile() {
  var regex_match = /(nokia|iphone|android|motorola|^mot-|softbank|foma|docomo|kddi|up.browser|up.link|htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte-|longcos|pantech|gionee|^sie-|portalmmm|jigs browser|hiptop|^benq|haier|^lct|operas*mobi|opera*mini|320x320|240x320|176x220)/i;
  var u = navigator.userAgent;
  if (null == u) {
   return true;
  }
  var result = regex_match.exec(u);
  if (null == result) {
   return false
  } else {
   return true
  }
}

//ͷ����¼��֤
function userCheckses(){
$.get(document.getElementById("webhttp").innerHTML+"tem/sesCheck.php",{},function(result){
 if(result=="0"){
 document.getElementById("notlogin").style.display="";
 document.getElementById("yeslogin").style.display="none";
 return false;
 }else{
 r=result.split(" ");
 document.getElementById("yeslogin").style.display="";
 document.getElementById("notlogin").style.display="none";
 document.getElementById("yesuid").innerHTML=r[0];
 if(r[1]=="yes"){document.getElementById("dontqd").style.display="";document.getElementById("needqd").style.display="none";}
 else{document.getElementById("dontqd").style.display="none";document.getElementById("needqd").style.display="";}
 return false;
 }
});
}


//����QQ��ϵ
function opentangqq(x){
layer.open({
  type: 2,
  shadeClose :true,
  area: ['320px', '170px'],
  title:["QQ��ϵ","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:[document.getElementById("webhttp").innerHTML+'tem/tangqq.php?qq='+x, 'no'] 
});
}

//���
function addNum(num1,num2){ //�������С�����λ�����
var sq1,sq2,m;
try{sq1=num1.toString().split(".")[1].length;} catch(e){sq1=0;}
try{sq2=num2.toString().split(".")[1].length;} catch(e){sq2=0;}
m=Math.pow(10,Math.max(sq1,sq2));
return ( num1 * m + num2 * m ) / m;
}

//���
function accMul(arg1,arg2){
 var m=0,s1=arg1.toString(),s2=arg2.toString();
 try{m+=s1.split(".")[1].length}catch(e){}
 try{m+=s2.split(".")[1].length}catch(e){}
 return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
}

//�ύ
function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

//�����ж�
function isEmail(str){//�ж�����
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

//�ص�����
function gotoTop(acceleration,stime){acceleration=acceleration||0.1;stime=stime||10;var x1=0;var y1=0;var x2=0;var y2=0;var x3=0;var y3=0;if(document.documentElement){x1=document.documentElement.scrollLeft||0;y1=document.documentElement.scrollTop||0;}
if(document.body){x2=document.body.scrollLeft||0;y2=document.body.scrollTop||0;}
var x3=window.scrollX||0;var y3=window.scrollY||0;var x=Math.max(x1,Math.max(x2,x3));var y=Math.max(y1,Math.max(y2,y3));var speeding=1+ acceleration;window.scrollTo(Math.floor(x/speeding),Math.floor(y/speeding));if(x>0||y>0){var run="gotoTop("+ acceleration+", "+ stime+")";window.setTimeout(run,stime);}}

//����DIS
function objdis(x,y){
 if(0==x){document.getElementById(y).style.display="none";}	
 else if(1==x){document.getElementById(y).style.display="";}	
}

//��ת
function gourl(x){
 location.href=x;
}

//ȫѡ
function xuan(){
 c2=document.getElementsByName("C2");
 c=document.getElementsByName("C1");
 if(c2[0].checked){
 for(i=0;i<c.length;i++){
 c[i].checked="checked";
 }
 }else{
 for(i=0;i<c.length;i++){
 c[i].checked=false;
 }
 }
}
function xuan1(){
 c21=document.getElementsByName("C21");
 c11=document.getElementsByName("C11");
 if(c21[0].checked){
 for(i=0;i<c11.length;i++){
 c11[i].checked="checked";
 }
 }else{
 for(i=0;i<c11.length;i++){
 c11[i].checked=false;
 }
 }
}

function textinto(x,y){
document.getElementById(x).value=y;	
}


//������¼����
function tclogin(){
layer.open({
  type: 2,
  area: ['650px', '425px'],
  title:false,
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['../tem/openw.php', 'no'] 
});
}

//�����ٱ�����
function jbtang(x,y){
layer.open({
  type: 2,
  area: ['650px', '495px'],
  title:["�ٱ�����","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['../tem/jubao.php?admin='+x+"&id="+y, 'no'] 
});
}
