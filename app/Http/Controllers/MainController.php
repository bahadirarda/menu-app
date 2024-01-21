<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class MainController extends Controller
{
    /**
     * Ana sayfa görünümünü döndürür.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $restaurant = Restaurant::find(1); // Örnek olarak 1 ID'sini kullanıyorum.
    
        if (!$restaurant) {
            // Restoran bulunamadı, kullanıcıya uygun bir mesaj gösterin veya yönlendirme yapın.
            return view('unknown');
        }
    
        return view('main', ['restaurant' => $restaurant]);
    }
}
