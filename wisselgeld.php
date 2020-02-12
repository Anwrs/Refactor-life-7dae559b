<?php 

// Hier zorgen we ervoor dat de input een float word en afgerond word op de laatste 2 cijfers.
$wsgeld = (float) round($argv[1], 2);

// Hier zorgen we ervoor dat onze array defined word naar het woord "geldEenheid".
define(
        'geldEenheid',
        [
            "50"=>"euro", 
            "20"=>"euro", 
            "10"=>"euro", 
            "5"=>"euro", 
            "2"=>"euro", 
            "1"=>"euro",
            "0.50"=>"cent", 
            "0.20"=>"cent", 
            "0.10"=>"cent",
            "0.05"=>"cent"
        ]
    );

// Een loop die checkt of de input elke keer deelbaar is door het geld.
foreach(geldEenheid as $coin => $type){
    $coin = (float) $coin;
    $wsgeld = round($wsgeld, 2);

// Conditie checkt of de laatste parameter afgerond moet worden na boven of beneden.
if(substr($wsgeld, -1, 1) >= 8){
        $wsgeld = $wsgeld + 0.02;
        $wsgeld = round($wsgeld, 2);
    }elseif(substr($wsgeld, -1, 1) == 4){
        $wsgeld = $wsgeld + 0.02;
        $wsgeld = round($wsgeld, 2);
    }elseif(substr($wsgeld, -1, 1) == 3){
        $wsgeld = $wsgeld + 0.02;
        $wsgeld = round($wsgeld, 2);
}
        
// Deelt het getal en output het aantal op scherm.
    if(floor($wsgeld / $coin) > 0){
        $times = floor($wsgeld / $coin);
        echo "$times X $coin $type" . PHP_EOL;
        $wsgeld = $wsgeld - ($times * $coin);
    }
}