<div class="d-flex justify-content-between px-3" style="height: 64px;background-color: #FF9142;color: white;width: 100%;">
    <div class="h-100 d-flex align-items-center">
        <i class="fas fa-bars fa-thin fa-lg p-4 me-3"></i>
        <img class="h-75 py-2" src="{{asset('img/logoWhite.png')}}">
    </div>
    <div class="h-100 d-none d-lg-flex justify-content-center align-items-center">
        <button class="btn" type="button" style="color: inherit">HOME</button>
        <div class="dropdown">
            <button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="color: inherit">ACTIVITIES</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">First Item</a>
                <a class="dropdown-item" href="#">Second Item</a>
                <a class="dropdown-item" href="#">Third Item</a>
            </div>
        </div>
        <button class="btn" type="button" style="color: inherit">EVENT</button>
        <button class="btn" type="button" style="color: inherit">PROMO</button>
        <div class="dropdown">
            <button class="btn dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" style="color: inherit">HELP DESK</button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">First Item</a>
                <a class="dropdown-item" href="#">Second Item</a>
                <a class="dropdown-item" href="#">Third Item</a>
            </div>
        </div>
    </div>
    <div class="h-100 d-flex align-items-center justify-content-end p-3">
        <i class="fas fa-thin fa-user-group"></i>
        <button id="btn-login" class="btn" type="button" style="color: inherit">Login</button>
        <button class="btn" type="button" style="border: 1px solid;border-radius: 25px;border-color: rgb(255,255,255,0.5); color: inherit;">Register</button>
    </div>

    <div class="modal fade" role="dialog" tabindex="-1" id="modal-login">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="modal-master-header" class="modal-title">Login</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                        <div class="col-12 mt-2">
                            <input type="text" id = "username" class="form-control" name="username" placeholder="Username*" >
                        </div>
                        <div class="col-12 mt-2">
                            <input type="text" id = "password" class="form-control" name="password" placeholder="Password" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
