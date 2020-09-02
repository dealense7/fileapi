<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
  <!-- Magic Modal -->
<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body row">
            <div class="forma  col-12">
                <img class="forma-bg" src="{{asset('../img/login.svg')}}">
                <h4>მონაცემების გადაგზავნა</h4>
                <p>გთხოვთ შეავსოთ ქვემოთ მოცემული ორივე სავალდებულო ველი.</p>
               <form action="/upload" enctype="multipart/form-data" method="POST">
                @csrf
                <input type="text" id="title" name="title" class="form-control" placeholder="ფაილის სათაური" autocomplete="off">
                <input type="text" id="body" name="body" class="form-control" placeholder="ფაილის აღწერა" autocomplete="off">
                <label for="file" class="btn btn-getfile btn-modal col-12">
                    <svg width="1.3em" stroke="#6c757d" stroke-width="0.4" height="1.3em" viewBox="0 0 16 16" class="m-1 bi bi-file-earmark-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                        <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z"/>
                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 7.707V11.5a.5.5 0 0 0 .5.5z"/>
                      </svg>
                    ფაილის არჩევა
                    </label>
                    <input class="d-none" type="file" id="file" name="file">
                <button class="btn btn-modal col-12">
                    ატვირთვა
                  <svg width="1.5em" height="1.5em" stroke="white" viewBox="0 0 16 16" class="bi bi-arrow-right-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-width="0.4" fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                  </svg>
                </button>
               </form>
              </div>
        </div>

      </div>
    </div>
  </div>
    <div id="app" class="container py-3">
        
        <nav class="navbar navbar-light bg-white">
            <a class="navbar-brand" href="#">API გადაგზავნა</a>
            <button class="btn btn-modal m-0" data-toggle="modal" data-target="#exampleModal">
                      დამატება
            </button>
        
          </nav>
        <main class="py-4">
            <!-- Success Message -->
           @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-family: normal; font-size:0.8rem">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
           @endif

           <!-- Contnet -->
            @yield('content')
        </main>
    </div>  
</body>
</html>
