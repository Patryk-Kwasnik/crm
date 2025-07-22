<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Http\Request;
use App\Repositories\DocumentCategoryRepositoryInterface;

class DocumentCategoryController extends Controller
{
    protected $categoryRepository;

    function __construct(DocumentCategoryRepositoryInterface $categoryRepository)
    {
        $this->middleware('permission:documents-list|documents-create|documents-edit|documents-delete', ['only' => ['index','show']]);
        $this->middleware('permission:documents-create', ['only' => ['create','store']]);
        $this->middleware('permission:documents-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:documents-delete', ['only' => ['destroy']]);
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->categoryRepository->getAll();

        return view('admin.documents_categories.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getParentCategories();
        return view('admin.documents_categories.create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create($request->validated());
        return redirect()->route('admin.documents_categories.index')->with('success',  __('system.created_success'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findById($id);
        $categories = $this->categoryRepository->getParentCategories($id);
        return view('admin.documents_categories.edit', compact('category', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $this->categoryRepository->update($id, $request->validated());
        return redirect()->route('admin.documents_categories.index')->with('success', __('system.updated_success'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->route('admin.documents_categories.index')->with('success', __('system.deleted_success'));
    }
}
