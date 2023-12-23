@extends('layouts.app')

@section('content')
<div class="jumbotron  bg-darklight">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Add a fish <a
                            href="{{route('categories.index')}}"
                            class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i>
                            Back </a></h2>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('fishes.store') }}" data-parsley-validate
                        class="form-horizontal form-label-left">
                        @csrf

                        <div class="form-row">
                            <div class="col-4">
                                <strong>Name</strong>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <div class="col">
                                <strong>Birthdate</strong>

                                <input type="text" name="birthdate" class="form-control custom-select"
                                    data-provide="datepicker" data-date-format="yyyy-mm-dd">

                            </div>

                            <div class="col">
                                <strong>Sex</strong>
                                <select id="inlineFormCustomSelect" name="sex"
                                    class="form-control custom-select mr-sm-2">
                                    <option value="" selected>Choose...</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="N/A">Unknown</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group mt-3">
                            <strong>Detail</strong>
                            <textarea class="form-control" name="detail"></textarea>
                        </div>


                        <div class="form-row">
                            <div class="col-4">
                                <strong>Size</strong>
                                <select id="inlineFormCustomSelect" name="size"
                                    class="form-control custom-select mr-sm-2">
                                    <option value="" selected>Length in cm</option>
                                    <option value="0-10">0-10</option>
                                    <option value="11-25">11-25</option>
                                    <option value="26-35">26-35</option>
                                    <option value="36-50">36-50</option>
                                    <option value="51-75">51-75</option>
                                    <option value="56-100">56-100</option>
                                    <option value="100+">100+</option>
                                </select>
                            </div>




                            <div class="col-4">
                                <strong>Category</strong>
                                <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2"
                                    name="category_id">
                                    <option value="" selected disabled>Choose a category...</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4">
                                <strong>Subcategory</strong>
                                <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2"
                                    name="subcategory_id">
                                    <option value="" selected disabled>Choose a subcategory...</option>
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">
                                        {{ $subcategory->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <div class="ln_solid mt-4">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="pull-left mt-2">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-primary btn-dark mt-4 mb-3">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<!-- JQUERY for dynamic dropdown list for (sub)category & datepicker -->


<script>
    console.log('hola');

    (function () {
        $('.datepicker').datepicker();
    });


    $(document).ready(function () {
        $('select[name=category_id]').change(function () {
            var categoryId = $(this).val();

            if (!categoryId) {
                // If no category selected, clear and disable the subcategory dropdown
                $('form select[name=subcategory_id]').empty().prop('disabled', true);
                return;
            }

            var url = '{{ url('category') }}/' + categoryId + '/subcategory';

            $.get(url, function (data) {
                var select = $('form select[name=subcategory_id]');

                // Clear and enable the subcategory dropdown
                select.empty().prop('disabled', false);

                // Check whether the given array is empty or not
                if ($.isEmptyObject(data)) {
                    select.append('<option value="" disabled selected>No subcategory found...</option>');
                } else {
                    $.each(data, function (key, value) {
                        select.append('<option value=' + value.id + '>' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection