<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StartProjectController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SectorController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Work / Portfolio
Route::get('/work', [WorkController::class, 'index'])->name('work');
Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.show');

// Agency / About
Route::get('/agency', [AgencyController::class, 'index'])->name('agency');

// Services
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/sitecare', [ServiceController::class, 'sitecare'])->name('sitecare');

// Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Culture
Route::get('/culture', [CultureController::class, 'index'])->name('culture');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Start Your Project
Route::get('/start-your-project', [StartProjectController::class, 'index'])->name('start-project');
Route::post('/start-your-project', [StartProjectController::class, 'store'])->name('start-project.store');

// Newsletter
Route::get('/newsletter', [NewsletterController::class, 'index'])->name('newsletter');
Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');

// Sectors
Route::get('/sectors/{slug}', [SectorController::class, 'show'])->name('sectors.show');

// FAQs (uses HomeController data structure, standalone page)
Route::get('/faqs', function () {
    $faqItems = collect([
        (object)['question' => 'How much does a website cost?', 'answer' => 'Every project is unique, so we don\'t believe in one-size-fits-all pricing. Our web design projects typically range from £15,000 to £80,000+ depending on complexity, features, and scope. We\'ll provide a detailed proposal after our initial discovery call.'],
        (object)['question' => 'How long does a typical project take?', 'answer' => 'Most website projects run between 8-16 weeks from kickoff to launch. Branding projects typically take 6-10 weeks. Complex ecommerce builds or multi-site platforms may take longer. We\'ll agree on a timeline during the proposal stage.'],
        (object)['question' => 'Do you work with startups or only established brands?', 'answer' => 'We work with businesses at every stage—from ambitious startups looking to make their mark to established enterprises ready for a digital transformation. What matters most to us is your ambition and willingness to invest in doing things properly.'],
        (object)['question' => 'What happens after the website launches?', 'answer' => 'Launch is just the beginning. We offer ongoing SiteCare plans that include hosting, security monitoring, performance optimisation, content updates, and strategic support. Think of us as your long-term digital partner.'],
        (object)['question' => 'Do you offer SEO and marketing services?', 'answer' => 'Absolutely. Our digital marketing team works alongside our designers and developers to ensure your website isn\'t just beautiful—it\'s discoverable. We offer SEO, PPC, content strategy, social media management, and more.'],
        (object)['question' => 'What\'s your design process like?', 'answer' => 'Our process is collaborative and transparent. We follow a proven framework: Discovery → Strategy → Design → Development → Testing → Launch. You\'ll have regular check-ins, access to our project portal, and opportunities for feedback at every stage.'],
        (object)['question' => 'Can you help with an existing website?', 'answer' => 'Absolutely. Whether you need a complete redesign, performance improvements, or ongoing maintenance through our SiteCare plans, we\'re happy to work with existing platforms and codebases.'],
        (object)['question' => 'What technologies do you work with?', 'answer' => 'We\'re platform-agnostic and choose the best tool for each project. Our core stack includes WordPress, Shopify, Laravel, and headless CMS solutions. For marketing, we work with Google Ads, Meta, HubSpot, Mailchimp, and more.'],
        (object)['question' => 'Do you work with clients outside the UK?', 'answer' => 'Yes! While we\'re based in London, we work with clients globally. Remote collaboration is second nature to us, and we\'ve delivered successful projects for clients across Europe, North America, and Asia.'],
        (object)['question' => 'How do we get started?', 'answer' => 'Simply fill out our Start Your Project form or drop us an email at hello@diver-ent.com. We\'ll arrange a discovery call to understand your needs and see if we\'re a good fit. No obligations, no hard sell.'],
    ]);
    return view('pages.faqs', compact('faqItems'));
})->name('faqs');
