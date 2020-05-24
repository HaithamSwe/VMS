<?php 
$sql="SELECT Teams.Team_Name,count(Events.Team_ID) as cevents FROM Teams,Events where  Events.Team_ID=Teams.Team_ID group by (Team_Name) order by(cevents) DESC limit 0,3";
$result = mysqli_query($connection, $sql) or
die(mysqli_error($connection)); 
?>

<div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-warning font-weight-bold m-0">Top Teams</h6>
                                </div>
                                <ul class="list-group list-group-flush">
                                <?php foreach($result as $rec):?>
                                    <li class="list-group-item">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <h6 class="mb-0">
                                                <strong><?php echo $rec["Team_Name"];?></strong><br></h6>
                                                <span class="text-xs">Number of Events: <?php echo $rec["cevents"];?></span>
                                                </div>
                                        </div>
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            </div>
</div>