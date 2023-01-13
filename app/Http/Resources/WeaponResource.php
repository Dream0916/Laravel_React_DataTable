<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Phpsa\LaravelApiController\Http\Resources\ApiResource;

class WeaponResource extends ApiResource
{

    /**
     * Resources to be mapped (ie children).
     *
     * @var array|null
     */
    protected static $mapResources = null;

    /**
     * Default fields to return on request.
     *
     * @var array|null
     */
    protected static $defaultFields = null;

    /**
     * Allowable fields to be used.
     *
     * @var array|null
     */
    protected static $allowedFields = null;

    /**
     * Allowable scopes to be used.
     *
     * @var array|null
     */
    protected static $allowedScopes = null;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'name'       => $this->name,
            'damage'    => $this->damage,
            'is_range' => $this->is_range,
            'used_by' => $this->used_by,
            'heroes' => $this->heroes,
            'created_at' => Carbon::parse($this->created_at)->toDayDateTimeString(),
        ];
    }
}
