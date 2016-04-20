/**
 * Created by Nicholai on 3/1/2016.
 */

$(document).ready(function(){
    updateValues();
});

function updateValues (){
    $.ajax({
        url: 'main.php',
        success: function (data) {
            $('#movement').dynatable({
                features: {
                    paginate: true,
                    recordCount: true
                },
                dataset: {
                    records: JSON.parse(data)
                },
                params: {
                    records: '_root'
                }
            });
        }
    });

}