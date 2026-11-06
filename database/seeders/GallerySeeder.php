<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Indoor A',
                'slug' => 'indoor-a',
                'media_type' => 'image',
                'file_path' => 'images/indoor A.jpeg',
                'caption' => 'Dokumentasi gelanggang dan lapangan GOR Pajajaran Indoor A',
                'category' => 'Venue',
                'sort_order' => 1,
                'is_published' => true,
                'published_at' => '2026-11-10 08:00:00',
            ],
            [
                'title' => 'Lapangan Luar',
                'slug' => 'lapangan-luar',
                'media_type' => 'image',
                'file_path' => 'images/venue1.jpeg',
                'caption' => 'Dokumentasi area lapangan luar Stadion Pajajaran',
                'category' => 'Venue',
                'sort_order' => 2,
                'is_published' => true,
                'published_at' => '2026-11-10 09:00:00',
            ],
            [
                'title' => 'Hotel Green Forest',
                'slug' => 'hotel-green-forest',
                'media_type' => 'image',
                'file_path' => 'images/hotel green forest.jpeg',
                'caption' => 'Dokumentasi venue dan akomodasi Green Forest Hotel',
                'category' => 'Venue',
                'sort_order' => 3,
                'is_published' => true,
                'published_at' => '2026-11-03 10:00:00',
            ],
            [
                'title' => 'Indoor B',
                'slug' => 'indoor-b',
                'media_type' => 'image',
                'file_path' => 'images/indoor B.jpeg',
                'caption' => 'Dokumentasi gelanggang dan lapangan GOR Pajajaran Indoor B',
                'category' => 'Venue',
                'sort_order' => 4,
                'is_published' => true,
                'published_at' => '2026-11-10 11:00:00',
            ],
            [
                'title' => 'Lapangan Luar 2',
                'slug' => 'lapangan-luar-2',
                'media_type' => 'image',
                'file_path' => 'images/venue2.jpeg',
                'caption' => 'Dokumentasi area terbuka lapangan luar zona 2',
                'category' => 'Venue',
                'sort_order' => 5,
                'is_published' => true,
                'published_at' => '2026-11-10 13:00:00',
            ],
            [
                'title' => 'Lapangan Luar 3',
                'slug' => 'lapangan-luar-3',
                'media_type' => 'image',
                'file_path' => 'images/venue4.jpeg',
                'caption' => 'Dokumentasi area terbuka lapangan luar zona 3',
                'category' => 'Venue',
                'sort_order' => 6,
                'is_published' => true,
                'published_at' => '2026-11-10 14:00:00',
            ],
        ];

        foreach ($items as $item) {
            Gallery::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}

