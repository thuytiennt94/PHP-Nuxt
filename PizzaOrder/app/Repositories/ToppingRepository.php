<?php
namespace App\Repositories;

use App\Models\Topping;

class ToppingRepository implements ToppingRepositoryInterface {
    /**
     * Summary of getAll
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return Topping::all();
    }


    /**
     * Summary of findById
     * @param mixed $id
     * @return Topping|Topping[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id) {
        return Topping::find($id);
    }

    public function create(array $data) {
        return Topping::create($data);
    }
}
