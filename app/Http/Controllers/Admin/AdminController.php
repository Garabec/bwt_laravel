<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;

class AdminController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function products()
     {
        $products = Product::all();

    return view('admin.products.index',['products'=>$products]);
         
        
    }
    
    public function view($id){
        
      return view('admin.products.view');  
    }
    
    
    
    public function edit(){
        
      return view('admin.products.edit');  
    }
    
    public function delete(){
        
      return view('admin.products.delete');  
    }

}