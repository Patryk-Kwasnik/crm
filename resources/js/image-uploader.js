import $ from 'jquery';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.min.css';

$(document).ready(function () {
    let cropper = null;
    let imageIdToCrop = null;
    let currentImageUrl = null;
    const container = $('.image-uploader');
    if (container.length === 0) return;

    const modelId = container.data('model-id');
    const modelType = container.data('model-type');
    const fetchUrl = container.data('fetch-url');
    const uploadUrl = container.data('upload-url');
    const input = container.find('input[type="file"]');
    const previewArea = container.find('.image-preview');
    const loader = container.find('.loader');
    const cropperImage = $('#cropper-image');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadImages() {
        $.get(fetchUrl, { model_id: modelId, model_type: modelType }, function (response) {
            previewArea.empty();
            response.images.forEach(image => {
                const url = `${image.url.split('?')[0]}?t=${Date.now()}`;
                previewArea.append(renderImage({ ...image, url }));
            });
        });
    }

    input.on('change', function () {
        const file = this.files[0];
        if (!file) return;

        if (!file.type.match(/^image\/(jpeg|png|webp)$/)) {
            alert('Nieprawidłowy format obrazu');
            return;
        }

        const formData = new FormData();
        formData.append('image', file);
        formData.append('model_id', modelId);
        formData.append('model_type', modelType);

        loader.show();
        input.prop('disabled', true);

        $.ajax({
            url: uploadUrl,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                input.val('');
                loadImages();
            },
            error: function (xhr) {
                alert('Błąd przy przesyłaniu pliku: ' + (xhr.responseJSON?.message || 'Nieznany błąd'));
            },
            complete: function () {
                loader.hide();
                input.prop('disabled', false);
            }
        });
    });

    container.on('click', '.delete-btn', function () {
        const id = $(this).data('id');
        if (confirm('Na pewno usunąć zdjęcie?')) {
            $.ajax({
                url: `/images/${id}/delete`,
                method: 'DELETE',
                success: loadImages,
                error: function () {
                    alert('Nie udało się usunąć zdjęcia.');
                }
            });
        }
    });

    container.on('click', '.rotate-btn', function () {
        const id = $(this).data('id');
        $.ajax({
            url: `/images/${id}/rotate`,
            method: 'PATCH',
            success: loadImages,
            error: function () {
                alert('Nie udało się obrócić zdjęcia.');
            }
        });
    });

    container.on('click', '.crop-btn', function () {
        imageIdToCrop = $(this).data('id');
        const rawSrc = $(this).closest('.image-wrapper').find('img').attr('src').split('?')[0];
        const newSrc = `${rawSrc}?t=${Date.now()}`;
        currentImageUrl = newSrc;
        cropperImage.attr('src', newSrc);

    });

    const modalEl = document.getElementById('cropModal');
    modalEl.addEventListener('shown.bs.modal', () => {
        const image = cropperImage[0];

        if (cropper) {
            cropper.destroy();
        }

        if (image.complete) {
            initCropper(image);
        } else {
            image.one('load', () => initCropper(image));
        }
    });
    function initCropper(image) {
        cropper = new Cropper(image, {
            aspectRatio: NaN,
            viewMode: 1,
            responsive: true,
            autoCropArea: 1,
            background: false,
            movable: true,
            zoomable: true,
            scalable: true,
            ready() {
                const c = cropper.getContainerData();
                cropper.setCropBoxData({
                    width: c.width * 0.9,
                    height: c.height * 0.9,
                    left: c.width * 0.05,
                    top: c.height * 0.05,
                });
            }
        });
    }

    $('#cropModal').on('hidden.bs.modal', function () {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    $('#crop-confirm-btn').on('click', function () {
        if (!cropper || !imageIdToCrop) return;

        const cropData = cropper.getData(true);

        $.ajax({
            url: `/images/${imageIdToCrop}/crop`,
            method: 'POST',
            data: {
                x: cropData.x,
                y: cropData.y,
                width: cropData.width,
                height: cropData.height,
            },
            success: function () {
                loadImages();
                const timestamped = currentImageUrl.split('?')[0] + '?t=' + Date.now();
                $('#cropper-image').attr('src', timestamped);
                currentImageUrl = timestamped;
            },
            error: function () {
                alert('Wystąpił błąd podczas przycinania.');
            }
        });
    });

    function renderImage(image) {
        return `
                <div class="image-wrapper border rounded p-2 position-relative me-3 mb-3" data-id="${image.id}">
                    <img src="${image.url}" class="img-thumbnail mb-2" style="max-width: 150px;">
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-outline-secondary crop-btn"  data-bs-toggle="modal" data-bs-target="#cropModal" data-id="${image.id}">Przytnij</button>
                        <button class="btn btn-sm btn-outline-secondary rotate-btn" data-id="${image.id}">Obróć</button>
                        <button class="btn btn-sm btn-outline-danger delete-btn" data-id="${image.id}">Usuń</button>
                    </div>
                </div>
            `;
    }
    loadImages();
});
