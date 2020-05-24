<?php 
if ($_SESSION["Role_ID"] == 2)
$sql = "SELECT Events.* from Events,Teams where Events.Team_ID=Teams.Team_ID and Teams.Team_Leader=" .$_SESSION["National_ID"]   . " and Events.Date>= CURDATE() Order by Events.Date LIMIT 0,3";
else if ($_SESSION["Role_ID"]  == 3)
$sql = "SELECT Events.* from `Events`,Users where `Events`.Team_ID=Users.Team_ID and Users.National_ID=" . $_SESSION["National_ID"] . " and Events.Date>= CURDATE() order by Events.Date LIMIT 0,3";
else
$sql = " SELECT Events.* from Events where Events.Date>= CURDATE() Order BY Events.Date LIMIT 0,3";

$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection)); 
?>

<div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-warning font-weight-bold m-0">Incoming Events</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                <?php foreach($result as $rec):?>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <h6 class="mb-0"><a href="Event.php?EventID='<?php echo $rec["Event_ID"];?>'">
                                                <strong><?php echo $rec["Name"];?></strong><br></a></h6>
                                                <span class="text-xs"><?php echo $rec["Date"];?></span></div>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            </div>
</div>