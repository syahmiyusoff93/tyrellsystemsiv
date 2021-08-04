<?php
namespace Cards;

class FrenchCard {
    const MIN_VALUE = 1;
    const MAX_VALUE = 13;

    public $suit;
    public $value;

    /**
    *   Creates a french Card.
    *
    *   @param  Suit
    *   @param  int
    */
    public function __construct( Suit $suit, $value)
    {
        // throws InvalidArgumentException
        $this->isWithinValueRange($value);

        $this->suit = $suit;
        $this->value = $value;
    }


    /**
    *   Check if Card is within a valid range.
    *
    *   @param int
    *   @throws InvalidArgumentException
    */
    public function isWithinValueRange($value)
    {
        if($value < self::MIN_VALUE OR $value > self::MAX_VALUE) {
            throw new \InvalidArgumentException('The value must be higer than 0 and less than 14 (1-13) Given ' . $value);
        }
    }

    /**
    *   Returns the suit as a string.
    *
    *   @return string
    */
    public function getSuit()
    {
        return $this->suit->getSuit();
    }

    /**
    *   Returns the value of the Card.
    *   @return int
    */
    public function getValue()
    {
        return $this->value;
    }
}