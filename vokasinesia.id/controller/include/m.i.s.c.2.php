<?php
session_start();
date_default_timezone_set("Asia/Jakarta"); 


include("conf.php");
include("funct.php");
	

	/* mysql  query */
	function ambil_data($query)
	{
		$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWD, DB_NAME) or die ("Koneksi gagal : ".mysqli_connect_error());
		$result = mysqli_query($con, $query);
		if (mysqli_error($con))
		{
			die("<strong>Ada kesalahan perintah SQL : </strong> ".$query." ".mysql_error());
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
			die("<strong>Ada kesalahan Perintah SQL : </strong> ".$query.":".mysql_error($con));
		}
		mysqli_close($con);
	}

	function mysql_insert_baru($table)
	{
		$q = "SELECT max(id) as id FROM ".$table;
		$x = ambil_data($q);
		return $x[0]['id'];
	}

	
?>
