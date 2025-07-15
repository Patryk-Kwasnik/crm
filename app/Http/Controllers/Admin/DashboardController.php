<?php

namespace App\Http\Controllers\Admin;
use App\Repositories\NewsRepository;

class DashboardController
{
    function __construct(protected NewsRepository $newsRepository)
    {

    }

    public function index()
    {
        $latestNews = $this->newsRepository->getLatest(3);
        return view('admin.dashboard.index', compact('latestNews'));
    }
}
