<section id="head-nav">
    <div class="d-flex justify-content-between px-3" style="height: 64px;background-color: #FF9142;color: white;width: 100%;">
        <div class="h-100 d-flex align-items-center">
            {{-- <i class="fas fa-bars fa-thin fa-lg p-4 me-3"></i> --}}
            <a href="/"class="dropdown-item" style="cursor: default;"><p>LOGO</p></a>
            {{-- <img class="h-75 py-2" src="{{ asset('img/logoWhite.png') }}"> --}}
        </div>
        {{-- <div class="h-100 d-none d-lg-flex justify-content-center align-items-center">
            <a href="/"><button class="btn" type="button" style="color: white">HOME</button></a>
            <div class="dropdown">
                <button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"
                    style="color: inherit">ACTIVITIES</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">First Item</a>
                    <a class="dropdown-item" href="#">Second Item</a>
                    <a class="dropdown-item" href="#">Third Item</a>
                </div>
            </div>
            <button class="btn" type="button" style="color: inherit">EVENT</button>
            <button class="btn" type="button" style="color: inherit">PROMO</button>
            <div class="dropdown">
                <button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button"
                    style="color: inherit">HELP DESK</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">First Item</a>
                    <a class="dropdown-item" href="#">Second Item</a>
                    <a class="dropdown-item" href="#">Third Item</a>
                </div>
            </div>
        </div> --}}

        <div class="h-100 d-flex align-items-center justify-content-end p-3">
        @if(Auth::guard('user')->user())
        <div class="dropdown me-4">
            <button class="btn p-0" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="outline: none;box-shadow: none;">
                <p>{{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->middle_name}} {{Auth::guard('user')->user()->last_name}}</p>
                <i class = "fa fa-circle-user" style = "font-size:1.5rem; color:white;"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                {{-- <a href="/{{strtolower(auth()->guard('admin')->user()->role->name)}}/changePassword"class="dropdown-item" style="cursor: default;">Change Password</a> --}}
                <a href="/history"class="dropdown-item" style="cursor: default;">History</a>
                <a href="/logout" class="dropdown-item" style="cursor: default;">Logout</a>
            </div>
        </div>
        @else
            <i class="fas fa-thin fa-user-group"></i>
            <button id="btn-login" class="btn" type="button" style="color: inherit">Login</button>
            <button class="btn" type="button" style="border: 1px solid;border-radius: 25px;border-color: rgb(255,255,255,0.5); color: inherit;">Register</button>
        @endif
        </div>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="modal-login">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-master-header" class="modal-title" style="color: black;">Login/Register</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <h5>Login</h5>
                            <form class="h-100" method="POST" action="/logincek">
                                @csrf
                                <div class="h-100 d-flex flex-column justify-content-between">
                                    <div class="h-100 d-flex align-items-center">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <input type="text" id="email" class="form-control" name="email" placeholder="Email" >
                                            </div>
                                            <div class="col-12 mb-2">
                                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end modal-footer">
                                        <button class="btn btn-primary" type="submit">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-6">
                            <h5>Register</h5>
                            <br>
                            <form method="POST" action="/register">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <div class="form-control d-flex" >
                                            <select style="outline: none; border: none;" id="title" name="title">
                                                <option value="mr">Mr</option>
                                                <option value="mrs">Mrs</option>
                                                <option value="ms">Ms</option>
                                            </select>
                                            <input class="w-100" style="outline: none; border: none;" type="text" id="name" name="nama" placeholder = "Nama Lengkap" required/>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" name="email" class="form-control" placeholder="E-mail" email/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" name="phone" class="form-control" placeholder="Phone Number" required/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" required/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="password" id="confpass" class="form-control" name="confirm_password" placeholder="Confirm Password" required/>
                                    </div>
                                </div>
                                <div class="text-end modal-footer">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <script src="{{asset('js/home.js')}}"></script> --}}
