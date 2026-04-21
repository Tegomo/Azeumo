<?php
namespace App\Http\Controllers;

use Inertia\Inertia;

class MediaController extends Controller
{
    public function index()
    {
        $items = [
            // Réseaux sociaux
            ['category' => 'Réseaux sociaux', 'type' => 'social',
             'label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/in/azeumo/'],
            ['category' => 'Réseaux sociaux', 'type' => 'social',
             'label' => 'Twitter / X', 'href' => 'https://twitter.com/loftyazeumo'],
            ['category' => 'Réseaux sociaux', 'type' => 'social',
             'label' => 'Facebook', 'href' => 'https://www.facebook.com/loftyazeumo'],

            // Publications académiques
            ['category' => 'Publications académiques', 'type' => 'book',
             'label' => "Œuvres de Saint François d'Assises et leur mode de fonctionnement : Une âme pour l'économie Africaine ?",
             'meta'  => "TONYE A.F. & Azeumo S.W. — Revue Française d'Economie et de Gestion, 4(11), nov. 2023",
             'href'  => 'https://www.revuefreg.fr/index.php/home/article/view/1367/1122'],

            ['category' => 'Publications académiques', 'type' => 'book',
             'label' => "Les cultures et valeurs africaines, un humus fertile aux économies inclusives ?",
             'meta'  => "Azeumo S.W. — Revue Française d'Economie et de Gestion, 3(6), juin 2022",
             'href'  => 'https://www.revuefreg.fr/index.php/home/article/view/722/537'],

            ['category' => 'Publications académiques', 'type' => 'book',
             'label' => "Vocation and Profit in the perspective of African Culture",
             'meta'  => "Azeumo S.W. — Francesco Economy, 2020",
             'href'  => 'https://francescoeconomy.org/vocation-and-profit-in-the-perspective-of-african-culture/'],

            ['category' => 'Publications académiques', 'type' => 'book',
             'label' => "Les données personnelles",
             'meta'  => "Azeumo S.W. — in : Les réseaux sociaux, ce qu'ils ont fait de nous et ce que nous devons en faire. Edition Afrédit, p.35. 2020"],

            ['category' => 'Publications académiques', 'type' => 'book',
             'label' => "L'Intelligence Économique Camerounaise (ISBN 978-2-343-01199-8)",
             'meta'  => "Azeumo S.W. — Editions L'Harmattan, 2013",
             'href'  => 'https://www.editions-harmattan.fr/index.asp?navig=auteurs&obj=artiste&no=24878'],

            ['category' => 'Publications académiques', 'type' => 'book',
             'label' => "Synthèse du Colloque international de Yaoundé sur l'Économie de Communion à l'UCAC",
             'meta'  => "Azeumo S.W. — ResearchGate",
             'href'  => 'https://www.researchgate.net/publication/343862243_QUE_PEUT-ON_APPRENDRE_ET_ATTENDRE_DE_L\'ECONOMIE_DE_COMMUNION'],

            // Autres publications
            ['category' => 'Autres publications', 'type' => 'article',
             'label' => "Pharmacopée traditionnelle africaine, nouveau terrain de jeu des trolls",
             'meta'  => "CAVIE — Centre Africain de Veille et d'Intelligence Économique, 2022",
             'href'  => 'https://www.acci-cavie.org/fr/pharmacopee-traditionnelle-africaine-nouveau-terrain-de-jeu-des-trolls-par-steve-azeumo/'],

            ['category' => 'Autres publications', 'type' => 'article',
             'label' => "Le Cameroun entre Francophonie, Commonwealth et les géants USA/Chine",
             'meta'  => "Centre Algérien de Diplomatie Économique",
             'href'  => 'https://algeriancenter.com/le-cameroun-entre-francophonie-commonwealth-et-les-geants-usa-chine-interview-de-steve-william-azeumo/'],

            ['category' => 'Autres publications', 'type' => 'article',
             'label' => "La Communauté de l'Intelligence Camerounaise : Défis du Renseignement Sécuritaire et Économique",
             'meta'  => "PRESDIE"],

            ['category' => 'Autres publications', 'type' => 'article',
             'label' => "Intelligence Territoriale — Anarchisme dans la gestion des plateformes de marché",
             'meta'  => "PRESDIE"],

            // Vidéos
            ['category' => 'Vidéos', 'type' => 'video',
             'label' => 'Passage sur Voxbook (VoxAfrica) 2014 — Partie I',
             'href'  => 'https://www.youtube.com/watch?v=KUohpA131dc'],
            ['category' => 'Vidéos', 'type' => 'video',
             'label' => 'Passage sur Voxbook (VoxAfrica) 2014 — Partie II',
             'href'  => 'https://www.youtube.com/watch?v=Z05xRdvgeNw'],
            ['category' => 'Vidéos', 'type' => 'video',
             'label' => "Économie de communion : Une alternative à «l'économie qui tue» — Conférence Italie",
             'href'  => 'https://youtu.be/uY7XdBj8JDg'],

            // Articles & Interviews
            ['category' => 'Articles & Interviews', 'type' => 'article',
             'label' => "Economy of Communion : An alternative to the economy that kills",
             'meta'  => "Rome Reports, 2017",
             'href'  => 'https://www.romereports.com/en/2017/02/04/economy-of-communion-an-alternative-to-the-economy-that-kills-which-pope-francis-denounces/'],
            ['category' => 'Articles & Interviews', 'type' => 'article',
             'label' => "A hub to support the internal displaced people of Cameroon",
             'meta'  => "United World Project",
             'href'  => 'http://www.unitedworldproject.org/en/workshop/a-hub-to-support-the-internal-displaced-people-of-cameroon/'],
            ['category' => 'Articles & Interviews', 'type' => 'article',
             'label' => "Interview 2012 : IE et pratiques d'investigation économique",
             'meta'  => "fossoarnaud.unblog.fr",
             'href'  => 'http://fossoarnaud.unblog.fr/category/intelligence-economique-veille-informationnelle/page/13/'],

            // Premiers travaux
            ['category' => 'Premiers travaux', 'type' => 'article',
             'label' => "Premier essai en Intelligence Économique (2010)",
             'href'  => 'http://scpie.blogspot.com/2010/'],
            ['category' => 'Premiers travaux', 'type' => 'article',
             'label' => "Premiers projets d'entrepreneur (2011)",
             'href'  => 'https://kongossa.wordpress.com/2011/03/27/steve-azeumo-fait-son-kongossa-dentrepreneur/'],
        ];

        return Inertia::render('Media', ['items' => $items]);
    }
}
