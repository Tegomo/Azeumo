<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class MediaController extends Controller
{
    public function index()
    {
        $items = [
            // Réseaux sociaux
            ['category' => 'Réseaux sociaux', 'label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/azeumo/', 'type' => 'social'],
            ['category' => 'Réseaux sociaux', 'label' => 'Twitter / X', 'href' => 'https://twitter.com/loftyazeumo', 'type' => 'social'],
            ['category' => 'Réseaux sociaux', 'label' => 'Facebook', 'href' => 'https://www.facebook.com/loftyazeumo', 'type' => 'social'],

            // Bibliographie
            ['category' => 'Bibliographie', 'label' => "Bibliographie — Éditions L'Harmattan", 'href' => 'https://www.editions-harmattan.fr/index.asp?navig=auteurs&obj=artiste&no=24878', 'type' => 'book'],
            ['category' => 'Bibliographie', 'label' => "L'Intelligence Économique Camerounaise — Amazon", 'href' => 'https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8', 'type' => 'book'],

            // Vidéos
            ['category' => 'Vidéos', 'label' => 'Passage sur Voxbook (VoxAfrica) 2014 — Partie I', 'href' => 'https://www.youtube.com/watch?v=KUohpA131dc', 'type' => 'video'],
            ['category' => 'Vidéos', 'label' => 'Passage sur Voxbook (VoxAfrica) 2014 — Partie II', 'href' => 'https://www.youtube.com/watch?v=Z05xRdvgeNw', 'type' => 'video'],
            ['category' => 'Vidéos', 'label' => "Économie de communion : Une alternative à «l'économie qui tue» — Conférence Italie", 'href' => 'https://youtu.be/uY7XdBj8JDg', 'type' => 'video'],

            // Articles & Interviews
            ['category' => 'Articles & Interviews', 'label' => "Economy of Communion : An alternative to the economy that kills — Rome Reports (2017)", 'href' => 'https://www.romereports.com/en/2017/02/04/economy-of-communion-an-alternative-to-the-economy-that-kills-which-pope-francis-denounces/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => "Activités bénévoles : soutien aux déplacés internes du Cameroun — United World Project", 'href' => 'http://www.unitedworldproject.org/en/workshop/a-hub-to-support-the-internal-displaced-people-of-cameroon/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => "Vocation and profit in the perspective of African culture — Francesco Economy", 'href' => 'https://francescoeconomy.org/vocation-and-profit-in-the-perspective-of-african-culture/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => "Le Cameroun entre francophonie, Commonwealth et les géants USA-Chine — Centre Algérien de Diplomatie Économique", 'href' => 'https://algeriancenter.com/le-cameroun-entre-francophonie-commonwealth-et-les-geants-usa-chine-interview-de-steve-william-azeumo/', 'type' => 'article'],
            ['category' => 'Articles & Interviews', 'label' => "Interview 2012 : IE et pratiques d'investigation économique — fossoarnaud.unblog.fr", 'href' => 'http://fossoarnaud.unblog.fr/category/intelligence-economique-veille-informationnelle/page/13/', 'type' => 'article'],

            // Premiers travaux
            ['category' => 'Premiers travaux', 'label' => "Premier essai en Intelligence Économique (2010) — scpie.blogspot.com", 'href' => 'http://scpie.blogspot.com/2010/', 'type' => 'article'],
            ['category' => 'Premiers travaux', 'label' => "Premiers projets d'entrepreneur (2011) — kongossa.wordpress.com", 'href' => 'https://kongossa.wordpress.com/2011/03/27/steve-azeumo-fait-son-kongossa-dentrepreneur/', 'type' => 'article'],
        ];

        return Inertia::render('Media', ['items' => $items]);
    }
}
