<?php
//include_once("head.php"); //This should already be instantiated on the page here
if (!isset($error)) { //This should only happen if we straight navigate here.
    $error = 'Programmer did not program correctly. Contact your Administrator.';
    include_once("head.php"); //If we're navigating here manually, we need this
}
?>
<main>
    <div id="main-container" class="background-fade">
        <p class='red-text'>
            <b><?php echo "ERROR: " . $error; //Tell us why we're on this page ?></b>
        </p>
    </div>
</main>

<?php
include_once("foot.php");
?>