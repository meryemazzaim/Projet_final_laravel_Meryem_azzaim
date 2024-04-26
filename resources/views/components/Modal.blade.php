<!-- Button trigger modal -->
<button id="clickMe" type="button" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
    {{-- Launch demo modal --}}
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Event </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="background: #2e6da4; color:white w-40%">
                <form method="post" class="w-full   rounded-3xl flex flex-col gap-y-5 " action="/calendar/store">
                    @csrf
                    <label for="">Event Title</label>
                    <input class="" name="name" placeholder="Event Title" type="text">
                    <label for="">Start Day</label>
                    <input name="dateStart" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" id="date-start"
                        type="date">
                    <label for="">Start time</label>
                    <input name="timeStart" step="1800" required min="08:00:00" max="19:00:00" value="09:30:00"
                        id="time-start" type="time">


                    <label for="">end Day</label>
                    <input name="dateEnd" id="date-end" type="date">
                    <label for="">end time</label>
                    <input name="timeEnd" id="time-end" type="time">
                    <label for="">location</label>
                    <input name="location" id="location" type="location">
                    <label for="">price</label>
                    <input name="price" id="price" type="price">




                    <button  class="w-f py-3  btn btn-outline-secondary text-white rounded-3xl bg-purple-950">
                        Event </button>
                </form>

            </div>

        </div>
    </div>
</div>
