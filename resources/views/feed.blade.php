<!DOCTYPE html>
<html lang="eng">
<body>
    <header class="block">
        <ul class="header-menu horizontal-list">
            <li>
                <a class="header-menu-tab" href="{{ route('main.page') }}"><span class="icon fontawesome-user scnd-font-color"></span>Account</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages</a>
                {{--                <a class="header-menu-number" href="#4">5</a>--}}
            </li>
            <li>
                <a class="header-menu-tab" href="{{ route('feed') }}"><span class="icon fontawesome-star-empty scnd-font-color"></span>Feed</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Subscriptions</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#5"><span class="icon fontawesome-star-empty scnd-font-color"></span>Notifications</a>
            </li>
            <li>
                <a id="logout-button" class="header-menu-tab" href="{{ route('logout') }}">
                    <img src="https://cdn.icon-icons.com/icons2/2943/PNG/512/logout_icon_184025.png" alt="Log Out" height="20" style="vertical-align: middle; margin-right: 8px;">
                    Log out
                </a>
            </li>
        </ul>
        <div class="profile-menu">
            {{--                <p>Me <a href="/logout"><span class="entypo-down-open scnd-font-color"></span></a></p>--}}
            <div class="profile-picture small-profile-picture">
                <img width="40px" alt="{{ Auth::user()->name }} picture"
                     src="{{ Auth::user()->avatar_url ?: 'https://media.istockphoto.com/id/1209654046/vector/user-avatar-profile-icon-black-vector-illustration.jpg?s=612x612&w=0&k=20&c=EOYXACjtZmZQ5IsZ0UUp1iNmZ9q2xl1BD1VvN6tZ2UI=' }}" >
            </div>
        </div>
    </header>

    <div class="tweets-block">
        <h2 class="titular"><span class="icon zocial-twitter"></span>LATEST POSTS</h2>
        @foreach($posts as $post)
            <div class="tweet first">
                <p>{{ $post->content }}</p>
                <p><a class="time-ago scnd-font-color" href="#18">create {{ $post->created_at->diffForHumans() }}; update {{ $post->updated_at->diffForHumans() }}</a></p>
                <span>{{ $post->likes->count() }} likes</span>
                <form action="{{ route('post.like', ['postId' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                        <img src="https://www.svgrepo.com/show/111566/like.svg" alt="Like" style="height: 20px;">
                    </button>
                </form>
                <p class="author-name">{{ $post->user->name }}</p>
                <div class="comment-input-container">
                    <form action="{{ route('comments.create', ['postId' => $post->id])}}" method="POST">
                        @csrf
                        <input type="text" name="content" placeholder="Write a comment..." required>
                        <button type="submit" style="background: none; border: none; cursor: pointer;">
                            <img src="https://www.svgrepo.com/show/309459/comment.svg" alt="Edit" style="height: 20px;">
                        </button>
                    </form>
                </div>
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <strong>{{ $comment->user->name }}:</strong>
                        <p>{{ $comment->content }}</p>
                    </div>
                @endforeach
            </div>

        @endforeach
    </div>

</body>
</html>
<style>
    header {
        width: 67%;
        margin-left: auto;
        margin-right: 265px;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        box-sizing: border-box;
        background: #394264;
        border-radius: 5px;
        box-shadow: 0px 1px 1px black;
        border: 1px solid #1f253d;
    }

    .header-menu {
        list-style: none;
        display: flex;
        align-items: center;
        padding: 0;
        margin: 0;
        font-family: 'Ubuntu', sans-serif;
        font-size: 15px;
        color: #fff;
    }

    .header-menu li {
        position: relative;
    }

    .header-menu-tab {
        display: flex;
        align-items: center;
        padding: 0 15px;
        height: 100%;
        color: #fff;
        text-decoration: none;
    }

    .header-menu-tab:hover {
        background: #50597b;
        border-bottom: 4px solid #11a8ab;
        text-decoration: none;
    }

    .header-menu-tab .icon {
        padding-right: 10px;
    }

    .header-menu-number {
        position: absolute;
        line-height: 22px;
        padding: 0 6px;
        font-weight: 700;
        background: #e64c65;
        border-radius: 100%;
        top: 15px;
        right: 2px;
        transition: all .3s linear;
    }

    .header-menu li:hover .header-menu-number {
        transform: rotate(360deg);
    }

    .profile-menu {
        display: flex;
        align-items: center;
    }

    .profile-menu p {
        font-size: 17px;
        margin-right: 10px;
    }

    #logout-button {
        display: inline-block;
        background: none;
        border: none;
        color: #fff;
        cursor: pointer;
        transition: background .3s;
    }

    #logout-button:hover {
        background: #50597b;
        border-bottom: 4px solid #11a8ab;
    }

    #logout-button img {
        vertical-align: middle;
        margin-right: 8px;
    }

    body {
        background: #1f253d;
    }

    .tweets-block {
        box-sizing: border-box;
        padding: 30px;
        width: 67%;
        background: #394264;
        border-radius: 5px;
        margin-bottom: 25px;
        margin-left: 205px;
        box-shadow: 0px 1px 1px black;
        border: 1px solid #1f253d;
    }

    .tweets-block input::placeholder {
        color: #9099b7;
    }

    .tweets-block .titular {
        color: #fff;
        margin-bottom: 15px;
        line-height: 60px;
        text-align: center;
        background: #11a8ab;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .tweets-block .tweet {
        background: #50597b;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 3px;
    }

    .tweet-link {
        color: #4fc4f6;
        text-decoration: none;
    }

    .tweet-link:hover {
        text-decoration: underline;
    }

    .time-ago {
        color: #9099b7;
        font-size: 0.85em;
    }

    .tweets-block .tweet:first-child {
        margin-top: 0;
    }

    .tweets-block .tweet:last-child {
        margin-bottom: 0;
    }

    .tweets-block .tweet p {
        color: #ffffff;
    }

    .tweets-block .tweet a.time-ago {
        color: #9099b7;
        text-decoration: none;
    }

    .tweets-block .tweet a.time-ago:hover {
        text-decoration: underline;
    }

    .tweets-block .tweet .author-name {
        color: #11a8ab;
        font-size: 1rem;
        font-weight: bold;
        margin-top: 5px;
        text-align: right;
    }

    .comment {
        background: #6c7293;
        padding: 5px 10px;
        margin-top: 10px;
        border-radius: 5px;
    }

    .comment-input-container input[type="text"] {
        width: calc(100% - 700px); /* Adjusted for padding */
        height: 50px;
        padding-left: 45px;
        margin-left: 20px; /* Match the first view's input margin */
        background: #50597b;
        color: #fff;
        border: solid 1px #1f253d;
        border-radius: 5px;
        font-family: 'Ubuntu', sans-serif; /* Match the font from the first view */
    }

    .comment-input-container input[type="text"]::placeholder {
        color: #9099b7;
    }

    .comment-input-container input[type="text"]:focus {
        outline: none;
        border: 1px solid #11a8ab;
    }

    .comment-input-container .input-icon {
        font-size: 22px;
        position: absolute;
        left: 15px; /* Match the first view's icon position */
        top: 50%;
        transform: translateY(-50%);
        color: #9099b7; /* Match the first view's icon color */
    }


</style>
