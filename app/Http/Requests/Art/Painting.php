<?php

namespace App\Http\Requests\Art;

use Illuminate\Foundation\Http\FormRequest;

class Painting extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           "painting_name" => "required",
           "year_of_production" => "required",
           "orientation" => "required",
           "painting_height" => "required|numeric",
           "height_unit" => "required",
           "painting_width" => "required|numeric",
           "width_unit" => "required|same:height_unit",
           "location" => "required", 
           "type_of_art_work_id" => "required|numeric",
           "painting_category_id" => "required|numeric",
           "painting_style_id" => "required|numeric",
           "painting_technique_id" => "required|numeric",
           "for_sale" => "required",
           "basic_price" => "required_if:for_sale,==,1",
           "commision_price" => "required_if:for_sale,==,1",
           "artist_recieve_price" => "required_if:for_sale,==,1",
           "id" => "nullable",
           // "images.*" => "required|image|dimensions:width=520,height=478",
           "images.*" => "required_without:id|image",
        ];
    }
}
