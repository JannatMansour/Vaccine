<?php

$dp="vaccine";
$host="localhost";
$id=$_POST['id'];

$conn =mysqli_connect($host,"root","",$dp);
 $data = array();
if($conn)
{

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
    $q="select logindoctor.FullName,specializations.Specialization,reservations.data_reservations 
	from reservations
	INNER JOIN logindoctor ON logindoctor.id=reservations.id_doctor
	INNER JOIN specializations ON logindoctor.id_Specialization = specializations.id
	where $id=reservations.id_patient";
	
    $result = mysqli_query($conn , $q);
    if(mysqli_num_rows($result) > 0)
    {
		 while($row = $result->fetch_assoc()) {
           
		 $data[] = $row;
        }
		$myJSON = json_encode($data);

       echo $myJSON;
    }
}

}

?>