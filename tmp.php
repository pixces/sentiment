<?php
$json_data = file_get_contents('public/data/data.json');
$data = json_decode($json_data, true);
echo json_encode($data);
?>