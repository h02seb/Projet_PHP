import urllib.request

lien="http://w3.erss.univ-tlse2.fr/membre/tanguy/offres/S"
for i in range(0,1000):
	url=lien+str(i)+".txt"
	try: 
		with urllib.request.urlopen(url) as html: 
			s = html.read().decode("ANSI")
		with open(str(i)+".txt","w",encoding='utf-8') as fich:
			fich.write(str(s))
	except:
		pass
 
