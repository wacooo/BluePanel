<?php

namespace App\Policies;

use App\User;
use App\Kiosk;
use Illuminate\Auth\Access\HandlesAuthorization;

class KioskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the kiosk.
     *
     * @param  \App\User  $user
     * @param  \App\Kiosk  $kiosk
     * @return mixed
     */
    public function view(User $user, Kiosk $kiosk)
    {
        return $user->permissions()->contains($kiosk.id);
    }

    /**
     * Determine whether the user can create kiosks.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the kiosk.
     *
     * @param  \App\User  $user
     * @param  \App\Kiosk  $kiosk
     * @return mixed
     */
    public function update(User $user, Kiosk $kiosk)
    {
        //
    }

    /**
     * Determine whether the user can delete the kiosk.
     *
     * @param  \App\User  $user
     * @param  \App\Kiosk  $kiosk
     * @return mixed
     */
    public function delete(User $user, Kiosk $kiosk)
    {
        //
    }
}
