
@extends('backend.layouts.master')

@section('title')
Role Create - Admin Panel
@endsection

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Author Detail</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                    <li><span>Create Role</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <!-- @include('backend.layouts.partials.logout') -->
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">View Author</h4>
                    <!-- @include('backend.layouts.partials.messages') -->
                    
                    <!-- <form action="{{ route('author.store') }}" method="POST"> -->
                        <!-- @csrf -->
                        <div class="row">
                        <div class="col-md-6 form-group">
                            <h6 for="name">Name</h6>
                            <p>Akshay</p>
                        </div>
                        <div class="col-md-6 form-group">
                            <h6 for="name">Position</h6>
                            <p>Akshay</p>
                        </div>
                        <div class="col-md-6 form-group">
                            <h6 for="name">Office</h6>
                            <p>Akshay</p>
                        </div>
                        <div class="col-md-6 form-group">
                            <h6 for="name">Age</h6>
                            <p>Akshay</p>
                        </div>
                        <div class="col-md-6 form-group">
                            <h6 for="name">Start date</h6>
                            <p>Akshay</p>
                        </div>
                        <div class="col-md-6 form-group">
                            <h6 for="name">Salary</h6>
                            <p>Akshay</p>
                        </div>
                        
                        </div>
                        
                        
                       
                        
                        <!-- <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button> -->
                    <!-- </form> -->
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

