# Azeumo.com — Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Construire le site personnel `azeumo.com` de Steve William Azeumo — consultant en Intelligence Économique — comme site vitrine / CV en ligne / blog, performant, SEO-optimisé et déployable sur OVH/Infomaniak.

**Architecture:** Next.js 14 App Router avec export statique (`output: 'export'`). Les pages de contenu sont des composants React, le blog utilise MDX via `@next/mdx`. Aucune base de données — tout le contenu est en dur dans des fichiers TypeScript ou MDX, ce qui garantit un Lighthouse > 90 et un hébergement simple sur tout serveur statique.

**Tech Stack:** Next.js 14, TypeScript, Tailwind CSS, `@next/mdx`, `gray-matter`, `react-hook-form`, Formspree (formulaire de contact), `next/font` (Inter + Montserrat), `schema-dts` (Schema.org)

---

## File Structure

```
azeumo.com/
├── app/
│   ├── layout.tsx                  # Root layout : nav + footer + fonts + metadata
│   ├── page.tsx                    # Home
│   ├── a-propos/
│   │   └── page.tsx                # Biographie + Éducation + Compétences + Bibliographie
│   ├── services/
│   │   └── page.tsx                # Vue d'ensemble des 5 services + CTA
│   ├── methode/
│   │   └── page.tsx                # Conseil / Formation / Intervention
│   ├── blog/
│   │   ├── page.tsx                # Liste des articles MDX
│   │   └── [slug]/
│   │       └── page.tsx            # Article individuel
│   ├── media/
│   │   └── page.tsx                # Liens médias, interviews, vidéos
│   ├── contact/
│   │   └── page.tsx                # Formulaire + WhatsApp
│   ├── mentions-legales/
│   │   └── page.tsx                # Mentions légales
│   └── globals.css                 # Tailwind directives
├── components/
│   ├── layout/
│   │   ├── Navbar.tsx              # Navigation responsive (burger mobile)
│   │   └── Footer.tsx              # Footer avec liens sociaux
│   ├── sections/
│   │   ├── Hero.tsx                # Hero home : titre + accroche + CTA
│   │   ├── AboutTeaser.tsx         # Résumé "À propos" sur la home
│   │   ├── ServicesGrid.tsx        # Grille des 5 services sur la home
│   │   ├── MethodTeaser.tsx        # Section méthode sur la home
│   │   └── LatestPosts.tsx         # 3 derniers articles sur la home
│   └── ui/
│       ├── Button.tsx              # Bouton réutilisable (variants: primary, outline)
│       ├── SectionTitle.tsx        # Titre de section avec trait décoratif
│       ├── ServiceCard.tsx         # Carte d'un service
│       └── ContactForm.tsx         # Formulaire de contact (react-hook-form)
├── content/
│   └── blog/                       # Articles MDX (ex: 2024-01-15-intelligence-economique.mdx)
├── data/
│   ├── services.ts                 # Données des 5 services
│   ├── media.ts                    # Liens médias / interviews
│   ├── experiences.ts              # Expériences pro IE + développement
│   └── education.ts                # Diplômes et certifications
├── lib/
│   └── blog.ts                     # Helpers : listPosts(), getPost(slug)
├── public/
│   ├── images/
│   │   └── portrait.jpg            # Photo du consultant (placeholder)
│   └── favicon.ico
├── next.config.mjs                 # output: 'export', MDX config
├── tailwind.config.ts              # Couleurs brand (navy, gold)
└── tsconfig.json
```

---

## Task 1 : Initialisation du projet

**Files:**
- Create: `next.config.mjs`
- Create: `tailwind.config.ts`
- Create: `app/globals.css`
- Create: `tsconfig.json`

- [ ] **Step 1 : Créer le projet Next.js**

```bash
cd /home/anuvis/Azeumo
npx create-next-app@14 . --typescript --tailwind --eslint --app --src-dir=false --import-alias="@/*" --use-npm
```

Expected: scaffold Next.js dans le dossier courant.

- [ ] **Step 2 : Installer les dépendances**

```bash
npm install @next/mdx @mdx-js/loader @mdx-js/react gray-matter react-hook-form schema-dts
npm install -D @types/mdx
```

- [ ] **Step 3 : Configurer `next.config.mjs` (static export + MDX)**

```js
import createMDX from '@next/mdx'

const withMDX = createMDX({
  extension: /\.mdx?$/,
})

/** @type {import('next').NextConfig} */
const nextConfig = {
  output: 'export',
  pageExtensions: ['ts', 'tsx', 'mdx'],
  images: { unoptimized: true },
}

export default withMDX(nextConfig)
```

- [ ] **Step 4 : Configurer `tailwind.config.ts` avec la palette brand**

```ts
import type { Config } from 'tailwindcss'

const config: Config = {
  content: ['./app/**/*.{ts,tsx}', './components/**/*.{ts,tsx}'],
  theme: {
    extend: {
      colors: {
        navy:  { DEFAULT: '#0A1628', 700: '#0d1f38', 800: '#081220', 900: '#050d17' },
        gold:  { DEFAULT: '#C9A84C', light: '#e2c97e', dark: '#a07d2c' },
      },
      fontFamily: {
        sans:    ['var(--font-inter)', 'sans-serif'],
        display: ['var(--font-montserrat)', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

export default config
```

- [ ] **Step 5 : `app/globals.css`**

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
  body {
    @apply bg-white text-navy font-sans antialiased;
  }
}
```

- [ ] **Step 6 : Vérifier que le projet démarre**

```bash
npm run dev
```

Expected: `http://localhost:3000` affiche la page Next.js par défaut.

- [ ] **Step 7 : Commit**

```bash
git add .
git commit -m "feat: initialize Next.js 14 project with Tailwind and MDX"
```

---

## Task 2 : Composants UI de base

**Files:**
- Create: `components/ui/Button.tsx`
- Create: `components/ui/SectionTitle.tsx`
- Create: `components/ui/ServiceCard.tsx`

- [ ] **Step 1 : `components/ui/Button.tsx`**

```tsx
import Link from 'next/link'

type ButtonProps = {
  href?: string
  onClick?: () => void
  variant?: 'primary' | 'outline'
  children: React.ReactNode
  className?: string
  external?: boolean
}

export default function Button({
  href, onClick, variant = 'primary', children, className = '', external,
}: ButtonProps) {
  const base = 'inline-flex items-center justify-center px-6 py-3 rounded font-display font-semibold text-sm tracking-wide transition-colors duration-200'
  const variants = {
    primary: 'bg-gold text-navy hover:bg-gold-dark',
    outline: 'border-2 border-gold text-gold hover:bg-gold hover:text-navy',
  }
  const cls = `${base} ${variants[variant]} ${className}`

  if (href) {
    const props = external ? { target: '_blank', rel: 'noopener noreferrer' } : {}
    return <Link href={href} className={cls} {...props}>{children}</Link>
  }
  return <button onClick={onClick} className={cls}>{children}</button>
}
```

- [ ] **Step 2 : `components/ui/SectionTitle.tsx`**

```tsx
export default function SectionTitle({
  title,
  subtitle,
  light = false,
}: {
  title: string
  subtitle?: string
  light?: boolean
}) {
  return (
    <div className="mb-10">
      <h2 className={`font-display text-3xl font-bold mb-3 ${light ? 'text-white' : 'text-navy'}`}>
        {title}
      </h2>
      <div className="w-16 h-1 bg-gold rounded mb-4" />
      {subtitle && (
        <p className={`text-lg max-w-2xl ${light ? 'text-gray-300' : 'text-gray-600'}`}>
          {subtitle}
        </p>
      )}
    </div>
  )
}
```

- [ ] **Step 3 : `components/ui/ServiceCard.tsx`**

```tsx
import Link from 'next/link'

type ServiceCardProps = {
  icon: string
  title: string
  summary: string
  slug: string
}

export default function ServiceCard({ icon, title, summary, slug }: ServiceCardProps) {
  return (
    <Link
      href={`/services#${slug}`}
      className="block p-6 border border-gray-200 rounded-lg hover:border-gold hover:shadow-md transition-all duration-200 group"
    >
      <span className="text-3xl mb-4 block">{icon}</span>
      <h3 className="font-display font-bold text-navy text-lg mb-2 group-hover:text-gold transition-colors">
        {title}
      </h3>
      <p className="text-gray-600 text-sm leading-relaxed">{summary}</p>
    </Link>
  )
}
```

- [ ] **Step 4 : Commit**

```bash
git add components/ui/
git commit -m "feat: add base UI components (Button, SectionTitle, ServiceCard)"
```

---

## Task 3 : Données statiques

**Files:**
- Create: `data/services.ts`
- Create: `data/media.ts`
- Create: `data/education.ts`
- Create: `data/experiences.ts`

- [ ] **Step 1 : `data/services.ts`**

```ts
export type Service = {
  slug: string
  icon: string
  title: string
  summary: string
  body: string
}

export const services: Service[] = [
  {
    slug: 'conseil-management',
    icon: '🏢',
    title: 'Conseil en Management des Organisations',
    summary: 'Stratégie fiable, outils simples, pour atteindre la performance par anticipation.',
    body: `Gérer une entreprise demande beaucoup d'énergie et de temps ; parfois le dirigeant manque de recul pour évaluer ses options. J'interviens pour mettre en place une stratégie fiable, un kit d'outils simple d'utilisation, permettant d'atteindre la performance escomptée par anticipation et de prendre les bonnes décisions au moment opportun.\n\nMon intervention couvre : la fidélisation clients, l'innovation, la qualité des relations internes, fournisseurs et clients. Résultats : optimisation de la gestion, valorisation du chiffre d'affaires, pérennisation des revenus.`,
  },
  {
    slug: 'conception-gestion-projets',
    icon: '📋',
    title: 'Conception et Gestion des Projets',
    summary: '+10 ans d\'expérience dans la conduite de projets complexes pour des organisations africaines et internationales.',
    body: `Maîtrise de la conception de projets, avec +10 ans d'expérience dans la conduite à terme de projets complexes pour des organisations africaines et internationales.\n\n**Exemple de projet phare :**\nIncubateur d'entrepreneurs sociaux → +500 jeunes accompagnés, +90 entreprises stables, agrément gouvernemental d'incubateur (2022), +305 personnes vulnérables formées aux AGR.\n\nRôles exercés : conception, recherche financements, mise en œuvre, pilotage d'équipe, reporting bailleurs de fonds.`,
  },
  {
    slug: 'intelligence-economique',
    icon: '🔍',
    title: 'Intelligence Économique en Afrique',
    summary: '+15 ans dans la conduite de missions d\'Intelligence Économique : procédés défensifs, offensifs et d\'influence.',
    body: `+15 ans dans la conduite de missions d'Intelligence Économique : procédés défensifs / offensifs / d'influence ; cartographie des acteurs, procédés et moyens selon les secteurs.\n\n**Missions types :**\n- Collecte de données et diffusion de connaissances — Méthode OSINT\n- Réduction de l'incertitude dans la stratégie de croissance (croissance externe, implantation pays, partenariats)\n- Benchmarking — Best Practices\n- Veille et priorisation des décisions (OSINT + Analyse SWOT)\n- Identification de risques financiers & cartographie client\n- Évaluation des équipes par clients mystère\n- Construction d'argumentaires de lobbying\n- Implémentation de départements d'IE\n- Proposition de politique`,
  },
  {
    slug: 'veille-due-diligence',
    icon: '🛡️',
    title: 'Veille Stratégique · Due Diligence · Protection des données',
    summary: 'Veille concurrentielle, diligence raisonnable avant signature et conformité des données personnelles.',
    body: `**Veille Stratégique :**\n- Veille concurrentielle (profil, process, stratégie, tactiques, réseaux)\n- Veille environnementale et sociétale (indices de reporting extra-financier, RSE)\n\n**Due Diligence :**\nDiligence raisonnable avant la signature de contrats/conventions — vérifications permettant de connaître avec précision la situation dans laquelle le client s'engage. Intègre les risques juridiques, financiers, environnementaux et sociaux.\n\n**Protection des données à caractère personnel :**\nConseil et implémentation de dispositifs conformes aux exigences légales camerounaises et internationales.`,
  },
  {
    slug: 'projets-developpement',
    icon: '🌍',
    title: 'Projets de Développement',
    summary: 'Conception, gestion opérationnelle, gestion financière et évaluation d\'impact de projets financés par des bailleurs internationaux.',
    body: `Conception, gestion opérationnelle, gestion financière et évaluation d'impact de projets de développement, notamment financés par des bailleurs internationaux (AICS, CEI, ONG AVSI, etc.).\n\nExpérience directe de coordination locale, rédaction de rapports bailleurs (trimestriels, semestriels, annuels), gestion des relations institutionnelles et suivi des procédures de marchés publics internationaux.`,
  },
]
```

- [ ] **Step 2 : `data/education.ts`**

```ts
export type Education = {
  period: string
  degree: string
  institution: string
  mention?: string
}

export const educations: Education[] = [
  { period: '2026', degree: 'CAS — Ethical Management', institution: 'Université de Fribourg' },
  { period: '2025', degree: 'Certification Gestion financière pour les professionnels du développement', institution: 'ITCILO (ILO)' },
  { period: '2024', degree: 'CAS — Integral Economics', institution: 'Université de Fribourg' },
  { period: '2021', degree: 'Certification Conception et gestion de projet', institution: 'ITCILO (ILO)' },
  { period: '2019', degree: "Certificat : Intelligence des marchés Africain", institution: 'CAVIE / ACCI' },
  { period: '2018–2019', degree: "Master 2 Pro — Administration des Affaires (BAC+5)", institution: 'Université de Dschang — Cameroun', mention: 'Assez bien' },
  { period: '2011–2014', degree: "Licence Pro — Gestion de l'information et des documents (BAC+3)", institution: 'ESSTIC — UYII-Soa, Cameroun', mention: 'Assez bien' },
  { period: '2009–2010', degree: 'Sciences économiques et gestion', institution: 'Université de Yaoundé II, Soa' },
  { period: '2008', degree: 'Baccalauréat Scientifique Mathématiques', institution: '—', mention: 'Passable' },
]

export const skills = [
  { label: "Conception et Gestion des projets d'Intelligence économique", experience: '10 ans' },
  { label: 'Veille Stratégique · Due Diligence · Analyses stratégiques · Protection des données', experience: '10 ans' },
  { label: 'Conseils en Gestion des Organisations', experience: '10 ans' },
]
```

- [ ] **Step 3 : `data/media.ts`**

```ts
export type MediaItem = {
  category: string
  label: string
  href: string
  type: 'video' | 'article' | 'social' | 'book'
}

export const mediaItems: MediaItem[] = [
  { category: 'Réseaux sociaux', label: 'LinkedIn', href: 'https://www.linkedin.com/in/azeumo/', type: 'social' },
  { category: 'Réseaux sociaux', label: 'Twitter / X', href: 'https://twitter.com/loftyazeumo', type: 'social' },
  { category: 'Réseaux sociaux', label: 'Facebook', href: 'http://www.facebook.com/loftyazeumo', type: 'social' },
  { category: 'Bibliographie', label: "L'Intelligence Économique Camerounaise — Harmattan", href: 'https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html', type: 'book' },
  { category: 'Bibliographie', label: "L'Intelligence Économique Camerounaise — Amazon", href: 'https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8', type: 'book' },
  { category: 'Vidéos', label: 'VoxAfrica — Voxbook 2014 (Partie I)', href: 'https://www.youtube.com/watch?v=KUohpA131dc', type: 'video' },
  { category: 'Vidéos', label: 'VoxAfrica — Voxbook 2014 (Partie II)', href: 'https://www.youtube.com/watch?v=Z05xRdvgeNw', type: 'video' },
  { category: 'Vidéos', label: 'Économie de Communion — Chaîne italienne', href: 'https://youtu.be/uY7XdBj8JDg', type: 'video' },
  { category: 'Articles & Interviews', label: 'romereports.com — Economy of Communion', href: 'https://www.romereports.com/en/2017/02/04/economy-of-communion-an-alternative-to-the-economy-that-kills-which-pope-francis-denounces/', type: 'article' },
  { category: 'Articles & Interviews', label: "unitedworldproject.org — Déplacés internes Cameroun", href: 'http://www.unitedworldproject.org/en/workshop/a-hub-to-support-the-internal-displaced-people-of-cameroon/', type: 'article' },
  { category: 'Articles & Interviews', label: "francescoeconomy.org — Vocation and Profit", href: 'https://francescoeconomy.org/vocation-and-profit-in-the-perspective-of-african-culture/', type: 'article' },
  { category: 'Articles & Interviews', label: 'algeriancenter.com — Interview IE', href: 'https://algeriancenter.com/le-cameroun-entre-francophonie-commonwealth-et-les-geants-usa-chine-interview-de-steve-william-azeumo/', type: 'article' },
  { category: 'Archives', label: 'Premier essai 2010', href: 'http://scpie.blogspot.com/2010/', type: 'article' },
  { category: 'Archives', label: 'Premiers projets 2011', href: 'https://kongossa.wordpress.com/2011/03/27/steve-azeumo-fait-son-kongossa-dentrepreneur/', type: 'article' },
]
```

- [ ] **Step 4 : `data/experiences.ts`**

```ts
export type Mission = {
  year: string
  object: string
  location: string
}

export const ieMissions: Mission[] = [
  { year: '2019', object: 'Due Diligence', location: 'Paris, France' },
  { year: '2013–aujourd\'hui', object: 'Collecte de données OSINT', location: 'Ploeren, France' },
  { year: '2013–2019', object: 'Stratégie de croissance (réseau, croissance externe, implantation)', location: 'Rome, Kenya, Cameroun' },
  { year: '2017', object: 'Benchmarking — Best Practices', location: 'Manille, Philippines' },
  { year: '2019', object: 'Veille & priorisation OSINT + SWOT', location: 'Dakar, Mali, Burkina Faso' },
  { year: '2015', object: 'Stratégie de croissance réseau', location: 'Nairobi, Kenya' },
  { year: '2013–aujourd\'hui', object: 'Identification risques financiers & cartographie client', location: 'Yaoundé, Cameroun' },
]
```

- [ ] **Step 5 : Commit**

```bash
git add data/
git commit -m "feat: add static data files (services, education, media, experiences)"
```

---

## Task 4 : Layout (Navbar + Footer)

**Files:**
- Create: `components/layout/Navbar.tsx`
- Create: `components/layout/Footer.tsx`
- Modify: `app/layout.tsx`

- [ ] **Step 1 : `components/layout/Navbar.tsx`**

```tsx
'use client'
import { useState } from 'react'
import Link from 'next/link'
import { usePathname } from 'next/navigation'

const links = [
  { href: '/a-propos', label: 'À propos' },
  { href: '/services', label: 'Services' },
  { href: '/methode', label: 'Méthode' },
  { href: '/blog', label: 'Blog' },
  { href: '/media', label: 'Média' },
  { href: '/contact', label: 'Contact' },
]

export default function Navbar() {
  const [open, setOpen] = useState(false)
  const pathname = usePathname()

  return (
    <header className="fixed top-0 left-0 right-0 z-50 bg-navy/95 backdrop-blur-sm border-b border-white/10">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 flex items-center justify-between h-16">
        <Link href="/" className="font-display font-bold text-white text-lg tracking-wide hover:text-gold transition-colors">
          AZEUMO
        </Link>

        {/* Desktop nav */}
        <nav className="hidden md:flex items-center gap-6">
          {links.map(({ href, label }) => (
            <Link
              key={href}
              href={href}
              className={`text-sm font-medium transition-colors ${
                pathname.startsWith(href) ? 'text-gold' : 'text-gray-300 hover:text-white'
              }`}
            >
              {label}
            </Link>
          ))}
        </nav>

        {/* Mobile burger */}
        <button
          className="md:hidden text-white p-2"
          onClick={() => setOpen(!open)}
          aria-label="Menu"
        >
          <span className="block w-5 h-0.5 bg-white mb-1" />
          <span className="block w-5 h-0.5 bg-white mb-1" />
          <span className="block w-5 h-0.5 bg-white" />
        </button>
      </div>

      {/* Mobile menu */}
      {open && (
        <nav className="md:hidden bg-navy border-t border-white/10 px-4 pb-4">
          {links.map(({ href, label }) => (
            <Link
              key={href}
              href={href}
              onClick={() => setOpen(false)}
              className="block py-2 text-gray-300 hover:text-gold transition-colors"
            >
              {label}
            </Link>
          ))}
        </nav>
      )}
    </header>
  )
}
```

- [ ] **Step 2 : `components/layout/Footer.tsx`**

```tsx
import Link from 'next/link'

const socials = [
  { label: 'LinkedIn', href: 'https://www.linkedin.com/in/azeumo/' },
  { label: 'Twitter', href: 'https://twitter.com/loftyazeumo' },
  { label: 'Facebook', href: 'http://www.facebook.com/loftyazeumo' },
]

export default function Footer() {
  return (
    <footer className="bg-navy text-gray-400 py-10 mt-20">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <div className="text-sm">
          © {new Date().getFullYear()} Steve William Azeumo · Yaoundé, Cameroun
        </div>
        <div className="flex gap-6 text-sm">
          {socials.map(({ label, href }) => (
            <a key={label} href={href} target="_blank" rel="noopener noreferrer"
               className="hover:text-gold transition-colors">
              {label}
            </a>
          ))}
          <Link href="/mentions-legales" className="hover:text-gold transition-colors">
            Mentions légales
          </Link>
        </div>
      </div>
    </footer>
  )
}
```

- [ ] **Step 3 : `app/layout.tsx`**

```tsx
import type { Metadata } from 'next'
import { Inter, Montserrat } from 'next/font/google'
import Navbar from '@/components/layout/Navbar'
import Footer from '@/components/layout/Footer'
import './globals.css'

const inter = Inter({ subsets: ['latin'], variable: '--font-inter' })
const montserrat = Montserrat({ subsets: ['latin'], variable: '--font-montserrat' })

export const metadata: Metadata = {
  metadataBase: new URL('https://www.azeumo.com'),
  title: {
    default: 'Steve William Azeumo — Consultant en Intelligence Économique',
    template: '%s | Azeumo',
  },
  description: 'Consultant indépendant en Intelligence Économique, Due Diligence et Veille Stratégique. +15 ans d\'expérience en Afrique et dans le monde.',
  openGraph: {
    type: 'website',
    locale: 'fr_FR',
    url: 'https://www.azeumo.com',
    siteName: 'Steve William Azeumo',
  },
}

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="fr" className={`${inter.variable} ${montserrat.variable}`}>
      <body>
        <Navbar />
        <main className="pt-16">{children}</main>
        <Footer />
      </body>
    </html>
  )
}
```

- [ ] **Step 4 : Vérifier visuellement**

```bash
npm run dev
```

Expected: navbar navy fixe en haut, footer en bas, police Inter/Montserrat chargée.

- [ ] **Step 5 : Commit**

```bash
git add app/layout.tsx components/layout/
git commit -m "feat: add Navbar and Footer layout components"
```

---

## Task 5 : Page Home

**Files:**
- Create: `components/sections/Hero.tsx`
- Create: `components/sections/ServicesGrid.tsx`
- Create: `components/sections/MethodTeaser.tsx`
- Modify: `app/page.tsx`

- [ ] **Step 1 : `components/sections/Hero.tsx`**

```tsx
import Button from '@/components/ui/Button'

export default function Hero() {
  return (
    <section className="bg-navy text-white min-h-[90vh] flex items-center">
      <div className="max-w-6xl mx-auto px-4 sm:px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
          <p className="text-gold font-display font-semibold text-sm tracking-widest uppercase mb-4">
            Intelligence Économique · Due Diligence · Veille Stratégique
          </p>
          <h1 className="font-display font-bold text-4xl sm:text-5xl lg:text-6xl leading-tight mb-6">
            Steve William<br />
            <span className="text-gold">Azeumo</span>
          </h1>
          <p className="text-gray-300 text-lg leading-relaxed mb-8 max-w-lg">
            Consultant indépendant, partenaire stratégique et opérationnel au sein de projets
            innovants en Afrique et dans le monde.
          </p>
          <blockquote className="border-l-2 border-gold pl-4 text-gray-400 italic text-sm mb-8 max-w-md">
            "I've a dream that one day, Africa will be one Country with one Authority and one Nation ;
            I've a dream now." — Lofty Azeumo
          </blockquote>
          <div className="flex flex-wrap gap-4">
            <Button href="/services">Découvrir mes services</Button>
            <Button href="/contact" variant="outline">Me contacter</Button>
          </div>
        </div>
        <div className="hidden md:flex justify-center">
          <div className="w-72 h-72 rounded-full border-4 border-gold/30 overflow-hidden bg-navy-700 flex items-center justify-center">
            {/* Replace src with actual portrait when available */}
            <span className="text-6xl">👤</span>
          </div>
        </div>
      </div>
    </section>
  )
}
```

- [ ] **Step 2 : `components/sections/ServicesGrid.tsx`**

```tsx
import ServiceCard from '@/components/ui/ServiceCard'
import SectionTitle from '@/components/ui/SectionTitle'
import { services } from '@/data/services'

export default function ServicesGrid() {
  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-6xl mx-auto px-4 sm:px-6">
        <SectionTitle
          title="Mes Services"
          subtitle="Des solutions sur mesure pour vos défis stratégiques et organisationnels."
        />
        <div className="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {services.map((s) => (
            <ServiceCard
              key={s.slug}
              icon={s.icon}
              title={s.title}
              summary={s.summary}
              slug={s.slug}
            />
          ))}
        </div>
      </div>
    </section>
  )
}
```

- [ ] **Step 3 : `components/sections/MethodTeaser.tsx`**

```tsx
import SectionTitle from '@/components/ui/SectionTitle'
import Button from '@/components/ui/Button'

const modes = [
  { icon: '🤝', title: 'Conseil', desc: 'Accompagnement stratégique personnalisé, co-construction de la solution avec le client.' },
  { icon: '🎓', title: 'Formation', desc: "Ateliers de travail, sessions de formation sur l'IE, l'entrepreneuriat, l'économie de communion." },
  { icon: '🔧', title: 'Intervention', desc: "Missions terrain, déploiement opérationnel, conduite d'enquêtes OSINT, audits." },
]

export default function MethodTeaser() {
  return (
    <section className="py-20 bg-navy text-white">
      <div className="max-w-6xl mx-auto px-4 sm:px-6">
        <SectionTitle title="Ma Méthode" light />
        <div className="grid md:grid-cols-3 gap-8 mb-10">
          {modes.map(({ icon, title, desc }) => (
            <div key={title} className="bg-white/5 border border-white/10 rounded-lg p-6">
              <span className="text-3xl block mb-3">{icon}</span>
              <h3 className="font-display font-bold text-gold text-lg mb-2">{title}</h3>
              <p className="text-gray-300 text-sm leading-relaxed">{desc}</p>
            </div>
          ))}
        </div>
        <Button href="/methode" variant="outline">En savoir plus</Button>
      </div>
    </section>
  )
}
```

- [ ] **Step 4 : `app/page.tsx`**

```tsx
import Hero from '@/components/sections/Hero'
import ServicesGrid from '@/components/sections/ServicesGrid'
import MethodTeaser from '@/components/sections/MethodTeaser'

export default function HomePage() {
  return (
    <>
      <Hero />
      <ServicesGrid />
      <MethodTeaser />
    </>
  )
}
```

- [ ] **Step 5 : Vérifier visuellement**

```bash
npm run dev
```

Expected: hero navy avec titre "Steve William Azeumo" en or, grille de 5 services, section méthode navy. Responsive mobile-first.

- [ ] **Step 6 : Commit**

```bash
git add app/page.tsx components/sections/
git commit -m "feat: build Home page (Hero, ServicesGrid, MethodTeaser)"
```

---

## Task 6 : Page À Propos

**Files:**
- Create: `app/a-propos/page.tsx`

- [ ] **Step 1 : `app/a-propos/page.tsx`**

```tsx
import type { Metadata } from 'next'
import SectionTitle from '@/components/ui/SectionTitle'
import Button from '@/components/ui/Button'
import { educations, skills } from '@/data/education'

export const metadata: Metadata = {
  title: 'À Propos',
  description: "Biographie, éducation, compétences et bibliographie de Steve William Azeumo, consultant en Intelligence Économique.",
}

export default function AProposPage() {
  return (
    <div className="max-w-4xl mx-auto px-4 sm:px-6 py-20">

      {/* Biographie */}
      <SectionTitle title="À Propos de moi" />
      <div className="prose prose-lg max-w-none text-gray-700 mb-16 space-y-4">
        <p>
          Consultant indépendant, agissant en tant que partenaire stratégique et opérationnel au sein de projets
          innovants d'organisations du continent africain et du monde entier. J'accorde une place prépondérante aux
          méthodes de veille stratégique et aux stratégies d'intelligence économique dans tous les projets sur
          lesquels j'interviens.
        </p>
        <p>
          Auteur de{' '}
          <a href="https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html"
             target="_blank" rel="noopener noreferrer" className="text-gold font-medium hover:underline">
            "L'intelligence économique Camerounaise"
          </a>
          {' '}publié en 2013 aux éditions l'Harmattan Cameroun ; ISBN 978-2-343-01199-8.
        </p>
        <p>
          Je crois au potentiel humain et que dans tout projet ou entreprise nous devons mettre l'être humain au
          centre de tout ; raison pour laquelle je milite aux côtés des entrepreneurs de l'économie de communion
          et du mouvement <strong>The Economy of Francesco</strong> pour une économie plus inclusive en faveur des
          plus nécessiteux.
        </p>
        <ul className="list-none p-0 space-y-1 text-sm text-gray-600">
          <li>📅 Né le 01/06/1987, Yaoundé, Cameroun</li>
          <li>🗣️ Langues : Français, Anglais, Italien</li>
        </ul>
      </div>

      {/* Compétences */}
      <SectionTitle title="Compétences clés" />
      <div className="grid sm:grid-cols-3 gap-4 mb-16">
        {skills.map(({ label, experience }) => (
          <div key={label} className="border border-gray-200 rounded-lg p-4 text-center">
            <span className="block text-2xl font-display font-bold text-gold mb-1">{experience}</span>
            <span className="text-sm text-gray-600">{label}</span>
          </div>
        ))}
      </div>

      {/* Éducation */}
      <SectionTitle title="Éducation & Qualifications" />
      <div className="space-y-3 mb-16">
        {educations.map(({ period, degree, institution, mention }) => (
          <div key={degree} className="flex flex-col sm:flex-row sm:items-start gap-2 py-3 border-b border-gray-100">
            <span className="text-sm font-mono text-gold font-semibold whitespace-nowrap min-w-[110px]">
              {period}
            </span>
            <div>
              <p className="font-medium text-navy">{degree}</p>
              <p className="text-sm text-gray-500">{institution}{mention ? ` — ${mention}` : ''}</p>
            </div>
          </div>
        ))}
      </div>

      {/* Bibliographie */}
      <SectionTitle title="Bibliographie" />
      <div className="space-y-4 mb-12">
        <div className="border border-gold/30 rounded-lg p-6 bg-gold/5">
          <h3 className="font-display font-bold text-navy text-lg mb-2">
            L'Intelligence Économique Camerounaise (IEC)
          </h3>
          <p className="text-gray-600 text-sm mb-4">Éditions Harmattan Cameroun, 2013 — ISBN 978-2-343-01199-8</p>
          <div className="flex flex-wrap gap-3">
            <Button href="https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html"
                    variant="outline" external>Harmattan</Button>
            <Button href="https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8"
                    variant="outline" external>Amazon</Button>
          </div>
        </div>
        <p className="text-sm text-gray-600">
          Bibliographie complète :{' '}
          <a href="https://www.editions-harmattan.fr/index.asp?navig=auteurs&obj=artiste&no=24878"
             target="_blank" rel="noopener noreferrer" className="text-gold hover:underline">
            Éditions Harmattan
          </a>
          {' '}· Premier essai (2010) :{' '}
          <a href="http://scpie.blogspot.com/2010/" target="_blank" rel="noopener noreferrer"
             className="text-gold hover:underline">
            scpie.blogspot.com
          </a>
        </p>
      </div>
    </div>
  )
}
```

- [ ] **Step 2 : Vérifier**

```bash
npm run dev
# Naviguer vers http://localhost:3000/a-propos
```

Expected: biographie, tableau de compétences, timeline de diplômes, section bibliographie avec liens.

- [ ] **Step 3 : Commit**

```bash
git add app/a-propos/
git commit -m "feat: build À Propos page (bio, education, skills, bibliography)"
```

---

## Task 7 : Page Services

**Files:**
- Create: `app/services/page.tsx`

- [ ] **Step 1 : `app/services/page.tsx`**

```tsx
import type { Metadata } from 'next'
import SectionTitle from '@/components/ui/SectionTitle'
import Button from '@/components/ui/Button'
import { services } from '@/data/services'

export const metadata: Metadata = {
  title: 'Services',
  description: "Services de conseil en Intelligence Économique, Due Diligence, Veille Stratégique et Gestion de Projets par Steve William Azeumo.",
}

export default function ServicesPage() {
  return (
    <div className="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle
        title="Mes Services"
        subtitle="Des missions sur mesure pour vos défis stratégiques, organisationnels et de développement."
      />

      <div className="space-y-16">
        {services.map((service) => (
          <section key={service.slug} id={service.slug} className="scroll-mt-20">
            <div className="flex items-start gap-4 mb-4">
              <span className="text-4xl">{service.icon}</span>
              <h2 className="font-display font-bold text-navy text-2xl leading-snug">{service.title}</h2>
            </div>
            <div className="border-l-4 border-gold pl-6">
              <div className="prose text-gray-700 whitespace-pre-line leading-relaxed">
                {service.body}
              </div>
            </div>
          </section>
        ))}
      </div>

      <div className="mt-16 bg-navy text-white rounded-xl p-8 text-center">
        <h3 className="font-display font-bold text-2xl mb-3">Commandez un service</h3>
        <p className="text-gray-300 mb-6">Discutons de votre projet et trouvons la solution adaptée à vos besoins.</p>
        <Button href="/contact">Prendre contact</Button>
      </div>
    </div>
  )
}
```

- [ ] **Step 2 : Vérifier**

```bash
# Naviguer vers http://localhost:3000/services
```

Expected: 5 services avec ancres, chaque service avec son icône, son titre, son texte. CTA navy en bas.

- [ ] **Step 3 : Commit**

```bash
git add app/services/
git commit -m "feat: build Services page with 5 services and CTA"
```

---

## Task 8 : Page Méthode

**Files:**
- Create: `app/methode/page.tsx`

- [ ] **Step 1 : `app/methode/page.tsx`**

```tsx
import type { Metadata } from 'next'
import SectionTitle from '@/components/ui/SectionTitle'
import Button from '@/components/ui/Button'
import { ieMissions } from '@/data/experiences'

export const metadata: Metadata = {
  title: 'Méthode',
  description: "Méthode de travail de Steve William Azeumo : Conseil, Formation, Intervention — avec expériences en Intelligence Économique.",
}

const modes = [
  {
    icon: '🤝',
    title: 'Conseil',
    desc: "Accompagnement stratégique personnalisé, co-construction de la solution avec le client. Chaque mission commence par une écoute approfondie de vos enjeux et de votre contexte organisationnel.",
  },
  {
    icon: '🎓',
    title: 'Formation',
    desc: "Ateliers de travail, sessions de formation sur l'Intelligence Économique, l'entrepreneuriat et l'Économie de Communion. Formats adaptés : demi-journée, journée ou module multi-sessions.",
  },
  {
    icon: '🔧',
    title: 'Intervention',
    desc: "Missions terrain, déploiement opérationnel, conduite d'enquêtes OSINT, audits. Présence sur site en Afrique et à l'international selon les besoins du projet.",
  },
]

export default function MethodePage() {
  return (
    <div className="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle
        title="Ma Méthode"
        subtitle="Trois modes d'intervention adaptés à vos besoins."
      />

      <div className="grid md:grid-cols-3 gap-8 mb-20">
        {modes.map(({ icon, title, desc }) => (
          <div key={title} className="bg-gray-50 rounded-xl p-6 border border-gray-200">
            <span className="text-4xl block mb-4">{icon}</span>
            <h2 className="font-display font-bold text-navy text-xl mb-3">{title}</h2>
            <p className="text-gray-600 text-sm leading-relaxed">{desc}</p>
          </div>
        ))}
      </div>

      <SectionTitle
        title="Tableau des missions IE"
        subtitle="Sélection de missions d'Intelligence Économique conduites depuis 2013."
      />
      <div className="overflow-x-auto mb-16">
        <table className="w-full text-sm border-collapse">
          <thead>
            <tr className="bg-navy text-white">
              <th className="text-left p-3 font-display">Année</th>
              <th className="text-left p-3 font-display">Objet</th>
              <th className="text-left p-3 font-display">Localisation</th>
            </tr>
          </thead>
          <tbody>
            {ieMissions.map(({ year, object, location }, i) => (
              <tr key={i} className={i % 2 === 0 ? 'bg-white' : 'bg-gray-50'}>
                <td className="p-3 font-mono text-gold font-semibold whitespace-nowrap">{year}</td>
                <td className="p-3 text-gray-700">{object}</td>
                <td className="p-3 text-gray-500">{location}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>

      <div className="text-center">
        <Button href="/contact">Discutons de votre projet</Button>
      </div>
    </div>
  )
}
```

- [ ] **Step 2 : Vérifier**

```bash
# Naviguer vers http://localhost:3000/methode
```

Expected: 3 cartes (Conseil/Formation/Intervention), tableau des missions IE.

- [ ] **Step 3 : Commit**

```bash
git add app/methode/
git commit -m "feat: build Méthode page with modes and IE missions table"
```

---

## Task 9 : Système Blog (MDX)

**Files:**
- Create: `lib/blog.ts`
- Create: `content/blog/2013-01-01-intelligence-economique-camerounaise.mdx`
- Create: `app/blog/page.tsx`
- Create: `app/blog/[slug]/page.tsx`

- [ ] **Step 1 : `lib/blog.ts`**

```ts
import fs from 'fs'
import path from 'path'
import matter from 'gray-matter'

const BLOG_DIR = path.join(process.cwd(), 'content', 'blog')

export type PostMeta = {
  slug: string
  title: string
  date: string
  excerpt: string
  tags?: string[]
}

export function listPosts(): PostMeta[] {
  if (!fs.existsSync(BLOG_DIR)) return []
  const files = fs.readdirSync(BLOG_DIR).filter((f) => f.endsWith('.mdx'))
  return files
    .map((filename) => {
      const raw = fs.readFileSync(path.join(BLOG_DIR, filename), 'utf8')
      const { data } = matter(raw)
      return {
        slug: filename.replace(/\.mdx$/, ''),
        title: data.title ?? 'Sans titre',
        date: data.date ?? '',
        excerpt: data.excerpt ?? '',
        tags: data.tags ?? [],
      } as PostMeta
    })
    .sort((a, b) => (a.date > b.date ? -1 : 1))
}

export function getPost(slug: string): { meta: PostMeta; content: string } | null {
  const filePath = path.join(BLOG_DIR, `${slug}.mdx`)
  if (!fs.existsSync(filePath)) return null
  const raw = fs.readFileSync(filePath, 'utf8')
  const { data, content } = matter(raw)
  return {
    meta: {
      slug,
      title: data.title ?? 'Sans titre',
      date: data.date ?? '',
      excerpt: data.excerpt ?? '',
      tags: data.tags ?? [],
    },
    content,
  }
}
```

- [ ] **Step 2 : Article de démonstration `content/blog/2013-01-01-intelligence-economique-camerounaise.mdx`**

```mdx
---
title: "L'Intelligence Économique Camerounaise — Pourquoi ce livre ?"
date: "2013-01-01"
excerpt: "Présentation de l'ouvrage publié aux Éditions Harmattan en 2013 sur l'Intelligence Économique au Cameroun."
tags: ["Intelligence Économique", "Cameroun", "Publication"]
---

## Contexte

En 2013, j'ai publié *L'Intelligence Économique Camerounaise (IEC)* aux Éditions Harmattan Cameroun.
Cet ouvrage est le fruit de plusieurs années de recherche et de pratique terrain dans le domaine de l'IE en Afrique centrale.

## Pourquoi ce livre ?

L'Intelligence Économique reste peu connue et peu pratiquée en Afrique subsaharienne.
Pourtant, dans un contexte de mondialisation accélérée, les organisations africaines ont impérativement
besoin d'outils de veille, d'analyse et de protection de l'information pour rester compétitives.

Ce livre répond à cette lacune en proposant une approche adaptée au contexte camerounais et africain.

## Où se procurer l'ouvrage ?

- [Éditions Harmattan](https://www.editions-harmattan.fr/livre-l_intelligence_economique_camerounaise_iec_steve_william_azeumo-9782343011998-40537.html)
- [Amazon](https://www.amazon.com/Lintelligence-%C3%A9conomique-camerounaise-Harmattan-Cameroun-ebook/dp/B00K35UKT8)
```

- [ ] **Step 3 : `app/blog/page.tsx`**

```tsx
import type { Metadata } from 'next'
import Link from 'next/link'
import SectionTitle from '@/components/ui/SectionTitle'
import { listPosts } from '@/lib/blog'

export const metadata: Metadata = {
  title: 'Blog & Articles',
  description: "Articles, réflexions et publications de Steve William Azeumo sur l'Intelligence Économique en Afrique.",
}

export default function BlogPage() {
  const posts = listPosts()

  return (
    <div className="max-w-3xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle
        title="Blog & Articles"
        subtitle="Réflexions sur l'Intelligence Économique, l'entrepreneuriat et le développement en Afrique."
      />

      {posts.length === 0 ? (
        <p className="text-gray-500">Aucun article publié pour l'instant.</p>
      ) : (
        <div className="space-y-8">
          {posts.map(({ slug, title, date, excerpt, tags }) => (
            <article key={slug} className="border-b border-gray-100 pb-8">
              <p className="text-sm text-gold font-mono mb-2">{date}</p>
              <h2 className="font-display font-bold text-navy text-xl mb-2 hover:text-gold transition-colors">
                <Link href={`/blog/${slug}`}>{title}</Link>
              </h2>
              <p className="text-gray-600 text-sm leading-relaxed mb-3">{excerpt}</p>
              {tags && tags.length > 0 && (
                <div className="flex flex-wrap gap-2">
                  {tags.map((tag) => (
                    <span key={tag} className="text-xs bg-gold/10 text-gold px-2 py-0.5 rounded">
                      {tag}
                    </span>
                  ))}
                </div>
              )}
            </article>
          ))}
        </div>
      )}
    </div>
  )
}
```

- [ ] **Step 4 : `app/blog/[slug]/page.tsx`**

```tsx
import type { Metadata } from 'next'
import { notFound } from 'next/navigation'
import Link from 'next/link'
import { MDXRemote } from 'next-mdx-remote/rsc'
import { getPost, listPosts } from '@/lib/blog'

// Install: npm install next-mdx-remote
// (needed for rendering MDX content from files)

export async function generateStaticParams() {
  return listPosts().map(({ slug }) => ({ slug }))
}

export async function generateMetadata({ params }: { params: { slug: string } }): Promise<Metadata> {
  const post = getPost(params.slug)
  if (!post) return {}
  return { title: post.meta.title, description: post.meta.excerpt }
}

export default function BlogPostPage({ params }: { params: { slug: string } }) {
  const post = getPost(params.slug)
  if (!post) notFound()

  return (
    <div className="max-w-3xl mx-auto px-4 sm:px-6 py-20">
      <Link href="/blog" className="text-sm text-gold hover:underline mb-8 inline-block">
        ← Retour au blog
      </Link>
      <p className="text-sm text-gray-400 font-mono mb-3">{post.meta.date}</p>
      <h1 className="font-display font-bold text-navy text-3xl sm:text-4xl mb-8 leading-tight">
        {post.meta.title}
      </h1>
      <article className="prose prose-lg max-w-none text-gray-700">
        <MDXRemote source={post.content} />
      </article>
    </div>
  )
}
```

- [ ] **Step 5 : Installer `next-mdx-remote`**

```bash
npm install next-mdx-remote
```

- [ ] **Step 6 : Vérifier**

```bash
# Naviguer vers http://localhost:3000/blog
# Cliquer sur l'article de démo
```

Expected: liste d'articles avec date, titre, extrait et tags. Page d'article avec rendu MDX.

- [ ] **Step 7 : Commit**

```bash
git add lib/ content/ app/blog/
git commit -m "feat: add MDX blog system (list + individual post pages)"
```

---

## Task 10 : Page Média

**Files:**
- Create: `app/media/page.tsx`

- [ ] **Step 1 : `app/media/page.tsx`**

```tsx
import type { Metadata } from 'next'
import SectionTitle from '@/components/ui/SectionTitle'
import { mediaItems } from '@/data/media'

export const metadata: Metadata = {
  title: 'Média',
  description: "Interviews, vidéos, articles et présences médias de Steve William Azeumo.",
}

const icons: Record<string, string> = {
  social: '💬',
  book: '📚',
  video: '🎥',
  article: '📰',
}

export default function MediaPage() {
  const categories = [...new Set(mediaItems.map((m) => m.category))]

  return (
    <div className="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle
        title="Média"
        subtitle="Interventions, publications, vidéos et présences dans les médias."
      />

      {categories.map((cat) => (
        <section key={cat} className="mb-12">
          <h2 className="font-display font-bold text-navy text-xl mb-4 border-b border-gold/30 pb-2">
            {cat}
          </h2>
          <ul className="space-y-3">
            {mediaItems.filter((m) => m.category === cat).map(({ label, href, type }) => (
              <li key={href}>
                <a
                  href={href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center gap-3 group hover:text-gold transition-colors"
                >
                  <span className="text-xl">{icons[type]}</span>
                  <span className="text-gray-700 group-hover:text-gold underline underline-offset-2">
                    {label}
                  </span>
                </a>
              </li>
            ))}
          </ul>
        </section>
      ))}
    </div>
  )
}
```

- [ ] **Step 2 : Vérifier**

```bash
# Naviguer vers http://localhost:3000/media
```

Expected: sections par catégorie (Réseaux sociaux, Bibliographie, Vidéos, Articles), tous les liens cliquables.

- [ ] **Step 3 : Commit**

```bash
git add app/media/
git commit -m "feat: build Média page grouped by category"
```

---

## Task 11 : Page Contact

**Files:**
- Create: `components/ui/ContactForm.tsx`
- Create: `app/contact/page.tsx`

- [ ] **Step 1 : Créer un compte Formspree et noter l'endpoint**

Aller sur [formspree.io](https://formspree.io), créer un formulaire pour `contact@azeumo.com`.
Récupérer le `formId` (ex: `xpwrqkgd`).

- [ ] **Step 2 : `components/ui/ContactForm.tsx`**

```tsx
'use client'
import { useForm } from 'react-hook-form'
import { useState } from 'react'
import Button from './Button'

type FormData = {
  name: string
  email: string
  subject: string
  message: string
}

// Replace 'YOUR_FORM_ID' with actual Formspree form ID
const FORMSPREE_ID = 'YOUR_FORM_ID'

export default function ContactForm() {
  const { register, handleSubmit, reset, formState: { errors } } = useForm<FormData>()
  const [status, setStatus] = useState<'idle' | 'sending' | 'sent' | 'error'>('idle')

  async function onSubmit(data: FormData) {
    setStatus('sending')
    try {
      const res = await fetch(`https://formspree.io/f/${FORMSPREE_ID}`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
        body: JSON.stringify(data),
      })
      if (res.ok) { setStatus('sent'); reset() }
      else setStatus('error')
    } catch {
      setStatus('error')
    }
  }

  const field = 'w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:border-gold focus:ring-1 focus:ring-gold'
  const err = 'text-red-500 text-xs mt-1'

  return (
    <form onSubmit={handleSubmit(onSubmit)} className="space-y-5">
      <div>
        <input {...register('name', { required: 'Nom requis' })}
               placeholder="Votre nom *" className={field} />
        {errors.name && <p className={err}>{errors.name.message}</p>}
      </div>
      <div>
        <input {...register('email', { required: 'Email requis', pattern: { value: /^\S+@\S+\.\S+$/, message: 'Email invalide' } })}
               type="email" placeholder="Votre email *" className={field} />
        {errors.email && <p className={err}>{errors.email.message}</p>}
      </div>
      <div>
        <input {...register('subject', { required: 'Sujet requis' })}
               placeholder="Sujet *" className={field} />
        {errors.subject && <p className={err}>{errors.subject.message}</p>}
      </div>
      <div>
        <textarea {...register('message', { required: 'Message requis', minLength: { value: 20, message: 'Minimum 20 caractères' } })}
                  placeholder="Votre message *" rows={5} className={`${field} resize-none`} />
        {errors.message && <p className={err}>{errors.message.message}</p>}
      </div>

      <Button type="submit" className={status === 'sending' ? 'opacity-60 cursor-not-allowed' : ''}>
        {status === 'sending' ? 'Envoi en cours…' : 'Envoyer le message'}
      </Button>

      {status === 'sent' && (
        <p className="text-green-600 text-sm">Message envoyé ! Je vous répondrai dans les plus brefs délais.</p>
      )}
      {status === 'error' && (
        <p className="text-red-500 text-sm">Une erreur est survenue. Veuillez réessayer ou écrire directement à contact@azeumo.com</p>
      )}
    </form>
  )
}
```

Note: ajouter `type="submit"` dans `Button.tsx` — modifier le type de `onClick` pour accepter `type` prop :

```tsx
// Dans components/ui/Button.tsx, ajouter dans ButtonProps :
type?: 'button' | 'submit' | 'reset'

// Et dans le JSX du <button> :
<button type={type ?? 'button'} onClick={onClick} className={cls}>{children}</button>
```

- [ ] **Step 3 : `app/contact/page.tsx`**

```tsx
import type { Metadata } from 'next'
import SectionTitle from '@/components/ui/SectionTitle'
import ContactForm from '@/components/ui/ContactForm'

export const metadata: Metadata = {
  title: 'Contact',
  description: "Contactez Steve William Azeumo, consultant en Intelligence Économique à Yaoundé, Cameroun.",
}

export default function ContactPage() {
  return (
    <div className="max-w-4xl mx-auto px-4 sm:px-6 py-20">
      <SectionTitle
        title="Me contacter"
        subtitle="Pour toute demande de mission, de conseil ou de partenariat."
      />

      <div className="grid md:grid-cols-2 gap-12">
        {/* Coordonnées */}
        <div>
          <div className="space-y-4 mb-8">
            <div>
              <p className="text-sm font-semibold text-navy mb-1">Email</p>
              <a href="mailto:contact@azeumo.com" className="text-gold hover:underline">
                contact@azeumo.com
              </a>
            </div>
            <div>
              <p className="text-sm font-semibold text-navy mb-1">Téléphone</p>
              <a href="tel:+237674463867" className="text-gray-700 hover:text-gold transition-colors block">
                +237 674 46 38 67
              </a>
              <a href="tel:+237696550555" className="text-gray-700 hover:text-gold transition-colors block">
                +237 696 55 05 55
              </a>
            </div>
            <div>
              <p className="text-sm font-semibold text-navy mb-1">Localisation</p>
              <p className="text-gray-600">Yaoundé, Cameroun</p>
            </div>
          </div>
          <a
            href="https://wa.me/237674463867"
            target="_blank"
            rel="noopener noreferrer"
            className="inline-flex items-center gap-2 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded font-semibold text-sm transition-colors"
          >
            💬 Écrire sur WhatsApp
          </a>
        </div>

        {/* Formulaire */}
        <div>
          <ContactForm />
        </div>
      </div>
    </div>
  )
}
```

- [ ] **Step 4 : Vérifier le formulaire**

```bash
# Naviguer vers http://localhost:3000/contact
# Remplir et soumettre le formulaire (avec FORMSPREE_ID valide)
```

Expected: formulaire avec validation, coordonnées, bouton WhatsApp, message de confirmation après envoi.

- [ ] **Step 5 : Commit**

```bash
git add app/contact/ components/ui/ContactForm.tsx components/ui/Button.tsx
git commit -m "feat: build Contact page with react-hook-form and Formspree integration"
```

---

## Task 12 : Page Mentions Légales

**Files:**
- Create: `app/mentions-legales/page.tsx`

- [ ] **Step 1 : `app/mentions-legales/page.tsx`**

```tsx
import type { Metadata } from 'next'

export const metadata: Metadata = {
  title: 'Mentions légales',
}

export default function MentionsLegalesPage() {
  return (
    <div className="max-w-3xl mx-auto px-4 sm:px-6 py-20 prose prose-sm text-gray-700">
      <h1 className="font-display text-navy">Mentions Légales</h1>
      <h2>Éditeur</h2>
      <p>AZEUMO — Steve William Azeumo<br />Directeur de la publication : Monsieur Steve William Azeumo, Yaoundé, Cameroun</p>
      <h2>Hébergeur</h2>
      <p>OVH SAS / Infomaniak — <a href="https://www.infomaniak.com/fr" target="_blank" rel="noopener noreferrer">infomaniak.com</a></p>
      <h2>Concepteur initial</h2>
      <p>Tegomo Alain</p>
      <h2>Propriété intellectuelle</h2>
      <p>L'ensemble du contenu de ce site (textes, images, données) est la propriété exclusive de Steve William Azeumo. Toute reproduction est interdite sans autorisation préalable.</p>
      <h2>Lois applicables</h2>
      <ul>
        <li>Loi N°2010/012 du 21 décembre 2010 relative à la cybersécurité et à la cybercriminalité au Cameroun</li>
        <li>Loi N°2010/013 du 21 décembre 2010 régissant les communications électroniques</li>
        <li>Loi N°2010/021 du 21 décembre 2010 régissant le commerce électronique</li>
      </ul>
      <h2>Juridiction</h2>
      <p>Juridictions Camerounaises</p>
      <h2>Contact</h2>
      <p><a href="mailto:contact@azeumo.com">contact@azeumo.com</a></p>
    </div>
  )
}
```

- [ ] **Step 2 : Commit**

```bash
git add app/mentions-legales/
git commit -m "feat: add Mentions légales page"
```

---

## Task 13 : SEO — Schema.org Person

**Files:**
- Modify: `app/layout.tsx`

- [ ] **Step 1 : Ajouter le JSON-LD Schema.org Person dans `app/layout.tsx`**

Ajouter ce bloc dans le `<head>` via le composant `<script>` de Next.js :

```tsx
// Dans app/layout.tsx, à l'intérieur du <html> avant Navbar :

const personSchema = {
  '@context': 'https://schema.org',
  '@type': 'Person',
  name: 'Steve William Azeumo',
  url: 'https://www.azeumo.com',
  jobTitle: 'Consultant en Intelligence Économique',
  email: 'contact@azeumo.com',
  telephone: '+237674463867',
  address: {
    '@type': 'PostalAddress',
    addressLocality: 'Yaoundé',
    addressCountry: 'CM',
  },
  sameAs: [
    'https://www.linkedin.com/in/azeumo/',
    'https://twitter.com/loftyazeumo',
    'http://www.facebook.com/loftyazeumo',
  ],
}

// Ajouter dans le <body> (avant Navbar) :
<script
  type="application/ld+json"
  dangerouslySetInnerHTML={{ __html: JSON.stringify(personSchema) }}
/>
```

Full updated `app/layout.tsx` body:

```tsx
<body>
  <script
    type="application/ld+json"
    dangerouslySetInnerHTML={{ __html: JSON.stringify(personSchema) }}
  />
  <Navbar />
  <main className="pt-16">{children}</main>
  <Footer />
</body>
```

- [ ] **Step 2 : Vérifier avec le Rich Results Test**

```bash
npm run build && npx serve out
# Ouvrir https://search.google.com/test/rich-results et tester http://localhost:3000
```

Expected: Schema.org `Person` détecté sans erreur.

- [ ] **Step 3 : Commit**

```bash
git add app/layout.tsx
git commit -m "feat: add Schema.org Person JSON-LD for SEO"
```

---

## Task 14 : Export statique et vérification Lighthouse

**Files:**
- Modify: `next.config.mjs` (déjà configuré avec `output: 'export'`)

- [ ] **Step 1 : Build statique**

```bash
npm run build
```

Expected: dossier `out/` généré avec les fichiers HTML statiques. Aucune erreur de build.

- [ ] **Step 2 : Tester le build localement**

```bash
npx serve out -p 4000
```

Expected: site accessible sur `http://localhost:4000`, toutes les pages navigables.

- [ ] **Step 3 : Audit Lighthouse**

```bash
npx lighthouse http://localhost:4000 --output=html --output-path=lighthouse-report.html --chrome-flags="--headless"
```

Expected: Performance > 90, SEO > 95, Accessibilité > 85, Best Practices > 90.

Si le score Performance est < 90, vérifier :
- Les images ont `width` et `height` explicites
- Pas de JS inutile chargé côté client

- [ ] **Step 4 : Commit final**

```bash
git add .
git commit -m "feat: verified static export, Lighthouse scores > 90"
```

---

## Checklist de couverture du brief

| Exigence brief | Tâche | Statut |
|---|---|---|
| Page Home avec Hero + CTA | Task 5 | ✅ |
| À propos (bio + biblio + diplômes) | Task 6 | ✅ |
| 5 services avec CTA "Commandez" | Task 7 | ✅ |
| Page Méthode (Conseil/Formation/Intervention) | Task 8 | ✅ |
| Blog / Articles | Task 9 | ✅ |
| Page Média (vidéos, interviews, réseaux) | Task 10 | ✅ |
| Formulaire de contact + WhatsApp | Task 11 | ✅ |
| Mentions légales | Task 12 | ✅ |
| SEO (meta, Open Graph, Schema.org Person) | Tasks 1+13 | ✅ |
| Responsive mobile-first | Tasks 4+5 | ✅ |
| Lighthouse > 90 | Task 14 | ✅ |
| Couleurs navy/gold, typo Inter/Montserrat | Task 1 | ✅ |
| Déployable OVH/Infomaniak (export statique) | Task 14 | ✅ |
| Analytics Matomo | Non inclus — à ajouter en option post-deploy |
