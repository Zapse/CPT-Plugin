SANTERINTESTI-PLUGIN

Tämän pluginin avulla käyttäjä voi luoda/muokata ja poistaa custom post typejä. 
Käyttäjä löytää pluginin admin-panelista, jossa hän voi hallinnoida posteja.

Pluginissa käytetään Composer työkalua riippuvuuksien hallintaan. lisätietoja: https://getcomposer.org/


Kansiot ja niiden käyttötarkoitukset: 


Assets -> Pitää sisällään javascriptin ja css tyylitiedoston.

inc -> init.php Pitää huolen luokkien varastoinnista.

index -> "vaaditaan" joka plugarissa.

santeritesti-plugin -> Pluginin tiedot. Alku asetukset, composerin liittäminen ja tarvittavat "hookit" aktivoinnille ja deaktivoinnille

uninstall -> Tiedosto aktivoituu jos käyttäjä päättää poistaa pluginin ja pitää huolen, että database tyhjennetään plugarin avulla luoduista tiedostoista.



INC / API KANSIO:

inc/api/SettingsApi -> Määritellään admin-sivun back-end puoli, jossa mm. pidetään huoli, että tarvittavat kentät luodaan, asetetaan ja rekisteröidään.

inc/api/Callbacks/AdminCallbacks -> Pitää huolen admin-sivun "takaisinpyynnöistä" aka. tiedonsiirrosta. Tänne on myös mahdollista tallentaa placeholder tekstejä, jotka esitetään admin sivulla.

inc/api/Callbacks/CptCallbacks -> Hoitaa custom-post-typen tiedonsiirron vastaanottamisen. (Luominen, poistaminen ja muokkaus)



INC / BASE KANSIO:

inc/Base/Activate -> Plugarin aktivointi tiedosto mikä ajaa uudet säännöt, kun plugari aktivoidaan.

inc/Base/BaseController -> Tallennetaan plugarissa käytettäviä polkuja järkevämoään muotoon.

inc/Base/CustomPostTypeController -> Luodaan adminpanelin dashboardille oma Post ryhmä, jossa määritellään mitä tietoja käyttäjältä kysytään, kun cpt:tä luodaan. Tiedosto pitää sisällään CPT:n rakenteen luomisen, varastoinnin, rekisteröinnin ja lähettämisen. 

inc/Base/Deactivate -> Plugarin deaktivointi tiedosto mikä ajaa uudet säännöt, kun plugari deaktivoidaan.

inc/Base/Enqueue -> Huolehditaan Assets kansion sisällä olevien scriptin ja tyylitiedoston aktivoinnin / jonottamisen.

inc/Base/SettingsLinks -> Määritellään linkki, jota pitkin käyttäjä pääsee asetuksiin adminpanelin kautta nappia painamalla.



INC / PAGES KANSIO:

inc/Pages/Admin -> Luodaan adminpanelille Santeri niminen linkki. Täältä käyttäjä pääsee hallinnoimaan custom post typejä. Myös luodaan näkymä jossa on mm. syöttökenttiä joissa textholderit. (näitä tietoja ei lähetetä taikka tallenneta)



TEAMPLATES KANSIO: 

teamplates/admin -> Luodaan UI admin osioon.

teamplates/cpt -> Luodaan UI Custom-post-type osioon.



VENDOR KANSIO:

Vendor kansiossa olevat tiedostot ovat composerin luomia, joita työkalu tarvitsee toimiakseen. 

