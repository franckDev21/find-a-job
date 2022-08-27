<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
// use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(){
        $listings = Listing::latest()
            ->filter(request(['tag','search']))
            ->paginate(6);

        return view('listing.index',compact('listings'));
    }

    public function show(Listing $listing){
        return view('listing.show',compact('listing'));
    }

    public function create(){
        return view('listing.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'title'         => 'required',
            'company'       => ['required'],
            'location'      => 'required',
            'website'       => 'required',
            'email'         => ['required','email'],
            'tags'          => 'required',
            'description'   => 'required',
        ]);

        if($request->hasFile('logo')){
            $data['logo'] = $request->logo->store('logos','public');
        }

        $data['user_id']  = auth()->user()->id;

        Listing::create($data);

        return to_route('listing.index')->with('message','Listing created successfully !');
    }

    public function edit(Listing $listing){
        return view('listing.edit',compact('listing'));
    }

    public function update(Request $request, Listing $listing){

        $data = $request->validate([
            'title'         => 'required',
            'company'       => ['required'],
            'location'      => 'required',
            'website'       => 'required',
            'email'         => ['required','email'],
            'tags'          => 'required',
            'description'   => 'required',
        ]);

        if($request->hasFile('logo')){
            $data['logo'] = $request->logo->store('logos','public');
        }

        $listing->update($data);

        return back()->with('message','Listing updated successfully !');
    }

    public function destroy(Listing $listing){
        $listing->delete();
        return to_route('listing.index')->with('message','Listing deleted successfully !');
    }
}
