<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Notifications\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

use App\Events\NotificationEvent;

class NotificationsWire extends Component
{
    use Notifiable;

    public $message;
    public $id_user;
    public $data;
    public $notiTitle;
    public $notiMessage;

    public function getListeners()
    {
        $userxd = Auth::user()->id;
        return [
            "echo-private:notification.{$userxd},.notificationAs" => 'test',
        ];
    }

    public function test($data)
    {
        $notiData = [
            'title' => $data['notification']['id_user'],
            'message' => $data['notification']['message']
        ];

        $this->emit('notificationPopup', $notiData);
    }

    public function render()
    {
        
        $user = Auth::user();
        $this->user_notifications = $user->notifications;

        return view('livewire.notifications-wire');
    }

    public function sentNotification()
    {
        // EVENT -- BROADCASTING -> PUSHER -> WEBSOCKETS
        $this->notification = ['id_user' => $this->id_user,
                                'message' => $this->message];

        event(new NotificationEvent($this->notification));


        // NOTIFICATION - DATABASE:NOTIFICATIONS
        $dataMsg = [
            'user' => Auth::user()->id,
            'message' => $this->message
        ];
        // $user = User::all();
        $user = User::find($this->id_user);
        Notification::send($user, new Message($dataMsg));

        
        // --- Toastr Popup
        $notiData = [
            'title' => "Wiadomość wysłano Pomyślnie",
            'message' => "Do użytkownika $this->id_user"
        ];
        $this->emit('notificationPopup', $notiData);
    }

    public function readNotification()
    {
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
    }


}
