SELECT etage_salle AS etage, nbr_siege AS sieges
FROM salle
GROUP BY etage
ORDER BY sieges DESC;