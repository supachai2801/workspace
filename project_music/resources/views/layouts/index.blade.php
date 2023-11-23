<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Layout - @yield('title', 'welcome home')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="/plugins/slick-slide/slick.css">
    <link rel="stylesheet" href="/plugins/slick-slide/slick-theme.css">
    <link rel="stylesheet" href="/plugins/sweedalert/dist/sweetalert2.min.css">
    @stack('css')
    <style>
        .btn-register-login,
        .is-font {
            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body class="frontend">
    {{-- <pre>
        {{ print_r(session()->all()) }}
    </pre> --}}

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')




    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-bg-dark">

                <form action="{{ route('login') }}" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="d-flex flex-column gap-4">
                            <div class="text-center">
                                <img style="width: 154px;" class="m-auto" src="{{ asset('images/logo-b.png') }}"
                                    alt="Logo" srcset="">
                            </div>
                            <div class="text-center text-hilight">
                                <div class="fs-3">เข้าสู่ระบบ</div>
                            </div>
                            <input name="username" class="form-control mb-2" type="text" placeholder="Username"
                                aria-label="default input example">
                            <input name="password" class="form-control mb-2" type="password" placeholder="Password"
                                aria-label="default input example">
                            <div>
                                <button type="submit" class="btn btn-warning w-100 btn-md is-font">เข้าสู่ระบบ</button>
                            </div>
                            <div>
                                ยังไม่ได้เป็นสมาชิก ? <a href="{{ route('register') }}" class="text-pink">
                                    คลิ๊กที่นี่</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script src="/plugins/slick-slide/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script src="/plugins/sweedalert/dist/sweetalert2.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
@stack('js')
<script>
    $(function() {
        @if (session()->has('message'))
            Swal.fire('แจ้งเตือน', '{{ session()->get('message') }}', 'success')
        @endif

        @if (session()->has('error_message'))
            Swal.fire('แจ้งเตือน', '{{ session()->get('error_message') }}', 'error')
        @endif
    })
</script>

</html>
