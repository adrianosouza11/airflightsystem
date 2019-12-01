<?php
namespace main;

use entities\AdditionalFlightServiceEntitie;
use \entities\CheckoutEntitie;
use \entities\FlightEntitie;
use util\Util;

$flightOutbound = new FlightEntitie(
    '123456',
    'Cia X',
    'Belo Horizonte, MG (CNF)',
    'Porto Seguro, BA (BPS)',
    new \DateTime('2019-11-28 14:30'),
    new \DateTime('2019-11-28 15:30'),
    300.00
);

$flightInbound = new FlightEntitie(
    '789101',
    'Cia Z',
    'Porto Seguro, BA (BPS)',
    'Belo Horizonte, MG (CNF)',
    new \DateTime('2019-11-28 09:00'),
    new \DateTime('2019-11-28 10:30'),
    259.90
);

$addFlightServiceOutbound = new AdditionalFlightServiceEntitie(
    $flightOutbound,
    'Gato',
    AdditionalFlightServiceEntitie::TYPE_SERVICE_CARGA_VIVA,
    1,
    30.00
);

$addFlightServiceInbound = new AdditionalFlightServiceEntitie(
    $flightInbound,
    'Malas, Roupas de Cama',
    AdditionalFlightServiceEntitie::TYPE_SERVICE_BAGAGE,
    3,
    15.00
);

$flightOutbound->addFlightService($addFlightServiceOutbound);
$flightInbound->addFlightService($addFlightServiceInbound);

$flightSummary = new  CheckoutEntitie($flightOutbound, $flightInbound);

$extractFlight = $flightSummary->generateExtract();
?>

<div style="padding: 10px">
    <div style="border: 1px dashed; width: 20%;padding:10px;display: inline-block;position: relative;">
        <h1 style="font-size: 14pt; text-align: center">Voo de Ida:</h1>
        <div>
            De: <?= $extractFlight->flightOutbound['De'] ?>
        </div>
        <div>
            Para: <?= $extractFlight->flightOutbound['Para'] ?>
        </div>
        <div>
            Embarque: <?= $extractFlight->flightOutbound['Embarque'] ?>
        </div>
        <div>
            Desembarque: <?= $extractFlight->flightOutbound['Desembarque'] ?>
        </div>
        <div>
            Companhia Aéria: <?= $extractFlight->flightOutbound['Cia'] ?>
        </div>
        <div>
            Valor: $ <?= $extractFlight->flightOutbound['Valor'] ?>
        </div>
        <br>
        <div>
            <b>Serviços Adicionais</b>
            <ul>
                <?php foreach ($extractFlight->flightOutbound['servicos_adcionais'] as $eachServico) : ?>
                    <li><?= $eachServico->getTypeService() ?>
                        <ul>
                            <li>Descricao: <?= $eachServico->getTitle() ?></li>
                            <li>Quantidade: <?= $eachServico->getQuantity() ?></li>
                            <li>Valor: <?= $eachServico->getValue() ?></li>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div style="border: 1px dashed; width: 20%;padding:10px;display: inline-block;position: relative;">
        <h1 style="font-size: 14pt; text-align: center">Voo de Volta:</h1>
        <div>
            De: <?= $extractFlight->flightInbound['De'] ?>
        </div>
        <div>
            Para: <?= $extractFlight->flightInbound['Para'] ?>
        </div>
        <div>
            Embarque: <?= $extractFlight->flightInbound['Embarque'] ?>
        </div>
        <div>
            Desembarque: <?= $extractFlight->flightInbound['Desembarque'] ?>
        </div>
        <div>
            Companhia Aéria: <?= $extractFlight->flightInbound['Cia'] ?>
        </div>
        <div>
            Valor: $ <?= $extractFlight->flightInbound['Valor'] ?>
        </div>
        <br>
        <div>
            <b>Serviços Adicionais</b>
            <ul>
                <?php foreach ($extractFlight->flightInbound['servicos_adcionais'] as $eachServico) : ?>
                    <li><?= $eachServico->getTypeService() ?>
                        <ul>
                            <li>Descricao: <?= $eachServico->getTitle() ?></li>
                            <li>Quantidade: <?= $eachServico->getQuantity() ?></li>
                            <li>Valor: <?= $eachServico->getValue() ?></li>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

