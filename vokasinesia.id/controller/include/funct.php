<?php

function clean($string) {
	$string = str_replace(' ', '-', strtolower($string)); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function rClean($string) {
	$string = str_replace('-', ' ', strtolower($string)); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
}

function clean2($string) {
	$string = str_replace(' ', '', strtolower($string)); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function tosysdate($x)
{
	$a = explode(" ", $x);
	$b = explode("/", $a[0]);
	$hasil = $b[2]."-".$b[1]."-".$b[0]." ".$a[1].":00";
	return $hasil;
}


function checkPasswd($password)
{
	$uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number    = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@', $password);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8):
	return false;
	else:
	return true;
	endif;
}

function resetPasswd($email)
{
	$q = "SELECT * FROM user WHERE email = '".$email."' AND status = '1'";
	$data = ambil_data($q);
	if(sizeof($data)>0){
		$randPasswd = RandPasswd();
		$qUpdate = "UPDATE user SET passwd = '".md5($randPasswd)."' WHERE email = '".$email."'";
		sql_exec($qUpdate);
		return true;
	}
	elseif(sizeof($data)==0){
		return false;
	}

}

function sendMailReset($email, $namauser, $passwd)
{
	$subject = 'Reset Password';
    $content = '
	<div style="border: 2px solid #80B0D7; padding: 50px;">
    <p>Yth, <strong>'.ucwords($namauser).'</strong>,</p>
	<p>Anda telah melakukan reset password pada '.date("d m Y H:i:s").'</p>
	<p>Berikut ini adalah baru Anda : '.$passwd.'</p>
	<p>&nbsp;</p>
	<p>Terima kasih.</p>
    </div>';
    sendmail($email, $subject, $content);
}


function FString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function RandPasswd() {
    $characters = '0123456789abghijkuvwxyzABCDEFGTUVWXYZ!@#$%^&*()';
    $charactersLength = strlen($characters);
    $randomPasswd = '';
    for ($i = 0; $i < 10; $i++) {
        $randomPasswd .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPasswd;
}

/*login*/
function login($e, $p, $r)
{
	$query1 = "SELECT * FROM user WHERE email = '".$e."'";
	$data1= ambil_data($query1);
	if(sizeof($data1)>0)
	{	
		if($data1[0]['status']==1)
		{
			$query = "SELECT * FROM user WHERE email = '".$e."' AND passwd = '".md5($p)."' AND status = '1'";
			$data = ambil_data($query);
			if(sizeof($data)>0)
			{
				if($r == 1)
				{
					setcookie ("email",$e,time()+ 86400);
					setcookie ("passwd",$p,time()+ 86400);
				}
				sql_exec("UPDATE user SET lastlogin = NOW() WHERE id = '".$data[0]['id']."'");
				return array(1, $data[0]);
			}
			else {
				return array(0,1);
			}
		}
		elseif($data1[0]['status']==2)
		{			
			return array(0,2);
		}		
	}
	elseif(sizeof($data1)==0)
	{
		return array(0,0);
	}
}

/*page status*/
function pagestatus($x)
{
	if($x==1)
	{
		echo '<span class="badge-text badge-text-small success">Active</span>';
	}
	elseif($x==2)
	{
		echo '<span class="badge-text badge-text-small danger">Unpublished</span>';
	}
}


/*create new post*/
function createnewpost($args)
{
	$urutan = "";
	$img = "";
	$img_no_header = "";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if(isset($_FILES['img']['name']) && ($_FILES['img']['name']!=""))
	{
		$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		$img= FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['img']['tmp_name'], "../images/post/".$img);
		$img = "img				= '".$img."',";
	}

	if(isset($_FILES['img_no_header']['name']) && ($_FILES['img_no_header']['name']!=""))
	{
		$ext = pathinfo($_FILES['img_no_header']['name'], PATHINFO_EXTENSION);
		$img_no_header= FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['img_no_header']['tmp_name'], "../images/post/".$img_no_header);
		$img_no_header = "img_no_header				= '".$img_no_header."',";
	}

	if($args['type']=="static"):
		$urutan = "urutan 	= '".getNewlasturutan('post')."', ";
		$subtype = "subtype 		= '".clean2($args['post_title'])."', ";
	elseif($args['type']=="data"):
		$subtype = "subtype 		= '".$args['subtype']."', ";
	endif;

	$customField = array();
	$resultCustomField = "";
	if(sizeof($args['field_name'])>0)
	{
		for($a=0;$a<sizeof($args['field_name']);$a++){
			$x = array($_POST['field_name'][$a] => $_POST['field_content'][$a]);
            array_push($customField, $x);
		}
		$resultCustomField = json_encode($customField);
	}

	$tags = json_decode($_POST['tags'],1);
	$tag = "";
    foreach($tags as $key => $value){
        if($value['value']!=""):
	        	$tag.=$value['value'].",";
	    	endif;
    }

    if($tag!=""){
    	$tag = ", tag = '".$tag."'";
    }


	$q = "INSERT INTO post SET
			post_title		= '".$mysqli->real_escape_string($args['post_title'])."',
			post_slug		= '".$mysqli->real_escape_string(clean($args['post_title']))."',
			post_short		= '".$mysqli->real_escape_string($args['post_short'])."',
			post_text		= '".$mysqli->real_escape_string($args['post_text'])."',
			".$img."
			".$img_no_header."
			custom_field	= '".$resultCustomField."',
			".$urutan."
			date_create		= '".tosysdate($args['tanggal'])."',
			creator_id		= '".$_SESSION['id']."',
			type 			= '".$args['type']."',
			".$subtype."
			status			= '".$args['status']."',
			header			= '".$args['header']."',
			footer			= '".$args['footer']."',
			comment			= '".$args['comment']."',
			as_background	= '".$args['as_background']."'
			".$tag;
	sql_exec($q);
	$id = mysql_insert_baru("post");
	return array($id, $args['submit'], clean($args['post_title']) );
}

/*detail post*/
function detailpost($page_id)
{
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y %H:%i') as tgl_create  FROM post WHERE id = '".$page_id."'";
	$data = ambil_data($q);
	return $data[0];
}

/*get thumbnail post*/
function getthumpage($id)
{
	$q = "SELECT img FROM post WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0]['img'];
}

function getthumpage2($id)
{
	$q = "SELECT img_no_header FROM post WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0]['img_no_header'];
}

/*edit post*/
function editpost($args)
{
	$urutan = "";
	$img = "";
	$img_no_header = "";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

	if(isset($_FILES['img']['name']) && ($_FILES['img']['name']!=""))
	{
		if(getthumpage($args['id'])!="")
		{
			unlink("../images/post/".getthumpage($args['id']));
		}
		$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		$img= FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['img']['tmp_name'], "../images/post/".$img);
		$img = "img				= '".$img."',";
	}

	if(isset($_FILES['img_no_header']['name']) && ($_FILES['img_no_header']['name']!=""))
	{
		if(getthumpage2($args['id'])!="")
		{
			unlink("../images/post/".getthumpage2($args['id']));
		}
		$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
		$img_no_header= FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['img_no_header']['tmp_name'], "../images/post/".$img_no_header);
		$img_no_header = "img_no_header				= '".$img_no_header."',";
	}

	if($args['type']=="static"):
		$subtype = "subtype 		= '".clean2($args['post_title'])."', ";
	elseif($args['type']=="data"):
		$subtype = "subtype 		= '".$args['subtype']."', ";
	endif;

	$customField = array();
	$resultCustomField = "";
	if(sizeof($args['field_name'])>0)
	{
		for($a=0;$a<sizeof($args['field_name']);$a++){
			$x = array($_POST['field_name'][$a] => $_POST['field_content'][$a]);
            array_push($customField, $x);
		}
		$resultCustomField = json_encode($customField);
	}

	$tags = json_decode($_POST['tags'],1);
	$tag = "";
	if($tags!=""){
	    foreach($tags as $key => $value){
	    	if($value['value']!=""):
	        	$tag.=$value['value'].",";
	    	endif;
	    }
	}
	
    $tag = ", tag = '".$tag."'";
//post_slug		= '".$mysqli->real_escape_string(clean($args['post_title']))."',
	$q = "UPDATE post SET
			post_title		= '".$mysqli->real_escape_string($args['post_title'])."',			
			post_short		= '".$mysqli->real_escape_string($args['post_short'])."',
			post_text		= '".$mysqli->real_escape_string($args['post_text'])."',
			".$img."
			".$img_no_header."
			custom_field	= '".$resultCustomField."',
			date_create		= '".tosysdate($args['tanggal'])."',
			last_update		= 'NOW()',
			updateby_id		= '".$_SESSION['id']."',
			type 			= '".$args['type']."',
			".$subtype."
			status			= '".$args['status']."',
			header			= '".$args['header']."',
			footer			= '".$args['footer']."',
			comment			= '".$args['comment']."',
			as_background	= '".$args['as_background']."'
			".$tag."
		WHERE id 			= '".$args['id']."'";		
	sql_exec($q);
	return array($args['id'], $args['submit'], clean($args['post_title']) );
}


/*all post*/
function allpost($type)
{
	if($type=="static"):
		$order = "ORDER BY urutan ASC";
	elseif($type!="statis"):
		$order = "ORDER BY id DESC";
	endif;
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE type = '".$type."' AND subtype <>'slide'  AND status <> '9' ".$order;
	$data = ambil_data($q);
	return $data;
}

function allDataPost()
{
	$q = "SELECT COUNT(id) as jumlah FROM post WHERE type = 'data' AND subtype <>'slide'  AND status <> '9' ";
	$data = ambil_data($q);
	return $data[0]['jumlah'];
}

function allSlide()
{
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE type = 'data' AND subtype ='slide' AND status <> '9'";
	$data = ambil_data($q);
	return $data;
}

function delpost($id)
{
	$q = "UPDATE post SET status = '9', urutan = '0' WHERE id = '".$id."'";
	sql_exec($q);
}

/*all post*/
function allcomments()
{
	$q = "SELECT *, DATE_FORMAT(created_at, '%e/%m/%Y') as tgl_create FROM comments WHERE status <> '3' ";
	$data = ambil_data($q);
	return $data;
}

function allUnreadComments()
{
	$q = "SELECT COUNT(id) as jumlah FROM comments WHERE status ='0' ";
	$data = ambil_data($q);
	return $data[0]['jumlah'];
}

function delcomment($id)
{
	$q = "UPDATE comments SET status = '3' WHERE id = '".$id."'";
	sql_exec($q);
}

function approveComment($id)
{
	$q = "UPDATE comments SET status = '1' WHERE id = '".$id."'";
	sql_exec($q);
}

/*pengguna*/
function getAllPengguna()
{
	$q = "SELECT * FROM user WHERE status ='1' OR status='2'";
	$data = ambil_data($q);
	return $data;
}

function getDetailPengguna($id)
{
	$q = "SELECT * FROM user WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0];
}

function createpengguna($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);	
	$qe = "SELECT * FROM user WHERE email = '".$args['email']."'";
	$de = ambil_data($qe);

	if(sizeof($de)==0)
	{
		if($args['passwd']!="")
		{		
			if(checkPasswd($args['passwd']))
			{
				$passwd = $args['passwd'];
			}
			else
			{
				return -1;
			}
		}
		else
		{
			$passwd = RandPasswd();
			//emailcreatepengguna($args['email'], $args['nama'], $passwd);
		}

		$q = "INSERT INTO user SET
				passwd			= '".md5($args['passwd'])."',
				email			= '".$mysqli->real_escape_string($args['email'])."',
				nama			= '".$mysqli->real_escape_string($args['nama'])."',
				keterangan		= '".$mysqli->real_escape_string($args['keterangan'])."',
				role_id			= '".$args['role_id']."',
				lastupdate		= NOW(),
				status 			= '".$args['status']."'";
		sql_exec($q);
		$id = mysql_insert_baru("user");
		
		return $id;
	}
	else
	{
		return 0;
	}
}


function editpengguna($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$passwd = "";
	
	if($args['passwd']!="")
	{
		if(checkPasswd($args['passwd']))
		{
			$passwd = "passwd 	= '".md5($args['passwd'])."',";			
		}		
		else
		{
			return 0;
		}
	}
	if($args['role_id']!=""):
		$level = "role_id 			= '".$args['role_id']."',";
	else:
		$level = "";
	endif;

	$q = "UPDATE user SET
			".$passwd."
			email			= '".$mysqli->real_escape_string($args['email'])."',
			nama			= '".$mysqli->real_escape_string($args['nama'])."',
			keterangan		= '".$mysqli->real_escape_string($args['keterangan'])."',
			".$level."
			status 			= '".$args['status']."',
			date_create		= NOW()
			WHERE id 		= '".$args['id']."'";		
	sql_exec($q);

	$login = ambil_data("SELECT * FROM user WHERE id = '".$args['id']."'");
	$_SESSION = $login[0];
	return 1;	
}



function getAllRole($id)
{
	$post 		= ambil_data("SELECT * FROM permission WHERE type = 'post' AND group_id = '".$id."'");
	$slide 		= ambil_data("SELECT * FROM permission WHERE type = 'slide' AND group_id = '".$id."'");
	$comment 	= ambil_data("SELECT * FROM permission WHERE type = 'comment' AND group_id = '".$id."'");
	$group 		= ambil_data("SELECT * FROM permission WHERE type = 'grouppengguna' AND group_id = '".$id."'");
	$pengaturan = ambil_data("SELECT * FROM permission WHERE type = 'pengaturan' AND group_id = '".$id."'");
	$pengguna = ambil_data("SELECT * FROM permission WHERE type = 'pengguna' AND group_id = '".$id."'");
	$survey = ambil_data("SELECT * FROM permission WHERE type = 'survey' AND group_id = '".$id."'");
	$category = ambil_data("SELECT * FROM permission WHERE type = 'category' AND group_id = '".$id."'");

	return array('post' => $post[0], 'slide' => $slide[0], 'comment' => $comment[0], 
				 'grouppengguna' => $pengaturan[0], 'pengaturan' => $pengaturan[0], 
				 'pengguna' => $pengguna[0], 'survey' => $survey[0], 'category' => $category[0]);
}

function dodeleteuser($id)
{
	$q = "UPDATE user SET status = '99' WHERE id = '".$id."'";
	sql_exec($q);
}


/*pengaturan umum*/
function getpengaturanumum()
{
	$q = "SELECT * FROM web_settings";
	$data = ambil_data($q);
	return $data[0];
}

function editpengaturanumum($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$oldData = getpengaturanumum();

	if($_FILES['favicon']['name'])
	{
		if($oldData['favicon']!="")
		{
			unlink("../images/post/".$oldData['favicon']);
		}
		$ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
		$img = FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['favicon']['tmp_name'], "../images/post/".$img);
		$favicon = "favicon				= '".$img."',";
	}

	if($_FILES['logo_light']['name'])
	{
		if($oldData['logo_light']!="")
		{
			unlink("../images/post/".$oldData['logo_light']);
		}
		$ext = pathinfo($_FILES['logo_light']['name'], PATHINFO_EXTENSION);
		$img = FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['logo_light']['tmp_name'], "../images/post/".$img);
		$logo_light = "logo_light				= '".$img."',";
	}

	if($_FILES['logo_dark']['name'])
	{
		if($oldData['logo_dark']!="")
		{
			unlink("../images/post/".$oldData['logo_dark']);
		}
		$ext = pathinfo($_FILES['logo_dark']['name'], PATHINFO_EXTENSION);
		$img = FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['logo_dark']['tmp_name'], "../images/post/".$img);
		$logo_dark = "logo_dark				= '".$img."',";
	}

	if($_FILES['sosmed_image']['name'])
	{
		if($oldData['sosmed_image']!="")
		{
			unlink("../images/post/".$oldData['sosmed_image']);
		}
		$ext = pathinfo($_FILES['sosmed_image']['name'], PATHINFO_EXTENSION);
		$img = FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['sosmed_image']['tmp_name'], "../images/post/".$img);
		$sosmed_image = "sosmed_image				= '".$img."',";
	}

	$q = "UPDATE web_settings SET
			title			= '".$mysqli->real_escape_string($args['title'])."',
			description		= '".$mysqli->real_escape_string($args['description'])."',
			keywords		= '".$mysqli->real_escape_string($args['keywords'])."',
			".$favicon."
			".$sosmed_image."
			".$logo_dark."
			".$logo_light."
			copyright		= '".$mysqli->real_escape_string($args['copyright'])."',
			last_update		= NOW()";		
	sql_exec($q);
}


/*pengaturan kontak*/
function getcontactsettings()
{
	$q = "SELECT * FROM contact_settings";
	$data = ambil_data($q);
	return $data[0];
}

function editcontactsettings($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$oldData = getcontactsettings();


	$q = "UPDATE contact_settings SET
			company_name	= '".$mysqli->real_escape_string($args['company_name'])."',
			address			= '".$mysqli->real_escape_string($args['address'])."',
			display_email	= '".$mysqli->real_escape_string($args['display_email'])."',
			form_email		= '".$mysqli->real_escape_string($args['form_email'])."',
			phone			= '".$mysqli->real_escape_string($args['phone'])."',
			facebook		= '".$mysqli->real_escape_string($args['facebook'])."',
			instagram		= '".$mysqli->real_escape_string($args['instagram'])."',
			twitter			= '".$mysqli->real_escape_string($args['twitter'])."',
			youtube			= '".$mysqli->real_escape_string($args['youtube'])."',			
			last_update		= NOW()";		
	sql_exec($q);
}

/*send mail*/
function sendmail($email, $subject, $content)
{
    require 'include/PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@hipajak.id';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('info@hipajak.id', 'Hi Pajak');
    $mail->addReplyTo('info@hipajak.id', 'Hi Pajak');
    $mail->addAddress($email);
    $mail->Subject = $subject;

    $mail->isHTML(true);
    $mailContent = $content;
    $mail->Body = $mailContent;

    if(!$mail->send()){
        
        echo 'Pesan tidak dapat dikirim.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   return false;
    }else{
        
		echo 'Pesan telah terkirim';
		return true;
    }
}

/*kirim email update profile*/
function emailcreatepengguna($email, $nama_admin, $passwd)
{
	$subject = 'Pengguna Baru';
    $content = '
	<div style="border: 2px solid #80B0D7; padding: 50px;">
    <p>Yth, <strong>'.ucwords($nama_admin).'</strong>,</p>
	<p>Akun Anda telah dibuat pada '.date("d m Y H:i:s").'</p>
	<p>Berikut ini adalah password Anda : '.$passwd.'</p>
	<p>&nbsp;</p>
	<p>Terima kasih.</p>
    </div>';
    sendmail($email, $subject, $content);
}

function status($x)
{
	if($x==0):
		echo '<i class="glyphicon glyphicon-remove-circle text-danger"></i>';
	elseif($x==1):
		echo '<i class="glyphicon glyphicon-ok-circle text-success"></i>';
	elseif($x==4):
		echo '<i class="glyphicon glyphicon glyphicon-minus-sign text-danger"></i>';
	endif;
}

function statusSurvey($x)
{
	if($x==1):
		echo '<i class="glyphicon glyphicon-ok-circle text-success"></i>';
	elseif($x==2):
		echo '<i class="glyphicon glyphicon glyphicon-minus-sign text-danger"></i>';
	endif;
}

function getResultSurvey($id)
{
	$q = "SELECT * FROM survey_pilihan WHERE survey_id = '".$id."'";
	$data = ambil_data($q);
	return $data;
}

function getDetailSurvey($id)
{
	$q = "SELECT * FROM survey WHERE status = '1'";
	$data = ambil_data($q);
	return $data[0];
}

function checked($x, $y)
{
	if($x==$y) return 'checked';
}

function suspendchecked($x)
{
	if($x==4) return 'checked';
}


/*sort urutan dinaikkan*/
function urutan($args)
{
	$q1 = "UPDATE ".$args['table']." SET urutan = '".$args['urutannew']."' WHERE id = '".$args['idnow']."'";
	//echo $q1."<br />";
	sql_exec($q1);

	$q2 = "UPDATE ".$args['table']." SET urutan = '".$args['urutannow']."' WHERE id = '".$args['idnew']."'";
	//echo $q2."<br />";
	sql_exec($q2);
}

function getNewlasturutan($table)
{
	$q = "SELECT max(urutan) as urutan FROM ".$table;
	$data = ambil_data($q);
	return ($data[0]['urutan'] +1);
}


/*create new post*/
function createnewUpload($args)
{
	$path = "";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if(isset($_FILES['upload']['name']) && ($_FILES['upload']['name']!=""))
	{
		$ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
		$img= FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['upload']['tmp_name'], "../images/data/".$img);
		$path = "path				= '".$img."',";
	}

	$q = "INSERT INTO upload SET
			title		= '".$mysqli->real_escape_string($args['title'])."',
			".$path."
			create_at		= NOW(),
			status			= '1'";
	sql_exec($q);
	$id = mysql_insert_baru("upload");
	return $id;
}

/*get thumbnail post*/
function getUpload($id)
{
	$q = "SELECT path FROM upload WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0]['img'];
}

/*get thumbnail post*/
function detailUpload($id)
{
	$q = "SELECT * FROM upload WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0];
}

/*edit post*/
function editUpload($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$path = "";
	if(isset($_FILES['upload']['name']) && ($_FILES['upload']['name']!=""))
	{
		if(getUpload($args['id'])!="")
		{
			unlink("../images/data/".getUpload($args['id']));
		}
		$ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
		$path= FString(RANDITGR).".".$ext;
		move_uploaded_file($_FILES['upload']['tmp_name'], "../images/data/".$path);
		$path = "path				= '".$path."',";
	}
	$q = "UPDATE upload SET
			title		= '".$mysqli->real_escape_string($args['title'])."',
			".$path."
		WHERE id 			= '".$args['id']."'";		
	sql_exec($q);
	return true;
}


/*all upload*/
function allUpload()
{
	$q = "SELECT *, DATE_FORMAT(create_at, '%e/%m/%Y') as tgl_create FROM upload WHERE  status <> '9' ORDER BY id DESC";
	$data = ambil_data($q);
	return $data;
}

function delUpload($id)
{
	$q = "UPDATE upload SET status = '9' WHERE id = '".$id."'";
	sql_exec($q);
}


/*category*/
function createNewCategory($args)
{
	if(checkCategory($args['category_name']))
	{
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
		if(isset($_FILES['img']['name']) && ($_FILES['img']['name']!=""))
		{
			$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$img= FString(RANDITGR).".".$ext;
			move_uploaded_file($_FILES['img']['tmp_name'], "../images/post/".$img);
			$img = "img				= '".$img."'";
		}

		$q = "INSERT INTO category SET
				category_name	= '".$mysqli->real_escape_string($args['category_name'])."',
				status 			= '1',
				".$img;
		sql_exec($q);
		$id = mysql_insert_baru("category");
		return $id;
	}
	else {
		return 0;
	}
}

function editCategory($args)
{
	if(checkCategory($args['category_name'],$args['id']))
	{
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
		
		$img = "";
		if(isset($_FILES['img']['name']) && ($_FILES['img']['name']!=""))
		{
			if(getthumpage($args['id'])!="")
			{
				unlink("../images/post/".getthumCategory($args['id']));
			}
			$ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
			$img= FString(RANDITGR).".".$ext;
			move_uploaded_file($_FILES['img']['tmp_name'], "../images/post/".$img);
			$img = ", img				= '".$img."'";
		}

		$lastCategory = detailCategory($args['id']);

		$q = "UPDATE category SET
				category_name		= '".$mysqli->real_escape_string($args['category_name'])."'
				".$img."
				WHERE id 			= '".$args['id']."'";		
		sql_exec($q);

		$q = "UPDATE post SET
				subtype		= '".$mysqli->real_escape_string($args['category_name'])."'
				WHERE subtype		= '".$lastCategory['category_name']."'";	
		sql_exec($q);

		return true;
	}
	else{
		return false;
	}
}

function detailCategory($id)
{
	$q = "SELECT * FROM category WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0];
}

function checkCategory($categoryName, $id="")
{
	if($id==""){
		$q = "SELECT * FROM category WHERE category_name = '".$categoryName."'";
		$data = ambil_data($q);
		if(sizeof($data)>0){
			return false;
		}
		elseif(sizeof($data)==0){
			return true;
		}
	}
	elseif($id!=""){
		$q = "SELECT * FROM category WHERE category_name = '".$categoryName."' AND id='".$id."'";
		$data = ambil_data($q);
		if(sizeof($data)>0){
			return true;
		}
		elseif(sizeof($data)==0){
			$q = "SELECT * FROM category WHERE category_name = '".$categoryName."'";
			$data = ambil_data($q);
			if(sizeof($data)>0){
				return false;
			}
			elseif(sizeof($data)==0){
				return true;
			}
		}
	}
	

}

function getthumCategory($id)
{
	$q = "SELECT * FROM category WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0]['img'];
}


function allCategory()
{
	$q = "SELECT * FROM category WHERE status <> '9' ORDER BY id ASC";
	$data = ambil_data($q);
	return $data;
}

function getAllCategory()
{
	$q = "SELECT * FROM category WHERE status <> '9' AND category_name <>'slide'  ORDER BY id ASC";
	$data = ambil_data($q);
	return $data;
}

function delCategory($id)
{
	$x = detailCategory($id);
	$q = "UPDATE category SET status = '9' WHERE id = '".$id."'";
	sql_exec($q);

	$q = "UPDATE post SET subtype = '' WHERE subtype = '".$x['category_name']."'";
	sql_exec($q);
}

/*group pengguna*/
function allGroupPengguna()
{
	$q = "SELECT * FROM group_pengguna";
	$data = ambil_data($q);
	return $data;
}

function getGroupPengguna($id)
{
	$data_group = ambil_data("SELECT * FROM group_pengguna WHERE id = '".$id."'");
	return $data_group[0];
}

function createGroupPengguna($args)
{
	sql_exec("INSERT INTO group_pengguna SET nama_group = '".$args['nama_group']."', status = '1'");
	$id = mysql_insert_baru("group_pengguna");

	/*post*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['post_read']."',
					role_write 	= '".$args['post_write']."',
					role_delete = '".$args['post_delete']."',
					group_id = '".$id."',
					type = 'post',
					status = '1'");
		/*slide*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['slide_read']."',
					role_write 	= '".$args['slide_write']."',
					role_delete = '".$args['slide_delete']."',
					group_id = '".$id."',
					type = 'slide',
					status = '1'");
		/*comment*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['comment_read']."',
					role_write 	= '".$args['comment_write']."',
					role_delete = '".$args['comment_delete']."',
					group_id = '".$id."',
					type = 'comment',
					status = '1'");

		/*group pengguna*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['grouppengguna_read']."',
					role_write 	= '".$args['grouppengguna_write']."',
					role_delete = '".$args['grouppengguna_delete']."',
					group_id = '".$id."',
					type = 'grouppengguna',
					status = '1'");

		/*pengaturan*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['pengaturan_read']."',
					role_write 	= '".$args['pengaturan_write']."',
					role_delete = '".$args['pengaturan_delete']."',
					group_id = '".$args['id']."',
					type = 'pengaturan',
					status = '1'");

		/*pengguna*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['ppengguna_read']."',
					role_write 	= '".$args['pengguna_write']."',
					role_delete = '".$args['pengguna_delete']."',
					group_id = '".$args['id']."',
					type = 'pengguna',
					status = '1'");

		/*survey*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['survey_read']."',
					role_write 	= '".$args['survey_write']."',
					role_delete = '".$args['survey_delete']."',
					group_id = '".$args['id']."',
					type = 'survey',
					status = '1'");

		/*category*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['category_read']."',
					role_write 	= '".$args['category_write']."',
					role_delete = '".$args['category_delete']."',
					group_id = '".$args['id']."',
					type = 'category',
					status = '1'");
	return $id;
}

function editGroupPengguna($args)
{
	sql_exec("UPDATE group_pengguna SET nama_group = '".$args['nama_group']."' WHERE id = '".$args['id']."'");
	
	sql_exec("DELETE FROM permission WHERE group_id = '".$args['id']."'");

	/*post*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['post_read']."',
					role_write 	= '".$args['post_write']."',
					role_delete = '".$args['post_delete']."',
					group_id = '".$args['id']."',
					type = 'post',
					status = '1'");
		/*slide*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['slide_read']."',
					role_write 	= '".$args['slide_write']."',
					role_delete = '".$args['slide_delete']."',
					group_id = '".$args['id']."',
					type = 'slide',
					status = '1'");
		/*comment*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['comment_read']."',
					role_write 	= '".$args['comment_write']."',
					role_delete = '".$args['comment_delete']."',
					group_id = '".$args['id']."',
					type = 'comment',
					status = '1'");

		/*group pengguna*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['grouppengguna_read']."',
					role_write 	= '".$args['grouppengguna_write']."',
					role_delete = '".$args['grouppengguna_delete']."',
					group_id = '".$args['id']."',
					type = 'grouppengguna',
					status = '1'");

		/*pengaturan*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['pengaturan_read']."',
					role_write 	= '".$args['pengaturan_write']."',
					role_delete = '".$args['pengaturan_delete']."',
					group_id = '".$args['id']."',
					type = 'pengaturan',
					status = '1'");

		/*pengguna*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['pengguna_read']."',
					role_write 	= '".$args['pengguna_write']."',
					role_delete = '".$args['pengguna_delete']."',
					group_id = '".$args['id']."',
					type = 'pengguna',
					status = '1'");

		/*survey*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['survey_read']."',
					role_write 	= '".$args['survey_write']."',
					role_delete = '".$args['survey_delete']."',
					group_id = '".$args['id']."',
					type = 'survey',
					status = '1'");

		/*category*/
		sql_exec("INSERT INTO permission SET
					role_read 	= '".$args['category_read']."',
					role_write 	= '".$args['category_write']."',
					role_delete = '".$args['category_delete']."',
					group_id = '".$args['id']."',
					type = 'category',
					status = '1'");
	return 1;
}

function dodeletegroupuser($id)
{
	sql_exec("DELETE FROM group_pengguna WHERE id = '".$id."'");
	
	sql_exec("DELETE FROM permission WHERE group_id = '".$id."'");
}

function getPermissionPost($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$post 		= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'post'");

	return $post[0];
}

function getPermissionSlide($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$slide 		= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'slide'");

	return $slide[0];
}

function getPermissionComment($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$comment	= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'comment'");

	return $comment[0];
}

function getPermissionGroup($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$pengaturan	= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'grouppengguna'");

	return $pengaturan[0];
}

function getPermissionPengaturan($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$pengaturan	= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'pengaturan'");

	return $pengaturan[0];
}


function getPermissionPengguna($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$pengaturan	= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'pengguna'");

	return $pengaturan[0];
}

function getPermissionSurvey($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$pengaturan	= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'survey'");

	return $pengaturan[0];
}


function getPermissionCategory($uid)
{
	$userRole 	= ambil_data("SELECT role_id FROM user WHERE id = '".$uid."'");
	$roleId 	= $userRole[0]['role_id'];

	$pengaturan	= ambil_data("SELECT * FROM permission WHERE group_id = '".$roleId."' AND type = 'category'");

	return $pengaturan[0];
}

function roleActivate($roleType, $permission)
{
	if($permission[$roleType]==1):
		return true;
	else:
		return false;
	endif;
}


/* SURVEY */
function createSurvey($args)
{
	sql_exec("INSERT INTO survey SET
			  judul 		= '".$args['judul']."',
			  keterangan	= '".$args['keterangan']."',
			  date_create 	= NOW(),
			  status 		= '1'");
	$id = mysql_insert_baru("survey");

	foreach ($args['pilihan_survey'] as $key => $value) {
		sql_exec("INSERT INTO survey_pilihan SET 
				  survey_id 	= '".$id."',
				  pilihan_survey 	= '".$value."',
				  jumlah_jawaban	= 0");
	}
}

function getAllSurvey()
{
	$data = ambil_data("SELECT * FROM survey");
	return $data;
}

function allSurvey()
{
	$data = ambil_data("SELECT COUNT(id) as jumlah FROM survey");
	return $data[0]['jumlah'];
}

function checkActiveSurvey()
{
	$data = ambil_data("SELECT * FROM survey WHERE status = '1'");
	if(sizeof($data)>0):
		return false;
	else:
		return true;
	endif;
}

function doCloseSurvey($id)
{
	sql_exec("UPDATE survey set status = '2' WHERE id = '".$id."'");
}