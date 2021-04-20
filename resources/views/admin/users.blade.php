@extends('/layout')

@section('adminuser')
@if (Auth::user()->admin==true)
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
                                    <td class="col-lg-1 bg-success text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Id</td>
                                    <td class="col-lg-1 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Name</td>
                                    <td class="col-lg-2 bg-primary text-white"
                                        style="border: 1px solid black; border-radius: 10px;">Email</td>
                                    

                                </tr>

                                @foreach (Auth::all() as $item)
                                    <tr>
                                        <td class="col-lg-1" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->name }}</td>
                                        <td class="col-lg-2" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->email }}</td>
                                        <td class="col-lg-2" style="border: 1px solid black; border-radius: 10px;">
                                            {{ $item->message }}</td>


                                    </tr>

                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

@endsection