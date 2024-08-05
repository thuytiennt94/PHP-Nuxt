<?php
namespace App\Services;
use App\Repositories\PizzaRepositoryInterface;

class PizzaService {
    protected $pizzaRepository;

    public function __construct(PizzaRepositoryInterface $pizzaRepository) {
        $this->pizzaRepository = $pizzaRepository;
    }

    public function getAllPizza() {
        return $this->pizzaRepository->getAll();
    }

    public function findPizzaById($id) {
        return $this->pizzaRepository->findById($id);
    }

    public function createPizza($data) {
        return $this->pizzaRepository->create($data);
    }
}
