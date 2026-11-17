<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Property\Property;
use App\Models\Property\PropertyImage;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $categoryIds = DB::table('categories')
            ->where('category_for', 'property')
            ->pluck('id', 'name');

        $host = DB::table('users')
            ->where('email', 'demo.host@stayfinder.test')
            ->first();

        if (!$host) {
            $hostId = DB::table('users')->insertGetId([
                'name' => 'StayFinder Demo Host',
                'username' => 'stayfinder_demo',
                'email' => 'demo.host@stayfinder.test',
                'password' => Hash::make(Str::random(32)),
                'role' => 'host',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $hostId = $host->id;
        }

        $properties = [
            [
                'title' => 'Luxury Modern Apartment',
                'description' => 'A comfortable modern apartment with beautiful interiors and convenient amenities.',
                'location' => 'Mumbai, India',
                'address' => 'Bandra West, Mumbai',
                'price' => 4500,
                'guests' => 4,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'category' => 'Flat/apartment',
                'rating' => 4.8,
                'image' => 'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Peaceful Mountain Cabin',
                'description' => 'Enjoy a relaxing stay surrounded by scenic mountain views and fresh air.',
                'location' => 'Manali, India',
                'address' => 'Old Manali, Himachal Pradesh',
                'price' => 3200,
                'guests' => 3,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'category' => 'Cabin',
                'rating' => 4.9,
                'image' => 'https://images.unsplash.com/photo-1449158743715-0a90ebb6d2d8?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Elegant Family Villa',
                'description' => 'Spacious villa suitable for families, featuring comfortable bedrooms and a relaxing atmosphere.',
                'location' => 'Goa, India',
                'address' => 'Candolim, Goa',
                'price' => 7500,
                'guests' => 6,
                'bedrooms' => 3,
                'bathrooms' => 3,
                'category' => 'Villa',
                'rating' => 4.7,
                'image' => 'https://images.unsplash.com/photo-1613490493576-7fde63acd811?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Cozy City Guesthouse',
                'description' => 'A welcoming guesthouse with a peaceful atmosphere and easy access to local attractions.',
                'location' => 'Jaipur, India',
                'address' => 'Pink City, Jaipur',
                'price' => 2200,
                'guests' => 2,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'category' => 'Guesthouse',
                'rating' => 4.6,
                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Premium Lake View House',
                'description' => 'A beautiful house offering a relaxing environment and picturesque lake views.',
                'location' => 'Udaipur, India',
                'address' => 'Lake Pichola, Udaipur',
                'price' => 5800,
                'guests' => 5,
                'bedrooms' => 2,
                'bathrooms' => 2,
                'category' => 'House',
                'rating' => 4.9,
                'image' => 'https://images.unsplash.com/photo-1600047509807-ba8f99d2cdde?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'title' => 'Comfortable Boutique Stay',
                'description' => 'A stylish boutique accommodation designed for a comfortable and memorable visit.',
                'location' => 'Delhi, India',
                'address' => 'Hauz Khas, New Delhi',
                'price' => 2800,
                'guests' => 2,
                'bedrooms' => 1,
                'bathrooms' => 1,
                'category' => 'Bed & breakfast',
                'rating' => 4.5,
                'image' => 'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1200&q=80',
            ],
        ];

        foreach ($properties as $item) {
            $categoryId = $categoryIds[$item['category']] ?? null;

            if (!$categoryId) {
                continue;
            }

            $property = Property::updateOrCreate(
                [
                    'host_id' => $hostId,
                    'title' => $item['title'],
                ],
                [
                    'description' => $item['description'],
                    'location' => $item['location'],
                    'address' => $item['address'],
                    'price' => $item['price'],
                    'guests' => $item['guests'],
                    'bedrooms' => $item['bedrooms'],
                    'bathrooms' => $item['bathrooms'],
                    'category_id' => $categoryId,
                    'status' => 'active',
                    'moderation_status' => 'approved',
                    'rating' => $item['rating'],
                ]
            );

            PropertyImage::updateOrCreate(
                [
                    'property_id' => $property->id,
                    'is_cover' => true,
                ],
                [
                    'image_path' => $item['image'],
                    'is_cover' => true,
                ]
            );
        }

        $this->command->info('Demo properties seeded successfully.');
    }
}
