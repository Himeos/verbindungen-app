<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Word;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    
    public function create()
    {
        
        return view('admin.words.create');
    }

    
    public function updateUsedCards()
    {
        // Check how many cards are unused (i.e., where 'used' = 0)
        $cardsWithZeroUsed = DB::table('card')->where('used', 0)->count();

        if ($cardsWithZeroUsed < 4) {
            // If there are fewer than 4 unused cards, reset all of them
            DB::table('card')->update(['used' => 0]);

            return redirect('/')->with('status', "All cards were reset to unused.");
        } else {
            // If there are 4 or more unused cards, update the first 4 to 'used' = 1
            $affectedRows = DB::table('card')
                ->where('used', 0)
                ->limit(4)
                ->update(['used' => 1]);

            return redirect('/')->with('status', "Update successful. Rows affected: $affectedRows");
        }
    }
}
