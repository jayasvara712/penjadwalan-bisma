
$(document).ready(() => {
    // select_jadwal();

    $("#search_kegaitan").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        console.log(value);
        $("#myKegiatan div").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    var pilihan1 = document.getElementById("kelasx");
    if (pilihan1) {
        select_jadwal();
        $("#kelasx").change(select_jadwal);
    }
});

function menu(e) {
    $('#' + e).addClass('active');
}