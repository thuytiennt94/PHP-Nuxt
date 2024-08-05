<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(\App\Services\CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    public function index() {
        return response()->json($this->categoryService->getAllCategories());
    }

    public function show($id) {
        return response()->json($this->categoryService->findCategoryById($id));
    }

    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $category = $this->categoryService->createCategory($validatedData);

            return response()->json($category, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong, please try again later.'], 500);
        }
    }
}
