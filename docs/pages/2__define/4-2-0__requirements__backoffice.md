---
layout   : default
permalink: define/requirements/backoffice/
# Custom Page Variables
# ─────────────────────
title: Backoffice

---

# Functional Requirements

-----------------------

*de extra's staan in het cursief.*

### Rollen:
* Een niet-aangemelde gebruiker is een bezoeker.
* Een aangemelde gebruiker kan hoofdbeheerder zijn.
* Een aangemelde gebruiker kan beheerder zijn.
* *Een aangemelde gebruiker kan klant zijn.*

### Authenticatie van beheerders:
* De bezoeker die (hoofd)beheerder is kan zich aanmelden.
* De bezoeker die geen (hoofd)beheerder is kan zich niet aanmelden.
* *De bezoeker die geen (hoofd)beheerder is heeft geen toegang tot backoffice.*
* De aangemelde (hoofd)beheerder kan zich afmelden.

### Beheer van beheerders:
* De eerste beheerder is automatisch een hoofdbeheerder.
* De hoofdbeheerder kan een nieuwe beheerder toevoegen (create).
* De hoofdbeheerder kan een beheerder activeren (update).
* De hoofdbeheerder kan een beheerder deactiveren (soft delete).
* De hoofdbeheerder kan een beheerder verwijderen (hard delete).
* De hoofdbeheerder kan de gegevens van een beheerder aanpassen (update).
* De hoofdbeheerder kan een beheerder een hoofdbeheerder maken (update).
* De hoofdbeheerder kan een hoofdbeheerder een beheerder maken (update).
* De (hoofd)beheerder kan de eigen gegevens wijzigen (update).

### Beheer van klanten:
* De (hoofd)beheerder kan een nieuwe klant toevoegen (create).
* De (hoofd)beheerder kan een klant activeren (update).
* De (hoofd)beheerder kan een klant deactiveren (soft delete).
* *De hoofdbeheerder kan een klant een beheerder maken of omgekeerd (update).*
* *De (hoofd)beheerder kan een klant tijdelijk/voor een bepaalde duur deactiveren (soft delete).*
* De (hoofd)beheerder kan de gegevens van een klant wijzigen (update).

### Beheer van product-/dienstcategorieën:
* De hoofdbeheerder kan een nieuw(e) categorie toevoegen (create).
* De hoofdbeheerder kan een categorie verwijderen (hard delete).
* De hoofdbeheerder kan de details van een categorie wijzigen (update).
* De (hoofd)beheerder kan een nieuw(e) subcategorie toevoegen (create).
* De (hoofd)beheerder kan een subcategorie verwijderen (hard delete).
* De (hoofd)beheerder kan de details van een subcategorie wijzigen (update).

### Beheer van producten/diensten:
* De (hoofd)beheerder kan een nieuw(e) product/dienst toevoegen (create).
* De (hoofd)beheerder kan een product/dienst verwijderen (soft delete).
* *De (hoofd)beheerder kan de status van een product/dienst wijzigen (update).*
* *De (hoofd)beheerder kan een product/dienst (tijdelijk) uit de veiling halen (update).*
* De (hoofd)beheerder kan de gegevens van een product/dienst wijzigen (update).

### Beheer van klachten en communicatie:
* *De beheerders ontvangen de klachten.*
* *De beheerders kan de klanten waarschuwingen geven.*
* *De beheerders kunnen deze klachten ook behandelen.*
* *De beheerders kunnen notes achterlaten voor elkaar.*
* *De (hoofd)beheerder kan ongepaste reviews verwijderen.*

### Metrics
* De (hoofd)beheerder kan gedetailleerde statistieken zien over klanten.
* De (hoofd)beheerder kan gedetailleerde statistieken zien over producten/diensten.
* *De (hoofd)beheerder kan gedetailleerde statistieken zien over (hoofd)beheerders.*
* *De hoofdbeheerder kan de activiteiten van een beheerder opvolgen.*
* *De beheerder kunnen de periode kiezen voor bepaalde statistieken.*
* *De beheerder kan alle orders raadplegen.*

Non-Functional Requirements
---------------------------
### Beveiligingseisen
* De app is afgeschermd voor niet-bevoegden.
* De app voldoet aan de normale eisen voor beveiliging.

### Technische Eisen
* Database
* MySQL 5.7 of hoger
* PHP 7.2 of hoger
    * PHP 7.0 New Features
    * PHP 7.1 New Features
    * PHP 7.2 New Features
* Composer
* Laravel 5.6 of hoger
* Artisan Console
* Testen met PHPUnit via:
    * HTTP Tests
    * Browser Tests
* MVC-architectuur
    * Models met Eloquent ORM
        * Migrations
        * Seeding met Faker
    * Views met Blade Templates
    * Controllers
        * Routing met Resource Controllers
* Carbon
* Node.js 8 of hoger
    * Yarn
    * Laravel Mix
    * Vue toepassen voor de frontend.

### Niet-verplicht, maar voor bonuspunten
* Bootstrap 4 of hoger; of iets anders na overleg met de docent.
* D3.js 4 of hoger voor de grafieken.
* Sass

### UX-eisen
* De app is gebruiksvriendelijk.
* De app is geoptimaliseerd om vlot te werken.
* De app straalt professionele geloofwaardigheid uit.
* De IA en IxD van de app is logisch opgebouwd.
* De vormgeving van de app is esthetisch verantwoord.
* *De app gebruikt duidelijke termen.*
