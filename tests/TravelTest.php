<?php 
use App\Travel;
use PHPUnit\Framework\TestCase;

class TravelTest extends TestCase {
    public function testSortBoardingCards() {

        // Mon voyage
        $boardingCards = [
            [
                'type' => 'train',
                'from' => 'Madrid',
                'to' => 'Barcelone',
                'seat' => '45B',
                'train' => '78A',
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
                'type' => 'bus',
                'from' => 'Barcelone',
                'to' => 'Gérone',
            ],
            
        ];

        // Mon resultat final
        $expectedOutput = "Voici votre itinéraire :\n"
            . "Prenez le train 78A de Madrid à Barcelone. Asseyez-vous au siège 45B.\n"
            . "Prenez le bus de Barcelone à Gérone. Pas d'attribution de siège.\n"
            . "Prenez le vol SK455 de Gérone à Stockholm. Porte 45B, siège 3A. Dépôt de bagages au guichet 344.\n"
            . "Prenez le vol SK22 de Stockholm à New York JFK. Porte 22, siège 7B. Les bagages seront automatiquement transférés de votre dernière étape.\n"
            . "Vous êtes arrivé à votre destination finale.\n"
        ;

        // Lance le test de comparaison
        $this->assertEquals(trim($expectedOutput), trim(Travel::sortBoardingCards($boardingCards)));
    }
}
