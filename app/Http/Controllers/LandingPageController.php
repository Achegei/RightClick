<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function show(string $page)
    {
        // Whitelist allowed pages (security + clarity)
        $allowedPages = [
            'ecommerce',
            'copywriting',
            'freelancing',
            'crypto',
            'stocks',
            'side-hustles',
            'sacco-wealth',
            'digital-marketing'
        ];

        abort_unless(in_array($page, $allowedPages), 404);

        return view("pages.landing.$page");
    }
}
