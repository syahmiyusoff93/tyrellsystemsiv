<?php
namespace Cards;

class Suit {
    const CLUB = 'club';
    const DIAMOND = 'diamond';
    const HEART = 'heart';
    const SPADE = 'spade';

    /**
    *   Contains the suit.
    *   @param string $suit
    */
    public $suit;

    /**
    *   Creates a Suit.
    *
    *   @param string $suit     MUST be Club, Diamond, Heart or Spade.
    */
    public function __construct( $suit )
    {
        if( $this->isValidSuit($suit) === false) {
            throw new \InvalidArgumentException('The suit is not a valid string.');
        }

        $this->suit = $suit;
    }

    /**
    *   Check if the Suit is a valid type.
    *
    *   @param  string $suit
    *   @return bool
    */
    public function isValidSuit($suit)
    {
		$validSuits = array(self::CLUB, self::DIAMOND, self::HEART, self::SPADE);
		return in_array($suit, $validSuits, true);
    }

    /**
    *   Gets the suit as a string
    *
    *   @return string
    */
    public function getSuit()
    {
        return $this->suit;
    }
}
