#  Documentation Carto-stages 

##``Collecte de la liste LN``
La liste LN représente une grande source de diffusion des annonces liées au domaine du TAL. Dans le cadre de notre projet, nous nous sommes intéressées uniquement aux annonces de stages pour la construction de notre base de données.
D’abord, il faut savoir que la collecte de la liste LN s’est avérée un peu compliquée, car cette liste ne diffuse pas uniquement des stages, mais aussi des offres de CDD/CDI, des offres de thèses/post-doc, des participations aux colloques ou encore des publications de revues scientifiques. Les URLs des offres diffusées sur la liste LN sont composées d’un code qui ne nous permet pas de distinguer entre eux, ceux attribués aux stages et ceux attribués aux CDD, par exemple. Apriori, ils ont la même structure, comme dans l’exemple ci-dessous :

- https://groupes.renater.fr/sympa/arc/ln/2021-02/msg00011.html : URL d’un stage
- https://groupes.renater.fr/sympa/arc/ln/2021-02/msg00017.html : URL d’un CDD

Par ailleurs, il existe un autre site qui publie les offres de stages diffusées par la liste LN, c’est celui de l’université de Toulouse 2. D’ailleurs, ce site http://w3.erss.univ-tlse2.fr est le deuxième résultat qui apparaît dans une recherche Google après celui de www.atala.org, lorsqu’on saisit les mots-clés “offre liste ln”. Effectivement, nous pouvons retrouver d’autres types de contrats sur le site, tels qu’un CDD, mais nous avons pu distinguer parmi eux les offres qui nous intéressent pour l’élaboration de notre outil, c’est-à-dire des offres de stages. Nous avons donc utilisé l’URL suivante pour moissonner toutes les offres de stages diffusées par la liste LN via ce site : http://w3.erss.univ-tlse2.fr/membre/tanguy/offres/S. Nous pouvons ainsi constater que ‘S’ qui se trouve dans le lien est un code spécifique aux stages. Au contraire, le lien pour les offres des CDD se termine par ‘CD’ : http://w3.erss.univ-tlse2.fr/membre/tanguy/offres/CD.

##``Module urllib pour récupérer les données de la liste LN``
Pour récupérer les informations du site, nous avons importé le module urllib.request sous python, en lui donnant comme référence le lien suivant : http://w3.erss.univ-tlse2.fr/membre/tanguy/offres/S. Nous avons fait une boucle qui permet de récupérer tous les liens de (0,1000) : [url=lien+str(i)+".txt"]. C’est la raison pour laquelle
nous nous sommes retrouvées avec une grande quantité de données. Les résultats ont été récupérés sous format.txt. 
Le script python qui permet de collecter la liste LN se trouve dans le fichier “liste.py”.

##``Convertir les fichiers au format csv``
Pour pouvoir traiter les données collectées, nous avons converti les fichiers.txt en csv qui se trouve dans le fichier “merge.py”. Pour cela, nous avons utilisé la librairie pandas et csv pour
agencer les données dans les différentes colonnes : [thewriter.writerow([row[0],row[1],row[2],row[3]]) ] qui se trouve dans le fichier “convert.py”. Enfin, nous avons rencontré des difficultés générées par le séparateur du fichier.csv. Il a fallu faire un script pour modifier le séparateur, en utilisant également la librairie pandas : [df = pd.read_csv('sep;.csv',] [sep = ';',] qui se trouve dans le fichier “separateur.py”.

