@props(['errors'])
@if (count($errors) > 0)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Whoops!',
            html: `
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            theme:'dark',
            confirmButtonText: 'OK'
        });
    </script>
@endif
