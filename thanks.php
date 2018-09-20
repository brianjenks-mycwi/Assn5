<?php include('head.php'); ?>

<?php //Send info to our DB!
require('./Model/login.php');
require('./Model/contactDB.php');
    $fName = filter_input(INPUT_POST, 'fName');
    $lName = filter_input(INPUT_POST, 'lName');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $reason = filter_input(INPUT_POST, 'contact-reason');
    $time = date("Y-m-d H:i:s"); //Auto-pop date/time
    $msg = filter_input(INPUT_POST, 'info');
    
    $error; //Instantiated for errors from the functions we call
    
    // Validate inputs
    if ($fName == null || $lName == null || $email == null ||
        $phone == null || $msg == null) {
        $error = "Invalid input data. Check all fields and try again.";
        
        echo "Form Data Error: " . $error; 
        exit();
        } else { //If we've got inputs in everything...
            is_numeric($phone) ?  : $phone = 0 ; //Make sure our phone is a number!
            //Change the contact-reason input to its associated number!
            if ($reason == "Recommend") {
                $reason = 1;
            } else if ($reason == "Criticize") {
                $reason = 2;
            } else if ($reason == "Question") {
                $reason = 3;
            } else if ($reason == "Other") {
                $reason = 4;
            } else { //If it's not anything we want to recognize
                $reason = 0;
            } //End change of $reason
            
            
            ContactDB::createContact($fName, $lName, $email, $phone, $reason, $time, $msg, $error);
            if ($error) {
                include('error.php');
                exit();
            }
            
            

} //end else (where inputs are available)

?>
	<main>
	<div id="main-container" class="background-fade">
		<h1>Thank you for your concern!</h1>
	</div>
	</main>
	
<?php include('foot.php'); ?>