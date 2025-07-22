<?php

namespace App\Repositories;

use App\Models\News;
use App\Enums\ActiveStatusEnum;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface
{
    public function getAll():Collection
    {
        return News::all()->map(function ($news) {
            $news->status_label = ActiveStatusEnum::getList($news->status);
            return $news;
        });
    }

    public function findById(int $id):News
    {
        return News::findOrFail($id);
    }
    public function create(array $data):News
    {
        return News::create($data);
    }
    public function update(int $id, array $data):News
    {
        $news = $this->findById($id);
        $news->update($data);
        return $news;
    }
    public function delete(int $id):int
    {
        return News::destroy($id);
    }

    public function getLatest(int $limit = 3):Collection
    {
        return News::orderByDesc('created_at')
            ->limit($limit)
            ->get()
            ->map(function ($news) {
                $news->status_label = ActiveStatusEnum::getList($news->status);
                return $news;
            });
    }
}
