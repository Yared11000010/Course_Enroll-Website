@extends('Frontend.layouts.main')
@section('content')
<style>
    .form { width:485px; margin:0 auto }
</style>
<div id="about" class="about-area pt-50 pb-70">
    <div class="container">
        <div class="row">
            <div class="p-4 form bg-light justify-content-center">
                <h1  class=" justify-content-center text-center" style="color:rgb(0,33,71);">REGISTER </h1>
            <form action="{{ route('user_register') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" class="form-control" name="first_name" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Mobile Number</label>
                    <input type="number" class="form-control" name="mobile" id="" aria-describedby="helpId" placeholder="">
                  </div>
                <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="Email">
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn events-form-btn">REGISTER</button>
            </form>
        </div>
        </div>
    </div>
</div>
@endsection
