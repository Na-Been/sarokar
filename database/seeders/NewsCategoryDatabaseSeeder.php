<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Modules\News\Entities\Category;

class NewsCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['चितवन विशेष','समाज','राजनीति','अर्थ-विजनेस','खेलकुद','अन्तर्वार्ता','विचार','स्वास्थ्य','विश्व','प्रवास'];
        $slug = ['चितवन विशेष', 'समाज', 'राजनीति', 'अर्थ-विजनेस', 'खेलकुद', 'अन्तर्वार्ता', 'विचार', 'स्वास्थ्य', 'विश्व','प्रवास'];
        Model::unguard();
        foreach ($titles as $key => $title)
            Category::create(
                ['title' => $title,
                    'slug' => $slug[$key],
                    'user_id' => 1,
                    'order' => $key
                ]);
    }
}
