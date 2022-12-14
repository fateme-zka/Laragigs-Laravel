<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

//    protected $fillable=['title','company','location','website','email','description','tags'];

    // to filter showing listings in page base on what user searched or which tag user clicked:
    public function scopeFilter($query, array $filters)
    {
        // if tag is not null
        if ($filters['tag'] ?? false) {
            // using sql like query (in the tags column in database listings table)
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        // if search is not null
        if ($filters['search'] ?? false) {
            // using sql like query (in the tags column in database listings table)
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    // Relationship to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
