@extends('layouts.app')

@section('title')
    Contact Us
@endsection

@section('content')
    <section class="bg-half-170 d-table w-100 bg-primary" style="background: url({{ asset('public/images/bg/contact.png') }}) top center;" id="home">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="title-heading text-center text-md-left">
                        <h3  style="color: white">Contact Us</h3>
                        <p class="text-white para-desc mt-3 mb-0">
                            Contact the iDove Team
                        </p>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div> <!--end container-->
    </section><!--end section-->
    <div class="position-relative">
        <div class="shape overflow-hidden text-white">
            <svg viewBox="0 0 1000 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M 0 0 c 0 0 200 50 500 50 s 500 -50 500 -50 v 101 h -1000 v -100 z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <div class="container mt-100 mt-60">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="custom-form">
                    <div id="message"></div>
                    <form method="post" action="php/contact.php" name="contact-form" id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input name="name" id="name" type="text" class="form-control" placeholder="First Name :">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group position-relative">
                                    <label>Your Email <span class="text-danger">*</span></label>
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Your email :">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Subject</label>
                                    <input name="subject" id="subject" type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group position-relative">
                                    <label>Comments</label>
                                    <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Your Message :"></textarea>
                                </div>
                            </div>
                        </div><!--end row-->
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Send Message">
                                <div id="simple-msg"></div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form><!--end form-->
                </div><!--end custom-form-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
    <div class="container mt-100"></div>
    </section>
@endsection
