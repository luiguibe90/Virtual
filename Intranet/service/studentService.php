<?php

include 'mainService.php';

  class ClienteService extends MainService{
    private $entityName = "PERSONA";
    function insertPeople($cedRepresentantive,$snRrepresentative,$nameRepresenative,
    $addressRepresentative,$telfRepresentative,$dateBrhRepresentative,$genderR,$pemailRepresentative){
    $stmt = $conex->prepare("INSERT INTO PERSONA ()VALUES (?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssss',$cedRepresentantive,$snRrepresentative,$nameRepresenative,
    $addressRepresentative,$telfRepresentative,$dateBrhRepresentative,$genderR,$pemailRepresentative);
    $stmt->close();
    $conex->close();
    }






}



?>