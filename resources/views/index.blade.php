<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verbindungen</title>
    @vite(['resources/css/main.css', 'resources/js/game.js']) <!-- Include CSS and JS files -->
</head>

<body>
    <div class="container">
        <header>
            <div class="header">
                @auth
                    <a class="word blue nav-link" href="{{ route('update.cards') }}">Set des Tages aktualisieren</a>
                    <a class="word blue nav-link" href="{{ route('words.create') }}">Set hinzufügen</a>
                    <a class="login blue nav-link" href="{{ route('logout') }}">Logout</a>
                @else
                    <a class="login blue" href="{{ route('login.form') }}">Login</a>
                @endauth
            </div>
        </header>

        <div id="game-container" class="game-container" style="display: none;">
            <!-- Timer initially set to 00:00 -->
            <div id="time" class="blue">
                <span id="timer">0:00</span>
            </div>

            <div id="message" class="prompt-bold"></div>
            
            <div id="endmessage" class="prompt-bold"></div>

            <div class="flex-container">
                <div class="cards">
                    @foreach ($sets as $set)
                        <ul class="gamelist">
                            @foreach ($set as $item)
                                <li class="card prompt-bold" data-category="{{ $item['category'] }}">{{ $item['word'] }}</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Start Button Container to center the button in the middle -->
        <div id="startButtonContainer">
            <button id="start-button">Start Game</button>
        </div>
    </div>

    <!-- Pass dynamic variables to JavaScript -->
    <script>
        const checkSelectionUrl = "{{ route('game.check') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
</body>

</html>
