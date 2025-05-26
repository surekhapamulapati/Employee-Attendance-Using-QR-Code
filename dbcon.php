<?php
// server, username, password, database
$con = mysqli_connect('localhost', 'root', '', 'final');

if ($con == false) {
    echo "connection error";
}
//  else {
//      echo "successful";
//  }
?>