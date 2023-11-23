@extends('layouts.index')
@push('css')
    <style>
        .icon {
            background-image: url('/images/ae3b799a51823cf601f5c8303179aaf5.png');
            background-size: 180px;
            background-repeat: no-repeat;
            width: 50px;
            height: 50px;
            display: inline-block;
        }
        .icon-facebook {
            background-position: -13px -5px;
        }
        .icon-line {
            background-position: -64px -123px;
        }

        .icon-instagram {
            background-position: -64px -5px;
        }
        .social {
            display: flex;
            align-items: center;
            gap: 12px;
        }
    </style>
@endpush
@section('content')
<div class="container my-3 p-4" style="background-color: rgba(0,0,0,.7)">
    <div class="text-white text-center">
        <h1>CONTACT US</h1>
        <div class="fs-4">
            <ul style="list-style: none" class="text-start">
                <li class="ps-5 py-3 social" ><div class="icon icon-facebook"></div>FACEBOOK</li>
                <li class="ps-5 py-3 social"><div class="icon icon-line"></div>LINE</li>
                <li class="ps-5 py-3 social"><div class="icon icon-instagram"></div>INSTAGRAM</li>
            </ul>

        </div>
    </div>
</div>
@endsection
