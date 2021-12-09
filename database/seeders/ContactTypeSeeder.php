<?php

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    public function run(): void
    {
        ContactType :: upsert([
            ['id' => 1, 'name' => 'Ponto focal'],
            ['id' => 2, 'name' => 'Prefeito'],
            ['id' => 3, 'name' => 'Secretário'],
        ], 'id');     
    }
}
