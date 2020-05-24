<?php
if (!isset($_SESSION))
    session_start();
require('connect.php');
$Search = "";
if (isset($_GET["National_ID"]) && isset($_GET["Role_ID"])) {
    $National_ID = $_GET["National_ID"];
    $role = $_GET["Role_ID"];
    if (isset($_GET["Gender"]))
        $Gender = $_GET["Gender"];
    if (isset($_GET["Status"]))
        $Status = $_GET["Status"];
} else {

    if (!isset($_SESSION["National_ID"]))
        $role = 4;
    else {
        $role = $_SESSION["Role_ID"];
        $National_ID = $_SESSION["National_ID"];
        $Gender = $_SESSION["Gender"];
        $Status = $_SESSION["Status"];
    }
}

if (isset($_GET["search"]))
    $Search = $_GET["search"];

if ($role == 2)
    $sql = "SELECT Events.* from Events,Teams where Events.Name LIKE '$Search%'  and Events.Team_ID=Teams.Team_ID and Teams.Team_Leader=" . $National_ID . " and Events.Date>= CURDATE() Order by Events.Date";
else if ($role == 3)
    $sql = "SELECT Events.* from `Events`,Users where Events.Name LIKE '$Search%'    and `Events`.Team_ID=Users.Team_ID and Users.National_ID=" . $National_ID . " and Events.Date>= CURDATE() order by Events.Date";
else
    $sql = " SELECT Events.* from Events where  Events.Name LIKE '$Search%'    and Events.Date>= CURDATE() Order BY Events.Date";



$result = mysqli_query($connection, $sql) or
    die(mysqli_error($connection));



?>




<table class="table dataTable my-0" id="dataTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <?php if ($role == 3) : ?>
                <th></th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $rec) : ?>
            <?php if ($role == 3) : ?>
                <?php if ($Gender == $rec["Gender"] || $rec["Gender"] == "B") : ?>
                    <tr>
                        <td style="padding-bottom: 0px;"><a href="Event.php?EventID=<?php echo $rec["Event_ID"]; ?>"><?php echo $rec["Name"];  ?><br></a><br></td>
                        <td><?php echo $rec["Date"];  ?></td>
                        <td><?php echo substr($rec["StartTime"], 0, 5) . "-" . substr($rec["EndTime"], 0, 5);  ?></td>
                        <td><?php echo $rec["Location"]; ?></td>
                        <?php
                        $sql = "SELECT Event_ID,Count(Event_ID) as c from Applications where Event_ID =" . $rec["Event_ID"] . " group by Event_ID ";
                        $res = mysqli_query($connection, $sql);
                        $seats = $rec["Capacity"];
                        if (mysqli_num_rows($res) == 1)
                            $seats = $rec["Capacity"] - mysqli_fetch_assoc($res)["c"];


                        $sql = "SELECT * FROM Applications where Applications.Event_ID=" . $rec["Event_ID"] . "  and Applications.User_ID=$National_ID";
                        $res = mysqli_query($connection, $sql);
                        $applied = mysqli_num_rows($res) > 0;
                        if ($Status=="Blocked") : ?>
                            <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;">
                            <button class="btn btn-danger " type="button" style="margin-top: -3px; width:75px;" disabled>Blocked</button>
                            </td>
                        <?php elseif ($applied) : ?>
                            <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;">
                                <button class="btn btn-danger " type="button" onclick="Cancel(<?php echo $rec['Event_ID'] . ',' . $National_ID; ?>)" style="margin-top: -3px;">Cancel</button>
                            </td>
                        <?php elseif ($seats == "0") : ?>
                            <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;">
                                <button class="btn btn-warning " type="button" style="margin-top: -3px; width:75px;" disabled>Full</button>
                            </td>
                        <?php else : ?>
                            <td class="d-inline-flex justify-content-center align-items-center align-content-center" style="width: 116px;padding: 0;padding-top: 5px;padding-right: 0;padding-bottom: 0;padding-left: 0;">
                                <button class="btn btn-primary " type="button" style="margin-top: -3px; width:75px;" onclick="Apply(<?php echo $rec['Event_ID'] . ',' . $National_ID; ?>)">Apply</button>
                            </td>
                        <?php endif; ?>

                    </tr>
                <?php endif; ?>
            <?php else : ?>
                <tr>
                    <td style="padding-bottom: 0px;"><a href="Event.php?EventID=<?php echo $rec["Event_ID"]; ?>"><?php echo $rec["Name"];  ?><br></a><br></td>
                    <td><?php echo $rec["Date"];  ?></td>
                    <td><?php echo substr($rec["StartTime"], 0, 5) . "-" . substr($rec["EndTime"], 0, 5);  ?></td>
                    <td><?php echo $rec["Location"]; ?></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
    </tfoot>
</table>