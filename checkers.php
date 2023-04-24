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

<div class="black_background" id="black_background"> </div>

	<div class="score" id="score"><br></div>

	<?php 
if($_SESSION['opponent']['gameColor'] == "red" || $_SESSION["player"]["gameColor"] == "blue") { 
	?>
	<div class="label"><?= $_SESSION['opponent']['username'] ?></div>
<?php } else { ?>
	<div class="label"><?= $_SESSION['player']['username'] ?></div>
<?php } ?>

<div class="table" id="table">	

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

<?php 

if($_SESSION["player"]["gameColor"] == "red" || $_SESSION['opponent']['gameColor'] == "blue") { ?>
	<div class="label"><?= $_SESSION['opponent']['username'] ?></div>
<?php } else { ?>
	<div class="label"><?= $_SESSION['player']['username'] ?></div>
<?php } ?>

<div class="end"><a href="endGame.php">End Game</a></div>

<audio id="moveSound">
	<source src = "sounds/move.mp3"> 
</audio>

<audio id="winSound">
	<source src="sounds/win.mp3">
</audio>

<script src="script.js" > </script>
</body>
</html>