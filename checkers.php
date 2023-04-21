<?php 
	require_once("functions.php")
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
	<link rel="stylesheet" href="style.css">

</head>

<body id="ht">
<!-- these 3 are set so that the indexing of the classes starts from 1 -->
<div class="checker white_checker" style="display:none"> </div>
<div class="checker black_checker" style="display:none"> </div>
<div class="square" style="display: none" id ="ht"> </div>

<div><?= $_SESSION['player']['username'] ?></div>

<div class="black_background" id="black_background"> </div>

	<div class="score" id="score"><br></div>

<div class="table" id="table">

	<?php
		$result = db_select('player', "id = {$_SESSION['player']['id']}");

		if ($result[0]["gameColor"] == "blue") {
	?>

	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>	
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>
	<div class="checker white_checker" style="background: #0b0bfa"> </div>	 

	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>
	<div class="checker black_checker" style="background: #CC0000"> </div>

	<?php } else { ?>

	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>	
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>
	<div class="checker white_checker"> </div>	

	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>
	<div class="checker black_checker"> </div>

	<?php }?>

	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="clear_float"> </div>
	
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="clear_float"> </div>

	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="clear_float"> </div>

	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="clear_float"> </div>

	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="clear_float"> </div>

	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="clear_float"> </div>

	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="clear_float"> </div>

	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="square white_square"> </div>
	<div class="square black_square"> </div>
	<div class="clear_float"> </div>

</div>

<div><?= $_SESSION['opponent']['username'] ?></div>

<a href="endGame.php" type="button">End Game</a>

<audio id="moveSound">
	<source src = "sounds/move.mp3"> 
</audio>

<audio id="winSound">
	<source src="sounds/win.mp3">
</audio>

<script src="script.js" > </script>
</body>
</html>