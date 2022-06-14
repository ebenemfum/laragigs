<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class ListingsController extends Controller
{
    //Show All Listings
    public function index(){
        return view('listings',[
        
            'listings'=> Listing::all()
        ]);
        
    }


    //Show Single Listing
    public function show(Listing $listing){

        return view('listing',[

            'listing'=> $listing
        ]);
    }
}
