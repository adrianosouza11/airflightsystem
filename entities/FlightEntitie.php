<?php

namespace entities;

class FlightEntitie
{
    private $flightNumber;
    private $cia;
    private $departureAirport;
    private $arrivalAiport;
    private $departureTime;
    private $arrivalTime;
    private $valorTotal;

    private $addtionalFlightService = [];
    /**
     * FlightEntitie constructor.
     * @param string $flightNumber
     * @param string $cia
     * @param string $departureAirport
     * @param string $arrivalAiport
     * @param string $departureTime
     * @param string $arrivalTime
     * @param string $valorTotal
     */
    public function __construct(
        string $flightNumber,
        string $cia,
        string $departureAirport,
        string $arrivalAiport,
        \DateTime $departureTime,
        \DateTime $arrivalTime,
        float $valorTotal
    )
    {
        $this->flightNumber = $flightNumber;
        $this->cia = $cia;
        $this->departureAirport = $departureAirport;
        $this->arrivalAiport = $arrivalAiport;
        $this->departureTime = $departureTime;
        $this->arrivalTime = $arrivalTime;
        $this->valorTotal = $valorTotal;
    }

    /**
     * @return string|string
     */
    public function getFlightNumber()
    {
        return $this->flightNumber;
    }

    /**
     * @return string|string
     */
    public function getCia()
    {
        return $this->cia;
    }

    /**
     * @return string|string
     */
    public function getDepartureAirport()
    {
        return $this->departureAirport;
    }

    /**
     * @return string|string
     */
    public function getArrivalAiport()
    {
        return $this->arrivalAiport;
    }

    /**
     * @return \DateTime
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * @return \DateTime
     */
    public function getArrivalTime()
    {
        return $this->arrivalTime;
    }

    /**
     * @return float|float
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * @param AdditionalFlightServiceEntitie $additionalFlightServiceEntitie
     */
    public function addFlightService(AdditionalFlightServiceEntitie $additionalFlightServiceEntitie){
        $this->addtionalFlightService[] = $additionalFlightServiceEntitie;
    }

    /**
     * @return array
     */
    public function getAddFlightService(){
        return $this->addtionalFlightService;
    }
}