<?php 
require_once('connect.php');
$sql="SELECT 
    Users.National_ID, Users.FName,Users.LName
FROM
    Applications,
    Users
WHERE
    Users.National_ID = Applications.User_ID
        AND Applications.Status = 1
        AND Applications.Event_ID = ".$_POST["Event_ID"]."
        And Applications.User_ID not in (select Attendance.User_ID from Attendance where  Event_ID=".$_POST["Event_ID"].")";
$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection));
?>

                                <?php foreach($result as $rec):?>
                                    <option value="<?php  echo $rec["National_ID"];  ?>" ><?php echo $rec["FName"]." ".$rec["LName"];?></option>
                                <?php endforeach;?>