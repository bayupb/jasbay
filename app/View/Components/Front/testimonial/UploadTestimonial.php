<?php

namespace App\View\Components\Front\testimonial;

use App\Models\Testimonials;
use Illuminate\View\Component;

class UploadTestimonial extends Component
{

    public function render()
    {

        return view('components.front.testimonial.upload-testimonial');
    }
}
