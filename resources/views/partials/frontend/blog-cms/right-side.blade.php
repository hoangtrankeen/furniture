<div class="col-md-3">
    <div class="sidebar-blog">
        {{--<aside class="sidebar-search">--}}
            {{--<form>--}}
                {{--<input type="text" placeholder="Search Here..."/><a href="#"><i class="fa fa-search"></i></a>--}}
            {{--</form>--}}
        {{--</aside>--}}
        <aside class="categorie">
            <h4>Danh muc</h4>
            <ul class="categories">
                @foreach(ManagerCatalog::getAllTopics() as $topic)
                    <li><a href="{{route('cms.topic', ['slug' => $topic->slug])}}">{{$topic->name}}</a></li>
                @endforeach
            </ul>
        </aside>
        {{--<aside class="recent-post post-sidebar">--}}
            {{--<h4>Recent post</h4>--}}
            {{--<ul class="recent-posts">--}}
                {{--<li><a href="#"> <img src="images/demo/demo_15.jpg" alt="sideber" width="70" height="70"/></a>--}}
                    {{--<div class="posts-thumbnail-content">--}}
                        {{--<h4><a href="#">Duis aute irure dolor in reprehenderit</a></h4>--}}
                        {{--<div class="posts-thumbnail-meta"><span class="author vcard">admin</span><span>May, 2016</span><span class="comment-count"><i class="fa fa-comments-o"></i><a href="#">2</a></span></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li><a href="#"> <img src="images/demo/demo_14.jpg" alt="sideber" width="70" height="70"/></a>--}}
                    {{--<div class="posts-thumbnail-content">--}}
                        {{--<h4><a href="#">Voluptates repudiandae sint et molestiae</a></h4>--}}
                        {{--<div class="posts-thumbnail-meta"><span class="author vcard">admin</span><span>June, 2016</span><span class="comment-count"><i class="fa fa-comments-o"></i><a href="#">1</a></span></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li><a href="#"> <img src="images/demo/demo_12.jpg" alt="sideber" width="70" height="70"/></a>--}}
                    {{--<div class="posts-thumbnail-content">--}}
                        {{--<h4><a href="#">We commonly need Lorem Ipsum</a></h4>--}}
                        {{--<div class="posts-thumbnail-meta"><span class="author vcard">admin</span><span>July, 2016</span><span class="comment-count"><i class="fa fa-comments-o"></i><a href="#">0</a></span></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</aside>--}}
        {{--<aside class="most-view post-sidebar">--}}
            {{--<h4>Most view</h4>--}}
            {{--<ul class="recent-posts">--}}
                {{--<li><a href="#">--}}
                        {{--<p> <span class="day">04</span><span class="month">april</span></p></a>--}}
                    {{--<div class="posts-thumbnail-content">--}}
                        {{--<h4><a href="#">Duis aute irure dolor in reprehenderit</a></h4>--}}
                        {{--<div class="posts-thumbnail-meta"><span class="author vcard">admin</span><span>May, 2016</span><span class="comment-count"><i class="fa fa-comments-o"></i><a href="#">2</a></span></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li><a href="#">--}}
                        {{--<p> <span class="day">04</span><span class="month">april</span></p></a>--}}
                    {{--<div class="posts-thumbnail-content">--}}
                        {{--<h4><a href="#">Voluptates repudiandae sint et molestiae</a></h4>--}}
                        {{--<div class="posts-thumbnail-meta"><span class="author vcard">admin</span><span>June, 2016</span><span class="comment-count"><i class="fa fa-comments-o"></i><a href="#">1</a></span></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--<li><a href="#">--}}
                        {{--<p> <span class="day">04</span><span class="month">april</span></p></a>--}}
                    {{--<div class="posts-thumbnail-content">--}}
                        {{--<h4><a href="#">We commonly need Lorem Ipsum</a></h4>--}}
                        {{--<div class="posts-thumbnail-meta"><span class="author vcard">admin</span><span>July, 2016</span><span class="comment-count"><i class="fa fa-comments-o"></i><a href="#">0</a></span></div>--}}
                    {{--</div>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</aside>--}}
        <aside class="tagcloud">
            <h4>tags</h4>
            <ul class="tagcloud">
                <li><a href="#">Bag</a></li>
                <li><a href="#">Comb</a></li>
                <li><a href="#">Chair</a></li>
                <li><a href="#">Classic</a></li>
                <li><a href="#">Desk</a></li>
                <li><a href="#">Gel</a></li>
                <li><a href="#">Lamp</a></li>
                <li><a href="#">Glass</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Table Tiles</a></li>
                <li><a href="#">Socks</a></li>
            </ul>
        </aside>
    </div>
</div>