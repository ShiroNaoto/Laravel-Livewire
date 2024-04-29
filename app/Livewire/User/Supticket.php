<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Ticket};
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Redirect;

class Supticket extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ["searchpending, searchresolved"];
    protected $listeners = ["resetSearch", 'deleteConfirmed' => 'deleteTicket'];

    public
    $tickets, $ticket, $delete_id,
    $divisions,
    $user_id,
    $state,
    $staffname,
    $email,
    $searchpending,
    $searchresolved,
    $ticketdiv,
    $severity,
    $category,
    $description,
    $search;

    private function resetInputFields()
    {
        $this->severity = '';
        $this->category = '';
        $this->description = '';
    }

    private function getValidationErrorMessage(ValidationException $e)
    {
        $errorMessage = $e->validator->errors()->first();

        $errorMessages = [
            "The severity field is required." => "Please Select Severity.",
            "The category field is required." => "Please Select Category.",
            "The description field is required." => "Please type in your request."
        ];

        return $errorMessages[$errorMessage] ?? $errorMessage;
    }

    private function checkAndRedirectUser()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->acctype == 'user') {
                $this->tickets = Ticket::where('user_id', $user->id)->get();
            } elseif ($user->acctype == 'admin') {
                return Redirect::to('/dashboard');
            }
        }
    }

    public function updatingSearchPending()
    {
        $this->resetPage();
    }

    public function updatingSearchResolved()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->searchpending = "";
        $this->searchresolved = "";
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteTicketHome($id)
    {
        $this->delete_id = $id;
        $this->dispatch(
            "deletehomeTicket",
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning"
        );
    }

    public function deleteTicket()
    {
        $ticket = Ticket::where("id", $this->delete_id)->first();
        $ticket->delete();

        $this->resetPage();
        $this->dispatch(
            "ticketDeleted",
            title: "Deleted!",
            text: "Ticket has been deleted.",
            icon: "success"
        );
    }

    public function mount()
    {
        $this->checkAndRedirectUser();
    }

    public function ticketStore()
    {
        try {
            $validatedData = $this->validate([
                'user_id' => 'required|integer',
                'state' => 'required|string|max:255',
                'staffname' => 'required|string|max:255',
                'email' => 'required|string',
                'ticketdiv' => 'required|string',
                'severity' => 'required|string',
                'category' => 'required|string',
                'description' => 'required|string',
            ]);
            Ticket::create($validatedData);
            $this->resetInputFields();
            $this->dispatch(
                'created',
                title: "Ticket Created!",
                text: "Your ticket has been created.",
                icon: "success"
            );
        } catch (ValidationException $e) {
            $errorMessage = $this->getValidationErrorMessage($e);

            $this->dispatch(
                "created",
                type: "error",
                title: "Failed to create Ticket",
                error: $errorMessage
            );
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }

    public function render()
    {
        $data = Ticket::paginated($this->searchpending, $this->searchresolved);
        return view('livewire.user.supticket', $data)->layout('layout.dash');
    }
}
