---
layout   : default
permalink: define/requirements/api/
# Custom Page Variables
# ─────────────────────
title: API

---

# Functional Requirements

-----------------------

De functionele eisen zijn volledig afhankelijk van de noden van de frontoffice, en indien nodig ook de frontend van de backoffice.

# Non-functional Requirements

---------------------------

### Beveiligingseisen
*  De API is afgeschermd voor niet-bevoegden.
*  De API voldoet aan de normale eisen voor beveiliging.

### Technische Eisen
*  MySQL 5.7 of hoger
*  PHP 7.2 of hoger
    *  PHP 7.0 New Features
    *  PHP 7.1 New Features
    *  PHP 7.2 New Features
*  Composer
*  Laravel 5.6 of hoger
    *  Artisan Console
    *  Testen met PHPUnit via HTTP Tests
    *  MVC-architectuur voor RESTful API, beveiligd met Basic Auththentication
        *  Models met Eloquent ORM
            *  Migrations
            *  Seeding met Faker
        *  Views bestaan uit JSON
        *  Controllers
            *  Routing met Resource Controllers
    *  Carbon