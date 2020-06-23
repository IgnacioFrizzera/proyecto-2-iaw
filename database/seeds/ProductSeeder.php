<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert product with code: NHBW1220
        Product::insert([
            'name' => 'Nike Hoodie AB-1',
            'brand' => 'Nike',
            'code' => 'NHBW1220',
            'description' => 'Nike hoodie AB-1 model, black and white, sportswear',
            'price' => 79.99,
            'image' => '0'
        ]);

        // Insert product with code: VAH3221
        Product::insert([
            'name' => 'Vans anti hero',
            'brand' => 'Vans',
            'code' => 'VAH3221',
            'description' => 'Vans anti hero hoodie, black with picture on back',
            'price' => 59.99,
            'image' => '0'
        ]);

        // Insert product with code: ETG1334
        Product::insert([
            'name' => 'Element t-shirt',
            'brand' => 'Element',
            'code' => 'ETG1334',
            'description' => 'Grey element t-shirt multipass model',
            'price' => 17.99,
            'image' => '0'
        ]);

        // Insert product with code: CBS3333
        Product::insert([
            'name' => 'Converse black shirt',
            'brand' => 'Converse',
            'code' => 'CBS3333',
            'description' => 'Converse black shirt with logo on front side',
            'price' => 17.99,
            'image' => '0'
        ]);

        // Insert product with code: RND0110
        Product::insert([
            'name' => 'Rip n Dip - must be nice',
            'brand' => 'Rip n Dip',
            'code' => 'RND0110',
            'description' => 'Rip n Dip must be nice hoodie, limited edition',
            'price' => 119.99,
            'image' => '0'
        ]);

        // Insert product with code: SDJ1111
        Product::insert([
            'name' => 'Superdry Super multi jacket',
            'brand' => 'Superdry',
            'code' => 'SDJ1111',
            'description' => 'Superdry jacket, model Super.',
            'price' => 79.99,
            'image' => '0'
        ]);
    }
}
