<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class MethodeController extends Controller
{
    public function index()
    {
        return Inertia::render('Methode', [
            'missions' => [
                ['year' => '2019', 'object' => 'Due Diligence', 'location' => 'Paris, France'],
                ['year' => '2013–aujourd\'hui', 'object' => 'Collecte OSINT', 'location' => 'Ploeren, France'],
                ['year' => '2013–2019', 'object' => 'Stratégie de croissance', 'location' => 'Rome, Kenya, Cameroun'],
                ['year' => '2017', 'object' => 'Benchmarking', 'location' => 'Manille, Philippines'],
                ['year' => '2019', 'object' => 'Veille OSINT + SWOT', 'location' => 'Dakar, Mali, Burkina Faso'],
                ['year' => '2015', 'object' => 'Stratégie réseau', 'location' => 'Nairobi, Kenya'],
                ['year' => '2013–aujourd\'hui', 'object' => 'Cartographie client', 'location' => 'Yaoundé, Cameroun'],
            ],
        ]);
    }
}
