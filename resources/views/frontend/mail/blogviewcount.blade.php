<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>

<body style="">

    <div
        style="
        background-color: rgb(245, 255, 252);
        font-style: normal;
        padding: 10px;
        width: 100%;
        border-radius: 20px;
      ">
        <div style="

      font-style: 32px;

    ">
            @if ($mailData['status'] == 'view')
                Blog View
            @elseif ($mailData['status'] == 'likes')
                Blog Liked
            @elseif ($mailData['status'] == 'comments')
                Blog Comment
            @endif
        </div>
        <div
            style="
          background-color: white;
          margin: 3rem auto;
          padding: 2rem;
          margin-top: 150;
          font-size: 1rem;
          border-radius: 20px;
        ">


            <p style="margin-top: 30px;">
                @if ($mailData['status'] == 'view')
                    <h3>{{$mailData['name']}} viewed</h3>
                @elseif ($mailData['status'] == 'likes')
                    <h3>{{$mailData['name']}} liked</h3>
                @elseif ($mailData['status'] == 'comments')
                    <h3>{{$mailData['name']}} comments</h3>
                @endif
            <h4>{{ $mailData['blog']->title }} </h4> blog from
            </p>

            @if ($mailData['currentLocation'])
                <h4>Country Name: {{ $mailData['currentLocation']->countryName }}</h4>
                <h4>Country Code: {{ $mailData['currentLocation']->countryCode }}</h4>
                <h4>Region Code: {{ $mailData['currentLocation']->regionCode }}</h4>
                <h4>Region Name: {{ $mailData['currentLocation']->regionName }}</h4>
                <h4>City Name: {{ $mailData['currentLocation']->cityName }}</h4>
            @else
                <p>Location information not available.</p>
            @endif

            Thank you.
            </p>

        </div>

    </div>
</body>

</html>
