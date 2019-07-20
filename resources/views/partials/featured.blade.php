<div class="row">

  @foreach($featuredposts as $featuredpost)

    <div class="col-md-6">

      @include('partials.card', ['image'=>asset('images/head/'.$featuredpost->thumbnail),
                                  'link'=>route('post', $featuredpost->urltext),
                                  'title'=>$featuredpost->title,
                                  'category_link'=>route('category', str_slug($featuredpost->category->name)),
                                  'category'=>$featuredpost->category->name,
                                  'time'=>date('M j, Y', strtotime($featuredpost->created_at)) ])

    </div>

  @endforeach
  
</div>