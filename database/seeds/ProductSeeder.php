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
        
        $img = file_get_contents('https://www.babyshop.com/images/660844/x_large.jpg');
        $data = base64_encode($img);
        // Insert product with code: NHBW1220
        Product::insert([
            'name' => 'Nike Hoodie AB-1',
            'brand' => 'Nike',
            'code' => 'NHBW1220',
            'description' => 'Nike hoodie AB-1 model, black and white, sportswear',
            'price' => 79.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://www.tactics.com/a/ba16/o/vans-vans-x-antihero-wired-hoodie-black.jpg');
        $data = base64_encode($img);
        // Insert product with code: VAH3221
        Product::insert([
            'name' => 'Vans anti hero',
            'brand' => 'Vans',
            'code' => 'VAH3221',
            'description' => 'Vans anti hero hoodie, black with picture on back',
            'price' => 59.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://www.serishirts.com/17076-22458-tm_large_default/t-shirt-multipass-leeloo-5th-element-white.jpg');
        $data = base64_encode($img);
        // Insert product with code: ETG1334
        Product::insert([
            'name' => 'Element t-shirt',
            'brand' => 'Element',
            'code' => 'ETG1334',
            'description' => 'Grey element t-shirt multipass model',
            'price' => 17.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://kickz.akamaized.net/us/media/images/p/600/converse-CORE_WORDMARK_T_SHIRT-Black-2.jpg');
        $data = base64_encode($img);
        // Insert product with code: CBS3333
        Product::insert([
            'name' => 'Converse black shirt',
            'brand' => 'Converse',
            'code' => 'CBS3333',
            'description' => 'Converse black shirt with logo on front side',
            'price' => 17.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://buybits.com/media/catalog/product/r/i/rip-n-dip-my-little-nerm-hoodie-1_1_1_1.jpg');
        $data = base64_encode($img);
        // Insert product with code: RND0110
        Product::insert([
            'name' => 'Rip n Dip - must be nice',
            'brand' => 'Rip n Dip',
            'code' => 'RND0110',
            'description' => 'Rip n Dip must be nice hoodie, limited edition',
            'price' => 119.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://www.trekkinn.com/f/13654/136542825/superdry-super-multi-jacket.jpg');
        $data = base64_encode($img);
        // Insert product with code: SDJ1111
        Product::insert([
            'name' => 'Superdry Super multi jacket',
            'brand' => 'Superdry',
            'code' => 'SDJ1111',
            'description' => 'Superdry jacket, model Super',
            'price' => 79.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://cdn.shoplightspeed.com/shops/603507/files/18432304/vans-vans-retro-sport-anorak-jacket.jpg');
        $data = base64_encode($img);
        // Insert product with code: VAJ0221
        Product::insert([
            'name' => 'Retro anorak',
            'brand' => 'Vans',
            'code' => 'VAJ0221',
            'description' => 'Vans retro anorak jacket, pink white and blue',
            'price' => 89.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://www.natterjacks.com/images/vans-torrey-jacket-camo-p98242-363243_zoom.jpg');
        $data = base64_encode($img);
        // Insert product with code: VCJ1121
        Product::insert([
            'name' => 'Cammo jacket',
            'brand' => 'Vans',
            'code' => 'VCJ1121',
            'description' => 'Vans cammo jacket',
            'price' => 59.99,
            'image' => $data
        ]);
        
        $img = file_get_contents('https://paulreader.com.au/wp-content/uploads/2018/10/Slide1-50.jpg');
        $data = base64_encode($img);
        // Insert product with code: BGR0011
        Product::insert([
            'name' => 'Breack jacket Golden Rod',
            'brand' => 'Burton',
            'code' => 'BGR0011',
            'description' => 'Burton golden rod jacket. Ideal for snow sports',
            'price' => 109.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://www.yoox.com/images/items/41/41848246re_14_f.jpg');
        $data = base64_encode($img);
        // Insert product with code: CGB1010
        Product::insert([
            'name' => 'Columbia winter jacket',
            'brand' => 'Columbia',
            'code' => 'CGB1010',
            'description' => 'Columbia green and black jacket',
            'price' => 99.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://www.trekkinn.com/f/13739/137393234/columbia-bloomingport-windbreaker.jpg');
        $data = base64_encode($img);
        // Insert product with code: CWB1110
        Product::insert([
            'name' => 'Columbia windbreaker',
            'brand' => 'Columbia',
            'code' => 'CWB1110',
            'description' => 'Columbia windbreaker jacket',
            'price' => 139.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://cdn.shopify.com/s/files/1/0177/2424/products/3m-jacket_1200x1200.jpg');
        $data = base64_encode($img);
        // Insert product with code: RND0010
        Product::insert([
            'name' => 'Multi cats jacket',
            'brand' => 'Rip n Dip',
            'code' => 'RND0010',
            'description' => 'Rip n Dip black jacket with cats',
            'price' => 199.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://cdn.shopify.com/s/files/1/2166/8231/products/tf-coaches-jacket-primary-01_767x.jpg');
        $data = base64_encode($img);
        // Insert product with code: TFJ1111
        Product::insert([
            'name' => 'Retro jacket',
            'brand' => 'Teddy Fresh',
            'code' => 'TFJ1111',
            'description' => 'Teddy fresh vintage jacket',
            'price' => 89.99,
            'image' => $data
        ]);

        $img = file_get_contents('https://scene7.zumiez.com/is/image/zumiez/pdp_hero/Empyre-Pauly-Reflective-Black-%26-Grey-Anorak-Jacket-_318251-front-US.jpg');
        $data = base64_encode($img);
        // Insert product with code: EPJ1111
        Product::insert([
            'name' => 'Reflective jacket',
            'brand' => 'Empyre Pauly',
            'code' => 'EPJ1111',
            'description' => 'Empyre Pauly reflective black jacket',
            'price' => 139.99,
            'image' => $data
        ]);
    }
}
