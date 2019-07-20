@if($recentposts->count() > 0)

  <h3 class="head">Recent</h3>
  <hr class="hr-head">

  @foreach ($recentposts as $recentpost)

    @include('partials.card', ['image'=>asset('images/head/'.$recentpost->thumbnail),
                              'link'=>route('post', $recentpost->urltext),
                              'title'=>$recentpost->title,
                              'category_link'=>route('category', str_slug($recentpost->category->name)),
                              'category'=>$recentpost->category->name,
                              'time'=>date('M j, Y', strtotime($recentpost->created_at)) ])

  @endforeach
  
@endif
