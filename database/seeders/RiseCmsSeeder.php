<?php

namespace Database\Seeders;

use App\Models\Notices;
use App\Models\Pages;
use App\Models\Sections;
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
                             'image' => 'img/slider/main-slider/slide2.jpg',
                             'heading' => 'RISE SCHOOL OF ACCOUNTANCY',
                             'description' => 'which is globally recognized by the ICAP is making its ways by achieving medals and certificates. Signature Qualification that empowers to lead. Leader of the Future.',
                         ],
                     ]
                 ],
                 [
                     'title' => 'Rise School of Accountancy',
                     'short_description' => 'The acronym “RISE” stands for resurgence and intuition for strategic excellence.',
                     'description' => '',
                     'hashtag' => 'second',
                     'key' => 'second-section',
                 ],

                 [
                     'title' => 'About The RISE',
                     'short_description' => 'This is the mission we have set before us to revive an insight among the students so that they may procure thought-out luminosity and be above the rest.',
                     'description' => 'RISE SCHOOL OF ACCOUNTANCY was established in July, 2008 and is one of the leading institutions playing a pivotal role in the promotion of professional accountancy, commerce and business administration education in the country. We have highly competent experienced faculty and staff, state of the art facilities, Well furnished and spacious campuses with homely atmosphere conducive to learning and healthy competition.',
                     'page_id' => 1,
                     'key' => 'third-section',
                     'hashtag' => 'third',
                     'images' => [
                         [
                             'image' => 'img/slider/a.jpg',
                             'heading' => '',
                             'description' => '',
                         ],
                         [
                             'image' => 'img/slider/c.jpg',
                             'heading' => '',
                             'description' => '',
                         ],
                         [
                             'image' => 'img/slider/d.jpg',
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
                     'hashtag' => 'fourth',
                     'images' => [
                         [
                             'image' => 'img/department/1.jpg',
                             'heading' => 'Quality Assurance',
                             'description' => 'Department of Quality Assurance Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/2.jpg',
                             'heading' => 'Information Technology',
                             'description' => 'Department of Information Technology (IT) Lorem ipsum, or lipsum as it is sometimes known, is dummy text, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/3.jpg',
                             'heading' => 'Marketing',
                             'description' => 'Department of Marketing Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/4.jpg',
                             'heading' => 'Human Resource (HR)',
                             'description' => 'Department of Human Resource (HR) Lorem ipsum, or lipsum as it is sometimes known, is dummy text, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/5.jpg',
                             'heading' => 'Coordination',
                             'description' => 'Department of Coordination Lorem ipsum, or lipsum as it is sometimes known, is dummy text, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/5.jpg',
                             'heading' => 'Admission',
                             'description' => 'Admission Office Lorem ipsum, or lipsum as it is sometimes known, is dummy text used, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/6.jpg',
                             'heading' => 'Online Classes',
                             'description' => 'Online Classes Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                         ],
                         [
                             'image' => 'img/department/7.jpg',
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
        $this->addNoticeAndEvents();
    }

    public function addPages()
    {
        foreach($this->pages as $page)
        {
            $sections = $page['sections'];
            unset($page['sections']);
            $newPage = Pages::create($page);
            foreach($sections as $section)
            {
                $sectionInput = [
                    'title' => $section['title'],
                    'short_description' => $section['short_description'],
                    'description' => $section['description'],
                    'page_id' => $newPage->id,
                    'hashtag' => $section['hashtag'],
                    'order' => isset($section['order'])? $section['order']:1,
                    'extra' => [],
                ];
                $sectionCreated = Sections::create($sectionInput);

                $siteUrl = env('APP_URL');
                if(isset($section['images']))
                {
                    foreach ($section['images'] as $key=>$imageSection)
                    {
                        $sectionCreated->addMediaFromUrl(jsPath($imageSection['image']))->withCustomProperties(
                            [
                                'heading' => $imageSection['heading'],
                                'description' => $imageSection['description']
                            ]
                        )->toMediaCollection('images');
                    }
                }

            }
        }
    }

    public function addNoticeAndEvents()
    {
        $notices = [
            [
                'title' => 'New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 1,
            ],
            [
                'title' => 'New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 1,
            ],
            [
                'title' => 'New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 1,
            ],
            [
                'title' => 'New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 1,
            ],
            [
                'title' => 'New ACCA-CA/10+2 batch starts from "24th of June at 9:00 AM" at 6-Aurangzeb Block New Garden Town Lahore.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 1,
            ],
            [
                'title' => 'Lorem ipsum, or lipsum as.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 2,
            ],
            [
                'title' => 'Lorem ipsum, or lipsum as.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 2,
            ],
            [
                'title' => 'Lorem ipsum, or lipsum as.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 2,
            ],
            [
                'title' => 'Lorem ipsum, or lipsum as.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 2,
            ],
            [
                'title' => 'Lorem ipsum, or lipsum as.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 2,
            ],
            [
                'title' => 'Lorem ipsum, or lipsum as.',
                'description' => '',
                'short_description' => '',
                'url' => '',
                'status' => 1,
                'type' => 2,
            ],
        ];

        Notices::insert($notices);
    }
}
