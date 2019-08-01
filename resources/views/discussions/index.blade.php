@extends('layouts.app')

@section('content')


    @foreach($discussions as $discussion)
        <div class="card my-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">

                    <div>
                        <img widht="40px" height="40px" style="border-radius: 50%;" src="{{ Gravatar::src($discussion->user->email) }}">
                        <strong class="ml-2">{{ $discussion->user->name }}</strong>
                    </div>

                    <div>
                        <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success btn-sm my-2">View Conversation</a>
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

            </div>
        </div>
    @endforeach

    {{$discussions->appends(['channel'=>request()->query('channel')])->links()}}

@endsection

