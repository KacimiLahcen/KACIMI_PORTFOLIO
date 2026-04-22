<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class SamplePortfolioSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Dashboard',
            'Ecommerce',
            'Booking',
            'Mobile',
            'API',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $projects = [
            ['Dashboard', 'SaaS Analytics Dashboard', 'images/portfolios/sample-dashboard.svg', 'https://github.com/KacimiLahcen'],
            ['Ecommerce', 'Local Market Storefront', 'images/portfolios/sample-market.svg', 'https://github.com/KacimiLahcen'],
            ['Booking', 'Moto Booking Platform', 'images/portfolios/sample-booking.svg', 'https://github.com/KacimiLahcen'],
            ['Mobile', 'React Native Mobile UI', 'images/portfolios/sample-mobile.svg', 'https://github.com/KacimiLahcen'],
            ['API', 'Laravel REST API Kit', 'images/portfolios/sample-api.svg', 'https://github.com/KacimiLahcen'],
        ];

        foreach ($projects as [$category, $title, $image, $url]) {
            $catId = Category::where('name', $category)->value('id');

            Portfolio::updateOrCreate(
                ['title' => $title],
                [
                    'cat_id' => $catId,
                    'image' => $image,
                    'project_url' => $url,
                ]
            );
        }
    }
}
