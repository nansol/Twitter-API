<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">
    <title>Twitter API</title>
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="#">Twitter API</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home</a>
                    </li>
                   </ul>
                </div>
              </nav>

<div class="container">
<div class="row " >
    <div class="col align-self-center m-5 ">
        <h1 class="text-info">Nancy's Tweets Api</h1>
    </div>
</div>
<div class="row">
<div class="col align-self-center mb-5">
        <form class="well" action="{{route('post.tweet')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger"> {{$error}}</div>
            @endforeach
            @endif
            <div class="form-group">
                <label>Your Tweet</label>
                <input type="text" name="tweet" class="form-control">
            </div>
            <div class="form-group">
                <label>Upload Filet</label>
                <input type="file" class="form-control-file" name="images[]" multiple>
            </div>

            <div class="from-group">
                <button class="btn btn-success">Create Tweet</button>
            </div>
            </form>
</div>

</div>
@if(!empty($data))
@foreach ($data as $key => $tweet )
    <div class="card text-primary bg-white mb-3 align-self-center" style="max-width: 50rem;">
        <div class="card-body">
            <h4 class="card-title"></h4>
            <p class="card-text"><h3>{{$tweet->text}}</h3></p>
            @if(!empty($tweet->extented_entities->media)){
            @foreach ($tweet->extented_entities->media as $i)
            <img src="{{$i->media_url_https}}" style="width:100px;">

            @endforeach
            }
            @endif
            <div class="card-header">
                    <i class="fas fa-heart"> {{$tweet->favorite_count}}</i>
                    <i class="fas fa-redo"> {{$tweet->retweet_count}}</i>
            </div>
        </div>
    </div>




@endforeach

@else
<p>No Tweets Found</p>
@endif
</div>

</body>
</html>
