<?php
session_start();
date_default_timezone_set("Asia/Jakarta"); 


if(($_SESSION['id']=="") && (!$_COOKIE["email"]))
{
	header("Location:login");
}


include("conf.php");
include("funct.php");
	
	/* mysql  query */
	function ambil_data($query)
	{
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME) or die ("Koneksi gagal : ".mysqli_connect_error());
		$result = mysqli_query($con, $query);
		if (mysqli_error($con))
		{
			die("<strong>Ada kesalahan perintah SQL : </strong> ".$query." ".mysqli_error($con));
		}
		$data = array();
		while ($row = mysqli_fetch_array($result)) {
			$data[] = $row;
	    }
		mysqli_free_result($result);
		mysqli_close($con);
		return $data;
	}

	/*mysql  query eksekusi */
	function sql_exec($query)
	{
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME) or die ("Koneksi gagal : ".mysqli_connect_error());
		$result = mysqli_query($con, $query);
		if (mysqli_error($con))
		{
			die("<strong>Ada kesalahan Perintah SQL : </strong> ".$query.":".mysqli_error($con));
		}
		mysqli_close($con);
	}

	function mysql_insert_baru($table)
	{
		$q = "SELECT max(id) as id FROM ".$table;
		$x = ambil_data($q);
		return $x[0]['id'];
	}

	$permissionPost 		= getPermissionPost($_SESSION['id']);
	$permissionSlide 		= getPermissionSlide($_SESSION['id']);
	$permissionComment 		= getPermissionComment($_SESSION['id']);
	$permissionGroup 		= getPermissionGroup($_SESSION['id']);
	$permissionPengaturan 	= getPermissionPengaturan($_SESSION['id']);
	$permissionPengguna 	= getPermissionPengguna($_SESSION['id']);
	$permissionSurvey 		= getPermissionSurvey($_SESSION['id']);
	$permissionCategory 	= getPermissionCategory($_SESSION['id']);

?>
