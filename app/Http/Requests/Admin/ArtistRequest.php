<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArtistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           "name" => "required",
           "email" => "required|email",
           "country_code" => "required",
           "mobile" => "required|numeric",
           "referred_by" => "nullable|exists:artists,referral_code",
           "insta_id" => "nullable|url",
           "fb_id" => "nullable|url",
           "fb_id" => "nullable|url",
           "signature_image" => [
                'nullable',
                Rule::dimensions()->maxWidth(120)->maxHeight(33)->ratio(33 / 120),
            ],
        ];
    }
}
