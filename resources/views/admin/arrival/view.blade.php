<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>Document</title>

<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body>

<div class="gallery">
  <h1>{{ $arrival->name }}</h1>
  <a target="_blank" href="{{ asset('storage/images/' . $arrival->image) }}">
    <img src="{{ asset('storage/images/' . $arrival->image) }}" alt="Cinque Terre" width="600" height="400">
  </a>
  <h1>{{ $arrival->price }}</h1>
</div>



</body>
</html> 