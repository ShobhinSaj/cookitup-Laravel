@csrf
<style>
    input[type="text"]{
        border:1px solid black;
    }
</style>
<div class="form-group">
    <label for="name">Cuisine Name:</label>
    <input name="name" id="name" type="text" value="{{$name ?? ''}}" class="form-control">
</div><br>
<div class="form-group">
    <label for="file">Image:</label>
    <input type="file" name="file" accept="image/*" class="form-control-file">
</div><br>
<input name="submit" type="submit" class="btn btn-primary" value="{{ $buttonName }}">
