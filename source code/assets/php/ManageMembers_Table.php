<?php
require('connect.php');


if(!isset($_SESSION)){
    if ($_POST["Role_ID"] == 1)
    $sql = "SELECT Users.*,Teams.Team_Name FROM Users,Teams where Teams.Team_ID=Users.Team_ID and Role_ID=3 Order BY Users.National_ID";
else
    $sql = "SELECT Users.*,Teams.Team_Name FROM Users,Teams where Teams.Team_ID=Users.Team_ID and Teams.Team_Leader=" . $_POST["National_ID"]." Order BY Users.National_ID";
$result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));

}
else{
if ($_SESSION["Role_ID"] == 1)
    $sql = "SELECT Users.*,Teams.Team_Name FROM Users,Teams where Teams.Team_ID=Users.Team_ID and Role_ID=3 Order BY Users.National_ID";
else
    $sql = "SELECT Users.*,Teams.Team_Name FROM Users,Teams where Teams.Team_ID=Users.Team_ID and Teams.Team_Leader=" . $_SESSION["National_ID"]." Order BY Users.National_ID";
$result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));
}
?>




<table class="table dataTable my-0" id="dataTable">
    <thead>
        <tr>
            <th>Gov ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>BirthDate</th>
            <th>Team</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rec) : ?>
            <tr>
                <td><?php echo $rec["National_ID"];  ?></td>
                <td style="padding-bottom: 0px;"><?php echo $rec["FName"] . " " . $rec["LName"]; ?><br><br></td>
                <td><?php echo $rec["Email"];  ?></td>
                <td> <?php if ($rec["Gender"] == "M")
                            echo "Male";
                        else
                            echo "Female";
                        ?></td>
                <td><?php echo $rec["BirthDate"]; ?></td>
                <td><?php echo $rec["Team_Name"];  ?></td>
                <td><?php echo $rec["Status"];  ?></td>
                <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;"><br>
                    <div class="dropdown" style="width: 84px;"><button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 90px;">More</button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" data-toggle="modal" href="#myModal" <?php echo "onclick=\"Selection(".$rec["National_ID"].")\"";?>>Assign Team</a>
                            <?php if($rec["Status"]=="Active"):?>
                            <a class="dropdown-item" role="presentation" <?php echo "onclick=\"Block(".$rec["National_ID"].")\"";?>>Block</a>
                            <?php else:?>
                                <a class="dropdown-item" role="presentation" <?php echo "onclick=\"Activate(".$rec["National_ID"].")\"";?>>Activate</a>
                            <?php endif;?>
                            
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>