SELECT nom, prenom, DATE(date_naissance) as 'date de naissance'
FROM fiche_personne
WHERE date_naissance LIKE '%1989%'
ORDER BY nom;