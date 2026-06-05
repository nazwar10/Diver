<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Featured projects for the work section
        $featuredProjects = collect([
            (object)[
                'id' => 1, 'title' => 'Meridian Hotels', 'slug' => 'meridian-hotels',
                'tagline' => 'Luxury redefined through digital craft',
                'year' => '2025', 'service' => 'Web Design', 'sector' => 'Hospitality',
                'thumbnail' => '/images/projects/meridian.jpg',
                'results_metric' => '67.6%', 'results_label' => 'increase in direct bookings',
            ],
            (object)[
                'id' => 2, 'title' => 'Volta Energy', 'slug' => 'volta-energy',
                'tagline' => 'Powering the future with bold identity',
                'year' => '2025', 'service' => 'Branding', 'sector' => 'Energy',
                'thumbnail' => '/images/projects/volta.jpg',
                'results_metric' => '70.8%', 'results_label' => 'brand recognition uplift',
            ],
            (object)[
                'id' => 3, 'title' => 'Aura Skincare', 'slug' => 'aura-skincare',
                'tagline' => 'Beauty meets conversion-first ecommerce',
                'year' => '2024', 'service' => 'Web Design', 'sector' => 'Beauty & Wellness',
                'thumbnail' => '/images/projects/aura.jpg',
                'results_metric' => '83.14%', 'results_label' => 'increase in online sales',
            ],
            (object)[
                'id' => 4, 'title' => 'Kinetic Sports', 'slug' => 'kinetic-sports',
                'tagline' => 'A brand that moves as fast as its athletes',
                'year' => '2024', 'service' => 'Digital Marketing', 'sector' => 'Sports & Fitness',
                'thumbnail' => '/images/projects/kinetic.jpg',
                'results_metric' => '104.9%', 'results_label' => 'growth in organic traffic',
            ],
            (object)[
                'id' => 5, 'title' => 'Craft & Co', 'slug' => 'craft-and-co',
                'tagline' => 'Artisanal spirits deserve an artisanal web presence',
                'year' => '2024', 'service' => 'Branding', 'sector' => 'Food & Drink',
                'thumbnail' => '/images/projects/craft.jpg',
                'results_metric' => '52.3%', 'results_label' => 'increase in engagement',
            ],
        ]);

        // Services data
        $services = collect([
            (object)[
                'title' => 'Web Design & Development',
                'slug' => 'web-design',
                'description' => 'We design and build bespoke websites that are beautiful, functional, and built to convert. From brand-led microsites to full-scale ecommerce platforms.',
                'sub_services' => ['UX/UI Design', 'WordPress', 'Shopify', 'Laravel', 'Headless CMS', 'Ecommerce'],
            ],
            (object)[
                'title' => 'Branding & Identity',
                'slug' => 'branding',
                'description' => 'Strategic brand development that gives your business a distinct voice, look, and feel. We create brands that resonate and endure.',
                'sub_services' => ['Brand Strategy', 'Visual Identity', 'Logo Design', 'Brand Guidelines', 'Tone of Voice', 'Packaging'],
            ],
            (object)[
                'title' => 'Digital Marketing',
                'slug' => 'digital-marketing',
                'description' => 'Data-driven marketing strategies that put your brand in front of the right people at the right time. SEO, PPC, content, and beyond.',
                'sub_services' => ['SEO', 'PPC', 'Content Strategy', 'Social Media', 'Email Marketing', 'Analytics'],
            ],
        ]);

        // Brand pillars
        $brandPillars = collect([
            (object)[
                'number' => '01', 'title' => 'Brand-Led Design',
                'description' => 'Every pixel is informed by strategy. We don\'t just make things look good—we make them work hard for your brand, ensuring consistency across every touchpoint.',
                'image' => '/images/pillars/brand-led.jpg',
            ],
            (object)[
                'number' => '02', 'title' => 'Strategic Thinking',
                'description' => 'We start with the why. Deep research, audience insights, and competitive analysis shape every decision, so nothing is left to chance.',
                'image' => '/images/pillars/strategic.jpg',
            ],
            (object)[
                'number' => '03', 'title' => 'Technical Excellence',
                'description' => 'Beautiful design means nothing without bulletproof execution. We build with clean code, modern frameworks, and performance-first architecture.',
                'image' => '/images/pillars/technical.jpg',
            ],
            (object)[
                'number' => '04', 'title' => 'Measurable Results',
                'description' => 'We\'re obsessed with outcomes. Every project is measured against clear KPIs, and we iterate relentlessly until the numbers tell the right story.',
                'image' => '/images/pillars/results.jpg',
            ],
        ]);

        // Project results for the dark section
        $projectResults = collect([
            (object)['metric' => '67.6', 'suffix' => '%', 'description' => 'increase in direct bookings for Meridian Hotels', 'project_slug' => 'meridian-hotels'],
            (object)['metric' => '70.8', 'suffix' => '%', 'description' => 'brand recognition uplift for Volta Energy', 'project_slug' => 'volta-energy'],
            (object)['metric' => '83.14', 'suffix' => '%', 'description' => 'increase in online sales for Aura Skincare', 'project_slug' => 'aura-skincare'],
            (object)['metric' => '104.9', 'suffix' => '%', 'description' => 'growth in organic traffic for Kinetic Sports', 'project_slug' => 'kinetic-sports'],
        ]);

        // Partners
        $partners = collect([
            'Stripe', 'Shopify', 'WordPress', 'Google', 'Meta', 'HubSpot',
            'Mailchimp', 'Figma', 'Webflow', 'Cloudflare', 'AWS', 'Vercel',
            'Notion', 'Slack', 'Semrush',
        ]);

        // Testimonials
        $testimonials = collect([
            (object)[
                'quote' => 'DIVER.ENT completely transformed our digital presence. The new website didn\'t just look incredible—it drove a 67% increase in direct bookings within three months.',
                'name' => 'Sarah Mitchell', 'role' => 'Marketing Director', 'company' => 'Meridian Hotels',
                'project_slug' => 'meridian-hotels',
            ],
            (object)[
                'quote' => 'Working with DIVER.ENT felt like having an extension of our own team. They truly understood our vision and translated it into a brand identity that exceeds everything we imagined.',
                'name' => 'James Chen', 'role' => 'CEO', 'company' => 'Volta Energy',
                'project_slug' => 'volta-energy',
            ],
            (object)[
                'quote' => 'The attention to detail is unmatched. Every interaction, every animation, every word—it all feels intentional. Our customers notice the difference and so does our bottom line.',
                'name' => 'Emma Rodriguez', 'role' => 'Founder', 'company' => 'Aura Skincare',
                'project_slug' => 'aura-skincare',
            ],
        ]);

        // Latest blog posts
        $latestPosts = collect([
            (object)[
                'id' => 1, 'title' => 'The Death of Generic Design: Why Bespoke is the Only Way Forward',
                'slug' => 'death-of-generic-design', 'category' => 'Design',
                'excerpt' => 'In an era of templates and AI-generated layouts, we explore why custom design isn\'t just a luxury—it\'s a competitive necessity.',
                'cover_image' => '/images/blog/generic-design.jpg',
                'published_at' => now()->subDays(3),
                'author' => (object)['name' => 'Alex Turner', 'avatar' => '/images/team/alex.jpg'],
            ],
            (object)[
                'id' => 2, 'title' => 'Conversion Rate Optimisation: Beyond the A/B Test',
                'slug' => 'cro-beyond-ab-test', 'category' => 'Strategy',
                'excerpt' => 'A/B testing is just the beginning. Discover the holistic approach to CRO that considers psychology, design, and data in equal measure.',
                'cover_image' => '/images/blog/cro.jpg',
                'published_at' => now()->subDays(7),
                'author' => (object)['name' => 'Priya Sharma', 'avatar' => '/images/team/priya.jpg'],
            ],
            (object)[
                'id' => 3, 'title' => 'Building Brands That Last: Lessons from a Decade in Digital',
                'slug' => 'brands-that-last', 'category' => 'Branding',
                'excerpt' => 'What separates enduring brands from fleeting trends? After 10 years of brand-building, here are the principles that never go out of style.',
                'cover_image' => '/images/blog/brands-last.jpg',
                'published_at' => now()->subDays(12),
                'author' => (object)['name' => 'Marcus Webb', 'avatar' => '/images/team/marcus.jpg'],
            ],
        ]);

        // FAQ items
        $faqItems = collect([
            (object)[
                'question' => 'How much does a website cost?',
                'answer' => 'Every project is unique, so we don\'t believe in one-size-fits-all pricing. Our web design projects typically range from £15,000 to £80,000+ depending on complexity, features, and scope. We\'ll provide a detailed proposal after our initial discovery call.',
            ],
            (object)[
                'question' => 'How long does a typical project take?',
                'answer' => 'Most website projects run between 8-16 weeks from kickoff to launch. Branding projects typically take 6-10 weeks. Complex ecommerce builds or multi-site platforms may take longer. We\'ll agree on a timeline during the proposal stage.',
            ],
            (object)[
                'question' => 'Do you work with startups or only established brands?',
                'answer' => 'We work with businesses at every stage—from ambitious startups looking to make their mark to established enterprises ready for a digital transformation. What matters most to us is your ambition and willingness to invest in doing things properly.',
            ],
            (object)[
                'question' => 'What happens after the website launches?',
                'answer' => 'Launch is just the beginning. We offer ongoing SiteCare plans that include hosting, security monitoring, performance optimisation, content updates, and strategic support. Think of us as your long-term digital partner.',
            ],
            (object)[
                'question' => 'Do you offer SEO and marketing services?',
                'answer' => 'Absolutely. Our digital marketing team works alongside our designers and developers to ensure your website isn\'t just beautiful—it\'s discoverable. We offer SEO, PPC, content strategy, social media management, and more.',
            ],
            (object)[
                'question' => 'What\'s your design process like?',
                'answer' => 'Our process is collaborative and transparent. We follow a proven framework: Discovery → Strategy → Design → Development → Testing → Launch. You\'ll have regular check-ins, access to our project portal, and opportunities for feedback at every stage.',
            ],
        ]);

        // Settings
        $settings = (object)[
            'site_name' => 'DIVER.ENT',
            'tagline' => 'Creative Digital Agency',
            'email' => 'hello@diver-ent.com',
            'phone' => '+44 (0) 20 7946 0958',
            'address' => '42 Shoreditch High Street, London, E1 6JJ',
        ];

        return view('pages.home', compact(
            'featuredProjects', 'services', 'brandPillars', 'projectResults',
            'partners', 'testimonials', 'latestPosts', 'faqItems', 'settings'
        ));
    }
}
