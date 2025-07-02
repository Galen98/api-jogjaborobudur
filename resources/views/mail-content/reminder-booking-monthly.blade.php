<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h2>Upcoming Bookings for Next Month</h2>
<table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th>Invoice Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Travel Date</th>
            <th>Travel</th>
            <th>Option</th>
            <th>Special Request</th>
            <th>Time</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
      
        @foreach($bookings as $booking)
            <tr>
                <td>#invoice{{ $booking->id }}</td>
                <td>{{ $booking->name }} {{ $booking->surname }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->travelDate }}</td>
                <td>{{ $booking->travelName }}</td>
                <td>{{ $booking->optionName }}</td>
                <td>{{ $booking->specialReq }}</td>
                <td>{{ $booking->pickupTime }}</td>
                <td>{{ $booking->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>