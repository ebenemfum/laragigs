<?php
 
namespace App\Http\Controllers;

use Validator;
use App\Models\Listing;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class ListingsController extends Controller
{
    //Show All Listings
    public function index(Request $request){ 
       // dd(request()->tag);
        return view('listings.index',[
            
            'listings'=> Listing::latest()->filter(request(['tag','search']))->paginate(5)
        ]);
        
    }


    //Show Single Listing
    public function show(Listing $listing){

        return view('listings.show',[

            'listing'=> $listing
        ]);
    }

    //Show Create Form 
    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
       
        $formFields = $request->validate([
            
            'title' => 'required',
            'company' => ['required',Rule::unique('listings','company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required',


        ]);

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos','public');
        }
        Listing::create($formFields);

       
        
        return redirect('/')->with('message', 'Listing created successfully');
    }
}
