<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Permission;


class Hero extends Model
{
    use HasFactory, Notifiable;

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Weapon::class, null, "hero_id", "weapon_id");
    }

}
