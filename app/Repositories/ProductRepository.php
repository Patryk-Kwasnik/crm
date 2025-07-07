<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product = null) {
         $this->product = $product ?? new Product();
    }

    public function getAll()
    {
        return Product::query()
            ->leftJoin('categories as c', 'c.id', '=', 'products.category_id')
            ->select('products.*', 'c.name as category_name')
            ->get();
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }
    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = $this->findById($id);
        $product->update($data);

        return $product;
    }
    public function delete($id)
    {
        $product = $this->findById($id);
        $product->delete();
        return $product;
    }
}
