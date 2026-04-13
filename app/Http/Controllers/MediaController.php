<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class MediaController extends Controller
{
    public function index()
    {
        $items = [
            ['category' => 'Réseaux sociaux', 'label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/azeumo/', 'type' => 'social'],
            ['category' => 'Réseaux sociaux', 'label' => 'Twitter / X', 'href' => 'https://twitter.com/loftyazeumo', 'type' => 'social'],
            ['category' => 'Réseaux sociaux', 'label' => 'Facebook', 'href' => 'http://www.facebook.com/loftyazeumo', 'type' => 'social'],
            ['category' => 'Bibliographie', 'label' => "L'Intelligence Économique Camerounaise — Harmattan", 'href' => 'https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html', 'type' => 'book'],
            ['category' => 'Bibliographie', 'label' => "L'Intelligence Économique Camerounaise — Amazon", 'href' => 'https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8', 'type' => 'book'],
            ['category' => 'Vidéos', 'label' => 'VoxAfrica — Voxbook 2014 (I)', 'href' => 'https://www.youtube.com/watch?v=KUohpA131dc', 'type' => 'video'],
            ['category' => 'Vidéos', 'label' => 'VoxAfrica — Voxbook 2014 (II)', 'href' => 'https://www.youtube.com/watch?v=Z05xRdvgeNw', 'type' => 'video'],
            ['category' => 'Vidéos', 'label' => 'Économie de Communion — IT', 'href' => 'https://youtu.be/uY7XdBj8JDg', 'type' => 'video'],
            ['category' => 'Articles & Interviews', 'label' => 'romereports.com', 'href' => 'https://www.romereports.com/en/2017/02/04/economy-of-communion-an-alternative-to-the-economy-that-kills-which-pope-francis-denounces/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => 'francescoeconomy.org', 'href' => 'https://francescoeconomy.org/vocation-and-profit-in-the-perspective-of-african-culture/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => 'algeriancenter.com', 'href' => 'https://algeriancenter.com/le-cameroun-entre-francophonie-commonwealth-et-les-geants-usa-chine-interview-de-steve-william-azeumo/', 'type' => 'article'],
        ];

        return Inertia::render('Media', ['items' => $items]);
    }
}
