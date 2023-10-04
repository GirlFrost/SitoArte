var downloadTimer = null;
/*game crea un oggetto contenente nome del quadro e path dell'immagine*/
function game(){
    var cards = [
		{
			name: "painer",
			img: "../img/cards/card0.jpg",
        },
        {
			name: "origami",
			img: "../img/cards/card1.jpg",
        },
        {
			name: "fish",
			img: "../img/cards/card2.jpg",
        },
        {
			name: "paint",
			img: "../img/cards/card3.jpg",
        },
        {
			name: "bonsai",
			img: "../img/cards/card4.jpg",
        },
        {
			name: "canvas",
			img: "../img/cards/card5.jpg",
        },
        {
			name: "colour",
			img: "../img/cards/card6.jpg",
        },
        {
			name: "brush",
			img: "../img/cards/card7.jpg",
		},
		{
			name: "painer",
			img: "../img/cards/card0.jpg",
        },
        {
			name: "origami",
			img: "../img/cards/card1.jpg",
        },
        {
			name: "fish",
			img: "../img/cards/card2.jpg",
        },
        {
			name: "paint",
			img: "../img/cards/card3.jpg",
        },
        {
			name: "bonsai",
			img: "../img/cards/card4.jpg",
        },
        {
			name: "canvas",
			img: "../img/cards/card5.jpg",
        },
        {
			name: "colour",
			img: "../img/cards/card6.jpg",
        },
        {
			name: "brush",
			img: "../img/cards/card7.jpg",
        }
    ]

	/*Cattura il click sul bottone New Game */
	$("#start").click(function(){
		score(0);
		shuffle(cards);
		var card = $(".table");
		card.children().remove(); /*rimuove i blocchi se già presenti*/
		var cardNameImg = []; /*array stringhe nomi dei quadri*/
		var cardIdImg= [];/*array id */
		var found = []; /*array string carte trovate, nome quadro*/


		for (let i = 0; i < cards.length; i++) {
			card.append( "<img src=\"../img/cards/back.jpg\" id=\""+i+"\"></img>" );
		}

		clearInterval(downloadTimer);
		timer(card);

		/*Cattura il click sulla card e la gira per mostrare l'immagine*/
		card.children().click(function(){
			var cardId = $(this).attr("id");

			/*Non ci devono essere due elementi con lo stesso id nel array*/
			if(cardIdImg.indexOf(cardId) == -1){

				cardNameImg.push(cards[cardId].name);
				cardIdImg.push(cardId);
			}

			/*Se ho girato meno di due carte posso ancora girare*/
			if(cardIdImg.length<=2){
				$(this).attr("src", cards[cardId].img);
			}
			
			/*Ho girato due carte*/
			if(cardNameImg.length == 2){
				setTimeout(function(){
					var clickId1 = cardIdImg[0];
					var clickId2 = cardIdImg[1];
					var clickName1 = cardNameImg[0];
					var clickName2 = cardNameImg[1];
					if(clickName1 == clickName2 && clickId1 != clickId2){
						$("#"+ clickId1).css("opacity", "0");
						$("#"+ clickId2).css("opacity", "0");
						
						score(100); /*+100*/
						found.push(cardNameImg);
					}else{
						$("#"+ clickId1).attr("src", "../img/cards/back.jpg");
						$("#"+ clickId2).attr("src", "../img/cards/back.jpg");
						score(10);
					}
					
					cardNameImg = [];
					cardIdImg = [];

					if(found.length == cards.length/2){
						submitmessage("win");
						clearInterval(downloadTimer);
					}
				}, 700)
			}
		})
	})
}

/*Aggiunge +100punti in caso trovo due card uguali
Toglie -10 punti in caso di match errato*/ 
function score(scorepoints){
	var oldscore = parseInt($("#score").text()) ;
	if(scorepoints == 10 ){
		actualscore = oldscore - scorepoints;
		if (actualscore <= 0){
			actualscore = 0;
		}
	}else if(scorepoints == 0){
		actualscore = 0;
	}else{
		actualscore = oldscore + scorepoints;
	}
	
	$("#score").find("span").remove();
	$("#score").append("<span>"+actualscore+"<span>");
}
/*Dispone in modo randomico gli elementi dell'array*/
function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

/*Aggiorna il timer durante la partita*/
function timer(card){
	var timeleft = 40;
    downloadTimer = setInterval(function(){
    	timeleft--;
    	$("#countdowntimer").text(timeleft);
		if(timeleft <= 0){
			submitmessage("lose");
			card.children().off( "click" )
			clearInterval(downloadTimer);
		}
	},1000);
}