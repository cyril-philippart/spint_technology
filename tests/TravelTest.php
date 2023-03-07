<?php 
use App\Travel;
use PHPUnit\Framework\TestCase;

class TravelTest extends TestCase {
    public function testSortBoardingCards() {

        // Mon voyage
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
                'seat' => '',
                'baggage' => 'Les baggage sont à votre charge avec supplément de 5€/baggage',
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
                'baggage' => 'Les baggages sont à votre charge sans supplément',
            ],
        ];

        // Mon resultat final
        $expectedOutput = "Voici votre itinéraire :\n"
            . "Prenez le train 78A de Madrid à Barcelone, siège 45B. Les baggages sont à votre charge sans supplément.\n"
            . "Prenez le bus de Barcelone à Gérone. Les baggage sont à votre charge avec supplément de 5€/baggage.\n"
            . "Prenez le vol SK455 de Gérone à Stockholm. Porte 45B, siège 3A. Dépôt de bagages au guichet 344.\n"
            . "Prenez le vol SK22 de Stockholm à New York JFK. Porte 22, siège 7B. Les bagages seront automatiquement transférés de votre dernière étape.\n"
            . "Vous êtes arrivé à votre destination finale.\n"
        ;

        // Lance le test de comparaison
        $this->assertEquals(trim($expectedOutput), trim(Travel::sortBoardingCards($boardingCards)));
    }
}
