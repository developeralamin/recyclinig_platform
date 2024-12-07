<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Plastic Recycling', 'description' => 'Recycling and reusing plastic materials.'],
            ['name' => 'Paper Recycling', 'description' => 'Recycling paper to reduce waste.'],
            ['name' => 'Metal Recycling', 'description' => 'Recycling aluminum, steel, and other metals.'],
            ['name' => 'Glass Recycling', 'description' => 'Processing glass materials for reuse.'],
            ['name' => 'Electronics Recycling', 'description' => 'Recycling electronic devices and components.'],
            ['name' => 'Textile Recycling', 'description' => 'Recycling clothes and fabrics.'],
            ['name' => 'Organic Waste Recycling', 'description' => 'Composting and reusing organic waste.'],
            ['name' => 'Battery Recycling', 'description' => 'Safe disposal and recycling of batteries.'],
            ['name' => 'Wood Recycling', 'description' => 'Reusing and recycling wood materials.'],
            ['name' => 'Rubber Recycling', 'description' => 'Recycling tires and other rubber products.'],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'image' => null, // Add image paths if needed
            ]);
        }
    }
}
