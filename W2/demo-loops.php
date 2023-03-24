<?php

$arrayNum = array (
    "Jeremy",
    "Kadir",
    "Fern",
    "Stephanie",
    "Ida",
    "Ahmed",
    "Selina",
    "Luca"
);

// for - wir können den Zähler selbst angeben
for( $i=0; $i<count($arrayNum); $i++ ){
    echo '<li>'.$arrayNum[$i].'</li>';
}

// foreach hat einen Zähler im Hintergrund, um den wir uns nicht kümmern müssen
foreach( $arrayNum as $name ){
    echo '<li>'.$name.'</li>';
}

foreach( $arrayNum as $key => $name ){
    echo '<li>'.$key.': '.$name.'</li>';
}

?>