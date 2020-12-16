<?php 

$data = array( 
    $_POST['nom'], 
    $_POST['email'], 
    $_POST['telephone'] 
    $_POST['commentaire'] 
); 
  
// Open file in append mode 
$fp = fopen('databaseContact.csv', 'a'); 
  
// Append input data to the file   
fputcsv($fp, $data); 
  
// close the file 
fclose($fp); 
?> 


?>
