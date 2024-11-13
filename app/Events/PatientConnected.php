<?php

namespace App\Events;

use App\Models\Consultation;
use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class PatientConnected implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $consultation_id;
    public $consultation;
    public function __construct($consultation_id)
    {
        $this->consultation_id = $consultation_id;
        $this->consultation = Consultation::find($consultation_id);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel("consultation.{$this->consultation_id}"),
            new Channel("doctor-channel.{$this->consultation->appointment->doctor->doctor_id}"),
        ];
    }
}