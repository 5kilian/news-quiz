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
        //'Category' => $this->category->name,
        'Answers' => $this->Answers,
        'Source' => $this->source->url,
        'PicURL' => 'https://www.tagesschau.de/multimedia/bilder/kurz-seehofer-101~_v-videowebl.jpg',
        ];
        //return parent::toArray($request);
    }
}
