<?php

namespace App\Http\Resources;

use App;
use KhanCode\LaravelBaseRest\Helpers;
use Illuminate\Http\Resources\Json\JsonResource;

class UserGeneratedResource extends JsonResource
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
            // start list column
            $this->mergeWhen(\Request::get("show_id",1)==1 && $this->hasAttribute("id"), [
                    "id"    =>  $this->id,
                ]),
			$this->mergeWhen(\Request::get("show_name",1)==1 && $this->hasAttribute("name"), [
                    "name"    =>  $this->name,
                ]),
			$this->mergeWhen(\Request::get("show_email",1)==1 && $this->hasAttribute("email"), [
                    "email"    =>  $this->email,
                ]),
			// end list column

            // start list relation
            			// end list relation
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return [
            'status'    => 200,
            'error'     => ( !empty( Helpers::is_error() ) ) ? json_decode( Helpers::get_error() ) : 0
        ];
    }
}
