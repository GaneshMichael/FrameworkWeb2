# Framework voor een TCG-Game

### inhoudsopgave
1. [Inleiding](#inleiding)
2. [De opdracht](#de-opdracht)
3. [Accounts](#accounts)
4. [Installatie](#installatie)
5. [Gebruik](#gebruik)

## Inleiding <a name="inleiding"></a>
Een simpele framework voor een trading card game collection applicatie. De applicatie is gemaakt in PHP zonder externe libraries.

## De opdracht <a name="de-opdracht"></a>
De opdracht is om een simpele framework te maken voor een trading card game collection applicatie. De applicatie moet de volgende functionaliteiten bevatten:
- Een gebruiker moet een account kunnen aanmaken
- Een gebruiker moet kunnen inloggen
- Premium gebruikers moeten een extra functionaliteit hebben, zoals:
    - Een deck kunnen bouwen
- Beheerders moeten rechten hebben zoals:
    - Gebruikers kunnen blokkeren
    - Kaarten kunnen toevoegen
    - Kaarten kunnen verwijderen
    - Kaarten kunnen aanpassen

## Accounts <a name="accounts"></a>
Er zijn drie soorten accounts:
- gratis Gebruiker
- premium Gebruiker
- Beheerder

## Installatie <a name="installatie"></a>

### Composer install/update
- Zorg ervoor dat je composer install gebruikt om de benodigde vendor map aan te maken
- Composer install of  Composer update

### Runnen van de applicatie
- Gebruik php -S localhost:8080 in de terminal in de root
```bash
- php -S localhost:8080
```

## Test accounts <a name="gebruik"></a>
| Email               | Wachtwoord   | Role         |
|---------------------|--------------|--------------|
| test@test.nl        | testtest     | Free user    |
| premium@premium.com | premium!     | Premium user |
| beheer@beheer.nl    | beheerbeheer | Beheerder    |