@include('layouts.header')

</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">

                   <h1>CONTACT US</h1>
                   We are happy to answer any question you have. Just send us a message and we will get in touch with you! 
                   <br/><br/>



                  
                   <form method="post" action="{{ route('contact.store')}}" id="contactForm">

                   	{{ csrf_field() }}

				    <div class="form-group">
				      <label>Name</label>
				      <input style="width:100%;" type="text" name="name" required>
				     
				    </div>
				    <div class="form-group">
				      <label>Email</label>
				      <input style="width:100%;" type="text" name="email" required pattern="[^@\s]+@[^@\s]+">
				     
				    </div>
				     
				    <div class="form-group">
				      <label>Message</label>
				      <textarea rows="4" name="message" form="contactForm" style="width:100%" required></textarea>
				       
				    </div>
				    @if (Session::has('flash_message'))
                 	  <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                   	@endif
				    <button type="submit">Send</button>
				  </form>


                </div>
                
            </div>
        </div>
    </div>
</div>




@include('layouts.footer')