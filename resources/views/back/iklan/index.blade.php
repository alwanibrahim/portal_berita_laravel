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
						<div class="card-title">Form Iklan </div>
                        <a href="{{route('slide.create' ) }}" class="btn btn-primary btn-sm ml-auto"><i class="fas fa-plus">   Add slide</i></a>
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
                                    <th>judul iklan</th>
                                    <th>link</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($iklan as $apaaja)
                                <tr>
                                    <td>{{ $apaaja->id }}</td>
                                    <td>{{ $apaaja->judul }}</td>
                                    <td>{{ $apaaja->link }}</td>
                                   
                                    <td>
                                        @if ($apaaja->status == '1')
                                            Active
                                            
                                                
                                            @else
                                            Draft
                                            
                                        @endif
                                    </td>
                                    <td>
                                        
                                        <img src="{{ asset('uploads/'.$apaaja->gambar_iklan) }}" alt="" width="100">
                                    </td> 
                                   
                                    <td>
                                        <a href="{{ route('iklan.edit', $apaaja->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>

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
