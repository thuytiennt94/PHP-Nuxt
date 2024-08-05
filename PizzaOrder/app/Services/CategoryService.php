<?php

namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;

class CategoryService {
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories() {
        return $this->categoryRepository->getAll();
    }

    public function findCategoryById($id) {
        return $this->categoryRepository->findById($id);
    }

    public function createCategory(array $data) {
        try {
            return $this->categoryRepository->create($data);
        } catch (\Exception $e) {
            Log::error('Error creating category: ' . $e->getMessage());
            throw $e;
        }
    }
}
