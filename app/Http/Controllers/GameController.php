<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Word;
use App\Models\Category;
use DB;

class GameController extends Controller
{
    public function index()
    {
        // Fetch cards and associated words and categories
        $cards = Card::with(['words.categories'])
            ->where('used', false)
            ->limit(4)
            ->get();

        // Reset cards if there are fewer than 4 unused
        if ($cards->count() < 4) {
            Card::query()->update(['used' => false]);
            $cards = Card::with(['words.categories'])
                ->where('used', false)
                ->limit(4)
                ->get();
        }

        $sets = $this->shuffleWordsAcrossSets($cards);

        return view('index', compact('sets'));
    }

    private function shuffleWordsAcrossSets($cards)
    {
        $allWords = [];
        foreach ($cards as $card) {
            foreach ($card->words as $word) {
                $allWords[] = ['word' => strtoupper($word->word), 'category' => $word->categories->pluck('description')->join(', ')];
            }
        }

        shuffle($allWords);

        $shuffledSets = [];
        $wordsPerSet = ceil(count($allWords) / $cards->count());
        for ($i = 0; $i < $cards->count(); $i++) {
            $shuffledSets[] = array_slice($allWords, $i * $wordsPerSet, $wordsPerSet);
        }

        return $shuffledSets;
    }

    
    public function storeGameData(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'difficulty' => 'required|integer|min:1|max:5',
            'word1' => 'required|string|max:255',
            'word2' => 'required|string|max:255',
            'word3' => 'required|string|max:255',
            'word4' => 'required|string|max:255',
        ]);

        $category = Category::create([
            'description' => $validated['category'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert words and associate them with the category
        $words = [
            ['word' => $validated['word1']],
            ['word' => $validated['word2']],
            ['word' => $validated['word3']],
            ['word' => $validated['word4']],
        ];

        $wordIds = [];
        foreach ($words as $wordData) {
            $word = Word::create([
                'word' => $wordData['word'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Attach word to the category
            $category->words()->attach($word->id);
            $wordIds[] = $word->id;
        }

        // Create card
        $card = Card::create([
            'difficulty' => $validated['difficulty'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Attach words to the card
        foreach ($wordIds as $wordId) {
            $card->words()->attach($wordId);
        }

        return redirect()->route('words.create')->with('success', 'Words and Card created successfully!');
    }
}
