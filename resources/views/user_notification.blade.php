<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>Document</title>
</head>
<body>

    <div class="container my-5">
        <a href="{{ route('read_all') }}">Mark all as read</a>

        <ul class="list-group" id="notification-list">
            @foreach ($user->notifications as $notification)
            {{-- {{ $notification }} --}}
                {{-- <li class="list-group-item"><a href="{{ $notification->data['url'] }}">{{ $notification->data['content'] }}</a></li> --}}
                <li class="list-group-item d-flex justify-content-between {{ $notification->read_at ? '' : 'bg-light' }}">
                    <span>{{ $notification->data['content'] }}</span>
                    @if (!$notification->read_at)
                        <a href="{{ route('read', $notification->id) }}">Mark as Read</a>
                    @endif

                </li>
            @endforeach
        </ul>
    </div>

<script> var userId = '{{ Auth::id() }}'; </script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
