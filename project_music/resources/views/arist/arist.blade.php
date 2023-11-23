@extends('layouts.index')


@section('content')
    <div class="px-4 py-5 my-5 text-center is-font">

        <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form class="row g-3">
                    <div class="col-auto">
                        <input name="aname" value="{{ request()->aname }}" style="width: 338px;" type="text" class="form-control-lg" id="artis_name"
                            placeholder="ชื่อวงดนตรี/นักร้อง/นักดนตรี">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-warning mb-3">ค้นหาศิลปินเลย</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    @php 
    $hasArist = false;
    @endphp
    @foreach ($style as $item)
    @if(count($item->arist) == 0)
    @continue
    @endif
    <div class="container my-2">
        <div class="fs-4 d-inline-block p-2 text-white" style="background-color: rgba(0,0,0,.6)">{{$item->name}}</div>
        <div class="fs-4 p-2 slide-container" style="background-color: rgba(0,0,0,.6)">
            @foreach($item->arist as $ar)
            <div class="slide-item d-inline-block mx-1 ">
                <div class="text-center">
                    <a href="{{ $ar->link }}"><img src="{{$ar->getImage}}" style="width:250px;height:250px; object-fit:cover" class="m-auto" alt="" srcset=""></a>
                </div>
                <div class="text-white text-center">TOP</div>
                <a href="{{ $ar->link }}"><div class="text-white text-center">{{ $ar->aname }}</div></a>
            </div>
            @endforeach
        </div>
    </div>
    @php
    $hasArist = true;
    @endphp

    @endforeach
    @if($hasArist === false)
    <div class="container my-2">
        <div class="fs-4 d-inline-block p-2 text-white" style="background-color: rgba(0,0,0,.6)">ไม่พบวงดนตรีที่ต้องการค้นหา</div>
        
    </div>
    @endif
@endsection

@push('js')
    <script>
        $(function() {
            $('.slide-container').slick({
                infinite: true,
                slidesToShow: 4,
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
                ]
            });
        })
    </script>
@endpush
