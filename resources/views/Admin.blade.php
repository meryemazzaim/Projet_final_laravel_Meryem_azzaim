<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="bg-body-tertiary  ">


    <div class=" d-flex justify-center w-40% bg-slate-400">

        <div class="flex flex-row px-3 gap-y-5 mt-4  w-50">
            <div class="mt-5">
                <img width="100%" src="{{ asset('images/imag.jpg') }} " alt="">
            </div>

            <div class="gap-x-10">

                @include('components.Modal')

            </div>
        </div>

        <div class=" w-40% bg-white rounded-3xl border-none p-3" id="calendar"></div>

    </div>









    <div class="d-flex flex-row pt-5 gap-4 justify-center     ">



        @foreach ($events as $event)
            <div class="card btn btn-secondary" style="width: 18rem; ">
                <img width="200" src="https://source.unsplash.com/random/350x350" alt=" random imgee"
                    class="w-full object-cover object-center rounded-lg shadow-md">

                <ul class="list-group list-group-flush bg-info  ">
                    <h1>Event Name</h1>
                    <li class="list-group-item ">{{ $event->name }}</li>
                    <h1> Event dateStart</h1>

                    <li class="list-group-item">{{ $event->dateStart }}</li>
                    <h1>Event dateEnd</h1>
                    <li class="list-group-item">{{ $event->dateEnd }}</li>

                    <h1>Event timeEnd</h1>
                    <li class="list-group-item">{{ $event->timeEnd }}</li>

                    {{-- <li class="list-group-item">{{ $event->dateStart }}</li>
                    <h1>Event dateStart</h1> --}}



                </ul>
                <div class="d-flex flex-row w-40 ">
                    <div class="card-footer btn btn-outline-info">
                        @include('modaledit')
                    </div>
                    {{-- <button class="card-footer btn btn-primary ">
                        Update
                    </button> --}}

                    <form action="{{ route('home.destroy', $event) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="card-footer bg-red-600  btn btn-outline-danger">Delete</button>
                    </form>



                </div>

            </div>
        @endforeach
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', async function() {

            const {
                data
            } = await axios.get("/calendar/show")

            const events = data.events;
            // console.log(data);



            var myCalendar = document.getElementById('calendar');


            var calendar = new FullCalendar.Calendar(myCalendar, {
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                    right: 'listMonth,listWeek,listDay'
                },
                views: {
                    listDay: { // Customize the name for listDay
                        buttonText: 'Day Events',
                    },
                    listWeek: { // Customize the name for listWeek
                        buttonText: 'Week Events'
                    },
                    listMonth: { // Customize the name for listMonth
                        buttonText: 'Month Events'
                    },
                    timeGridWeek: {
                        buttonText: 'Week', // Customize the button text
                    },
                    timeGridDay: {
                        buttonText: "Day",
                    },
                    dayGridMonth: {
                        buttonText: "Month",
                    },

                },

                initialView: "timeGridWeek",
                slotMinTime: "09:00:00", // min  time  appear in the calendar
                slotMaxTime: "19:00:00",
                nowIndicator: true,
                selectable: true,
                selectMirror: true,
                selectOverlap: true,
                weekends: true,

                events: events,

                selectAllow: (info) => {
                    let instant = new Date()
                    return info.start > instant
                },

                select: (info) => {

                    let start = info.start
                    let end = info.end


                    if (end.getDate() - start.getDate() > 0 && !info.allDay) {
                        alert("rak khditi bzaf dyal l wa9t")
                        calendar.unselect()
                        return
                    }
                    document.getElementById("date-start").value = formatDate(start).day
                    if (info.allDay) {
                        document.getElementById("date-end").value = formatDate(start).day
                        document.getElementById("time-start").value = "09:00:00"
                        document.getElementById("time-end").value = "19:00:00"
                    } else {
                        document.getElementById("date-end").value = formatDate(end).day
                        document.getElementById("time-start").value = formatDate(start).time
                        document.getElementById("time-end").value = formatDate(end).time
                    }


                    document.getElementById("clickMe").click()


                },

                eventClick: (info) => {
                    // alert("event clicked")

                    console.log(info);
                }


            });


            calendar.render();


            function formatDate(date) {
                let year = String(date.getFullYear())
                let month = String(date.getMonth() + 1).padStart(2, 0)
                let day = String(date.getDate()).padStart(2, 0)

                let hour = String(date.getHours()).padStart(2, 0)
                let min = String(date.getMinutes()).padStart(2, 0)
                let sec = String(date.getSeconds()).padStart(2, 0)

                return {
                    day: `${year}-${month}-${day}`,
                    time: `${hour}:${min}:${sec}`
                }


            }
        });
    </script>

</body>

</html>
