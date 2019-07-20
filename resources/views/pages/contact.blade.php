@extends('master.main')

@section('title'){{ 'Contact Us | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="If you have any questions or suggestions, we are always ready to help you. You can contact us at contact@technosploit.com or you can directly leave a message via form." />
  <meta name="keywords" content="Technosploit, Contact, Contact Us, Team" />

  <meta property="og:locale" content="en_US"/>
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Contact Us | Technosploit" />
  <meta property="og:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta property="og:description" content="If you have any questions or suggestions, we are always ready to help you. You can contact us at contact@technosploit.com or you can directly leave a message via form." />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:site_name" content="Technosploit"/>
  <meta property="fb:app_id" content="966242223397117" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="If you have any questions or suggestions, we are always ready to help you. You can contact us at contact@technosploit.com or you can directly leave a message via form." />
  <meta name="twitter:title" content="Contact Us | Technosploit" />
  <meta name="twitter:image" content="{{ asset('images/assets/bg_img.jpg') }}" />
  <meta name="twitter:site" content="@technosploit" />
  <meta name="twitter:url" content="{{ Request::url() }}" />

@endsection


@section('content')

  <div class="col-md-8">

    <h3 class="head">Contact Us</h3>
    <hr class="hr-head">

    <div class="body">
      <p>Write contact details here... <a class="page-scroll" href="#message">link to form</a></p>
    </div>

    <h3 class="head" id="message">Leave a Message</h3>
    <hr class="hr-head">

    @include('partials.messages')
    
    {{ Form::open(['route' => ['messages.store'], 'method' => 'POST']) }}

      {{ Form::text('name', null, ['placeholder'=>'Name', 'required'=>'', 'class' => 'form-control my-form submit-form']) }}

      {{ Form::email('email', null, ['placeholder'=>'Email', 'required'=>'', 'class' => 'form-control my-form submit-form']) }}

      <!--{{ Form::text('subject', null, ['placeholder'=>'Subject', 'required'=>'', 'class' => 'form-control my-form submit-form']) }}-->

      {{ Form::textarea('message', null, ['placeholder'=>'Message', 'required'=>'', 'class' => 'form-control my-form submit-form']) }}
      
      {{ Form::submit('Submit',['class' => 'btn btn-lg btn-danger submit-form']) }}

    {{ Form::close() }}

  </div>

@endsection


@section('recent')
  @include('partials.recent')
@endsection