<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ToppingService;

class ToppingController extends Controller
{
    protected $toppingService;

    public function __construct(ToppingService $toppingService)
    {
        $this->toppingService = $toppingService;
    }

    public function index()
    {
        return response()->json($this->toppingService->getAllToppings());
    }

    public function show($id)
    {
        return response()->json($this->toppingService->findToppingById($id));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'crust_id' => 'required|exists:crusts,id',
                'price' => 'required|numeric',
                'topping_ids' => 'nullable|array|exists:toppings,id',
            ]);

            $pizza = $this->pizzaService->createPizza($data);

            if (isset($data['topping_ids'])) {
                $pizza->toppings()->attach($data['topping_ids']);
            }

            return response()->json($pizza, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong, please try again later.'], 500);
        }
    }

}
