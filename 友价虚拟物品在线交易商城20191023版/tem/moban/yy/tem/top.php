<?
include("../../../../config/conn.php");
include("../../../../config/function.php");
$wxlogin=preg_split("/,/",$rowcontrol[wxlogin]);
?>
<!--һ��ģ����ʾ�벻Ҫ��������ֹͣ����-->
<div class="bfb bfbtop fontyh">

<div class="yjcode">



 <div class="top">

  <ul class="u1">

  <li class="l1">

   <span id="notlogin" style="display:none">

    <span class="s1">���ã���ӭ����<?=webname?>��[<a href="/reg/">��¼</a> | <a href="/reg/reg.php">���ע��</a> | <a class="feng" href="/user/qiandao.php">ÿ��ǩ��</a>]</span>

    <span class="s2"><a href="/config/qq/oauth/index.php"><img border="0" src="/img/qq_login.png" /></a></span>

   </span>

   <span id="yeslogin" style="display:none">��ӭ����<span id="yesuid"></span>&nbsp;&nbsp;[<a class="feng" href="/user/qiandao.php" id="needqd" style="display:none;">ÿ��ǩ��</a><a class="blue" id="dontqd" style="display:none;" href="/user/qiandao.php">������ǩ��</a>]&nbsp;&nbsp;<a href="/user/un.php">�˳�</a></span>

  </li>

  <li class="l2"><a href="/">��վ��ҳ</a></li>

  <li class="l2"><a href="/user/order.php">�ҵĶ���</a></li>

  <li class="l3" onmouseover="lover(3)" onmouseout="lout(3)" id="topu1l3">

  <a href="/user/" class="a1">��Ա����</a>

  <div class="umenu" id="umenu3" style="display:none;">

  <a href="/user/">�����¼</a>

  <a href="/user/pay.php">���߳�ֵ</a>

  <a href="/user/paylog.php">�ʽ���ϸ</a>

  <a href="/user/favpro.php">�ҵ��ղ�</a>

  <a href="/user/inf.php">������Ϣ</a>

  </div>

  </li>

  <li class="l0"></li>

  <li class="l2 l21"><a href="/user/pay.php" class="feng">��ֵ</a></li>

  <li class="l2 l21"><a href="/user/tixian.php" class="green">����</a></li>

  <li class="l2"><a href="/help/">���ְ���</a></li>

  <li class="l2"><a href="/user/gdlx.php" target="_blank" class="red">���ʱش�</a></li>

  </ul>

 </div> 

 

</div>

</div>

<span id="webhttp" style="display:none">/</span>

<script language="javascript">

userCheckses();

</script>

<div class="yjcode"></div>