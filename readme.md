# Grundschulung Laravel
## Aufgaben
1. Erstelle eine simple ToDo App. Die App soll es ermöglichen eine einfache ToDo-Liste zu erstellen 
   und anzuzeigen. Eine Aufgabe besteht aus einem Text und einem Datum an welchem die Task erledigt wurde.
    - [ ] erstelle eine Form in einem `todo.blade.php` view
    - [ ] erstelle ein `Task` - Model
    - [ ] erstelle eine entsprechende `Migration` für die Daten des `Task`-Models
    - [ ] erstelle eine Sqlite Datei und richte das verwenden einer sqlite-Datenbank ein
        + `touch database/database.sqlite`
        + change .env DB_CONNECTION=sqlite
        + comment out .env DB_DATABASE
    - [ ] erstelle einen `TasksController` und implementiere die index/store Funktionalität
    - [ ] Erstelle die routes um...
        + den todo view anzuzeigen
        + den Request welcher über die todo-Form versendet wird an den `TasksController` weiterleiten
    - [ ] Zeige erstellte Aufgaben in dem `todo`-view an
    - [ ] Ändere den `todo` - view so ab, dass dieser die Fehler der Validierung im `TasksController` anzeigt
    - [ ] Füge eine update Funktion hinzu, in der das `done_at` Feld gesetzt wird
        + die Anzeige der bestehenden Tasks abändern => Form zum updaten hinzufügen
        + route zum Updaten hinzufügen
        + `update` Funktion zum `TaskController` hinzufügen
        + Anzeige von erledigten Task hinzufügen
        
---
    
2. Füge der ToDo-App eine User Authentifizierung hinzu und füge die Tasks dem Autor hinzu.
    - [ ] Erstelle eine User-Authentifizierung
    - [ ] Erstelle eine Relation zwischen `Task` und `User`
    - [ ] Ändere die zuvor erstellten Routes, sodass nur noch authentifizierte User zugriff haben
    - [ ] Ändere den `TasksController`, sodass ein erstellte `Task` einem User hinzugefügt wird
    - [ ] Ändere den `todo` - view ab, sodass der Ersteller der Task angezeigt wird
    - [ ] Füge eine weitere Relation zwischen `Task` und `User` hinzu, die den User angibt welcher die Task erledigt
    
---
    
3. Ergänze die ToDo-App mit Vuejs um die Forms dynamisch zu gestalten
    - [ ] erweitere den aktuellen `todo`-view um das `app`-layout
    - [ ] ersetzte die update form durch eine Vue-`Task`-Component
    - [ ] nutze die `api`-route und füge eine Task-Update route hinzu
    - [ ] füge der `api`-route eine Middleware Group hinzu
        + Hinweis: zum authentifizieren über die API wird nach einem `api_token` im request geschaut
          und der `User` anhand des tokens gesucht.
    - [ ] ersetzte das Formular zum erstellen einer ToDo mit einer Vue-Componente
    - [ ] ersetzte die Auflistung der Erledigten ToDos durch eine Vue-Componente
    - [ ] erstelle einen Event-Bus welcher die Kommunikation zwischen den verschiedenen Komponenten ermöglicht
        + erstelle eine `event.js` Datei mit den Event-Bus Funktionen => füge diese einer `window.Event` variable hinzu
        + Feuer ein `todo-created` Event nach dem erstellen eines Events und "höre" auf das Event in der `TaskComponent`
          um daraufhin die Task zu den bestehenden hinzuzufügen
        + Feuer ein `todo-done` Event wenn eine Aufgabe in der ToDo Liste erledigt wird
        + reagiere auf das `todo-done` Event und füge die erhaltene Task den `tasks-done` hinzu
        
---

4. Im 4. Part erweitern wir die ToDo-App um eine Suchfunktion
    - [ ] Einrichtung des [`tamayo/laravel-scout-elastic`](https://github.com/ErickTamayo/laravel-scout-elastic) packages
    - [ ] Indexierung der vorhandenen Daten via `scout:import`
    - [ ] Vue-`SearchComponent` erstellen welche über die API sucht
        
## Lösungen
Lösungen können hier nachgeschaut werden [#43c50e20db3db3935b4a6e2bad7b9c63](https://gist.github.com/Naoray/43c50e20db3db3935b4a6e2bad7b9c63)
