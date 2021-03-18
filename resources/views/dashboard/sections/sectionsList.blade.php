@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>{{ __('Sections') }}</div>
                        <div class="card-body">
                            <div class="row">
                                <a href="{{ route('sections.create') }}" class="btn btn-primary m-2">{{ __('Add Section') }}</a>
                            </div>
                            <br>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Section ID</th>
                                    <th>Title</th>
                                    <th>Page</th>
                                    <th>Description</th>
                                    <th>Short Description</th>

{{--                                    <th></th>--}}
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($sections))
                                    @foreach($sections as $section)
                                        <tr>
                                            <td><strong>{{ $section->id }}</strong></td>
                                            <td><strong>{{ $section->title }}</strong></td>
                                            <td><strong>{{ $section->Page->title }}</strong></td>
                                            <td>{{ $section->description }}</td>
                                            <td>{{ $section->short_description }}</td>

    {{--                                        <td>--}}
    {{--                                            <a href="{{ url('/notes/' . $note->id) }}" class="btn btn-block btn-primary">View</a>--}}
    {{--                                        </td>--}}
                                            <td>
                                                <a href="{{ route('sections.edit',$section->id) }}" class="btn btn-block btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('sections.destroy', $section->id ) }}" method="POST">
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
                            {{ $sections->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('javascript')

@endsection

