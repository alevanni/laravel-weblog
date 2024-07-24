<nav class="my-nav">
    <ul>
       <li><a href="{{ route('articles.index') }}">Articles List</a></li>
       <li><a href="{{ route('articles.users.index') }}">My Articles List</a></li>
       <li><a href="{{ route('articles.create') }}">Write a new article</a></li>
       <li><a href="{{ route('articles.login-page') }}">Log in</a></li>
       <li><a href="{{ route('articles.logout') }}">Log out</a></li>
    </ul>

</nav>