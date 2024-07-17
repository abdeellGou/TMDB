<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movies')->insert([
            [
                'title' => 'Inception',
                'mid' => 1236,
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a CEO.',
                'image_url' => 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/72/34/14/19476654.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Dark Knight',
                'mid' => 3695,
                'description' => 'When the menace known as the Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham.',
                'image_url' => 'https://fr.web.img6.acsta.net/c_310_420/medias/nmedia/18/63/97/89/18949761.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interstellar',
                'mid' => 9856,
                'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'image_url' => 'https://fr.web.img5.acsta.net/c_310_420/pictures/14/09/24/12/08/158828.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Matrix',
                'mid' => 9856,
                'description' => 'A team osormhole in space in an attempsc t to ensure humanity\'s survival.',
                'image_url' => 'https://fr.web.img4.acsta.net/c_310_420/medias/04/34/49/043449_af.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
