<?php
require_once('connect.php');
$sql = "SELECT Users.National_ID, Users.FName,Users.LName FROM Users,Attendance where Users.National_ID=Attendance.User_ID and Attendance.Event_ID=" . $_POST["Event_ID"];
$result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));
?>


<?php foreach ($result as $rec) : ?>
    <tr>
        <td><?php echo $rec["National_ID"];  ?></td>
        <td><?php echo $rec["FName"] . " " . $rec["LName"]; ?></td>
        <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;"><br><button class="btn btn-danger" type="button" style="margin-left: 10px;" <?php echo "onclick=\"DeletefromList(".$rec["National_ID"].",".$_POST["Event_ID"].")\"";?>>Delete</button></td>
    </tr>
<?php endforeach; ?>