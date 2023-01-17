<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use File;
use Image;
use Illuminate\Support\Str;
use Storage;

class ImageUpload extends Model
{
    use HasFactory;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function removeFile($path)
    {
        if(File::exists(Storage::path($path))){
            File::delete(Storage::path($path));
        }
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function removeDir($path)
    {
        if(File::isDirectory(Storage::path($path))){
            File::deleteDirectory(Storage::path($path));
        }
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function upload($path, $image)
    {
        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        $extension = $image->extension();
        $imageName = $filename.'_'.Str::random(3).time().'.'.$extension;
        
        $image->move(Storage::path($path),$imageName);
        
        return $imageName;
    }

    public static function logo($path, $image)
    {
        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        $extension = $image->extension();
        $imageName = $filename.'.'.$extension;
        
        $image->move(Storage::path($path),$imageName);
        
        return $imageName;
    }
}
