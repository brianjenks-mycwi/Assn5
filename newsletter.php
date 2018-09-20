<?php include('head.php'); ?>
<script>setActive('news');</script>	

	<main>
	<div id="main-container" class="background-fade">
		<h1>Allow us to send you information and updates!</h1>
		<p>If you sign up for our newsletter, we'll send you an email when the site gets an update, or for when classes are available!</p>
		
		<form id="contact" class="newsletter" action="applied.php" method="post">
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" required>
                        <span>*</span>
			
			<label for="confirm-email">Confirm Email:</label>
			<input type="email" id="confirm-email" name="confirm-email" required>
                        <span>*</span><br>
                        
			<input type="submit" class="btn" id='verify_email' value="Submit!">
		</form>
		<p id="thanks"></p>
	</div>
	</main>
	
<?php include('foot.php'); ?>