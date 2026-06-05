<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name'  => ['required', 'string', 'max:255'],
            'contact_name'  => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'max:255'],
            'phone'         => ['nullable', 'string', 'max:50'],
            'website_url'   => ['nullable', 'url', 'max:255'],
            'project_type'  => ['required', 'array', 'min:1'],
            'project_type.*'=> ['string', 'in:web-design,branding,digital-marketing,ecommerce,sitecare,other'],
            'budget_range'  => ['required', 'string', 'in:10k-25k,25k-50k,50k-100k,100k+'],
            'timeline'      => ['nullable', 'string', 'in:asap,1-2-months,3-4-months,6-months+,flexible'],
            'project_brief' => ['required', 'string', 'min:20', 'max:5000'],
            'how_found'     => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'company_name.required' => 'Please enter your company name.',
            'contact_name.required' => 'We need your name to get in touch.',
            'email.required' => 'We\'ll need your email to respond.',
            'email.email' => 'Please enter a valid email address.',
            'project_type.required' => 'Please select at least one service you\'re interested in.',
            'budget_range.required' => 'Knowing your budget helps us tailor our proposal.',
            'project_brief.required' => 'Tell us a bit about your project—even a few sentences helps.',
            'project_brief.min' => 'Please provide a bit more detail about your project.',
        ];
    }
}
