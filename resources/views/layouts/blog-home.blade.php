@include('includes.front-header')


    @include('includes.front-home-nav')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Blogs
                </h1>

                
                @if (count($posts) > 0)
                    
                    @foreach ($posts as $post)
                   
                        <h2>
                            <a href="{{route('home.post', $post->slug)}}" target="blank">{{ $post->title }}</a>
                        </h2>
                        <p class="lead">
                            by <a href="#">{{ $post->user->name }}</a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at->diffForHumans() }}</p>
                        <hr>
                        <img class="img-responsive" src="{{ $post->photo_id ? $post->photo->file : 'http://placehold.it/900x300' }}" alt="{{ $post->title }}">
                        <hr>
                        <p>{{ str_limit($post->content, 400) }}</p>
                        <a class="btn btn-primary" href="{{route('home.post', $post->slug)}}" target="blank">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    @endforeach
                    <div class="text-center">
                        {{$posts->render()}}
                    </div>

                @endif
                
                

            </div>

            
            @include('includes.front-sidebar')
            
            

        </div>
        <hr>
    </div>
    

@include('includes.front-footer')