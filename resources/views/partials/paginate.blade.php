@foreach(array_chunk($posts->all(), 2) as $row)

  <div class="row">

    @foreach ($row as $post)

      <div class="col-md-6">

        @include('partials.card', ['image'=>asset('images/head/'.$post->thumbnail),
                                  'link'=>route('post', $post->urltext),
                                  'title'=>$post->title,
                                  'category_link'=>route('category', str_slug($post->category->name)),
                                  'category'=>$post->category->name,
                                  'time'=>date('M j, Y', strtotime($post->created_at)) ])

      </div>

    @endforeach

  </div>

@endforeach

