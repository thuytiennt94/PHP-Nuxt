<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CrustController extends Controller
{
    protected $crustService;

    public function __construct(\App\Services\CrustService $crustService) {
        $this->crustService = $crustService;
    }

    public function index() {
        return response()->json($this->crustService->getAllCrust());
    }

    public function show($id) {
        return response()->json($this->crustService->findCrustById($id));
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $crust = $this->crustService->createCrust($validatedData);
            
            return response()->json($crust, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong, please try again later.'], 500);
        }
    }
}
