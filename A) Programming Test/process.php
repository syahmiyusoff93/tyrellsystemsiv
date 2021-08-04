<?php
require 'vendor/autoload.php';
use Cards\CardStack as CardStack;
use Cards\FrenchCard as Card;
use Cards\Suit as Suit;

// create a 52 deck.
$Deck = CardStack::createDeck();
// shuffle...
$Deck->shuffle();

$playerCount = $_REQUEST['pCount'];

echo distribute($playerCount);

function distribute($playerCount){
	global $Deck;
	$cReceived = [];
	$i = 0;
	$playerCount = $playerCount - 1;
	if ($playerCount != 0) {
		while($Deck->hasAvailableCard())
		{
			$cards = $Deck->getTopStack(1);
			$count = $Deck->count();
			$cReceived[$i][] = $cards;
			if ($cards->stack[0]->value == 1) {
				$cards->stack[0]->value = 'A';
			}
			elseif ($cards->stack[0]->value == 11) {
				$cards->stack[0]->value = 'J';
			}
			elseif ($cards->stack[0]->value == 12) {
				$cards->stack[0]->value = 'Q';
			}
			elseif ($cards->stack[0]->value == 13) {
				$cards->stack[0]->value = 'K';
			}
			if ($i == $playerCount) {
				if ($count < ($playerCount+1)) {
					break;
				}
				$i = 0;
			}	
			else{
				$i++;
			}		
		}
	}
	
	return json_encode($cReceived);
}

?>
