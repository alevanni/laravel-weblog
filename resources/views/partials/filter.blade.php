<form action="{{ route('articles.categories.show')}}" method="GET">
   @csrf
   <label for="category">Filter by category:</label>
   <select name="category" id="category" >
       <option value= ''>--- Reset Filter ---</option>
       <option value='null'>Articles without categories</option>
       @foreach($categories as $category)
           <option value="{{ $category->id }}">{{ $category->name }}</option>
       @endforeach
   </select>
   <button type="submit">Filter</button>
</form>