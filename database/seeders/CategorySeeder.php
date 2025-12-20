<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['slug' => 'bote', 'name' => 'Botë', 'description' => 'Lajmet më të rëndësishme ndërkombëtare.', 'order_index' => 1],
            ['slug' => 'politike', 'name' => 'Politikë', 'description' => 'Politikë, institucione dhe zhvillime publike.', 'order_index' => 2],
            ['slug' => 'lufte-konflikte', 'name' => 'Luftë & Konflikte', 'description' => 'Raportime nga konfliktet, siguria dhe diplomacia.', 'order_index' => 3],
            ['slug' => 'ekonomi-jetese', 'name' => 'Ekonomi & Jetesë', 'description' => 'Ekonomi, tregje, kosto jete dhe mirëqenie.', 'order_index' => 4],
            ['slug' => 'migrim-diaspora', 'name' => 'Migrim & Diaspora', 'description' => 'Migrimi, diaspora dhe trendet shoqërore.', 'order_index' => 5],
            ['slug' => 'teknologji-siguri', 'name' => 'Teknologji & Siguri', 'description' => 'Teknologji, AI, privatësi dhe siguri kibernetike.', 'order_index' => 6],
            ['slug' => 'shendet-shkence', 'name' => 'Shëndet & Shkencë', 'description' => 'Mjekësi, shëndet publik dhe kërkime shkencore.', 'order_index' => 7],
            ['slug' => 'kulture-shoqeri', 'name' => 'Kulturë & Shoqëri', 'description' => 'Kulturë, art, shoqëri dhe trende.', 'order_index' => 8],
        ];

        foreach ($items as $item) {
            Category::updateOrCreate(
                ['slug' => $item['slug']],
                [
                    'name'        => $item['name'],
                    'description' => $item['description'],
                    'order_index' => $item['order_index'],
                    'active'      => true,
                ]
            );
        }
    }
}
