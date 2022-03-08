import pandas
liste=[]
csv1 = pandas.read_csv('1.csv',encoding="ANSI")
csv2 = pandas.read_csv('2.csv',encoding="ANSI")
csv1.dropna(how="all", inplace=True)
csv2.dropna(how="all", inplace=True)
merged = csv1.merge(csv2, on='id')

merged.to_csv("output.csv",index=False, header=False,encoding="UTF-8")
