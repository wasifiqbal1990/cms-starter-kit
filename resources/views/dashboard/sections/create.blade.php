@extends('dashboard.base')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> {{ __('Create Section') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('sections.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label>Title</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Hashtag</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Hashtag') }}" name="hashtag" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>Description</label>
                                    <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                                </div>

                                <div class="form-group row">
                                    <label>Short Description</label>
                                    <input class="form-control" type="text" placeholder="{{ __('Short Description') }}" name="short_description"  autofocus>
                                </div>

                                <div class="form-group row">
                                    <label>page</label>
                                    <select class="form-control" name="page_id">
                                        @foreach($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group row images">
                                    <div class="row item_details">
                                        <input type="file" name="section[image][]">
                                        <button class="btn btn-sm btn-success clone">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger remove">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>

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
<script type="text/javascript">


    $("form").on("click","button.clone",function(e){
        e.preventDefault();
        clone();
    });
    $("form").on("click","button.remove",function(e){
        e.preventDefault();
        remove($(this));
    });


    function remove(currentElement)
    {
        if(!currentElement.parents(".row").hasClass('item_details'))
        {
            currentElement.parents(".row").slideUp('slow').remove();
        }
    }

    function clone()
    {
        var test = "";
        var i = 1;
        var divs = $(".item_details").contents().clone();
        productsIndex = $('.invoice_products .row').length;
        divs.find(":input").each(function(id,field){
            $(field).val("").attr('name',function(id,name){
                if(typeof name !== 'undefined'){
                    return name.replace('[0]',"["+productsIndex+"]");
                }
            });
        });

        $(".images").append("<div class='row' style='display:none'></div>");
        $(".images .row:last").append(divs).show('slow');
        productsIndex;
    }
</script>
@endsection
