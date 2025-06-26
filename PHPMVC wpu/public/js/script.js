$(function() {

    // event untuk pencarian
    // $('#tombolCari').on('click', function() {
    //     // Mengubah isi HTML dari elemen dengan ID formModalLabel

    //     $(this).css({
    //         'background-color': 'red',
    //         'color': 'white'
    //     });
    //     const availableName = [
    //         "ryan"
    //     ];
    //     // $.ajax({
    //     //     url: 'http://localhost/phpmvc/public/mahasiswa/getCariMahasiswa',
    //     //     method: 'get',
    //     //     // dataType: 'json',
    //     //     success: function(data) {
    //     //         // Mengisi nilai input dengan data JSON yang diterima
    //     //         availableName = data;
    //     //     }
    //     // });

    //     $("#keyword").autocomplete({
    //         source: availableName
    //     });
    // });

    // Sembunyikan tombol kembali saat halaman dimuat
    $("#tombolKembali").hide();
    // $("#tombolKembali").css('display', 'none');
    
    // Tampilkan tombol kembali saat tombol cari diklik
    $('#tombolCari').on('click', function(){
        $('#tombolKembali').show();
    });

    // Saat tombol kembali diklik, sembunyikan tombol kembali
    $("#tombolKembali").on("click", function () {
        $("#tombolKembali").hide();
    });

    // Event untuk tombolTambahData
    $('.tombolTambahData').on('click', function() {
        // Mengubah isi HTML dari elemen dengan ID formModalLabel
        $('#formModalLabel').html('Tambah Data Mahasiswa');

        // Mengosongkan nilai input
        $('#id').val('');
        $('#nama').val('');
        $('#nim').val('');
        $('#prodi').val('');

        // Mengubah teks tombol submit di modal footer
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });

    // Event untuk modalTampilUbah
    $('.modalTampilUbah').on('click', function() {
        // Mengubah isi HTML dari elemen dengan ID formModalLabel
        $('#formModalLabel').html('Ubah Data Mahasiswa');

        // Mengubah teks tombol submit di modal footer
        $('.modal-footer button[type=submit]').html('Ubah Data');

        // Mengubah atribut action dari form di modal body
        $('.modal-body form').attr('action', 'http://localhost/PHPMVC/public/mahasiswa/ubah');

        // Mengambil data-id dari elemen yang diklik
        const id = $(this).data('id');
        
        // AJAX request untuk mengambil data berdasarkan ID
        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getDataUbah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                // Mengisi nilai input dengan data JSON yang diterima
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#prodi').val(data.prodi);
            }
        });
    });
});
