Buggar att vara medveten om som jag inte lyckades hitta en l�sning f�r:

N�r man dragit in ett text block, trycker spara och laddar om sidan s� kommer den f� en bl� bakgrund texten kommer �ven hoppa in lite grann
men man kan f�rstora och f�rminska blocket f�r att h�lla texten innanf�r.

om du �ven har ett vanligt block i canvas efter sidomladdning s� kommer det se ut som att man kan skriva i blocket men det kan man inte

anledningen till denna bugg �r att jag bara har en div som har css klassen f�r b�de vanliga blocket o text blocket.
Dessutom har den h�r enda diven contenteditable="true", d�rf�r ser det ut som att �ven de vanliga blocken g�r att skriva i

n�r man ska redigera text i text blocken, m�ste man anv�nda piltangenterna f�r att r�ra sig fram o bak annars drar man bara runt blocket.

Det verkar �ven vara whitespace g�mt i textblocken (text cursorn f�rsvinner n�r man g�r till slutet av den text man har) 
om man raderar whitespace:en s� g�r det inte l�ngre att resize:a blocket, jag vet inte varf�r det h�nder.

Om man drar ett block direkt till pappers korgen utan att sl�ppa den i canvasen f�rst f�rsvinner original blocket men den kommer tillbaka
efter sidomladdning

N�R DET G�LLER REGISTRERING!!

Om du anv�nder din gmail m�ste du innan du f�rs�ker regga en anv�ndare surfa in dig h�r

https://myaccount.google.com/lesssecureapps  - om du inte har den p� "ON" s� m�ste du g�ra det 
annars skickas inte ett mail n�r man f�rs�ker skapa en anv�ndare

Om inte den l�nken fungerar g� hit 

https://support.google.com/accounts/answer/6010255?hl=en - tryck p� l�nken  "Less secure apps section"

Du beh�ver �ven installera PHP-mailer om du inte redan har den, jag har l�nk till installations guide i dokumentationen

Du kan �ven g� in i class.user.php filen, scrolla hela v�gen ner och �ndra mina mail uppgifter till dina egna
