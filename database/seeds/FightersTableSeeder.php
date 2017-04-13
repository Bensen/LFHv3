<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class FightersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Deep', 'John', 'Henry', 'Rudolf', 'Louis', 'Firen', 'Freeze', 'Dennis', 'Woody', 'Davis'];
        $descriptions = [
            'Deep ist ein berühmter Schwertkämpfer und bekannt für seinen ultimativen Umgang mit dem Schwert.',
            'John ist die Zauberer-Legende, denn er beherrscht spezielle Fähigkeiten aus allen Bereichen der Magie.',
            'Henry ist ein ausgezeichneter Bogenschütze und hat gerüchten zufolge mit einem Schuss hundert Gegner besiegt.',
            'Rudolf ist ein geheimnisumwobener Samurai, der die Kampfkünste der Ninja studiert und kombiniert hat.',
            'Louis ist ein Ritter, geschützt durch eine magische Rüstung und ein Meister besonderer Kampfkünste.',
            'Firen ist ein Feuermagier und soll mit seinen Flammen angeblich den puren Wahnsinn symbolisieren.',
            'Freeze ist ein stiller Eismager der sicht stets von einer kalten, abweisenden Aura umgeben lässt.',
            'Dennis ist der Nachkomme der Drachenkünste und liebt schnelle Kämpfe mit unerwarteten Angriffen.',
            'Woody ist der Nachkomme der Tigerkünste und versucht stets die Kontrolle in einen Kampf zu wahren.',
            'Davis ist ein außerordentlich begabter Nahkämpfer, der sich dem Drachenclan angeschlossen hat.',
        ];

        for ($i = 0; $i < count($names); $i++) { 
            App\Fighter::create([
                'name' => $names[$i],
                'image' => 'img/characters/'.strtolower($names[$i]).'.gif',
                'description' => $descriptions[$i],
            ]);
        }
    }
}
