@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        

        {{-- Tabla de Elementos --}}
        <div class="col-md-auto table-responsive">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body col-md-auto table-responsive">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="clearfix">
                        <div class="form-group row">
                            <div class="col-md-auto table-responsive">
                            <h1 for="dashboard float-left form-group">All Events</h1>
                            <a href="" class="btn btn-success float-right"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Add New User</a>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered table-hover col-*-*">
                        <thead class="thead-dark col-md-auto">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                            <tr>
                                <td></td>    
                                <td></td> 
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="User List">
                                        <a href="" class="btn btn-primary"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Show</a>
                                        <a href="" class="btn btn-light"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Edit</a>
                                        <a href="" class="btn btn-danger" onclick="return confirm('seguro que deseas Eliminarlo?')"> <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>Delete</a>
                                      </div>
                                    </td>
                            </tr>
                    </table> 
                    <div class="clearfix">
                        <ul class="pagination float-right"></ul>
                        <a href="{{ URL::previous() }}" class="btn btn-danger float-right"><span class="glyphicon glyphicon-wrench" aria-hidden="true">Back</a> 
                    </div>
                    
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>
        {{-- Fin Tabla Elementos --}}
    
    </div>
</div>
@endsection
