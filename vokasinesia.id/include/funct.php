<?php
function currentUrl()
{
	if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    $url.= $_SERVER['HTTP_HOST'];   
    $url.= $_SERVER['REQUEST_URI'];
    return $url;
}

function toViewDate($dateTime)
{
	$dates = explode(" ", $dateTime);
	$date = explode("-", $dates[0]);
	return $date[2]."/".$date[1]."/".$date[0];
}

function clean($string) {
	$string = str_replace(' ', '-', strtolower($string)); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function rClean($string) {
	$string = str_replace('-', ' ', strtolower($string)); // Replaces all spaces with hyphens.
 
	return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
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

/*SLIDE*/
function slide($count, $sort){
	$q 		= "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE
		  	type = 'data' AND subtype = 'slide' AND status = '1'
		  	ORDER BY id ".$sort." LIMIT ".$count;
	$data 	= ambil_data($q);
	return $data;
}

/*detail post*/
function getListPost($type, $id, $start, $count, $sort){
	$sub = "";
	$subtype = getCategoryName($id);
	if($subtype!="")
	{
		$sub = "AND subtype = '".$subtype."'";
	}

	$q 		= "SELECT * FROM post WHERE
		  	type = '".$type."' ".$sub." AND status = '1'
		  	ORDER BY date_create ".$sort." LIMIT ".$start.",".$count."";
	$data 	= ambil_data($q);
	return $data;
}

function getFirstPost($type, $id, $sort){
	$sub = "";
	$subtype = getCategoryName($id);
	if($subtype!="")
	{
		$sub = "AND subtype = '".$subtype."'";
	}
	$q 		= "SELECT * FROM post WHERE
		  	type = '".$type."' ".$sub." AND status = '1'
		  	ORDER BY date_create ".$sort." LIMIT 1";
	$data 	= ambil_data($q);
	return $data[0];
}

function detailPost($type, $slug)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE type = '".$mysqli->real_escape_string($type)."' AND post_slug = '".$mysqli->real_escape_string($slug)."' AND status = '1'";

	$data = ambil_data($q);
	return $data[0];
}

/*get thumbnail post*/
function getThumPost($id)
{
	$q = "SELECT img FROM post WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0]['img'];
}

/*all post*/
function allPost($type)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE status = '1' AND type = '".$mysqli->real_escape_string($type)."' ORDER BY tgl_create DESC";
	$data = ambil_data($q);
	return $data;
}

function anotherPost($type, $subtype, $id, $count)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE status = '1' AND type = '".$mysqli->real_escape_string($type)."' AND subtype = '".$mysqli->real_escape_string($subtype)."' AND id <> '".$id."' ORDER BY tgl_create DESC LIMIT ".$count;
	$data = ambil_data($q);
	return $data;
}

/*Comments*/
function createnewcomments($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "INSERT INTO comments SET 
		  post_id 		= '".$mysqli->real_escape_string($args['post_id'])."',
		  email 		= '".$mysqli->real_escape_string($args['email'])."',
		  nama 			= '".$mysqli->real_escape_string($args['nama'])."',
		  text_comment 	= '".$mysqli->real_escape_string($args['text_comment'])."',
		  created_at 	= NOW(),
		  status = '0'";
	sql_exec($q);
	$id = mysql_insert_baru("comments");
	return $id;
}

function getComments($id)
{
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE id = '".$id."' AND status = '1'";
	$data = ambil_data($q);
	$data = $data[0];
	$result = "";
	if($data['comment']==1){
	$comments = listComments($id);
	$result .= '<div class="commentarea">
                        <h4 class="card-title">Tulis Komentar</h4>
                       <div class="commentarea-form">  
                        <form role="form" name="comments" method="post" action="do.comments">';
                        if(isset($_GET['notif'])&&($_GET['notif']=="s")):
                        	$result .= '<div class="alert alert-success">
                              Terima kasih atas komentar Anda.<br>Komentar Anda akan segera tampil setelah disetujui.
                            </div>';
                        endif;
                        	$result .= '<div class="form-group">
                        	<label>Nama Lengkap</label>
	                        <input type="text" name="nama" class="form-control" required>
	                        </div>
	                        <div class="form-group">
	                        <label>Alamat Email</label>
	                        <input type="email" name="email" class="form-control" required>
	                        </div>
	                        <input type="hidden" name="type" value="'.$data['type'].'">
	                        <input type="hidden" name="post_id" value="'.$data['id'].'">
	                        <input type="hidden" name="slug" value="'.$data['post_slug'].'">
	                        <div class="form-group">
                              <label for="comment">Isi Komentar</label>
	                          <textarea class="form-control" rows="5" id="comment" name="text_comment" required></textarea>
	                        </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
	                    </form>
                        </div>
                    
                    '.$comments[0].'
                    </div>';
    }
        return $result;
}

function listComments($id)
{
	$q = "SELECT *, DATE_FORMAT(created_at, '%e/%m/%Y %H:%i:%s') as tgl_create FROM comments WHERE post_id = '".$id."' AND status = '1' ORDER BY id DESC";
	$data = ambil_data($q);
	$result = "";
	$totaldata = sizeof($data);
	if($totaldata > 0){
		$result .= '<h4 class="card-title">Recent Comments</h4>
                    	<div class="comment-widgets">';
		for($i=0;$i<sizeof($data);$i++){
	        $result .= '<!-- Start List Comment 2 -->
			            	<div class="d-flex flex-row comment-row">
                            	<div class="comment-img"><svg data-jdenticon-value="user'.$data[$i]['nama'].'" width="50" height="50"></svg></div>
                            	<div class="comment-text w-100">
			                        <h5>'.$data[$i]['nama'].'</h5>
			                        <div class="comment-footer">'.$data[$i]['tgl_create'].'</div>
			                        <p class="p-0">'.nl2br($data[$i]['text_comment']).'</p>
			                    </div>
			                </div>';
				        }
		    $result .= '</div>';
	}
	return array($result, $totaldata);
}

function countComment($post_id)
{
	$q = "SELECT COUNT(id) as total FROM comments WHERE post_id ='".$post_id."' AND status = '1'";
	$data = ambil_data($q);
	return $data[0]['total'];
}

function listsStaticHeader()
{
	$link = "";
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE status = '1' AND type = 'static' AND header = '1' ORDER BY urutan ASC";
	$allstatis = ambil_data($q);
	
	for($i=0; $i<sizeof($allstatis); $i++)
	{
		$link.='<a href="static/'.$allstatis[$i]['post_slug'].'" class="scrollTo">'.$allstatis[$i]['post_title'].'</a>';
	}
	return $link;
}

function listStaticFooter()
{
	$link = "";
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE status = '1' AND type = 'static' AND footer = '1' ORDER BY urutan ASC";
	$allstatis = ambil_data($q);
	
	for($i=0; $i<sizeof($allstatis); $i++)
	{
		$link.='<a href="static/'.$allstatis[$i]['post_slug'].'" class="scrollTo">'.$allstatis[$i]['post_title'].'</a>';
	}
	return $link;
}

/*kontak*/
function getContactSettings()
{
	$q = "SELECT * FROM contact_settings";
	$data = ambil_data($q);
	return $data[0];
}

/*pengaturan */
function getPengaturanUmum()
{
	$q = "SELECT * FROM web_settings";
	$data = ambil_data($q);
	return $data[0];
}


function angka($x)
{
		$angka_format = number_format($x,0,",",".");
		return $angka_format;
}



/*paging*/
function halaman($halaman, $perhalaman, $total)
{
    $jumhalaman = ceil($total/$perhalaman);
    $awal = ($halaman-1) * $perhalaman;
    return array($awal, $jumhalaman);
}

function totaldDataPost($type, $subtype)
{
    $q = "SELECT * FROM post WHERE status = '1' AND type = '".$type."' AND subtype = '".$subtype."'";
    $data = ambil_data($q);
    return sizeof($data);
}

function listDataPost($halaman, $perhalaman, $type, $subtype)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
    $awal = ($halaman-1) * $perhalaman;
    if($awal < 1):
    	$awal = 0;
    endif;
    $q = "SELECT * FROM post WHERE status = '1' AND type = '".$mysqli->real_escape_string($type)."' AND subtype = '".$mysqli->real_escape_string($subtype)."' ORDER BY date_create DESC LIMIT ".$awal.", ".$perhalaman;
    $data = ambil_data($q);
    return $data;
}

function listDataSitemap($subtype)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
    $q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE status = '1' AND  subtype = '".$mysqli->real_escape_string($subtype)."' ORDER BY post_title DESC";
    $data = ambil_data($q);
    return $data;
}



/*pencarian*/
function totalDataCari($key)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if($key == "-")
		$key="";
    $q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE (post_title LIKE '%".$mysqli->real_escape_string($key)."%' OR post_short LIKE '%".$mysqli->real_escape_string($key)."%' OR post_text LIKE '%".$mysqli->real_escape_string($key)."%') AND status = '1' AND type = 'data' AND subtype <> 'slide' ORDER BY tgl_create DESC";
    $data = ambil_data($q);
    return sizeof($data);
}

function listDataPageCari($halaman, $perhalaman, $key)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if($key == "-")
		$key="";
    $awal = ($halaman-1) * $perhalaman;
    if($awal < 1):
    	$awal = 0;
    endif;
    $q = "SELECT * FROM post WHERE (post_title LIKE '%".$mysqli->real_escape_string($key)."%' OR post_short LIKE '%".$mysqli->real_escape_string($key)."%' OR post_text LIKE '%".$mysqli->real_escape_string($key)."%') AND status = '1' AND type = 'data' AND subtype <> 'slide'  ORDER BY date_create DESC LIMIT ".$awal.", ".$perhalaman;
    $data = ambil_data($q);
    return $data;
}

function search($key)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "SELECT * FROM post WHERE (post_title LIKE '%".$mysqli->real_escape_string($key)."%' OR post_short LIKE '%".$mysqli->real_escape_string($key)."%' OR post_text LIKE '%".$mysqli->real_escape_string($key)."%') AND status = '1' AND type = 'data' AND subtype <> 'slide' ORDER BY date_create DESC";
	$data = ambil_data($q);
	return $data;
}


/*tag*/

function generateTag($string)
{
	$result = array();
	if($string!=""):
		$tags = explode(",", $string);
		foreach ($tags as $key => $value) {
			if($tags[$key]!=""):
				$result[] = trim($tags[$key]);
			endif;
		}
	endif;
	return $result;
}
function totalDataTag($tag)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if($key == "-")
		$key="";
    $q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE (tag LIKE '%".$mysqli->real_escape_string($tag)."%') AND status = '1' AND type = 'data' AND subtype <> 'slide' ORDER BY tgl_create DESC";
    $data = ambil_data($q);
    return sizeof($data);
}

function listDataPageTag($halaman, $perhalaman, $tag)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	if($key == "-")
		$key="";
    $awal = ($halaman-1) * $perhalaman;
    $q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE (tag LIKE '%".$mysqli->real_escape_string($tag)."%') AND status = '1' AND type = 'data' AND subtype <> 'slide'  ORDER BY tgl_create DESC LIMIT ".$awal.", ".$perhalaman;
    $data = ambil_data($q);
    return $data;
}

function tag($key)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "SELECT *, DATE_FORMAT(date_create, '%e/%m/%Y') as tgl_create FROM post WHERE (tag LIKE '%".$mysqli->real_escape_string($tag)."%') AND status = '1' AND type = 'data' AND subtype <> 'slide' ORDER BY tgl_create DESC";
	$data = ambil_data($q);
	return $data;
}

function listCategory()
{
	$q = "SELECT * FROM category WHERE status <> '9'";
	$data = ambil_data($q);
	return $data;
}

function getthumCategory($name)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	$q = "SELECT * FROM category WHERE category_name = '".$mysqli->real_escape_string($name)."'";
	$data = ambil_data($q);
	return $data[0]['img'];
}

function getCategoryName($id)
{
	$q = "SELECT * FROM category WHERE id = '".$id."'";
	$data = ambil_data($q);
	return $data[0]['category_name'];
}

/* SURVEY */

function getActiveSurvey()
{
	$q = "SELECT * FROM survey WHERE status = '1'";
	$data = ambil_data($q);
	if(sizeof($data)>0):
		return $data[0];
	else:
		return array();
	endif;
}

function checkSurveyActivity($survey_id)
{
	$q = "SELECT * FROM survey_pemilih WHERE sessionid = '".$_COOKIE['x']."' AND survey_id = '".$survey_id."'";
	$data = ambil_data($q);
	if(sizeof($data)>0):
		return false;
	else:
		return true;
	endif;
}

function getResultSurvey($id)
{
	$q = "SELECT * FROM survey_pilihan WHERE survey_id = '".$id."'";
	$data = ambil_data($q);
	return $data;
}

function getLastResultSurvey()
{
	$q = "SELECT * FROM survey ORDER BY id DESC LIMIT 1";
	$data = ambil_data($q);
	return $data[0];
}

function postSurvey($args)
{
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);
	sql_exec("INSERT INTO survey_pemilih SET 
				sessionid = '".$mysqli->real_escape_string($_COOKIE['x'])."', 
				survey_id = '".$mysqli->real_escape_string($args['survey_id'])."', 
				pilihan_id = '".$mysqli->real_escape_string($args['pilihan_id'])."'");

	sql_exec("UPDATE survey_pilihan SET 
				jumlah_jawaban = (jumlah_jawaban + 1)
				WHERE id = '".$args['pilihan_id']."' ");
	return 1;
}


function contactemail($args)
{
	$headers = "From: ".$args['email']." \r\n";
	$headers .= "Reply-To: ".$args['email']." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$subject = "Vokanesia contact us - ".ucwords($args['nama']);
    $content = '<html><body>
	<div style="border: 2px solid #80B0D7; padding: 20px;">	
	Pengunjung website vokanesia telah mengisi kontak form dengan data berikut : <br />
    <p>Pengirim : <strong>'.ucwords($args['nama']).'</strong>,</p>
    <p>Judul Pesan : <strong>'.ucwords($args['judul']).'</strong>,</p>
	<p>Isi Pesan : '.$args['isi'].'</p>
	<p>Waktu : '.date('d/m/Y H:i:s').'</p>
    </div></body></html>';
    mail($args['emailvokasinesia'], $subject, $content, $headers);
}