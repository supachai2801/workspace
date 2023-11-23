@extends('layouts.index')
@push('css')
    <link rel="stylesheet" href="/plugins/calendar/main.css">

    <style>
        .fc-header-toolbar {
            gap: 3px;
        }

        .fc .fc-toolbar-title {
            font-size: 1.15em;
            white-space: nowrap;
            color: #fff;
        }

        .fc-col-header,
        .fc-day {
            background-color: #fff !important;
        }

        .fc-day-today {
            background-color: #ccc !important
        }

        .slick-slide img {
            display: block;
            object-fit: cover;
            width: 100%;
        }

        .slick-prev:before {
            content: "" !important;
            background-image: url(/plugins/slick-slide/right-arrow.png);
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            width: 41px;
            height: 49px;
            margin-top: -40px;
            margin-left: -16px;
            transform: rotate(180deg);
        }

        .slick-next:before {
            content: "" !important;
            background-image: url(/plugins/slick-slide/right-arrow.png);
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            width: 40px;
            height: 89px;
            margin-top: -25px;
            margin-left: -9px;
        }
    </style>
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="text-center">
                    <img src="{{ $item->getImage }}" style="width:280px; height:250px; object-fit:cover" class="m-auto"
                        alt="" srcset="">
                </div>
                <div class="text-white text-center">TOP</div>
                <div class="text-white text-center">{{ $item->aname }}</div>
                @if (auth()->check())
                    @if (auth()->user()->id == $item->member_id)
                        <div class="text-white text-center"><a href="{{ url('/arists/edit-profile') }}"
                                class="btn btn-xs btn-info">แก้ไขข้อมูล</a>
                        </div>
                        <div class="text-white text-center mt-2"><a href="{{ route('logout') }}"
                                class="btn btn-xs btn-info">ออกจากระบบ</a></div>
                    @endif
                @endif
            </div>
            <div class="col-lg-6 ">
                <div class="p-1 rounded" style="background-color: rgba(255,255,255, .8)">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">รายละเอียด</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">รีวิว</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <pre>{!! $item->details !!}</pre>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            <section class="m-1 text-center text-lg-start shadow-1-strong rounded">
                                <div class="row d-flex justify-content-center gap-1">
                                    @foreach ($reviews as $review)
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body m-3">
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
                                                            <img src="{{ $review->member->getImage }}"
                                                                class="rounded-circle img-fluid shadow-1"
                                                                style="width:100px; height:100px;object-fit: cover" />
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <p class="text-muted fw-light mb-4">
                                                                {{ $review->details_r }}
                                                            </p>
                                                            <p class="fw-bold lead mb-2">
                                                                <strong>{{ $review->member->fname }}
                                                                    {{ $review->member->lname }} </strong>
                                                                @if (auth()->check())
                                                                    @if (auth()->user()->id == $review->member_id)
                                                                        <small><a
                                                                                href="/arists/edit-review/{{ $review->id }}"
                                                                                data-text="{{ $review->details_r }}"
                                                                                data-type="{{ $review->type }}"
                                                                                class="btn-edit-review">แก้ไข</a> | <a
                                                                                href="/remove-review/{{ $review->id }}"
                                                                                class="btn-remove-review">ลบ</a></small>
                                                                    @endif
                                                                @endif
                                                            </p>
                                                            <p class="fw-bold text-muted mb-0">
                                                                {{ $review->type == 1 ? 'ชอบ' : 'ไม่ชอบ' }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (auth()->check())
                                        <div class="col-md-12">
                                            <form method="post" id="form-review"
                                                action="{{ url('arists/' . $item->id . '/review') }}">
                                                {{ csrf_field() }}
                                                <div class="input-group mb-3">
                                                    <input type="hidden" name="arists_id" value="{{ $item->id }}">
                                                    <input type="hidden" name="member_id"
                                                        value="{{ auth()->user()->id }}">
                                                    <input type="text" name="details_r" class="form-control"
                                                        style="width:280px" placeholder="รีวิว ..." aria-label="รีวิว ..."
                                                        aria-describedby="button-addon2" />
                                                    <select name="type" id="" class="form-control">
                                                        <option value="1">ชอบ</option>
                                                        <option value="2">ไม่ชอบ</option>
                                                    </select>
                                                    <button class="btn btn-outline-primary" type="submit"
                                                        id="button-addon2" data-mdb-ripple-color="dark">
                                                        ส่งรีวิว
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </section>
                        </div>

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="fs-4 d-inline-block p-2 text-white">วีดีโอ
                                @if (auth()->check())
                                    @if (auth()->user()->id == $item->member_id)
                                        <a href="{{ url('/arists/' . $item->id . '/add-video') }}"
                                            class="btn btn-xs btn-info">เพิ่มวีดีโอ</a>
                                    @endif
                                @endif

                            </div>
                            <div class="p-2 slide-container">
                                @foreach ($item->videos as $v)
                                    <div class="slide-item d-inline-block mx-1 text-center">
                                        <iframe width="290" height="255" src="{{ $v->url_youtube }}"
                                            title="" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                        @if (auth()->check())
                                            @if (auth()->user()->id == $item->member_id)
                                                <a href="{{ url('/arists/' . $v->id . '/remove-video') }}"
                                                    class="btn btn-danger remove-clip">ลบ</a>
                                            @endif
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div id="calendar"></div>
                
                @if (auth()->check())
                    @if ($item->member_id != auth()->user()->id)
                    <div>
                        <a href="#" id="event_action" class="btn btn-primary mt-3" style="margin:auto">จอง</a>
                        <a href="#" id="sus_action" class="btn btn-danger mt-3" style="margin:auto">ร้องเรียน</a>
                    </div>
                    @endif
                @endif
                <div style="font-size:11px; margin-top:3px;color:white">
                    สีแดง หมายถึง จองรอวงดนตรียอมรับการจอง
                    <br>
                    สีเขียว หมายถึง จองเรียบร้อยวงดนตรียอมรับการจอง
                </div>
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="/plugins/calendar/main.js"></script>
    <script>
        var events = {!! $events !!};
        var date_event_select = null;
        $(function() {

            $(document).on('click', '#event_action', function() {
                if (date_event_select == null) {
                    Swal.fire('แจ้งเตือน', 'กรุณาเลือกวันที่ๆ ต้องการจอง', 'warning')
                    return false;
                }

                Swal.fire({
                    title: 'ต้องการจองวันที่เลือกนี้หรือไม่?',
                    text: 'ท่านได้เลือกวันที่ ' + date_event_select.dateStr,
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                }).then(function(result) {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('กำลังทำรายการกรุณารอสักครู่', '', 'warning')
                        Swal.showLoading();
                        $.ajax({
                                method: "POST",
                                url: "{{ url('arists/' . $item->id . '/event') }}",
                                data: {
                                    event_date: date_event_select.dateStr
                                }
                            })
                            .done(function(msg) {
                                Swal.fire('แจ้งเตือน', 'ทำรายการเรียบร้อยแล้ว', 'success')
                                console.log(msg)
                                events = msg
                                calendar.addEvent(msg)
                                Swal.hideLoading();
                            });
                    }
                })
            })
            $('.slide-container').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ],

            });
        })
    </script>

    <script>
        var calendar;
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            calendar = new FullCalendar.Calendar(calendarEl, {
                // height: '100%',
                expandRows: true,
                slotMinTime: '08:00',
                slotMaxTime: '20:00',
                dateClick: function(info) {
                    console.log(info)
                    date_event_select = info
                },
                eventClick: function(info) {
                    console.log(info, info.event.extendedProps)
                    if (info.event.extendedProps.arist.member_id == "{{ auth()->check() ? auth()->user()->id : '-1' }}") {
                        Swal.fire({
                            title: 'ท่านต้องการรับการจองนี้หรือไม่',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'รับการจอง',
                            denyButtonText: `ปฏิเสธการจอง`,
                            cancelButtonText: `ยกเลิก`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.href = "/arists/event/2/" + info.event
                                    .extendedProps.id
                            } else if (result.isDenied) {
                                location.href = "/arists/event/3/" + info.event
                                    .extendedProps.id
                            }
                        })
                        // change the border color just for fun
                        info.el.style.borderColor = 'red';
                    }

                    if(info.event.extendedProps.member_id == '{{ auth()->check() ? auth()->user()->id : '-1' }}') {
                        Swal.fire({
                            title: 'ท่านต้องการยกเลิกการจองของท่านหรือไม่ ?',
                            showCancelButton: true,
                            confirmButtonText: 'ยกเลิกการจอง',
                            cancelButtonText: `ไม่ยกเลิก`,
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.href = "/arists/event-cancel/" + info.event
                                    .extendedProps.id
                            } 
                        })
                    } 

                },
                locale: 'th-TH',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                initialView: 'dayGridMonth',
                navLinks: false, // can click day/week names to navigate views
                // editable: true,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: false, // allow "more" link when too many events
                events: events


            });

            calendar.render();
        });
    </script>
    <script>
        $(function() {
            $(document).on('click', '.btn-remove-review', function(e) {
                e.preventDefault();
                var el = $(this);
                Swal.fire({
                    title: 'ต้องการลบรายการนี้หรือไม่?',
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        location.href = el.attr('href');
                    }
                })
            })
            $(document).on('click', '.btn-edit-review', function(e) {
                e.preventDefault();
                var el = $(this)
                $('#form-review').attr('action', el.attr('href'))
                $('input[name="details_r"]').val(el.attr('data-text'))
                $('select[name="type"]').val(el.attr('data-type'))
            })

            $(document).on('click', '#sus_action', function(e) {
                e.preventDefault();
                var el = $(this)
                Swal.fire({
                    title: 'ส่งข้อมูลร้องเรียน',
                    input: 'text',
                    inputAttributes: {
                        autocapitalize: 'off'
                    },
                    showCancelButton: true,
                    confirmButtonText: 'ส่งข้อมูล',
                    showLoaderOnConfirm: true,
                    preConfirm: function(text) {
                        return $.ajax({
                            url: '/arists/report/' + {{ $item->id }},
                            data: {
                                text: text
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: `ทำรายการเรียบร้อยแล้ว`,
                        })
                    }
                })
            })
            $(document).on('click', '.remove-clip', function(e) {
                var el = $(this);
                e.preventDefault();
                Swal.fire({
                    title: 'ต้องการลบรายการนี้หรือไม่?',
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        location.href = el.attr('href');
                    }
                })
            })
        })
    </script>
@endpush
