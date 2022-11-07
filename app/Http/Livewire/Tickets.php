<?php

namespace App\Http\Livewire;

use App\Models\SupportTicket;
use Livewire\Component;

class Tickets extends Component
{

    protected $oldestTicket;
    public $active;

    public function __construct()
    {
        $this->oldestTicket = SupportTicket::oldest('id')->first();
        if($this->oldestTicket){
            $this->active = $this->oldestTicket->id;
        }
    }

    protected $listeners = ['ticketSelected'];

    public function ticketSelected($ticketId)
    {
        $this->active = $ticketId;
    }

    public function render()
    {
        return view('livewire.tickets', [
            'tickets' => SupportTicket::all(),
        ]);
    }
}