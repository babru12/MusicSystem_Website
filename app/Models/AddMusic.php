<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddMusic extends Model
{
    protected $table = 'addmusics';
    protected $fillable = [
        'title', 'musics', 'photo', 'albam_id'
    ];
}
