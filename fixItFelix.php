<?php include('head.php'); ?>
<script>setActive('admin');</script>
<main>
    <div id="main-container" class="background-fade">
        <?php
            include_once('./Model/login.php'); //Our source to open our database
            include_once('./Model/contactDB.php'); // The classes we require
            //Now we need to check our post data
            $error; //Instantiate to see if we have errors
            $deleteID = filter_input(INPUT_POST, 'remove'); //Instantiate our posted delete
            if ($deleteID) { //If we have any post data
                ContactDB::deleteContact($deleteID, $error); //Delete the item
            }
            
            //See what employee to sort by, auto go to emp 1
            $selectEmp = filter_input(INPUT_POST, 'empSel');
            if (!isset($selectEmp)) { //Set a default when coming from the page
                $selectEmp = 1;
            }
            
            //Check to see if we have any errors with establishing a connection to the database
            if (isset($error)) {
                include_once('error.php');
                exit(); //Do not load more of this page
            } else { //We'll load the employees
                $employees = EmployeeDB::getEmployees($error); //Instantiate our possible table
            }
//            if (isset($error)) { //We don't need this, the PDO creation will figure it out
//                include_once('error.php');
//                exit();
//            }
            
        ?>
        
        <form action='./fixItFelix.php' method='post'>
            <label>Select an employee number: </label>
            <select name="empSel">
                <?php  //What employee information do you want to see?
                    
                    //Creates a cool little dropdown for us
                    foreach ($employees as $employee) :
                        echo "<option value='" .
                            $employee->getID() . "'";
                    if ($selectEmp == $employee->getID()) { //When it is the one shown
                        echo " selected" ; //Have it be the first item shown
                    }
                        echo ">" . 
                            $employee->getID() . "</option>";
                    endforeach;
                ?>
            </select>
            <input type="submit" value='Update'>
        </form>
        
        <table id="contacts"> <!-- Create our contacts to be displayed -->
            <tr> <!-- Label each column -->
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Reason</th>
                <th>Date</th>
                <th>Assigned Employee</th>
                <th>Their reason</th>
                <th>Remove</th>
            </tr>
            <?php
                $contacts = ContactDB::getContacts($error); //Get our contacts
                foreach($contacts as $contact) : //Move through contacts
                    if ($contact->getAssnEmp() == $selectEmp) {
                        //Only display data when the items are selected
            ?>
            <tr> <!-- This will show each contact's info -->
            <td> <?php echo $contact->getID(); ?> </td>
            <td><?php echo $contact->getFirstName(); ?></td>
            <td><?php echo $contact->getLastName(); ?></td>
            <td><?php echo $contact->getEmail(); ?></td>
            <td><?php echo $contact->getPhone(); ?></td>
            <td><?php echo $contact->displayReason(); ?></td>
            <td><?php echo $contact->getDate(); ?></td>
            <td><?php echo $contact->getAssnEmp(); ?></td>
            <td><?php echo $contact->getData(); ?></td>
            <td> <!-- Show our delete button, send data to stay on same employee -->
                <form action='./fixItFelix.php' method='post'>
                    <input type='hidden' name='remove'
                           value=<?php echo '\'' . $contact->getID() . '\''; ?>>
                    <input type='hidden' name='empSel'
                           value=<?php echo '\'' . $selectEmp . '\'' ?> >
                    <input type='submit' value='Delete'>
                </form>
            </td>
            </tr>
                    <?php } endforeach; //End the if ?>
        </table>
    </div>
</main>
<?php include('foot.php'); ?>