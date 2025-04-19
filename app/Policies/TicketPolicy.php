<?php

namespace App\Policies;

use App\Ticket;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->is_admin && $ability != 'delete') {
            return true;
        }
    }

    public function index(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the ticket.
     *
     * @param  \App\User  $user
     * @param  \App\Ticket  $ticket
     *
     * @return mixed
     */
    public function view(User $user, Ticket $ticket)
    {
        // Admin dan assistant bisa melihat semua tiket
        if ($user->is_admin || $user->is_assistant) {
            return true;
        }
        
        // User bisa melihat tiket yang dia buat
        if ($ticket->user_id == $user->id) {
            return true;
        }
        
        // User bisa melihat tiket yang ditugaskan ke timnya
        if ($user->teamsTickets()->pluck('id')->contains($ticket->id)) {
            return true;
        }
        
        // User bisa melihat tiket yang dia buat sebagai requester
        if ($ticket->requester_id && $ticket->requester->email == $user->email) {
            return true;
        }
        
        return false;
    }

    /**
     * Determine whether the user can create tickets.
     *
     * @param  \App\User  $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user && !$user->is_assistant;
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param  \App\User  $user
     * @param  \App\Ticket  $ticket
     *
     * @return mixed
     */
    public function update(User $user, Ticket $ticket)
    {
        // Admin dan assistant bisa mengupdate semua tiket
        if ($user->is_admin || $user->is_assistant) {
            return true;
        }
        
        // User bisa mengupdate tiket yang dia buat
        return $ticket->user_id == $user->id;
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param  \App\User  $user
     * @param  \App\Ticket  $ticket
     *
     * @return mixed
     */
    public function delete(User $user, Ticket $ticket)
    {
        return false;
    }

    public function assignToTeam(User $user, Ticket $ticket)
    {
        return $user->is_admin;
    }

    public function createIssue(User $user, Ticket $ticket)
    {
        return false;
    }

    public function createIdea(User $user, Ticket $ticket)
    {
        return true;
    }
}
