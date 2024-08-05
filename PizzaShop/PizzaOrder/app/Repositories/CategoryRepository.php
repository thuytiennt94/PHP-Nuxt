<?php
namespace App\Repositories;

use App\Models\Category;
// use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface {
    /**
     * Summary of getAll
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return Category::all();
    }


    /**
     * Summary of findById
     * @param mixed $id
     * @return Category|Category[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id) {
        return Category::find($id);
    }

    public function create(array $data) {
        return Category::create($data);
    }
}
