<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('franchise.{franchiseId}', function ($user, $franchiseId) {
    return $user->franchise_id == $franchiseId; // Perbaikan operator
});