---
layout   : default
permalink: deploy/deployment-guide/backoffice/
# Custom Page Variables
# ─────────────────────
title: Backoffice
---

1. Maak een SQL database op je systeem.

2. Open de laravel folder en pas de database instelling in .env folder naar die van je database.

3. Navigeer naar je laravel folder (<code>cd laravel</code> <- afhankelijk van waar je bent).

4. run  <code>npm install</code> en <code>composer install</code>

5. run <code>php artisan migrate</code>

6. run <code>php artisan db:seed</code>

7. run <code>php artisan serve</code>

8. Je backoffice zal beschikbaar zijn op: 35.214.132.93

## Login gegevens zijn:

### ADMIN
* email: admin@aqualobby.com
* password: adminkoi

### Moderator
* email: moderator@aqualobby.com
* password: moderatorkoi

### Customer
* email: customer@aqualobby.com
* password: customerkoi


