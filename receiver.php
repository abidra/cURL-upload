<?php
if(isset($_POST['file'])){
$encoded_file = $_POST['file'];
$file = base64_decode($encoded_file);
$title = $_POST['file']['name'];
file_put_contents($title, $file);
}
?>