<!doctype html>

<html lang="en">
    
    <?php  
    
    $path = "../lib";
    chdir($path); // change directory
    require_once getcwd() . "/func/case-note.php";
    
   include "../lib/include/head.php" ?>

<body>

    <?php include "../lib/include/menu.php" ?>
    
    <h1>Case Notes</h1>
    
    <div class="wrapper4">
        <input type="text" name="caseNoteTitle" id="caseNoteTitle" size="40" placeholder="Title">
        <input type="datetime-local" name="caseNoteDateTime" id="caseNoteDateTime">
        <br><br>
        <textarea name="caseNoteRecord" id="caseNoteRecord" rows="8" cols="100" placeholder="Enter case note here"></textarea><br>
        
        <div class="submit">
        <input type="submit" value="Submit" class="button">
        </div><br>
       
        <hr><br>
        
        <div class="table-responsive-md">
        <table class="table">
            <thead>
            <tr>
                <th>Date & Time</th>    
                <th>Title</th>
                <th>Note</th>
                <th>Staff ID</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>11/29/18 01:15 PM</td>
                <td>Job Offer</td>
                <td>Resident was offered job at Burger King today</td>
                <td>1</td>
            </tr>
            <tr>
                <td>11/28/18 03:35 PM</td>
                <td>Drug Test Results</td>
                <td>Resident tested negative for drug test today</td>
                <td>2</td>
            </tr>
            </tbody>
        </table>
        </div>
    
    </div>
    
    <?php include "../lib/include/footer.php" ?>
	<?php include "../lib/include/script.php" ?>

</body>
</html>