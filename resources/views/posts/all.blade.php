@extends("layouts/front")

@section("content")
	<div class="container">
		<div class="contact-content mt-30 mb-30">
		<div class="box box-primary">
			<h1 class="box-header">Actualité</h1>
			<div class="box-body">
				<div class="row">
					@foreach($posts as $post)
						<div class="col-md-4 post-item">	
							<div class="card">
							    <div class="card-body">
							        <div class="card-thumbnail">
							           <div class="contact-img">

							            <img src="{{url('/images/post-missing.jpg')}}" alt="">

							        </div></div>
							        <div class="card-title">
							            <h5> 
							            	 
							            	<a  href="{{ route('show_post_path', $post->slug) }}">{{ $post->title }} </a>
							            </h5>                         
							        </div>
							            
							        <div class="excerpt label-wrap label-right hide-on-list">
							                              
							        </div>
							       
							        
							        <div class="item-footer">
							           

							            <div class="item-author">
							                <i class="fa fa-user" aria-hidden="true"></i>
							                {{ $post->user->login }}
							            </div>
							           
							             <div class="item-view pull-right">
							                
							            </div>
							        </div>
							           
							    </div>
							</div>
						</div>
					@endforeach
				</div>
				
			</div>
		</div>

	</div>
	</div>
@endsection