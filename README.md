### Laboratorul nr. 2: Cereri HTTP și șablonare în Laravel

Am dezvoltat o aplicație numită "To-Do App" pentru gestionarea sarcinilor, folosind conceptele fundamentale ale cererilor HTTP în Laravel și sistemul de șabloane Blade.

### Întrebări de verificare

1. **Ce este un controller de resurse în Laravel și ce rute generează?**

   - În Laravel, un controller de resurse este un tip specializat de controller care oferă o abordare standardizată pentru operațiile de tip CRUD. Acesta generează rute pentru fiecare dintre metodele: index, create, store, show, edit, update și destroy.

2. **Care sunt diferențele dintre definirea manuală a rutelor și utilizarea unui controller de resurse?**

   - Ambele metode au atât avantaje, cât și dezavantaje, iar alegerea metodei depinde de complexitatea aplicației și preferințele dezvoltatorului:
     - Definirea manuală este potrivită pentru cazurile în care anumite rute necesită funcționalități specifice, cum ar fi prefixe diferite sau URL-uri personalizate.
     - Utilizarea unui controller de resurse permite generarea automată a tuturor rutelor CRUD cu o structură și URL-uri standardizate.

3. **Ce beneficii aduc componentele anonime Blade?**

   - Componentele anonime Blade în Laravel contribuie la modularitate și reutilizare, separând logica de prezentare și îmbunătățind consistența interfeței. Utilizând `@props`, aceste componente devin personalizabile, reducând codul duplicat și facilitând întreținerea.

4. **Ce metode HTTP sunt utilizate pentru a realiza operațiile CRUD?**

   - `Create`: Utilizează metoda `POST` pentru a crea o nouă resursă pe server.
   - `Read`: Folosește metoda `GET` pentru a accesa o resursă existentă.
   - `Update`: Se folosesc metodele `PUT` sau `PATCH` pentru a modifica o resursă existentă.
   - `Delete`: Utilizează metoda `DELETE` pentru a elimina o resursă.
