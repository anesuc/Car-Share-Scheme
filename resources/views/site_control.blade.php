@include('layouts.header')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Administrator Dashboard</div>

                <div class="panel-body">
                    Welcome {{ Auth::user()->name }}.
                </div>
                <div class="panel-body">
                    <a href="add_cars">Add New Car</a>
                </div>
                <div class="panel-body">
                    <a href="add_parking">Add New Parking Lot</a>
                </div>
                <div class="panel-body">
                    <a href="add_service">Add Car Service</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')