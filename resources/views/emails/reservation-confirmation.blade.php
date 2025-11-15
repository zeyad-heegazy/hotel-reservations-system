<h2>Reservation Confirmation</h2>

<p>Dear {{ $reservation->guest->full_name }},</p>

<p>Your reservation was successfully created.</p>

<p><strong>Room:</strong> Room #{{ $reservation->room->number }} ({{ ucfirst($reservation->room->type) }})</p>
<p><strong>Check-In:</strong> {{ $reservation->check_in }}</p>
<p><strong>Check-Out:</strong> {{ $reservation->check_out }}</p>
<p><strong>Status:</strong> {{ ucfirst($reservation->status) }}</p>

<p>Thank you for choosing our hotel!</p>
