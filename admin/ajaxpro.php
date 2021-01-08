<?php
$data = $_POST['image'];
$old = $_POST["old_img"];
$cartella = $_POST["cartella"];

list($type, $data) = explode(';', $data);
list(, $data)      = explode(',', $data);

$data = base64_decode($data);

$imageName = ($old == "") ? time().'.png' : $old;
file_put_contents('../media/'. $cartella .'/'.$imageName, $data);

echo $imageName;