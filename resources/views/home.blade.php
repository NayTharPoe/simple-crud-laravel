<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  @auth
  <h2>Congratulations, {{ auth()->user()->name }}, you are logged in </h2>
  <form action="/logout" method="POST">
    @csrf
    <button>logout</button>
  </form>

  <div>
    <form action="/create-post" method="post">
      @csrf
      <input type="text" name="title" placeholder="title">
      <textarea name="body" id="" cols="30" rows="4" placeholder="body content"></textarea>
      <button>Save Post</button>
    </form>
  </div>

  <div>This is all posts</div>
  @foreach ($posts as $post)
  <div style="background: gray; color: white; padding: 10px; margin: 2px">
    <p>{{ $post->title }} by {{$post->user->name}}</p>
    <p>{{ $post->body }}</p>
    <p><a href="/edit-post/{{ $post->id }}">Edit</a></p>
    <form action="/delete-post/{{ $post->id }}" method="post">
      @csrf
      @method('DELETE')
      <button>Delete</button>
    </form>
  </div>
  @endforeach

  @else
  <div>
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <input type="text" name="name" placeholder="username">
      <input type="email" name="email" placeholder="email">
      <input type="password" name="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>

  <div>
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input type="text" name="login_name" placeholder="username">
      <input type="password" name="login_password" placeholder="password">
      <button>Login</button>
    </form>
  </div>
  @endauth

</body>

</html>