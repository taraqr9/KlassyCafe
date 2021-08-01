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
                        <div>
                            <a href="download" class="btn btn-outline-success mb-5 ml-3">Download PDF</a>
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
                                    <td class="col-lg-1 bg-success text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Status</td>

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

                                        @if ($item->status == false)
                                            <form action="/deleteReservation" method="post">
                                                @csrf
                                                <td>
                                                    <button name="deleteReservation" class="btn btn-outline-danger m-3"
                                                        value="{{ $id = $item->id }}">Delete</button>
                                                </td>
                                            </form>
                                        @else
                                            <td class="col-lg-1 bg-success text-white"
                                                style="border: 1px solid black; border-radius: 10px;">Approved</td>
                                        @endif

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
