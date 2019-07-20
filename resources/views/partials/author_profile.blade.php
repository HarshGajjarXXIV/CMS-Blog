<h3 class="head">Author</h3>
<hr class="hr-head">

<div class="row">

  <div class="col-md-4 col-sm-4">
    <img class="img-circle" src="{{ asset('images/author/'. $hacker->profile_pic) }}">
  </div>

  <div class="col-md-8 col-sm-8 author-ditails" style="margin-top: -20px">

    <a href="{{ route('author', $hacker->user) }}"><h3>{{ $hacker->name }}</h3></a>

    <div >
      @if($hacker->twitter != "")
        <a target="_blank" href="{{ $hacker->twitter }}"><i class="fa fa-twitter-square fa-2x"></i></a>&nbsp;
      @endif
      @if($hacker->fb != "")
        <a target="_blank" href="{{ $hacker->fb }}"><i class="fa fa-facebook-square fa-2x"></i></a>&nbsp;
      @endif
      @if($hacker->insta != "")
        <a target="_blank" href="{{ $hacker->insta }}"><i class="fa fa-instagram fa-2x"></i></a>&nbsp;
      @endif
    </div>

    <div class="body">
      {{ $hacker->about }}
    </div>

  </div>

</div>

