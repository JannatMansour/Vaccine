<?php
$dp="vaccine";
$host="localhost";
$id= $_POST['id'];

$conn =mysqli_connect($host,"root","",$dp);
 $data = array();
if($conn)
{

    $q="select Age,Weight,High from linechart where id_patient=$id";
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



?>