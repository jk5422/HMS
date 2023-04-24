$(document).ready(function(){
    $('#shid').on('blur', function() {
        var h_id = this.value;
        $.ajax({
            url: "/HMS/admin/room-by-hostel.php",
            type: "POST",
            data: {
                sh_id: h_id
            },
            cache: false,
            success: function(result) {
                $("#srname").html(result);
                // $('#city').html(
                // '<option value="">--Select City--</option>');
            }
        });
    });

    $('#shid').on('change', function() {
        var h_id = this.value;
        $.ajax({
            url: "/HMS/admin/hostel-by-student.php",
            type: "POST",
            data: {
                sh_id: h_id
            },
            cache: false,
            success: function(result) {
                $("#sid").html(result);
                // $('#city').html(
                // '<option value="">--Select City--</option>');
            }
        });
    });
    
    $('#sbad').on('change', function() {
        var badid = this.value;
        var rid=document.getElementById('srname').value;
        var sid=document.getElementById('sid').value;
        
        $.ajax({
            url: "/HMS/admin/checkbad.php",
            type: "POST",
            data: {
                bad_id: badid,
                room_id: rid,
                s_id: sid
            },
            cache: false,
            success: function(result) {
                $("#checkavl").html(result);
                // $('#city').html(
                // '<option value="">--Select City--</option>');
            }
        });
    });
});