<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KeadaanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'kelembaban' => (int) $this->kelembaban,
            'temperatur' => (int) $this->temperatur,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam,
        ];
    }
}
