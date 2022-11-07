<section id="head-nav">
    <div class="d-flex justify-content-between px-3" style="height: 64px;background-color: #FF9142;color: white;width: 100%;">
        <div class="h-100 d-flex align-items-center">
            <i class="fas fa-bars fa-thin fa-lg p-4 me-3"></i>
            <img class="h-75 py-2" src="{{ asset('img/logoWhite.png') }}">
        </div>
        <div class="h-100 d-none d-lg-flex justify-content-center align-items-center">
            <button class="btn" type="button" style="color: inherit">HOME</button>
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
        </div>

        @if(Auth::guard('admin')->user())
        <div class="dropdown me-4">
            <button class="btn p-0" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="outline: none;box-shadow: none;">
                <img class="rounded-circle" style="width: 40px;height: 40px;" src="{{asset('img/logo.svg')}}">
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                {{-- <a href="/{{strtolower(auth()->guard('admin')->user()->role->name)}}/changePassword"class="dropdown-item" style="cursor: default;">Change Password</a> --}}
                <a href="/switchPasar"class="dropdown-item" style="cursor: default;">History</a>
                <a href="/logout" class="dropdown-item" style="cursor: default;">Logout</a>
            </div>
        </div>
        @else
        <div class="h-100 d-flex align-items-center justify-content-end p-3">
            <i class="fas fa-thin fa-user-group"></i>
            <button id="btn-login" class="btn" type="button" style="color: inherit">Login</button>
            <button class="btn" type="button" style="border: 1px solid;border-radius: 25px;border-color: rgb(255,255,255,0.5); color: inherit;">Register</button>
        </div>
        @endif
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="modal-login">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-master-header" class="modal-title" style="color: black;">Login</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <form class="h-100" method="POST" action="/login">
                                @csrf
                                <div class="h-100 d-flex flex-column justify-content-between">
                                    <div class="h-100 d-flex align-items-center">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <input type="text" id="username" class="form-control" name="username" placeholder="Username" >
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
                                            <input class="w-100" style="outline: none; border: none;" type="text" id="username" name="username" />
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="text" name="email" class="form-control" placeholder="E-mail"/>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                                    </div>
                                    <div class="col-12 mb-2">
                                        <input type="password" id="confpass" class="form-control" name="confpass" placeholder="Password" />
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
