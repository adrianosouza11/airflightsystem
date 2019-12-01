<?php


namespace entities;


class AdditionalFlightServiceEntitie
{
    private $flight;
    private $title;
    private $type_service;
    private $quantity;
    private $value;

    const TYPE_SERVICE_BAGAGE = "BAGAGE";
    const TYPE_SERVICE_CARGA_VIVA = "CARGA_VIVA";

    public function __construct(
        FlightEntitie $flight,
        string $title,
        string $type_service,
        int $quantity,
        float $value
    )
    {
        $this->flight = $flight;
        $this->title = $title;
        $this->type_service = $type_service;
        $this->quantity = $quantity;
        $this->value = $value;
    }

    /**
     * @return FlightEntitie
     */
    public function getFlight()
    {
        return $this->flight;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getTypeService()
    {
        return $this->type_service;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }


}