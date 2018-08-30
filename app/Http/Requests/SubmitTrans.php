<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitTrans extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $result = true;

        $trans = \App\Model\Transaction::find($this->route('id'));

        if($trans->user_id != $this->user()->id){

            $result = false;

        }
        return $result;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'further_deposit' => 'required',

            'mls_number' => 'required',
            'street'     => 'required',
            'street_name'=> 'required',
            'city'       => 'required',
            'province'   => 'required',
            'postal'     => 'required',

            'condition_expire' => 'required',
            'accept_date'      => 'required',
            'completion_date'  => 'required',
            'price'            => 'required',
            'deposit'          => 'required',
            'further_deposit'  => 'required',
            'deposit_date'     => 'required',
            'trade_record'     => 'required',
            'deposit'          => 'required',
            'further_deposit'  => 'required',

            'client_id'        => 'required',
            'sale_id'          => 'required',
            'referral_id'      => 'required',
            'lawyer_id' => 'required'

    ];
    }

    public function messages()
{
    return [
        'client_id.required'  => 'Please select client',
        'body.required'  => 'A message is required',
    ];
}


}
