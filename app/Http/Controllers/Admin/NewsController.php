<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Repositories\NewsCategoryRepository;
use App\Repositories\NewsRepository;
use App\Http\Requests\Admin\NewsRequest;
use Illuminate\Http\Request;
class NewsController extends Controller
{
    function __construct(private NewsRepository $newsRepository, private NewsCategoryRepository $newsCategoryRepository)
    {
        $this->middleware('permission:news-list|news-create|news-edit|news-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:news-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = $this->newsRepository->getAll();
        return view('admin.news.index', compact('data'));
    }

    public function create()
    {
        $news_categories = $this->newsCategoryRepository->getAll();
        return view('admin.news.create', compact('news_categories'));
    }

    public function store(NewsRequest $request)
    {
        $this->newsRepository->create($request->validated());
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit($id)
    {
        $news = $this->newsRepository->findById($id);
        $news_categories = $this->newsCategoryRepository->getAll();
        return view('admin.news.edit', compact('news', 'news_categories'));
    }

    public function show($id)
    {
        $news = $this->newsRepository->findById($id);
        $news_categories = $this->newsCategoryRepository->getAll();
        return view('admin.news.show', compact('news', 'news_categories'));
    }

    public function update(NewsRequest $request, $id)
    {
        $this->newsRepository->update($id, $request->validated());
        return redirect()->route('admin.news.index')->with('success', __('system.updated_success'));
    }
    public function destroy($id)
    {
        $this->newsRepository->delete($id);
        return redirect()->route('admin.news.index')->with('success', __('system.deleted_success'));
    }

}
