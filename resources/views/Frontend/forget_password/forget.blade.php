f
@extends('Frontend.layouts.main')
@section('content')
<style>
    .form { width:485px; margin:0 auto }

</style>
<div id="about" class="about-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="p-4 form bg-light justify-content-center">
                <h1  class=" justify-content-center text-center" style="color:rgb(0,33,71);">FORGET PASSWORD </h1>
            <form method="POST" action="{{ route('user-forgetpassword') }}">
                    @csrf
                <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Email">
                @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                </div>

                  <button type="submit" class="btn events-form-btn ">Send rest password link</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
