<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            @foreach($dataCrawls as $dataCrawl)
                <div class="col-md-12">
                    <a href="{{ $dataCrawl['title']['href'] }}">{{ $dataCrawl['title']['text'] }}</a>
                </div>
                <div class="col-md-12">
                    <div class="col-md-5">
                        <img src="{{ $dataCrawl['body']['image'] }}"  class="img-rounded">
                    </div>
                    <div class="col-md-6">
                        <p>{{ $dataCrawl['body']['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
