//��Ѷ����
function newspj(){
t=document.getElementById("pjt").value;
if(t==""){alert("��������������");document.getElementById("pjt").focus();return false;}
f1.action="newspj.php";
}

//������¼����
function tclogin(){
layer.open({
  type: 2,
  area: ['650px', '415px'],
  title:["��ݵ�¼","text-align:left"],
  skin: 'layui-layer-rim', //���ϱ߿�
  content:['../tem/openw.php', 'no'] 
});
}
