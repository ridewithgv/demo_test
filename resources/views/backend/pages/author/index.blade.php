
@extends('backend.layouts.master')

@section('title')
Users - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    
@endsection


@section('admin-content')
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Author List</h4>
                    <p class="float-right mb-2">
                        <a class="btn btn-primary text-white" href="{{ route('author.create') }}">Create New Author</a>
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">

<table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Full Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Place Of Birth</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($authors as $item)

                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['first_name'] }} {{ $item['last_name'] }}</td>
                    <td>{{ $item['birthday'] }}</td>
                    <td>{{ $item['gender'] }}</td>
                    <td>{{ $item['place_of_birth'] }}</td>
                    <td>
                        <a href="{{route('author.show', '1')}}" class="btn btn-success">View</a>
                        <a href="{{route('author.destroy', '1')}}" class="btn btn-danger">Delete</a>
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