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
						<div class="card-title">edit iklan {{ $iklan->judul }}</div>
                        <a href="{{route('iklan.index')  }}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-undo"></i></a>
					</div>
				</div>
			    <div class="card-body">
                <form action="{{ route('iklan.update',$iklan->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
					<div class="form-group">
                        <label for="article">Judul_iklan</label>
                        <input type="text" class="form-control"   name="judul"  id="text" value="{{ $iklan->judul }}">
                        
                    </div>
					<div class="form-group">
                        <label for="body">link</label>
                        <textarea type="text" class="form-control"   name="link"  >{{ $iklan->link }}</textarea>
                        
                    </div>
					
					
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control"   name="is_active" >
                            <option value="1" {{ $iklan->status == '1' ? 'selected': ''}}>Publish</option>
                            <option value="0" {{ $iklan->status == '0' ? 'selected': ''}}>Draft</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="gambar">gambar iklan</label>
                        <input type="file" class="form-control"   name="gambar_iklan" >
                        <label for="gambar">gambar saat ini</label>
                           <br>
                           <img src="{{ asset('uploads/'.$iklan->gambar_iklan) }}" alt="" width="100">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">save</button>
                        <button class="btn btn-danger btn-sm">reset</button>
                    </div>
                    
                    </form>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
