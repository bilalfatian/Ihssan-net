<?php

namespace App\Policies;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CampaignPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Campaign $campaign)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === User::ROLE_PUBLISHER || $user->role === User::ROLE_ADMIN;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Campaign $campaign)
    {
        return $user->id === $campaign->publisher_id || $user->role === User::ROLE_ADMIN;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Campaign $campaign)
    {
    return $user->id === $campaign->publisher_id || $user->role === User::ROLE_ADMIN;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Campaign $campaign)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Campaign $campaign)
    {
        //
    }
}
