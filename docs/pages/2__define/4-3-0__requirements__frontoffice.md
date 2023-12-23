---
layout   : default
permalink: define/requirements/frontoffice/
# Custom Page Variables
# ─────────────────────
title: Frontoffice
---

# Functional Requirements

-----------------------

*de extra's staan in het cursief.*

### Rollen
* Een niet-aangemelde gebruiker is een bezoeker.
* Een aangemelde gebruiker is een klant.
* *Een aangemelde gebruiker kan beheerder zijn.*
* *Een aangemelde gebruiker kan hoofdbeheerder zijn.*

### Registratie van klanten
* Een bezoeker kan zich registreren als klant.
* De klant krijgt een activatie-e-mail met code.
* De klant de account activeren.
* *In geval van error wordt de klant op de hoogte gebracht en als kan met de oplossing.*

### Authenticatie van klanten
* De bezoeker die klant is kan zich aanmelden.
* Een bezoeker die geen klant is kan zich niet aanmelden.
* De aangemelde klant kan zich afmelden.
* *In geval van error wordt de klant op de hoogte gebracht en als kan met de oplossing.*
* Een bezoeker kan een e-mailadres opgeven voor een wachtwoordreset.

### Beheer van klanten
* De klant kan de eigen gegevens wijzigen (update).
* *De klant kan de eigen gegevens opnieuw na een sperperiode wijzigen (update).*
* De klant kan zich deactiveren (soft delete).
* De klant kan zich na deactivatie pas na een sperperiode opnieuw activeren ().
* De klant kan zich verwijderen (hard delete), maar enkel de persoonlijke gegevens worden permanent gewist.

### Beheer van producten/diensten
* De klant kan een eigen product/dienst toevoegen (create).
* De klant kan een eigen product/dienst publiceren (update: publish).
* De klant kan een eigen product/dienst intrekken (update: unpublish).
* De klant kan een eigen product/dienst wijzigen (update: unpublish) tot vlak voor de veilingperiode.
* De klant kan foto’s uploaden en koppelen aan een eigen product/dienst.
* De klant kan bestaande categorieën en bestaande subcategorieën koppelen aan een eigen product/dienst.
* De klant kan een eigen product/dienst hoger in de ranking laten plaatsen.

### Veilen van producten/diensten
* *Op de frontpage ziet de bezoeker de producten/diensten waarvan de veilingperiode bijna op is.*
* De klant kan de veilingperiode voor een eigen product/dienst instellen tot vlak voor de veilingperiode.
* De klant kan de veilingperiode voor een eigen product/dienst wijzigen tot vlak voor de veilingperiode.
* De klant kan een minimumprijs (Eng.: reserve price) instellen voor een eigen product/dienst.
* De klant kan de afstand van de eigen locatie tot locatie van het/de product/dienst aflezen.
* De klant (koper) kan een bod uitbrengen op het/de product/dienst van een andere klant (verkoper) tijdens de veilingperiode van dat/die product/dienst.
* De bezoeker kan een aftelklok van de veilingperiode aflezen.
* De gebruiker kan de kenmerken van een product/dienst aflezen.
* De gebruiker kan de categorie(ën) en subcategorie(ën) van een product/dienst aflezen.
* *De klant ontvangt een notificatie als zijn veiling over is.*
* *De klant ontvangt een notificatie als hij een van zijn bied over is.*
* *De klant kan veilingen delen via social media.*

### Starten en stoppen van veilingen
* Het systeem systeem start een veiling autonoom.
* Het systeem systeem stopt een veiling autonoom.
* Het systeem synchroniseert tijd tussen back- en frontend.

### Sorteren van producten/diensten
* Een gebruiker kan de lijst van producten/diensten oplopend alfabetisch sorteren op kenmerken.
* Een gebruiker kan de lijst van producten/diensten aflopend alfabetisch sorteren op kenmerken.
* Een gebruiker kan de lijst van producten/diensten oplopend sorteren op prijs.
* Een gebruiker kan de lijst van producten/diensten aflopend sorteren op prijs.
* *Een gebruiker kan de lijst van producten/diensten oplopend sorteren op vertrouw/service sterren*.
* *Een gebruiker kan de lijst van producten/diensten aflopend sorteren op vertrouw/service sterren*.
* *Een gebruiker kan de lijst van producten/diensten oplopend sorteren op datum/tijd*.
* *Een gebruiker kan de lijst van producten/diensten aflopend sorteren op datum/tijd*.

### Filteren van producten/diensten
* Een gebruiker kan de lijst van producten/diensten filteren op kenmerken.
* De klant (koper) kan de lijst van producten/diensten filteren op locatieafstand.

### Communicatie
* *De klanten kunnen berichten sturen naar elkaar.*
* *In geval van een waarschuwing, gegeven door een (hoofd)beheerder zal de klant een notificatie ontvangen.*
* *De klant kan een klacht indienen.*
* *De klant kan reviews achterlaten.*
* *De klant kan na een aankoop de verkoper een service/vertrouw ster geven.*
* *De klant kan op een page de instructies raadplegen in verband met het gebruik.*
* *De klant kan op enkele pages het bedrijf leren kennen.*

### Metrics
* De klant (verkoper) kan statistieken over het/de product/dienst zien.
* *De klant kan statistieken zien over zijn bieden.*
* *De klant kan statistieken zien over zijn veilingen.*

### Juridische informatie
* De app toont de nodige juridische informatie (disclaimer, cookiepolicy, privacy, GDPR).

Non-Functional Requirements
---------------------------
### Beveiligingseisen
* De app is afgeschermd voor niet-bevoegden.
* De app voldoet aan de normale eisen voor beveiliging.

### Technische Eisen
* Angular 5 of hoger
* Node.js 8 of hoger
* Yarn

### UX-eisen
* De app is gebruiksvriendelijk.
* De app is geoptimaliseerd om vlot te werken.
* De app stimuleert customer engagement.
* De app stimuleert interactie tussen klanten.
* De app straalt professionele geloofwaardigheid uit.
* De IA en IxD van de app is logisch opgebouwd.
* De vormgeving van de app is esthetisch verantwoord.
* *De app gebruikt degelijkse en vertrouwelijke termen.*
* *De app is bruikbaar bij verschillende resoluties.*

