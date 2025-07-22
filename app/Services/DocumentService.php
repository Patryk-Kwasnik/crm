<?php

namespace App\Services;

use App\Repositories\DocumentRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\DocumentUploadRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Http\File;
class DocumentService
{
    public function __construct(
        private DocumentRepositoryInterface $repository
    ) {}
    public function all(): Collection
    {
        return $this->repository->getAll();
    }

    public function storeMany(DocumentUploadRequest $request): void
    {

        foreach ($request->file('files') as $file) {
            $this->repository->store($file, $request->input('category_id'));
        }
    }
    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
    public function download(int $id): StreamedResponse
    {
        $document = $this->repository->find($id);
        if (!Storage::disk('public')->exists($document->file_path)) {
            abort(Response::HTTP_NOT_FOUND, 'Plik nie istnieje.');
        }

        return Storage::disk('public')->download(
            $document->file_path,
            $document->name
        );
    }
}
