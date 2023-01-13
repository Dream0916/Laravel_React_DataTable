<?php

namespace App\Http\Controllers;

use App\Http\Resources\HeroResource;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class HeroesController extends Controller
{

    /**
     * @var string[]
     */
    protected $sortFields = ['name', 'health', 'damage'];


    public function __construct(Hero $hero)
    {
        $this->hero = new Hero();
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return AnonymousResourceCollection
     */
    public function index(Request $request): AnonymousResourceCollection
    {
//        all heroes + their sum damage
        $sortFieldInput = $request->input('sort_field', self::DEFAULT_SORT_FIELD);
        $sortField      = in_array($sortFieldInput, $this->sortFields) ? $sortFieldInput : self::DEFAULT_SORT_FIELD;
        $sortOrder      = $request->input('sort_order', self::DEFAULT_SORT_ORDER);
        $searchInput    = $request->input('search');
        $query          = $this->hero->damages()->orderBy($sortField, $sortOrder);
        $perPage        = $request->input('per_page') ?? self::PER_PAGE;
        if (!is_null($searchInput)) {
            $searchQuery = "%$searchInput%";
            $query       = $query->where('name', 'like', $searchQuery);
        }
        $heroes = $query->paginate((int)$perPage);


        return HeroResource::collection($heroes);
    }
}
