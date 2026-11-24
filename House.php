<?php
// Завдання 6. Клас будинку
class House
{
    public function __construct(
        public string $title,
        public int $price,
        public string $address,
        public string $phone,
        public string $realtor,
        public string $image,
        public string $realtorPhoto,
        public int $bedrooms,
        public int $bathrooms
    ) {
    }

    public function formatPrice(int $price): string
    {
        return '$' . number_format($price, 0, '.', ',');
    }
}
