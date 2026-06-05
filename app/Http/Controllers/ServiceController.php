<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private function getServicesData()
    {
        return collect([
            'web-design' => (object)[
                'title' => 'Web Design & Development',
                'slug' => 'web-design',
                'headline' => 'Websites that work as hard as they look.',
                'description' => 'We design and build bespoke websites that are beautiful, functional, and built to convert. Every site we create is strategically planned, meticulously designed, and expertly developed to deliver measurable results.',
                'sub_services' => collect([
                    (object)['name' => 'UX/UI Design', 'description' => 'User-centred design that balances beauty with usability. We create interfaces that guide, delight, and convert.'],
                    (object)['name' => 'WordPress Development', 'description' => 'Custom WordPress themes and plugins built with clean code and optimised for performance and security.'],
                    (object)['name' => 'Shopify Development', 'description' => 'Bespoke Shopify stores designed to maximise conversions and create seamless shopping experiences.'],
                    (object)['name' => 'Laravel Development', 'description' => 'Custom web applications built with Laravel for complex functionality and scalable architecture.'],
                    (object)['name' => 'Headless CMS', 'description' => 'Decoupled content management solutions that give you flexibility without sacrificing performance.'],
                    (object)['name' => 'Ecommerce', 'description' => 'Conversion-optimised online stores that turn browsers into buyers and buyers into advocates.'],
                ]),
                'approach' => 'Our web design process starts with strategy, not aesthetics. We immerse ourselves in your brand, audience, and objectives before a single pixel is placed. The result? Websites that don\'t just look stunning—they perform.',
                'view' => 'pages.services.web-design',
            ],
            'branding' => (object)[
                'title' => 'Branding & Identity',
                'slug' => 'branding',
                'headline' => 'Brands built to stand out, not fit in.',
                'description' => 'We create strategic brand identities that give businesses a distinct voice, look, and personality. From startups finding their feet to established brands ready for a refresh, we craft identities that resonate and endure.',
                'sub_services' => collect([
                    (object)['name' => 'Brand Strategy', 'description' => 'Deep-dive research and strategic positioning that defines who you are, what you stand for, and how you show up.'],
                    (object)['name' => 'Visual Identity', 'description' => 'Comprehensive visual systems including colour, typography, imagery, and design language.'],
                    (object)['name' => 'Logo Design', 'description' => 'Distinctive, memorable marks that capture your brand essence in its most distilled form.'],
                    (object)['name' => 'Brand Guidelines', 'description' => 'Detailed documentation that ensures consistency across every touchpoint and team.'],
                    (object)['name' => 'Tone of Voice', 'description' => 'Defining how your brand speaks—from website copy to social media to customer service.'],
                    (object)['name' => 'Packaging Design', 'description' => 'Physical brand expressions that create unboxing moments and shelf appeal.'],
                ]),
                'approach' => 'We don\'t do generic brand-in-a-box solutions. Every brand we create is rooted in deep research, shaped by strategic thinking, and brought to life with creative excellence.',
                'view' => 'pages.services.branding',
            ],
            'digital-marketing' => (object)[
                'title' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'headline' => 'Reach the right people at the right time.',
                'description' => 'Data-driven marketing strategies that put your brand in front of qualified audiences and turn attention into action. We combine creative thinking with analytical rigour to deliver campaigns that measurably grow your business.',
                'sub_services' => collect([
                    (object)['name' => 'SEO', 'description' => 'Technical and content-led SEO strategies that increase visibility, traffic, and organic revenue.'],
                    (object)['name' => 'PPC', 'description' => 'Precision-targeted paid campaigns across Google, Meta, and LinkedIn that maximise ROI.'],
                    (object)['name' => 'Content Strategy', 'description' => 'Strategic content planning and creation that positions your brand as a thought leader.'],
                    (object)['name' => 'Social Media', 'description' => 'Platform-specific strategies that build community, engagement, and brand advocacy.'],
                    (object)['name' => 'Email Marketing', 'description' => 'Automated email journeys and campaigns that nurture leads and drive retention.'],
                    (object)['name' => 'Analytics & Reporting', 'description' => 'Clear, actionable reporting that ties marketing activity to business outcomes.'],
                ]),
                'approach' => 'We don\'t do marketing for marketing\'s sake. Every campaign, every piece of content, every ad is tied to a clear business objective with measurable KPIs.',
                'view' => 'pages.services.digital-marketing',
            ],
        ]);
    }

    public function show($slug)
    {
        $services = $this->getServicesData();
        $service = $services->get($slug);

        if (!$service) {
            abort(404);
        }

        $relatedProjects = collect([
            (object)['id' => 1, 'title' => 'Meridian Hotels', 'slug' => 'meridian-hotels', 'tagline' => 'Luxury redefined through digital craft', 'service' => 'Web Design', 'thumbnail' => '/images/projects/meridian.jpg'],
            (object)['id' => 2, 'title' => 'Volta Energy', 'slug' => 'volta-energy', 'tagline' => 'Powering the future with bold identity', 'service' => 'Branding', 'thumbnail' => '/images/projects/volta.jpg'],
            (object)['id' => 3, 'title' => 'Aura Skincare', 'slug' => 'aura-skincare', 'tagline' => 'Beauty meets conversion-first ecommerce', 'service' => 'Web Design', 'thumbnail' => '/images/projects/aura.jpg'],
        ]);

        return view('pages.services.show', compact('service', 'relatedProjects'));
    }

    public function sitecare()
    {
        return view('pages.services.sitecare');
    }
}
