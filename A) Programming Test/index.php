<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		French Deck of Card Shuffler and Distributor
	</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		.group-player{
			display: inline-block;
			padding: 10px;
		}
		.outputTxt{
			font-size: 22px	;
		}
	</style>
</head>
<body>
	<container>
	<h1>Playing cards will be given out to n(number) people</h1>
	<controls>
		Number(s) of Player<input type="number" id="txtPlayerCount" min="1" max="52" value="4">
		<span class="btn-refresh" id="btnShuffle">Shuffle Deck And Distribute</span>
	</controls>
	</container>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	start();
	$( "#btnShuffle" ).click(function() {
		start();
	});	

	function start(){
		$.ajax({
			url: "process.php",
			type: 'POST',
			data:{
				"pCount":$('#txtPlayerCount').val(),
			}
		})
		.done(function($response) {
			//clear all
			$(".resultArray").remove();
			$(".group-player").remove();
			generateCard($response);
		}).fail(function($error) {
		  	console.log($error);
		});	
	}

	function generateCard(p){
		var data = JSON.parse(p);
		resultArray = $('<div></div>');
		resultArray.addClass('resultArray');
		$('container').append(resultArray);
		$('.resultArray').append("<h3>Result as Requested</h3><br>");
		for (var k in data) {
			playerName = parseInt(k)+1;
			group = $('<div></div>');
			$('container').append(group);
			group.addClass('group-player');
			group.append('<h3>Player '+playerName+'</h3>');
			for (let [key, value] of Object.entries(data[k])) {
			 	//append card container first
				el = $('<card id="card-'+value.stack[0].value+'"><corner><value></value><suit></suit></corner><center></center><corner><value></value><suit></suit></corner></card>');   
				group.append(el);
				cardSuit = value.stack[0].suit.suit;
				//change to symbol
				if(cardSuit == 'spade'){
					cardSuit = '♠';
				}
				else if(cardSuit == 'diamond'){
					cardSuit = '♦';
				}
				else if(cardSuit == 'heart'){
					cardSuit = '♥';
				}
				else if(cardSuit == 'club'){
					cardSuit = '♣';
				}
				cardValue = value.stack[0].value;

				el.addClass('no-' + cardValue);
				el.find('suit').html(cardSuit);

				el.find('value').html(cardValue);

				if(cardValue == '10'){
					var cardValueMod = 'X';
				}
				else{
					cardValueMod = cardValue;
				}
				//display the result in array
				$('.resultArray').append("<text class='outputTxt'>["+cardSuit+","+cardValueMod+"]</text>");

				if (cardValue ==='A') { el.find('center').html( '<symbol>'+cardSuit+'&#xFE0E;</symbol>' ); }
				else if (cardValue === 'K'  && (cardSuit ==='♥' || cardSuit === '♦')){ el.find('center').html('&#x2654;&#xFE0E;'); }
				else if (cardValue === 'K'  && (cardSuit ==='♠' || cardSuit === '♣')){ el.find('center').html('&#x265a;&#xFE0E;'); }
				else if (cardValue === 'Q'  && (cardSuit ==='♥' || cardSuit === '♦')){ el.find('center').html('&#x2655;&#xFE0E;'); }
				else if (cardValue === 'Q'  && (cardSuit ==='♠' || cardSuit === '♣')){ el.find('center').html('&#x265b;&#xFE0E;'); }
				else if (cardValue === 'J'  && (cardSuit ==='♥' || cardSuit === '♦')){ el.find('center').html('&#x2657;&#xFE0E;'); }
				else if (cardValue === 'J'  && (cardSuit ==='♠' || cardSuit === '♣')){ el.find('center').html('&#x265d;&#xFE0E;'); }
				else { 
				for( m=0; m < cardValue; m++) { el.find('center').append( '<symbol>'+cardSuit+'&#xFE0E;</symbol>' ); }
				}
				if (cardSuit ==='♥') {cardSuit = 'heart';}
				else if (cardSuit === '♦'){ cardSuit = 'diamond'; }
				else if (cardSuit === '♠'){ cardSuit = 'spade'; }
				else if (cardSuit === '♣'){ cardSuit = 'club'; }
				el.addClass(cardSuit);
			}
			$('.resultArray').append(",<br>");
		}
	}
</script>
</html>