# Grundschulung Laravel
## Aufgaben
1. Erstelle eine simple ToDo App. Die App soll es ermöglichen eine einfache ToDo-Liste zu erstellen 
   und anzuzeigen. Eine Aufgabe besteht aus einem Text und einem Datum an welchem die Task erledigt wurde.
    - [x] erstelle eine Form in einem `todo.blade.php` view
    - [x] erstelle ein `Task` - Model
    - [x] erstelle eine entsprechende `Migration` für die Daten des `Task`-Models
    - [x] erstelle eine Sqlite Datei und richte das verwenden einer sqlite-Datenbank ein
        + `touch database/database.sqlite`
        + change .env DB_CONNECTION=sqlite
        + comment out .env DB_DATABASE
    - [x] erstelle einen `TasksController` und implementiere die index/store Funktionalität
    - [x] Erstelle die routes um...
        + den todo view anzuzeigen
        + den Request welcher über die todo-Form versendet wird an den `TasksController` weiterleiten
    - [x] Zeige erstellte Aufgaben in dem `todo`-view an
    - [ ] Ändere den `todo` - view so ab, dass dieser die Fehler der Validierung im `TasksController` anzeigt
    - [ ] Füge eine update Funktion hinzu, in der das `done_at` Feld gesetzt wird
        + die Anzeige der bestehenden Tasks abändern => Form zum updaten hinzufügen
        + route zum Updaten hinzufügen
        + `update` Funktion zum `TaskController` hinzufügen
        + Anzeige von erledigten Task hinzufügen
    
    