@include('layouts.header')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }}
                </div>
                <div class="panel-body">
                    <a href="booking">Book a car</a>
                </div>
                <div class="panel-body">
                    <a href="history">View Past Bookings</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')