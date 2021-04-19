@extends('layout')

@section('myreservation')

    @if (Auth::user())
        <section class="section" id="reservation">
            <div class="container">
                <div class="col-lg-12">
                    <div class="row bg-white">
                        <div class="col-lg-12 mt-4 mb-4">
                            <h4 class="text-center">Table Reservation</h4>
                            @if (Request::session()->get('message'))
                                <div class="text-success">{{ Request::session()->get('message') }}</div>
                            @endif
                            @if (Request::session()->get('addedReservation'))
                                            <div class="text-success mb-2">{{ Request::session()->get('addedReservation') }}
                                            </div>
                                        @endif
                            
                        </div>
                        <div class="col-lg-12 mb-4">
                            <table style="border-collapse: separate; border: 1px solid black; border-radius: 10px;">
                                <tr class="col-lg-12">
                                    <td class="col-lg-1 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Name</td>
                                    <td class="col-lg-2 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Email</td>
                                    <td class="col-lg-2 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Phone</td>
                                    <td class="col-lg-1 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Guest Number</td>
                                    <td class="col-lg-1 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Date</td>
                                    <td class="col-lg-1 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Time</td>
                                    <td class="col-lg-4 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Message</td>
                                    <td class="col-lg-1 bg-danger text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Delete</td>
                                </tr>
                                @foreach ($myAllReservation as $item)
                                    <tr>
                                        <td class="col-lg-1" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->name }}</td>
                                        <td class="col-lg-2" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->email }}</td>
                                        <td class="col-lg-2" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->phone }}</td>
                                        <td class="col-lg-1" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->guest_number }}</td>
                                        <td class="col-lg-1" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->reservation_date }}</td>
                                        <td class="col-lg-1" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->reservation_time }}</td>
                                        <td class="col-lg-4" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->message }}</td>
                                        <td>
                                            <form action="/deleteReservation" method="post">
                                                @csrf
                                                <button name="deleteReservation" class="btn btn-outline-danger"
                                                    value="{{ $id = $item->id }}">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

@endsection()
