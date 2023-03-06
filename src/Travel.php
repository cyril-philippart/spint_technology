<?php
namespace App;
class Travel {
    public static function sortBoardingCards(array $boardingCards): string {
        $travelBoardingCards = [];

        // Ajoute chaque carte de voyage au tableau
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
            }
        }
        $output .= "Vous êtes arrivé à votre destination finale.\n";

        return $output;
    }
}
