<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProductCategory;
use App\Http\Requests\Admin\CategoryRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\ProductCategoryRepository;
use DB;

class ProductCategoryController extends Controller
{
    protected $categoryRepository;

    function __construct(ProductCategoryRepository $categoryRepository)
    {
        $this->middleware('permission:products-categories-list|products-categories-create|products-categories-edit|products-categories-delete', ['only' => ['index','show']]);
        $this->middleware('permission:products-categories-create', ['only' => ['create','store']]);
        $this->middleware('permission:products-categories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:products-categories-delete', ['only' => ['destroy']]);
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

        return view('admin.categories.index', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getParentCategories();
        return view('admin.categories.create', compact('categories'));
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
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
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
        return view('admin.categories.edit', compact('category', 'categories'));
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
        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
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
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}