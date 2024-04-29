<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\{User, Division};
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Register extends Component{
    public 
    $name,
    $email,
    $username,
    $acctype,
    $division_id,
    $password,
    $password_confirmation,
    $divisions,
    $terms;

    public function render(){
        return view('livewire.auth.register')->layout('layout.auth');
    }
    public function mount(){
      $this->divisions = Division::all();
    }
  private function resetInputFields(){
    $this->name = ''; 
    $this->email = '';
    $this->username = '';
    $this->acctype = '';
    $this->division_id = '';
    $this->password_confirmation = '';
    $this->password = '';
}
    public function redirectToLogin(){
        return redirect()->to('/');
    }
    public function registerStore(){
    try {
    $validatedData = $this->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'acctype' => 'required|string',
        'division_id' => 'required|numeric',
        'password' => 'required|string|min:6',
        'password_confirmation' => 'required|same:password',
        'terms' => 'required|accepted',
    ]);
    $this->password = Hash::make($this->password);
        User::create($validatedData);
        
        $this->resetInputFields();

        $this->dispatch(
            'registered', 
            type: 'success', 
            title: 'Registration successful', 
            text: 'You are now registered!',
          );

        } catch (ValidationException $e) {
            $errorMessage = $e->validator->errors()->first();

            if ($errorMessage === 'The name field is required.') {
                $errorMessage = 'Please enter your Full Name.';
                
        } elseif ($errorMessage === 'The username field is required.') {
        $errorMessage = 'Please enter your Username.';

        } elseif ($errorMessage === 'The username has already been taken.') {
        $errorMessage = 'Your Username has already been taken!';

        } elseif ($errorMessage === 'The email field is required.') {
            $errorMessage = 'Please enter your Email address.';
        
        } elseif ($errorMessage === 'The email field must be a valid email address.') {
        $errorMessage = 'Invalid Email address.';

        } elseif ($errorMessage === 'The acctype field is required.') {
        $errorMessage = 'Please select your Role.';

        } elseif ($errorMessage === 'The division id field is required.') {
            $errorMessage = 'Please select your Division.';

        } elseif ($errorMessage === 'The password field is required.') {
            $errorMessage = 'Please type your Password. Minimum: 6 Characters';

        } elseif ($errorMessage === 'The password field must be at least 6 characters.') {
            $errorMessage = 'Your Password must be at least 6 characters';

        } elseif ($errorMessage === 'The password confirmation field is required.') {
            $errorMessage = 'Please confirm your Password.';

        } elseif ($errorMessage === 'The password confirmation field must match password.') {
        $errorMessage = 'Password does not match!';

        } elseif ($errorMessage === 'The terms field is required.') {
        $errorMessage = 'YOU HAVE TO ACCEPT THE TERMS & NOOTS';
        
        } 
            
            $this->dispatch('registered',
                type: 'error',
                title: 'Registration Failed',
                error: $errorMessage,
                // imageUrl:'/dist/img/nootconfused.png',
                // imageAlt: "Naoto Waaa",
            );
        }

}
}

