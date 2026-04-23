<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
            'about_title' => 'Full Stack Developer',
            'about_description' => 'Développeur Junior Full stack en formation à YouCode, avec une expérience pratique issue de stages en développement web. Compétences techniques solides, bon niveau d’anglais et niveau intermédiaire en français.',
            'fb_url' => 'https://www.facebook.com/',
            'github_url' => 'https://github.com/KacimiLahcen',
            'linkedin_url' => 'www.linkedin.com/in/kacimi-lahcen',
            'freelance_url' => '#li',
            'cv_url' => '#cv',
            'video_url' => '#video'
        ]);
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Profile User',
            'email' => 'kacimi.lahcen88@gmail.com',
            'password' => Hash::make('kacimixlahcen88.'),
        ]);
    }
}
