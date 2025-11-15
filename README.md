# How to Set Up and Run the Project

## 1. Clone the repository
```bash
git clone https://github.com/zeyad-heegazy/hotel-reservations-system.git
cd hotel-reservation
```

## 2. Install backend and frontend dependencies
```bash
composer install
npm install
npm run build
```

## 3. Create and configure the environment
```bash
cp .env.example .env
```

Update database and mail credentials according to your environment.

## 4. Generate application key
```bash
php artisan key:generate
```

## 5. Run migrations and seeders
```bash
php artisan migrate --seed
```

This seeds sample hotels, rooms, guests, and a test admin account.

## 6. Run the development server
```bash
php artisan serve
```

Visit the system at:
```
http://localhost:8000
```

## 7. Start the queue worker for reservation emails
```bash
php artisan queue:work
```

---

# Design and Architectural Choices

## 1. Service–Repository Architecture

Business logic is separated from data access using **Service** and **Repository** classes for each entity (Hotels, Rooms, Guests, Reservations).  
This improves maintainability, testability, and readability.

- **Controllers** handle only request/response logic.
- **Services** contain business rules (reservation validation, availability checking, etc.).
- **Repositories** encapsulate all database interactions.

This pattern is common in enterprise Laravel applications and prevents fat controllers or duplicated logic.

---

## 2. Form Request Validation

Each action (store, update, delete, view) has its own **Form Request** class, ensuring:

- Clean controllers
- Consistent validation
- Per-action authorization capability
- Sanitized data before business logic runs

---

## 3. Blade-Based UI

The UI is built with **Blade + Bootstrap**, intentionally simple for assessment and clarity.

Each module has its own CRUD Blade view folder:

- Hotels
- Rooms
- Guests
- Reservations

---

## 4. Activity Logging Trait

A reusable trait automatically logs:

- The user performing the action
- The model affected
- Old and new payload values
- Timestamp
- Action type (created, updated, deleted)

This provides transparency and supports debugging or auditing.

---

## 5. Queued Email Notification

Reservation confirmation emails are sent using a queued job to avoid blocking the request.

This demonstrates use of:

- Laravel Jobs
- Queue worker
- Mailables
- Scheduler (cron-ready design)

---

## 6. Preventing Double Booking

The `ReservationService` includes conflict detection logic to prevent overlapping bookings.

This ensures that:

- Check-in and check-out dates do not collide
- Only available rooms can be booked

---

## 7. Modular Routing

Routes are distributed into separate files for better organization:

- `routes/hotels.php`
- `routes/rooms.php`
- `routes/guests.php`
- `routes/reservations.php`

This scales better for large systems.

---

# Assumptions and Notes

## Users and guests are separate concepts

- **Users** authenticate and manage the system.
- **Guests** represent hotel customers and do not log in.

## A reservation cannot be edited once canceled

Only the following actions are allowed afterward:

- View
- Cancel (once)
- Delete

## Room availability logic uses simple overlap checking

Typical reservation constraints:

- A reservation cannot overlap another on the same room.
- Check-in/check-out ranges are validated strictly.

## Simple UI chosen intentionally

As this is a technical assessment, the emphasis is on:

- Backend structure
- Code quality
- Clear separation of concerns  
  Not on advanced frontend styling.

## Email sending requires a running queue worker

Without running:
```bash
php artisan queue:work
```
emails will remain in the pending jobs table.

## Seeded data is for demonstration

Seeders create:

- Sample hotels
- Sample rooms
- Sample guests
- One admin account

This makes testing easier and ensures the system works immediately after installation.

