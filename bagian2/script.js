// function searchBarang() {
//             const search = document.getElementById('search').value;

//             // Buat permintaan AJAX
//             const xhr = new XMLHttpRequest();
//             xhr.open('POST', 'bagian2.php', true);
//             xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//             xhr.onload = function () {
//                 if (this.status === 200) {
//                     // Perbarui tabel data dengan respons dari server
//                     document.getElementById('data-table').innerHTML = this.responseText;
//                 }
//             };
//             xhr.send('search=' + encodeURIComponent(search));
//         }

//         // Panggilan awal untuk menampilkan semua data saat halaman dimuat
//         document.addEventListener('DOMContentLoaded', searchBarang);

// function searchBarang() {
//     const search = document.getElementById('search').value;

//     // Membuat permintaan AJAX
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', 'bagian2.php', true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.onload = function () {
//         if (this.status === 200) {
//             // Memperbarui tabel data
//             document.getElementById('data-table').innerHTML = this.responseText;
//         }
//     };
//     xhr.send('search=' + encodeURIComponent(search));
// }

// // Memuat data awal saat halaman dimuat
// document.addEventListener('DOMContentLoaded', searchBarang);

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