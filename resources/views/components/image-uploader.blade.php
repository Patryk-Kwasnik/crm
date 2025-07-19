<h4 class="mt-5">Zarządzaj zdjęciami</h4>
<div
    class="image-uploader"
    data-image-uploader
    data-model-id="{{ $modelId }}"
    data-model-type="{{ $modelType }}"
    data-upload-url="{{ $uploadUrl }}"
    data-fetch-url="{{ $fetchUrl }}"
>
    <input type="file" id="file_upload" name="image" class="form-control mb-3" accept="image/*">

    <div class="loader text-center mb-2" style="display: none;">
        <div class="spinner-border text-primary" role="status">

        </div>
    </div>
    <div class="image-preview d-flex flex-wrap"></div>
</div>

<div class="modal fade" id="cropModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Przytnij obraz</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
            </div>
            <div class="modal-body text-center">
                <img id="cropper-image" src="" alt="Do przycięcia">
            </div>
            <div class="modal-footer">
                <button type="button" id="crop-confirm-btn" class="btn btn-primary">Zapisz</button>
            </div>
        </div>
    </div>
</div>

@vite(['resources/js/image-uploader.js'])
