@props(['message'])
@if (session('success'))
    <script>
        // Załaduj SweetAlert2 i wyświetl alert z komunikatem sukcesu
        Swal.fire({
            icon: 'success',
            title: 'Sukces!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
            theme:'dark',
        });
    </script>
@endif
