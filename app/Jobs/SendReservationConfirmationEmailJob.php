<?php

namespace App\Jobs;

use App\Models\Reservation;
use App\Mail\ReservationConfirmationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReservationConfirmationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct(private readonly Reservation $reservation)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->reservation->guest->email) {
            Mail::to($this->reservation->guest->email)
                ->send(new ReservationConfirmationMail($this->reservation));
        }
    }
}
