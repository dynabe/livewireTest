<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});





Broadcast::channel('user', function ($user) {
    // return (int) $user->id === (int) $id;
    return true;
});

Broadcast::channel('notification.{id_user}', function ($user, $id_user) {
    return $user->id == $id_user;
    // return true;
});


