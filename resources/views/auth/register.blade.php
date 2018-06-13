@extends('layouts.app')

@section('content')
<aside id="fh5co-hero" class="js-fullheight">
    <div class="flexslider js-fullheight">
        <ul class="slides">
            <li style="background-image: url(../front-end/images/cars/tesla_model_x.jpg);">


                <div class="container" >

                    <div class="col-md-6 col-md-offset-4 col-md-pull-1 js-fullheight slider-text">
                        <div class="slider-text-inner">
                            <div class="desc" style="margin: auto;width: 600px;">


                                <div class="panel-heading">Register</div>


                                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name" class="col-md-4 control-label">Name</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" placeholder="Username"  aria-label="Username" aria-describedby="basic-addon1" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <label class="col-md-4 control-label" >Address:</label> 
                                            <div class="col-md-6 col-md-push-0.5">
                                                @include('layouts.googleApi')

                                            </div>
                                        </div>    


                                        <div class="form-group{{ $errors->has('license') ? ' has-error' : '' }}">
                                            <label for="license" class="col-md-4 control-label">License</label>

                                            <div class="col-md-6">
                                                <input id="license" type="text" class="form-control"  placeholder="License number" aria-label="licenseNo" aria-describedby="basic-addon1" name="license" required>

                                                @if ($errors->has('license'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('license') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password"  placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
    </div>
</aside>
@endsection