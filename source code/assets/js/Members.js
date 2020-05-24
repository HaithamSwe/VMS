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
    MemberID = $("#Selected").text();
    TeamID = $("select").val();
    console.log(TeamID);
    $("#Selected").text("");
    $('#myModal').modal('toggle');
    $.ajax({
        type: "POST",
        url: "assets/php/AssignTeam.php",
        data: { Member_ID: MemberID,Team_ID: TeamID},
        success: function (data) {
            UpdateList();
        }
    }
    );

}




function Delete(MemberID) {
    if (confirm("Are You Sure You Want to Delete Member with ID= " + MemberID)) {
        $.ajax({
            type: "POST",
            url: "assets/php/DeleteMember.php",
            data: { Member_ID: MemberID },
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
        url: "assets/php/ManageMembers_Table.php",
        data: { Role_ID: RoleID, National_ID: NationalID },
        success: function (data) {

            table = $("#dataTable");
            table.html(data);
            console.log("Done");
        }
    }
    );



}

function Selection(MemberID) {
    $("#Selected").text(MemberID);
}
