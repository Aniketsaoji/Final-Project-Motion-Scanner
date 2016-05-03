/**
 * Created by Tuchman on 5/2/16.
 */
$(document).ready(function() {
    loadTable();
});


function loadTable(){
    $.ajax({
        url: '../include/table.php',
        success: function (data) {
            console.log(data);
            data = JSON.parse(data);
            $('#myTable').dynatable({
                dataset: {
                    records: data
                }
            });
        }
    });
}