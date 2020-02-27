import mysql.connector as mysql
import dbConfig as config 
import numpy as np
import csv
# connects to database
conn = mysql.connect(**config.dbConfig)
cursor = conn.cursor()


file = open('C:/Users/LuciaFalcinelli/Dropbox (SSD)/weatherstaion_doc/Calahuancane 2010.txt', 'r')
file_content = file.read()
file.close()

lineList = list()
s = []
with open('C:/Users/LuciaFalcinelli/Dropbox (SSD)/weatherstaion_doc/Calahuancane 2010.txt', 'r') as file:
    first_line = file.readline()
    second_line = file.readline()
    third_line = file.readline()
    
    first_line = first_line.replace("\n", "")
    second_line = second_line.replace("\n", "")
    third_line = third_line.replace("\n", "")

    first_line = first_line.replace(" ", "")
    second_line = second_line.replace(" ", "")
    third_line = third_line.replace(" ", "")
    third_line = third_line.replace("---", "NULL")

    first_line = first_line.split("\t")
    second_line = second_line.split("\t")
    third_line = third_line.split("\t")


    
    print(len(first_line))
    print(len(second_line))
    print(len(third_line))

for i in range(len(first_line)):
   
    s.append(first_line[i]+"_"+ second_line[i])
third_line[0] = third_line[0]+third_line[1]
print(third_line)

print(s)