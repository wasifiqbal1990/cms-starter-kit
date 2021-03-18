@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{ __('Notices') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route($type.'.create') }}" class="btn btn-primary m-2">{{ __('Add '.ucfirst($type)) }}</a>
                            </div>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Notice ID</th>
                                    <th>Title</th>
                                    <th>Short Description</th>
                                    <th>Description</th>
                                    <th>Url</th>

                                    {{--                                    <th></th>--}}
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($notices))
                                    @foreach($notices as $notice)
                                        <tr>
                                            <td><strong>{{ $notice->id }}</strong></td>
                                            <td><strong>{{ $notice->title }}</strong></td>
                                            <td>{{ $notice->short_description }}</td>
                                            <td>{{ $notice->description }}</td>
                                            <td>{{ $notice->url }}</td>

                                            {{--                                        <td>--}}
                                            {{--                                            <a href="{{ url('/notes/' . $note->id) }}" class="btn btn-block btn-primary">View</a>--}}
                                            {{--                                        </td>--}}
                                            <td>
                                                <a href="{{ route($type.'.edit',$notice->id) }}" class="btn btn-block btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route($type.'.destroy', $notice->id ) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-block btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="7">No records found</td></tr>
                                @endif
                                </tbody>
                            </table>
                            {{ $notices->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

