@extends('layouts.app')

@section('content')
<div class="alContent jumbotron shadow-lg bg-darklight">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between text-dark mb-5">Fishes <a href="{{route('fishes.create')}}" class="btn btn-primary btn-xs pull-right btn-dark mt-4 mb-3"   mt-4"><i class="fa fa-plus"></i> Create New </a></h2>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-dark table-bordered">
                        <thead class="thead-darklight">
                            <tr>
                                <th>Name</th>
                                <th>Size</th>
                                <th>Detail</th>
                                <th>Birthdate</th>
                                <th>Sex</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Owner - Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> <!-- only show unsoftdelte btn when deleted-->

                        @foreach ($fishes as $fish)       
                        <script>
                                console.log('Fish: {!! json_encode($fish) !!}');
                            </script>                
                            <tr>
                                <td>{{ $fish->name }}</td>
                                <td>{{ $fish->size }}</td>
                                <td>{{ $fish->detail }}</td>
                                <td>{{ $fish->birthdate }}</td>
                                <td>{{ $fish->sex }}</td>
                                <td>{{ $fish->subcategory->categories->name or $category->name   }}</td>
                                <td>{{ $fish->subcategory->name }}</td>
                                <td>{{ $fish->user->username}} - {{$fish->user->email}}</td>
                                <td>
                                    @if ($fish -> deleted_at === null)
                                    <a href="{{ route('fishes.edit', ['id' => $fish->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i>Edit</a>
                                   
                                    <a href="{{ route('fishes.softDelete', ['id' => $fish->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-trash-o" title="Soft Delete"></i>Soft Delete </a>
                                    <a href="{{ route('fishes.show', ['id' => $fish->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i>Delete </a>
                                    @else
                                    <a href="{{ route('fishes.softUndelete', ['id' => $fish->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-trash-o" title="Soft Undelete"></i>Soft Undelete </a>
                                    @endif
                        
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
             </div>
        </div>
    </div>
</div>
@stop