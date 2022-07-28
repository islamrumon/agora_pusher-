@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        @foreach ($users as $item)
                        <li class="list-group-item">
                            
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{$item->name}}</div>
                            
                              </div>
                              <span class="badge bg-primary rounded-pill"><a href="{{route('chat.start',$item->id)}}">Chat</a></span>
                              </li>
                        @endforeach
                      </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
