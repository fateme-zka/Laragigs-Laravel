<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            // Listings sorted by latest function
            // So to filter the data, base on request tag name we can add filter() function
            // And we pass request tag name to this filter function
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    // Show single listing
    public function Show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }
}
