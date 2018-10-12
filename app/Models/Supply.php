<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = ['user_id', 'discipline_id', 'year'];
    protected $guarded = ['id', 'created_at', 'update_at'];

    public function teacher()
    {
        return $this->belongsTo(Users/User::class);
    }
    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }
    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
}
