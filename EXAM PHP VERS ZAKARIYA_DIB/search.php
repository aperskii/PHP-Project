 <?php  
 $connect = mysqli_connect("localhost", "root", "", "examen");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM client WHERE nom LIKE '%".$_POST["query"]."%' or prenom LIKE '%".$_POST["query"]."%' or matricule LIKE '%".$_POST["query"]."%'  ";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["nom"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li> nom non trouvé </li>';  
      }  

      $output .= '</ul>';  
      echo $output;
 }  

 ?> 