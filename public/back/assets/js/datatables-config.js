$(document).ready(function() {
    // Setup CSRF token untuk AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Inisialisasi DataTable dengan konfigurasi pagination
    $('#zero_config').DataTable({
        "processing": true,
        "pageLength": 10,
        "order": [[1, 'asc']],
        "columnDefs": [
            { 
                "targets": 4,
                "orderable": false,
                "searchable": false
            }
        ]
    });

    // Handle form delete submission dengan error handling yang lebih baik
    $(document).on('submit', '.delete-form', function(e) {
        e.preventDefault();
        var form = $(this);
        
        if (confirm('Apakah Anda yakin ingin menghapus barang ini?')) {
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        // Refresh halaman setelah berhasil menghapus
                        window.location.reload();
                    } else {
                        alert(response.message || 'Terjadi kesalahan saat menghapus barang');
                    }
                },
                error: function(xhr) {
                    console.error('Error:', xhr);
                    alert('Terjadi kesalahan saat menghapus barang');
                }
            });
        }
    });
}); 