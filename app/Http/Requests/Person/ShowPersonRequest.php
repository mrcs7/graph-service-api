<?php


namespace App\Http\Requests\Person;


use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ShowPersonRequest extends FormRequest
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
            'person' => 'required|exists:Person,id',
        ];
    }

    /**
     * Failed Validation
     *
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        if ($validator->fails()) {
            throw new HttpResponseException(validationErrors($validator->errors()->all()));
        }
    }

    /**
     * Merge Request Data
     *
     * @return array
     */
    protected function validationData()
    {
        return array_merge($this->request->all(), [
            'person' => Route::input('person'),
        ]);
    }
}
