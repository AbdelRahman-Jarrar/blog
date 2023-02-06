<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Address;
class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'price' , 'qty' , 'status' ,'total','saller',
    ];
    public $timestamps = false;

       public function merchant()
    {
        return $this->belongsTo(User::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
   }
}
