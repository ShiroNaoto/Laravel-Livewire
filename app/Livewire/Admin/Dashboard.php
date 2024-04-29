<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Division, Ticket};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Dashboard extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    protected $queryString = ["searchpending, searchresolved"];
    protected $listeners = ["resetSearch", "deleteConfirmed" => "deleteTicket"];

    public $tickets,
        $ticket,
        $delete_id,
        $divisions,
        $remark,
        $state,
        $ticketCount,
        $resolvedTickets,
        $processingTickets,
        $pendingTickets,
        $searchpending,
        $searchresolved,
        $activeTab = "pending";

    public function render()
    {
        $data = Ticket::paginated($this->searchpending, $this->searchresolved);
        return view("livewire.admin.dashboard", $data)->layout("layout.dash");
    }

    private function resetInputFields()
    {
        $this->state = "";
        $this->remark = "";
    }

    private function authentication()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->acctype == "user") {
                return Redirect::to("/userboard");
            } elseif ($user->acctype == "admin") {
                $this->tickets = Ticket::all();
                $this->divisions = Division::all();
                $this->ticketCount = $this->tickets->count();
                $this->resolvedTickets = $this->tickets
                    ->where("state", "Resolved")
                    ->count();
                $this->processingTickets = $this->tickets
                    ->where("state", "Processing")
                    ->count();
                $this->pendingTickets = $this->tickets
                    ->where("state", "Pending")
                    ->count();
            }
        }
    }

    private function updateTicketCount()
    {
        $this->tickets = Ticket::all();
        $this->ticketCount = $this->tickets->count();
        $this->resolvedTickets = $this->tickets
            ->where("state", "Resolved")
            ->count();
        $this->processingTickets = $this->tickets
            ->where("state", "Processing")
            ->count();
        $this->pendingTickets = $this->tickets
            ->where("state", "Pending")
            ->count();
    }

    public function updatingSearchPending()
    {
        $this->resetPage();
    }

    public function updatingSearchResolved()
    {
        $this->resetPage();
    }

    public function resetTable()
    {
        $this->resetPage();
    }

    public function resetSearch()
    {
        $this->searchpending = "";
        $this->searchresolved = "";
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function loadTicket($id)
    {
        $this->resetInputFields();

        $ticket = Ticket::findOrFail($id);
        $this->id = $ticket->id;
        $this->state = $ticket->state;
        $this->remark = $ticket->remark;

        $this->dispatch(
            "swal:loading",
            timer: 800,
            text: "Loading Ticket...",
            onComplete: $this->id
        );
    }

    public function ticketUpdate($id)
    {
        $validatedData = $this->validate([
            "state" => "required|string|max:255",
            "remark" => "nullable|string|max:255",
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($validatedData);

        $this->resetInputFields();
        $this->resetPage();
        $this->resetSearch();
        $this->dispatch(
            "updated",
            type: "success",
            title: "Ticket Updated",
            text: "Ticket successfully updated!"
        );
        $this->updateTicketCount();
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
        $this->updateTicketCount();
    }

    public function mount()
    {
        $this->authentication();
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to("/");
    }
}
