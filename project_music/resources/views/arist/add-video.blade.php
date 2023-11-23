@extends('layouts.index')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2 class="fs-1 fw-bold is-font text-white">เพิ่มวิดีโอ
                    </h2>
            </div>
            <form enctype="multipart/form-data" class="needs-validation" novalidate="" method="POST" action="{{ route('arist.addVideo.post', $id) }}">
                {{ csrf_field() }}
                <div class="row mb-3 p-3" style="background-color: rgba(255,255,255,.8)">
                    <div class="col-md-12 col-lg-12">
                        <h4 class="mb-3">เพิ่มวิดีโอ</h4>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="url_youtube" class="form-label">URL Youtube</label>
                                <div class="input-group has-validation">
                                    <input value="{{ old('url_youtube') }}" name="url_youtube" type="text" class="form-control"
                                        id="url_youtube" placeholder="URL Youtube">
                                    @if ($errors->first('url_youtube'))
                                        <div class="invalid-feedback" style="display: inline-block">
                                            {{ $errors->first('url_youtube') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    

                    <button id="form-submit" class=" mt-4 mb-3 w-100 btn btn-warning btn-lg" type="submit">ยืนยัน</button>
                </div>
            </form>

        </main>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $("#form-submit").click(function() {
            Swal.fire('แจ้งเตือน', 'กำลังทำเนินการ', 'warning')
            Swal.showLoading();
        })
    </script>
@endpush
