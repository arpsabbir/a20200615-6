<?php
require("../config/conn.php");
$yunpay=preg_split("/,/",$rowcontrol[yunpay]);
//���������id
$codepay_config['id']		= $yunpay[0];

//��ȫ������
$codepay_config['key']			= $yunpay[1];


//�����������������������������������Ļ�����Ϣ������������������������������

?>