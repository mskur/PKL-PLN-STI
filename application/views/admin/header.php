<?php 
//get username dan level dari session
$username = $this->session->userdata('username');
$level = $this->session->userdata('level');

echo "Username: ".$username . "<br>";
echo "level: " .$level;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?= $title; ?></title>
</head>
