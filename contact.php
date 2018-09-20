<?php include('head.php'); ?>
<script>setActive('contact');</script>	
	<main>
	<div id="main-container">
		<h1>Contact us!</h1>
		<p>Enter your information below. All information is required.</p>
                <form id="contact" class="contact" action="thanks.php" method="post">
			<label for="fName">First Name:</label>
			<input type="text" name="fName" id="fName" required>
                        <span>*</span>
			
			<label for="lName">Last Name:</label>
			<input type="text" name="lName" id="lName" required>
                        <span>*</span>
			
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" required>
                        <span>*</span>
			
			<label for="phone">Phone:</label>
			<input type="tel" id="phone" name="phone" required>
                        <span>*</span>
			
			<label for="contact-reason">Reason for contact:</label>
			<select name="contact-reason" id="contact-reason">
				<option value="default">Select a value</option>
				<option value="Recommend">Recommendation</option>
				<option value="Criticize">Criticism</option>
				<option value="Question">Questions</option>
				<option value="Other">Other</option>
			</select>
                        <span>*</span>
			
			<label for="info">Let us know the reason below!</label>
			<textarea id="info" name="info" rows="3" cols="25" required></textarea>
                        
			
                        <input type="submit" onclick='verifyAll();' id='fred' class="btn" value="Send">
		</form>
		
		<p id="thanks"></p>
	</div>
	</main>
	
<?php include('foot.php'); ?>