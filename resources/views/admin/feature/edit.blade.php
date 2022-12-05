<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Update Product</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <!-- Styles -->
        

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    
                        <div class="container py-5 h-100">
                            <div class="row justify-content-center align-items-center h-100">
                              <div class="col-12 col-lg-9 col-xl-7">
                                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                                  <div class="card-body p-4 p-md-5">
                                    <h3 class="mb-4 pb-2 pb-md-0 mb-md-5"> Feature Create </h3>

                                    @if(session()->has('message'))
                                      <div class="alert alert-success" style="width: 300px;">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        {{ session()->get('message') }}

                                      </div>


                                      @endif
                                    <form action="{{ url('/feature-update/')}}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $feature->id }}">
                                      <div class="row">
                                        <div class="col-md-6 mb-4">

                                          <div class="form-outline">
                                            <input type="text" id="name" name="name" value="{{ $feature->name }}" placeholder="name" class="form-control form-control-lg" required />
                                            <label class="form-label" for="name">Name</label>
                                          </div>

                                        </div>
                                        <div class="col-md-6 mb-4">

                                          <div class="form-outline">
                                            <input type="text" id="price" name="price" value="{{ $feature->price }}" placeholder="price" class="form-control form-control-lg" required />
                                            <label class="form-label" for="price">price</label>
                                          </div>

                                        </div>
                                        

                                        <div class="col-md-6 mb-4">

                                          <div class="form-outline">
                                            <input type="file" id="image" name="image" value="{{ $feature->image }}" placeholder="Image file" class="form-control form-control-lg" required />
                                            <label class="form-label" for="image">Image</label>
                                          </div>

                                        </div>

                                        <div class="mt-4 pt-2">
                                        <input class="btn btn-primary btn-lg" type="submit" value="Update" />
                                        </div>

                                      </div>

                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                </div>
            </div>
    </body>
</html>
