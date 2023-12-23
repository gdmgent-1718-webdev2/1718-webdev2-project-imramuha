@extends('layouts.app')

@section('content')
<div class="alContent jumbotron shadow-lg bg-darklight">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 class="display-4 text-dark d-flex  justify-content-between mb-5">Categories <a href="{{route('categories.create')}}" class="btn btn-primary btn-xs pull-right btn-dark mt-4 mb-3"   mt-4"><i class="fa fa-plus"></i> Create New </a></h2>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-dark table-bordered">
                        <thead class="thead-darklight">
                            <tr>
                                <th>Name of the category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody> <!-- only show unsoftdelte btn when deleted-->

                        @foreach ($categories as $category)                       
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    
                                    @if ($category -> deleted_at === null)
                                    <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i>Edit</a>
                                    <a href="{{ route('categories.softDelete', ['id' => $category->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-trash-o" title="Soft Delete"></i>Soft Delete </a>
                                    <a href="{{ route('categories.show', ['id' => $category->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i>Delete </a>
                                    @else
                                    <a href="{{ route('categories.softUndelete', ['id' => $category->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-trash-o" title="Soft Undelete"></i>Soft Undelete </a>
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