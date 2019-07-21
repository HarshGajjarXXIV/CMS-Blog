@extends('master.main')

@section('title'){{ 'Contact Us | CMS Blog' }}@endsection

@section('metatags')

  <meta name="description" content="Conact of CMS blog" />
  <meta name="keywords" content="CMS, blog, Contact, Contact Us, Team" />

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