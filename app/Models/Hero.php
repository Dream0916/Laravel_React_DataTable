<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\Permission;


class Hero extends Model
{
    use HasFactory, Notifiable;

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Weapon::class, null, "hero_id", "weapon_id");
    }

    public function damages(){
        return $this->select(DB::raw('heroes.*, sum(weapons.damage) as damage'))->leftJoin('hero_weapon', function($join) {
            $join->on('heroes.id', '=', 'hero_weapon.hero_id');
        })->leftJoin('weapons', function($join) {
            $join->on('hero_weapon.weapon_id', '=', 'weapons.id');
        })->groupBy("heroes.id");
    }
}
