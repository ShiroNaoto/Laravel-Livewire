<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Division};
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;

class Divtable extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    protected $queryString = ["searchDiv"];
    protected $listeners = ["resetSearch", "deleteConfirmed" => "deleteDiv"];
    public $div_del,
    $divisions,
    $division,
    $name,
    $code,
    $head,
    $duty,
    $data,
    $searchDiv;

    public function render()
    {
        $data = Division::paginated($this->searchDiv);
        return view("livewire.admin.divtable", $data)->layout("layout.dash");
    }
    public function mount()
    {
        $this->checkAndRedirectUser();
        $this->loadDivisions();
    }

    private function getValidationErrorMessage(ValidationException $e)
    {
        $errorMessage = $e->validator->errors()->first();

        $errorMessages = [
            "The name field is required." => "Please enter Division Name.",
            "The code field is required." => "Please enter Division Code.",
            "The head field is required." => "Please enter the Division Head.",
            "The code has already been taken." => "Division Code already taken!",
            "The duty field is required." => "Please enter Division's Duty."
        ];

        return $errorMessages[$errorMessage] ?? $errorMessage;
    }

    private function checkAndRedirectUser()
    {
        $user = Auth::user();

        if ($user && $user->acctype == "user") {
            return redirect()->to("/userboard");
        }
    }

    private function loadDivisions()
    {
        $this->divisions = Division::all();
    }

    private function resetInputFields()
    {
        $this->name = "";
        $this->code = "";
        $this->head = "";
        $this->duty = "";
    }
    public function clearText()
    {
        $this->name = "";
        $this->code = "";
        $this->head = "";
        $this->duty = "";
    }
    public function updatingSearchDiv()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->searchDiv = "";
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to("/");
    }

    public function divStore()
    {
        try {
            $validatedData = $this->validate([
                "name" => "required|string|max:255",
                "code" => "required|string|max:255|unique:divisions",
                "head" => "required|string",
                "duty" => "required|string",
            ]);
            Division::create($validatedData);

            $this->resetInputFields();

            $this->dispatch(
                "created",
                type: "success",
                title: "Division Created",
                text: "Division successfully created!"
            );
        } catch (ValidationException $e) {
            $errorMessage = $this->getValidationErrorMessage($e);

            $this->dispatch(
                "created",
                type: "error",
                title: "Failed to create Division",
                error: $errorMessage
            );
        }
    }
    public function loadDivision($id)
    {
        $division = Division::findOrFail($id);
        $this->id = $division->id;
        $this->name = $division->name;
        $this->code = $division->code;
        $this->head = $division->head;
        $this->duty = $division->duty;

        $this->dispatch(
            "swal:loading",
            timer: 800,
            text: "Loading Division...",
            onComplete: $this->id
        );
    }

    public function divUpdate($id)
    {
        try {
            $validatedData = $this->validate([
                "name" => "required|string|max:255",
                "code" => [
                    "sometimes",
                    "required",
                    "string",
                    "max:255",
                    Rule::unique("divisions")->ignore($id),
                ],
                "head" => "required|string",
                "duty" => "required|string",
            ]);

            $division = Division::findOrFail($id);
            $division->update($validatedData);

            $this->resetInputFields();
            $this->resetPage();
            $this->resetSearch();

            $this->dispatch(
                "updated",
                type: "success",
                title: "Division Updated",
                text: "Division successfully updated!",
                divId: $division->id,
            );
        } catch (ValidationException $e) {
            $errorMessage = $this->getValidationErrorMessage($e);

            $this->dispatch(
                "updated",
                type: "error",
                title: "Failed to update Division",
                error: $errorMessage
            );
        }
    }

    public function divdelete($id)
    {
        $this->div_del = $id;
        $this->dispatch(
            "deletedivconfirm",
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning"
        );
    }

    public function deleteDiv()
    {
        $division = Division::where("id", $this->div_del)->first();
        $division->delete();

        $this->resetPage();

        $this->dispatch(
            "divDeleted",
            title: "Deleted!",
            text: "Division has been deleted.",
            icon: "success"
        );
    }
}
