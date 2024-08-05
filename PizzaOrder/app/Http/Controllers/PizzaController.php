<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this line
use Illuminate\Validation\ValidationException;

class PizzaController extends Controller
{
    protected $pizzaService;

    public function __construct(\App\Services\PizzaService $pizzaService)
    {
        $this->pizzaService = $pizzaService;
    }

    public function index()
    {
        return response()->json($this->pizzaService->getAllPizza());
    }

    public function show($id)
    {
        return response()->json($this->pizzaService->findPizzaById($id));
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'crust_id' => 'required|exists:crusts,id',
                'price' => 'required|numeric',
                'topping_id' => 'nullable|exists:toppings,id',
            ]);

            Log::info('Validated data:', $data);

            $pizza = $this->pizzaService->createPizza($data);

            Log::info('Pizza created:', $pizza->toArray());

            return response()->json($pizza, 201);
        } catch (ValidationException $e) {
            Log::error('Validation errors:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Pizza creation failed: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong, please try again later.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'crust_id' => 'required|exists:crusts,id',
                'price' => 'required|numeric',
                'topping_id' => 'nullable|exists:toppings,id',
            ]);

            $pizza = $this->pizzaService->editPizza($id, $data);
            return response()->json($pizza, 201);
        } catch (ValidationException $e) {
            Log::error('Validation errors:', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            Log::error('Pizza update failed: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong, please try again later.'], 500);
        }
    }
}
