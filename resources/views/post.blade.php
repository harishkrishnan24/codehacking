@extends('layouts.blog-post')

@section('content')
                <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted {{ $post->created_at->diffForHumans() }}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{ $post->photo->file }}" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">{{ $post->body }}</p>

                <hr>

                @if (Session::has('comment_message'))
                    {{ session('comment_message') }}
                @endif

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if (Auth::check())
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="{{ route('admin.comments.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
                @endif

                <hr>

                <!-- Posted Comments -->
            @if (count($comments) > 0)
                @foreach ($comments as $comment)
                                        <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" height="64" src="{{ $comment->photo }}" alt="user_image">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $comment->author }}
                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                        </h4>
                        {{ $comment->body }}
                        @if (count($comment->replies) > 0)            @foreach ($comment->replies as $reply)   
                        @if ($reply->is_active == 1)
                                                <!-- Nested Comment -->
                        <div class="media nested-comment">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{ $reply->photo }}" alt="" height="64">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $reply->author }}
                                    <small>{{ $reply->created_at->diffForHumans() }}</small>
                                </h4>
                                {{ $reply->body }}
                            </div>
                             <div class="comment-reply-container">
                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>
                    <div class="comment-reply">
                            <form role="form" method="post" action="{{ route('createReply') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="1" name="body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Reply</button>
                    </form>
                    </div>
                        </div>
                </div>      
                                        <!-- End Nested Comment --> 
                                        @else
                                        <h1 class="text-center">No Replies</h1>
                        @endif
                                        @endforeach                        
                        @endif
                    </div>
                </div>
                @endforeach
            @endif
            </div>
@endsection

@section('scripts')
    <script>
        $('.comment-reply-container .toggle-reply').click(function() {
            $(this).next().slideToggle('slow');
        });
    </script>
@endsection