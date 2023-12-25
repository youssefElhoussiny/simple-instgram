<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

use function Laravel\Prompts\password;

class UpdateUserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // $user = User::find($this->route('user')->id);
        return Gate::allows('edit-update-profile' , $this->user);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'=>['required' , Rule::unique('users','username')->ignore($this->user())],
            'bio' => 'nullable',
            'image' =>'image',
            'name' =>'required',
            'email' => ['required' , 'email' , Rule::unique('users','email')->ignore($this->user())],
            'password' => ['nullable','min:8' , 'confirmed'],
            'lang'=>'required',
        ];
    }
}
