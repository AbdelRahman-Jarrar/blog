<?php

namespace App\Models;

class Listing{
// protected $table = 'Products';

// public static function all(){

// return
// [
//         [
//             'id'=>1,
//             'title'=>'listing one',
//             'des'=>'this is first'
//     ]
//     ,
//     [
//         'id'=>2,
//         'title'=>'listing two',
//         'des'=>'this is second'
//     ]
// ];
// }

public static function find($id){

$listings =self::all();
foreach ($listings as $listing){
if ($listing['id'] == $id){
    return $listing;
}

}

}

}
