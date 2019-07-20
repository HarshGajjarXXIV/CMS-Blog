@if ($relatedposts->count() > 0)

  <!-- related -->
  <h3 class="head">Related</h3>
  <hr class="hr-head">
  
  @foreach(array_chunk($relatedposts->all(), 3) as $row)

    <div class="row">

      @foreach ($row as $relatedpost)

        <div class="col-md-4">
          
          @include('partials.card', ['image'=>asset('images/head/'.$relatedpost->thumbnail),
                                    'link'=>route('post', $relatedpost->urltext),
                                    'title'=>$relatedpost->title,
                                    'category_link'=>route('category', str_slug($relatedpost->category->name)),
                                    'category'=>$relatedpost->category->name,
                                    'time'=>date('M j, Y', strtotime($relatedpost->created_at)) ])

        </div>

      @endforeach

    </div><!-- end related -->

  @endforeach

@endif