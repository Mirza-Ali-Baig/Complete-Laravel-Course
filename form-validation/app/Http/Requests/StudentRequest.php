<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StudentRequest extends FormRequest
{
    protected $stopOnFirstFailure = false; // Stop validation on the first failure
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Authorize the request by default returning false
    }


    /**
     * Returns an array of validation rules for the request.
     *
     * @return array
     */
    public function rules(): array
    {
        // Define the validation rules for each field
        return [
            // Name field is required
            'name' => 'required',

            // Email field is required and must be a valid email address
            'email' => 'required|email',

            // Password field is required and must be at least 8 characters long
            'password' => 'required|min:8',

            // Phone field is required and must be between 10 and 12 characters long
            'phone' => 'required|min:10|max:12',

            // Gender field is required and must be one of the specified options
            'gender' => 'required|in:male,female,others',

            // Age field is required and must be between 18 and 60 years old
            'age' => 'required|between:18,60',
        ];
    }

    /**
     * Returns an array of custom validation messages for the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        // Define custom validation messages for each field
        return [
            // Name field is required
            'name.required' => 'Name is required',

            // Email field is required and must be a valid email address
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',

            // Password field is required
            'password.required' => 'Password is required',

            // Phone field is required
            'phone.required' => 'Phone is required',

            // Gender field is required
            'gender.required' => 'Gender is required',

            // Age field is required
            'age.required' => 'Age is required',
        ];
    }

    /**
     * Returns an array of attribute names with their corresponding display names.
     *
     * This method is used to customize the display names of the attributes in the request.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        // Define the attribute names with their corresponding display names
        return [
            // The 'name' attribute is displayed as 'Name'
            'name' => 'Name',
            // The 'email' attribute is displayed as 'Email'
            'email' => 'Email',
            // The 'password' attribute is displayed as 'Password'
            'password' => 'Password',
            // The 'phone' attribute is displayed as 'Phone'
            'phone' => 'Phone',
            // The 'gender' attribute is displayed as 'Gender'
            'gender' => 'Gender',
            // The 'age' attribute is displayed as 'Age'
            'age' => 'Age',
        ];
    }


    /**
     * Prepare the data for validation.
     *
     * This method is used to transform the input data before it is validated.
     * It converts the name to uppercase and hashes the password.
     */
    protected function prepareForValidation(): void
    {
        // Merge the transformed data into the request
        $this->merge([
            // Convert the name to uppercase
            'name' => strtoupper($this->name),
            // Leave the email as is
            'email' => $this->email,
            // Hash the password for secure storage
            'password' => Hash::make($this->password),
            // Leave the phone as is
            'phone' => $this->phone,
            // Leave the gender as is
            'gender' => $this->gender,
            // Leave the age as is
            'age' => $this->age,
        ]);
    }

}
