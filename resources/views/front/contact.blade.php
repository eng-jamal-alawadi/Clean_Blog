@extends('front.layouts.master')
@section('content')

@section('script')
<script>
    @if (session('success'))
    toastr.success("{{ session('success') }}")
    @endif
</script>
@stop

       <!-- Page Header-->
       <header class="masthead" style="background-image: url('{{asset('front/assets/img/contact-bg.jpg')}}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                    <div class="my-5">

                        <form id="contactForm" action="{{route('contact')}}" method="POST">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Name</label>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" name="email" type="email" placeholder="Enter your email..."  />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" ></div>
                                <div class="invalid-feedback" data-sb-feedback="email:email"></div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="phone" name="phone" type="tel" placeholder="Enter your phone number..."  />
                                <label for="phone">Phone Number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required"></div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message here..." style="height: 12rem" ></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" ></div>
                            </div>
                            <br />


                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase " id="submitButton" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection