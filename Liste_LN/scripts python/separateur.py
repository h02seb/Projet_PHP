# Importing pandas library 
import pandas as pd 
  
# Load the data of example.csv  
# with '_' as custom delimiter 
# into a Dataframe df 
df = pd.read_csv('sep;.csv',  
                   sep = ';',  
                   engine = 'python') 
  
# Print the Dataframe 
tab=[]
for i,j in zip(list(df[df.columns[0]]),list(df[df.columns[3]])):	
	tab.append([i,j])

print(tab) 
