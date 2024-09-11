@foreach ($article->categories as $category)
<span class='badge '>{{$category->name}}</span>
@endforeach