<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\{Ticket};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Compticket extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ["searchpending, searchresolved"];
    protected $listeners = ["resetSearch", 'deleteConfirmed' => 'deleteTicket'];
  
      public 
      $tickets,$ticket,$delete_id,
      $divisions,
      $user_id,
      $state,
      $staffname,
      $email,
      $ticketdiv,
      $severity,
      $category,
      $description,
      $searchpending,
      $searchresolved,
      $search;

      public function render()
      {
          $data = Ticket::paginated($this->searchpending, $this->searchresolved);
          return view('livewire.user.compticket', $data)->layout('layout.dash');
      }

      public function mount()
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

    public function logout(){
        Auth::logout();
        return Redirect::to('/');
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
}
