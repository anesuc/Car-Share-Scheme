
@include('layouts.header')




    <aside id="fh5co-hero" class="js-fullheight">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url(images/cars/tesla_model_x.jpg);">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-6 col-md-offset-4 col-md-pull-1 js-fullheight slider-text">
                            <div class="slider-text-inner">
                                <div class="desc" style="margin: auto;">
                                   
                                    <input id="email" type="email" name="email" class="form-control" aria-label="Email" aria-describedby="basic-addon1" value="{{ old('email') }}" required autofocus>
                                    <input id="password" type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                     
                           
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        Forgot Your Password?
                                    </a>

                                     <a href="{{ url('/register') }}" class="btn btn-light btn-xs" role="button">Sign up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        </form>
    </aside>





@include('layouts.footer')