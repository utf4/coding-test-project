<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Screen1Record extends Model
{
    //
    use HasFactory;
    protected $table = 'screen1_records';

    protected $fillable = ['id', 'title', 'description', 'status', 'notes'];

    public static function get_records($search)
    {
        return self::where('title', 'like', '%'.$search.'%')
        ->orWhere('description', 'like', '%'.$search.'%')
        ->orWhere('status', 'like', '%'.$search.'%')
        ->orWhere('notes', 'like', '%'.$search.'%')
        ->orWhere('id', $search)
        ->get()->toArray();
    }


}
