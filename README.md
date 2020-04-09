PROJEKT SKAPA EN E-HANDEL PHP/API

PLANERING AV PROJEKTET SAMT MAPPSTRUKTUR

config/database_handler 
    - här ska databasen anslutas
    - sätta inställningar för databasen
    -det ska finnas ett error meddelande om anslutningen misslyckas

objects
    - här skapas och sparas klasser som kan hämtas i de olika endpointsen
    - klasserna innnehåller alla nödvändiga metoder och egenskaper för att kunna skapa funktioner i projektet.

V1/orderrows
    - Lägga till orderrad
    - Ta bort en orderrad
    - Uppdatera orderrad
    - Visa specifik orderrad
    - avsluta orderrad köp/checkout
   

V1/products
    - man ska kunna visa produkter
    - man ska kunna uppdatera produkter
    - sortera produkter
    

V1/users
    - man ska kunna registrera en användare
    - man ska se om användarens användarnamn/email redan är tagen
    - man ska kunna logga in

Frontend
    -> apitester.html används för att testa koden.

REGLER I PROJEKTET
    -Alla variabel/metod/objekt/variabler är namngivna så beskrivande som möjligt för att förenkla förståendet av koden. Här nedan är några av kodens regler av namngivning:
    -ID skrivs alltid med caps
    -Endpoints/metoder/variabler skrivs med camelCase
    - Variabler som används i samband med metoder är döpta $vartiabelnamn_IN eller $variabelnamn_param


SKAPA DATABAS

1. Gå till https://github.com/AnnaNordberg/api_project för att visa projektet
2. Klicka på länken "ecommerce.sql" för att ladda ner databasen


BUILT WITH Visual Studio Code GitHub phpMyAdmin

AUTHOR 
Anna Nordberg
