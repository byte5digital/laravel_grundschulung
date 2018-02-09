# Grundschulung Laravel
## Aufgaben
1. Erstelle eine simple ToDo App. Die App soll es ermöglichen eine einfache ToDo-Liste zu erstellen 
   und anzuzeigen. Eine Aufgabe besteht aus einem Text und einem Datum an welchem die Aufgabe erstellt wurde.
    1. erstelle eine Form in einem `todo.blade.php` view
    2. erstelle ein `Task` - Model
    3. erstelle eine entsprechende `Migration` für die Daten des `Task`-Models
    4. erstelle eine Sqlite Datei und richte das verwenden einer sqlite-Datenbank ein
    5. erstelle einen `TasksController` und implementiere die index/save Funktionalität
    6. Erstelle die routes um...
        + den todo view anzuzeigen
        + den Request welcher über die todo-Form versendet wird an den `TasksController` weiterleiten
    7. Zeige erstellte Aufgaben in dem `todo`-view an
    
    