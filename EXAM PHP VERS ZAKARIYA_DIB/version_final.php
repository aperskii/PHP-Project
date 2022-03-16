<?php

include "cnx.php" ; 
?>

<!DOCTYPE html>
<html>
<head>
	<title> EXAM WITH BOOTSRAP </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link href="jquery.dataTables.min.css" rel="stylesheet" type="text/css">
	<script src="jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar navbar-inverse  navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">EXAM PHP </a>
	    </div>
	  </div>
	</nav>
	<br>
	
	<div class="container">
		<form method="POST"  class="form-horizontal">
			<div class="form-group">
			  <label for="matricule">MATRICULE:</label>
			  <input type="text" name="matricule" id="matricule" class="form-control" placeholder="Enter le matricule">
			</div>

			<div class="form-group">
			  <label for="nom">NOM:</label>
			  <input type="text"  name="nom" id="nom" class="form-control" placeholder="Enter le nom du client ">
			</div>

			<div class="form-group">
			  <label for="prenom">ENOM:</label>
			  <input type="text" name="prenom" id="prenom" class="form-control" placeholder="Enter le prenom du client ">
			</div>
			
			<br>
			
			<div>
				 <button type="submit" name="enregistrer" class="btn btn-primary">ENREGISTRER</button>
				 <button type="submit" name="modifier" class="btn btn-primary">MODIFIER</button>
				 <button type="submit" name="supprimer" class="btn btn-primary">SUPPRIMMER</button>
				 <button type="submit" name="rechercher" class="btn btn-primary">RECHERCHER</button>
				 <button type="reset"  name="annuler" class="btn btn-danger">ANNULER</button>

				 <!-- <input type="submit" class="btn btn-info"  name="enregistrer" value="enregistrer">
					<input type="submit" class="btn btn-info"  name="modifier" value="modifier">
					<input type="submit" class="btn btn-info"  name="Supprimer" value="Supprimer">
					<input type="submit" class="btn btn-info"  name="rechercher" value="rechercher">
					<input type="reset"  class="btn btn-info"  name="annuler" value="annuler"> --> 
			</div>
			<br>

			<input type="text" name="text1" id="text1" class="form-control" placeholder="nom , prenom , ou matricule : " />  
             <div id="NomList"></div>  
			<br>
			<button type="submit" name="rechercher1" class="btn btn-primary">RECHERCHER1</button>


			<div class="container">
				<br><br>
			<table id="findresult" class="display table table-hover table-bordered" width="100%" data-page-length="10" data-order="[[ 1, &quot;asc&quot; ]]">
				<thead>
				  <tr>
					<th>Matricule</th>
					<th>Nom</th>
					<th>Prenom</th>
				  </tr>
				 </thead>
				 <tbody>
					<?php 
					
						
						if ( isset($_POST['rechercher']))
						{
						$mat = $_POST['matricule'] ; 
						$nom = $_POST['nom'] ; 
						$prenom = $_POST['prenom'] ; 


							$sql3 = "select * 
									 FROM client 
									 WHERE matricule = '$mat' " ;
							if ( $conn->query($sql3) == TRUE ){
								$result = $conn->query($sql3) ; 
							

								if ( $result->num_rows > 0  )
								{
									while ($row = $result->fetch_assoc() )
									{
										echo '<tr>';
											echo '<td>'.$row['matricule'].'</td>';
											echo '<td>'.$row['nom'].'</td>';
											echo '<td>'.$row['prenom'].'</td>';
										echo '</tr>';

									} 
								}
								
								
						
							}
						}
					

					
						
						if ( isset($_POST['rechercher1']))
						{
						$rch1 = $_POST['text1'];

							$sql3 = "select * 
									 FROM client 
									 WHERE matricule = '$rch1' or nom = '$rch1' or prenom = '$rch1' " ;

							if ( $conn->query($sql3) == TRUE )
							{
								$result = $conn->query($sql3) ; 
							

								if ( $result->num_rows > 0  )
								{
									while ($row = $result->fetch_assoc() )
									{
										echo '<tr>';
											echo '<td>'.$row['matricule'].'</td>';
											echo '<td>'.$row['nom'].'</td>';
											echo '<td>'.$row['prenom'].'</td>';
										echo '</tr>';

									} 
								}
								
								
						
							}
						}
					
				?>
				 </tbody>
				 </table>
			 </div>
			
			
			

		 </form>
	</div>

	
	<div class="container">

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <a id="modaltext"><span id="modaleheader"></span></a>
        </div>
        <div class="modal-body">
          <a id="modaltext"><span id="modaletext"></span></a>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"> OK </button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>



<?php


  
				  if ( isset($_POST['enregistrer'])){
					$mat = $_POST['matricule'] ; 
					$nom = $_POST['nom'] ; 
					$prenom = $_POST['prenom'] ; 
					if( $mat != "") {
						$sql1 = " INSERT INTO client(matricule,nom,prenom) VALUES ('$mat','$nom','$prenom') " ; 
						if($conn->query($sql1) == TRUE ){
							echo "<script> $('#modaleheader').html('ENREGISTREMENT ..'); $('#modaletext').html('ENREGISTRER AVEC SUCCE '); $('#myModal').modal()</script>" ; 
							
							
						}else{
							echo "<script> $('#modaleheader').html('ENREGISTREMENT ..'); $('#modaletext').html('error' . $conn->error ); $('#myModal').modal()</script>" ; 
							
						}
						
					}
					else 
						echo "<script>$('#modaleheader').html('ENREGISTREMENT .. '); $('#modaletext').html('matkhalish lid khawi'); $('#myModal').modal()</script>" ; 
				  
				  
				  
				  
				                                                               
						  
				 

// button enregistrer 

	

	/*
	$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
	$stmt->bind_param("sss", $firstname, $lastname, $email);

	// set parameters and execute
	$firstname = "John";
	$lastname = "Doe";
	$email = "john@example.com";
	$stmt->execute();

	$firstname = "Mary";
	$lastname = "Moe";
	$email = "mary@example.com";
	$stmt->execute();

	$firstname = "Julie";
	$lastname = "Dooley";
	$email = "julie@example.com";
	$stmt->execute();

	echo "New records created successfully";

	*/
}

// button modifier
if ( isset($_POST['modifier'])){
	$mat = $_POST['matricule'] ; 
	$nom = $_POST['nom'] ; 
	$prenom = $_POST['prenom'] ;

if( $mat != "") {	
	$sql2 = "UPDATE client 
			 set  nom = '$nom' , 
			 	  prenom = '$prenom'
			 where matricule = '$mat' " ;
	
	if ( $conn->query($sql2) == TRUE ){

		echo "<script>$('#modaleheader').html('MODIFICATION .. '); $('#modaletext').html('MODIFIER AVEC SUCCEE'); $('#myModal').modal()</script>" ; 
	} else {
		echo "<script>$('#modaleheader').html('MODIFICATION .. '); $('#modaletext').html('ERROR' . $conn-error); $('#myModal').modal()</script>" ; 
	}
}
else{
		echo "<script>$('#modaleheader').html('MODIFICATION .. '); $('#modaletext').html(' matkhlich mat khawii malk bghiti nmodifier bla matricule pff ' ); $('#myModal').modal()</script>" ; 

}
}

//button supprimer

if( isset($_POST['supprimer'])){
	$mat = $_POST['matricule'] ; 
	$nom = $_POST['nom'] ; 
	$prenom = $_POST['prenom'] ; 
if( $mat != "") {		
	$sql4 = "DELETE from client
			WHERE matricule = '$mat' " ; 
	
	if ( $conn->query($sql4) == true ) {
		echo "<script>$('#modaleheader').html('SUPPRRESSION .. '); $('#modaletext').html('SUPPRIMER AVEC SUCCEE'); $('#myModal').modal()</script>" ; 
	}else {
		echo "<script>$('#modaleheader').html('SUPPRRESSION .. '); $('#modaletext').html('ERROR' . $conn-error); $('#myModal').modal()</script>" ; 
	}
}
else{
		echo "<script>$('#modaleheader').html('SUPPRRESSION .. '); $('#modaletext').html(' matkhlich mat khawii malk bghiti nsupprimer  bla matricule pff ' ); $('#myModal').modal()</script>" ; 

}
}


?>
	
<script type="text/javascript">
			$(document).ready(function()
			{
				$('#findresult').DataTable();
			}
			</script>

</body>
</html>

 <script>  
 
 $(document).ready(function(){  
      $('#text1').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"search.php",
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#NomList').fadeIn();  
                          $('#NomList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#text1').val($(this).text());  
           $('#NomList').fadeOut();  
      });  
 });  
 </script>  