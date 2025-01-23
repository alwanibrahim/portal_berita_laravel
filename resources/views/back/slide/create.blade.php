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
						<div class="card-title">Add slide</div>
                        <a href="{{route('slide.index')  }}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-undo"></i></a>
					</div>
				</div>
			    <div class="card-body">
                <form action="{{ route('slide.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
                        <label for="judul">judul slide</label>
                        <input type="text" class="form-control"   name="judul_slide"   placeholder="Enter materi">
                        
                    </div>
                    <div class="form-group">
                        <label for="link">link slide</label>
                        <textarea type="text" class="form-control"   name="link"  ></textarea>
                        
                    </div>
					
					
					<div class="form-group">
                        <label for="gambar">gambar slide</label>
                        <input type="file" class="form-control"   name="gambar_slide" >
                        
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control"   name="status" >
                            <option value="1">Publish</option>
                            <option value="0">Draft</option>
                        </select>
                        
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
