<?php
$uploaddir = '../uploads/';
$uploadfile = $uploaddir . basename($_FILES['imagens']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['imagens']['tmp_name'], $uploadfile)) {

} 


?>