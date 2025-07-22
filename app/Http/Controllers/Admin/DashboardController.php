<?php

namespace App\Http\Controllers\Admin;
use App\Repositories\NewsRepositoryInterface;

class DashboardController
{
    function __construct(protected NewsRepositoryInterface $newsRepository)
    {

    }

    public function index()
    {
        $latestNews = $this->newsRepository->getLatest(3);
        return view('admin.dashboard.index', compact('latestNews'));
    }
}
