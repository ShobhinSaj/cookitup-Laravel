@csrf
<style>
    div input[type="text"],#cuisine_id,#ingredients,#instruction
    {
        border: 1px solid black;
    }
</style>
<div class="form-group">
    <label for="cuisine_id">Cuisine:</label>
    <select id="cuisine_id" name="cuisine_id" class="form-control">
        @foreach ($cuisines as $cuisine)
            <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
        @endforeach
    </select>
</div><br>
<div class="form-group">
    <label for="title">Name:</label>
    <input name="title" id="title" type="text" value="{{$title ?? ''}}" class="form-control">
</div><br>
<div class="form-group">
    <label for="ingredients">Ingredients:[Hold Ctrl(Windows) or Cmd(for mac) to select multiple ingredients]</label>
    <select id="ingredients" name="ingredients[]" multiple class="form-control">
        @foreach ($ingredients as $ingredient)
            <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
        @endforeach
    </select>
</div><br>
<div class="form-group">
    <label for="instruction">Instructions:</label>
    <textarea name="instruction" rows="5" id="instruction" class="form-control" placeholder="Enter recipe instructions">{{$instruction ?? ''}}</textarea>
</div><br>
@if($fileUpdate)
<div class="form-group">
    <label for="file">Image:</label>
    <input type="file" name="file" accept="image/*" class="form-control-file">
</div><br>
@endif
<input name="submit" type="submit" class="btn btn-primary" value="{{ $buttonName }}">
