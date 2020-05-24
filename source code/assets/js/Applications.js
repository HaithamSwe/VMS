function Apply(EventID,NationalID) {
    $.ajax({
        type: "POST",
        url: "assets/php/Apply.php",
        data: { Event_ID: EventID ,National_ID:NationalID},
        success: function (data) {
            console.log(data);
            UpdateTable();
        }
    }
    );

}


function Cancel(EventID,NationalID) {
    $.ajax({
        type: "POST",
        url: "assets/php/Cancel.php",
        data: { Event_ID: EventID ,National_ID:NationalID},
        success: function (data) {
            console.log(data);
            UpdateTable();
        }
    }
    );

}





function UpdateTable() {
    NationalID = $("#NationalID").text();
    RoleID = $("#RoleID").text();
    search=$("#search1").val();
    gender=$("#gender").text();
    Status=$("#Status").text();
    
    $.ajax({
        type: "GET",
        url: "assets/php/Event_Table.php",
        data: { Role_ID: RoleID, National_ID: NationalID,search:search,Gender:gender,Status:Status },
        success: function (data) {
            table = $("#dataTable");
            table.html(data);
        }
    }
    );



}
