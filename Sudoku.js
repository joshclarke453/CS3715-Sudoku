	var gennedCols;
	var gennedRows;
	var goalBoard;
	var userBoard;
	var wrongBoard;

	generateBoard();

	//This will take the difficulty selected by the user and call the functions
	//to generate a board with a number of tiles according to that difficulty.
	//
	//This function also calls generateAnswerBoard() to show the answer to the game.
	function generateBoard(difficulty) {
		gennedCols = [];
		gennedRows = [];
		userBoard = [
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0],
			[0,0,0,0,0,0,0,0,0]
			];
		wrongBoard = [
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null],
			[null,null,null,null,null,null,null,null,null]
			];
		var newBoard = getBoard();
		var diff = difficulty;
		goalBoard = newBoard;
		startUserBoard(); 
		generateAnswerBoard();
	}

	//This function loads the 2D array userBoard with randomly selected tiles.
	//"Demo" is just for showing the class how it works, and is not meant to be played on. It gives the user 80 of the possible 81 tiles.
	//"Easy" gives the user 54 tiles.
	//"Medium" gives the user 27 and "Hard" gives them 18 tiles.
	function startUserBoard() {
		var givenTiles = null;
		switch(diff) {
			case "Demo":
				givenTiles = 80;
				break;
			case "Easy":
				givenTiles = 54;
				break;
			case "Medium":
				givenTiles = 27;
				break;
			case "Hard":
				givenTiles = 18;
				break;
		}
		for (var i = 0 ; i < givenTiles ; i++) {
			var randomCol = Math.floor(Math.random() * 9);
			var randomRow = Math.floor(Math.random() * 9);
			var newTile = true;
			for (var q = 0 ; q < gennedCols.length ; q++ ) {
				if ((randomCol == gennedCols[q])&(randomRow == gennedRows[q])) {
					newTile = false;
				}
			}
			if (newTile == true) {
				gennedCols.push(randomCol);
				gennedRows.push(randomRow);
				userBoard[randomRow][randomCol] = goalBoard[randomRow][randomCol];
			} else {
				--i;
			}
		}
		loadUserBoard();
	}

	//This function takes userBoard and uses DOM to insert it into the table.
	function loadUserBoard() {
		for (var i = 0 ; i < 9 ; i++) {
			for (var k = 0 ; k < 9 ; k++) {
				if (userBoard[i][k] == 0) {
					//Do nothing
				} else {
					var col = i+1;
					var row = k+1;
					var string = "e"+(col)+(row);
					document.getElementById(string).value = userBoard[i][k];
					document.getElementById(string).readOnly = true;
				}
			}
		}
	}

	//This function will take the user input and test it against the answer (goalBoard) to see if they got any wrong.
	//It stores any incorrect input in wrongBoard.
	function checkBoard() {
		for (var i = 0 ; i < 9 ; i++) {
			for (var k = 0 ; k < 9 ; k++) {
				var col = i+1;
				var row = k+1;
				var string = "e"+(col)+(row);
				userBoard[i][k] = document.getElementById(string).value;
			}
		}
		for (var a = 0 ; a < 9 ; a++) {
			for (var b = 0 ; b < 9 ; b++) {
				if ((userBoard[a][b] == goalBoard[a][b]) || (userBoard[a][b] == 0) || (userBoard[a][b] == null)) {
					wrongBoard[a][b] = true;
				} else {
					wrongBoard[a][b] = false;
				}
			}
		}
		checkWrongBoard();

	}

	//This function looks at wrongBoard and will tell the user if it is wrong by highlighting it red.
	//If there is no wrong input, this function then submits it to the leaderboard.
	function checkWrongBoard() {
		var perfectBoard = true;
		for (var r = 0 ; r < 9 ; r++) {
			for (var q = 0 ; q < 9 ; q++) {
				var col = r+1;
				var row = q+1;
				var string = "e"+(col)+(row);
				if (wrongBoard[r][q] == true) {
					document.getElementById(string).style.backgroundColor = "#FFFFFF" ;
					if ((userBoard[r][q] == 0) || (userBoard[r][q] == null)) {
						perfectBoard = false
					}
				} else {
					document.getElementById(string).style.backgroundColor = "#FF0000" ;
					perfectBoard = false;
				}
			}
		}
		if (perfectBoard == true)
		{
			var score;
			score="00:"+mins+":"+secs;

			$.ajax({
				type: "POST",
				url: "insertToLeaderboard.php",
				data: "score=" + score +"&name=" + name + "&diff=" + diff,
				success: function(data) {
					//Do nothing
				}
			});
		}
		else
		{
			alert("Tiles marked as red are incorrect.");
		}
	}

	//This function clears any user input to the board, but does not generate a new one. 
	//It is simply used to restart the same game with the same tiles given.
	function clearBoard() {
		for (var i = 0 ; i < 9 ; i++) {
			for (var k = 0 ; k < 9 ; k++) {
				var col = i+1;
				var row = k+1;
				var string = "e"+col+row;
				document.getElementById(string).value = null;
				document.getElementById(string).style.backgroundColor = "#FFFFFF" ;
			}
		}
		for (var f = 0 ; f <= gennedCols.length ; f++) {
			var colGenned = gennedCols[f];
			colGenned=colGenned + 1;
			var rowGenned = gennedRows[f];
			rowGenned = rowGenned + 1;
			var string = "e"+rowGenned+colGenned;
			document.getElementById(string).value = goalBoard[rowGenned-1][colGenned-1];
		}
	}

	//This function just generates the answer which is shown to the right of the board.
	function generateAnswerBoard() {
		for (var i = 0 ; i < 9 ; i++) {
			for (var k = 0 ; k < 9 ; k++) {
				var col = i+1;
				var row = k+1;
				var string = "a"+(col)+(row);
				document.getElementById(string).value = goalBoard[i][k];
				document.getElementById(string).readOnly = true;
			}
		}
	}
	
	//This function randomly selects one of 3 manually entered boards to be given to the user.
	function getBoard() {
		var boardList = [];
		boardList.push([
			[4,2,3,6,9,7,8,1,5],
			[6,9,1,5,3,8,4,7,2],
			[5,8,7,4,2,1,6,3,9],
			[3,1,9,8,7,5,2,6,4],
			[2,5,6,1,4,9,3,8,7],
			[7,4,8,3,6,2,5,9,1],
			[9,6,4,2,1,3,7,5,8],
			[1,3,5,7,8,4,9,2,6],
			[8,7,2,9,5,6,1,4,3]
		]);
		
		boardList.push([
			[8,2,7,1,5,4,3,9,6],
			[9,6,5,3,2,7,1,4,8],
			[3,4,1,6,8,9,7,5,2],
			[5,9,3,4,6,8,2,7,1],
			[4,7,2,5,1,3,6,8,9],
			[6,1,8,9,7,2,4,3,5],
			[7,8,6,2,3,5,9,1,4],
			[1,5,4,7,9,6,8,2,3],
			[2,3,9,8,4,1,5,6,7]
		]);
		
		boardList.push([
			[9,2,5,6,3,1,8,4,7],
			[6,1,8,5,7,4,2,9,3],
			[3,7,4,9,8,2,5,6,1],
			[7,4,9,8,2,6,1,3,5],
			[8,5,2,4,1,3,9,7,6],
			[1,6,3,7,9,5,4,8,2],
			[2,8,7,3,5,9,6,1,4],
			[4,9,1,2,6,7,3,5,8],
			[5,3,6,1,4,8,7,2,9]
		]);
		
		var index = Math.floor(Math.random() * boardList.length);
		return boardList[index];
	}
	
	//This function gives a new board and resets the timer, allowing for a new game.
	function resetBoard() {
		for (var i = 0 ; i < 9 ; i++) {
			for (var k = 0 ; k < 9 ; k++) {
				var col = i+1;
				var row = k+1;
				var string = "e"+col+row;
				document.getElementById(string).value = null;
				document.getElementById(string).style.backgroundColor = "#FFFFFF" ;
				document.getElementById(string).readOnly = false;
			}
		}
		generateBoard();
		resetTime();
	}
	
	
	
	
	/*
	 *
	 *
	 *Everything below this is code for the timer which is displayed.
	 *
	 *
	 */
	var minsLabel = document.getElementById("mins");
	var secsLabel = document.getElementById("secs");
	var totSecs = 0;
	setInterval(setTime, 1000);

	var mins,secs;

	//This function just increments the timer.
	function setTime() {
		++totSecs;
		secsLabel.innerHTML = pad(totSecs % 60);
		minsLabel.innerHTML = pad(parseInt(totSecs / 60));

		secs=pad(totSecs % 60);
		mins=pad(parseInt(totSecs / 60));

	}

	//This function pads the timer with a 0 if it is one character long.
	function pad(val) {
		var valString = val + "";
		if (valString.length < 2) {
			return "0" + valString;
		} else {
			return valString;
		}
	}
	
	//This function resets the timer. It is called when the board is reset.
	function resetTime() {
		totSecs = 0;
		document.getElementById("secs").innerHTML = "00";
		document.getElementById("mins").innerHTML = "00";
	}