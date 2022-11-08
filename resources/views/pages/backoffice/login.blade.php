@include('includes.head')
<section id="back-office">
    <div class="row vh-100 m-0" style="background-image: url({{ asset('img/login.jpg') }});background-size: cover;background-repeat: no-repeat;">
        <div class="col-12 col-lg-6 offset-lg-6 px-5 d-flex align-items-center justify-content-center" style="background-color: white;background-image: linear-gradient(rgba(254, 251, 255, 0) 0%, rgba(175, 12, 233, 0.13) 73.96%, rgba(148, 99, 252, 0.23) 80.73%, rgba(204, 97, 120, 0.3) 91.15%, rgba(252, 96, 8, 0.42) 100%);box-sizing: border-box;">
            <form action="adminlogincek" method="post" class="w-100" style="max-width: 500px;">
                @csrf
                <h1 class="mb-3 text-center">Backoffice</h1>
                <div class="d-flex align-items-center form-container mb-3">
                    <input class="form-control border-0 px-2" type="text" name="username" placeholder="Username" value="{{old('email')}}">
                </div>
                @error('email')
                    {{$message}}
                @enderror
                <div class="d-flex align-items-center form-container mb-3 px-2" style="background-color: white;border-radius: .25rem;">
                    <input class="form-control border-0 px-0 password" type="password" name="password" placeholder="Password">
                    {{-- <i class="fas fa-eye"></i> --}}
                    <span id = "show-hide-password">
                        <i class="fas fa-eye" id="show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
                </div>
                @error('password')
                    {{$message}}
                @enderror
                @if(session('error'))
                    {{session('error')}}
                @endif
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </form>
        </div>
    </div>
</section>

<script src="{{asset('js/home.js')}}"></script>
