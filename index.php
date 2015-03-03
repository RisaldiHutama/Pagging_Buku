<?php

	include ('koneksi.php');
	$query='SELECT * FROM tblbuku';
	$result=$db->query($query);
	$total=$result->num_rows;
	$data=5;
	$jhal=ceil($total/$data);
	
	if(isset($_GET['page'])){
		$page=$_GET['page'];
		$mulai=($_GET['page']-1) * $data;
	}else{
		$mulai=0;
		$page=0;
	}
	
	if($page > 1){
		echo "<a href='?page=";
		echo $page-1;
		echo "'>";
		echo "MUNDUR NDLERENG";
		echo "</a>";
		echo "&nbsp &nbsp";
	}
	
	for($a=1; $a<=$jhal; $a++){
		echo "<a href='?page=$a'>$a</a>";
		echo "&nbsp &nbsp";
	}
	
	if($page <=$jhal){
		echo "<a href='?page=";
		echo $page+1;
		echo "'>";
		echo "MAJU TOLAH TOLEH";
		echo "</a>";
	}
	
	echo "<br/>";
	
	$query="SELECT * FROM tblbuku LIMIT $mulai,$data";
	$result=$db->query($query);
	
	while ($row=$result->fetch_assoc()){
		echo $row['NamaBuku'];
		echo "<br/>";
	}

?>