<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $image = Image::factory()->create();
        $image
            ->addMediaFromUrl("https://res.cloudinary.com/highereducation/images/f_auto,q_auto/g_face,c_fill,fl_lossy,q_auto:best,w_448,h_382/v1662131303/ComputerScience.org/GettyImages-1169539468_727fb479/GettyImages-1169539468_727fb479.jpg?_i=AA")
            ->toMediaCollection();

        $image->comments()->create([
            "user_id"=> 1,
            "body" => fake()->sentence(),
        ]);
    }
}
