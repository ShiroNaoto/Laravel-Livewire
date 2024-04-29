<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{User, Division};
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;

class Usertable extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    protected $queryString = ["searchUser"];
    protected $listeners = [
        "resetSearch",
        "loadUser",
        "deleteConfirmed" => "deleteUser",
    ];

    public $user_del,
    $users,
    $divisions,
    $name,
    $email,
    $username,
    $acctype,
    $division_id,
    $password,
    $password_confirmation,
    $data,
    $searchUser,
    $selectedUsers = [];

    public function render()
    {
        $data = User::paginated($this->searchUser);
        return view("livewire.admin.usertable", $data)->layout("layout.dash");
    }

    private function resetInputFields()
    {
        $this->name = "";
        $this->email = "";
        $this->username = "";
        $this->acctype = "";
        $this->division_id = "";
        $this->password_confirmation = "";
        $this->password = "";
    }

    private function checkAndRedirectUser()
    {
        $user = Auth::user();

        if ($user && $user->acctype == "user") {
            return redirect()->to("/userboard");
        }
    }

    private function loadUsersAndDivisions()
    {
        $this->users = User::all();
        $this->divisions = Division::all();
    }

    private function getValidationErrorMessage(ValidationException $e)
    {
        $errorMessage = $e->validator->errors()->first();

        $errorMessages = [
            "The name field is required." => "Please enter your Full Name.",
            "The username field is required." => "Please enter your Username.",
            "The username has already been taken." => "Your Username has already been taken!",
            "The email field is required." => "Please enter your Email address.",
            "The email field must be a valid email address." => "Invalid Email address.",
            "The acctype field is required." => "Please select your Role.",
            "The division id field is required." => "Please select your Division.",
            "The password field is required." => "Please type your Password. Minimum: 6 Characters",
            "The password field must be at least 6 characters." => "Your Password must be at least 6 characters",
            "The password confirmation field is required." => "Please confirm your Password.",
            "The password confirmation field must match password." => "Password does not match!",
            "The terms field is required." => "YOU HAVE TO ACCEPT THE TERMS & NOOTS",
            "The password confirmation field is required when password is present." => "Please confirm your Password."
        ];

        return $errorMessages[$errorMessage] ?? $errorMessage;
    }

    public function updateStatus($newStatus = null)
    {
        if (!empty($this->selectedUsers) && $newStatus && in_array($newStatus, ['pending', 'approved', 'disapproved'])) {
            User::whereIn('id', $this->selectedUsers)->update(['status' => $newStatus]);
            $this->dispatch('statusUpdated');
        }
    }

    public function clearText()
    {
        $this->name = "";
        $this->email = "";
        $this->username = "";
        $this->acctype = "";
        $this->division_id = "";
        $this->password_confirmation = "";
        $this->password = "";
    }

    public function updatingSearchUser()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->searchUser = "";
    }

    public function mount()
    {
        $this->checkAndRedirectUser();
        $this->loadUsersAndDivisions();
    }

    public function logout()
    {
        Auth::logout();

        // Redirect to login page after logout
        return Redirect::to("/");
    }

    public function loadUser($id)
    {
        $this->resetInputFields();

        $user = User::findOrFail($id);
        $this->id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->acctype = $user->acctype;
        $this->division_id = $user->division_id;

        $this->dispatch(
            "swal:loading",
            timer: 800,
            text: "Loading User...",
            onComplete: $this->id
        );
    }

    public function registerUpdate($id)
    {
        try {
            $validatedData = $this->validate([
                "name" => "required|string|max:255",
                "username" => [
                    "sometimes",
                    "required",
                    "string",
                    "max:255",
                    Rule::unique("users")->ignore($id),
                ],
                "email" => [
                    "sometimes",
                    "required",
                    "string",
                    "email",
                    "max:255",
                    Rule::unique("users")->ignore($id),
                ],
                "acctype" => "required|string",
                "division_id" => "required|numeric",
                "password" => "nullable|string|min:6",
                "password_confirmation" => "sometimes|required_with:password|same:password",
            ]);

            $user = User::findOrFail($id);
            $user->name = $validatedData['name'];
            $user->username = $validatedData['username'];
            $user->email = $validatedData['email'];
            $user->acctype = $validatedData['acctype'];
            $user->division_id = $validatedData['division_id'];

            if (isset($validatedData['password']) && $validatedData['password']) {
                $user->password = bcrypt($validatedData['password']);
            }

            $user->save();
            $this->resetInputFields();
            $this->resetPage();
            $this->resetSearch();

            $this->dispatch(
                "updated",
                type: "success",
                title: "User Updated",
                text: "User successfully updated!",
                userId: $user->id,
            );
        } catch (ValidationException $e) {
            $errorMessage = $this->getValidationErrorMessage($e);

            $this->dispatch(
                "updated",
                type: "error",
                title: "Registration Failed",
                error: $errorMessage
            );
        }
    }

    public function registerStore()
    {
        try {
            $validatedData = $this->validate([
                "name" => "required|string|max:255",
                "username" => "required|string|max:255|unique:users",
                "email" => "required|string|email|max:255|unique:users",
                "acctype" => "required|string",
                "division_id" => "required|numeric",
                "password" => "required|string|min:6",
                "password_confirmation" => "required|same:password",
            ]);
            $this->password = Hash::make($this->password);
            User::create($validatedData);

            $this->resetInputFields();

            $this->dispatch(
                "registered",
                type: "success",
                title: "User Created",
                text: "User successfully created!"
            );
        } catch (ValidationException $e) {
            $errorMessage = $this->getValidationErrorMessage($e);

            $this->dispatch(
                "registered",
                type: "error",
                title: "Registration Failed",
                error: $errorMessage
            );
        }
    }

    public function userdelete($id)
    {
        $this->user_del = $id;
        $this->dispatch(
            "deleteuserconfirm",
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning"
        );
    }

    public function deleteUser()
    {
        $user = User::where("id", $this->user_del)->first();
        $user->delete();

        $this->resetPage();
        $this->resetSearch();

        $this->dispatch(
            "userDeleted",
            title: "Deleted!",
            text: "User has been deleted.",
            icon: "success"
        );
    }
}
