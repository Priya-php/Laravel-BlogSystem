@extends('layouts.blog-post')

@section('content')
   

   <h1>{{$post->title}}</h1>
   <p class="lead">
      by <a href="#">{{$post->user->name}}</a>
   </p>
   <hr>

   <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>
   <hr>

   <img class="img-responsive" src="{{$post->photo_id ? $post->photo->file : 'http://placehold.it/900x300'}}" alt="">
   <hr>
   
   <p>{!! $post->content !!}</p>
   <hr>

   {{--  <div id="disqus_thread"></div>  --}}
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://testapp-lara.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<script id="dsq-count-scr" src="//testapp-lara.disqus.com/count.js" async></script>                         
   

@stop



