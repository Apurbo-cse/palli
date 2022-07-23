@extends('admin.master')

@section('title', 'Material')

@section('main-content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-header-title">
                <h4 class="pull-left page-title">All Material</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="{{route('admin.dashboard')}}">Material</a></li>
                    <li class="active">All Material</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row m-b-15">
        <div class="col-sm-12">
            <a class="btn btn-primary" href="{{route('admin.material.create')}}"><i class="fa fa-plus"></i> Create New Material</a>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">All Material Table</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th style="width: 15%">Title</th>
                                    <th style="width: 35%">Sub title</th>
                                    <th>1st Image</th>
                                    <th>2nd Image</th>
                                    <th>3rd Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($materials as $material)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$material->title}}</td>
                                        <td>{!! $material->sub_title !!}</td>
                                        <td><img src="{{asset($material->image)}}" alt="category Image" style="width: 110px;"></td>
                                        <td><img src="{{asset($material->image_two)}}" alt="category Image" style="width: 110px;"></td>
                                        <td><img src="{{asset($material->image_three)}}" alt="category Image" style="width: 110px;"></td>

                                        <td><span class="label {{$material->status ? 'label-success':'label-warning'}}">{{$material->status ? 'Active':'Inactive'}}</span></td>
                                        <td>
                                            <a href="{{route('admin.material.edit', $material->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            <button class="btn btn-danger" type="button" onclick="deleteItem({{$material->id}})">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            <form id="delete_from_{{$material->id}}" style="display: none" action="{{route('admin.material.destroy', $material->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                            </form>

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
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        function deleteItem(id)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete_from_'+id).submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your data has been deleted',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
