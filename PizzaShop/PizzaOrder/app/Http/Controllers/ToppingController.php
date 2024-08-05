<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ToppingService;

class ToppingController extends Controller
{
    protected $toppingService;

    public function __construct(ToppingService $toppingService) {
        $this->toppingService = $toppingService;
    }

    public function index() {
        return response()->json($this->toppingService->getAllToppings());
    }

    public function show($id) {
        return response()->json($this->toppingService->findToppingById($id));
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $topping = $this->toppingService->createTopping($validatedData);

            return response()->json($topping, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong, please try again later.'], 500);
        }
    }
}
