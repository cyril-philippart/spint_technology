<?php
// TEST avec des dump
require_once 'vendor/autoload.php';
$boardingCards = [
    [
        'type' => 'avion',
        'from' => 'Stockholm',
        'to' => 'New York JFK',
        'gate' => '22',
        'seat' => '7B',
        'vol' => 'SK22',
        'baggage' => 'Les bagages seront automatiquement transférés de votre dernière étape',
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
        'type' => 'train',
        'from' => 'Madrid',
        'to' => 'Barcelone',
        'seat' => '45B',
        'train' => '78A',
    ],
    
];

// Ajoute chaque carte de voyage au tableau
$travelBoardingCards = [];
foreach ($boardingCards as $card) {
    $travelBoardingCards[] = $card;
}

// Trouve la ville de depart
$from = null;
foreach ($travelBoardingCards as $card) {
    $toCities = array_column($travelBoardingCards, 'to');
    if (!in_array($card['from'], $toCities)) {
        $from = $card['from'];
        break;
    }
}

// Trie les carte de voyage dans l'ordre du depart à l'arrivée
$sortedCards = [];
while (count($sortedCards) < count($boardingCards)) {
    dump($sortedCards);
    foreach ($travelBoardingCards as $i => $card) {
        if ($card['from'] == $from) {
            $sortedCards[] = $card;
            $from = $card['to'];
            unset($travelBoardingCards[$i]);
            break;
        }
    }
}


// Génère une chaîne de caractères décrivant le voyage
$output = "Voici votre itinéraire :\n";
foreach ($sortedCards as $card) {
    switch ($card['type']) {
        case 'train':
            $output .= "Prenez le train {$card['train']} de {$card['from']} à {$card['to']}. Asseyez-vous au siège {$card['seat']}.\n";
            break;
        case 'bus':
            $output .= "Prenez le bus de {$card['from']} à {$card['to']}. Pas d'attribution de siège.\n";
            break;
        case 'avion':
            $output .= "Prenez le vol {$card['vol']} de {$card['from']} à {$card['to']}. Porte {$card['gate']}, siège {$card['seat']}. {$card['baggage']}.\n";
            break;
    };
   

}
$output .= "Vous êtes arrivé à votre destination finale.\n";

return $output;
