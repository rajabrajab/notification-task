<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class AdminVehicleMaintenanceNotification extends Notification
{
    use Queueable;

    public $vehicle;

    /**
     * Create a new notification instance.
     */
    public function __construct($vehicle)
    {
        $this->vehicle = $vehicle;
        Log::info('VehicleMaintenanceNotification triggered foooooor notiiifii: ' . $vehicle->license_plate);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'broadcast'];  // Email and broadcasting channels
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the broadcast representation of the notification.
     */
    public function toBroadcast(object $notifiable): array
    {
        return [
            'vehicle' => $this->vehicle,
            'message' => "Vehicle with license plate {$this->vehicle->license_plate} is nearing maintenance!"  // Message for front-end
        ];
    }
}
