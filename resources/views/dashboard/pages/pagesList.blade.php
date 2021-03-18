@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{ __('Pages') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('pages.create') }}" class="btn btn-primary m-2">{{ __('Add Page') }}</a>
                            </div>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Page ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Short Description</th>

{{--                                    <th></th>--}}
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($pages))
                                    @foreach($pages as $page)
                                        <tr>
                                            <td><strong>{{ $page->id }}</strong></td>
                                            <td><strong>{{ $page->title }}</strong></td>
                                            <td>{{ $page->description }}</td>
                                            <td>{{ $page->short_description }}</td>

    {{--                                        <td>--}}
    {{--                                            <a href="{{ url('/notes/' . $note->id) }}" class="btn btn-block btn-primary">View</a>--}}
    {{--                                        </td>--}}
                                            <td>
                                                <a href="{{ route('pages.edit',$page->id) }}" class="btn btn-block btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('pages.destroy', $page->id ) }}" method="POST">
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
                            {{ $pages->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

