# Pt08
Aquesta practica es una prova basica de Laravel i com fer-lo servir.

Punts de la practica
- Crear un formulari i validar les dades
- Insertar les dades a la base de dades (fent servir Eloquent o DB)
- Llegir les dades de la base de dades
- Enviar correu a l'hora de rebre un formulari nou

Tots els punts anteriors s'han realitzat, pero, faltaria afegir un "seeder" per tenir dades inicials a la base de dades. Actualment aquest projecte no disposa de seed, per lo que al principi es buit.

# A tenir en compte
A l'hora d'enviar un correu, s'ha de configurar el correu de l'administrador en la variable d'entorn ```MAIL_ADMIN_ADDRESS```, del contrari, no s'enviara res.