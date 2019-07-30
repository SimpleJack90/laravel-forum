@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Add Discussion</div>

        <div class="card-body">

            <form action="{{route('discussion.store')}}" method="post">

                @csrf

                <div class="form-group">
                   <label for="title">Title</label>
                   <input id="title" class="form-control" name="title" value="">
                </div>

                <div class="form-group">
                    <label for="content">Content
                    </label>
                    <input id="content" type="hidden" name="content">
                    <trix-editor input="content"></trix-editor>


                </div>

                <div class="form-group">
                    <label for="channel">Channels</label>
                    <select name="channel" id="channel" class="form-control">

                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}">{{$channel->name}}</option>
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success form-control">Create Discussion</button>
                </div>
            </form>


        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    @endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js" integrity="sha256-ZnHiEOG1mQVIQHeVGc+lHPvZjtCC8cWqNI7W1GpkN3I=" crossorigin="anonymous"></script>
    @endsection