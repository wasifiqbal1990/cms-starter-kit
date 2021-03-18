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
                            <form method="POST" enctype='multipart/form-data' class="form-horizontal" action="{{ route('sections.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Title</label>
                                    <input class="form-control col-md-10" type="text" placeholder="{{ __('Title') }}" name="title" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Hashtag</label>
                                    <input class="form-control col-md-10" type="text" placeholder="{{ __('Hashtag') }}" name="hashtag" required autofocus>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Description</label>
                                    <textarea class="form-control col-md-10" id="textarea-input" name="description" rows="9" placeholder="{{ __('Content..') }}" required></textarea>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Short Description</label>
                                    <input class="form-control col-md-10" type="text" placeholder="{{ __('Short Description') }}" name="short_description"  autofocus>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">page</label>
                                    <select class="form-control col-md-10" name="page_id">
                                        @foreach($pages as $page)
                                            <option value="{{ $page->id }}">{{ $page->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label">Order</label>
                                    <input class="form-control col-md-4" type="number" placeholder="{{ __('Order') }}" name="order">
                                </div>

                                <div class="images">
                                    <div class="clone_item">
                                        <div class="form-group image_section">
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Section Image</label>
                                                <input type="file" class="form-control col-md-4" name="section[0][image]">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Image Heading</label>
                                                <input type="text" class="form-control col-md-4" name="section[0][heading]">
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label">Image Description</label>
                                                <textarea class="form-control col-md-6" name="section[0][description]"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <button class="btn btn-sm btn-success clone">
                                                        <i class="fa fa-plus"></i> +
                                                    </button>
                                                    <button class="btn btn-sm btn-danger remove">
                                                        <i class="fa fa-times"></i> x
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
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
        if(!currentElement.parents('.form-group').parent().hasClass('clone_item'))
        {
            currentElement.parents(".form-group").slideUp('slow').remove();
        }
    }

    function clone()
    {
        var test = "";
        var i = 1;
        var divs = $(".clone_item").contents().clone();
        sectionIndex = $('.images .image_section').length;
alert(sectionIndex);
        divs.find(":input").each(function(id,field){
            $(field).val("").attr('name',function(id,name){
                if(typeof name !== 'undefined'){
                    return name.replace('[0]',"["+sectionIndex+"]");
                }
            });
        });

        $(".images").append("<div class='row' style='display:none'></div>");
        $(".images:last").append(divs).show('slow');
        productsIndex;
    }
</script>
@endsection
