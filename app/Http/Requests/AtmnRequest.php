<?php
/**
 * PHP version 7.2.5 and Laravel version 5.6.22
 * Coins Grade Request Class
 * Provides functionality for maintainining the slider validation
 *
 * @Package             Requests
 * @Author              Cyril P
 * @Created On          16-05-2018
 * @Modified            Cyril P
 * @Modified On         09-06-2018
 * @Reviewed            Loganathan N
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtmnRequest extends FormRequest
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
      
      
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            break;
            case 'POST':
            {
                 $rules['last_name'] = 'required';
                 // $rules['first_name'] = 'required';
                 // $rules['title'] = 'required';
               // $rules['status'] = 'required';
            }
            case 'PUT':
            case 'PATCH':
            {
               // $rules['fields_1'] = 'mimes:jpeg,png,jpg|max:2048';
                 $rules['last_name'] = 'required';
                 $rules['first_name'] = 'required';
                 $rules['title'] = 'required';
            }
            break;
        default:break;
        }
        return $rules;
    }
}
