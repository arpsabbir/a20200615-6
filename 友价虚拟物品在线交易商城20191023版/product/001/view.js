function djmonc(){
layer.open({
  type:1,
  title: "��ͬ��Ա�ȼ������Żݼ۸�˵��",
  closeBtn: 1,
  area: '302px',
  skin: 'layui-layer-nobg', //û�б���ɫ
  shadeClose: true,
  content: $('#vipmoney')
});
}

//�ײ�ѡ��
var taocanid=0;
var taocanid2=0;
var pretc1id=0;
function taocanonc(a,b,c,d,e,f,g){
 document.getElementById("tkcnum").value=1;
 document.getElementById("utc1").className="utc";
 document.getElementById("nowkcnum").innerHTML=g;
 taocanid=e;
 taocanid2=0;
 if(pretc1id!=0){if(document.getElementById("tc2div"+pretc1id)){document.getElementById("tc2div"+pretc1id).style.display="none";}}
 if(document.getElementById("tc2div"+e)){document.getElementById("tc2div"+e).style.display="";}
 pretc1id=e;
 tc2re(taocanid);
 document.getElementById("nowmoney").innerHTML=c;
 document.getElementById("nowmoneyY").innerHTML=c;
 for(i=1;i<=b;i++){
 document.getElementById("taocana"+i).className="";
 }
 document.getElementById("taocana"+a).className="a1";
}
function taocan2onc(a,b,c,d,e,f,g){
 if(taocanid==0){alert("����ѡ���һ���ײ�����");document.getElementById("utc1").className="utc utc1";return false;}
 document.getElementById("tkcnum").value=1;
 document.getElementById("tc2div"+taocanid).className="utc";
 document.getElementById("nowkcnum").innerHTML=g;
 taocanid2=e;
 tc2re(taocanid);
 document.getElementById("nowmoney").innerHTML=c;
 document.getElementById("nowmoneyY").innerHTML=c;
 document.getElementById("taocan2a"+taocanid+"_"+a).className="a1";
}
function tc2re(x){
if(document.getElementById("tc2num"+x)){
document.getElementById("tc2div"+x).className="utc";
a=parseInt(document.getElementById("tc2num"+x).innerHTML);
for(i=1;i<=a;i++){
document.getElementById("taocan2a"+x+"_"+i).className="";
}
}
}

function shujia(){
 a=parseInt(document.getElementById("tkcnum").value);
 if(isNaN(a)){document.getElementById("tkcnum").value=1;a=1;}
 if(a<0){document.getElementById("tkcnum").value=1;}
 else{
 document.getElementById("tkcnum").value=a+1;
 }
 moneycha();
}

function shujian(){
 a=parseInt(document.getElementById("tkcnum").value);
 if(isNaN(a)){document.getElementById("tkcnum").value=1;a=1;}
 if(a<=1){document.getElementById("tkcnum").value=1;}
 else{
 document.getElementById("tkcnum").value=a-1;
 }
 moneycha();
}

function numcheng(arg1,arg2)
{
var m=0,s1=arg1.toString(),s2=arg2.toString();
try{m+=s1.split(".")[1].length}catch(e){}
try{m+=s2.split(".")[1].length}catch(e){}
return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)
}

function moneycha(){
a=numcheng(parseFloat(document.getElementById("nowmoneyY").innerHTML),parseInt(document.getElementById("tkcnum").value));
document.getElementById("nowmoney").innerHTML=a;
}

//���빺�ﳵ
var xmlHttpcar = false;
try {
  xmlHttpcar = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpcar = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpcar = false;
  }
}
if (!xmlHttpcar && typeof XMLHttpRequest != 'undefined') {
  xmlHttpcar = new XMLHttpRequest();
}

function carInto(x){
if(document.getElementById("tcnum")){if(taocanid==0){alert("����ѡ���ײ�");document.getElementById("utc1").className="utc utc1";return false;}}
if(document.getElementById("tc2div"+taocanid)){if(taocanid2==0){alert("����ѡ���ײ�");document.getElementById("tc2div"+taocanid).className="utc utc1";return false;}taocanid=taocanid2;}
url = "../tem/carInto.php?bh="+x+"&kcnum="+document.getElementById("tkcnum").value+"&tcid="+taocanid;
xmlHttpcar.open("get", url, true);
xmlHttpcar.onreadystatechange = updatePagecar;
xmlHttpcar.send(null);
}

function updatePagecar() {
 if(xmlHttpcar.readyState == 4) {
 response = xmlHttpcar.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){tclogin();return false;}
  else if(response=="err2"){alert("��~���ܽ��Լ�����Ʒ���빺�ﳵŶ");return false;}
  else if(response=="ok"){
  document.getElementById("cara2").style.display="";
  document.getElementById("cara1").style.display="none";
  }else{alert("δ֪������ˢ������");return false;}
 }
}

//��������
var xmlHttpbuy = false;
try {
  xmlHttpbuy = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
  try {
    xmlHttpbuy = new ActiveXObject("Microsoft.XMLHTTP");
  } catch (e2) {
    xmlHttpbuy = false;
  }
}
if (!xmlHttpbuy && typeof XMLHttpRequest != 'undefined') {
  xmlHttpbuy = new XMLHttpRequest();
}

function buyInto(x){
if(document.getElementById("tcnum")){if(taocanid==0){alert("����ѡ���ײ�");document.getElementById("utc1").className="utc utc1";return false;}}
if(document.getElementById("tc2div"+taocanid)){if(taocanid2==0){alert("����ѡ���ײ�");document.getElementById("tc2div"+taocanid).className="utc utc1";return false;}taocanid=taocanid2;}
url = "../tem/buyInto.php?bh="+x+"&kcnum="+document.getElementById("tkcnum").value+"&tcid="+taocanid;
xmlHttpbuy.open("get", url, true);
xmlHttpbuy.onreadystatechange = updatePagebuy;
xmlHttpbuy.send(null);
}

function updatePagebuy() {
 if(xmlHttpbuy.readyState == 4) {
 response = xmlHttpbuy.responseText;
 response=response.replace(/[\r\n]/g,'');
  if(response=="err1"){tclogin();return false;}
  else if(response=="err2"){alert("��~���ܹ����Լ�����ƷŶ");return false;}
  else if(response=="ok"){location.href="../user/car.php";}else{alert("δ֪������ˢ������");return false;}
 }
}

