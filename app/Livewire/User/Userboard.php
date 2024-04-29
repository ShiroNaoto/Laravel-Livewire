<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Division, Ticket};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Userboard extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ["searchpending, searchresolved"];
    protected $listeners = ["resetSearch", 'deleteConfirmed' => 'deleteTicket'];

    public 
    $tickets,$ticket,$delete_id,
    $divisions,
    $ticketCount,
    $resolvedTickets,
    $processingTickets,
    $pendingTickets,
    $searchpending,
    $searchresolved,
    $data,
    $activeTab = 'pending';

    private function authentication()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->acctype == 'user') {
                $this->tickets = Ticket::where('user_id', $user->id)->get();
                $this->divisions = Division::all();
                $this->ticketCount = $this->tickets->count();
                $this->resolvedTickets = $this->tickets->where('state', 'Resolved')->count();
                $this->processingTickets = $this->tickets->where('state', 'Processing')->count();
                $this->pendingTickets = $this->tickets->where('state', 'Pending')->count();
            } elseif ($user->acctype == 'admin') {
                return Redirect::to('/dashboard');
            }
        }
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
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

    public function resetTable()
    {
        $this->resetPage();
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

        $this->authentication();
    }
    //Delete Function END


    public function mount()
    {
        $this->authentication();
    }

    //Logout Function
    public function logout()
    {
        Auth::logout();

        // Redirect to login page after logout
        return Redirect::to('/');
    }
    //Logout Function END

    public function render()
{
    $data = Ticket::paginated($this->searchpending, $this->searchresolved);
    return view('livewire.user.userboard', $data)->layout('layout.dash');
}
    
}