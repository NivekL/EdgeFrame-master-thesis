Buggar att vara medveten om som jag inte lyckades hitta en lösning för:

När man dragit in ett text block, trycker spara och laddar om sidan så kommer den få en blå bakgrund texten kommer även hoppa in lite grann
men man kan förstora och förminska blocket för att hålla texten innanför.

om du även har ett vanligt block i canvas efter sidomladdning så kommer det se ut som att man kan skriva i blocket men det kan man inte

anledningen till denna bugg är att jag bara har en div som har css klassen för både vanliga blocket o text blocket.
Dessutom har den här enda diven contenteditable="true", därför ser det ut som att även de vanliga blocken går att skriva i

när man ska redigera text i text blocken, måste man använda piltangenterna för att röra sig fram o bak annars drar man bara runt blocket.

Det verkar även vara whitespace gömt i textblocken (text cursorn försvinner när man går till slutet av den text man har) 
om man raderar whitespace:en så går det inte längre att resize:a blocket, jag vet inte varför det händer.

Om man drar ett block direkt till pappers korgen utan att släppa den i canvasen först försvinner original blocket men den kommer tillbaka
efter sidomladdning

NÄR DET GÄLLER REGISTRERING!!

Om du använder din gmail måste du innan du försöker regga en användare surfa in dig här

https://myaccount.google.com/lesssecureapps  - om du inte har den på "ON" så måste du göra det 
annars skickas inte ett mail när man försöker skapa en användare

Om inte den länken fungerar gå hit 

https://support.google.com/accounts/answer/6010255?hl=en - tryck på länken  "Less secure apps section"

Du behöver även installera PHP-mailer om du inte redan har den, jag har länk till installations guide i dokumentationen

Du kan även gå in i class.user.php filen, scrolla hela vägen ner och ändra mina mail uppgifter till dina egna
