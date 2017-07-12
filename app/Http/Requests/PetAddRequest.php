<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetAddRequest extends FormRequest
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
            'category_id' => 'required',
            'color_id' => 'required',
            'age' => 'required',
            'email' => 'required|email',
            'full_name' => 'required',
            'description' => 'required',
            'phone_no' => 'required',
            'city_id' => 'required',
            'activation_code' => 'required',
            'is_pedigree' => 'required',
            'kcp_number' => 'required',
            'is_vaccinated' => 'required',
            'is_active' => 'required',
            'is_verified' => 'required',
            'require_checking' => 'required',
            'images.*' => 'image',
        ];
    }

    public function response(array $errors)
    {
        $transformed = [];

        foreach ($errors as $field => $message) {
            $transformed[] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }

        return response()->json([
            'errors' => $transformed
        ], \Illuminate\Http\JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
    }
}
