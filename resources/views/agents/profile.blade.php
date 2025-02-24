@extends('agents.layouts.app')


@section('content')
    
    <div class="row main_content">
       
        <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">                       
            <div class="widget-boxed-header">
                <h4>Profile Details</h4>
            </div>
            <div class="sidebar-widget author-widget2">
                <div class="author-box clearfix">
                    <img src="{{ Auth::user()->getUserImage() }}" alt="author-image" class="author__img">
                    <h4 class="author__title">{{ Auth::user()->f_name .' '.  Auth::user()->l_name}}</h4>
                    <p class="author__meta">{{ Auth::user()->user_type == 2 ? 'Agent' : 'Landlord' }} of Property</p>
                </div>
                <ul class="author__contact">
                    <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>302 Av Park, New York</li>
                    <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="#">{{ Auth::user()->phone }}</a></li>
                    <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">{{ Auth::user()->email }}</a></li>
                </ul>
                <div class="agent-contact-form-sidebar">
                    <h4>Request Inquiry</h4>
                    <form name="contact_form" method="POST" action="https://code-theme.com/html/findhouses/functions.php">
                        <input type="text" id="f_name" name="f_name" placeholder="Full Name" value="" required />
                        <input type="tel" id="phone" name="phone" placeholder="Phone Number" required />
                        <input type="email" id="emailid" name="email_address" placeholder="Email Address" required />
                        <textarea placeholder="Message" name="message" required></textarea>
                        <input type="submit" name="sendmessage" class="multiple-send-message" value="Submit Request" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

