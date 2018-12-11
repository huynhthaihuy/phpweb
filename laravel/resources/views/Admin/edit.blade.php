<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="Header container text-center">
    <h1> LARAVEL CRUD USERS EDIT </h1>
</div>
<div class="align-items-center">
<form action="{{asset('users/'. $post->id.'/updated')}}" method="post">
    <input type="hidden" name="_method" value="put" /> 
    <div class="form-group ">
    Title: <input type="text" name="title" placeholder="input name" value="{{$post->title}}"><br>
    </div>
    <div class="form-group ">
    <button type="submit">Save</button>
    {{ csrf_field() }}
    </div>
</form>
</div>
</body>
</html>