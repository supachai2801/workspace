@extends('layouts.index')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2 class="fs-1 fw-bold is-font text-white">สมัครสมาชิก</h2>
            </div>
            <form enctype="multipart/form-data" class="needs-validation" novalidate="" method="POST" action="{{ route('register.post') }}">
                {{ csrf_field() }}
                <div class="row mb-3 p-3" style="background-color: rgba(255,255,255,.8)">
                    <div class="col-md-12 col-lg-8">
                        <h4 class="mb-3">สมัครสมาชิก</h4>
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <input value="{{ old('username') }}" name="username" type="text" class="form-control"
                                        id="username" placeholder="Username">
                                    @if ($errors->first('username'))
                                        <div class="invalid-feedback" style="display: inline-block">
                                            {{ $errors->first('username') }}
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">รหัสผ่าน </label>
                                <input value="{{ old('password') }}" name="password" type="password" class="form-control"
                                    id="password" placeholder="รหัสผ่าน">
                                @if ($errors->first('password'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="password_confirmation" class="form-label">ยืนยันรหัสผ่าน </label>
                                <input value="{{ old('password_confirmation') }}" name="password_confirmation"
                                    type="password" class="form-control" id="password_confirmation"
                                    placeholder="ยืนยันรหัสผ่าน">
                                @if ($errors->first('password_confirmation'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">ชื่อ</label>
                                <input type="text" name="fname" value="{{ old('fname') }}" class="form-control"
                                    id="address" placeholder="ชื่อ" required="">
                                @if ($errors->first('fname'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('fname') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">นามสกุล</label>
                                <input value="{{ old('lname') }}" name="lname" type="text" class="form-control"
                                    id="lname" placeholder="นามสกุล" required="">
                                @if ($errors->first('lname'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('lname') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="phone" class="form-label">เบอร์โทรศัพท์ </label>
                                <input value="{{ old('phone') }}" name="phone" maxlength="10" type="text" class="form-control"
                                    id="phone" placeholder="เบอร์โทรศัพท์">
                                @if ($errors->first('phone'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">E-mail </label>
                                <input value="{{ old('email') }}" name="email" type="text" class="form-control"
                                    id="email" placeholder="E-mail">
                                @if ($errors->first('email'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>


                            <div class="col-12">
                                <div class="form-check">
                                    <input id="male" name="sex" type="radio" class="form-check-input"
                                        checked="" value="1" required="">
                                    <label class="form-check-label" for="credit">ชาย</label>
                                </div>
                                <div class="form-check">
                                    <input id="female" name="sex" type="radio" class="form-check-input"
                                        required="" value="2">
                                    <label class="form-check-label" for="debit">หญิง</label>
                                </div>

                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">ที่อยู่</label>
                                <input type="text" value="{{ old('address') }}" class="form-control" name="address" id="address"
                                    placeholder="ที่อยู่">
                                @if ($errors->first('address'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <label for="county" class="form-label">จังหวัด</label>
                                <select class="form-select" id="county" name="county">
                                    <option value="">จังหวัด</option>
                                    @foreach ($provinces as $item)
                                    <option {{ old('county') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{$item->name_th}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('county'))
                                    <div class="invalid-feedback" style="display: inline-block">
                                        {{ $errors->first('county') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" type="file" name="image_p" accept="image/*" onchange="loadFile(event)">
                        <img class="img-thumbnail mt-3" id="output" />
                        @if ($errors->first('image_p'))
                            <div class="invalid-feedback" style="display: inline-block">
                                {{ $errors->first('image_p') }}
                            </div>
                        @endif
                    </div>

                    <button id="form-submit" class="mb-3 w-100 btn btn-warning btn-lg mt-3" type="submit">ยืนยัน</button>
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
