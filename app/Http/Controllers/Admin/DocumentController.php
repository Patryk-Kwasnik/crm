<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentRepositoryInterface;
use App\Repositories\DocumentCategoryRepositoryInterface;
use App\Services\DocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\DocumentUploadRequest;
class DocumentController extends Controller
{
    public function __construct(
        private readonly DocumentService $documentService,
        private DocumentRepositoryInterface $documentRepository,
        private DocumentCategoryRepositoryInterface $documentCategoryRepository
    ) {
        $this->middleware('permission:documents-list|documents-create|documents-edit|documents-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:documents-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:documents-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:documents-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data = $this->documentRepository->all();
        return view('admin.documents.index', compact('data'));
    }
    public function create()
    {
        $categories = $this->documentCategoryRepository->getAll();
        return view('admin.documents.create', compact('categories'));
    }

    public function store(DocumentUploadRequest $request): JsonResponse
    {
        $this->documentService->storeMany($request);
        return response()->json(['message' => 'Upload zakończony.']);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->documentService->delete($id);
        return response()->json(['message' => 'Dokument usunięty.']);
    }
    public function download(int $id)
    {
        return $this->documentService->download($id);
    }
}

