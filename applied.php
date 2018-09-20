<?php include('head.php'); ?>	
<?php 
require('./Model/login.php'); //We'll have to test this
require('./Model/contactDB.php');
    //Send info to our DB!
    $email = filter_input(INPUT_POST, 'email');
    $time = date("Y-m-d H:i:s");
    
    $error;
    
    // Validate input
    if ($email == null) {
        $error = "Invalid input data. Check all fields and try again.";
        
        echo "Form Data Error: " . $error; 
        exit();
        } else { //If we've got inputs in the email start the page
?>
	<main>
	<div id="main-container" class="background-fade">
            <?php
                NewsletterDB::createNews($email, $time, $error);
                } //end else (where inputs are available)
            ?>
		<h1>Thank you for your application!</h1>
	</div>
	</main>
	
<?php include('foot.php'); ?>