<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function products()
     {
        $product =  Product::orderBy('id','updated_at', 'desc');
        
        if(Auth::user()->role!='admin'){
            
              $product=$product->where("user_id","=",Auth::id());
            
        }  
       
        
        return view('admin.products.index',['products'=>$product->paginate(10)]);
         
      }
    
    public function add(Request $request){
        
       
        
        if ($request->isMethod('post')){
          
          
          
          $v = Validator::make($request->all(), [
                  'tag.*' => 'required',
                  'name' => 'required|max:100|min:4',
                  'price' => 'required|numeric',
                  'description' => 'required|max:1000|min:4',
                  
           ]);
           
         if ($v->fails())
               {
                   
                   return redirect()->back()->withErrors($v->errors()); 
                }
        
        
        $product=Product::create([
            'name'=>$request->input('name'),
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'user_id'=>Auth::id(),
            ]);
            
       if ($request->has('tag')) { 
          foreach($request->input('tag') as $tag){
              
           
            $tag_model=Tag::firstOrCreate(['name'=>$tag]); 
            DB::table('tp')->insert(['tag_id' => $tag_model->id, 'product_id' => $product->id]);
            
            
          }
       }
        
       return redirect()->route('admin.products.index')->with('info','Item created successfully!');
        }  
       return view('admin.products.add',['product'=>new Product]);  
    }
    
    
    
    public function edit($id,Request $request){
        
       
      if ($request->isMethod('post')){
          
         // dump($request->all());
          
          $v = Validator::make($request->all(), [
                  'tag.*' => 'required',
                  'name' => 'required|max:100|min:4',
                  'price' => 'required|numeric',
                  'description' => 'required|max:1000|min:4',
                  
           ]);
           
         
          
          if ($v->fails())
               {
                    
                  
                    return redirect()->back()->withErrors($v->errors()); 
                }
          $request->except('_token'); 
          $model=Product::find($id);
          $model->update($request->except('_token'));
          $model->touch();
          
          if ($request->has('tag')) { 
              
      //------------delete old tag----------        
         foreach($model->tags as $tag_m){     
         
               DB::table('tp')->where('product_id', '=', $model->id)->where('tag_id', '=', $tag_m->id)->delete(); }
          
        }
   //-------------crete new tag --------------     
         if ($request->has('tag')) { 
          foreach($request->input('tag') as $tag){
              
           if(!$model->existsTag($tag)){
            $tag_model=Tag::firstOrCreate(['name'=>$tag]); 
            DB::table('tp')->insert(['tag_id' => $tag_model->id, 'product_id' => $model->id]);
           } 
            
          }
       }
        
                
      }
     
      return view('admin.products.update',['product'=>Product::find($id)]);  
    }
    
    public function delete($id){
        
       Product::find($id)->delete(); 
        
      return redirect()->route('admin.products.index'); 
    }
    
    
    public function grafic(Request $request){
        
        if ($request->isMethod('post')){ 
            
       
            return response()->json(['charts'=>(new Product)->getDataGrafic($request->input('date'))]); 
        }
        
     return view('admin.products.grafic',['charts'=>(new Product)->getDataGrafic()]);    
        
    }

}