#!/usr/bin/php
<?php
	while(1)
	{
		echo "Entrez un nombre: ";
		$entry = fgets(STDIN);
		$entry = trim($entry);
		if (is_numeric($entry))
		{
			if ($entry % 2 == 0)
				echo "Le chiffre $entry est Pair\n";
			else
				echo "Le chiffre $entry est Impair\n";
		}
		else
		{
			if (feof(STDIN))
			{
				echo "\n";
				exit();
			}
			else
				echo "'$entry' n'est pas un chiffre\n";
		}
	}
?>