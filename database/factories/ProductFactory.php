<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        $categories = ['Motor', 'Mobil', 'Pesawat'];
        $category = $this->faker->randomElement($categories);

        // Daftar merek motor
        $motorBrands = [
            'Honda',
            'Yamaha',
            'Suzuki',
            'Kawasaki',
            'Ducati',
            'Harley-Davidson',
            'KTM',
            'BMW Motorrad',
            'Triumph',
            'Aprilia'
        ];

        // Daftar merek mobil
        $carBrands = [
            'Toyota',
            'Honda',
            'Ford',
            'Chevrolet',
            'BMW',
            'Mercedes-Benz',
            'Audi',
            'Volkswagen',
            'Hyundai',
            'Nissan'
        ];

        // Daftar merek pesawat
        $airplaneBrands = [
            'Boeing',
            'Airbus',
            'Cessna',
            'Bombardier',
            'Embraer',
            'Gulfstream',
            'Dassault',
            'Beechcraft',
            'Antonov',
            'Lockheed Martin'
        ];

        $name = $category == 'Motor'
            ? $this->faker->randomElement($motorBrands)
            : ($category == 'Mobil'
                ? $this->faker->randomElement($carBrands)
                : $this->faker->randomElement($airplaneBrands));

        $description = $category == 'Motor'
            ? $this->faker->randomElement([
                'Motor dengan performa tinggi dan efisiensi bahan bakar.',
                'Desain sporty dan nyaman dikendarai.',
                'Dilengkapi dengan fitur keamanan terbaru.'
            ])
            : ($category == 'Mobil'
                ? $this->faker->randomElement([
                    'Mobil dengan teknologi canggih dan kenyamanan maksimal.',
                    'Desain elegan dan performa mesin yang handal.',
                    'Hemat bahan bakar dan ramah lingkungan.'
                ])
                : $this->faker->randomElement([
                    'Pesawat dengan teknologi penerbangan terbaru.',
                    'Desain aerodinamis dan efisiensi bahan bakar tinggi.',
                    'Dilengkapi dengan sistem navigasi canggih.'
                ]));

        return [
            'name' => $name,
            'description' => $description,
            'price' => $this->faker->numberBetween(1000000, 1000000000),
            'image' => $this->faker->imageUrl(640, 480, 'product', true),
            'category_id' => $category == 'Motor' ? 1 : ($category == 'Mobil' ? 2 : 3),
            'expired_at' => now()->addDays(365),
            'modified_by' => $this->faker->randomElement(['user@gmail.com', 'yazid@gmail.com'])
        ];
    }
}
