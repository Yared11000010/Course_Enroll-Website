<?php
use Illuminate\Support\Facades\Session;
?>
@extends('Frontend.layouts.main')

@section('content')
    <div class="container shadow-sm">
        @include('Frontend.pages.payment')
        <br>
               <div class="container p-4" style="border:none; box-shadow: 2px -1px 5px 2px rgba(29,27,87,0.06);">
                      <h3 class=" text-center p-1" style="background-color:#FDC800;"> <b>+251 91 126 2107</b> for more information</h3>
                  <table class="table table-striped ">
                        <thead class="thead-">
                            <tr>
                                <th>Title</th>
                                <td>Category</td>
                                <th>Image</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $course->title }}</td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/course/'.$course->image) }}" style="max-height: 40px; max-width:40px;"  alt="">
                                    </td>
                                    <td>
                                        {{ $course->price }}
                                    </td>
                                </tr>
                            </tbody>
                    </table>

                    <div class=" justify-content-end">
                        <form method="POST" action="{{ route('checkout-order') }}" id="paymentForm">
                            @csrf
                        <input type="hidden" name="course_amount" value="{{ $course->price }}">
                        <input type="hidden" name="order_type" value="course">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                         <input type="submit" class="btn btn-primary" value="Checkout Course" />
                        </form>
                    </div>
    </div>
</div>

    <br>
@endsection
