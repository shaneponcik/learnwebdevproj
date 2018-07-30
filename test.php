<?php

$json = file_get_contents("http://localhost/race-website/results.json");
$json = json_decode($json,true);

echo '<pre>';
print_r($json, true);
echo '</pre>';
echo "hi";



?>
