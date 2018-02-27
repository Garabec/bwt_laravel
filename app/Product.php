<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'description','user_id' ,'created_at', 'updated_at'];
    public $timestamps = true;
    
    public function getDataGrafic($date=null){
        
        if(!$date){
         $date=date("Y-m-d",strtotime('-5 days'))." - ".date("Y-m-d");   
        }
         
         $query=DB::table('products')
            ->join('tp', 'products.id', '=', 'tp.product_id')
            ->join('tags', 'tags.id', '=', 'tp.tag_id')
            ->groupBy('products.created_at','tags.name')
            ->select(DB::raw('count(products.id) as data, tags.name as name,products.created_at as date'))
            ->whereBetween('products.created_at', explode(" - ",$date))
            ->orderBy('products.created_at');
            
        if(Auth::user()->role!='admin'){
            
          $query->join('users', 'users.id', '=', 'products.user_id')
                ->where("user_id","=",Auth::id());
            
        }    
            
            
            $objectData=$query->get();
            
    
            
        $arrayData = array_map(function($item) {
                return (array)$item; 
              }, $objectData);
  
  
        $dates= array_values(array_unique(array_column($arrayData, 'date')));
        $names= array_unique(array_column($arrayData, 'name'));
        
        $template1=array();
        $template2=array();
        
 //-------готовим шаблон для загрузки данных-------------------------------------
         for($i=0; $i<count($dates);$i++){
          $template1[]=0;
         }
 
        foreach($names as $name){
          $template2[$name]=['data'=>$template1,'name'=>$name];
         }
  
 //--------------------------------------------------------------------------------
 
 //-----------грузим данные--------------------------------------------------------
              
       foreach($arrayData as $key=>$value){
      
         $template2[$value['name']]['data'][array_search($value['date'],$dates)]=$value['data'];  
       }







$charts = [

    'chart' => ['type' => 'column'],
    'title' => ['text' => 'fruit Consumption'],
    'xAxis' => [
        'categories' => $dates,
    ],
    'yAxis' => [
        'title' => [
            'text' => 'Fruit Eaten'
        ]
    ],
    'series' => array_values($template2)
];

        
        
  return $charts;     
        
        
        
        
        
    }
    
    
   public function user(){
       
       return $this->hasOne('App\User', 'id', 'user_id');
    } 
    
    public function tags(){
       
       return $this->belongsToMany('App\Tag','tp');
       
    }
    
    public function getAllTags(){
       
       return Tag::All();
       
    } 
    
    public function existsTag($tag_name){
        
        
        return (DB::table('tp')
                          ->join('products', 'products.id', '=', 'tp.product_id')
                          ->join('tags', 'tags.id', '=', 'tp.tag_id')
                          ->where('product_id','=',$this->id)
                          ->where('tags.name','=',$tag_name)
                          ->count())?true:false;
      
    }
    
    
}
