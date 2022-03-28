<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Get Wather</title>
</head>

<body>

    <div class="container my-5">

        <div class="row justify-content-center">
            {{-- <a href="https://google.ps">Google</a>
            <span data-link="https://google.ps">Google</span>
            <span data-link="https://youtube.com">Youtube</span>
            <span data-link="https://fb.com">Facebook</span> --}}
            <div class="col-md-6">
                <form>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="City Name" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Get Weather</button>
                      </div>
                </form>

                <div id="weather-info" class="text-center">
                    <img width="60" src="" alt="">
                    <h1 class="display-1"></h1>
                    <p></p>
                </div>
            </div>
        </div>

    </div>

    <script>

        // https://api.openweathermap.org/data/2.5/weather?q={city name}&appid=cad1ff06cfbbb8cbface77415c215122
        $('form').submit(function(event) {
            event.preventDefault();

            let city = $('form input').val();

            $.get({
                url: 'https://api.openweathermap.org/data/2.5/weather?q='+city+'&appid=cad1ff06cfbbb8cbface77415c215122&units=metric&lang=ar',
                success: function(res) {
                    console.log(res);
                    $('#weather-info h1').text( res.main.temp )
                    $('#weather-info p').text( res.weather[0].description )

                    var iconcode = res.weather[0].icon;
                    var iconurl = "http://openweathermap.org/img/w/" + iconcode + ".png";
                    $('#weather-info img').attr('src', iconurl )
                }
            });
        });


        $('a').click(function(e) {
            e.preventDefault();
        });

        $('span').click(function() {
            // console.log( $(this).data('link') );
            let url = $(this).data('link');

            // DOM => Document Object Model
            // BOM => Browser Object Model

            // window.location = url;
            window.open(url, '_blank');
        })

    </script>

</body>

</html>
