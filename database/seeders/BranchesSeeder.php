<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Branch;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branch = Branch::create([
            "name" => "San Vicente",
            "address" => "Av. Cresencio Miranda",
            "state" => 1
        ]);
        $branch = Branch::create([
            "name" => "Cojute",
            "address" => "Barrio El Centro",
            "state" => 1
        ]);
        $branch = Branch::create([
            "name" => "Soyapango",
            "address" => "Plaza Soyapango",
            "state" => 1
        ]);
        $branch = Branch::create([
            "name" => "San Salvador",
            "address" => "Col. Escalón",
            "state" => 1
        ]);
    }
}
