<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiKey;
use Illuminate\Support\Str;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApiKey::create([
            'name' => 'Ext Api',
            'api_key' => Str::random(80),
            'is_active' => true,
        ]);
    }
}
