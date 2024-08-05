<?php
namespace App\Repositories;

use App\Models\Pizza;

class PizzaRepository implements PizzaRepositoryInterface
{
    /**
     * Summary of getAll
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        // return Pizza::all();
        return Pizza::with('category', 'crust', 'toppings')->get();
    }

    /**
     * Summary of findById
     * @param mixed $id
     * @return Pizza|Pizza[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function findById($id)
    {
        return Pizza::find($id);
    }

    /**
     * Summary of create
     * @param array $data
     * @return Pizza|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return Pizza::create($data);
    }

    public function edit($id, array $data)
    {
        $pizza = Pizza::find($id);

        if ($pizza) {
            $pizza->update($data);
            return $pizza;
        }

        return null;
    }
}
