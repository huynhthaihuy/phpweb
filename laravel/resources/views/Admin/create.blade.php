<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
</head>
<body>
<div class="Header container text-center">
    <h1> LARAVEL CRUD USERS CREATE</h1>
</div>
<div class="align-items-center">
<form action="{{asset('posts')}}" method="POST">
{{csrf_field()}}
    <div class="form-group ">
    Title: <input type="text" name="title" placeholder="input name" class="ml-5"><br>
    </div>
    <div class="form-group ">
    Description: <input type="text" name="description" placeholder="input description"><br>
    </div>
    <div>
    <div> 
    Category:
    <select name="categories" class="ml-3">
    @foreach($categories as $category)
    <option value="{{$category->id}}">
    {{$category->name}}
    </option>
    @endforeach
</select>
    </div>
    <div class="mt-3">
    Content:
    <textarea name="content" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script> CKEDITOR.replace('editor1'); </script>
    </div>
    <div class="form-group ">
    <button type="submit">Confirm</button>
    </div>
</form>
</div>
</body>
</html>