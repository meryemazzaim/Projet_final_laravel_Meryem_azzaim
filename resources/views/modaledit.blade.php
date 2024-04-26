<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#events{{ $event->id }}">
    edit
</button>

<!-- Modal -->
<div class="modal fade" id="events{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="flex  flex-col px-3 gap-y-5 mt-4  w-100" action="{{ route('home.update', $event) }}"
                    method="post">
                    @csrf
                    @method('PUT')

                    <label for="">Event Title</label>
                    <input value="{{ old('name', $event->name) }}" name="name" placeholder="Event Title"
                        type="text">
                    <label for="">Start Day</label>
                    <input value="{{ old('dateStart', $event->dateStart) }}" name="dateStart" min="{{ date('Y-m-d') }}"
                        value="{{ date('Y-m-d') }}" id="date-start" type="date">
                    <label for="">Start time</label>
                    <input value="{{ old('timeStart', $event->timeStart) }}" name="timeStart" step="1800" required
                        min="08:00:00" max="19:00:00" value="09:30:00" id="time-start" type="time">


                    <label for="">end Day</label>
                    <input value="{{ old('dateEnd', $event->dateEnd) }}" name="dateEnd" id="date-end" type="date">
                    <label for="">end time</label>
                    <input value="{{ old('timeEnd', $event->timeEnd) }}" name="timeEnd" id="time-end" type="time">
                    <label for="">location</label>
                    <input value="{{ old('location', $event->location) }}" name="location" id="location"
                        type="location" placeholder="location event">
                    <label for="">price</label>
                    <input value="{{ old('price', $event->price) }}" name="price" id="price" type="price"
                        placeholder="price event">




                    <button onclick="window.location.href='/session'" class="w-f py-3 bg-purple-950">creé your
                        event</button>

                </form>

            </div>
        </div>
    </div>
</div>
