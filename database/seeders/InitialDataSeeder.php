<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Guest;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            "name" => "Admin User",
            "email" => "admin@admin.com",
            "password" => bcrypt("admin")
        ]);

        $hotel1 = Hotel::create([
            "name" => "Grand Palace Hotel",
            "address" => "New Cairo"
        ]);

        $hotel2 = Hotel::create([
            "name" => "Sea View Resort",
            "address" => "Alexandria"
        ]);

        $rooms = [
            ["hotel_id" => $hotel1->id, "number" => "101", "type" => "single", "price_per_night" => 500],
            ["hotel_id" => $hotel1->id, "number" => "102", "type" => "double", "price_per_night" => 900],
            ["hotel_id" => $hotel2->id, "number" => "201", "type" => "suite", "price_per_night" => 1500],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }

        $guest1 = Guest::create([
            "name" => "John Doe",
            "email" => "john@example.com",
            "phone" => "01012345678"
        ]);

        $guest2 = Guest::create([
            "name" => "Sarah Ali",
            "email" => "sarah@example.com",
            "phone" => "01198765432"
        ]);

        Reservation::create([
            "room_id" => 1,
            "guest_id" => $guest1->id,
            "check_in" => Carbon::now()->addDays(1),
            "check_out" => Carbon::now()->addDays(4),
            "status" => "confirmed",
            "total_price" => 1500
        ]);
    }
}
