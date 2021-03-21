@extends('layouts.rise.frontend.app')

@section('content')

    <div class="content-block">
        <div class="section-full bg-gray">
            <div class="container">
                <div class="row contact-box content-inner-5">
                    <div class="section-head text-center col-md-12">
                        <h2 class="title text-secondry">Student Register</h2>
                    </div>
                    <div class="dzFormMsg"></div>
                    <form method="post" class="dzForm col-md-12" action="{{route('register.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input name="name" type="text" required class="form-control" placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input name="father_name" type="text" required class="form-control" placeholder="Father name">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control"   placeholder="Your Email Address" >
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input name="phone" type="text" required class="form-control" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input name="cnic" type="text" required class="form-control" placeholder="CNIC">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <input name="address" type="text" required class="form-control" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 text-center">
                                <button name="submit" type="submit" value="Submit" class="btn radius-xl btn-lg">Register Now<span></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
