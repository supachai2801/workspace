@extends('layouts.index')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2 class="fs-1 fw-bold is-font text-white">แก้ไขข้อมูลวงดนตรี
                    </h2>
            </div>
            <form enctype="multipart/form-data" class="needs-validation" novalidate="" method="POST" action="{{ route('arist.edit') }}">
                {{ csrf_field() }}
                <div class="row mb-3 p-3" style="background-color: rgba(255,255,255,.8)">
                    <div class="col-md-12 col-lg-8">
                        <h4 class="mb-3">แก้ไขข้อมูลวงดนตรี</h4>
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="aname" class="form-label">ชื่อวงดนตรี</label>
                                <div class="input-group has-validation">
                                    <input value="{{ $arist->aname }}" name="aname" type="text" class="form-control"
                                        id="aname" placeholder="ชื่อวงดนตรี">
                                    @if ($errors->first('aname'))
                                        <div class="invalid-feedback" style="display: inline-block">
                                            {{ $errors->first('aname') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="details" class="form-label">รายละเอียด</label>
                                <div class="input-group has-validation">
                                    <textarea rows='10'  name="details" type="text" class="form-control"
                                        id="details" placeholder="รายละเอียด">{!! $arist->details !!}</textarea>
                                    @if ($errors->first('details'))
                                        <div class="invalid-feedback" style="display: inline-block">
                                            {{ $errors->first('details') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="style" class="form-label">แนวเพลง</label>
                                <select class="form-select" id="style" name="style">
                                    <option value="">เลือกรูปแบบนตรี</option>
                                    @foreach($style as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $arist->style ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('style'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('style') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <input class="form-control" type="file" name="image_a" accept="image/*" onchange="loadFile(event)">
                        <img class="img-thumbnail mt-3" id="output" src="{{ $arist->getImage }}" />
                        @if ($errors->first('image_a'))
                            <div class="invalid-feedback" style="display: inline-block">
                                {{ $errors->first('image_a') }}
                            </div>
                        @endif
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
