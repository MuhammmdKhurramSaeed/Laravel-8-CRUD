<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class student extends Model
{
    use HasFactory;

    public function doLogin($request){

        $query=DB::select("SELECT * FROM students where name='".$request->name."' And phone ='".$request->phone."'");
        return $query;
    }

}