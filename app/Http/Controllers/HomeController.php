<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // Featured projects for the work section
        $featuredProjects = Project::query()
            ->with(['results', 'services', 'sectors'])
            ->published()
            ->featured()
            ->ordered()
            ->take(5)
            ->get()
            ->map(function (Project $project) {
                $result = $project->results->first();

                return (object) [
                    'id' => $project->id,
                    'title' => $project->title,
                    'slug' => $project->slug,
                    'tagline' => $project->tagline,
                    'year' => $project->year,
                    'service' => $project->service,
                    'sector' => $project->sector,
                    'thumbnail' => $project->thumbnail_path ?: '/images/projects/default.jpg',
                    'results_metric' => $result?->metric ?? '',
                    'results_label' => $result ? Str::lower($result->label) : '',
                ];
            });

        // Services data
        $services = collect([
            (object)[
                'title' => 'Social Media Management',
                'slug' => 'social-media',
                'description' => 'We curate, manage, and grow your brand\'s social presence. From compelling content creation to community engagement, we build loyal audiences that convert.',
                'sub_services' => ['Content Strategy', 'Community Management', 'Platform Growth', 'Influencer Outreach', 'Analytics'],
            ],
            (object)[
                'title' => 'Digital Ads',
                'slug' => 'digital-ads',
                'description' => 'Data-driven performance marketing campaigns. We optimize your ad spend across Google, Meta, and TikTok to deliver measurable ROI and high-quality leads.',
                'sub_services' => ['PPC Campaigns', 'Meta Ads', 'TikTok Ads', 'Retargeting', 'Conversion Optimization'],
            ],
            (object)[
                'title' => 'Commercial Photography',
                'slug' => 'commercial-photography',
                'description' => 'High-end visual storytelling for your brand. We capture stunning product, lifestyle, and corporate photography that elevates your brand\'s perceived value.',
                'sub_services' => ['Product Photography', 'Lifestyle Shoots', 'Corporate Portraits', 'Event Coverage', 'Retouching'],
            ],
            (object)[
                'title' => 'Commercial Videography',
                'slug' => 'commercial-videography',
                'description' => 'Cinematic video production that captivates and converts. From punchy social reels to premium brand films, we bring your story to life in motion.',
                'sub_services' => ['Brand Films', 'Social Reels', 'Product Promos', 'Documentary Style', 'Motion Graphics'],
            ],
        ]);

        // Brand pillars
        $brandPillars = collect([
            (object)[
                'number' => '01', 'title' => 'Brand-Led Design',
                'description' => 'Every pixel is informed by strategy. We don\'t just make things look goodâ€”we make them work hard for your brand, ensuring consistency across every touchpoint.',
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
        $projectResults = $featuredProjects
            ->filter(fn ($project) => filled($project->results_metric))
            ->take(4)
            ->map(function ($project) {
                preg_match('/^([0-9]+(?:\.[0-9]+)?)(.*)$/', $project->results_metric, $matches);

                return (object) [
                    'metric' => $matches[1] ?? '0',
                    'suffix' => trim($matches[2] ?? '') ?: '%',
                    'description' => trim($project->results_label . ' for ' . $project->title),
                    'project_slug' => $project->slug,
                ];
            })
            ->values();

        // Partners
        $partners = collect([
            'Stripe', 'Shopify', 'WordPress', 'Google', 'Meta', 'HubSpot',
            'Mailchimp', 'Figma', 'Webflow', 'Cloudflare', 'AWS', 'Vercel',
            'Notion', 'Slack', 'Semrush',
        ]);

        // Testimonials
        $testimonials = Testimonial::query()
            ->with('project')
            ->whereHas('project')
            ->featured()
            ->ordered()
            ->take(3)
            ->get()
            ->map(fn ($testimonial) => (object) [
                'quote' => $testimonial->quote,
                'name' => $testimonial->client_name,
                'role' => $testimonial->client_role,
                'company' => $testimonial->client_company,
                'project_slug' => $testimonial->project?->slug,
            ]);

        // Latest blog posts
        $latestPosts = collect([
            (object)[
                'id' => 1, 'title' => 'The Death of Generic Design: Why Bespoke is the Only Way Forward',
                'slug' => 'death-of-generic-design', 'category' => 'Design',
                'excerpt' => 'In an era of templates and AI-generated layouts, we explore why custom design isn\'t just a luxuryâ€”it\'s a competitive necessity.',
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
                'answer' => 'Every project is unique, so we don\'t believe in one-size-fits-all pricing. Our web design projects typically range from Â£15,000 to Â£80,000+ depending on complexity, features, and scope. We\'ll provide a detailed proposal after our initial discovery call.',
            ],
            (object)[
                'question' => 'How long does a typical project take?',
                'answer' => 'Most website projects run between 8-16 weeks from kickoff to launch. Branding projects typically take 6-10 weeks. Complex ecommerce builds or multi-site platforms may take longer. We\'ll agree on a timeline during the proposal stage.',
            ],
            (object)[
                'question' => 'Do you work with startups or only established brands?',
                'answer' => 'We work with businesses at every stageâ€”from ambitious startups looking to make their mark to established enterprises ready for a digital transformation. What matters most to us is your ambition and willingness to invest in doing things properly.',
            ],
            (object)[
                'question' => 'What happens after the website launches?',
                'answer' => 'Launch is just the beginning. We offer ongoing SiteCare plans that include hosting, security monitoring, performance optimisation, content updates, and strategic support. Think of us as your long-term digital partner.',
            ],
            (object)[
                'question' => 'Do you offer SEO and marketing services?',
                'answer' => 'Absolutely. Our digital marketing team works alongside our designers and developers to ensure your website isn\'t just beautifulâ€”it\'s discoverable. We offer SEO, PPC, content strategy, social media management, and more.',
            ],
            (object)[
                'question' => 'What\'s your design process like?',
                'answer' => 'Our process is collaborative and transparent. We follow a proven framework: Discovery â†’ Strategy â†’ Design â†’ Development â†’ Testing â†’ Launch. You\'ll have regular check-ins, access to our project portal, and opportunities for feedback at every stage.',
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
