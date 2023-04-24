$(document).ready(function(){
    $('#shostel').on('change', function() {
        var h_id = this.value;
        var stid=document.getElementById('std').value;
        // alert(stid+" "+h_id); 
        $.ajax({
            url: "/HMS/feesdetail.php",
            type: "POST",
            data: {
                hid: h_id,
                stdid:stid
            },
            cache: false,
            success: function(result) {
                $("#fees").html(result);
               
            }
        });
    });
});