<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductSeederOld extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = Category::all();
        $products = [
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Simple Kind-Skin-Protecting Moisturisers',
                'short_descriptions' => 'simple-kind-skin-protecting-moisturisers',
                'descriptions' => '<h1 class="a-size-base-plus a-text-bold" style="box-sizing: border-box; padding: 0px 0px 4px; margin: 0px; text-rendering: optimizelegibility; color: #0f1111; font-family: "Amazon Ember", Arial, sans-serif; font-size: 16px !important; line-height: 24px !important;">About this item</h1>
                    <ul class="a-unordered-list a-vertical a-spacing-mini" style="box-sizing: border-box; margin: 0px 0px 0px 18px; color: #0f1111; padding: 0px; font-family: "Amazon Ember", Arial, sans-serif;">
                    <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">SPF 15 to protct your skin from any harmful UVA and UVB rays</span></li>
                    <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Contains no artificial perfume</span></li>
                    <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Has no added color or dye</span></li>
                    </ul>',
                'thumbnail_image' => 'skin-1.png',
                'mrp' => '485',
                'final_price' => '305',
                'stock' => '50',
                'rating' => 4
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Lacto Calamine Light moisturising gel',
                'short_descriptions' => 'Brand	Lacto Calamine Item Form	Gel',
                'descriptions' => '<h1 class="a-size-base-plus a-text-bold" style="box-sizing: border-box; padding: 0px 0px 4px; margin: 0px; text-rendering: optimizelegibility; color: #0f1111; font-family: "Amazon Ember", Arial, sans-serif; font-size: 16px !important; line-height: 24px !important;">About this item</h1>
                <ul class="a-unordered-list a-vertical a-spacing-mini" style="box-sizing: border-box; margin: 0px 0px 0px 18px; color: #0f1111; padding: 0px; font-family: "Amazon Ember", Arial, sans-serif;">
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Burst of hydration with non-sticky feel</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Maintains skin&rsquo;s natural glow. Skin feels soft &amp; smooth</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Hyaluronic Acid is known to hold 1000 times its weight in water. It gives the skin a burst of hydration that it needs</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Niacinamide is known to control excess oil on face by minimising pores. This helps keep skin smooth &amp; glowing</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Vitamin E &amp; Vitamin B5 helps in retaining skin moisture &amp; enhances skin&rsquo;s natural repair process. Vitamin E also has antioxidant properties that hydrates &amp; soothes skin</span></li>
                </ul>',
                'thumbnail_image' => 'skin-2.png',
                'mrp' => '299',
                'final_price' => '199',
                'stock' => '25',
                'rating' => 5
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 6,
                'name' => 'Altos Zordon Sunblock Cream SPF 40 Have 5 in One Solutions Personal Care',
                'short_descriptions' => 'Altos Zordon Sunblock Cream SPF 40 Have 5 in One Solutions Personal Care',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">
                <li class="a-spacing-mini"><span class="a-list-item">
                Zordan Sun Block cream SPF-40 with 5 in 1 solution for board spectrum skin protection against damaging UVA &amp; UVB rays,  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Special added natural extract like aloevera &amp; sandalwood improve the skin complexion.  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> It helps to maintain moisturize balance of the skin.  </span></li>
                 <li class="a-spacing-mini"><span class="a-list-item"> It helps to prevent the skin against tanning &amp; ageing factors due to exposure.  </span></li>  </ul>',
                'thumbnail_image' => 'care-1.png',
                'mrp' => '220',
                'final_price' => '200',
                'stock' => '100',
                'rating' => 4
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 14,
                'name' => 'Solimo Germ Protection Soap',
                'short_descriptions' => 'Amazon Brand - Solimo Germ Protection Soap, 125gm (Pack of 8)',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">
                 <li class="a-spacing-mini"><span class="a-list-item"> Protects you from 99% germs by reducing disease-causing microbes  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Deep cleanses skin to remove impurities  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Naturally derived components and glycerin gently moisturizes skin  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Contains 65% TFM which produces rich and creamy lather  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Does not contain silicones or parabens, hence, is safe for daily use  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Lab tested  </span></li>
                <li class="a-spacing-mini"><span class="a-list-item"> Package content: Germ Protection Soap, 125gm (Pack of 8)  </span></li>
                </ul>',
                'thumbnail_image' => 'care-2.png',
                'mrp' => '399',
                'final_price' => '215',
                'stock' => '50',
                'rating' => 5
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 16,
                'name' => 'Head And Shoulders Shampoo',
                'short_descriptions' => 'Head & Shoulders Smooth and Silky, Anti Dandruff Shampoo for Women & Men , 1 L',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">
                 <li class="a-spacing-mini"><span class="a-list-item"> Richly indulgent anti-dandruff shampoo for dry, damaged or frizzy hair, Leaves hair up to 100% dandruff free; Gentle enough for everyday use, even for color or chemically treated hair  </span></li>
                 <li class="a-spacing-mini"><span class="a-list-item"> Richly indulgent anti-dandruff shampoo for dry, damaged or frizzy hair, Leaves hair up to 100% dandruff free; Gentle enough for everyday use, even for color or chemically treated hair  </span></li>
                 <li class="a-spacing-mini"><span class="a-list-item"> Hair Type: Frizzy Hair  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Usage: Shake before use. Wet hair. Gently massage onto scalp. Lather and rinse thoroughly Repeat if desired  </span></li>
                 <li class="a-spacing-mini"><span class="a-list-item"> Target Audience: Men &amp; Women  </span></li>  </ul>',
                'thumbnail_image' => 'hair-1.png',
                'mrp' => '890',
                'final_price' => '671',
                'stock' => '20',
                'rating' => 3
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 20,
                'name' => 'Indulekha Bringha Oil',
                'short_descriptions' => 'Indulekha Bringha Oil, Reduces Hair Fall and Grows New Hair, 100% Ayurvedic Oil, 250ml',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> Stops Hairfall from Roots  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Grows new hair in 4 months  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> 100% Ayurvedic Oil  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Clinical &amp; Dermat Tested  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> With Goodness of Bringhraj  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> 100% Natural Fragrance, Colour  </span></li>  </ul>',
                'thumbnail_image' => 'hair-2.png',
                'mrp' => '1170',
                'final_price' => '600',
                'stock' => '20',
                'rating' => 5
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 25,
                'name' => 'BLANKO by KING - Dusk Perfume, 100 ml',
                'short_descriptions' => 'BLANKO by KING - Dusk Perfume, 100 ml | Eau De Parfum | Perfume with 18% Fragrance | Outlast, Own The Party',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> Dusk is the most beautiful scent for a night out. Its crisp, long-lasting and has an amazing strength to it. The perfect scent for the confident person who wants to be noticed in a room full of people or simply one on one.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Experience the magic and mystery of the night with Dusk, an essential part of your evening ritual. Illuminate your nights, embrace the captivating scent, and let its allure leave an indelible impression on your journey.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> The sun sets, let Blankos Dusk perfume take you from day to night with its captivating party notes. Indulge in the ultimate fragrance experience of BLANKO.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Dusk captures the essence of the night with an alluring blend of Lemon, Bergamot, Basil, Rosemary, and Caraway, unveiling a realm of mystery and intrigue.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Delicate Jasmine, Coriander, Carnation, and Rose intertwine, creating a captivating bouquet infused with Orris Roots powdery sophistication.  </span></li>  </ul>',
                'thumbnail_image' => 'frag-1.png',
                'mrp' => '1500',
                'final_price' => '600',
                'stock' => '145',
                'rating' => 2
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 26,
                'name' => 'Bella Vita Luxury Unisex Eau De',
                'short_descriptions' => 'Bella Vita Luxury Unisex Eau De Parfum Gift Set 4x20 ML for Men & Women with SKAI, FRESH, WHITEOUD, PATCHOULI Perfume|Long Lasting EDP Fragrance Scent',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> A set of 4 mini perfumes, including the iconic fragrances of white oud, skai aquatic, fresh unisex and patchouli unisex.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> This gift set is perfect for those looking for affordable yet luxurious fragrances that both men and women can enjoy.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> With its diverse range of scents, this perfume gift set takes you on a fragrant journey, from the exotic and sweet aroma of white oud to the fresh and aquatic scent of skai aquatic.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> The set is an ideal gift for a loved one or a perfect way to pamper yourself with unforgettable fragrances that can be worn day or night.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Each fragrance is designed to make a statement and leave a lasting impression, ensuring you smell amazing wherever you go.  </span></li>  </ul>',
                'thumbnail_image' => 'frag-2.png',
                'mrp' => '900',
                'final_price' => '550',
                'stock' => '170',
                'rating' => 4
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 27,
                'name' => '3D Unicorn Cover Pencil Compass',
                'short_descriptions' => 'HIGH TRUSTED® Large Capacity 3D Unicorn Cover Pencil Compass with Compartments, School Supply Organizer for Student, Stationery Box, Cosmetic Zip Pouch Bag - Pink',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> Kids Can Be Used To Carry Pencil, Eraser, Pens, Colors, Other Stationary Or Used As A Multipurpose Pouch For Storing Makeup, Essentials, Etc. It Will Make The Children Stand Out In The Classroom.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> LARGE CAPACITY: The Size Of The Unicorn Pencil Case is 8.8*5.9*2 inch. Have Enough Space Contain You Pencil. The Pencil Pouch Have 3 Independent Layers, Can Hold Up Many Pencil Or School Supplies.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> 3D Unicorn Pencil Case is Made Of Durable and Stylish EVA Material, Shockproof, Waterproof, Compressive All - Round Protection of Stationery. Each of Cute Pencil Pouch Comes With a Embossed Unicorn Pattern On The Front That Gives a Vivid Look And Make Your Children Happy.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> BEST GIFT: High Trusted Cute Pencil Case, It Is Girl Favorite. Perfect Diwali, Rakshabandhan, Holi, Birthday Gift For Girls Or Kids.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Kids Can Be Used to Carry Pencil, Eraser, Pens, Colors, Other Stationary or Used as a Multipurpose Pouch for Storing Makeup, Essentials, etc. It will Make the Children Stand Out in the Classroom.  </span></li>  </ul>',
                'thumbnail_image' => 'gift-1.png',
                'mrp' => '400',
                'final_price' => '250',
                'stock' => '1000',
                'rating' => 3
            ],
            [
                'category_id' => 5,
                'sub_category_id' => 30,
                'name' => 'Key Chain',
                'short_descriptions' => 'EYE BERRY BASI SALES WITH MISCELLANEOUS DEVICE Brass Wall Key Holder Flute and Peacock Quills Key Holder Wall Hanging Stand Home Decor Key Holder (Bronze)',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> GOOD LOOKING WITH ELEGANT UNIQUE DESIGN &amp; QUALITY  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> attractive and dependable product ,with suitable screws and plugs included  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> rust proof and durable.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> designed with keeping in mind the modern outlook and designer homes, which add a glamour looks in todays world.  </span></li>  </ul>',
                'thumbnail_image' => 'gift-2.png',
                'mrp' => '900',
                'final_price' => '300',
                'stock' => '50',
                'rating' => 5
            ],
            [
                'category_id' => 6,
                'sub_category_id' => 33,
                'name' => 'Wall Clock',
                'short_descriptions' => 'VOLANTIS Marble Style Wall Clock for Home, Living Room, Bedroom, Hall, Office Analog Stylish Silent Non-Ticking Clocks Modern and Decorative Time Piece (White Marble)',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> <b>🕔Concise Style</b>: Stylish modern dial with large relief numbers. The clock frame is made of high-quality plastic. Perfect for adding artful appeal to your wall.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> <b>🕔Super Silent</b>: Precise quartz sweep movement guarantees accurate time and is absolutely silent, no need to worry about ticking noises in a bedroom or office.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> <b>🕔Clear to Read</b>: The large numbers are clear to read and the front glass cover keeps dust away from the dial. Perfect wall decor for living room, office, bedroom, or any room.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> <b></b>🕔This is a multi-purpose wall clock, you can not only put it in the bedroom, office, but also in the coffee shop. It is a time machine and an interior decoration object.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> <b>🕓Easy To Clean</b>: Silent wall clock with flat front glass cover guarantees perfect view and keeps dust away from dial.  </span></li>  </ul>',
                'thumbnail_image' => 'home-1.png',
                'mrp' => '1500',
                'final_price' => '900',
                'stock' => '80',
                'rating' => 3
            ],
            [
                'category_id' => 6,
                'sub_category_id' => 35,
                'name' => 'Table Clock',
                'short_descriptions' => 'JASIFS® Digital Alarm Clock Table Office Clock with Date Time Temperature Night Light Sensor',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> Package contains: 1 Digital Alarm clock  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> 3 batteries required which is not included in package  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Time, Date , Temperature Measurement with Automatic Night light Sensor  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Eco and environment friendly design for Global Sustainability  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Three steps crescendo alarm: alarm will sound loudly gradually, gently wake you up from sleeping.  </span></li>  </ul>',
                'thumbnail_image' => 'home-2.png',
                'mrp' => '1000',
                'final_price' => '300',
                'stock' => '20',
                'rating' => 4
            ],
            [
                'category_id' => 7,
                'sub_category_id' => 38,
                'name' => 'Diwali Lights',
                'short_descriptions' => 'MPROW 20 Meter 70 LED Diwali Decorative Golden Led String Light | 65 Feet Gold Color Christmas Still Led Ladi String Tuni Rice Light for Home Decor, Christmas, Diwali and Festive Decoration (Golden)',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> High Quality Wire: MPROW Led String Rice Light comes with 100% Pure Copper Wire to ensure long lasting effect.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Accurate Length: Total length of this string light is 20 Meters including the Power Lead  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> No of LED: This string light contains 70 Pcs of Immersive Bright Energy Saving Golden Led Bulb  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Energy Efficient: This string light comes with energy efficient Led which saves more than 90% energy  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Occasion: Widely used for Christmas Decorations, Party and Diwali Decorations.  </span></li>  </ul>',
                'thumbnail_image' => 'occ-1.png',
                'mrp' => '300',
                'final_price' => '200',
                'stock' => '45',
                'rating' => 4
            ],
            [
                'category_id' => 7,
                'sub_category_id' => 39,
                'name' => 'Rakhi',
                'short_descriptions' => 'TONKWALAS Multicolor Combo of 10 Dora Rakhi Set for Men with Roli Chawal Rakhi for Brother',
                'descriptions' => '<ul class="a-unordered-list a-vertical a-spacing-mini">  <li class="a-spacing-mini"><span class="a-list-item"> Gift your brother this wonderful and fabulous looking rakhi on this Rakshabandhan and express your love in the most amazing way.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Comes with small Packet of Roli Chawal &amp; Best Wishes Greeting Card in best packaging  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> High Quality Material Used. The designer patterns in the aesthetic style with shimmering glimpse highlights the true beauty of this traditional thread.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Package Contains : 10 Rakhi, 1 small Packet of Roli Chawal &amp; 1 Best Wishes Greeting card.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Send Love To Your Brother With Via Tonkwalas. Acknowledge Your Love For Your Brother By Sending This Beautiful "RAKHI" With A Promise That Your Bond With Him Will Grow Stronger With Each Passing Moment.  </span></li>  <li class="a-spacing-mini"><span class="a-list-item"> Best Rakhi Gift For brother | Rakhi | Rakhi for brother| Best Rakshabandhan gifts  </span></li>  </ul>',
                'thumbnail_image' => 'occ-2.png',
                'mrp' => '100',
                'final_price' => '80',
                'stock' => '120',
                'rating' => 5
            ],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert([
                'brand_id' => null,
                'category_id' => $product['category_id'],
                'sub_category_id' => $product['sub_category_id'],
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'short_descriptions' => $product['short_descriptions'],
                'thumbnail_image' => $product['thumbnail_image'],
                'descriptions' => $product['descriptions'],
                'mrp' => $product['mrp'],
                'final_price' => $product['final_price'],
                'stock' => $product['stock'],
                'sku' => now()->format('dmy-his-dmy') . rand(1, 99) . rand(1, 99),
                'rating' => $product['rating'],
            ]);
            try {
                File::copy(public_path('frontend/images/seeders/products/' . $product['thumbnail_image']), storage_path('app/public/images/products/' . $product['thumbnail_image']));
            } catch (\Throwable $th) {
                //Log::info("file" . $eas->image);
            }
        }
    }
}
