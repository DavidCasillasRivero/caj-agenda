# caj-agenda
Format the Colectivo Asturiano de Jazz agenda

Simple PHP utility to format the Colectivo Asturiano de Jazz agenda from a plain text file to HTML with the format used in its Wordpress site.

To execute the script run the following commad where the Title text always have the format 'Month YYYY', for example 'Marzo 2020'.

`> php agenda.php 'Title'`

The script reads from a local file agenda.txt and writes out to agendaOut.txt The input format is very strict. Each gig has a title line, a info line and some musician lines. Each gig is separated from the next with a blank line. Here is am example:

```
My great band
Viernes 1, 22:30 Café Bar Blue Note, Gijón
Pepe Arias: piano
Alejandro García: contrabajo
Laura Toca: batería

Willy Wendt Group
Viernes 1, 22:30 Festival Internacional de Jazz Quintueles
Jorge Feito: piano
Felix Pizarro: saxofón
Fernando Díaz: batería
```

Copy the contents of the output file `agendaOut.php` into the HTML content of the Agenda page in the wordpress site. Do not copy into the Visual editor, use the HTML.
