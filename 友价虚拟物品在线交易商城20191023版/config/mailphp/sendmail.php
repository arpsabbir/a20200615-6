<?
function yjsendmail($fname,$tmail,$str,$lj=""){
 global $rowcontrol;
 require($lj."../config/mailphp/class.phpmailer.php"); //���ص��ļ�������ڸ��ļ�����Ŀ¼ 
 $mailstr=preg_split("/,/",$rowcontrol[mailstr]);
 $mail1=$mailstr[0]; //�����ʼ�
 $mailpwd=$mailstr[1];
 $mailsmtp=$mailstr[2];
 $maildk=$mailstr[3]; //�˿�
 $mail = new PHPMailer(); //�����ʼ�������  
 $mail->IsHTML() ;//
 $address =$mail1;  
 $mail->IsSMTP(); // ʹ��SMTP��ʽ����  
 $mail->Host = $mailsmtp; // ������ҵ�ʾ�����  
 $mail->SMTPAuth = true; // ����SMTP��֤����  
 $mail->Username = $mail1; // �ʾ��û���(����д������email��ַ)  
 $mail->Password = $mailpwd; // �ʾ�����  
 $mail->Port=$maildk;  
 $mail->From = $mail1; //�ʼ�������email��ַ  
 $mail->FromName = $fname;  
 $mail->CharSet = "gb2312";                    	// ָ���ַ���
 $mail->AddAddress($tmail,$tmail);//�ռ��˵�ַ�������滻���κ���Ҫ�����ʼ���email����,��ʽ��AddAddress("�ռ���email","�ռ�������")  
 $mail->Subject = $fname; //�ʼ�����  
 $mail->Body = $str; //�ʼ�����  
 $mail->AltBody = ""; //������Ϣ������ʡ��  
 $mail->Send();
}
?>