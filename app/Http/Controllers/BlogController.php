<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    private function getAllPosts()
    {
        return collect([
            (object)['id' => 1, 'title' => 'The Death of Generic Design: Why Bespoke is the Only Way Forward', 'slug' => 'death-of-generic-design', 'category' => 'Design', 'excerpt' => 'In an era of templates and AI-generated layouts, we explore why custom design isn\'t just a luxury—it\'s a competitive necessity.', 'cover_image' => '/images/blog/generic-design.jpg', 'published_at' => now()->subDays(3), 'author' => (object)['name' => 'Alex Turner', 'avatar' => '/images/team/alex.jpg'], 'body' => '<p>There was a time when a templated website was acceptable. Those days are over.</p><p>In today\'s hyper-competitive digital landscape, your website is often the first—and sometimes only—impression a potential customer will have of your brand. And when that impression looks like every other website in your industry, you\'ve already lost.</p><h2>The Template Trap</h2><p>Templates are seductive. They\'re cheap, fast, and often quite attractive. But they come with a hidden cost: sameness. When your website looks like your competitor\'s website, which looks like every other website built on the same theme, you\'re telling your audience that you\'re interchangeable.</p><h2>The Bespoke Advantage</h2><p>Bespoke design starts with strategy. It asks: Who are we? Who are our audience? What do we want them to feel, think, and do? And then it crafts an experience that answers those questions in a way that is uniquely, unmistakably yours.</p><p>The investment in custom design pays dividends in brand perception, user engagement, and ultimately, conversion. Because when everything about your digital presence feels intentional, people notice. And they trust.</p>'],
            (object)['id' => 2, 'title' => 'Conversion Rate Optimisation: Beyond the A/B Test', 'slug' => 'cro-beyond-ab-test', 'category' => 'Strategy', 'excerpt' => 'A/B testing is just the beginning. Discover the holistic approach to CRO that considers psychology, design, and data in equal measure.', 'cover_image' => '/images/blog/cro.jpg', 'published_at' => now()->subDays(7), 'author' => (object)['name' => 'Priya Sharma', 'avatar' => '/images/team/priya.jpg'], 'body' => '<p>Everyone talks about A/B testing as if it\'s the silver bullet for conversion optimisation. Change a button colour here, tweak a headline there. But real CRO runs much deeper.</p><h2>Understanding User Psychology</h2><p>Before you test anything, you need to understand why people behave the way they do on your site. Heatmaps, session recordings, user interviews—these qualitative insights are where the real gold lies.</p><h2>A Holistic Framework</h2><p>True conversion optimisation considers the entire user journey: from the moment someone discovers your brand to the point of conversion and beyond. It\'s about removing friction, building trust, and creating desire at every step.</p>'],
            (object)['id' => 3, 'title' => 'Building Brands That Last: Lessons from a Decade in Digital', 'slug' => 'brands-that-last', 'category' => 'Branding', 'excerpt' => 'What separates enduring brands from fleeting trends? After 10 years of brand-building, here are the principles that never go out of style.', 'cover_image' => '/images/blog/brands-last.jpg', 'published_at' => now()->subDays(12), 'author' => (object)['name' => 'Marcus Webb', 'avatar' => '/images/team/marcus.jpg'], 'body' => '<p>A decade in. Hundreds of brands later. These are the lessons that have stood the test of time.</p><h2>1. Start With Purpose</h2><p>The brands that endure are the ones built on genuine purpose. Not a manufactured mission statement, but a real reason for existing beyond making money.</p><h2>2. Consistency Is King</h2><p>Great brands show up the same way every time—in their visual identity, their tone of voice, their customer service. Consistency builds trust, and trust builds loyalty.</p><h2>3. Evolve, Don\'t Revolve</h2><p>The best brands evolve gradually. They stay relevant without losing their essence. Think of it as renovation, not demolition.</p>'],
            (object)['id' => 4, 'title' => 'The Future of Ecommerce: Trends to Watch in 2025', 'slug' => 'future-of-ecommerce-2025', 'category' => 'Ecommerce', 'excerpt' => 'From AI-powered personalisation to sustainable packaging, these are the ecommerce trends that will define the year ahead.', 'cover_image' => '/images/blog/ecommerce.jpg', 'published_at' => now()->subDays(18), 'author' => (object)['name' => 'David Kim', 'avatar' => '/images/team/david.jpg'], 'body' => '<p>The ecommerce landscape is shifting fast. Here\'s what smart brands need to know heading into 2025.</p>'],
            (object)['id' => 5, 'title' => 'Why Your Website Speed Matters More Than You Think', 'slug' => 'website-speed-matters', 'category' => 'Development', 'excerpt' => 'Every second counts. We break down the real business impact of site performance and how to achieve blazing-fast load times.', 'cover_image' => '/images/blog/speed.jpg', 'published_at' => now()->subDays(24), 'author' => (object)['name' => 'Sofia Andersson', 'avatar' => '/images/team/sofia.jpg'], 'body' => '<p>A one-second delay in page load time can result in a 7% reduction in conversions. Let that sink in.</p>'],
            (object)['id' => 6, 'title' => 'Accessibility Isn\'t Optional: A Guide for Modern Brands', 'slug' => 'accessibility-guide', 'category' => 'Design', 'excerpt' => 'Good design is accessible design. Here\'s how to ensure your digital presence works for everyone—and why it matters for your business.', 'cover_image' => '/images/blog/accessibility.jpg', 'published_at' => now()->subDays(30), 'author' => (object)['name' => 'Alex Turner', 'avatar' => '/images/team/alex.jpg'], 'body' => '<p>Web accessibility isn\'t just the right thing to do—it\'s the smart thing to do.</p>'],
        ]);
    }

    public function index(Request $request)
    {
        $allPosts = $this->getAllPosts();
        $category = $request->get('category');

        $posts = $allPosts;
        if ($category) {
            $posts = $posts->filter(fn($p) => $p->category === $category);
        }

        $categories = $allPosts->pluck('category')->unique()->values();

        return view('pages.blog.index', compact('posts', 'categories', 'category'));
    }

    public function show($slug)
    {
        $allPosts = $this->getAllPosts();
        $post = $allPosts->firstWhere('slug', $slug);

        if (!$post) {
            abort(404);
        }

        $relatedPosts = $allPosts->where('slug', '!=', $slug)->take(3);

        return view('pages.blog.show', compact('post', 'relatedPosts'));
    }
}
