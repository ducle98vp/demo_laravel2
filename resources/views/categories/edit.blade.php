<form action="" method="POST">
    
    
    {{ csrf_field() }}
    <div class="form-check">
    <label class="form-check-label" for="exampleCheck1">ID</label>
    <input type="text" class="form-check-input" id="exampleCheck1" disabled value="{{$category->id}}">
    </div>
    <div class="form-check">
        <label class="form-check-label" for="exampleCheck1">Name</label>
    <input type="text" class="form-check-input" id="exampleCheck1" value="{{$category->name}}" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>