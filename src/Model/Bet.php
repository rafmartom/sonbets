<?php

namespace App\Model;


/**
 * Base class for a bet.
 *
 * This data model contains all the properties that define a bet,
 * such as the event, odds, and stake.
 */
class Bet 
{
    /**
     * @param float $odds The decimal odds for the bet.
     * @param string $event A description of the event being bet on.
     * @param string $selection The specific outcome selected for the bet.
     * @param string $date The date of the event.
     * @param string $bookmaker The bookmaker where the bet was placed.
     * @param string $stake The amount of money staked on the bet.
     */
    public function __construct(
        public float $odds,
        public string $event,
        public string $selection,
        public string $date,
        public string $bookmaker,
        public string $stake
    ) {}


    /**
    * Specify data which should be serialized to JSON.
    * @return array
    */
    public function jsonSerialize(): array
    {
        return [
            'odds' => $this->odds,
            'event' => $this->event,
            'selection' => $this->selection,
            'date' => $this->date,
            'bookmaker' => $this->bookmaker,
            'stake' => $this->stake
        ];
    }

}




?>
