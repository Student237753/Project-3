<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DossierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dossiers')->insert([
            ['subject' => 'Hoofdpijn', 'type' => 'man', 'appointment' => '22-02-2025 11:30'],
            ['subject' => 'Spierpijn', 'type' => 'vrouw', 'appointment' => '23-02-2025 09:00'],
            ['subject' => 'Rugpijn', 'type' => 'kind', 'appointment' => '24-02-2025 10:00'],
            ['subject' => 'Misselijkheid', 'type' => 'bejaarde', 'appointment' => '25-02-2025 14:00'],
            ['subject' => 'Koorts', 'type' => 'man', 'appointment' => '26-02-2025 08:30'],
            ['subject' => 'Verstuikte Enkel', 'type' => 'vrouw', 'appointment' => '27-02-2025 15:30'],
            ['subject' => 'Buikpijn', 'type' => 'kind', 'appointment' => '28-02-2025 11:15'],
            ['subject' => 'Hoofdpijn', 'type' => 'bejaarde', 'appointment' => '01-03-2025 09:45'],
            ['subject' => 'Misselijkheid', 'type' => 'man', 'appointment' => '02-03-2025 13:30'],
            ['subject' => 'Spierpijn', 'type' => 'vrouw', 'appointment' => '03-03-2025 10:45'],
        ]);
    }
}
