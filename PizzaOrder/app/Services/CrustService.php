<?php
namespace App\Services;

use App\Repositories\CrustRepositoryInterface;

class CrustService {
    protected $crustRepository;

    public function __construct(CrustRepositoryInterface $crustRepository) {
        $this->crustRepository = $crustRepository;
    }

    public function getAllCrust() {
        return $this->crustRepository->getAll();
    }

    public function findCrustById($id) {
        return $this->crustRepository->findById($id);
    }

    public function createCrust(array $data) {
        try {
            return $this->crustRepository->create($data);
        } catch (\Exception $e) {
            \Log::error('Error creating crust: ' . $e->getMessage());
            throw $e;
        }
    }
}

