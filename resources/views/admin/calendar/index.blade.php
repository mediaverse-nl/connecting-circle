@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-body">
            <span class="h3 align-items-center">
               Calendar
            </span>
{{--            <span class="float-right">--}}
{{--                <a href="{!! route('admin.specialty.create') !!}" class="btn-success btn">aanmaken</a>--}}
{{--            </span>--}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" />
    <style>

    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/locale-all.min.js" integrity="sha512-L0BJbEKoy0y4//RCPsfL3t/5Q/Ej5GJo8sx1sDr56XdI7UQMkpnXGYZ/CCmPTF+5YEJID78mRgdqRCo1GrdVKw==" crossorigin="anonymous"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //     var calendarEl = document.getElementById('calendar');
        //     var calendar = new FullCalendar.Calendar(calendarEl, {
        //         initialView: 'dayGridMonth'
        //     });
        //     calendar.render();
        // });
        $(document).ready(function() {

            $('#calendar').fullCalendar({
                locale: 'nl',
                header: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,list'
                },
                eventLimit: true, // for all non-agenda views
                views: {
                    agenda: {
                        eventLimit: 6 // adjust to 6 only for agendaWeek/agendaDay
                    }
                },
                events: [
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event1',
                        start: '2020-09-01'
                    },
                    {
                        title: 'event2',
                        start: '2020-09-05',
                        end: '2020-09-07'
                    },
                    {
                        title: 'event3',
                        start: '2020-09-09T12:30:00',
                        allDay: false // will make the time show

                    }
                ]
            });
        });
    </script>
@endpush
