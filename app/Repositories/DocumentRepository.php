<?php

namespace App\Repositories;

use App\Enums\ActiveStatusEnum;
use App\Models\Document;
use App\Repositories\DocumentRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class DocumentRepository implements DocumentRepositoryInterface
{
    public function all(): Collection
    {
        return Document::with('category')->get()->map(function ($document) {
            $document->category_label = $document->category?->name ?? 'Brak kategorii';
            return $document;
        });
    }

    public function find(int $id): ?Document
    {
        return Document::findOrFail($id);
    }

    public function delete(int $id): void
    {
        $document = Document::findOrFail($id);
        Storage::disk('public')->delete($document->path);
        $document->delete();
    }

    public function store(UploadedFile $file, ?int $categoryId = null): void
    {
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('documents', $filename, 'public');

        Document::create([
            'name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'category_id' => $categoryId,
            'uploaded_by' => auth()->id(),
        ]);
    }
}
