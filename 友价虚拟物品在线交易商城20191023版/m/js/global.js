//�������Ѽ��̳�ϵͳȫ��JS��
//����ģ��Ӱ�죬
//�����κ�ģ�嶼���Ի���ܵ��õ�һЩͨ����ʽ��д������
//www.yj99.cn�������޸�

function isEmail(str){//�ж�����
var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
return reg.test(str);
}

function tjwait(){
document.getElementById("tjbtn").style.display="none";
document.getElementById("tjing").style.display="";	
}

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

function addNum(num1,num2){
var sq1,sq2,m;
try{sq1=num1.toString().split(".")[1].length;} catch(e){sq1=0;}
try{sq2=num2.toString().split(".")[1].length;} catch(e){sq2=0;}
m=Math.pow(10,Math.max(sq1,sq2));
return ( num1 * m + num2 * m ) / m;
}

function accMul(arg1,arg2){
 var m=0,s1=arg1.toString(),s2=arg2.toString();
 try{m+=s1.split(".")[1].length}catch(e){}
 try{m+=s2.split(".")[1].length}catch(e){}
 return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m);
}

function layerts(x){
layer.open({
    content: x
    ,skin: 'msg'
    ,time: 3
  });
}

function gotoTop(acceleration,stime){acceleration=acceleration||0.1;stime=stime||10;var x1=0;var y1=0;var x2=0;var y2=0;var x3=0;var y3=0;if(document.documentElement){x1=document.documentElement.scrollLeft||0;y1=document.documentElement.scrollTop||0;}
if(document.body){x2=document.body.scrollLeft||0;y2=document.body.scrollTop||0;}
var x3=window.scrollX||0;var y3=window.scrollY||0;var x=Math.max(x1,Math.max(x2,x3));var y=Math.max(y1,Math.max(y2,y3));var speeding=1+ acceleration;window.scrollTo(Math.floor(x/speeding),Math.floor(y/speeding));if(x>0||y>0){var run="gotoTop("+ acceleration+", "+ stime+")";window.setTimeout(run,stime);}}

function sertjonc(x,y){ //x��ʾ��ǰID��y��ʾ���е�
document.body.scrollTop = 0;
s=document.getElementById("sertj"+x);
if(s.style.display==""){s.style.display="none";}else{s.style.display="";}
for(i=1;i<=y;i++){
if(x!=i){document.getElementById("sertj"+i).style.display="none";}
}
}

function qqtang(x){
str="<div class='qqtang'><span class='qqtang1'>QQ:<strong id='qq_element'>"+x+"</strong></span>";
str=str+"<span class='qqtang2'><a href='tencent://AddContact/?fromId=45&fromSubId=1&subcmd=all&uin="+x+"' target='_blank'>ֱ�ӶԻ�</a></span>";
str=str+"<span class='qqtang2' onClick=\"copyToClipboard('qq_element')\">���ƺ���</span>";
str=str+"<span class='qqtang4'>��������QQ�����û��ṩ��ƽ̨��ȷ������ʵ�ԣ��漰�ʽ���ʱ�����ʵ��Ҫ�������Ʒ���QQ���Ƿ��й���������QQ��Ч��ð�õ������</span></div>";
layer.open({
    content: str
  });
}

//����
function copyToClipboard(elementId) {
  var aux = document.createElement("input");
  aux.setAttribute("value", document.getElementById(elementId).innerHTML);
  document.body.appendChild(aux);
  aux.select();
  document.execCommand("copy");
  document.body.removeChild(aux);
  layerts("�Ѹ���");
}
