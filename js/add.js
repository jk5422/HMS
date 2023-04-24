$(document).ready(function(){
    $('#country').on('change', function() {
        var country_id = this.value;
        $.ajax({
            url: "/HMS/states-by-country.php",
            type: "POST",
            data: {
                country_id: country_id
            },
            cache: false,
            success: function(result) {
                $("#state").html(result);
                $('#city').html(
                '<option value="">--Select City--</option>');
            }
        });
    });
    $('#state').on('change', function() {
        var state_id = this.value;
        $.ajax({
            url: "/HMS/cities-by-state.php",
            type: "POST",
            data: {
                state_id: state_id
            },
            cache: false,
            success: function(result) {
                $("#city").html(result);
                $('#shostel').html(
                    '<option value="">--Select Hostel--</option>');
            }
        });
    });

    $('#city').on('change', function() {
        var ct_id = this.value;
        $.ajax({
            url: "/HMS/hostel-by-city.php",
            type: "POST",
            data: {
                ct_id: ct_id
            },
            cache: false,
            success: function(result) {
                $("#shostel").html(result);
            }
        });
    });
});