<?php
require_once '../../vendor/autoload.php';
use PHPUnit\Framework\TestCase;
use Placetopay\model\PlacetopayModel;

class PlacetopayModelTest extends TestCase
{

    public function test(){

        $placeModel = new PlacetopayModel(
            'Brayan',
            'Sinisterra',
            'brayan Sinisterra',
            'CC',
            '1116448141',
            'calle 26e',
            'Cali',
            'CO',
            '11181929',
            'prueba unitaria',
            'COP',
            '12000');

        $this->assertEquals(
            'Brayan',
            $placeModel->Name()
        );
    }
}

