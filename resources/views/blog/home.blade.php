@extends('app')

@section('content')
<div class="container inner">
    <div class="blog list-view row">
        <div class="col-md-12 col-sm-12 content">
            <div class="blog-posts">

                @foreach($posts as $post)
                    <div class="post box">
                        <figure class="frame main">
                            <a href="{{ route('blog.post', [$post->id, $post->title]) }}">
                                <div class="text-overlay">
                                    <div class="info">
                                        <span>READ MORE</span>
                                    </div>
                                </div>
                                <img src="{{ asset('storage/' . $post->photo) }}" alt="" />
                            </a>
                        </figure>
                        <div class="meta">
                            <span class="category">
                                Journal
                            </span>
                            <span class="date">
                                14 Mar 2013
                            </span>
                            <span class="comments">
                                <a href="#">
                                    9 <i class="icon-chat-1"></i>
                                </a>
                            </span>
                        </div>
                        <h2 class="post-title">
                            <a href="blog-post.html">
                                Vestibulum id ligula porta felis euismod semper vel
                            </a>
                        </h2>
                        <p align="justify">
                            {!! str_limit(strip_tags($post->body, '<br>'), 275, ' ...') !!}
                        </p>
                        </div>
                @endforeach
            </div>

            <div class="pagination box">
                <!-- <ul>
                    <li><a href="#" class="btn">Prev</a></li>
                    <li class="active"><a href="#" class="btn"><span>1</span></a></li>
                    <li><a href="#" class="btn"><span>2</span></a></li>
                    <li><a href="#" class="btn"><span>3</span></a></li>
                    <li><a href="#" class="btn">Next</a></li>
                </ul> -->
                {{ $posts->links('pagination_dark') }}
            </div>
            <!-- /.pagination -->
        </div>
    </div>

</div>
<div class="">
    <br><br>
</div>
@endsection
