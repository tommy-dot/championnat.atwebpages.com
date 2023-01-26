function admin()
{
	var nom = document.getElementById("nom_joueur").value;
	var licence = document.getElementById("numero_licence").value;
	
	if(nom.length <= 25 & nom.length >= 1)
	{
		if( licence.length == 8)
		{
		alert ("Nom saisi : \n" + nom + "\n"
		+ "Numero licence saisi : \n" + licence + "\n");
		}
		else
		{
		alert ("Nom saisi : \n" + nom + "\n"
		+ "Numero licence saisi incorrecte  \n" + licence + "\n");
		}
	}
	else
	{
		if(licence.length == 8)
		{
		alert ("Nom saisi incorrecte  \n" + nom + "\n"
		+ "Numero licence saisi : \n" + licence + "\n");						
		}
		else
		{
		alert ("Nom saisi incorrecte  \n" + nom + "\n"
		+ "Numero licence saisi incorrecte  \n" + licence + "\n");
		}
	}
}