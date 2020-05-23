<?php 
$hDebut = [];
$hFin = [];
$action = NULL;
$i = 0;
$j = 0;

echo "\nVeuillez rentrer les heures d'ouverture et de fermeture du magasin:\n";
// boucle de demande des créneaux d'ouverture
while($action !== 'fin')
{
    if ($j === 0)
    {
        $action = readline("Veuillez rentrer une heure d'ouverture:\n");
        if($action !=='fin')
        {
            $hDebut[$i] = (int)$action;
            $j++;
        }
    }
    else if ($j === 1)
    {
        $action = readline("Veuillez rentrer une heure de fermeture:\n");

        if($action <= $hDebut[$i])
        {
            echo "Erreur l'heure de fermeture doit etre supérieur à l'heure d'ouverture\n";
        }

        else if($action !=='fin')
        {
            $hFin[$i] = (int)$action;
            $i++;
            $j++;
            
        }
    }
    else if ($j === 2)
    {
        $action = readline("Voulez-vous ajouter une autres plages d'ouverture ? Taper \"oui\" ou \"fin\"\n");
        if($action ==="oui") $j = 0;
    }

    

}
//controle du tableau des créneaux
echo "\nHeures d'ouverture du magasin\n";
for ($h = 0 ; $h < $i; $h ++)
{
    echo $hDebut[$h] . " Heures à ". $hFin[$h] ." Heures \n";
}



// controle si le magasin est ouvert
$action = NULL;
while($action !== 'fin')
{
    $action = readline("\nVeuiller taper une heure pour savoir si le magasin est ouvert ou taper fin\n");
    if($action !=='fin')
    {
        $result = 0;
        for ($h = 0 ; $h < $i; $h ++)
        {
            if((int)$action >= $hDebut[$h] && (int)$action <=$hFin[$h])
            {
                $result = 1;
            }
        }
        if($result === 1) echo "\nMagasin Ouvert\n";

        else echo "\nMagasin Fermé\n";
    }

}
?>