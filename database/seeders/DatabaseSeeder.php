<?php

namespace Database\Seeders;

use App\Models\Award;
use App\Models\BlogPost;
use App\Models\BrandPillar;
use App\Models\ConsultationLead;
use App\Models\FaqItem;
use App\Models\IndustrySector;
use App\Models\NewsletterSubscriber;
use App\Models\Partner;
use App\Models\Project;
use App\Models\ProjectResult;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SubService;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Admin User ─────────────────────────────────────────────
        $admin = User::factory()->create([
            'name'  => 'DIVER.ENT Admin',
            'email' => 'admin@diverent.agency',
        ]);

        // ─── Services (3) ───────────────────────────────────────────
        $services = collect([
            [
                'slug'        => 'branding-identity',
                'name'        => 'Branding & Identity',
                'tagline'     => 'Forge brands that resonate and endure.',
                'description' => 'We build brand ecosystems from the ground up — strategy, visual identity, verbal identity, and brand guidelines — giving your business a distinct presence that connects emotionally with your audience and stands apart in the market.',
                'order'       => 1,
                'subs'        => [
                    ['name' => 'Brand Strategy', 'slug' => 'brand-strategy', 'description' => 'Market positioning, competitive analysis, and brand architecture that defines your unique place in the landscape.', 'order' => 1],
                    ['name' => 'Visual Identity', 'slug' => 'visual-identity', 'description' => 'Logo systems, color palettes, typography, and graphic language that make your brand instantly recognizable.', 'order' => 2],
                    ['name' => 'Verbal Identity', 'slug' => 'verbal-identity', 'description' => 'Tone of voice, messaging frameworks, and copywriting guidelines that ensure consistency across every touchpoint.', 'order' => 3],
                    ['name' => 'Brand Guidelines', 'slug' => 'brand-guidelines', 'description' => 'Comprehensive documentation that empowers your team and partners to represent your brand with precision.', 'order' => 4],
                ],
            ],
            [
                'slug'        => 'digital-experience',
                'name'        => 'Digital Experience',
                'tagline'     => 'Craft digital experiences that captivate and convert.',
                'description' => 'From responsive websites to immersive web applications, we design and develop digital products that delight users, drive engagement, and deliver measurable business outcomes through thoughtful UX and modern technology.',
                'order'       => 2,
                'subs'        => [
                    ['name' => 'UX/UI Design', 'slug' => 'ux-ui-design', 'description' => 'User research, wireframing, prototyping, and interface design focused on intuitive and delightful user journeys.', 'order' => 1],
                    ['name' => 'Web Development', 'slug' => 'web-development', 'description' => 'Full-stack development using modern frameworks, delivering fast, secure, and scalable web applications.', 'order' => 2],
                    ['name' => 'E-Commerce', 'slug' => 'e-commerce', 'description' => 'Custom online storefronts optimized for conversion, inventory management, and seamless checkout experiences.', 'order' => 3],
                ],
            ],
            [
                'slug'        => 'creative-content',
                'name'        => 'Creative Content',
                'tagline'     => 'Tell stories that move people to action.',
                'description' => 'We produce high-impact creative content — from cinematic video production and motion graphics to photography and social media campaigns — that amplifies your brand story, builds community, and drives results across every platform.',
                'order'       => 3,
                'subs'        => [
                    ['name' => 'Video Production', 'slug' => 'video-production', 'description' => 'End-to-end video creation including concept development, filming, editing, and post-production for commercials, brand films, and social content.', 'order' => 1],
                    ['name' => 'Motion Graphics', 'slug' => 'motion-graphics', 'description' => '2D and 3D animation, kinetic typography, and visual effects that bring ideas to life with movement and energy.', 'order' => 2],
                    ['name' => 'Social Media Strategy', 'slug' => 'social-media-strategy', 'description' => 'Platform-specific content strategies, calendar planning, community management, and performance analytics.', 'order' => 3],
                ],
            ],
        ]);

        $serviceModels = [];
        foreach ($services as $serviceData) {
            $subs = $serviceData['subs'];
            unset($serviceData['subs']);
            $service = Service::create($serviceData);
            $serviceModels[] = $service;

            foreach ($subs as $sub) {
                $sub['service_id'] = $service->id;
                SubService::create($sub);
            }
        }

        // ─── Industry Sectors (6) ───────────────────────────────────
        $sectors = collect([
            ['name' => 'Technology & SaaS', 'slug' => 'technology-saas', 'description' => 'Helping tech companies and SaaS platforms build brands that stand out in crowded digital markets.', 'order' => 1],
            ['name' => 'Fashion & Lifestyle', 'slug' => 'fashion-lifestyle', 'description' => 'Elevating fashion, beauty, and lifestyle brands through bold creative direction and compelling storytelling.', 'order' => 2],
            ['name' => 'Food & Beverage', 'slug' => 'food-beverage', 'description' => 'Crafting appetizing brand experiences for restaurants, CPG brands, and hospitality ventures.', 'order' => 3],
            ['name' => 'Real Estate & Property', 'slug' => 'real-estate-property', 'description' => 'Positioning real estate developments and property brands with premium visual narratives that sell.', 'order' => 4],
            ['name' => 'Healthcare & Wellness', 'slug' => 'healthcare-wellness', 'description' => 'Building trust and clarity for healthcare providers, wellness brands, and pharmaceutical companies.', 'order' => 5],
            ['name' => 'Finance & Fintech', 'slug' => 'finance-fintech', 'description' => 'Humanizing financial services through approachable design, clear communication, and digital innovation.', 'order' => 6],
        ]);

        $sectorModels = [];
        foreach ($sectors as $sector) {
            $sectorModels[] = IndustrySector::create($sector);
        }

        // ─── Projects (5 Featured) ─────────────────────────────────
        $projectsData = [
            [
                'slug'        => 'revive-app-rebrand',
                'title'       => 'Revive App Rebrand',
                'year'        => 2024,
                'tagline'     => 'Breathing new life into digital wellness.',
                'description' => 'Revive, a leading wellness and meditation app, came to DIVER.ENT to completely reimagine their brand identity and digital presence. The existing brand felt clinical and impersonal — a mismatch for a product centered on human wellbeing. We developed a warm, organic visual language anchored in flowing gradients and hand-drawn illustrations, paired with a conversational verbal identity. The new brand system extended across the app interface, marketing website, social media, and physical merchandise. The rebrand launched simultaneously across all channels, generating massive buzz in the wellness community.',
                'is_featured'  => true,
                'order'        => 1,
                'published_at' => now()->subDays(10),
                'services'     => [0, 1],
                'sectors'      => [0, 4],
                'results'      => [
                    ['percentage' => '340', 'direction' => 'increase', 'description' => 'App downloads in the first quarter post-launch', 'period' => 'Q1 2024', 'order' => 1],
                    ['percentage' => '89', 'direction' => 'increase', 'description' => 'Brand recall among target demographic', 'period' => '6 months', 'order' => 2],
                    ['percentage' => '52', 'direction' => 'decrease', 'description' => 'Customer acquisition cost through organic channels', 'period' => 'Year-over-year', 'order' => 3],
                ],
            ],
            [
                'slug'        => 'kopi-kenangan-campaign',
                'title'       => 'Kopi Kenangan – "Rasa Baru" Campaign',
                'year'        => 2024,
                'tagline'     => 'A new flavor of nostalgia.',
                'description' => 'Kopi Kenangan, Indonesia\'s fastest-growing coffee chain, partnered with DIVER.ENT to launch their new seasonal menu. We crafted an integrated campaign that blended nostalgia with modernity — combining cinematic video storytelling with a vibrant social-first content strategy. The hero film featured real customer stories intertwined with the brand\'s journey, shot across three cities in Java. A TikTok-first social strategy amplified the campaign with influencer collaborations and user-generated content challenges that went viral within the first 48 hours.',
                'is_featured'  => true,
                'order'        => 2,
                'published_at' => now()->subDays(20),
                'services'     => [2],
                'sectors'      => [2],
                'results'      => [
                    ['percentage' => '12', 'direction' => 'increase', 'description' => 'Sales revenue during campaign period', 'period' => '3 months', 'order' => 1],
                    ['percentage' => '2800', 'direction' => 'increase', 'description' => 'User-generated content pieces on TikTok', 'period' => '48 hours', 'order' => 2],
                    ['percentage' => '67', 'direction' => 'increase', 'description' => 'Social media engagement rate across platforms', 'period' => 'Campaign duration', 'order' => 3],
                ],
            ],
            [
                'slug'        => 'propnex-digital-platform',
                'title'       => 'PropNex Digital Platform',
                'year'        => 2023,
                'tagline'     => 'Redefining property discovery online.',
                'description' => 'PropNex, a major real estate developer, needed a digital platform that could showcase their premium developments with the sophistication their properties deserved. DIVER.ENT designed and developed a fully immersive property discovery platform featuring 3D virtual tours, interactive floor plans, and AI-powered recommendations. The UX was engineered to guide high-net-worth individuals through a curated journey from discovery to inquiry, reducing friction at every step. The platform integrated seamlessly with their CRM and sales pipeline.',
                'is_featured'  => true,
                'order'        => 3,
                'published_at' => now()->subDays(45),
                'services'     => [1],
                'sectors'      => [3],
                'results'      => [
                    ['percentage' => '215', 'direction' => 'increase', 'description' => 'Qualified lead generation from digital channels', 'period' => 'First 6 months', 'order' => 1],
                    ['percentage' => '78', 'direction' => 'increase', 'description' => 'Average time spent on property listings', 'period' => 'vs. previous site', 'order' => 2],
                    ['percentage' => '35', 'direction' => 'decrease', 'description' => 'Bounce rate on property detail pages', 'period' => 'vs. previous site', 'order' => 3],
                ],
            ],
            [
                'slug'        => 'finwise-brand-launch',
                'title'       => 'FinWise Brand Launch',
                'year'        => 2024,
                'tagline'     => 'Making finance feel human.',
                'description' => 'FinWise, a bold fintech startup disrupting personal finance in Southeast Asia, came to DIVER.ENT before they even had a name. We took them from zero to launch — naming, brand strategy, visual identity, product design, and a go-to-market campaign that positioned them as the antidote to cold, corporate banking. The brand identity uses vibrant colors and playful illustrations to demystify money management, while the app design prioritizes simplicity and financial literacy. Our launch campaign generated significant pre-registration numbers, setting records for fintech apps in the region.',
                'is_featured'  => true,
                'order'        => 4,
                'published_at' => now()->subDays(5),
                'services'     => [0, 1, 2],
                'sectors'      => [0, 5],
                'results'      => [
                    ['percentage' => '150000', 'direction' => 'increase', 'description' => 'Pre-registrations before official launch day', 'period' => '8 weeks', 'order' => 1],
                    ['percentage' => '92', 'direction' => 'increase', 'description' => 'Brand awareness in target market within 3 months', 'period' => '3 months', 'order' => 2],
                    ['percentage' => '4.8', 'direction' => 'increase', 'description' => 'Average App Store rating at launch', 'period' => 'Launch week', 'order' => 3],
                ],
            ],
            [
                'slug'        => 'threads-fashion-house',
                'title'       => 'Threads Fashion House – Digital Flagship',
                'year'        => 2023,
                'tagline'     => 'Where couture meets code.',
                'description' => 'Threads Fashion House, an avant-garde Indonesian fashion label, enlisted DIVER.ENT to create a digital flagship experience that matched the innovation of their physical runway shows. We built an immersive e-commerce platform with editorial-quality product storytelling, lookbook-style browsing, and a virtual try-on feature powered by AR technology. The design language drew from the brand\'s architectural influences — clean lines, dramatic negative space, and bold typography. Every interaction was choreographed to feel like walking through a curated gallery rather than shopping online.',
                'is_featured'  => true,
                'order'        => 5,
                'published_at' => now()->subDays(60),
                'services'     => [1, 2],
                'sectors'      => [1],
                'results'      => [
                    ['percentage' => '420', 'direction' => 'increase', 'description' => 'Online revenue in the first quarter post-launch', 'period' => 'Q4 2023', 'order' => 1],
                    ['percentage' => '3.2', 'direction' => 'increase', 'description' => 'Average order value compared to previous platform', 'period' => 'vs. old site', 'order' => 2],
                    ['percentage' => '41', 'direction' => 'decrease', 'description' => 'Cart abandonment rate', 'period' => 'vs. old site', 'order' => 3],
                ],
            ],
        ];

        foreach ($projectsData as $pData) {
            $serviceIndices = $pData['services'];
            $sectorIndices  = $pData['sectors'];
            $results        = $pData['results'];
            unset($pData['services'], $pData['sectors'], $pData['results']);

            $project = Project::create($pData);

            // Attach services
            foreach ($serviceIndices as $i) {
                $project->services()->attach($serviceModels[$i]->id);
            }

            // Attach sectors
            foreach ($sectorIndices as $i) {
                $project->sectors()->attach($sectorModels[$i]->id);
            }

            // Create results
            foreach ($results as $result) {
                $result['project_id'] = $project->id;
                ProjectResult::create($result);
            }
        }

        // ─── Brand Pillars (4) ──────────────────────────────────────
        $pillars = [
            [
                'number'      => 1,
                'title'       => 'Divergent Thinking',
                'description' => 'We reject the obvious. Every project begins with questioning assumptions and exploring unconventional angles. Our creative process is designed to surface ideas that others overlook — because the most powerful solutions live at the intersection of unexpected disciplines. We draw inspiration from art, architecture, technology, and culture to create work that feels genuinely original.',
                'order'       => 1,
            ],
            [
                'number'      => 2,
                'title'       => 'Strategic Depth',
                'description' => 'Beautiful design without strategy is decoration. Every pixel, word, and interaction we create is backed by rigorous research, data analysis, and strategic thinking. We immerse ourselves in your industry, your competitors, and your customers to ensure that our creative decisions drive real business outcomes — not just applause from other designers.',
                'order'       => 2,
            ],
            [
                'number'      => 3,
                'title'       => 'Relentless Craft',
                'description' => 'Details are not details — they make the design. We obsess over typography, color theory, motion curves, code quality, and every micro-interaction because we know that excellence lives in the nuances. Our team holds each other to the highest standards of craft, treating every deliverable as a portfolio piece worthy of pride.',
                'order'       => 3,
            ],
            [
                'number'      => 4,
                'title'       => 'Collaborative Partnership',
                'description' => 'We do not work for clients — we work with them. Our best results come from deep, transparent partnerships where ideas flow freely in both directions. We embed ourselves in your team, share our thinking openly, and treat your business challenges as our own. This collaborative spirit extends within our studio, where designers, developers, and strategists work side-by-side from day one.',
                'order'       => 4,
            ],
        ];

        foreach ($pillars as $pillar) {
            BrandPillar::create($pillar);
        }

        // ─── Testimonials (6) ───────────────────────────────────────
        $projects = Project::all();
        $testimonials = [
            [
                'project_id'     => $projects[0]->id,
                'client_name'    => 'Sarah Chen',
                'client_role'    => 'Chief Marketing Officer',
                'client_company' => 'Revive Wellness',
                'quote'          => 'Working with DIVER.ENT was a transformative experience for our entire organization. They did not just redesign our logo — they fundamentally reimagined what our brand could be. The team spent weeks immersing themselves in the wellness space, interviewing our users, and challenging our assumptions about who we were as a company. The result was a brand identity that felt both fresh and deeply authentic. Our app downloads tripled in the first quarter, but more importantly, our team finally felt proud to represent the brand. The DIVER.ENT crew became genuine partners in our growth, and I would recommend them without a single hesitation.',
                'is_featured'    => true,
                'order'          => 1,
            ],
            [
                'project_id'     => $projects[1]->id,
                'client_name'    => 'Rizky Ananda',
                'client_role'    => 'VP of Brand',
                'client_company' => 'Kopi Kenangan',
                'quote'          => 'DIVER.ENT understood our brand DNA in a way that felt almost intuitive. When we briefed them on the "Rasa Baru" campaign, they came back with a concept that made us emotional — genuinely emotional. The hero film they produced captured the spirit of nostalgia and new beginnings that defines our brand perfectly. But what truly set them apart was their execution across social media. They did not just create beautiful content and walk away; they built an entire engagement ecosystem that turned our customers into storytellers. The campaign went viral on TikTok within two days. Working with their team felt less like hiring an agency and more like gaining a creative extension of our own marketing department.',
                'is_featured'    => true,
                'order'          => 2,
            ],
            [
                'project_id'     => $projects[2]->id,
                'client_name'    => 'David Hartono',
                'client_role'    => 'Director of Digital Innovation',
                'client_company' => 'PropNex Development',
                'quote'          => 'We had previously worked with three different agencies on our digital platform, and none of them could crack the code of making luxury real estate feel immersive online. DIVER.ENT approached the challenge completely differently. Instead of starting with technology, they started with the buyer journey — mapping every emotional touchpoint from initial curiosity to confident inquiry. The platform they built does not just display properties; it tells the story of each development in a way that makes you feel like you are already living there. Our lead generation from digital channels increased by over 200 percent, and our sales team consistently tells us that the quality of leads has improved dramatically. The DIVER.ENT team was meticulous, responsive, and genuinely invested in our success.',
                'is_featured'    => true,
                'order'          => 3,
            ],
            [
                'project_id'     => $projects[3]->id,
                'client_name'    => 'Amanda Wijaya',
                'client_role'    => 'Co-Founder & CEO',
                'client_company' => 'FinWise',
                'quote'          => 'DIVER.ENT did not just build our brand — they helped us discover who we were. When we first approached them, we were a group of finance nerds with a great product but zero identity. They guided us through a naming process that was both rigorous and creative, ultimately landing on "FinWise" — a name that perfectly captures our mission of making financial wisdom accessible. From there, they built a visual and verbal identity that challenged every fintech cliché. No blue gradients, no stock photos of people shaking hands. Instead, they created a playful, vibrant world that made money management feel approachable and even fun. The launch campaign they orchestrated generated 150,000 pre-registrations, shattering every benchmark our investors had set. I cannot imagine building this company without the DIVER.ENT team by our side.',
                'is_featured'    => true,
                'order'          => 4,
            ],
            [
                'project_id'     => $projects[4]->id,
                'client_name'    => 'Indira Kusuma',
                'client_role'    => 'Creative Director',
                'client_company' => 'Threads Fashion House',
                'quote'          => 'As a fashion house, we are extremely protective of our aesthetic and brand integrity. Finding a digital partner who could translate our runway vision into an online experience without diluting it felt impossible — until we met DIVER.ENT. Their team demonstrated an extraordinary sensitivity to our design language from the very first meeting. They studied our collections, attended our shows, and even visited our atelier before presenting a single concept. The e-commerce platform they created is not just a store; it is a digital extension of our brand universe. The virtual try-on feature and editorial storytelling have redefined how our customers interact with our pieces. Online revenue quadrupled in the first quarter, and industry publications have praised the platform as a benchmark for luxury fashion e-commerce. DIVER.ENT sets the gold standard for creative partnership.',
                'is_featured'    => true,
                'order'          => 5,
            ],
            [
                'project_id'     => null,
                'client_name'    => 'Marcus Tan',
                'client_role'    => 'Head of Marketing',
                'client_company' => 'NovaTech Solutions',
                'quote'          => 'We engaged DIVER.ENT for a comprehensive rebrand and website redesign, and the experience exceeded every expectation. What struck us most was their strategic rigor — before touching a single design tool, they conducted extensive market research, competitor analysis, and customer interviews that revealed insights our own marketing team had missed. They challenged our brief in the best possible way, pushing us toward a positioning that was far bolder and more differentiated than what we had originally envisioned. The execution was flawless, delivered on time and within budget. Six months post-launch, our brand is unrecognizable in the best way — we are winning pitches we never would have been invited to before, and our employee Net Promoter Score has skyrocketed because the team finally feels proud of how we present ourselves to the world.',
                'is_featured'    => true,
                'order'          => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }

        // ─── Partners (15) ──────────────────────────────────────────
        $partnerNames = [
            'Google Indonesia', 'Tokopedia', 'GoTo Group', 'Bank Mandiri', 'Telkomsel',
            'Grab Indonesia', 'Shopee', 'Traveloka', 'Bukalapak', 'OVO',
            'Blibli', 'Kompas Gramedia', 'Astra International', 'Sinar Mas', 'Indofood',
        ];

        foreach ($partnerNames as $i => $name) {
            Partner::create([
                'name'      => $name,
                'order'     => $i + 1,
                'is_active' => true,
            ]);
        }

        // ─── Blog Posts (6) ─────────────────────────────────────────
        $blogPosts = [
            [
                'author_id'        => $admin->id,
                'title'            => 'The Death of Safe Branding: Why Playing It Safe Is the Riskiest Move',
                'slug'             => 'death-of-safe-branding',
                'excerpt'          => 'In a market saturated with sameness, the brands that play it safe are the ones that disappear. Here is why bold, divergent branding is the only real strategy left.',
                'content'          => '<p>Every year, dozens of brands launch with the same sans-serif wordmark, the same muted color palette, and the same vaguely inspirational tagline. And every year, most of them fail to make any lasting impression.</p><p>The era of safe branding is over. In a market where consumers are bombarded with thousands of brand messages daily, the only way to survive is to be unapologetically distinct.</p><p>At DIVER.ENT, we have seen firsthand how brands that embrace bold creative choices consistently outperform their "safe" competitors. The data is clear: distinctive brand assets — unusual color combinations, unexpected typography, provocative messaging — drive significantly higher recall and preference.</p><p>This does not mean being random or shocking for its own sake. True brand boldness is strategic. It requires deep understanding of your audience, your competitive landscape, and your own authentic story. The goal is not to be different for the sake of being different, but to be meaningfully different in a way that creates genuine connection.</p><p>The brands we admire most — the ones that have become cultural touchstones — all took risks that seemed unreasonable at the time. They chose personality over polish, conviction over consensus. And they were rewarded with something no amount of safe design can buy: memorability.</p>',
                'category'         => 'Expertise',
                'tags'             => json_encode(['branding', 'strategy', 'creative-direction']),
                'is_published'     => true,
                'published_at'     => now()->subDays(5),
                'read_time_minutes' => 6,
                'view_count'       => 1243,
            ],
            [
                'author_id'        => $admin->id,
                'title'            => 'Behind the Scenes: How We Built the PropNex Immersive Platform',
                'slug'             => 'behind-scenes-propnex-platform',
                'excerpt'          => 'A deep dive into the UX decisions, technical architecture, and creative process behind our award-winning real estate platform.',
                'content'          => '<p>When PropNex approached us with the challenge of creating a digital platform for luxury real estate, we knew the standard approach would not work. Property listings with static photos and bullet-point features are a commodity. We needed to create something that made people feel.</p><p>The project began with three weeks of intensive research. We interviewed property buyers, real estate agents, and interior designers. We studied the psychology of high-value purchasing decisions. We analyzed competitors across industries — not just real estate, but luxury hospitality, automotive, and art galleries.</p><p>Our key insight was that luxury property buyers do not make decisions based on square footage and amenities. They make decisions based on how a space makes them feel. Everything in our design was engineered to evoke that emotional response — from the cinematic transitions between sections to the ambient soundscapes that accompany virtual tours.</p><p>On the technical side, we built the platform on a headless architecture that allowed us to deliver blazing-fast performance while maintaining the rich, immersive experience our design demanded. The 3D virtual tours were optimized to load progressively, ensuring smooth performance even on mobile networks.</p><p>The result speaks for itself: a 215% increase in qualified leads and a platform that has been featured in design publications worldwide.</p>',
                'category'         => 'Our Work',
                'tags'             => json_encode(['case-study', 'web-development', 'ux-design', 'real-estate']),
                'is_published'     => true,
                'published_at'     => now()->subDays(12),
                'read_time_minutes' => 8,
                'view_count'       => 876,
            ],
            [
                'author_id'        => $admin->id,
                'title'            => 'Why Every Brand Needs a Motion Language in 2024',
                'slug'             => 'brand-motion-language-2024',
                'excerpt'          => 'Static brands are dead. Here is how a defined motion language can elevate your brand experience across every digital touchpoint.',
                'content'          => '<p>Motion is no longer a nice-to-have in brand design — it is essential. In a world where digital interactions dominate, the way your brand moves is just as important as how it looks.</p><p>A brand motion language is a defined set of principles governing how elements animate, transition, and respond across your digital ecosystem. It includes timing curves, easing functions, choreography patterns, and interaction behaviors that create a cohesive kinetic identity.</p><p>Think about the brands you interact with daily. The ones that feel premium, polished, and alive all share one thing in common: intentional motion design. Apple\'s fluid transitions, Stripe\'s elegant micro-interactions, Airbnb\'s playful loading states — these are not accidents. They are carefully designed expressions of each brand\'s personality.</p><p>At DIVER.ENT, we now include motion language development in every branding project. We define how elements enter and exit the screen, how buttons respond to interaction, how page transitions communicate spatial relationships, and how loading states maintain engagement. This motion vocabulary becomes part of the brand guidelines, ensuring consistency whether the brand appears on a website, mobile app, or digital advertisement.</p><p>The impact is measurable. Brands with intentional motion design consistently see higher engagement rates, longer session durations, and improved perceived quality scores.</p>',
                'category'         => 'Expertise',
                'tags'             => json_encode(['motion-design', 'branding', 'digital-experience']),
                'is_published'     => true,
                'published_at'     => now()->subDays(20),
                'read_time_minutes' => 5,
                'view_count'       => 654,
            ],
            [
                'author_id'        => $admin->id,
                'title'            => 'Studio Culture: How We Stay Creative Under Pressure',
                'slug'             => 'studio-culture-creativity-under-pressure',
                'excerpt'          => 'A look inside DIVER.ENT\'s studio rituals, creative processes, and the intentional culture decisions that keep our team sharp.',
                'content'          => '<p>Creativity is not a talent you either have or you do not. It is a muscle that requires the right conditions to thrive. At DIVER.ENT, we have spent years refining the rituals, spaces, and processes that keep our team producing their best work — even when deadlines are tight and stakes are high.</p><p>Every Monday begins with "Diverge Hour" — a studio-wide session where the entire team shares something that inspired them over the weekend. It might be an architecture exhibition, a new album, a street art discovery, or an unusual cooking technique. The only rule is that it cannot be from our industry. This practice keeps our creative references fresh and prevents the echo chamber effect that plagues many design studios.</p><p>We also practice "Creative Sprints" — intensive 48-hour periods where small cross-functional teams tackle a single challenge from brief to concept. No emails, no meetings, no distractions. Just focused creative energy directed at solving a problem in a way that has never been done before.</p><p>Our physical studio is designed to support different modes of work: quiet focus zones, collaborative workshop spaces, and a "chaos room" filled with art supplies, magazines, and prototyping materials where ideas can get messy before they get polished.</p><p>The result is a team that consistently delivers breakthrough creative work without burning out. Because we believe that sustainable creativity — not heroic late nights — is what produces truly great work.</p>',
                'category'         => 'Culture',
                'tags'             => json_encode(['studio-life', 'creativity', 'team-culture']),
                'is_published'     => true,
                'published_at'     => now()->subDays(30),
                'read_time_minutes' => 7,
                'view_count'       => 1087,
            ],
            [
                'author_id'        => $admin->id,
                'title'            => '5 Indonesian Brands Redefining Visual Identity in Southeast Asia',
                'slug'             => 'indonesian-brands-redefining-visual-identity',
                'excerpt'          => 'From Jakarta to Bali, these homegrown brands are proving that world-class design does not require a London or New York address.',
                'content'          => '<p>There is a creative revolution happening in Indonesia, and it is rewriting the rules of brand design in Southeast Asia. A new generation of Indonesian brands is emerging with visual identities that rival — and often surpass — their global counterparts.</p><p>These brands share a few things in common: they draw deeply from Indonesian cultural heritage while speaking a universally modern design language. They are not copying Western trends; they are creating their own.</p><p>From Kopi Kenangan\'s playful illustration-driven identity to Sociolla\'s sophisticated beauty platform, these brands demonstrate that Indonesian design has a distinct voice. They embrace local typography traditions, batik-inspired patterns, and the vibrant color palettes of Indonesian nature — but always through a contemporary lens.</p><p>What makes these brands particularly exciting is their willingness to invest in design as a strategic asset, not just an aesthetic afterthought. They understand that in an increasingly visual marketplace, the quality of your brand design directly impacts your ability to command premium pricing, attract talent, and build lasting customer loyalty.</p><p>At DIVER.ENT, we are proud to be part of this movement. We believe that the next decade of global brand design will be heavily influenced by the creativity emerging from Indonesia and the broader Southeast Asian region.</p>',
                'category'         => 'Inspiration',
                'tags'             => json_encode(['indonesian-design', 'visual-identity', 'southeast-asia']),
                'is_published'     => true,
                'published_at'     => now()->subDays(40),
                'read_time_minutes' => 6,
                'view_count'       => 2341,
            ],
            [
                'author_id'        => $admin->id,
                'title'            => 'From Brief to Launch: Our Process for Building Brands That Last',
                'slug'             => 'brief-to-launch-branding-process',
                'excerpt'          => 'An honest look at the five-phase process DIVER.ENT uses to create brand identities, from initial discovery to market launch.',
                'content'          => '<p>Over the past several years, DIVER.ENT has developed a proven five-phase branding process that consistently delivers results for our clients. Here is an honest look at how it works — including the messy parts most agencies do not talk about.</p><p><strong>Phase 1: Immersion.</strong> Before we touch a single design tool, we spend two to three weeks immersing ourselves in your world. This means stakeholder interviews, competitive audits, customer research, market analysis, and trend mapping. We want to understand not just what your brand is, but what it could become.</p><p><strong>Phase 2: Strategy.</strong> Armed with research insights, we develop your brand strategy — including positioning, audience personas, brand architecture, and key messaging pillars. This is the foundation everything else is built on, and we do not move forward until it is rock solid.</p><p><strong>Phase 3: Creative Exploration.</strong> This is where the magic happens. Our design team generates multiple creative directions, each exploring different visual and verbal territories. We present three to four distinct concepts, each backed by strategic rationale. This phase is intentionally expansive — we want to explore the edges before finding the center.</p><p><strong>Phase 4: Refinement.</strong> Once a direction is chosen, we obsess over every detail. Typography pairings, color ratios, grid systems, photography style, icon sets, motion principles — every element is refined until it sings in harmony. This phase typically involves three rounds of refinement, with collaborative feedback loops throughout.</p><p><strong>Phase 5: Activation.</strong> A brand is only as strong as its implementation. We deliver comprehensive brand guidelines, asset libraries, templates, and — when needed — design system components that ensure your brand is deployed consistently across every touchpoint. We also offer a launch support retainer to help your team through the critical first months of brand rollout.</p>',
                'category'         => 'Expertise',
                'tags'             => json_encode(['process', 'branding', 'methodology']),
                'is_published'     => true,
                'published_at'     => now()->subDays(55),
                'read_time_minutes' => 9,
                'view_count'       => 1562,
            ],
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }

        // ─── Team Members (13) ──────────────────────────────────────
        $teamMembers = [
            ['name' => 'Adi Nugroho', 'role' => 'Founder & Creative Director', 'bio' => 'Adi founded DIVER.ENT with a mission to prove that world-class creative work can originate from anywhere. With over 15 years of experience spanning advertising, branding, and digital design across Jakarta, Singapore, and London, he leads the studio\'s creative vision and ensures every project meets the highest standards of craft and strategic thinking.', 'order' => 1],
            ['name' => 'Maya Putri', 'role' => 'Head of Strategy', 'bio' => 'Maya brings a rare combination of analytical rigor and creative intuition to every brand challenge. She leads the strategy team with a background in management consulting and brand planning, ensuring that every creative decision is rooted in deep market understanding and clear business objectives.', 'order' => 2],
            ['name' => 'Reza Firmansyah', 'role' => 'Design Director', 'bio' => 'Reza oversees the visual output of the entire studio, bringing an obsessive eye for detail and a deep understanding of typography, layout, and visual systems. His work has been recognized by D&AD, the Webby Awards, and Communication Arts. He mentors junior designers and drives the studio\'s commitment to craft excellence.', 'order' => 3],
            ['name' => 'Siti Rahma', 'role' => 'Head of Digital', 'bio' => 'Siti leads the digital team with expertise in UX strategy, product design, and front-end development. She bridges the gap between design and engineering, ensuring that digital experiences are not only beautiful but also performant, accessible, and technically sound.', 'order' => 4],
            ['name' => 'Budi Santoso', 'role' => 'Senior Brand Designer', 'bio' => 'Budi is a visual identity specialist with a passion for logo design, brand systems, and packaging. His methodical approach to brand design ensures that every identity system is both visually striking and functionally robust across all applications.', 'order' => 5],
            ['name' => 'Dina Maharani', 'role' => 'Content Strategist', 'bio' => 'Dina crafts the words that bring brands to life. From naming and taglines to comprehensive messaging frameworks, she develops verbal identities that resonate with audiences and maintain consistency across every touchpoint and channel.', 'order' => 6],
            ['name' => 'Fajar Wicaksono', 'role' => 'Motion Designer', 'bio' => 'Fajar brings brands to life through movement. His expertise in animation, motion graphics, and video post-production adds a dynamic dimension to every project, creating brand experiences that feel alive and engaging across digital platforms.', 'order' => 7],
            ['name' => 'Gita Permata', 'role' => 'UX Designer', 'bio' => 'Gita is passionate about designing experiences that feel effortless. She leads user research initiatives, creates wireframes and prototypes, and conducts usability testing to ensure that every digital product the studio delivers truly serves its users.', 'order' => 8],
            ['name' => 'Hendra Kusuma', 'role' => 'Full-Stack Developer', 'bio' => 'Hendra is the engineering backbone of the digital team. With expertise in Laravel, React, and modern web technologies, he builds the performant, scalable platforms that bring the design team\'s most ambitious visions to life.', 'order' => 9],
            ['name' => 'Intan Sari', 'role' => 'Project Manager', 'bio' => 'Intan keeps the studio running like clockwork. She manages timelines, budgets, and client communications with precision and warmth, ensuring that every project is delivered on time, within budget, and beyond expectations.', 'order' => 10],
            ['name' => 'Joko Prasetyo', 'role' => 'Video Producer', 'bio' => 'Joko oversees all video production from concept through post-production. With a background in documentary filmmaking and commercial production, he brings cinematic quality and compelling storytelling to every video project.', 'order' => 11],
            ['name' => 'Kartika Dewi', 'role' => 'Social Media Manager', 'bio' => 'Kartika develops and executes social media strategies that build communities and drive engagement. She stays ahead of platform trends and creates content calendars that keep brands relevant and resonant across Instagram, TikTok, LinkedIn, and beyond.', 'order' => 12],
            ['name' => 'Lukman Hakim', 'role' => 'Junior Designer', 'bio' => 'Lukman is the newest addition to the design team, bringing fresh perspectives and boundless energy. A recent graduate with a sharp eye for emerging design trends, he supports senior designers across branding and digital projects while developing his own creative voice.', 'order' => 13],
        ];

        foreach ($teamMembers as $member) {
            $member['is_active'] = true;
            TeamMember::create($member);
        }

        // ─── Awards (5) ─────────────────────────────────────────────
        $awards = [
            ['name' => 'Webby Awards', 'achievement' => 'Best Visual Design — Aesthetic', 'year' => 2024, 'order' => 1],
            ['name' => 'D&AD', 'achievement' => 'Wood Pencil — Digital Design', 'year' => 2024, 'order' => 2],
            ['name' => 'CSS Design Awards', 'achievement' => 'Site of the Day — PropNex Platform', 'year' => 2023, 'order' => 3],
            ['name' => 'Awwwards', 'achievement' => 'Honorable Mention — Threads Digital Flagship', 'year' => 2023, 'order' => 4],
            ['name' => 'ADFEST', 'achievement' => 'Gold Lotus — Integrated Campaign', 'year' => 2024, 'order' => 5],
        ];

        foreach ($awards as $award) {
            Award::create($award);
        }

        // ─── FAQ Items (6) ──────────────────────────────────────────
        $faqs = [
            [
                'question'     => 'What does a typical project engagement look like with DIVER.ENT?',
                'answer'       => 'Every engagement begins with a discovery call where we learn about your business, goals, and challenges. From there, we develop a tailored proposal outlining scope, timeline, and investment. Once aligned, we kick off with an immersion phase — research, stakeholder interviews, and competitive analysis — before moving into strategy, creative development, and refinement. Most branding projects span 8 to 12 weeks, while digital projects range from 10 to 16 weeks depending on complexity. Throughout the process, you will have regular check-ins, collaborative workshops, and full transparency into our progress.',
                'page_context' => 'general',
                'order'        => 1,
            ],
            [
                'question'     => 'What is the typical investment range for your services?',
                'answer'       => 'Our projects typically range from IDR 50 million to IDR 500 million depending on scope and complexity. A focused brand identity project starts around IDR 75 million, comprehensive branding with digital design starts around IDR 150 million, and full-scale digital platform projects with custom development begin around IDR 200 million. We provide detailed proposals with transparent pricing after our initial discovery conversation, so there are never any surprises. We also offer phased engagement options for startups and growing businesses.',
                'page_context' => 'general',
                'order'        => 2,
            ],
            [
                'question'     => 'Do you work with startups and early-stage companies?',
                'answer'       => 'Absolutely. Some of our most rewarding work has been with startups building their brands from scratch. We offer tailored packages for early-stage companies that deliver strategic, high-quality brand foundations without the overhead of a full enterprise engagement. We understand the startup reality — tight budgets, fast timelines, and evolving strategies — and we have designed our process to be agile enough to accommodate that while still maintaining the quality standards we are known for.',
                'page_context' => 'general',
                'order'        => 3,
            ],
            [
                'question'     => 'Can you work with our existing brand guidelines, or do you only do full rebrands?',
                'answer'       => 'We are equally comfortable working within existing brand systems or creating new ones from scratch. Many of our clients come to us for specific projects — a new website, a campaign, or a product launch — where we need to work within established guidelines. In these cases, we respect and extend your existing brand language while bringing our creative perspective to push the work further. If we identify opportunities to strengthen the brand during the process, we will share those recommendations transparently.',
                'page_context' => 'services',
                'order'        => 4,
            ],
            [
                'question'     => 'What industries do you specialize in?',
                'answer'       => 'We have deep experience across technology, fashion, food and beverage, real estate, healthcare, and financial services. However, we intentionally work across diverse industries because we believe that cross-pollination of ideas leads to more innovative solutions. Some of our best work has come from applying insights from one industry to challenges in another. What matters most to us is not the industry but the ambition — we work best with clients who are genuinely committed to building something exceptional.',
                'page_context' => 'general',
                'order'        => 5,
            ],
            [
                'question'     => 'How do you measure the success of your creative work?',
                'answer'       => 'We believe that great creative work must deliver measurable business results. At the start of every project, we work with you to define clear success metrics — whether that is brand awareness lift, website conversion rates, app downloads, social engagement, or revenue impact. We build measurement frameworks into our strategy and provide post-launch reporting to track performance against those goals. We also track qualitative indicators like brand sentiment, press coverage, and industry recognition. Our case studies include real performance data because we stand behind the results our work delivers.',
                'page_context' => 'general',
                'order'        => 6,
            ],
        ];

        foreach ($faqs as $faq) {
            $faq['is_active'] = true;
            FaqItem::create($faq);
        }

        // ─── Settings ───────────────────────────────────────────────
        $settings = [
            // Announcement bar
            ['key' => 'announcement_bar_enabled', 'value' => 'true', 'type' => 'boolean', 'group' => 'announcement'],
            ['key' => 'announcement_bar_text', 'value' => 'Now accepting projects for Q3 2024 — Limited availability. Book your discovery call today.', 'type' => 'string', 'group' => 'announcement'],
            ['key' => 'announcement_bar_link', 'value' => '/contact', 'type' => 'string', 'group' => 'announcement'],
            ['key' => 'announcement_bar_link_text', 'value' => 'Get in touch', 'type' => 'string', 'group' => 'announcement'],

            // Hero text
            ['key' => 'hero_headline', 'value' => 'We create brands that diverge from the ordinary.', 'type' => 'string', 'group' => 'hero'],
            ['key' => 'hero_subheadline', 'value' => 'DIVER.ENT is a creative agency specializing in branding, digital experience, and creative content for ambitious companies across Southeast Asia.', 'type' => 'string', 'group' => 'hero'],
            ['key' => 'hero_cta_text', 'value' => 'Start a Project', 'type' => 'string', 'group' => 'hero'],
            ['key' => 'hero_cta_link', 'value' => '/contact', 'type' => 'string', 'group' => 'hero'],

            // Contact info
            ['key' => 'contact_email', 'value' => 'hello@diverent.agency', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '+62 21 5555 8888', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Jl. Senopati No. 42, Kebayoran Baru, Jakarta Selatan 12190, Indonesia', 'type' => 'string', 'group' => 'contact'],
            ['key' => 'contact_map_url', 'value' => 'https://maps.google.com/?q=-6.2297,106.8098', 'type' => 'string', 'group' => 'contact'],

            // Social media
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/diverent.agency', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/diverent-agency', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com/@diverent.agency', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_behance', 'value' => 'https://behance.net/diverent', 'type' => 'string', 'group' => 'social'],
            ['key' => 'social_dribbble', 'value' => 'https://dribbble.com/diverent', 'type' => 'string', 'group' => 'social'],

            // General
            ['key' => 'site_name', 'value' => 'DIVER.ENT', 'type' => 'string', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Diverge from the ordinary.', 'type' => 'string', 'group' => 'general'],
            ['key' => 'footer_copyright', 'value' => '© 2024 DIVER.ENT Creative Agency. All rights reserved.', 'type' => 'string', 'group' => 'general'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
