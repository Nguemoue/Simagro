<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.Client.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

//for presence
Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
    if ($user->canJoinRoom($roomId)) {
        return ['id' => $user->id, 'name' => $user->nom];
    }
});

Broadcast::channel('channel.{client}',\App\Broadcasting\TestChannel::class,
    ['guards'=>["web","admin"]]
);
