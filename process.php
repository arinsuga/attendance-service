<html>
<head><title>Absensi</title></head>
<body>
<h1>Absensi</h1>

<table width="100%" border="1">
<tr>
	<th>NO</th>
	<th>NIM</th>
	<th>NAMA</th>
	<th>NILAI</th>
</tr>

<?php

//HD-DESK : PROD
$dbhost = "dbhost";
$dbuser	= "dbuser";
$dbpass	= "dbpassword";
$dbname	= "dbname";

mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

//exit;
$db=dbase_open("attend.dbf",0);
$jum=dbase_numrecords($db);

 $bulanskrg = date('m');
 $bulanmulai = date('m') - 2;
 $bulanstart = $bulanmulai;
//exit;
$hariini = date('Ymd');

if ($bulanstart > 9 )
{
	$bulanstart;
}else 
{
 $bulanstart = '0'.$bulanstart;
}



$tglawal = date('Y').$bulanstart.'01';
$tglakhir = date('Y').'1231';


$sql = "delete from absensi WHERE (
		month( tgl ) >='".$bulanstart."'
		AND month( tgl ) <='".$bulanskrg."'
		)
		AND year( tgl ) ='".date('Y')."'";
		mysql_query($sql);
		//exit;
echo  $tglawal.'= Tgl Awal'.$hariini."=hariini";
//exit;
		
		$x=0;
for($i=1;$i<=$jum;$i++){        //lakukan perulangan berdasarkan jumlah data
$hasil=dbase_get_record_with_names($db,$i);    /*simpan record di array $hasil*/
	
	echo "<tr>";
	
	
	
	 if ($hasil['DATE']>= $tglawal && $hasil['DATE']<= $hariini )
	{
		echo $sql = "insert into absensi  (badgeno, tgl, daytype, masuk, keluar, work, overtime, leavetype, remark)
				values('".$hasil['BADGENO']."','".$hasil['DATE']."','".$hasil['DAYTYPE']."','".$hasil['IN']."','".$hasil['OUT']."','".$hasil['WORK']."','".$hasil['OVERTIME']."','".$hasil['LEAVETYPE']."','".$hasil['REMARK']."')";
		
		mysql_query($sql);
		
		//echo $hasil['BADGENO']."-".$hasil['DATE']."-".$hasil['IN']."-".$hasil['OUT']."-".$hasil['WORK']."<br>";
		
		$x=$x+1;
	}
	
	echo "</tr>";
	
} 

echo $x;

?>
</table>
<p><a href="tulis_dbf.php">Input Nilai Mahasiswa</a></p>
</body>
</html>
