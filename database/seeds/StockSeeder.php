<?php

use Illuminate\Database\Seeder;
use App\Stock;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Insert stock with code: NHBW1220
        Stock::insert([
            'product_code' => 'NHBW1220',
            's_stock' => 1,
            'm_stock' => 2,
            'l_stock' => 2,
            'xl_stock' => 0
        ]);

        // Insert stock with code: VAH3221
        Stock::insert([
            'product_code' => 'VAH3221',
            's_stock' => 3,
            'm_stock' => 2,
            'l_stock' => 2,
            'xl_stock' => 1
        ]);

        // Insert stock with code: ETG1334
        Stock::insert([
            'product_code' => 'ETG1334',
            's_stock' => 1,
            'm_stock' => 3,
            'l_stock' => 3,
            'xl_stock' => 4
        ]);

        // Insert stock with code: CBS3333
        Stock::insert([
            'product_code' => 'CBS3333',
            's_stock' => 3,
            'm_stock' => 3,
            'l_stock' => 3,
            'xl_stock' => 3
        ]);

        // Insert stock with code: RND0110
        Stock::insert([
            'product_code' => 'RND0110',
            's_stock' => 0,
            'm_stock' => 1,
            'l_stock' => 1,
            'xl_stock' => 0
        ]);

        // Insert stock with code: SDJ1111
        Stock::insert([
            'product_code' => 'SDJ1111',
            's_stock' => 1,
            'm_stock' => 1,
            'l_stock' => 1,
            'xl_stock' => 1,
        ]);

        // Insert stock with code: VAJ0221
        Stock::insert([
            'product_code' => 'VAJ0221',
            's_stock' => 0,
            'm_stock' => 2,
            'l_stock' => 2,
            'xl_stock' => 1,
        ]);

        // Insert stock with code: VCJ1121
        Stock::insert([
            'product_code' => 'VCJ1121',
            's_stock' => 1,
            'm_stock' => 1,
            'l_stock' => 2,
            'xl_stock' => 1,
        ]);

        // Insert stock with code: BGR0011
        Stock::insert([
            'product_code' => 'BGR0011',
            's_stock' => 0,
            'm_stock' => 0,
            'l_stock' => 1,
            'xl_stock' => 1,
        ]);

        // Insert stock with code: CGB1010
        Stock::insert([
            'product_code' => 'CGB1010',
            's_stock' => 1,
            'm_stock' => 0,
            'l_stock' => 1,
            'xl_stock' => 0,
        ]);

        // Insert stock with code: CWB1110
        Stock::insert([
            'product_code' => 'CWB1110',
            's_stock' => 1,
            'm_stock' => 1,
            'l_stock' => 1,
            'xl_stock' => 0,
        ]);

        // Insert stock with code: RND0010
        Stock::insert([
            'product_code' => 'RND0010',
            's_stock' => 0,
            'm_stock' => 0,
            'l_stock' => 1,
            'xl_stock' => 0,
        ]);

        // Insert stock with code: TFJ1111
        Stock::insert([
            'product_code' => 'TFJ1111',
            's_stock' => 1,
            'm_stock' => 1,
            'l_stock' => 1,
            'xl_stock' => 1,
        ]);

        // Insert stock with code: EPJ1111
        Stock::insert([
            'product_code' => 'EPJ1111',
            's_stock' => 1,
            'm_stock' => 1,
            'l_stock' => 1,
            'xl_stock' => 1,
        ]);
    }
}
