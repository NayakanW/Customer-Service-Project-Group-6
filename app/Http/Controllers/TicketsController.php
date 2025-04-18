<?php

namespace App\Http\Controllers;

use App\Repositories\TicketsIndexQuery;
use App\Repositories\TicketsRepository;
use App\Ticket;
use BadChoice\Thrust\Controllers\ThrustController;
use Illuminate\Support\Facades\Auth;

/**
 * Controller untuk mengelola tiket customer service
 * 
 * Fitur:
 * 1. Membuat tiket baru
 * 2. Menampilkan daftar tiket
 * 3. Mengupdate status tiket
 * 4. Menghapus tiket
 * 5. Filter dan pencarian tiket
 */
class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return (new ThrustController)->index('tickets');
    }

    /*public function index(TicketsRepository $repository)
    {
        $ticketsQuery = TicketsIndexQuery::get($repository);
        $ticketsQuery = $ticketsQuery->select('tickets.*')->latest('updated_at');

        return view('tickets.index', ['tickets' => $ticketsQuery->paginate(25, ['tickets.user_id'])]);
    }*/

    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return view('tickets.show', ['ticket' => $ticket]);
    }

    public function create()
    {
        $this->authorize('create', Ticket::class);
        return view('tickets.create');
    }

    public function store()
    {
        $this->authorize('create', Ticket::class);
        
        $this->validate(request(), [
            'requester' => 'required|array',
            'title'     => 'required|min:3',
            'body'      => 'required',
            'team_id'   => 'nullable|exists:teams,id',
        ]);
        
        $ticket = Ticket::createAndNotify(request('requester'), request('title'), request('body'), request('tags'));
        $ticket->updateStatus(request('status'));

        if (request('team_id')) {
            $ticket->assignToTeam(request('team_id'));
        }

        return redirect()->route('tickets.show', $ticket);
    }

    public function reopen(Ticket $ticket)
    {
        $ticket->updateStatus(Ticket::STATUS_OPEN);

        return back();
    }

    public function update(Ticket $ticket)
    {
        $this->authorize('update', $ticket);
        
        $this->validate(request(), [
            'requester' => 'required|array',
            'priority'  => 'required|integer',
            'type'      => 'integer',
            //'subject'   => 'string|nullable',
            //'summary'   => 'string'
            //'title'      => 'required|min:3',
        ]);
        $ticket->updateWith(request('requester'), request('priority'), request('type'))
                ->updateSummary(request('subject'), request('summary'));

        return back();
    }
}
