<!DOCTYPE html>
<html class="text-warning" style="background-color: #ffffff;">

<head>

    <?php
    
    $Type = $_POST["Type"];
    $Team = $_POST["Team"];
    $Event = $_POST["Event"];
    require('assets/php/connect.php');
    if ($Type == 1 || $Type == 2) :
        
        $sql = "SELECT Teams.Team_ID,Teams.Team_Name,Users.FName,Users.LName FROM Teams,Users where Teams.Team_Leader=Users.National_ID and Teams.Team_ID=" . $Team;
        $TeamINFO = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
            die(mysqli_error($connection));


        $sql = "Select count(Users.National_ID) as NumberMembers from Users where Users.Team_ID=" . $Team;
        $NumberMembers = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
            die(mysqli_error($connection));


        $sql = "Select count(Events.Event_ID) as NumberEvents from Events where Events.Team_ID=" . $Team;
        $NumberEvents = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
            die(mysqli_error($connection));


        $sql = "Select sum(Attendance.Hours) as NumberHours from Attendance,Events where Events.Event_ID=Attendance.Event_ID and Events.Team_ID=" . $Team;
        $NumberHours = mysqli_fetch_assoc(mysqli_query($connection, $sql)) or
            die(mysqli_error($connection));

        if ($Type == 1) :
            $sql = "SELECT * FROM Users where Users.Team_ID=" . $Team;
            $Members = mysqli_query($connection, $sql) or
                die(mysqli_error($connection));
        elseif ($Type == 2) :
            $sql = "SELECT Events.*,count(Applications.Event_ID) as Registerd FROM Events,Applications where Events.Event_ID=Applications.Event_ID and Events.Team_ID=" . $Team . " group by Applications.Event_ID";
            $Events = mysqli_query($connection, $sql) or
                die(mysqli_error($connection));
        endif;
    elseif ($Type == 3) :
        
        $sql = "SELECT Events.*,count(Applications.Event_ID) as Registerd FROM Events,Applications where Events.Event_ID=Applications.Event_ID and Events.Event_ID=" . $Event . " group by Applications.Event_ID";
        $sql2 = "SELECT * FROM Events where  Events.Event_ID=" . $Event;
        
        $EventINFO = mysqli_fetch_assoc(mysqli_query($connection, $sql));
            if(!isset($EventINFO))
        $EventINFO =mysqli_fetch_assoc(mysqli_query($connection, $sql2));

        $sql = "SELECT Attendance.Hours,Users.FName,Users.LName,Users.National_ID from Attendance,Users where Users.National_ID=Attendance.User_ID and Attendance.Event_ID=".$Event;
        $Attendances = mysqli_query($connection, $sql) or
            die(mysqli_error($connection));
    endif;






    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Report - VMS</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min3.css">
</head>


<body style="background-color: rgb(255,255,255);">
    <div class="container border rounded-0 d-flex justify-content-center align-items-center" id="Con" style="margin-bottom: 0px;margin-top: 50px;">

        <div class="row" style="margin-top: 15px;">
            <!-- Start: heading -->
            <div class="col-10 offset-1">



                <?php if ($Type == 1) : ?>
                    <h2 class="text-center" style="background-color: #2eb4ee;">Team Members Report</h2>
                <?php elseif ($Type == 2) : ?>
                    <h2 class="text-center" style="background-color: #2eb4ee;">Team Events Report</h2>
                <?php elseif ($Type == 3) : ?>
                    <h2 class="text-center" style="background-color: #2eb4ee;">Event Report</h2>
                <?php endif; ?>


            </div>
            <!-- End: heading -->







            <!-- Start: Team Info -->
            <?php if ($Type == 1 || $Type == 2) : ?>
                <div class="col-12">
                    <fieldset class="border rounded-0" style="border: 1.5px solid black!important;margin: 22px;padding-left: 10px;padding-right: 10px;padding-bottom: 15px;">
                        <legend style="margin-bottom: 8px;width: 197px;">Team Information:</legend>
                        <div class="table-responsive table-bordered">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>

                                        <th>Team Id</th>
                                        <th>Team Name</th>
                                        <th>Team Leader</th>
                                        <th>Number of Members</th>
                                        <th>Number of Events</th>
                                        <th>Total Hours</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        echo "<td>" . $TeamINFO["Team_ID"] . "</td>";
                                        echo "<td>" . $TeamINFO["Team_Name"] . "</td>";
                                        echo "<td>" . $TeamINFO["FName"] . " " . $TeamINFO["LName"] . "</td>";
                                        echo "<td>" . $NumberMembers["NumberMembers"] . "</td>";
                                        echo "<td>" . $NumberEvents["NumberEvents"] . "</td>";
                                        echo "<td>" . $NumberHours["NumberHours"] . "</td>";

                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            <?php endif; ?>
            <!-- End: Team Ifno -->

            <!-- Start: Event Info -->
            <?php if ($Type == 3) : ?>
                <div class="col-12">
                    <fieldset class="border rounded-0" style="border: 1.5px solid black!important;margin: 22px;padding-left: 10px;padding-right: 10px;padding-bottom: 15px;">
                        <legend style="margin-bottom: 8px;width: 197px;">Event Information:</legend>
                        <div class="table-responsive table-bordered">
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Event ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Seats</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Registerd Members</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php
                                        echo "<td>" . $EventINFO["Event_ID"] . "</td>";
                                        echo "<td>" . $EventINFO["Name"] . "</td>";
                                        if ($EventINFO["Gender"] == "M")
                                            echo "<td>Males</td>";
                                        else if ($EventINFO["Gender"] == "F")
                                            echo "<td>Females</td>";
                                        else
                                            echo "<td>Both</td>";
                                        echo "<td>" . $EventINFO["Capacity"] . "</td>";
                                        echo "<td>" . $EventINFO["Date"] . "</td>";
                                        echo "<td>" .substr($EventINFO["StartTime"], 0, 5) . "-" . substr($EventINFO    ["EndTime"], 0, 5). "</td>";
                                        echo "<td>" . $EventINFO["Location"] . "</td>";
                                        if(isset($EventINFO["Registerd"]))
                                        echo "<td>" . $EventINFO["Registerd"] . "</td>";
                                        else
                                        echo "<td>0</td>";

                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </fieldset>
                </div>
            <?php endif; ?>
            <!-- End: Event Ifno -->










            <!-- Start: Invoice -->
            <div class="col-12">
                <fieldset class="border rounded-0" style="border: 1.5px solid black!important;margin: 22px;padding-left: 10px;padding-right: 10px;padding-bottom: 15px;">
                    <legend style="margin-bottom: 8px;width: 169px;">Team Members:</legend>
                    <div class="table-responsive table-bordered">
                        <table class="table table-striped table-bordered table-sm">
                            <thead>


                                <tr>
                                    <?php if ($Type == 1) : ?>

                                        <th>Gov ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Gender</th>
                                        <th>Birth Date</th>
                                        <th>Status</th>
                                    <?php elseif ($Type == 2) : ?>
                                        <th>Event ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Seats</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Registerd Members</th>
                                    <?php elseif ($Type == 3) : ?>
                                        <th>Gov ID</th>
                                        <th>Name</th>
                                    <?php endif; ?>





                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($Type == 1) : ?>
                                    <?php foreach ($Members as $Member) :
                                        echo "<tr>";
                                        echo "<td>" . $Member["National_ID"] . "</td>";
                                        echo "<td>" . $Member["FName"] . " " . $Member["LName"] . "</td>";
                                        echo "<td>" . $Member["Email"] . "</td>";
                                        if ($Member["Gender"] == "M")
                                            echo "<td>Males</td>";
                                        else
                                            echo "<td>Females</td>";
                                        echo "<td>" . $Member["BirthDate"] . "</td>";
                                        echo "<td>" . $Member["Status"] . "</td>";
                                        echo "</tr>";
                                    endforeach; ?>
                                <?php elseif ($Type == 2) : ?>
                                    <?php foreach ($Events as $Event) :

                                        echo "<tr>";
                                        echo "<td>" . $Event["Event_ID"] . "</td>";
                                        echo "<td>" . $Event["Name"] . "</td>";
                                        if ($Event["Gender"] == "M")
                                            echo "<td>Males</td>";
                                        else if ($Event["Gender"] == "F")
                                            echo "<td>Females</td>";
                                        else
                                            echo "<td>Both</td>";
                                        echo "<td>" . $Event["Capacity"] . "</td>";
                                        echo "<td>" . $Event["Date"] . "</td>";
                                        echo "<td>" . $Event["StartTime"] . "-" . $Event["EndTime"] . "</td>";
                                        echo "<td>" . $Event["Location"] . "</td>";
                                        echo "<td>" . $Event["Registerd"] . "</td>";
                                        echo "</tr>";
                                    endforeach; ?>



                                <?php elseif ($Type == 3) : 
                                    $CountMembers=0;
                                    $CountHours=0;
                                    ?>
                                    
                                    
                                    <?php foreach ($Attendances as $Attendance) :
                                        echo "<tr>";
                                        echo "<td>" . $Attendance["National_ID"] . "</td>";
                                        echo "<td>" . $Attendance["FName"] . " " . $Attendance["LName"] . "</td>";
                                        echo "</tr>";
                                        $CountMembers++;
                                        $CountHours+=$Attendance["Hours"];
                                    endforeach; ?>
                                <tr>
                                    <td style="background-color: #969696;color: rgb(255,255,255);"><strong>Total Present Members</strong></td>
                                    <td style="background-color: #969696;color: rgb(255,255,255);"><strong><?php echo $CountMembers?></strong></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #969696;color: rgb(255,255,255);"><strong>Total&nbsp;Volunteering Hours</strong></td>
                                    <td style="background-color: #969696;color: rgb(255,255,255);"><strong><?php echo $CountHours?></strong></td>
                                </tr>






                                <?php endif; ?>



                            </tbody>
                        </table>
                    </div>
                </fieldset>
            </div>
            <!-- End: Invoice -->
        </div>


    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>