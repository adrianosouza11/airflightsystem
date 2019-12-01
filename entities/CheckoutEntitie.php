<?php

namespace entities;

class CheckoutEntitie
{
    private $flightOutbound;
    private $flightInbound;

    /**
     * CheckoutEntitie constructor.
     * @param FlightEntitie $flightOutbound
     * @param FlightEntitie|null $flightInbound
     */
    public function __construct(FlightEntitie $flightOutbound, FlightEntitie $flightInbound = null)
    {
        $this->flightOutbound = $flightOutbound;
        $this->flightInbound = $flightInbound;
    }

    public function generateExtract(){
        $valorTotal = $this->flightOutbound->getValorTotal();

        $flightDetailsOutbound = [
            'De' => $this->flightOutbound->getDepartureAirport(),
            'Para' => $this->flightOutbound->getArrivalAiport(),
            'Embarque' => $this->flightOutbound->getDepartureTime()
                ->format('d/m/Y H:i'),
            'Desembarque' => $this->flightOutbound->getArrivalTime()
                ->format('d/m/Y H:i'),
            'Cia' => $this->flightOutbound->getCia(),
            'Valor' => $this->flightOutbound->getValorTotal(),
            'servicos_adcionais' => $this->flightOutbound->getAddFlightService(),
        ];

        $flightDetailsInbound = [];

        if(!is_null($this->flightInbound)){
            $valorTotal += $this->flightInbound->getValorTotal();

            $flightDetailsInbound = [
                'De' => $this->flightInbound->getDepartureAirport(),
                'Para' => $this->flightInbound->getArrivalAiport(),
                'Embarque' => $this->flightInbound->getDepartureTime()->format('d/m/Y H:i'),
                'Desembarque' => $this->flightInbound->getArrivalTime()->format('d/m/Y H:i'),
                'Cia' => $this->flightInbound->getCia(),
                'Valor' => $this->flightInbound->getValorTotal(),
                'servicos_adcionais' => $this->flightInbound->getAddFlightService(),
            ];
        }

        $valorTotal += $this->getValorTotalAddService();

        return (object) [
            'flightOutbound' => $flightDetailsOutbound,
            'flightInbound' => $flightDetailsInbound,
            'valor' => $valorTotal
        ];
    }

    private function getValorTotalAddService(){
        $valorTotal = 0.00;

        if(count($this->flightOutbound->getAddFlightService()) > 0 ){
            foreach ($this->flightOutbound->getAddFlightService() as $addFlightService){
                $valorTotal += $addFlightService->getValue();
            }
        }

        if(!is_null($this->flightInbound) && count($this->flightInbound->getAddFlightService()) > 0 ){
            foreach ($this->flightInbound->getAddFlightService() as $addFlightService){
                $valorTotal += $addFlightService->getValue();
            }
        }

        return $valorTotal;
    }
}