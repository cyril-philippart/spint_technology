<?php
// TEST avec des dump
require_once 'vendor/autoload.php';
$boardingCards = [
    [
        'type' => 'train',
        'from' => 'Madrid',
        'to' => 'Barcelone',
        'seat' => '45B',
        'train' => '78A',
    ],
    [
        'type' => 'bus',
        'from' => 'Barcelone',
        'to' => 'Gérone',
    ],
    [
        'type' => 'avion',
        'from' => 'Gérone',
        'to' => 'Stockholm',
        'gate' => '45B',
        'seat' => '3A',
        'vol' => 'SK455',
        'baggage' => 'Dépôt de bagages au guichet 344',
    ],
    [
        'type' => 'avion',
        'from' => 'Stockholm',
        'to' => 'New York JFK',
        'gate' => '22',
        'seat' => '7B',
        'vol' => 'SK22',
        'baggage' => 'Les bagages seront automatiquement transférés de votre dernière étape',
    ],
];

$travelBoardingCards = [];
foreach ($boardingCards as $card) {
    $travelBoardingCards[] = $card;
}

/* $lastBoardingCard = end($travelBoardingCards);
dump($lastBoardingCard['to']); */

$output = "Voici votre itinéraire :\n";
foreach ($travelBoardingCards as $card) {
    dump($card);
    /* dump($card['type']);
    dump($card['baggage']); */
    switch ($card['type']) {
        case 'train':
            $output .= "Prenez le train {$card['train']} de {$card['from']} à {$card['to']}. Asseyez-vous au siège {$card['seat']}.\n";
            break;
        case 'bus':
            $output .= "Prenez le bus de {$card['from']} à {$card['to']}. Pas d'attribution de siège.\n";
            break;
        case 'avion':
            /* if ($lastBoardingCard['to'] === "New York JFK") {
                $output .= "Prenez le vol {$card['vol']} de {$card['from']} à {$card['to']}. Porte {$card['gate']}, siège {$card['seat']}. {$card['baggage']}.\n";
            } */
            $output .= "Prenez le vol {$card['vol']} de {$card['from']} à {$card['to']}. Porte {$card['gate']}, siège {$card['seat']}. {$card['baggage']}.\n";
            break;
    };
   

}
$output .= "Vous êtes arrivé à votre destination finale.\n";
dump($output);


return $output;
