<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;

class Weapon extends Model
{
    use HasFactory;

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Hero::class, null, "weapon_id", "hero_id");
    }

    public function getWeapons(){
        return $this->select(DB::raw('weapons.*, sum(1) as used_by, GROUP_CONCAT(heroes.name SEPARATOR ", ") as heroes'))
            ->leftJoin('hero_weapon', function($join) {
            $join->on('weapons.id', '=', 'hero_weapon.weapon_id');
        })->leftJoin('heroes', function($join) {
                $join->on('heroes.id', '=', 'hero_weapon.hero_id');
            })
            ->groupBy("weapons.id");
    }

}
