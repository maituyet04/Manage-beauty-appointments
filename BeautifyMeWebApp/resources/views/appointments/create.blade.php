<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BeautifyMe</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>

    <div class="container">
        <h1>Book an Appointment</h1>
        <form action="{{ route('appointments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="service_id" class="form-label">Service</label>
                <select name="service_id" class="form-select">
                    @foreach ($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="appointment_date" class="form-label">Date</label>
                <input type="datetime-local" name="appointment_date" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
        </form>
    </div>
    


    </body>

</html>