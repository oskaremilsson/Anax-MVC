Redovisning
====================================
 
Kmom01
------------------------------------
 
Ja det här var då ingenting lätt att sätta sig in i. Men jag känner ändå hopp inför framtiden eftersom det trots allt flöt på bra när jag väl började använda ramverket. Jag började med att läsa den långa berättelsen om ramverk en dag och lät det sjunka in och begrundas ordentligt och det verkar ha gett resultat. 

<br>
Jag använder mig utav BTHs utvecklingsmiljö då det är smidigare att slippa ladda upp separat till den servern också. Jag skriver mig kod i sublime 2 och har det fina tillägget som automatiskt pushar till server (omg live-hack, japp). 

<br>
Jag har programmerat ett tema till wordpress samt varit delaktig i studentkårens wordpress-tema där jag kodat vissa förbättringar. Tex så såg jag till att göra saker dynamiskt för att slippa administrativa uppgifter, mest för egen del då jag var den som uppdatera hemsidan. Mer än så har jag dock inte rört ramverk.

<br>
Jag känner dock att jag trots det förstår begreppen som används och förstår (oftast) texterna som skrivs. Det händer att jag hoppar lite i förväg och det måste jag bli bättre på att itne göra om jag ska klara av den här kursen då det är så pass mycket mer avancerat mot vad jag har gjort tidigare i webbprogrammering.

<br>
Min uppfattning om Anax-MVC hittils är: GULD! Det verkar riktigt riktigt grymt. Det ska bli riktigt spännande att se vad de andra kursmomenten har att bjuda på och framförallt projektet! Det var ett riktigt roligt proejkt i oophp-anax, ska bli kul att se vad man kan göra med det det här gedigna ramverket!

<br>
Det jag hade mest problem med var att förstå hur man skulle kalla på markdown-content-filerna samt snygga länkar. Snygga länkar var dock bara svårt eftersom jag hela tiden tänkte fel när jag testade. Det fungerade som det skulle hela tiden, men jag hade /me/ i addressen (...). Jag fick inte ehller menyn att använda snygga länkar när de väl fungerade trots att jag kallade på inställnigen. Det var efter mycket felsökande och läsning jag insåg att jag kallade på funktionen för att skapa menyn /innan/ jag gav url värdet clean, så återigrån - jag behöver bli lite mer noggrann!

<br>
Designen och namnet frankenstein grundas i att jag på IRC utbrast "it's alive!" när jag lyckades få igång routes för första gången. Därav frankenstein alltså, hoppas du gillar designen, det tog massor extratid i photoshop och jag gillar den. 

<br>
Citerar mos ur en (egentligen alla) guide(r) "nu kör vi"!

Kmom02
--------------------------------------
•	Hur känns det att jobba med Composer?

Det kändes bra, jag var beredd på massor med problem med det bara funkade med riktig magi. Men jag förstår inte grejen med att ha vendor-saken man ska kunna uppdatera om man ändå ska kopiera in och arbeta med egen kopia, man borde ju kunna merga en uppdatering smidigt med git.

<br>
•	Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?

Hittils har jag bara tetstat det paketet som ingick i uppgiften dvs kommentarerna. Smidigt och lätt att få igång koden och börja testa runt för att ändra själv.

<br>
•	Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt?

Jag lyckades tillslut förstå det mesta, dispacthes är fortfarande lite luddigt trots att jag läst tråden på forumet 15 gånger under dagen. Men det kommer väl ju mer man jobbar med det antar jag. Jag är väldigt mycket learn by try and error-typ.

<br>
•	Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?

Det som störde mig allra mest var att man fick använda sig utav form med enbart hidden values för att kunna radera en kommentar och få redirect att fungera som det var tänkt, här satt jag fast länge och väl innan jag fick förklarat att det var så man skulle göra. 

<br>
Övrigt om momentet:

Förövrigt så har det nog inte tagit så mycket tid för själva kodandet i detta moment, däremot har det gått åt ohyggligt mycket tid åt att klicka runt bland filer och förstå vad som sköter vad och hur saker skickas runt. Det är mycket rader att förstå och hänga med i vilket är lite knepigt.

<br>
Mitt absolut största problem var att förstå meningen ”Kommentarerna sparas i sessionen”. Det är ingen svår mening i sig, men jag tolkade det mer som ”det är så just nu” och tyckte det var ganska galet och var beredd på att fixa databas direkt för att fixa det. Jag hade föredragit ett förtydligande på att det är okej att kommentarerna även efter momentet sparas i sessionen. Ja, det är verkligen så otydligt, för det är ganska korkat att spara kommentarer i en session, right! :D

<br>
Det första problem jag hade var att förstå i vilka filer man skulle lägga till nya funktioner, jag hade inte förstått vad controllern gjorde i jämförelse med front-controllern. När jag förstod att routes fungerar automagiskt med funktioner i controllern blev man lite lycklig i själen, allt var så mykcet enklare än man trodde från början.

<br>
Men sedan kom man till detdär med att lyckas få med variabler som på något sätt ska kunna lösas med dispatcher, jag gör dock inte det i nuläget, jag löste ändra/radera genom att skicka med id till formuläret från controllern istället, det skickas senare till action-funktionerna genom hidden value. Jag tyckte den lösningen var ganska okej fin ändå.

<br>
Jag ville även passa på att göra extrauppgifterna för att känna mer på anax, började med att inte visa formuläret vid start, skapade en vy som länkar till en action-funktion som lägger till formulär-vyn. 

<br>
Sedan skulle jag då lösa gravatars, extremt mycket enklare än väntat faktiskt, bara en liten request till deras sida. Smidigt! Dock insåg jag snabbt att jag ville ha en egen standard-bild. Så lite sökningar gav mig nos om en parameter &404 till gravatar, så jag kollar efter 404 i gravatar-länkens header genom get_headers(). Detta ger möjlighet att välja att använda min standard-bild eller gravataren. 

<br>
Tre timmar senare: Insåg att jag totalt missat krav 5 precis innan inlämning, så nu används dispatcher överallt och jag förstår äntligen vad den gör! Smidigt som tusan, nästan magiskt. Jag gjorde så man ser alla kommentarer på sidorna, men klickar på ”kommentera”, man kommer då till comment/write-action som får reda på key och redirect från den fina formen som länken submittar.

<br>Jag visar även nuvarande kommentarer på sidan för att skriva en ifall man skulle vilja läsa vad den andre skrev osv. Vet inte om det var så extrauppgiften skulle lösas men så blev det och det är ganska fint trots allt. Kort sagt: dispatchers, keys och redirect var utan tvekan det knepigaste i kursmomentet men nu känns det lite bättre igen! 

<br>
Kommentarer finns på både me-sidan och redovisningssidan samt en egen kommentarssida, separata arrayer I session baserat på key osv.

