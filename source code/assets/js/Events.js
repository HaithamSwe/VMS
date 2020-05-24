function Block(MemberID) {
    $.ajax({
        type: "POST",
        url: "assets/php/blockmember.php",
        data: { Member_ID: MemberID },
        success: function (data) {
            UpdateList();
        }
    }
    );

}


function Activate(MemberID) {

    $.ajax({
        type: "POST",
        url: "assets/php/ActivateMember.php",
        data: { Member_ID: MemberID },
        success: function (data) {
            UpdateList();
        }
    }
    );

}


function AssignTeam() {
    EventID = $("#Selected").text();
    TeamID = $("select").val();
    console.log(TeamID);
    $("#Selected").text("");
    $('#myModal').modal('toggle');
    $.ajax({
        type: "POST",
        url: "assets/php/AssignTeamEvent.php",
        data: { Event_ID: EventID,Team_ID: TeamID},
        success: function (data) {
            UpdateList();
        }
    }
    );

}




function Delete(EventID) {
    if (confirm("Are You Sure You Want to Delete Member with ID= " + EventID)) {
        $.ajax({
            type: "POST",
            url: "assets/php/DeleteEvent.php",
            data: { Event_ID: EventID },
            success: function (data) {
                UpdateList();
            }
        }
        );
    }

}



function UpdateList() {
    NationalID = $("#NationalID").text();
    RoleID = $("#Role_ID").text();
    $.ajax({
        type: "POST",
        url: "assets/php/ManageEvent_Table.php",
        data: { Role_ID: RoleID, National_ID: NationalID },
        success: function (data) {

            table = $("#dataTable");
            table.html(data);
            console.log("Done");
        }
    }
    );



}

function Selection(EventID) {
    $("#Selected").text(EventID);
}
