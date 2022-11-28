<?php

use Illuminate\Database\Seeder;
use App\Tag; //aggiungere questa intestazione nel seeder appena creato

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = [
            'Rock',
            'Blues',
            'EDM',
            'House',
            'Jazz',
            'Metal',
            'Punk',
            'Pop',
            'Trento',
            'Milano',
            'Roma',
            'Catania'
        ];

        foreach($tags as $model) {
            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($tag->name);
            $tag->save();
        }

    }
}
