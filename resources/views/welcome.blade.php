@extends('layouts.app')
@section('content')

          <!-- Data -->
              <div class="row post m-0">
                  <div class="col-md-3">
                      სათაური
                  </div>
                  <div class="col-md-3">
                      აღწერა
                  </div>
                  <div class="col-md-3">
                      ფაილი
                  </div>
              </div>
          @if ($posts)
          @foreach ($posts as $post)
            <div class="row post m-0" id="post{{$post['id']}}">
                  <div class="col-md-3">
                      {{ $post['title'] }}
                  </div>
                  <div class="col-md-3">
                      @if ($post['body'])
                      {{ $post['body'] }}
                      @endif
                  </div>
                  <div class="col-md-3">
                  <a href="{{$url}}/../images/{{ $post['file'] }}" >გადაწერა</a>
                  </div>
                  <div class="row col-3">
                        <button onclick="remove({{$post['id']}})" class="btn btn-modal m-0 col-12" style="background-color:tomato">წაშლა</button>
                  </div>
              </div>
          @endforeach
      @endif
      <script>
          function remove($id){
               $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                type:'DELETE',
                url:'/api/files/'+$id,
                data:{id:$id},
                success:function(data){
                    if(data.msg == "success"){
                        $('#post'+$id).remove();
                    }
                }

                });
          }
      </script>
@endsection