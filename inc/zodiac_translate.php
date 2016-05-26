

<?php



$json = $zodiacSign;

if ($json[$zodiacSign] != 200){
return false;
}

$results = $json[$zodiacSign];

$return_array = array();

foreach ($results as $result){
if ($result[$zodiacSign] == 200){
$return_array[] = $result[$zodiacSign]['translatedText'];
} else {
$return_array[] = false;
}
}

//return translated text
return $return_array;


?>

