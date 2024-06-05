<?php
include ("../database/defind_db.php");

function responseData ($query){
    $conn = new mysqli(servername, username, password,db);
    $data = [];
    $result = $conn->query($query);
//        if ($result === TRUE) {
//        echo "Record updated successfully";
//    } else {
//        echo $conn->error;
//    }
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $conn -> close();
    return $data;
}