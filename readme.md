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
    - [ ] Erstelle die routes um...
        + den todo view anzuzeigen
        + den Request welcher über die todo-Form versendet wird an den `TasksController` weiterleiten
    - [ ] Zeige erstellte Aufgaben in dem `todo`-view an
    
    