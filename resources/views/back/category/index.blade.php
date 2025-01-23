@extends('layouts.default')
@section('content')
<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			
			{{-- <div class="ml-md-auto py-2 py-md-0">
				<a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
				<a href="#" class="btn btn-secondary btn-round">Add Customer</a>
			</div> --}}
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Form Category</div>
                        {{-- <form action="{{ route('category.search') }}" method="GET" style="margin-left:10px;">
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search for categories..." name="search"  style="margin-right:10px;" required>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form> --}}
                        <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus">   Add Category</i></a>
					</div>
				</div>
				<div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-primary">
                            {{ Session('success') }}
                        </div>
                    @endif
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name_Category</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name_category }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">Data masih kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
