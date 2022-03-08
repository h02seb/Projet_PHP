import csv
BC_file = open('reverse.csv', 'r',encoding='utf-8')
BC_reader = csv.reader(BC_file)
next(BC_reader)
with open("reversed.csv","w",encoding='utf-8') as fich:
	thewriter=csv.writer(fich)
	for row in reversed(list(BC_reader)):
		thewriter.writerow([row[0],row[1],row[2],row[3]])
		
