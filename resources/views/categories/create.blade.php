@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Add Category</h3>
                    </div>
                    <div class="card-body text-center">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <input type="text" class="form-control form-control-lg mb-3" name="name" placeholder="Category Name">
                            <button type="submit" class="btn btn-primary btn-lg">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
