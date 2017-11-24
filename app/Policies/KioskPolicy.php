<?php

namespace App\Policies;

use App\Kiosk;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class KioskPolicy
{
    public function before($user, $ability)
    {
        if ($user->isAdministrator()) {
            return true;
        }
    }

    use HandlesAuthorization;

    /**
     * Determine whether the user can view the kiosk.
     *
     * @param \App\User  $user
     * @param \App\Kiosk $kiosk
     *
     * @return mixed
     */
    public function view(User $user, Kiosk $kiosk)
    {
        //Verify that the user has permissions via the pivot table
        return $user->kiosks()->where('kiosk_id', $kiosk->id)->first();
    }

    /**
     * Determine whether the user can create kiosks.
     *
     * @param \App\User $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the kiosk.
     *
     * @param \App\User  $user
     * @param \App\Kiosk $kiosk
     *
     * @return mixed
     */
    public function update(User $user, Kiosk $kiosk)
    {
        //
    }

    /**
     * Determine whether the user can delete the kiosk.
     *
     * @param \App\User  $user
     * @param \App\Kiosk $kiosk
     *
     * @return mixed
     */
    public function delete(User $user, Kiosk $kiosk)
    {
    }
}
