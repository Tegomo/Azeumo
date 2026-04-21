<template>
  <AppLayout>
    <!-- Hero Section -->
    <section class="relative bg-navy text-white py-32 overflow-hidden">
      <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-gold/10 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gold/5 rounded-full blur-3xl"></div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
          <div class="inline-flex items-center gap-3 mb-6 animate-fade-up">
            <span class="w-12 h-px bg-gold"></span>
            <span class="text-gold font-semibold text-sm tracking-widest uppercase">Informations légales</span>
          </div>
          <h1 class="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6 animate-fade-up delay-100">
            Mentions Légales
          </h1>
        </div>
      </div>
    </section>

    <!-- Content -->
    <section class="py-20 bg-white">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="space-y-12">

          <!-- Éditeur -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Éditeur</h2>
            <p class="text-gray-600 leading-relaxed">
              Le site <strong class="text-navy">www.azeumo.com</strong> est la propriété de <strong class="text-navy">AZEUMO</strong>.<br />
              Directeur de la publication : Monsieur Steve William Azeumo<br />
              Yaoundé — Cameroun<br />
              <a href="mailto:contact@azeumo.com" class="text-gold hover:underline">contact@azeumo.com</a>
            </p>
          </div>

          <!-- Hébergement -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Hébergement</h2>
            <p class="text-gray-600 leading-relaxed">
              Infomaniak Network SA<br />
              <a href="https://www.infomaniak.com/fr" target="_blank" rel="noopener noreferrer" class="text-gold hover:underline">https://www.infomaniak.com/fr</a>
            </p>
          </div>

          <!-- Concepteur -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Concepteur</h2>
            <p class="text-gray-600 leading-relaxed">TEGOMO VOUKENT Armand</p>
          </div>

          <!-- Acceptation -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Acceptation des conditions d'utilisation</h2>
            <p class="text-gray-600 leading-relaxed">
              L'utilisateur reconnaît avoir pris connaissance des présentes conditions d'utilisation, au moment de sa connexion vers le site <strong class="text-navy">www.azeumo.com</strong> et déclare expressément les accepter sans réserve.
            </p>
          </div>

          <!-- Cybercriminalité -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Cybercriminalité, Communications électroniques, e-commerce</h2>
            <p class="text-gray-600 leading-relaxed mb-4">Conformément aux lois :</p>
            <ul class="space-y-2 mb-4">
              <li class="flex items-start gap-3 text-gray-600">
                <span class="mt-1.5 w-2 h-2 rounded-full bg-gold flex-shrink-0"></span>
                Loi N°2010/012 du 21 décembre 2010 relative à la cybercriminalité et la cybersécurité
              </li>
              <li class="flex items-start gap-3 text-gray-600">
                <span class="mt-1.5 w-2 h-2 rounded-full bg-gold flex-shrink-0"></span>
                Loi N°2010/013 du 21 décembre 2010 régissant les communications électroniques au Cameroun
              </li>
              <li class="flex items-start gap-3 text-gray-600">
                <span class="mt-1.5 w-2 h-2 rounded-full bg-gold flex-shrink-0"></span>
                Loi N°2010/021 du 21 décembre 2010 régissant le commerce électronique
              </li>
            </ul>
            <p class="text-gray-600 leading-relaxed">
              L'utilisateur est tenu de respecter les dispositions de ces différentes lois. Il doit notamment s'abstenir, s'agissant des données à caractère personnel auxquelles il accède, de toute collecte, de toute utilisation détournée et, d'une manière générale, de tout acte susceptible de porter atteinte à la vie privée ou à la réputation des personnes.
            </p>
          </div>

          <!-- Propriété intellectuelle -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Propriété intellectuelle</h2>
            <p class="text-gray-600 leading-relaxed mb-3">
              Tout utilisateur ayant une visée pédagogique est autorisé à utiliser tout contenu de ce site après information préalable d'AZEUMO, à la condition de respecter l'intégrité des informations et de n'en altérer ni le sens, ni la portée, ni l'application, et d'en citer la source ainsi que les descriptions bibliographiques s'y trouvant.
            </p>
            <p class="text-gray-600 leading-relaxed mb-3">
              Les logos et marques des partenaires identifiés comme tels leur appartiennent.
            </p>
            <p class="text-gray-600 leading-relaxed">
              Conformément au droit public de la propriété intellectuelle, les « documents numériques » sont librement réutilisables sous ces mêmes conditions.
            </p>
          </div>

          <!-- Crédits photographiques -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Crédits photographiques</h2>
            <p class="text-gray-600 leading-relaxed">
              Les photos présentes sur ce site peuvent provenir de sources différentes. Par défaut, elles proviennent du propriétaire et/ou des personnes ayant donné leur accord.
            </p>
          </div>

          <!-- Liens hypertextes -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Liens hypertextes</h2>
            <p class="text-gray-600 leading-relaxed mb-3">
              La mise en place de liens vers le site <strong class="text-navy">www.azeumo.com</strong> est autorisée après simple information préalable du propriétaire. La mention explicite du site AZEUMO dans l'intitulé du lien est souhaitée. AZEUMO se réserve le droit de retirer cette autorisation à tout moment ; le concerné dispose d'un délai de cinq jours pour retirer définitivement ce lien.
            </p>
            <p class="text-gray-600 leading-relaxed">
              Les liens hypertextes présents sur le site <strong class="text-navy">www.azeumo.com</strong> et renvoyant les utilisateurs vers d'autres sites Internet n'engagent pas la responsabilité de l'éditeur quant au contenu de ces sites.
            </p>
          </div>

          <!-- Loi et juridiction -->
          <div class="border-l-4 border-gold pl-6">
            <h2 class="font-display font-bold text-navy text-xl mb-4 uppercase tracking-wide">Loi et juridiction</h2>
            <p class="text-gray-600 leading-relaxed">
              Les présentes conditions d'utilisation sont régies par la loi camerounaise. Tout litige résultant de leur application relèvera de la compétence des juridictions camerounaises.
            </p>
          </div>

        </div>
      </div>
    </section>
  </AppLayout>
</template>

<script setup>
import AppLayout from '../Components/Layout/AppLayout.vue'
</script>
