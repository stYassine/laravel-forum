<div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active">
                        <a href="{{ route('dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class="material-icons">person</i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('channels.index') }}">
                            <i class="material-icons">content_paste</i>
                            <p>Channels</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('discussions.index') }}">
                            <i class="material-icons">library_books</i>
                            <p>Discussions</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('replies.index') }}">
                            <i class="material-icons">bubble_chart</i>
                            <p>Replies</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('likes.index') }}">
                            <i class="material-icons">bubble_chart</i>
                            <p>Likes</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('watchers.index') }}">
                            <i class="material-icons">location_on</i>
                            <p>Watchers</p>
                        </a>
                    </li>
                    <li class="active-pro">
                        <a href="upgrade.html">
                            <i class="material-icons">unarchive</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>