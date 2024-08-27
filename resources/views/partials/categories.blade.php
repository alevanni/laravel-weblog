<label for="category">Category (optional):</label>
<select name="category[]" id="category" multiple>
   
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>