<?php
// connection server 
$conn = new mysqli("localhost","root","");

if($conn->connect_error){
	die (" connexion server failed ". $conn->connect_error) ; 
}
echo "connexion server succeffuly <br> " ;

// connextion base de donne 
$connect_base = mysqli_select_db($conn,'examen') ; 
if ( $connect_base == 1 ){
	echo "base de donnee db_client select succefulyy <br> ";
}else {
	die  ("error lors du selectionement de la base de donnee ");
}

?>