<h1>Articles</h1>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Text</th>
        </tr>
    </thead>
    <tbody>
     @foreach($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->body }}</td>
      
             </tr>
      @endforeach
    </tbody>
</table>