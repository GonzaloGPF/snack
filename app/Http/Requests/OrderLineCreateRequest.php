<?php

namespace App\Http\Requests;

use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderLineCreateRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'order_id' => ['required', 'exists:orders,id', Rule::unique('orders', 'id')->where(function (Builder $query) {
                return $query->where('user_id', $this->get('user_id'));
            })],
            'products'  => 'array',
            'products.*' => 'exists:products,id'
        ];
    }
}
