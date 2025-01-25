<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory,HasUuids;

    public function articlecomments(){
        return $this->hasMany('App\Models\Comment','article_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function processImg($imgfile){
          //Get file Extension
          $getFileNameWithExt  = $imgfile->getClientOriginalName();          
          //get just file name
          $fileName = pathinfo($getFileNameWithExt, PATHINFO_FILENAME);        
          //get file ext
          $fileExt  = $imgfile->getClientOriginalExtension();          
          //file name to store
          $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;          
          //store file
          $path = $imgfile->storeAs('public/cover_images', $fileNameToStore);  
          
          return $fileNameToStore;
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($article) { // before delete() method call this  do the rest of the cleanup...
             $article->articlecomments()->delete();            
        });
    }
}
