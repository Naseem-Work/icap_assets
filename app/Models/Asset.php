<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'type', 'purchase_date', 'status', 'user_added_id'];

    public function userAdded()
    {
        return $this->belongsTo(User::class, 'user_added_id');
    }
}
