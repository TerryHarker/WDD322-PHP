<?php

// indexiertes / numerisches Array - Gruppierung gleicher Daten als Liste
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

echo $arrayNum[3];

echo '<pre>';
print_r( $arrayNum  );
echo '</pre>';

// assoziatives Array - Gruppierung verschiedener Daten, die zusammengehören
$arrayAssoc = array (
    'vorname' => 'Jeremy',
    'name' => 'Grlj',
    'email' => 'jeremy.grlj@students.sae.ch'
);

echo $arrayAssoc['email'];

echo '<pre>';
print_r( $arrayAssoc  );
echo '</pre>';


$students = array (
    array (
        'vorname' => 'Jeremy',
        'name' => 'Grlj',
        'email' => 'jeremy.grlj@students.sae.ch'
    ),
    array (
        'vorname' => 'Stephanie',
        'name' => 'Sieber',
        'email' => 'stephanie.sieber@students.sae.ch'
    )
);

$students[] = array (
    'vorname' => 'Ahmet',
    'name' => 'Kizal',
    'email' => 'ahmet.kizal@students.sae.ch'
);

echo $students[0]['email']; // über zwei Stufen einen Wert auslesen

echo '<pre>';
print_r( $students  );
echo '</pre>';

?>