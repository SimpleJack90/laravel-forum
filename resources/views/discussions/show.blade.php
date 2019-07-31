@extends('layouts.app')

@section('content')

    <div class="card mb-2">
        <div class="card-header">
            <div class="d-flex justify-content-between">

                <div>
                    <img widht="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($discussion->user->email) }}">
                    <strong class="ml-2">{{ $discussion->user->name }}</strong>
                </div>


            </div>


        </div>

        <div class="card-body">
            <div class="text-center">
                <h4>
                    <strong class="">
                        {!! $discussion->title!!}
                    </strong>
                </h4>
            </div>

            <hr>

            {!! $discussion->content !!}

            @if($discussion->bestReply)

                <div class="card my-2 text-white bg-success">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">

                            <div>

                                <img class="mr-2" style="border-radius: 50%;" width="40px" height="40px" src="{{Gravatar::src($discussion->bestReply->user->email)}}">
                                <strong>{{$discussion->bestReply->user->name}}</strong>

                            </div>
                            <div>
                                <span>BEST REPLY</span>
                                <p class="mr-1">{{$discussion->bestReply->created_at->diffForHumans()}}</p>


                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                        {!! $discussion->bestReply->content !!}
                    </div>

                </div>


            @endif
        </div>
    </div>

    @foreach($discussion->replies()->paginate(5) as $reply)
        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                <div>
                    <img widht="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($reply->user->email) }}">
                    <strong class="ml-2">{{ $reply->user->name }}</strong>
                </div>

                <div>

                    @if(auth()->user()->id==$discussion->user_id)
                        <form method="post" action="{{route('discussions.reply',[
                        'discussion'=>$discussion->slug,
                        'reply'=>$reply->id
                        ])}}">

                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Mark as Best Reply</button>

                        </form>

                    @endif
                        <span class="my-2 mx-2">{{$reply->created_at->diffForHumans()}}</span>
                </div>




                </div>

            </div>
            <div class="card-body">
                {!! $reply->content !!}


            </div>
        </div>

        @endforeach
    {{$discussion->replies()->paginate(5)->links()}}

    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        <div class="card-body">

            @auth
            <form action="{{route('replies.store',$discussion->slug)}}" method="post">
                @csrf

                <input type="hidden" name="content" id="content">
                <trix-editor input="content"></trix-editor>

                <button type="submit" class="btn-sm btn btn-success mt-2" >
                   Add Reply
                </button>
            </form>

            @else

                <div class="justify-text-center">
                    If you want to leave a reply, please <a href="{{route('login')}}">Sign In</a>.
                </div>

            @endauth


        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" integrity="sha256-ZnHiEOG1mQVIQHeVGc+lHPvZjtCC8cWqNI7W1GpkN3I=" crossorigin="anonymous"></script>
@endsection