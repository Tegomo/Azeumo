# Azeumo — Site personnel de Steve William Azeumo

Site Laravel 11 + Vue 3 + Inertia.js, bilingue FR/EN, avec backend admin style WordPress.

---

## Stack technique

| Couche | Technologie |
|--------|-------------|
| Backend | Laravel 11 (PHP 8.3) |
| Frontend | Vue 3 + Inertia.js + Vite |
| CSS | Tailwind CSS v3 |
| Base de données | MySQL 8 |
| Serveur web | Nginx (dans le conteneur) |
| Conteneur | Docker + Docker Compose |
| Reverse proxy | Traefik (géré par Dokploy) |
| Éditeur riche | CKEditor 5 v37.1.0 (CDN) |

---

## Prérequis

- Docker & Docker Compose installés
- Traefik configuré sur le réseau `dokploy-network`
- Base de données MySQL accessible (hôte, port, identifiants)
- Domaine DNS pointant vers le serveur

---

## Déploiement initial

### 1. Cloner le dépôt

```bash
git clone https://github.com/<user>/azeumo.git
cd azeumo
```

### 2. Variables d'environnement

Les variables sont définies directement dans `docker-compose.yml` (section `environment`).
Adapter les valeurs suivantes :

```yaml
APP_KEY: base64:<générer avec la commande ci-dessous>
APP_URL: https://votre-domaine.com
DB_HOST: <ip-du-serveur-mysql>
DB_PORT: 3306
DB_DATABASE: azeumo
DB_USERNAME: azeumo
DB_PASSWORD: <mot-de-passe>
SESSION_DOMAIN: votre-domaine.com
```

Générer une APP_KEY :
```bash
docker run --rm php:8.3-cli php -r "echo 'base64:'.base64_encode(random_bytes(32)).PHP_EOL;"
```

### 3. Construire et démarrer

```bash
docker compose build
docker compose up -d
```

### 4. Initialiser la base de données

```bash
docker exec azeumo-app php artisan migrate --force
```

### 5. Créer le compte administrateur

```bash
docker exec -it azeumo-app php artisan tinker
```

```php
App\Models\User::create([
    'name' => 'Admin',
    'email' => 'admin@exemple.com',
    'password' => bcrypt('mot-de-passe-securise'),
]);
```

---

## Mise à jour (redéploiement)

```bash
git pull origin main
docker compose build
docker compose up -d
docker exec azeumo-app php artisan migrate --force
docker exec azeumo-app php artisan config:clear
docker exec azeumo-app php artisan view:clear
```

> Les assets frontend (JS/CSS) sont compilés pendant le `docker build` via `npm run build`. Aucune action supplémentaire n'est requise.

---

## Structure du projet

```
azeumo/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Backend admin (articles, services, messages)
│   │   └── ...             # Contrôleurs frontend
│   └── Models/             # Post, Service, User...
├── docker/
│   ├── nginx.conf          # Config Nginx (client_max_body_size 20M)
│   ├── php-uploads.ini     # Limites PHP upload (20M)
│   ├── php-fpm.conf
│   ├── supervisord.conf
│   └── entrypoint.sh
├── resources/
│   ├── js/
│   │   ├── Pages/          # Pages Vue (Inertia)
│   │   └── Components/     # Composants réutilisables
│   └── views/
│       └── admin/          # Vues Blade backend admin
├── public/images/          # Images statiques (profil, blog, slider...)
├── Dockerfile
└── docker-compose.yml
```

---

## Accès admin

URL : `https://votre-domaine.com/admin`

Fonctionnalités :
- **Articles** : création, modification, suppression, image mise en avant, CKEditor bilingue FR/EN
- **Services** : gestion des services affichés sur le site
- **Messages** : consultation des messages du formulaire de contact

---

## Limites de fichiers configurées

| Paramètre | Valeur |
|-----------|--------|
| PHP `upload_max_filesize` | 20 MB |
| PHP `post_max_size` | 25 MB |
| Nginx `client_max_body_size` | 20 MB |
| Traefik buffer | 20 MB |

---

## Images statiques

Les images sont servies depuis `public/images/` :

| Dossier | Usage |
|---------|-------|
| `profile/` | Portrait page À propos et Hero |
| `blog/` | Images mises en avant des articles |
| `slider/` | Miniatures YouTube du slider hero |
| `pages/` | Images de fond (contact, à propos) |
| `services/` | Images des services |
| `azeumo/` | Photos personnelles |

---

## Réseau Docker

Le conteneur doit être sur le réseau externe Traefik `dokploy-network` :

```yaml
networks:
  dokploy-network:
    external: true
```

---

## Dépannage

**Erreur 500**
```bash
docker exec azeumo-app tail -100 /var/www/html/storage/logs/laravel.log
```

**Problème de permissions sur storage/**
```bash
docker exec azeumo-app chown -R www-data:www-data /var/www/html/storage
docker exec azeumo-app chmod -R 775 /var/www/html/storage
```

**Vider les caches Laravel**
```bash
docker exec azeumo-app php artisan config:clear
docker exec azeumo-app php artisan view:clear
docker exec azeumo-app php artisan cache:clear
```

**Upload d'images impossible (500)**
```bash
docker exec azeumo-app chown -R www-data:www-data /var/www/html/public/images
docker exec azeumo-app chmod -R 775 /var/www/html/public/images
```
