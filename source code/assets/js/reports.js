$("#reportType").change(function () {
  selection = $(this).val();

  if (selection == 1 || selection == 2) {
    $("#submitbutton").prop('disabled', false);
    $("#TeamName").removeClass("d-none");
    $("#EventName").addClass("d-none");
  }
  else if (selection == 3) {
    $("#submitbutton").prop('disabled', false);
    $("#EventName").removeClass("d-none");
    $("#TeamName").addClass("d-none");
  }
  else {
    $("#submitbutton").prop('disabled', true);
    $("#TeamName").addClass("d-none");
    $("#EventName").addClass("d-none");
  }

});



$(document).ready(function () {





});