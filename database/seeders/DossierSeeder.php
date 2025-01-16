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
            [
                'subject' => 'Hoofdpijn',
                'type' => 'man',
            ],
            [
                'subject' => 'Spierpijn',
                'type' => 'vrouw',
            ],
            [
                'subject' => 'Rugpijn',
                'type' => 'kind',
            ],
            [
                'subject' => 'Misselijkheid',
                'type' => 'bejaarde',
            ],
            [
                'subject' => 'Koorts',
                'type' => 'man',
            ],
            [
                'subject' => 'Verstuikte Enkel',
                'type' => 'vrouw',
            ],
            [
                'subject' => 'Buikpijn',
                'type' => 'kind',
            ],
            [
                'subject' => 'Hoofdpijn',
                'type' => 'bejaarde',
            ],
            [
                'subject' => 'Misselijkheid',
                'type' => 'man',
            ],
            [
                'subject' => 'Spierpijn',
                'type' => 'vrouw',
            ],
        ]);
    }
}
