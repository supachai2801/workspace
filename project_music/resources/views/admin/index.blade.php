<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

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
</head>

<body>
    <div class="container">

        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarExample01">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" aria-current="page" href="#">Suspended</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/admin/logout">ออกจากระบบ</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar -->

        </header>
        <h2 class="mb-4">Suspended</h2>
        <table class="table align-middle mb-3 bg-white">
            <thead class="bg-light">
                <tr>
                    <th>วงดนตรี</th>
                    <th>รายละเอียด</th>
                    <th>เห็นด้วย/ไม่เห็นด้วย</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="dd{{ $report->arist->getImage }}" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">{{ $report->arist->aname }}</p>
                                    <p class="text-muted mb-0">{{ $report->arist->styleObj->name }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $report->details_report }}</p>
                            <p class="fw-normal mb-1">ผู้แจ้ง : {{ $report->member->fname }}
                                {{ $report->member->lname }}</p>
                        </td>

                        <td>
                            @if ($report->flag == '0')
                                <a data-num="{{ $report->arist->reports->count() }}" href="/admin/approve/1/{{ $report->id }}"
                                    class="btn confirm btn-link btn-sm btn-rounded">
                                    เห็นด้วย
                                </a>
                                <a href="/admin/approve/2/{{ $report->id }}"
                                    class="btn confirm btn-link btn-sm btn-rounded">
                                    ไม่เห็นด้วย
                                </a>
                            @elseif($report->flag == '1')
                                เห็นด้วย
                            @elseif($report->flag == '2')
                                ไม่เห็นด้วย
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $reports->render() }}
    </div>







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

    <script>
        $(function() {
            @if (session()->has('message'))
                Swal.fire('แจ้งเตือน', '{{ session()->get('message') }}', 'success')
            @endif

            @if (session()->has('error_message'))
                Swal.fire('แจ้งเตือน', '{{ session()->get('error_message') }}', 'error')
            @endif

            $(document).on('click', '.confirm', function(e) {
                var num = $(this).attr('data-num')
                e.preventDefault();
                var el = $(this);
                Swal.fire({
                    title: 'ท่านต้องการทำรายการต่อหรือไม่? ผู้ถูกร้องเรียนโดนร้องเรียนแล้ว '+ num + ' ครั้ง หากครบ 3 ครั้งจะโดนระงับการใช้งาน',
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                    cancelButtonText: 'ยกเลิก',
                }).then(function(result)  {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        location.href=el.attr('href')
                    } 
                })
            })
        })
    </script>

</body>

</html>
