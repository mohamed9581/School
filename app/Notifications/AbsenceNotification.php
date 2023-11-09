<?php

namespace App\Notifications;

use App\Models\Attendance;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AbsenceNotification extends Notification
{
    use Queueable;

    private $student;
    private $attendance;


    public function __construct( $attendance,$student )
    {
        $this->attendance = $attendance;
        $this->student = $student;
    }

    public function via($notifiable)
    {
        return ['mail','database','vonage'];
    }

    public function toMail($notifiable)
    {
        $parent = $notifiable;

        return (new MailMessage)
        ->subject('Absence de votre enfant')
        ->greeting('Bonjour ' . $parent->name_Father . ',')
        ->line('Nous vous informons que votre enfant ' . $this->student->name . ' a été absent le ' . $this->attendance->attendence_date . '.')
        ->line('Merci de prendre les dispositions nécessaires pour justifier cette absence.')
        ->line('Cordialement,')
        ->salutation(config('app.name'));


    }


    public function toArray($notifiable)
    {
        return [
            'enfant'=>$this->student->name,
            'enfant_id'=>$this->student->id,
            'absence_id'=>$this->attendance->id,
            'dateAbsence'=>$this->attendance->attendence_date,
        ];
    }
}
