<?php
namespace App\Repositories;

use App\Models\Pizza;

class PizzaRepository implements PizzaRepositoryInterface {
    /**
     * Summary of getAll
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {
        return Pizza::all();
    }


    /**
     * Summary of findById
     * @param mixed $id
     * @return Pizza|Pizza[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id) {
        return Pizza::find($id);
    }

    /**
     * Summary of create
     * @param array $data
     * @return void
     */
    public function create(array $data) {
        return Pizza::created($data);
    }
}
