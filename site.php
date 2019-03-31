<!-- This php just gets the values of difficulty and player name from the welcome page -->
<?php
    //receive difficulty
	if( isset($_GET["diff"]) )
	{
		$diff = $_GET["diff"];
	}

	//receive player name
	$name=$_GET["player_name"];

?>

<html>

<head>
    <title>Online Sudoku Game</title>
    <link rel="Stylesheet" type="text/css" href="site_css.css">

    <!--Style of the game board-->
    <style>
        td:nth-child(3)
        {   border-right-width:3px;
            border-right-style:solid;
        }
        td:nth-child(6)
        {   border-right-width:3px;
            border-right-style:solid;
        }

        tr:nth-child(3)
        {   border-bottom-width:3px;
            border-bottom-style:solid;
        }
        tr:nth-child(6)
        {   border-bottom-width:3px;
            border-bottom-style:solid;
        }
		
		lbtable {
			width: 100%;
			border-collapse: collapse;
		}

		lbtable, lbtd, lbth {
			border: 1px solid black;
			padding: 5px;
		}

		th {text-align: left;}
</style>


	<!-- This loads JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- show/hide leaderboard and answer -->
    <script src="page_effect.js"></script>

    <!-- Retrieves the leaderboard with Ajax -->
	<script type="text/javascript">
        function getLeaderboard() {
            var xmlhttp =new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() { 
				if(this.readyState==4 && this.status==200) { 
					document.getElementById("leaderboard").innerHTML = xmlhttp.responseText; 
				}
            }
            xmlhttp.open("GET","get_leaderboard.php",true);
            xmlhttp.send();
        }
		
		getLeaderboard();
	</script>

</head>

<body>

    <div id="div1">
        <div id="game_area">
            <h1>Your Game</h1>
			<!-- This is the Player board -->
            <table id="sudoku_board" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>  <input type="text" id="e11" name="e11" maxlength="1">  </td>
                    <td>  <input type="text" id="e12" name="e12" maxlength="1">  </td>
                    <td>  <input type="text" id="e13" name="e13" maxlength="1">  </td>
                    <td>  <input type="text" id="e14" name="e14" maxlength="1">  </td>
                    <td>  <input type="text" id="e15" name="e15" maxlength="1">  </td>
                    <td>  <input type="text" id="e16" name="e16" maxlength="1">  </td>
                    <td>  <input type="text" id="e17" name="e17" maxlength="1">  </td>
                    <td>  <input type="text" id="e18" name="e18" maxlength="1">  </td>
                    <td>  <input type="text" id="e19" name="e19" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e21" name="e21" maxlength="1">  </td>
                    <td>  <input type="text" id="e22" name="e22" maxlength="1">  </td>
                    <td>  <input type="text" id="e23" name="e23" maxlength="1">  </td>
                    <td>  <input type="text" id="e24" name="e24" maxlength="1">  </td>
                    <td>  <input type="text" id="e25" name="e25" maxlength="1">  </td>
                    <td>  <input type="text" id="e26" name="e26" maxlength="1">  </td>
                    <td>  <input type="text" id="e27" name="e27" maxlength="1">  </td>
                    <td>  <input type="text" id="e28" name="e28" maxlength="1">  </td>
                    <td>  <input type="text" id="e29" name="e29" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e31" name="e31" maxlength="1">  </td>
                    <td>  <input type="text" id="e32" name="e32" maxlength="1">  </td>
                    <td>  <input type="text" id="e33" name="e33" maxlength="1">  </td>
                    <td>  <input type="text" id="e34" name="e34" maxlength="1">  </td>
                    <td>  <input type="text" id="e35" name="e35" maxlength="1">  </td>
                    <td>  <input type="text" id="e36" name="e36" maxlength="1">  </td>
                    <td>  <input type="text" id="e37" name="e37" maxlength="1">  </td>
                    <td>  <input type="text" id="e38" name="e38" maxlength="1">  </td>
                    <td>  <input type="text" id="e39" name="e39" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e41" name="e41" maxlength="1">  </td>
                    <td>  <input type="text" id="e42" name="e42" maxlength="1">  </td>
                    <td>  <input type="text" id="e43" name="e43" maxlength="1">  </td>
                    <td>  <input type="text" id="e44" name="e44" maxlength="1">  </td>
                    <td>  <input type="text" id="e45" name="e45" maxlength="1">  </td>
                    <td>  <input type="text" id="e46" name="e46" maxlength="1">  </td>
                    <td>  <input type="text" id="e47" name="e47" maxlength="1">  </td>
                    <td>  <input type="text" id="e48" name="e48" maxlength="1">  </td>
                    <td>  <input type="text" id="e49" name="e49" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e51" name="e51" maxlength="1">  </td>
                    <td>  <input type="text" id="e52" name="e52" maxlength="1">  </td>
                    <td>  <input type="text" id="e53" name="e53" maxlength="1">  </td>
                    <td>  <input type="text" id="e54" name="e54" maxlength="1">  </td>
                    <td>  <input type="text" id="e55" name="e55" maxlength="1">  </td>
                    <td>  <input type="text" id="e56" name="e56" maxlength="1">  </td>
                    <td>  <input type="text" id="e57" name="e57" maxlength="1">  </td>
                    <td>  <input type="text" id="e58" name="e58" maxlength="1">  </td>
                    <td>  <input type="text" id="e59" name="e59" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e61" name="a61" maxlength="1">  </td>
                    <td>  <input type="text" id="e62" name="e62" maxlength="1">  </td>
                    <td>  <input type="text" id="e63" name="e63" maxlength="1">  </td>
                    <td>  <input type="text" id="e64" name="e64" maxlength="1">  </td>
                    <td>  <input type="text" id="e65" name="e65" maxlength="1">  </td>
                    <td>  <input type="text" id="e66" name="e66" maxlength="1">  </td>
                    <td>  <input type="text" id="e67" name="e67" maxlength="1">  </td>
                    <td>  <input type="text" id="e68" name="e68" maxlength="1">  </td>
                    <td>  <input type="text" id="e69" name="e69" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e71" name="e71" maxlength="1">  </td>
                    <td>  <input type="text" id="e72" name="e72" maxlength="1">  </td>
                    <td>  <input type="text" id="e73" name="e73" maxlength="1">  </td>
                    <td>  <input type="text" id="e74" name="e74" maxlength="1">  </td>
                    <td>  <input type="text" id="e75" name="e75" maxlength="1">  </td>
                    <td>  <input type="text" id="e76" name="e76" maxlength="1">  </td>
                    <td>  <input type="text" id="e77" name="e77" maxlength="1">  </td>
                    <td>  <input type="text" id="e78" name="e78" maxlength="1">  </td>
                    <td>  <input type="text" id="e79" name="e79" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e81" name="e81" maxlength="1">  </td>
                    <td>  <input type="text" id="e82" name="e82" maxlength="1">  </td>
                    <td>  <input type="text" id="e83" name="e83" maxlength="1">  </td>
                    <td>  <input type="text" id="e84" name="e84" maxlength="1">  </td>
                    <td>  <input type="text" id="e85" name="e85" maxlength="1">  </td>
                    <td>  <input type="text" id="e86" name="e86" maxlength="1">  </td>
                    <td>  <input type="text" id="e87" name="e87" maxlength="1">  </td>
                    <td>  <input type="text" id="e88" name="e88" maxlength="1">  </td>
                    <td>  <input type="text" id="e89" name="e89" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="e91" name="e91" maxlength="1">  </td>
                    <td>  <input type="text" id="e92" name="e92" maxlength="1">  </td>
                    <td>  <input type="text" id="e93" name="e93" maxlength="1">  </td>
                    <td>  <input type="text" id="e94" name="e94" maxlength="1">  </td>
                    <td>  <input type="text" id="e95" name="e95" maxlength="1">  </td>
                    <td>  <input type="text" id="e96" name="e96" maxlength="1">  </td>
                    <td>  <input type="text" id="e97" name="e97" maxlength="1">  </td>
                    <td>  <input type="text" id="e98" name="e98" maxlength="1">  </td>
                    <td>  <input type="text" id="e99" name="e99" maxlength="1">  </td>
                </tr>
            </table>

            <br>

			<!-- CheckBoard, resetBoard, clearBoard, Show Answer and Show Leaderboard buttons -->
			<!-- Also shows the timer -->
			<!-- Comments on the functionality of these buttons is in the Sudoku.js file -->
            <div id="game_actions">
			
					<button onclick="checkBoard()">Submit</button>
                	<button onclick="resetBoard()">Reset</button>
                	<button onclick="clearBoard()">Clear All</button>
                	<button id="answer_button">Show Answer</button>
                	<button id="leaderboard_button" onclick="loadDoc()">Show Leaderboard</button>
				    <label id="mins">00</label>:<label id="secs">00</label>

            </div>
        </div>

		<!-- The area for the leaderboard -->
        <div id="leaderboard_area">
            <h1>Leaderboard</h1>
            <table id=leaderboard>
				
			</table>
        </div>

        <div id="answer_area">
            <h1>Answer Key</h1>
			<!-- This is the answer board -->
            <table id="answer_board" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>  <input type="text" id="a11" name="a11" maxlength="1">  </td>
                    <td>  <input type="text" id="a12" name="a12" maxlength="1">  </td>
                    <td>  <input type="text" id="a13" name="a13" maxlength="1">  </td>
                    <td>  <input type="text" id="a14" name="a14" maxlength="1">  </td>
                    <td>  <input type="text" id="a15" name="a15" maxlength="1">  </td>
                    <td>  <input type="text" id="a16" name="a16" maxlength="1">  </td>
                    <td>  <input type="text" id="a17" name="a17" maxlength="1">  </td>
                    <td>  <input type="text" id="a18" name="a18" maxlength="1">  </td>
                    <td>  <input type="text" id="a19" name="a19" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a21" name="a21" maxlength="1">  </td>
                    <td>  <input type="text" id="a22" name="a22" maxlength="1">  </td>
                    <td>  <input type="text" id="a23" name="a23" maxlength="1">  </td>
                    <td>  <input type="text" id="a24" name="a24" maxlength="1">  </td>
                    <td>  <input type="text" id="a25" name="a25" maxlength="1">  </td>
                    <td>  <input type="text" id="a26" name="a26" maxlength="1">  </td>
                    <td>  <input type="text" id="a27" name="a27" maxlength="1">  </td>
                    <td>  <input type="text" id="a28" name="a28" maxlength="1">  </td>
                    <td>  <input type="text" id="a29" name="a29" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a31" name="a31" maxlength="1">  </td>
                    <td>  <input type="text" id="a32" name="a32" maxlength="1">  </td>
                    <td>  <input type="text" id="a33" name="a33" maxlength="1">  </td>
                    <td>  <input type="text" id="a34" name="a34" maxlength="1">  </td>
                    <td>  <input type="text" id="a35" name="a35" maxlength="1">  </td>
                    <td>  <input type="text" id="a36" name="a36" maxlength="1">  </td>
                    <td>  <input type="text" id="a37" name="a37" maxlength="1">  </td>
                    <td>  <input type="text" id="a38" name="a38" maxlength="1">  </td>
                    <td>  <input type="text" id="a39" name="a39" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a41" name="a41" maxlength="1">  </td>
                    <td>  <input type="text" id="a42" name="a42" maxlength="1">  </td>
                    <td>  <input type="text" id="a43" name="a43" maxlength="1">  </td>
                    <td>  <input type="text" id="a44" name="a44" maxlength="1">  </td>
                    <td>  <input type="text" id="a45" name="a45" maxlength="1">  </td>
                    <td>  <input type="text" id="a46" name="a46" maxlength="1">  </td>
                    <td>  <input type="text" id="a47" name="a47" maxlength="1">  </td>
                    <td>  <input type="text" id="a48" name="a48" maxlength="1">  </td>
                    <td>  <input type="text" id="a49" name="a49" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a51" name="a51" maxlength="1">  </td>
                    <td>  <input type="text" id="a52" name="a52" maxlength="1">  </td>
                    <td>  <input type="text" id="a53" name="a53" maxlength="1">  </td>
                    <td>  <input type="text" id="a54" name="a54" maxlength="1">  </td>
                    <td>  <input type="text" id="a55" name="a55" maxlength="1">  </td>
                    <td>  <input type="text" id="a56" name="a56" maxlength="1">  </td>
                    <td>  <input type="text" id="a57" name="a57" maxlength="1">  </td>
                    <td>  <input type="text" id="a58" name="a58" maxlength="1">  </td>
                    <td>  <input type="text" id="a59" name="a59" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a61" name="a61" maxlength="1">  </td>
                    <td>  <input type="text" id="a62" name="a62" maxlength="1">  </td>
                    <td>  <input type="text" id="a63" name="a63" maxlength="1">  </td>
                    <td>  <input type="text" id="a64" name="a64" maxlength="1">  </td>
                    <td>  <input type="text" id="a65" name="a65" maxlength="1">  </td>
                    <td>  <input type="text" id="a66" name="a66" maxlength="1">  </td>
                    <td>  <input type="text" id="a67" name="a67" maxlength="1">  </td>
                    <td>  <input type="text" id="a68" name="a68" maxlength="1">  </td>
                    <td>  <input type="text" id="a69" name="a69" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a71" name="a71" maxlength="1">  </td>
                    <td>  <input type="text" id="a72" name="a72" maxlength="1">  </td>
                    <td>  <input type="text" id="a73" name="a73" maxlength="1">  </td>
                    <td>  <input type="text" id="a74" name="a74" maxlength="1">  </td>
                    <td>  <input type="text" id="a75" name="a75" maxlength="1">  </td>
                    <td>  <input type="text" id="a76" name="a76" maxlength="1">  </td>
                    <td>  <input type="text" id="a77" name="a77" maxlength="1">  </td>
                    <td>  <input type="text" id="a78" name="a78" maxlength="1">  </td>
                    <td>  <input type="text" id="a79" name="a79" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a81" name="a81" maxlength="1">  </td>
                    <td>  <input type="text" id="a82" name="a82" maxlength="1">  </td>
                    <td>  <input type="text" id="a83" name="a83" maxlength="1">  </td>
                    <td>  <input type="text" id="a84" name="a84" maxlength="1">  </td>
                    <td>  <input type="text" id="a85" name="a85" maxlength="1">  </td>
                    <td>  <input type="text" id="a86" name="a86" maxlength="1">  </td>
                    <td>  <input type="text" id="a87" name="a87" maxlength="1">  </td>
                    <td>  <input type="text" id="a88" name="a88" maxlength="1">  </td>
                    <td>  <input type="text" id="a89" name="a89" maxlength="1">  </td>
                </tr>
                <tr>
                    <td>  <input type="text" id="a91" name="a91" maxlength="1">  </td>
                    <td>  <input type="text" id="a92" name="a92" maxlength="1">  </td>
                    <td>  <input type="text" id="a93" name="a93" maxlength="1">  </td>
                    <td>  <input type="text" id="a94" name="a94" maxlength="1">  </td>
                    <td>  <input type="text" id="a95" name="a95" maxlength="1">  </td>
                    <td>  <input type="text" id="a96" name="a96" maxlength="1">  </td>
                    <td>  <input type="text" id="a97" name="a97" maxlength="1">  </td>
                    <td>  <input type="text" id="a98" name="a98" maxlength="1">  </td>
                    <td>  <input type="text" id="a99" name="a99" maxlength="1">  </td>
                </tr>
            </table>
        </div>
    </div>
	<!-- Instructions on how to play the game -->
    <div id="instructions">
        <br>
        <h5>Game instructions</h5>
        <p>
            This is a standard 9 by 9 Sudoku game. The numbers given to you at the beginning are correct.<br>
			Your goal is to have every row, column and 3x3 square have 9 unique numbers 1 through 9.<br>
			The "Finish" button will submit your score, or if you have a mistake made, will show you where.<br>
			The "Reset" button will generate a new game to play.<br>
			The "Clear All" button will clear any user inputted numbers from the board<br>
			You are ranked based on the time it takes you to complete the board.
        </p>
    </div>
</body>

<!-- Setting php variables to javascript variables -->
<script>
    var diff = "<?php echo $diff; ?>";
	var name="<?php echo $name; ?>";
</script>

<!-- This just calls the function to generate the board -->
<script src="Sudoku.js">
    generateBoard(diff);
</script>

</html>
