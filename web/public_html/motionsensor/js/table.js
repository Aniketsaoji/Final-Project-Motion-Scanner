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

            data = JSON.parse(data);
            console.log(data);
            $('#entries').dynatable({
                dataset: {
                    records: data
                }
            });
        }
    });
}