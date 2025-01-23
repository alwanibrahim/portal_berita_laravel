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
						<div class="card-title">Form Playlist</div>
                        <a href="{{route('playlist.create' ) }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus">   Add playlist</i></a>
					</div>
				</div>
				<div class="card-body">
                    @if (Session::has('succes'))
                        <div class="alert alert-primary">
                            {{ Session('succes') }}
                        </div>
                    @endif
					<div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Play list video</th>
                                    <th>Slug</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($playlist as $apaaja)
                                <tr>
                                    <td>{{ $apaaja->id }}</td>
                                    <td>{{ $apaaja->judul_playlist }}</td>
                                    <td>{{ $apaaja->slug }}</td>
                                    
                                    {{-- <td>{{ $apaaja->user_id }}</td>/ --}}
                            
                                    <td>{{ $apaaja->users->name}}</td>
                                    <td>
                                        @if ($apaaja->is_active == '1')
                                            Active
                                            
                                                
                                            @else
                                            Draft
                                            
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <img src="{{ asset('uploads/'.$apaaja->gambar_playlist) }}" alt="" width="100">
                                    </td> 
                                    <td>
                                        <a href="{{ route('playlist.edit', $apaaja->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                        <form action="{{ route('playlist.destroy', $apaaja->id) }}" method="POST" class="d-inline">
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
                                    <td colspan="7" class="text-center">data masih kosong</td>
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
