@extends('layouts.index')


@section('content')
    <div class="d-flex flex-row pt-5 gap-4  justify-center pb-5 ">
        @foreach ($events as $event)
            <div class="card btn btn-outline-secondary" style="width: 18rem;">
                <ul class="list-group list-group-flush  ">
                    <h1 class="text-start"><b>Event Name</b> </h1>
                    <li class="list-group-item">{{ $event->name }}</li>
                    <h1 class="text-start"><b>Event dateStart</b></h1>

                    <li class="list-group-item">{{ $event->dateStart }}</li>
                    <h1 class="text-start"> <b>Event dateEnd</b></h1>
                    <li class="list-group-item">{{ $event->dateEnd }}</li>

                    <h1 class="text-start"> <b>Event timeEnd</b></h1>
                    <li class="list-group-item">{{ $event->timeEnd }}</li>

                    {{-- <li class="list-group-item">{{ $event->dateStart }}</li>
                <h1>Event dateStart</h1> --}}



                </ul>
                <div class="d-flex flex-row w-40 ">
                    <div class="card-footer btn btn-outline-success">
                        {{-- <a href="{{ url('/register') }}"> reserve event</a> --}}

                        {{-- onclick="window.location.href='/session'" --}}
                    </div>
                    <form action="/session" method="get">
                        @csrf
                        <div class="card-footer btn btn-primary">
                            <button href="{{ route('event.buy', $event) }}">Buy</button>
                        </div>
                    </form>
                </div>

            </div>
        @endforeach
    </div>
@endsection
