function addtoList(EventID) {
    $.ajax({
        type: "POST",
        url: "assets/php/Attendmember.php",
        data: { User_ID: $("#Memberselection" ).val(), Event_ID: EventID },
        success: function (data) {
            UpdateList(EventID);
            UpdateSelection(EventID);
        }
    }
    );

}

function DeletefromList(UserID,EventID) {
    $.ajax({
        type: "POST",
        url: "assets/php/unAttendmember.php",
        data: { User_ID: UserID, Event_ID: EventID },
        success: function (data) {
            UpdateList(EventID);
            UpdateSelection(EventID);
        }
    }
    );
}


function UpdateList(EventID) {
    $.ajax({
        type: "POST",
        url: "assets/php/getAttendance.php",
        data: { Event_ID: EventID },
        success: function (data) {
            tableBody = $("table tbody");
            tableBody.html(data);
        }
    }
    );



}

function UpdateSelection(EventID) {
    $.ajax({
        type: "POST",
        url: "assets/php/MemberList.php",
        data: { Event_ID: EventID },
        success: function (data) {
            selectBody = $("select");
            selectBody.html(data);
        }
    }
    );



}
