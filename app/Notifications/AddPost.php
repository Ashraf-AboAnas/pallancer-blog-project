<?php

namespace App\Notifications;

use App\Models\Posts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
class AddPost extends Notification
{
    use Queueable;

  protected $post;
    public function __construct(Posts $posts)
    {
       $this->post=$posts;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }


    public function toArray($notifiable)
    {
       $user=Auth::user();

        return [
           'title'=>'New Post ' .$this->post->title ,
           'user'=>'Created By ' . " ( " .$user->name ." ) ",
           'date'=>'date' .$this->post->created_at
        ];
    }
}
