<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * 商品一覧取得
     */
    public function list(): Collection
    {
        return Product::orderBy('id')->get();
    }

    /**
     * 商品詳細取得
     */
    public function find(string $id): Product
    {
        return Product::findOrFail($id);
    }

    /**
     * 商品新規登録
     */
    public function create(array $data): Product
    {
        return Product::create($data);
    }

    /**
     * 商品更新
     */
    public function update(string $id, array $data): Product
    {
        // 更新対象の存在確認
        $product = $this->find($id);

        // 更新処理
        $product->update($data);

        return $product;
    }

    /**
     * 商品削除
     */
    public function delete(string $id): void
    {
        // 削除対象の存在確認
        $product = $this->find($id);

        // 削除処理
        $product->delete();
    }
}