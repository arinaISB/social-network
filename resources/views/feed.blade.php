@extends('layouts.app')
@section('content')
<html lang="en">
<body>
    <header class="block">
        <ul class="header-menu horizontal-list">
            <li>
                <a class="header-menu-tab" href="{{ route('main.page') }}"><span class="icon fontawesome-user scnd-font-color"></span>Account</a>
            </li>
            <li>
                <a class="header-menu-tab" href="#3"><span class="icon fontawesome-envelope scnd-font-color"></span>Messages</a>
                                <a class="header-menu-number" href="#4">5</a>
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
                            <p>Me <a href="/logout"><span class="entypo-down-open scnd-font-color"></span></a></p>
            <div class="profile-picture small-profile-picture">
                <img width="40px" alt="{{ Auth::user()->name }} picture"
                     src="{{ Auth::user()->avatar_url ?: 'https://media.istockphoto.com/id/1209654046/vector/user-avatar-profile-icon-black-vector-illustration.jpg?s=612x612&w=0&k=20&c=EOYXACjtZmZQ5IsZ0UUp1iNmZ9q2xl1BD1VvN6tZ2UI=' }}" >
            </div>
        </div>
    </header>

    <div id="app">
        <feed-component :posts="{{ $posts }}"></feed-component>
    </div>
</body>
</html>
@endsection

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
</style>
