@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Create Page') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('pages.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Slug') }}" name="slug" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Description</label>
                                    <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                                </div>

                                <div class="form-group row">
                                    <label>Short Description</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Slug') }}" name="short_description"  autofocus>
                                </div>



                                <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                                <a href="{{ route('pages.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

@endsection
