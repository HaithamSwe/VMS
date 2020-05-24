<?php

require('connect.php');
if(isset($_SESSION)){
if ($_SESSION["Role_ID"] == 1)
    $sql = "Select Events.*,Teams.* from Events,Teams where Events.Team_ID=Teams.Team_ID Order BY Events.Event_ID";
else
    $sql = "Select Events.*,Teams.* from Events,Teams where Events.Team_ID=Teams.Team_ID and Teams.Team_Leader=" . $_SESSION["National_ID"]." Order BY Events.Event_ID";
$result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));

}
else{
if ($_POST["Role_ID"] == 1)
    $sql = "Select Events.*,Teams.* from Events,Teams where Events.Team_ID=Teams.Team_ID Order BY Events.Event_ID";
else
    $sql = "SELECT Users.*,Teams.Team_Name FROM Users,Teams where Teams.Team_ID=Users.Team_ID and Teams.Team_Leader=" . $_POST["National_ID"]." Order BY Events.Event_ID";
$result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));
}
?>




<table class="table dataTable my-0" id="dataTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Seats</th>
            <th>Team</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rec) : ?>
            <tr>
                <td><?php echo $rec["Event_ID"];  ?></td>
                <td style="padding-bottom: 0px;"><a href="Event.php?EventID=<?php echo $rec["Event_ID"]; ?>"><?php echo $rec["Name"];  ?><br></a><br></td>
                <td> <?php if ($rec["Gender"] == "M")
                            echo "Males";
                        else if ($rec["Gender"] == "F")
                            echo "Females";
                        else
                            echo "Both";
                        ?></td>
                <td><?php
                    $sql = "SELECT Event_ID,Count(Event_ID) as c from Applications where Event_ID =" . $rec["Event_ID"] . " group by Event_ID ";
                    $res = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($res) == 1)
                        echo $rec["Capacity"] - mysqli_fetch_assoc($res)["c"];
                    else
                        echo $rec["Capacity"];
                    ?></td>
                <td><?php echo $rec["Team_Name"];  ?></td>
                <td><?php echo $rec["Date"];  ?></td>
                <td><?php echo substr($rec["StartTime"], 0, 5) . "-" . substr($rec["EndTime"], 0, 5);  ?></td>
                <td><?php echo $rec["Location"]; ?></td>
                <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;"><br>
                    <div class="dropdown" style="width: 84px;"><button class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width: 90px;">More</button>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" role="presentation" href="Attendance.php?EventID=<?php echo $rec["Event_ID"];?>" >Take Attendance</a>
                            <a class="dropdown-item" role="presentation" data-toggle="modal" href="#myModal" <?php echo "onclick=\"Selection(".$rec["Event_ID"].")\"";?>>Assign Team</a>
                            <a class="dropdown-item" role="presentation"  <?php echo "href=\"EditEvent.php?Event_ID=".$rec["Event_ID"]."\""; ?>>Edit</a>
                            <a class="dropdown-item" role="presentation" <?php echo "onclick=\"Delete(".$rec["Event_ID"].")\"";?>>Delete</a>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>