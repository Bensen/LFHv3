<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EmblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emblems = ['shield', 'gavel', 'flask', 'magic', 'anchor', 'bomb', 'diamond', 'gamepad', 'crosshairs', 'power-off', 'code', 'star', 'sun-o', 'moon-o', 'snowflake-o', 'leaf', 'tree', 'cloud', 'bath', 'handshake-o', 'hand-peace-o', 'hand-spock-o', 'heart', 'heart-o', 'female', 'male', 'shower', 'adjust', 'bank', 'bug', 'asterisk', 'bolt', 'beer', 'coffee', 'car', 'motorcycle', 'road', 'fighter-jet', 'space-shuttle', 'rocket', 'globe', 'futbol-o', 'key', 'music', 'paw', 'umbrella',];

        for ($i = 0; $i < count($emblems); $i++) { 
            App\Emblem::create([
                'name' => $emblems[$i],
            ]);
        }
    }
}
