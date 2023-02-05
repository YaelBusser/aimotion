<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class csgo_infos_g_maps_moins_jouees extends Model
{
    use HasFactory;
    protected $table = 'csgo_infos_g_maps_moins_jouees';
    protected $guarded = ['updated_at', 'created_at'];
    protected $fillable = [
        'id_user',
        'id_map',
    ];
}
