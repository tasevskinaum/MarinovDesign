<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $faqs = [
            [
                'question' => 'What types of antiques do you sell?',
                'answer' => 'We specialize in a variety of antiques, including furniture, jewelry, artwork, and collectibles.'
            ],
            [
                'question' => 'Do you offer appraisals for antiques?',
                'answer' => 'Yes, we provide professional appraisal services for antiques. Contact us to schedule an appointment.'
            ],
            [
                'question' => 'Are your antiques authentic and in good condition?',
                'answer' => 'Absolutely! We take pride in offering authentic antiques that are carefully curated and maintained in excellent condition.'
            ],
            [
                'question' => 'How often do you get new inventory?',
                'answer' => 'We regularly update our inventory with new and exciting antiques. Visit our store or check our website for the latest arrivals.'
            ],
            [
                'question' => 'Do you buy antiques from individuals?',
                'answer' => 'Yes, we are always interested in purchasing quality antiques. Feel free to bring your items to our store for evaluation.'
            ],
            [
                'question' => 'Can I place an order online?',
                'answer' => 'Certainly! You can browse our online catalog and place an order. We offer shipping services for your convenience.'
            ],
            [
                'question' => 'Do you provide restoration services for antiques?',
                'answer' => 'Yes, we have skilled craftsmen who can restore and repair antique items. Contact us for more details.'
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept various payment methods, including credit cards, cash, and online payments. Visit our store for more information.'
            ],
            [
                'question' => 'Can I rent antiques for special events?',
                'answer' => 'Absolutely! We offer antique rental services for special events such as weddings, parties, and photo shoots. Contact us to discuss your requirements.'
            ],
            [
                'question' => 'Do you organize antique-themed events or workshops?',
                'answer' => 'Yes, we occasionally host events and workshops related to antiques. Follow our social media pages for updates on upcoming activities.'
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
