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
						<div class="card-title">edit article {{ $article->judul }}</div>
                        <a href="{{route('article.index')  }}" class="btn btn-warning btn-sm ml-auto"><i class="fas fa-undo"></i></a>
					</div>
				</div>
			    <div class="card-body">
                <form action="{{ route('article.update',$article->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
					<div class="form-group">
                        <label for="article">Judul_article</label>
                        <input type="text" class="form-control"   name="judul"  id="text" value="{{ $article->judul }}">
                        
                    </div>
					<div class="form-group">
                        <label for="body">Body</label>
                        <textarea type="text" class="form-control"   name="body"  >{{ $article->body }}</textarea>
                        
                    </div>
					<div class="form-group">
                        <label for="category">category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($category as $apaaja)
                                @if ($apaaja->id == $article->category_id)
                                    <option value="{{ $apaaja->id }}" selected="selected">
                                        {{ $apaaja->name_category }}
                                    </option>
                                @else
                                    <option value="{{ $apaaja->id }}">
                                        {{ $apaaja->name_category }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        
                        
                    </div>
					
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control"   name="is_active" >
                            <option value="1" {{ $article->is_active == '1' ? 'selected': ''}}>Publish</option>
                            <option value="0" {{ $article->is_active == '0' ? 'selected': ''}}>Draft</option>
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="gambar">gambar Article</label>
                        <input type="file" class="form-control"   name="gambar_article" >
                        <label for="gambar">gambar saat ini</label>
                           <br>
                           <img src="{{ asset('uploads/'.$article->gambar_article) }}" alt="" width="100">
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
