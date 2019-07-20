<!-- comment form -->
<h3 class="head">Leave a Comment</h3>
<hr class="hr-head">

@include('partials.messages')

{{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST',]) }}

  {{ Form::text('name', null, ['placeholder'=>'Name', 'required'=>'', 'class' => 'form-control my-form submit-form'])}}
  {{ Form::email('email', null, ['placeholder'=>'Email', 'required'=>'', 'class' => 'form-control my-form submit-form'])}}
  {{ Form::textarea('comment', null, ['placeholder'=>'Comment', 'required'=>'', 'class' => 'form-control my-form submit-form']) }}
  {{ Form::submit('Add Comment',['class' => 'btn btn-lg btn-danger submit-form']) }}

{{ Form::close() }}
<!-- end comment form -->


<!-- cooments -->
@if($post->comments->count() > 0)

  <h3 class="head">Comments</h3>
  <hr class="hr-head">

  @foreach($post->comments as $comment)
    <div class="comment" style="padding-top: 20px">

      <div class="user-info">

        <img src="{{ "https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email)))."?s=50&d=wavatar" }}" class="user-img">
        <div class="user-name">
          <h3>{{ $comment->name }}</h3>
          <p class="comment-time">{{ date('M j, Y h:i A', strtotime($comment->created_at)) }}</p>
        </div>

      </div>
      
      <div class="comment-content body">
        {{ $comment->comment }}
      </div>

    </div>
  @endforeach

@endif
<!-- end comments -->

