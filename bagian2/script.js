$(document).ready(function () {
    $("#search").on("keyup", function () {
        let searchQuery = $(this).val();
        $.ajax({
            url: "bagian2.php",
            method: "POST",
            data: { search: searchQuery },
            success: function (response) {
                $("#data-table").html($(response).find("#data-table").html());
            }
        });
    });
});
