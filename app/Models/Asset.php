<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'type', 'purchase_date', 'status', 'user_added_id'];

    protected $dates = ['deleted_at'];

    public function userAdded()
    {
        return $this->belongsTo(User::class, 'user_added_id');
    }


}
