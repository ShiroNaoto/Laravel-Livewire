<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Rules\ApprovedStatus;
use Illuminate\Validation\ValidationException;
use App\Models\{User};

class Login extends Component
{
    public 
    $username,
    $status,
    $password;

    protected $listeners = ["authenticating" => "authVerify"];

    protected function validateLogin()
{
    $this->validate([
        'username' => 'required',
        'password' => 'required',
        'status' => ['required', new ApprovedStatus], // Add validation for status
    ]);
}

protected function attemptLogin()
    {
        if (Auth::attempt(['username' => $this->username, 'password' => $this->password,  'status' => 'approved'])) {
            // Authentication successful
            return true;
        }

        $user = User::where('username', $this->username)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'username' => ['Username does not exist.']
            ]);
        }

        if (!Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['Invalid Password'],
            ]);
        }

        if ($user->status == 'disapproved') {
            throw ValidationException::withMessages([
                'invalid_attempt' => ['This Account has been disapproved! Please refer to your email.'],
            ]);
        } elseif ($user->status == 'pending') {
            throw ValidationException::withMessages([
                'invalid_attempt' => ['Account has not been activated yet. Please contact Naoto Shirogane!'],
            ]);
        }
    }

protected function handleLoginSuccess($loginSuccess)
{
    if ($loginSuccess) {
        if (Auth::user()->acctype == 'admin') {
            $this->dispatch(
                'authlog', 
                type: 'success',
                title: 'Successfully Logged in!',
            );
            return redirect()->route('livewire.admin.dashboard');

        } else {
            $this->dispatch(
                'authlog', 
                type: 'success',
                title: 'Successfully Logged in!',
            );
            return redirect()->route('livewire.user.userboard');
        }
    }
}

protected function handleLoginException(\Exception $e)
    {
        $errorMessage = $e->getMessage();
    
    $this->dispatch(
        'authlog', 
        type: 'error',
        title: 'Authentication Failed',
        error: $errorMessage,
    );
    }
    private function resetInputFields(){
        $this->name = ''; 
        $this->username = '';
        $this->password = '';
    }

    public function render()
{
        return view('livewire.auth.login')->layout('layout.auth');
    }

    public function authLogin()
{
    $this->dispatch("swal:loading");
        $this->validateLogin();

}

public function authVerify()
    {
        try {
            $loginSuccess = $this->attemptLogin();
            return $this->handleLoginSuccess($loginSuccess);
        } catch (\Exception $e) {
            return $this->handleLoginException($e);
        }
    }
}
