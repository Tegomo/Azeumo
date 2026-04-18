<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::truncate();

        $posts = [
            [
                'slug'        => 'intelligence-economique-afrique',
                'image'       => '/images/blog/intelligence-economique.jpg',
                'title_fr'    => "L'Intelligence Économique au service du développement africain",
                'title_en'    => 'Economic Intelligence at the service of African development',
                'excerpt_fr'  => "Comment l'intelligence économique peut devenir un levier stratégique pour les États et entreprises africaines face aux défis de la mondialisation.",
                'excerpt_en'  => 'How economic intelligence can become a strategic lever for African states and companies facing the challenges of globalisation.',
                'body_fr'     => <<<'TEXT'
L'intelligence économique (IE) est bien plus qu'un simple outil de collecte d'informations. Pour les économies africaines, elle représente une nécessité stratégique dans un monde où l'information est devenue la ressource la plus précieuse.

En Afrique, les États et les entreprises disposent souvent d'un patrimoine informationnel considérable qu'ils n'exploitent pas encore pleinement. La mise en place de dispositifs d'IE structurés permettrait d'améliorer la compétitivité des acteurs économiques locaux, de mieux anticiper les risques et de saisir les opportunités de marché.

À travers mon ouvrage "L'Intelligence Économique Camerounaise" (Harmattan, 2013), j'ai tenté de poser les jalons d'une réflexion sérieuse sur l'adaptation des concepts d'IE au contexte africain. L'enjeu est de taille : il s'agit de passer d'une posture réactive à une posture proactive dans la gestion de l'information stratégique.

Les entreprises africaines qui intègrent l'IE dans leur stratégie globale constatent rapidement des gains mesurables : meilleure connaissance de leurs marchés, anticipation des mouvements concurrentiels, protection de leurs actifs immatériels et amélioration de leur positionnement à l'international.

L'avenir appartient aux organisations qui sauront transformer l'information en avantage compétitif durable.
TEXT,
                'body_en'     => <<<'TEXT'
Economic intelligence (EI) is far more than a simple information-gathering tool. For African economies, it represents a strategic necessity in a world where information has become the most precious resource.

In Africa, states and companies often hold considerable informational assets that they have yet to fully exploit. Implementing structured EI systems would improve the competitiveness of local economic actors, better anticipate risks, and seize market opportunities.

Through my book "L'Intelligence Économique Camerounaise" (Harmattan, 2013), I attempted to lay the groundwork for serious reflection on adapting EI concepts to the African context. The stakes are high: it is about moving from a reactive posture to a proactive one in managing strategic information.

African companies that integrate EI into their overall strategy quickly see measurable gains: better knowledge of their markets, anticipation of competitive moves, protection of intangible assets, and improved international positioning.

The future belongs to organisations that can transform information into a lasting competitive advantage.
TEXT,
                'tags'        => ['Intelligence Économique', 'Afrique', 'Stratégie'],
                'published'   => true,
                'published_at'=> '2024-09-15 08:00:00',
            ],
            [
                'slug'        => 'conseil-strategique-pme-africaines',
                'image'       => '/images/blog/strategie-afrique.jpg',
                'title_fr'    => "Conseil stratégique : pourquoi les PME africaines doivent s'y mettre",
                'title_en'    => 'Strategic consulting: why African SMEs need to get on board',
                'excerpt_fr'  => "Les petites et moyennes entreprises africaines sous-estiment encore trop souvent l'apport du conseil stratégique externe pour accélérer leur croissance.",
                'excerpt_en'  => 'African small and medium-sized enterprises still too often underestimate the contribution of external strategic consulting to accelerate their growth.',
                'body_fr'     => <<<'TEXT'
En Afrique subsaharienne, les PME représentent plus de 90 % du tissu entrepreneurial. Pourtant, très peu d'entre elles font appel à un conseil stratégique externe pour guider leurs décisions de croissance. Pourquoi cette réticence ?

Plusieurs facteurs expliquent cette situation : la méfiance vis-à-vis des consultants perçus comme trop théoriques, le coût apparent de la prestation, ou encore la conviction que "nos réalités locales" ne peuvent être comprises par des experts extérieurs.

Or, un bon conseil stratégique ne consiste pas à imposer des modèles importés d'ailleurs. Il s'agit d'accompagner le dirigeant dans la clarification de sa vision, la structuration de son organisation, l'identification de ses avantages concurrentiels et la mise en place de plans d'action réalistes.

J'ai eu la chance d'intervenir auprès de PME en Afrique centrale, en Europe et dans d'autres régions du monde. Chaque contexte est unique, mais la démarche reste la même : écouter, analyser, co-construire, puis mesurer.

Les PME qui investissent dans le conseil stratégique ne cherchent pas à déléguer leur responsabilité. Elles cherchent un partenaire de confiance capable de leur offrir un regard extérieur objectif et des outils concrets pour progresser.
TEXT,
                'body_en'     => <<<'TEXT'
In sub-Saharan Africa, SMEs represent more than 90% of the entrepreneurial fabric. Yet very few of them call on external strategic consulting to guide their growth decisions. Why this reluctance?

Several factors explain this situation: distrust of consultants perceived as too theoretical, the apparent cost of the service, or the conviction that "our local realities" cannot be understood by outside experts.

Yet good strategic consulting is not about imposing imported models. It is about accompanying the leader in clarifying their vision, structuring their organisation, identifying their competitive advantages, and implementing realistic action plans.

I have had the opportunity to work with SMEs in Central Africa, Europe, and other parts of the world. Each context is unique, but the approach remains the same: listen, analyse, co-build, then measure.

SMEs that invest in strategic consulting are not looking to delegate their responsibility. They are looking for a trusted partner capable of offering an objective outside perspective and concrete tools for progress.
TEXT,
                'tags'        => ['PME', 'Conseil', 'Croissance', 'Afrique'],
                'published'   => true,
                'published_at'=> '2024-10-22 09:30:00',
            ],
            [
                'slug'        => 'due-diligence-protection-donnees',
                'image'       => '/images/blog/due-diligence.jpg',
                'title_fr'    => 'Due diligence et protection des données : les enjeux pour les entreprises africaines',
                'title_en'    => 'Due diligence and data protection: the challenges for African companies',
                'excerpt_fr'  => "Dans un contexte de mondialisation et de digitalisation accélérée, la due diligence et la protection des données deviennent des impératifs stratégiques incontournables.",
                'excerpt_en'  => 'In a context of accelerating globalisation and digitalisation, due diligence and data protection are becoming inescapable strategic imperatives.',
                'body_fr'     => <<<'TEXT'
La due diligence — cette procédure d'audit préalable à une prise de décision stratégique — est encore trop peu pratiquée dans les entreprises africaines. Pourtant, les enjeux sont considérables : partenariats mal calibrés, acquisitions hasardeuses, risques réglementaires ignorés.

Dans le domaine de la protection des données, les entreprises africaines font face à un double défi. D'une part, la conformité aux réglementations locales et internationales (RGPD, lois nationales sur la protection des données). D'autre part, la sécurisation effective des données personnelles de leurs clients et partenaires.

À travers mes interventions, j'accompagne les organisations dans la mise en place de procédures de due diligence adaptées à leur contexte. Cela passe par l'identification des risques spécifiques, la structuration des processus de vérification et la formation des équipes.

La protection des données n'est pas qu'une contrainte légale. Elle est aussi un avantage compétitif : les entreprises qui démontrent leur sérieux en matière de protection des données gagnent la confiance de leurs partenaires et clients, tant sur le continent qu'à l'international.

Investir dans la due diligence et la protection des données, c'est investir dans la durabilité et la crédibilité de son organisation.
TEXT,
                'body_en'     => <<<'TEXT'
Due diligence — the audit procedure prior to strategic decision-making — is still too rarely practised in African companies. Yet the stakes are considerable: poorly calibrated partnerships, risky acquisitions, ignored regulatory risks.

In the field of data protection, African companies face a dual challenge. On one hand, compliance with local and international regulations (GDPR, national data protection laws). On the other hand, the effective security of personal data of their clients and partners.

Through my interventions, I help organisations implement due diligence procedures adapted to their context. This involves identifying specific risks, structuring verification processes, and training teams.

Data protection is not merely a legal constraint. It is also a competitive advantage: companies that demonstrate their seriousness in data protection gain the trust of their partners and clients, both on the continent and internationally.

Investing in due diligence and data protection is investing in the sustainability and credibility of one's organisation.
TEXT,
                'tags'        => ['Due Diligence', 'Données', 'Conformité', 'Risques'],
                'published'   => true,
                'published_at'=> '2024-11-10 10:00:00',
            ],
            [
                'slug'        => 'veille-economique-competitivite',
                'image'       => '/images/blog/veille-economique.jpg',
                'title_fr'    => 'Veille économique : comment rester compétitif dans un environnement incertain',
                'title_en'    => 'Economic watch: how to stay competitive in an uncertain environment',
                'excerpt_fr'  => "La veille économique est l'art de transformer l'information brute en connaissance actionnable. Un atout décisif pour toute organisation souhaitant anticiper les évolutions de son environnement.",
                'excerpt_en'  => 'Economic watch is the art of transforming raw information into actionable knowledge. A decisive asset for any organisation wishing to anticipate changes in its environment.',
                'body_fr'     => <<<'TEXT'
Dans un environnement économique de plus en plus volatile, incertain, complexe et ambigu (VUCA), la veille économique est devenue une compétence organisationnelle fondamentale. Ce n'est plus un luxe réservé aux grandes multinationales ; c'est une nécessité pour toute organisation qui souhaite rester pertinente et compétitive.

La veille économique consiste à surveiller de manière systématique et organisée l'environnement externe de l'organisation : tendances de marché, mouvements concurrentiels, évolutions réglementaires, innovations technologiques, changements sociaux et politiques.

Pour être efficace, un dispositif de veille doit être intégré dans le processus décisionnel de l'organisation. L'information collectée doit être analysée, interprétée et transformée en recommandations concrètes pour les décideurs.

J'accompagne régulièrement des organisations dans la mise en place de cellules de veille opérationnelles. La démarche commence toujours par la définition des besoins informationnels prioritaires, puis par le choix des sources et des outils adaptés, enfin par la formation des équipes à l'analyse et à la synthèse.

Une organisation qui pratique la veille économique de manière disciplinée développe une capacité d'anticipation qui lui permet de saisir les opportunités avant ses concurrents et d'éviter les pièges que l'environnement lui tend.
TEXT,
                'body_en'     => <<<'TEXT'
In an increasingly volatile, uncertain, complex, and ambiguous (VUCA) economic environment, economic watch has become a fundamental organisational competency. It is no longer a luxury reserved for large multinationals; it is a necessity for any organisation that wishes to remain relevant and competitive.

Economic watch consists of systematically and organisationally monitoring the external environment of the organisation: market trends, competitive moves, regulatory changes, technological innovations, social and political shifts.

To be effective, a watch system must be integrated into the organisation's decision-making process. The information collected must be analysed, interpreted, and transformed into concrete recommendations for decision-makers.

I regularly help organisations set up operational watch units. The process always begins with defining priority information needs, then choosing appropriate sources and tools, and finally training teams in analysis and synthesis.

An organisation that practises economic watch in a disciplined manner develops an anticipation capacity that allows it to seize opportunities before its competitors and avoid the traps that the environment sets for it.
TEXT,
                'tags'        => ['Veille', 'Compétitivité', 'Stratégie', 'Information'],
                'published'   => true,
                'published_at'=> '2025-01-08 08:00:00',
            ],
            [
                'slug'        => 'economie-communion-afrique',
                'image'       => '/images/blog/economie-communion.jpg',
                'title_fr'    => "L'Économie de Communion : une voie alternative pour le développement africain",
                'title_en'    => 'The Economy of Communion: an alternative path for African development',
                'excerpt_fr'  => "Le mouvement de l'Économie de Communion propose une vision de l'entreprise où le profit est mis au service de l'être humain. Une approche particulièrement pertinente dans le contexte africain.",
                'excerpt_en'  => 'The Economy of Communion movement proposes a vision of the enterprise where profit is put at the service of the human being. A particularly relevant approach in the African context.',
                'body_fr'     => <<<'TEXT'
Je milite depuis plusieurs années aux côtés des entrepreneurs de l'Économie de Communion (EdC) et du mouvement The Economy of Francesco. Ces approches partagent une conviction profonde : l'économie doit être au service de l'être humain, et non l'inverse.

L'Économie de Communion, fondée dans les années 1990 par Chiara Lubich, propose aux entreprises de partager leurs bénéfices en trois parties égales : un tiers pour le développement de l'entreprise, un tiers pour la formation à une "culture du donner", et un tiers pour aider des personnes dans le besoin.

Cette vision n'est pas utopique. Elle est déjà une réalité pour des centaines d'entreprises à travers le monde, y compris en Afrique. Des entrepreneurs africains ont adopté ce modèle et témoignent de résultats remarquables : meilleure cohésion des équipes, fidélisation des clients, ancrage communautaire fort.

Dans le contexte africain, où les liens communautaires et la solidarité ont toujours joué un rôle central dans l'organisation sociale, l'Économie de Communion trouve un terreau particulièrement fertile. Elle réconcilie modernité économique et valeurs traditionnelles africaines.

L'avenir de l'Afrique se construira avec des entrepreneurs qui placent l'humain au centre de leur modèle économique. J'y crois profondément et c'est le sens de mon engagement aux côtés de ces pionniers.
TEXT,
                'body_en'     => <<<'TEXT'
For several years, I have been working alongside entrepreneurs from the Economy of Communion (EoC) and The Economy of Francesco movement. These approaches share a deep conviction: the economy must serve the human being, not the other way around.

The Economy of Communion, founded in the 1990s by Chiara Lubich, proposes that companies share their profits in three equal parts: one third for the development of the company, one third for training in a "culture of giving", and one third to help people in need.

This vision is not utopian. It is already a reality for hundreds of companies around the world, including in Africa. African entrepreneurs have adopted this model and report remarkable results: better team cohesion, customer loyalty, strong community anchoring.

In the African context, where community ties and solidarity have always played a central role in social organisation, the Economy of Communion finds particularly fertile ground. It reconciles economic modernity with traditional African values.

The future of Africa will be built by entrepreneurs who place the human being at the centre of their economic model. I deeply believe this, and it is the meaning of my commitment alongside these pioneers.
TEXT,
                'tags'        => ['Économie', 'Afrique', 'Humanisme', 'Entrepreneuriat'],
                'published'   => true,
                'published_at'=> '2025-02-20 09:00:00',
            ],
            [
                'slug'        => 'formation-developpement-competences',
                'image'       => '/images/blog/formation-competences.jpg',
                'title_fr'    => 'Formation et développement des compétences : le capital humain, priorité stratégique',
                'title_en'    => 'Training and skills development: human capital, a strategic priority',
                'excerpt_fr'  => "Investir dans la formation et le développement des compétences de ses collaborateurs est le meilleur investissement qu'une organisation puisse faire pour assurer sa pérennité.",
                'excerpt_en'  => "Investing in the training and skills development of one's collaborators is the best investment an organisation can make to ensure its longevity.",
                'body_fr'     => <<<'TEXT'
Dans tous les projets d'accompagnement que je mène, un constat revient systématiquement : les organisations qui réussissent durablement sont celles qui investissent massivement dans le développement des compétences de leurs équipes.

La formation n'est pas une dépense. C'est un investissement à fort retour. Des collaborateurs bien formés sont plus efficaces, plus engagés, plus innovants. Ils contribuent à créer un environnement de travail positif et à fidéliser les talents.

Pourtant, en Afrique comme ailleurs, la formation est souvent la première variable d'ajustement lorsque les budgets se réduisent. C'est une erreur stratégique majeure. Les organisations qui sacrifient la formation sur l'autel des économies à court terme paient le prix fort à moyen terme.

Dans mes interventions, j'aborde la formation comme un processus continu et non comme un événement ponctuel. Il s'agit de créer une culture d'apprentissage permanent au sein de l'organisation : mentoring, coaching, partage de connaissances, formation formelle et informelle.

Le capital humain est la ressource la plus précieuse et la moins reproductible de toute organisation. Prendre soin de ce capital, c'est assurer l'avenir de l'organisation. C'est également une responsabilité éthique envers les individus qui consacrent leur énergie et leur talent au service de l'organisation.

Investissons dans nos équipes. Elles sont notre plus grand atout.
TEXT,
                'body_en'     => <<<'TEXT'
In all the support projects I lead, one observation consistently emerges: organisations that succeed durably are those that invest massively in the skills development of their teams.

Training is not an expense. It is a high-return investment. Well-trained collaborators are more effective, more engaged, more innovative. They contribute to creating a positive work environment and retaining talent.

Yet, in Africa as elsewhere, training is often the first variable of adjustment when budgets tighten. This is a major strategic error. Organisations that sacrifice training on the altar of short-term savings pay a high price in the medium term.

In my interventions, I approach training as a continuous process rather than a one-time event. It is about creating a culture of permanent learning within the organisation: mentoring, coaching, knowledge sharing, formal and informal training.

Human capital is the most precious and least reproducible resource of any organisation. Taking care of this capital is ensuring the future of the organisation. It is also an ethical responsibility towards the individuals who devote their energy and talent to the service of the organisation.

Let us invest in our teams. They are our greatest asset.
TEXT,
                'tags'        => ['Formation', 'Compétences', 'Capital Humain', 'RH'],
                'published'   => true,
                'published_at'=> '2025-03-14 10:00:00',
            ],
        ];

        foreach ($posts as $data) {
            Post::create($data);
        }
    }
}
