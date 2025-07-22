$(function () {
    $('#document-upload-form').on('submit', function (e) {
        e.preventDefault();

        const $form = $(this);
        const formData = new FormData(this);
        const $progressWrapper = $('#progress-wrapper');
        const $progressBar = $('#upload-progress');
        const $submitButton = $form.find('button[type="submit"]');

        $progressWrapper.removeClass('d-none');
        $progressBar.css('width', '0%').text('0%').removeClass('bg-success bg-danger');
        $submitButton.prop('disabled', true);

        $.ajax({
            url: $form.attr('action'),
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function () {
                const xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function (e) {
                    if (e.lengthComputable) {
                        const percent = Math.round((e.loaded / e.total) * 100);
                        $progressBar.css('width', percent + '%').text(percent + '%');
                    }
                });
                return xhr;
            },
            success: function () {
                $progressBar.addClass('bg-success').text('Zakończono');
                $form[0].reset();
                setTimeout(() => {
                    window.location.href = $form.data('redirect') || '/admin/documents';
                }, 1000);
            },
            error: function (xhr) {
                alert('Błąd podczas przesyłania: ' + (xhr.responseText || 'Nieznany'));
                $progressBar.addClass('bg-danger').text('Błąd');
            },
            complete: function () {
                $submitButton.prop('disabled', false);
            }
        });
    });
});
