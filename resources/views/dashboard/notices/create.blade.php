@extends('dashboard.base')


@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Create '.$type) }}</div>
                        <div class="card-body">
                            <form method="POST" class="form-horizontal" action="{{ route($type.'.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Title</label>
                                    <input class="form-control col-md-10" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Url</label>
                                    <input class="form-control col-md-10" type="text" placeholder="{{ __('Url') }}" name="url" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Short Description</label>
                                    <input class="form-control col-md-10" type="text" placeholder="{{ __('Short Description') }}" name="short_description"  autofocus>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Description</label>
                                    <textarea class="form-control col-md-10" id="textarea-input" name="description" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                                </div>

                                <button class="btn btn-block btn-success" type="submit">{{ __('Add') }}</button>
                                <a href="{{ route($type.'.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
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
