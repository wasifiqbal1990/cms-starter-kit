<?php

namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Seeder;

class RiseCmsSeeder extends Seeder
{
    protected $pages = [
         [
            'title' => 'HomePage',
            'slug' => 'homepage',
            'short_description' => 'asdasd',
            'description' => 'asdasasd',
            'extra' =>  [],
            'key'=> 'homepage',
             'sections' => [
                 [
                    'title' => 'main-slider',
                     'short_description' => 'Main slider of homepage',
                     'description' => '',
                     'page_id' => 1,
                     'hashtag' => 'slider',
                     'key' => 'main-slider',
                     'images' => [
                         [
                             'image' => '1.png',
                             'heading' => 'RISE SCHOOL OF ACCOUNTANCY',
                             'description' => 'which is globally recognized by the ICAP is making its ways by achieving medals and certificates. Signature Qualification that empowers to lead. Leader of the Future.',
                         ],
                     ]
                 ],
                 [
                     'title' => 'Rise School of Accountancy',
                     'short_description' => 'The acronym “RISE” stands for resurgence and intuition for strategic excellence.',
                     'description' => '',
                     'key' => 'second-section',
                 ],

                 [
                     'title' => 'About The RISE',
                     'short_description' => 'This is the mission we have set before us to revive an insight among the students so that they may procure thought-out luminosity and be above the rest.',
                     'description' => 'RISE SCHOOL OF ACCOUNTANCY was established in July, 2008 and is one of the leading institutions playing a pivotal role in the promotion of professional accountancy, commerce and business administration education in the country. We have highly competent experienced faculty and staff, state of the art facilities, Well furnished and spacious campuses with homely atmosphere conducive to learning and healthy competition.',
                     'page_id' => 1,
                     'key' => 'third-section',
                     'images' => [
                         [
                             'image' => '1.png',
                             'heading' => '',
                             'description' => '',
                         ],
                         [
                             'image' => '2.png',
                             'heading' => '',
                             'description' => '',
                         ],
                         [
                             'image' => '3.png',
                             'heading' => '',
                             'description' => '',
                         ],
                     ],
                 ],

                 [
                     'title' => 'Our Departments',
                     'short_description' => '',
                     'description' => '',
                     'key' => 'fourth-section',
                     'page_id' => 1,
                     'images' => [
                         [
                             'image' => '1.png',
                             'heading' => 'Quality Assurance',
                             'description' => 'Department of Quality Assurance Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                         ],
                         [
                             'image' => '2.png',
                             'heading' => 'Information Technology',
                             'description' => 'Department of Information Technology (IT) Lorem ipsum, or lipsum as it is sometimes known, is dummy text, graphic or web designs.',
                         ],
                         [
                             'image' => '3.png',
                             'heading' => 'Marketing',
                             'description' => 'Department of Marketing Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                         ],
                         [
                             'image' => '1.png',
                             'heading' => 'Human Resource (HR)',
                             'description' => 'Department of Human Resource (HR) Lorem ipsum, or lipsum as it is sometimes known, is dummy text, graphic or web designs.',
                         ],
                         [
                             'image' => '2.png',
                             'heading' => 'Coordination',
                             'description' => 'Department of Coordination Lorem ipsum, or lipsum as it is sometimes known, is dummy text, graphic or web designs.',
                         ],
                         [
                             'image' => '3.png',
                             'heading' => 'Admission',
                             'description' => 'Admission Office Lorem ipsum, or lipsum as it is sometimes known, is dummy text used, graphic or web designs.',
                         ],
                         [
                             'image' => '3.png',
                             'heading' => 'Online Classes',
                             'description' => 'Online Classes Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                         ],
                         [
                             'image' => '3.png',
                             'heading' => 'Admin',
                             'description' => 'Admin Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ',
                         ],
                     ],
                 ],
             ],
        ]
    ];



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addPages();
    }

    public function addPages()
    {
        foreach($this->pages as $page)
        {
            $sections = $page['sections'];
            unset($page['sections']);
            Pages::create($page);
            foreach($sections as $section)
            {

            }
        }
    }
}
