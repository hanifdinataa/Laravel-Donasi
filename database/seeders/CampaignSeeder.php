<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        $campaigns = [
            [
                'category_id' => 1,
                'title' => 'Testing - Banjir',
                'short_description' => 'Bantu saudara kita yang terdampak banjir untuk mendapatkan makanan dan pakaian.',
                'description' => 'Bencana banjir melanda beberapa wilayah dan banyak warga kehilangan tempat tinggal...',
                'image' => 'banjir.jpg',
                'target_amount' => 50000000,
                'collected_amount' => 0,
                'status' => 'active',
            ],
            [
                'category_id' => 3,
                'title' => 'Testing - pengobatan',
                'short_description' => 'Dukung proses pengobatan anak-anak yang membutuhkan biaya tinggi.',
                'description' => 'Pengobatan kanker anak membutuhkan biaya besar untuk kemoterapi dan perawatan intensif...',
                'image' => 'kesehatan.jpg',
                'target_amount' => 75000000,
                'collected_amount' => 0,
                'status' => 'active',
            ],
            [
                'category_id' => 4,
                'title' => 'Testing - Anak Yatim',
                'short_description' => 'Mari bantu pendidikan anak-anak yatim yang kurang mampu.',
                'description' => 'Biaya sekolah semakin meningkat, dan banyak anak yatim kesulitan...',
                'image' => 'pendidikan.jpg',
                'target_amount' => 30000000,
                'collected_amount' => 0,
                'status' => 'active',
            ],
        ];

        foreach ($campaigns as $campaign) {
            Campaign::create($campaign);
        }
    }
}
