@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulations!</strong><span> You can invite others join this channel by click </span><a href="" target="_blank">here</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulations!</strong><span> Joined room successfully. </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div id="success-alert-with-token" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulations!</strong><span> Joined room successfully. </span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul class="list-group">
                            @foreach ($chat->messages as $message)
                                <li class="list-group-item">
                                    <div class="ms-2 me-auto">
                                        <div class="fw-bold">{{ $message->user->name }}</div>
                                        {{ $message->mess }}
                                    </div>
                                    <span class="badge bg-dark rounded-pill text-light">{{ $message->created_at }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <form class="" method="psot">
                            @csrf
                        <div class="row">
                            <div class="col">
                              <input type="text" name="message" class="form-control" placeholder="First name" aria-label="First name">
                            
                             
                            </div>
                            <div class="col">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary">Send message</button>
                                    <button id="join" type="button" class="btn btn-info">Video</button>
                                    <button type="button" class="btn btn-dark">Audio</button>
                                  </div>
                            </div>
                          </div>
                        </form>


                        <div class="row video-group">
                            <div class="col">
                              <p id="local-player-name" class="player-name"></p>
                              <div id="local-player" class="player"></div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col">
                              <div id="remote-playerlist"></div>
                            </div>
                          </div>

                          
                        <form id="join-form">
                            <input id="appid" type="hidden" value="{{env('AGORA_APP_KEY')}}" >
                            <input id="token" type="hidden" value="{{env('TEMP_TOKEN')}}">
                            <input id="channel" type="hidden" value="rumon707">
                      
                            <div class="button-group d-none" id="leave-btn">
                              <button id="leave" type="button" class="btn btn-primary btn-sm" disabled>Leave</button>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
