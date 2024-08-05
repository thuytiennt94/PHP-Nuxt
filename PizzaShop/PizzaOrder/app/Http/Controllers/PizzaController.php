<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PizzaService;

class PizzaController extends Controller
{
    protected $pizzaService;

    public function __construct(\App\Services\PizzaService $pizzaService) {
        $this->pizzaService = $pizzaService;
    }

    public function index() {
        return response()->json($this->pizzaService->getAllPizza());
    }

    public function show($id) {
        return response()->json($this->pizzaService->findPizzaById($id));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'crust_id' => 'required|exists:crust,id',
            'price' => 'required|numeric',
        ]);

        return response()->json($this->pizzaService->createPizza($data), 201);
    }
}
