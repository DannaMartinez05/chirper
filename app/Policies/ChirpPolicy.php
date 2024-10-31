<?php

namespace App\Policies;
 
use App\Models\Chirp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
 
class ChirpPolicy
{
 
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chirp $chirp): bool
    {
    
        return $chirp->user()->is($user);
    }
 
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chirp $chirp): bool
    {
        return $this->update($user, $chirp);
    }
 
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chirp $chirp): bool
    {
        return $chirp->user_id === $user->id;   
    }
 
    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chirp $chirp): bool
    {
        // Permitir que solo el creador del chirp lo elimine permanentemente
        return $chirp->user_id === $user->id;
    }
 
}