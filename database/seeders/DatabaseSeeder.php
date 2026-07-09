<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Inquiry;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Rumah Selangorku Setia Alam @Shah Alam',
                'type' => 'new_project',
                'price' => 289000,
                'location' => 'Setia Alam, Shah Alam',
                'developer' => 'LPHS',
                'description' => 'Service Apartment dengan spesifikasi premium. Percuma perabot 80%. Lokasi strategik berhampiran kemudahan awam.',
                'features' => ['3 Bilik Tidur', '2 Bilik Air', 'Balkoni', 'Perabot Percuma 80%', '2 Parkir Berbumbung'],
                'size_sqft' => '1,022',
                'bedrooms' => 4,
                'bathrooms' => 3,
                'tenure' => 'Freehold',
                'is_featured' => true,
                'is_active' => true,
                'registration_link' => 'https://forms.gle/example1',
                'telegram_channel' => 'https://t.me/rskusetiaalam',
            ],
            [
                'title' => 'Residensi Suasana Eco Majestic @Semenyih',
                'type' => 'new_project',
                'price' => 265000,
                'location' => 'Eco Majestic, Semenyih',
                'developer' => 'Eco World',
                'description' => 'Apartment mampu milik di kawasan premium Eco Majestic. Lengkap dengan 80% perabot percuma. Berdekatan dengan sekolah dan pusat membeli-belah.',
                'features' => ['3 Bilik Tidur', '3 Bilik Air', '2 Master Bedroom', 'Free 2 Parking', 'Perabot 80%'],
                'size_sqft' => '1,045',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'tenure' => 'Leasehold',
                'is_featured' => true,
                'is_active' => true,
                'registration_link' => 'https://forms.gle/example2',
                'telegram_channel' => 'https://t.me/ecomajesticcondo',
            ],
            [
                'title' => 'Rumah Selangorku Idaman Perdana @Puncak Alam',
                'type' => 'new_project',
                'price' => 288000,
                'location' => 'Puncak Alam',
                'developer' => 'Idaman',
                'description' => 'Rumah mampu milik di Puncak Alam. Siap 2026. Sesuai untuk pembeli rumah pertama. 80% perabot percuma.',
                'features' => ['3 Bilik Tidur', '3 Bilik Air', '80% Perabot Percuma', '1,022 sqft'],
                'size_sqft' => '1,022',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'tenure' => 'Leasehold',
                'is_featured' => true,
                'is_active' => true,
                'telegram_channel' => 'https://t.me/idamanperdana',
            ],
            [
                'title' => 'Rumah Selangorku Residensi Suria @Alam Sari',
                'type' => 'new_project',
                'price' => 263000,
                'location' => 'Alam Sari, Bangi',
                'developer' => 'Bangi Avenue',
                'description' => 'FREEHOLD! Rumah mampu milik dengan 80% perabot percuma. Beli & terus masuk. Lokasi strategik di Bangi.',
                'features' => ['FREEHOLD', '3 Bilik Tidur', '3 Bilik Air', '80% Perabot', 'Beli & Terus Masuk'],
                'size_sqft' => '1,045',
                'bedrooms' => 3,
                'bathrooms' => 3,
                'tenure' => 'Freehold',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Rumah Teres Taman Jenjarom Permai @Jenjarom',
                'type' => 'landed',
                'price' => 382000,
                'location' => 'Jenjarom, Kuala Langat',
                'developer' => 'Taman Jenjarom Permai',
                'description' => 'Rumah teres setingkat dengan tanah belakang luas sehingga 20 kaki. Jubin penuh. Reka bentuk moden & selesa.',
                'features' => ['4 Bilik Tidur', '2 Bilik Air', 'Tanah Belakang Luas', 'Jubin Penuh', 'Reka Bentuk Moden'],
                'size_sqft' => '1,566',
                'bedrooms' => 4,
                'bathrooms' => 2,
                'tenure' => 'Freehold',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Double Storey Taman Idaman Jiwa 1 @Shah Alam',
                'type' => 'landed',
                'price' => 594000,
                'location' => 'Jalan Kebun, Shah Alam',
                'description' => '2 Storey Terrace dengan spesifikasi tinggi. 4 bilik 4 bilik air. Keluasan binaan 1,693sqft.',
                'features' => ['4 Bilik Tidur', '4 Bilik Air', '20\' x 64\'', '1,693 sqft', 'Gated Community'],
                'size_sqft' => '1,693',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'tenure' => 'Freehold',
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'Residensi Bukit Bandaraya @Shah Alam',
                'type' => 'landed',
                'price' => 780000,
                'location' => 'Bukit Bandaraya, Shah Alam',
                'developer' => 'Pavonia',
                'description' => 'Kediaman berpagar eksklusif bersebelahan Taman Botani Negara Shah Alam. Suasana hutan simpan yang tenang.',
                'features' => ['4 Bilik Tidur', '4 Bilik Air En-suite', '20\' x 74\'', '1,866 - 2,784 sqft', 'Gated & Guarded'],
                'size_sqft' => '2,784',
                'bedrooms' => 4,
                'bathrooms' => 4,
                'tenure' => 'Freehold',
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        Inquiry::create([
            'project_id' => 1,
            'name' => 'Ahmad Bin Ismail',
            'phone' => '60123456789',
            'email' => 'ahmad@email.com',
            'monthly_salary' => 4500,
            'approval_status' => 'approved',
            'status' => 'new',
        ]);
    }
}
