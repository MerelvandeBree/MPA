<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    use HasFactory;
    use Timestamp;
    protected $table = 'songs';

    public function Playlist() {
        return $this->belongsToMany(Saved_lists::class);
    }

}
