<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use MongoDB\Driver\Session;

class ListingController extends Controller
{
    // Show all listings
    public function index()
    {
        return view('listings.index', [
            // Listings sorted by latest function
            // So to filter the data, base on request tag name we can add filter() function
            // And we pass request tag name to this filter function
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(6)
            // {simplePaginate or paginate}
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', ['listing' => $listing]);
    }

    // Show Create Listing Form
    public function create()
    {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request)
    {
        // we need to do some validations
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'email' => ['required', 'email'], // should be email format
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // this will set current logged in user id as user_id field in this creating listing
        $formFields['user_id'] = auth()->id();

        //if input validations passed:
        Listing::create($formFields);
//        to show success message:
//        Session::flash('success', 'Job created successfully.');
//        or: ->with(...)
        return redirect('/')->with('message', 'Job created successfully.');
    }

    // Show Edit Form
    public function edit(Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        return view('listings.edit', ['listing' => $listing]);
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        // we need to do some validations
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'email' => ['required', 'email'], // should be email format
            'location' => 'required',
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        // if everything goes well:
        $listing->update($formFields);
        return back()->with('message', 'Job updated successfully.');
    }

    // Delete Listing
    public function destroy(Listing $listing)
    {
        // make sure logged in user is owner
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $listing->delete();
        return redirect('/')->with('message', 'Job deleted successfully.');
    }

    // Manage Listings
    public function manage()
    {
        // pass all listings of current logged in user to this view (listings/manage)
        return view('listings.manage',
            ['user_listings' => auth()->user()->listings()->get()]);
    }

}
