<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Neue Verbindungen</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.2/tailwind.min.css"
    />
    @vite('resources/css/login.css')

    <style>
      .navbar {
          display: flex;
          justify-content: flex-start;
          align-items: center;
      }
    </style>
  </head>
  <body>
    <header></header>

    <form method="POST" action="{{ route('game.store') }}" id="wordform">
      @csrf
      <h1>Set hinzufügen</h1>
      <div class="form-group">
        <label for="category">Kategorie</label>
        <input type="text" name="category" value="{{ old('category') }}" required placeholder="Kategorie" autocomplete="off" />

        <label for="difficulty">Schwierigkeit</label>
        <input type="number" name="difficulty" value="{{ old('difficulty') }}" min="1" max="5" id="difficulty" spellcheck="false" required placeholder="Schwierigkeit (1-5)" autocomplete="off" />

        <label for="word1">Erstes Wort</label>
        <input type="text" name="word1" value="{{ old('word1') }}" id="word1" spellcheck="false" required placeholder="Wort1" autocomplete="off" />

        <label for="word2">Zweites Wort</label>
        <input type="text" name="word2" value="{{ old('word2') }}" id="word2" spellcheck="false" required placeholder="Wort2" autocomplete="off" />

        <label for="word3">Drittes Wort</label>
        <input type="text" name="word3" value="{{ old('word3') }}" id="word3" spellcheck="false" required placeholder="Wort3" autocomplete="off" />

        <label for="word4">Viertes Wort</label>
        <input type="text" name="word4" value="{{ old('word4') }}" id="word4" spellcheck="false" required placeholder="Wort4" autocomplete="off" />

        <button type="submit" class="submitbtn">Set hinzufügen</button>
      </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  </body>
</html>
