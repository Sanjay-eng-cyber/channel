<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category_id' => 4,
                'sub_category_id' => 25,
                'name' => 'Armaf Club De Nuit Intense Men Fragrance Body Spray 250ML',
                'short_descriptions' => null,
                'descriptions' => '<p>A sophisticated woody-spicy masculine fragrance with touches of fruity accords of Grapefruit and Mandarin, unified with Mint, laced on a Peppery heart notes of Clove, Cinnamon, Pepper and Ginger.</p>',
                'thumbnail_image' => 'frag-man-1.png',
                'mrp' => '499',
                'final_price' => '440',
                'stock' => 10,
                'rating' => 4
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 25,
                'name' => 'Armaf Hunter For Men Fragrance Body Spray 250ML',
                'short_descriptions' => null,
                'descriptions' => '<p>A floral woody masculine fragrance opens with sparkling notes of grapefruit, cardamom</p>',
                'thumbnail_image' => 'frag-man-2.png',
                'mrp' => '499',
                'final_price' => '440',
                'stock' => 10,
                'rating' => 4
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 26,
                'name' => 'Armaf Beau Elegant Women Mist 250ML',
                'short_descriptions' => null,
                'descriptions' => '<p>A floral fruity fragrance that captures absolute femininity of a modern women. The heart is enriched with the elegance of Orris and Jasmine along with refined notes of Magnolia.</p>',
                'thumbnail_image' => 'frag-female-1.png',
                'mrp' => '499',
                'final_price' => '440',
                'stock' => 10,
                'rating' => 5
            ],
            [
                'category_id' => 4,
                'sub_category_id' => 26,
                'name' => 'Armaf Club De Nuit Women Fragrance Body Spray 250ML',
                'short_descriptions' => null,
                'descriptions' => '<p>A special opulent and delicate scent with sparkling freshness of citrus accords of Grapefruit, Peach, and Orange combining with floral-fruity notes of Rose, Jasmine, and Litchi.</p>',
                'thumbnail_image' => 'frag-female-2.png',
                'mrp' => '499',
                'final_price' => '440',
                'stock' => 10,
                'rating' => 2
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 17,
                'name' => 'Bodyshop Banana Truly Nourishing Conditioner',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Enriched with deliciously ripe Community Trade organic banana puree from Ecuador, this delightfully fragrant conditioner deeply nourishes hair and leaves it feeling softer and looking shinier.</span></p>',
                'thumbnail_image' => 'hair-1.png',
                'mrp' => '745',
                'final_price' => '690',
                'stock' => 10,
                'rating' => 3
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 17,
                'name' => 'Bodyshop Ginger Scalp Care Conditioner',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Say "see ya!" to dry scalps and weak hair and "hello!" to tresses that feel seriously swishable with our more powerful than ever Ginger Scalp Care Conditioner. Now Certified by The Vegan Society and made with 97% ingredients of natural origin, including ginger essential oil, birch bark and white willow bark extracts and Community Fair Trade organic aloe vera from Mexico, our conditioner helps soothe dry scalps and leaves weak hair feeling stronger, softer and more resilient</span></p>',
                'thumbnail_image' => 'hair-2.png',
                'mrp' => '745',
                'final_price' => '690',
                'stock' => 10,
                'rating' => 3.5
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 16,
                'name' => 'Bodyshop Banana Truly Nourishing Shampoo',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">If youre after smoother-looking locks, our more powerful than ever Banana Truly Nourishing Shampoo is dry, frizz-prone hairs best friend. Now vegan and made with 91% ingredients of natural origin, including organic banana puree, this ridiculously fruity-smelling frizz-fighter leaves dry hair looking smoother and less frizzy. And feeling softer, fresher and healthier. Made with Vegan Silk Protein, use our shampoo as part of our 3-step Banana routine to help repair hair from the inside out and leave locks feeling nourished from root to tip.</span></p>',
                'thumbnail_image' => 'hair-3.png',
                'mrp' => '745',
                'final_price' => '690',
                'stock' => 10,
                'rating' => 2.5
            ],
            [
                'category_id' => 3,
                'sub_category_id' => 16,
                'name' => 'Ginger Anti-Dandruff Shampoo',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Ginger Anti-Dandruff Shampoo is now more powerful than ever. Now vegan and made with 90% ingredients of natural origin, including ginger essential oil and birch bark and white willow bark extracts, our shampoo helps clear flakes, leaves dry, itchy scalps feeling soothed and rebalanced. Made with Vegan Silk Protein, use this pleasantly gingery-scented stuff as part of our 3-step Ginger routine to help repair hair from the inside out and leave dry scalps feeling nourished, happier and healthier</span></p>',
                'thumbnail_image' => 'hair-4.png',
                'mrp' => '745',
                'final_price' => '690',
                'stock' => 10,
                'rating' => 4.6
            ],

            [
                'category_id' => 2,
                'sub_category_id' => 10,
                'name' => 'Jergens Original Scent Dry Skin Moisturizer 400ml',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Relieves dry skin with moisture-rich hydration to reveal deeply luminous, visibly softer skin.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Best for: Normal to dry skin.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&nbsp;</span><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Highlights</span></p>
                <p class="15" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Restores skin&lsquo;s luminosity with a unique illuminating HYDRALUCENCE&trade; blend and nourishing hydrators</span></p>
                <p class="15" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Provides dry skin with long-lasting moisture to soften and visibly improve skin&lsquo;s tone and texture</span></p>
                <p class="15" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Leaves skin lightly fragranced with JERGENS&reg; classic Cherry-Almond scent</span></p>',
                'thumbnail_image' => 'personal-1.png',
                'mrp' => '790',
                'final_price' => '750',
                'stock' => 10,
                'rating' => 2
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 9,
                'name' => 'Mcaffeine Coffee Body Scrub with Coconut 100gm',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">An aromatic blend of Coffee &amp; Coconut, this award-winning Coffee Body Scrub is a game-changing body care product that&rsquo;ll leave you hooked! Ideal for both men &amp; women, it&rsquo;s the best body scrub for tan removal and exfoliation. This caffeine body scrub also reduces cellulite &amp; ingrown hair to reveal irresistibly smooth skin. It is a great choice for polishing dry skin and buffing away dead skin.</span></p>',
                'thumbnail_image' => 'personal-2.png',
                'mrp' => '449',
                'final_price' => '400',
                'stock' => 10,
                'rating' => 4.2
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 8,
                'name' => 'British Rose Shower Gel',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Get that beautiful body feeling refreshed and squeaky-clean with our foamy British Rose Shower Gel.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&nbsp;</span><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Highlights</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Shower gel</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Perfect for all skin types</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Leave skin feeling soft, cleansed and refreshed</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Floral and refreshing</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">92% ingredients of natural origin</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Now certified by The Vegan Society</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Dermatologically tested</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&nbsp;</span><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Ingrident</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Aqua/Water/Eau, Sodium Laureth Sulfate, Glycerin, Decyl Glucoside, Cocamidopropyl Betaine, Coco- Betaine, Parfum/Fragrance, Sodium Chloride, Citric Acid, Sodium Benzoate, Sodium Gluconate, Geraniol, Citronellol, Aloe Barbadensis Leaf Juice Powder, Linalool, Limonene, Rose Extract, Denatonium Benzoate, Potassium Sorbate, CI 17200/Red 33, CI19140/Yellow 5.</span></p>',
                'thumbnail_image' => 'personal-3.png',
                'mrp' => '395',
                'final_price' => '350',
                'stock' => 10,
                'rating' => 3.5
            ],
            [
                'category_id' => 2,
                'sub_category_id' => 8,
                'name' => 'Moringa Shower Gel',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Get that beautiful body feeling refreshed and squeaky-clean with our foamy Moringa Shower Gel.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">&nbsp;</span><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Highlights</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Shower gel</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Perfect for all skin types</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Leave skin feeling soft, cleansed and refreshed</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Floral and refreshing</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">92% ingredients of natural origin</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Now certified by The Vegan Society</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Dermatologically tested</span></p>',
                'thumbnail_image' => 'personal-4.png',
                'mrp' => '395',
                'final_price' => '350',
                'stock' => 10,
                'rating' => 2.8
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Mamaearth Aloe Vera Oil-Free Face Moisturizer with Aloe Vera',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Introducing Aloe Vera Oil-Free Face Moisturizer crafted with the natural goodness of Aloe Vera and the powerhouse of antioxidants, Ashwagandha. Formulated with a lightweight and non-sticky texture, the moisturizer gets absorbed quickly into the skin, delivering 24-hour hydration.&nbsp;</span></p>',
                'thumbnail_image' => 'skin-1.png',
                'mrp' => '299',
                'final_price' => '299',
                'stock' => 10,
                'rating' => 4.9
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Mcaffeine Coffee Oil-Free Face Moisturizer',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">This moisturizer Pro-Vitamin B5 along with Hyaluronic Acid help in controlling the excess oil by maintaining the skin&rsquo;s hydration. Hyaluronic Acid also plumps the skin and draws in more water with its skin hydrating properties.</span></p>',
                'thumbnail_image' => 'skin-2.png',
                'mrp' => '449',
                'final_price' => '400',
                'stock' => 10,
                'rating' => 4.1
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Mama earth Charcoal Face Scrub for Oily Skin 100gm',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Mamaearth Charcoal Face Scrub with the proven benefits of activated charcoal that pull out toxins and impurities from deep within the pores. Walnut granules remove dead skin and reduce tanning to deliver an even-toned complexion. The result is healthy, glowing skin.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">This charcoal scrub for face is suitable for all skin types, the scrub exfoliates gently and is free of toxins or harmful chemicals such as Parabens, Sulfates, Phthalates, and Artificial Color&nbsp;</span></p>',
                'thumbnail_image' => 'skin-3.png',
                'mrp' => '349',
                'final_price' => '320',
                'stock' => 10,
                'rating' => 2.4
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Neutrogena Clear And Defend Facial Scrub 150 ml',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">NEUTROGENA&reg; Clear &amp; Defend Facial Scrub exfoliates skin and is clinically proven to help defend against future breakouts for a smoother, clearer complexion. Developed with dermatologists, its an oil-free face scrub with natural cellulose exfoliators that deeply cleanse to unclog pores. Formulated with salicylic acid, it helps to clear spots and defend against new breakouts from first use, while respecting the skin&rsquo;s balance.</span></p>',
                'thumbnail_image' => 'skin-4.png',
                'mrp' => '800',
                'final_price' => '695',
                'stock' => 10,
                'rating' => 4.1
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 5,
                'name' => 'Plum Vitamin C Face Scrub for Skin 100gm',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Vitamin C (above 10% strength) when applied on skin is proven to act on hyperpigmentation, dark spots, oxidative damage like wrinkles, and provide a boost to the natural glow of your skin!</span></p>',
                'thumbnail_image' => 'skin-5.png',
                'mrp' => '550',
                'final_price' => '500',
                'stock' => 10,
                'rating' => 2.9
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 1,
                'name' => 'Seaweed Cleansing Facial Wash',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Cleanse your skin whilst rebalancing moisture levels, with our gentle seaweed face wash. Oil-free and soap-free, this face wash will effectively remove impurities, leaving a shine-free matte finish.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Highlights</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: "Work Sans"; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.5000pt;">Suitable for combination/ oily skin</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: "Work Sans"; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.5000pt;">Mineral rich seaweed from Roaring Water Bay, Ireland</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: "Work Sans"; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.5000pt;">Soap free</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: "Work Sans"; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.5000pt;">Oil free</span></p>
                <p class="MsoNormal" style="margin-left: 36.0000pt; text-indent: -18.0000pt; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: "Work Sans"; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: "Times New Roman"; letter-spacing: 0.2500pt; font-size: 10.5000pt;">Refreshes skin</span></p>',
                'thumbnail_image' => 'skin-6.png',
                'mrp' => '945',
                'final_price' => '880',
                'stock' => 10,
                'rating' => 2.5
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 1,
                'name' => 'Tea Tree Facial Wash ',
                'short_descriptions' => null,
                'descriptions' => '<p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Made with Community Trade tea tree oil, this highly-effective gel-based face wash is suitable blemish prone skin, and gentle enough for everyday use.</span></p>
                <p class="MsoNormal"><span style="mso-spacerun: "yes"; font-family: Calibri; mso-bidi-font-family: "Times New Roman"; font-size: 11.0000pt;">Highlights</span></p>
                <p class="MsoNormal" style="margin-bottom: 0pt; margin-left: 13.5pt; text-indent: -18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: Arial; color: #0f1111; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Arial; mso-fareast-font-family: "Times New Roman"; color: #0f1111; font-size: 10.5000pt;">Our Tea Tree Skin Clearing Facial Wash infused with potent tea tree oil, cleanses blemished skin with each use</span></p>
                <p class="MsoNormal" style="margin-bottom: 0pt; margin-left: 13.5pt; text-indent: -18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: Arial; color: #0f1111; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Arial; mso-fareast-font-family: "Times New Roman"; color: #0f1111; font-size: 10.5000pt;">A cooling lather removes impurities and excess oil, leaving skin feeling refreshed and purified</span></p>
                <p class="MsoNormal" style="margin-bottom: 0pt; margin-left: 13.5pt; text-indent: -18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: Arial; color: #0f1111; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Arial; mso-fareast-font-family: "Times New Roman"; color: #0f1111; font-size: 10.5000pt;">Use daily for shine-free, visibly clearer results</span></p>
                <p class="MsoNormal" style="margin-bottom: 0pt; margin-left: 13.5pt; text-indent: -18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: Arial; color: #0f1111; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Arial; mso-fareast-font-family: "Times New Roman"; color: #0f1111; font-size: 10.5000pt;">Daily facial wash</span></p>
                <p class="MsoNormal" style="margin-bottom: 0pt; margin-left: 13.5pt; text-indent: -18pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: "Times New Roman"; mso-bidi-font-family: Arial; color: #0f1111; font-size: 10.0000pt;">&middot;&nbsp;</span><!--[endif]--><span style="mso-spacerun: "yes"; font-family: Arial; mso-fareast-font-family: "Times New Roman"; color: #0f1111; font-size: 10.5000pt;">Made with purifying tea tree oil from the foothills of Mount Kenya</span></p>',
                'thumbnail_image' => 'skin-7.png',
                'mrp' => '745',
                'final_price' => '700',
                'stock' => 10,
                'rating' => 3.7
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
                'sku' => struniq(),
                'rating' => $product['rating'],
            ]);
            try {
                File::copy(public_path('frontend/images/seeders/products_new/' . $product['thumbnail_image']), storage_path('app/public/images/products/thumbnails/' . $product['thumbnail_image']));
            } catch (\Throwable $th) {

                // Log::info($th);
                // Log::info("file" . $product['thumbnail']);
            }
        }
    }
}
