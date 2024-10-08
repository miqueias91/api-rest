<?php

declare(strict_types=1);

namespace Modules\Common\Core\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return ['message' => $this->resource];
    }
}
