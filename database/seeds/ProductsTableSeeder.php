<?php

use App\Model\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Laptops
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Laptop '.$i,
                'slug' => 'laptop-'.$i,
                'sku' => 'LAP-'.$i,

                'meta_title' => 'LAP-'.$i,
                'meta_desc' => 'LAP-'.$i,
                'meta_keyword' => 'LAP-'.$i,

                'price' => rand(149999, 249999),
                'quantity' => rand(10, 500),
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'images' => '["products\/dummy\/sample.jpg","products\/dummy\/sample.jpg","products\/dummy\/sample.jpg"]',

                'featured' => true,
                'visibility' => true,
                'active' => true,
                'in_stock' => true,

                'sort_order' => 100,
                'type_id' => 'simple',
                'parent_id' => null,
                'child_id' => null,

                ])->categories()->attach(1);
        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);

        // Desktops
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Desktops-'.$i,
                'slug' => 'Desktops-'.$i,
                'sku' => 'DES-'.$i,

                'meta_title' => 'DES-'.$i,
                'meta_desc' => 'DES-'.$i,
                'meta_keyword' => 'DES-'.$i,

                'price' => rand(149999, 249999),
                'quantity' => rand(10, 500),
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'images' => '["products\/dummy\/sample.jpg","products\/dummy\/sample.jpg","products\/dummy\/sample.jpg"]',

                'featured' => true,
                'visibility' => true,
                'active' => true,
                'in_stock' => true,

                'sort_order' => 100,
                'type_id' => 'simple',
                'parent_id' => null,
                'child_id' => null,

            ])->categories()->attach(2);
        }

        // Tablets
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Tablets-'.$i,
                'slug' => 'Tablets-'.$i,
                'sku' => 'TAB-'.$i,

                'meta_title' => 'TAB-'.$i,
                'meta_desc' => 'TAB-'.$i,
                'meta_keyword' => 'TAB-'.$i,

                'price' => rand(149999, 249999),
                'quantity' => rand(10, 500),
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'images' => '["products\/dummy\/sample.jpg","products\/dummy\/sample.jpg","products\/dummy\/sample.jpg"]',

                'featured' => true,
                'visibility' => true,
                'active' => true,
                'in_stock' => true,

                'sort_order' => 100,
                'type_id' => 'simple',
                'parent_id' => null,
                'child_id' => null,

            ])->categories()->attach(3);
        }


        // TVs
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'TVs-'.$i,
                'slug' => 'tvs-'.$i,
                'sku' => 'TV-'.$i,

                'meta_title' => 'TAB-'.$i,
                'meta_desc' => 'TAB-'.$i,
                'meta_keyword' => 'TAB-'.$i,

                'price' => rand(149999, 249999),
                'quantity' => rand(10, 500),
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'images' => '["products\/dummy\/sample.jpg","products\/dummy\/sample.jpg","products\/dummy\/sample.jpg"]',

                'featured' => true,
                'visibility' => true,
                'active' => true,
                'in_stock' => true,

                'sort_order' => 100,
                'type_id' => 'simple',
                'parent_id' => null,
                'child_id' => null,

            ])->categories()->attach(4);
        }

        // Cameras
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Cameras-'.$i,
                'slug' => 'cameras-'.$i,
                'sku' => 'CAM-'.$i,

                'meta_title' => 'TAB-'.$i,
                'meta_desc' => 'TAB-'.$i,
                'meta_keyword' => 'TAB-'.$i,

                'price' => rand(149999, 249999),
                'quantity' => rand(10, 500),
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'images' => '["products\/dummy\/sample.jpg","products\/dummy\/sample.jpg","products\/dummy\/sample.jpg"]',

                'featured' => true,
                'visibility' => true,
                'active' => true,
                'in_stock' => true,

                'sort_order' => 100,
                'type_id' => 'simple',
                'parent_id' => null,
                'child_id' => null

            ])->categories()->attach(5);
        }


        // Appliances
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Appliances-'.$i,
                'slug' => 'appliances-'.$i,
                'sku' => 'APPL-'.$i,

                'meta_title' => 'APPL-'.$i,
                'meta_desc' => 'APPL-'.$i,
                'meta_keyword' => 'APPL-'.$i,

                'price' => rand(149999, 249999),
                'quantity' => rand(10, 500),
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, 32GB RAM',
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',

                'images' => '["products\/dummy\/sample.jpg","products\/dummy\/sample.jpg","products\/dummy\/sample.jpg"]',

                'featured' => true,
                'visibility' => true,
                'active' => true,
                'in_stock' => true,

                'sort_order' => 100,
                'type_id' => 'simple',
                'parent_id' => null,
                'child_id' => null

            ])->categories()->attach(6);
        }

        // Select random entries to be featured
        Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53,61, 69, 73, 80])->update(['featured' => true]);
    }
}
