@extends('layouts.app') @section('content')
<div class="jumbotron shadow-lg bg-darklight">
    <h2 class="display-4 text-dark d-flex  justify-content-between text-dark mb-5">Update a Fish <a href="{{route('fishes.index')}}" class="btn btn-info btn-xs pull-right btn-dark mt-4 mb-3"><i class="fa fa-chevron-left"></i> Back </a></h2>

    <form method="post" action="{{ route('fishes.update', ['id' => $fish->id]) }}" data-parsley-validate class="form-horizontal form-label-left pb-5">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
           
            <div class="form-row">

                <div class="col-4">
                    <strong>Name</strong>
                    <input type="text" value="{{ old( 'name', $fish->name) }}" name="name" class="form-control">
                    @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }} <br /></span>
                    @endif        
                </div>   

                <div class="col-4">
                    <strong>Birthdate</strong>
                    <input type="text" name="birthdate" value="{{ old( 'birthdate', $fish->birthdate) }}" class="form-control custom-select" data-provide="datepicker">
                    @if ($errors->has('birthdate'))
                    <span class="help-block">{{ $errors->first('birthdate') }} <br /></span>
                    @endif        
                </div>      
                
                <div class="col-4">
                    <strong>Sex</strong>
                    <select id="inlineFormCustomSelect" name="sex" class="form-control custom-select mr-sm-2">
                        <option value="" disabled>Previous: {{ old( 'sex', $fish->sex) }}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Unknown">Unknown</option>
                    </select>
                    @if ($errors->has('sex'))
                    <span class="help-block">{{ $errors->first('sex') }} <br /></span>
                    @endif   
                </div>
            </div>

            <div class="form-group mt-3">
                        <strong>Detail</strong>
                        <textarea class="form-control" name="detail">{{ old( 'detail', $fish->detail) }}</textarea>
                        @if ($errors->has('detail'))
                <span class="help-block">{{ $errors->first('detail') }} <br /></span>
                @endif   
            </div>

            <div class="form-row">
                <div class="col-4">
                    <strong>Size</strong>
                    <select id="inlineFormCustomSelect" name="size" class="form-control custom-select mr-sm-2">
                        <option value="" disabled>Previous: {{ old( 'sex', $fish->size) }}</option>
                        <option value="11-25">11-25</option>
                        <option value="26-35">26-35</option>
                        <option value="36-50">36-50</option>
                        <option value="51-75">51-75</option>
                        <option value="56-100">56-100</option>
                        <option value="100+">100+</option>
                    </select>
                    @if ($errors->has('size'))
                    <span class="help-block">{{ $errors->first('size') }}   <br /></span> <br />
                    @endif
                </div> 

                 <div class="col-4">
                    <strong>Category</strong>
                    <select id="inlineFormCustomSelect"  class="form-control custom-select mr-sm-2" name="category_id">
                        <option value="" selected disabled>Choose a category...</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                        {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                    <span class="help-block">{{ $errors->first('category_id') }}   <br /></span> <br />
                    @endif
                </div>  

                <div class="col-4">
                    <strong>Subcategory</strong>
                    <select id="inlineFormCustomSelect" class="form-control custom-select mr-sm-2" name="subcategory_id">
                        <option value="" selected disabled>Previous: {{ old( 'sex', $fish->subcategory->name) }}</option>
                        @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                        {{ $subcategory->name }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('subcategory_id'))
                    <span class="help-block">{{ $errors->first('subcategory_id') }}   <br /></span> <br />
                    @endif
                </div>
            </div> 



        </div>

        <div class="form-group mt-5 mb-5">
            <div class="pull-left" >
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input name="_method" type="hidden" value="PUT">
                <button type="submit" class="btn btn-success btn-dark mt-4 mb-3">Update Fish Changes</button>
            </div>
        </div>
    </form>
</div>
@stop


@section('scripts')
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
            <!-- JQUERY for dynamic dropdown list for (sub)category & datepicker -->


            <script>

                (function() {
                    $('.datepicker').datepicker();
                });


                $(function() {
                    $('select[name=category_id]').change(function() {

                        var url = '{{ url('category') }}/' + $(this).val() + '/subcategory';

                        $.get(url, function(data) {
                            var select = $('form select[name= subcategory_id]');
         
                       
                            select.empty()

                            // checks wheter the given array is empty/blank or not
                            if(!$.trim(data)) {
                                select.append('<option value=1> No subcategory found...</option>');
                            } else {
                                $.each(data,function(key, value) {
                                select.append('<option value=' + value.id + '>' + value.name + '</option>');
                            });
                            
                            }                           
                        });
                    });
                });
            </script>
@endsection