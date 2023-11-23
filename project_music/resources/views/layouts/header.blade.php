<header class="p-3 text-bg-dark">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-end justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <img style="width: 154px;" src="{{ asset('images/logo-b.png') }}" alt="Logo" srcset="">
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('home') }}"
                        class="nav-link px-2 {{ request()->route()->getName() == 'home'? 'text-secondary': 'text-white' }}">HOME</a>
                </li>
                <li><a href="{{ route('arist.index') }}"
                        class="nav-link px-2 {{ request()->route()->getName() == 'arist'? 'text-secondary': 'text-white' }}">ARIST</a>
                </li>
                <li><a href="{{ route('aboutUs') }}"
                        class="nav-link px-2 {{ request()->route()->getName() == 'aboutUs'? 'text-secondary': 'text-white' }}">ABOUT
                        US</a></li>
                <li><a href="{{ route('contactUs') }}"
                        class="nav-link px-2 {{ request()->route()->getName() == 'contactUs'? 'text-secondary': 'text-white' }}">CONTACT
                        US</a></li>
            </ul>


            <div class="text-end">
                @if (!auth()->check())
                    <button type="button" class="btn btn-warning btn-register-login" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">สมัครสมาชิก/เข้าสู่ระบบ</button>
                @else
                <a href="{{ route('editProfile') }}" class="btn btn-warning btn-register-login"><img class="img-thumbnail" style="width:64px" src="{{ auth()->user()->getImage }}" alt="" srcset=""> {{auth()->user()->fname}} {{auth()->user()->lname}}</a> 
                @endif
            </div>
        </div>
    </div>
</header>
