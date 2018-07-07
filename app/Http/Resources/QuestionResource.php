<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'QuestionText' => $this->questiontext,
        'Answers' => $this->Answers,
        'Source' => $this->source->url,
        'PicURL' => $this->source->picURL,
        ];
        //return parent::toArray($request);
    }
}
