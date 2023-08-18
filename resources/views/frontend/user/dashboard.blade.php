@extends('frontend.frontend_master')

<style>
    .vertical-menu {
      width: 200px;
    }

    .vertical-menu a {
      background-color: #eee;
      color: black;
      display: block;
      padding: 12px;
      text-decoration: none;
    }

    .vertical-menu a:hover {
      background-color: #ccc;
    }

    .vertical-menu a.active {
      background-color: #ffa500;
      color: white;
    }

    .logout{
        background: #ffa500 !important;
    }
    </style>

@section('title')
User Dashboard
@endsection

@section('main-content')
<div class="content-top offer-w3agile">
    <div class="container ">
       <div class="col-md-12">
          <div class="row">
            <div class="spec ">
                <h4>Hello! {{ Auth::user()->name }}. Welcome to your dashboard.....</h4>
                <p style="margin-bottom: 10px;"></p>

                <div class="vertical-menu col-md-4">
                  <a href="#" class="active">Profile</a>
                  <a href="#">Update Profile</a>
                  <a href="#">Change Password</a>
                  <a href="#">Order List</a>
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="logout">Logout</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

                <div class="vertical-menu col-md-8" style="background: #eee;">
                       <h1>Content......</h1>
                       <h1>Content......</h1>
                       <h1>Content......</h1>
                       <h1>Content......</h1>
                       <h1>Content......</h1>
                </div>

             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
