<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Feature</title>

        <!-- Fonts -->
        
        

        <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">



        <!-- custom css file link  -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        


        <style>

          table {
            margin-left: 20px;
            margin-right: 20px;

            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
          }

          th {
            font-size: 25px;
            text-align: left;
            padding: 16px;

          }

          td {
            font-size: 15px;
            text-align: left;
            padding: 16px;
             /*border: 1px solid;*/
            
          }

          tr{
            background-color: #f2f2f2;
            border: 1px solid;
          }
        </style>
           
        
    </head>

    <body>
          <header class="header">

                    <div class="header-1">

                      <a href="#" class="logo"> <i class="fas fa-book"></i> bookly </a>

                      <form action="" class="search-form">
                        <input type="search" name="search" placeholder="search here..." id="search-box">
                        <label for="search-box" class="fas fa-search"></label>
                      </form>

                      <div class="icons">
                        <div id="search-btn" class="fas fa-search"></div>
                        <div id="login-btn" class="fas">
                          @guest
                          @if (Route::has('login'))
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @endif

                          @if (Route::has('register'))
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                          @endif
                          @else
                          <li class="dropdown">
                            <a  class="" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-content" >
                              <a class="" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                            </form>
                          </div>
                        </li>
                        @endguest
                      </div>
                    </div>

                  </div>

                  <div class="header-2">
                    <nav class="navbar">
                      
                      <a href="{{ url('/feature') }}">featured</a>
                      <a href="{{ url('/arrival') }}">arrivals</a>
                    </nav>
                  </div>
                  <div>

                    <button class="btn btn-primary" type="submit" style="margin: 50px; float:right; "><a href="{{ url('/create') }} " style="color: white; ">+ Create</a>
                    </button>

                  </div>

          </header>

              
              

          <div class="container" align="center" style="padding-top: 100px;">
          <div class="container" align="center" style="padding-top:30px;">

          <div class="main-panel">
            <div class="row ">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      
                      <div class="table-responsive">
                        <div class="container mt-3">
                          <h2 style="padding-bottom: 50px; font-size: 40px;">Feature Table</h2>
                          <table class="table">
                            <thead>
                              <tr style="background-color: gray;">
                                
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                               
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>

                              </tr>
                            </thead>

                              @foreach($feature as $features)
                                <tbody>
                                  <tr>
                                    
                                    <td>{{ $features->id }}</td>
                                    <td>{{ $features->name }}</td>
                                    <td>{{ $features->price }}</td>
                                    
                                    <td><img src="{{ asset('storage/images/' . $features->image) }}" style="height: 50px; width: 50px; "  ></td>
                                    
                                    
                                    
                                    <td>
                                      <a href="/feature-show/{{$features->id }}"><button class="btn btn-info"  style="background-color: red; margin-left: 0px;">View</button></a>
                                    
                                      <a href="/feature-edit/{{ $features->id }}"><button class="btn btn-primary" style="background-color: blue; margin-left: 2px;">Edit</button></a>
                                    
                                      <a href="/feature-delete/{{ $features->id }}"><button class="btn btn-danger" style="background-color: black; margin-left: 2px;">Delete</button></a>
                                    </td>
                                    
                                    
                                    
                                  </tr>
                                </tbody>
                              @endforeach
                          </table>
                          </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>

        </div>
        
    </body>
  

</html>
