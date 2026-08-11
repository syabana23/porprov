<?php

namespace App\Contracts;

interface KnowledgeRepositoryInterface
{
    public function getFaqItems(): array;

    public function getCabors(): array;

    public function getVenues(): array;

    public function getFacilities(): array;

    public function findCabor(string $term): ?array;

    public function findVenue(string $term): ?array;

    public function getFacilitiesForVenue(string $facilitiesKey, ?string $type = null): array;
}
