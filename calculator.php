<?php include('head.php'); ?>
<script>setActive('calc');</script>

	<main>
	<div id="main-container">
		<h1>In-browser calculator</h1>
			<form id="calculator" name="calculator">
				<table border=4>
				<tr>
					<td>
						<input type="text" name="Input" Size="20" class="align-right">
						<br>
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" name="one" value="  1  "
							OnClick="calculator.Input.value
							+= '1'" class="push-right">
						<input type="button" name="two" value="  2  "
							OnClick="calculator.Input.value
							+= '2'">
						<input type="button" name="three" value="  3  "
							OnClick="calculator.Input.value
							+= '3'">
						<input type="button" name="plus" value="  +  "
							OnClick="calculator.Input.value
							+= ' + '">
						<br>
						<input type="button" name="four" value="  4  "
							OnClick="calculator.Input.value
							+= '4'" class="push-right">
						<input type="button" name="five" value="  5  "
							OnClick="calculator.Input.value
							+= '5'">
						<input type="button" name="six" value="  6  "
							OnClick="calculator.Input.value
							+= '6'">
						<input type="button" name="minus" value="  -  "
							OnClick="calculator.Input.value
							+= ' - '">
						<br>
						<input type="button" name="seven" value="  7  "
							OnClick="calculator.Input.value
							+= '7'" class="push-right">
						<input type="button" name="eight" value="  8  "
							OnClick="calculator.Input.value
							+= '8'">
						<input type="button" name="nine" value="  9  "
							OnClick="calculator.Input.value
							+= '9'">
						<input type="button" name="times" value="  x  "
							OnClick="calculator.Input.value
							+= ' * '">
						<br>
						<input type="button" name="clear" value="  c  "
							OnClick="calculator.Input.value
							= ''" class="push-right">
						<input type="button" name="zero" value="  0  "
							OnClick="calculator.Input.value
							+= '0'">
						<input type="button" name="DoIt" value="  =  "
							OnClick="calculator.Input.value
							= eval(calculator.Input.value)">
						<input type="button" name="div" value="  /  "
							OnClick="calculator.Input.value
							+= ' / '">
					</td>
				</tr>
			</table>
		</form> <!-- end calculator -->
		<br><br>
		<h1>To help you calculate how hard you need to study...</h1>
		<h2>Here's a score calculator!</h2>
		<h2>Input your percentages to see how well your tests may need to go!</h2>
		<h3>(Please fill in all of the textboxes below with numbers before pressing the button)</h3>
		<div class="container-test-calc">
			<form class="test-calc">
			<label for="score1">Score 1: </label>
				<input type="text" name="score1" id="score1"><br>
			<label for="score2">Score 2: </label>
				<input type="text" name="score2" id="score2"><br>
			<label for="score3">Score 3: </label>
				<input type="text" name="score3" id="score3"><br>
			<label for="score4">Score 4: </label>
				<input type="text" name="score4" id="score4"><br>
			<label for="score5">Score 5: </label>
				<input type="text" name="score5" id="score5"><br>
			
			
			<button type="button" class="btn" onclick="TestScoresCalc();">Calculate!</button>
			</form>
			<p>Your total: <span id="test-calc-output"></span></p>
		</div> <!-- test calc container -->
	</div>
	</main>
	
<?php include('foot.php'); ?>