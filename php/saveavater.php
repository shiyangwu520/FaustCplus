<?php
//session_start();

$rs = array();

switch($_GET['action']){
	//上传临时图片
	case 'uploadtmp':
        $rs['files'] = $_FILES;
		@move_uploaded_file($_FILES['Avatardata']['tmp_name'], "./avatar_1.jpg");
        @move_uploaded_file($_FILES['Sourceddata']['tmp_name'], "./avatar_2.jpg");
		$rs['status'] = 1;
	break;
	//上传切头像
	case 'uploadavatar':
		$input = file_get_contents('php://input');
		$data = explode('--------------------', $input);
		@file_put_contents("./avatar_1.jpg", $data[0]);
		@file_put_contents("./avatar_2.jpg", $data[1]);
		$rs['status'] = 1;
	break;

	default:
		$rs['status'] = -1;
}

print json_encode($rs);

?>
