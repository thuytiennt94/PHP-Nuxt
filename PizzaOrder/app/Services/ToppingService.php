<?php
namespace App\Services;
use App\Repositories\ToppingRepositoryInterface;

class ToppingService {
    protected $toppingRepository;

    public function __construct(ToppingRepositoryInterface $toppingRepository) {
        $this->toppingRepository = $toppingRepository;
    }

    public function getAllToppings() {
        return $this->toppingRepository->getAll();
    }

    public function findToppingById($id) {
        return $this->toppingRepository->findById($id);
    }

    public function createTopping(array $data) {
        try {
            return $this->toppingRepository->create($data);
        } catch (\Exception $e) {
            Log::error('Error creating topping: ' . $e->getMessage());
            throw $e;
        }
    }
}
