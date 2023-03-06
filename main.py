import mysql.connector

csv_file = open('employees1.csv', 'r')
mydb = mysql.connector.connect(
    host="localhost",
    user="haobosun",
    passwd="SUNhaobo2002!",
    database="2nd milestone"
)
mycursor = mydb.cursor(buffered=True)
for line in csv_file:
    data = line.split(',')
    emp_id=data[0]
    name=data[1]
    address=data[2]
    salary=data[3]
    dob_modify=data[4].split('/')
    dob=dob_modify[2] + '-' + dob_modify[1] + '-' + dob_modify[0]
    nin=data[5]
    department=data[6]
    emergency_name=data[7]
    emergency_relation=data[8]
    emergency_number=data[9]
    sql = f"INSERT INTO employee (emp_id,name,address,salary,dob,nin,department,emergency_name,emergency_relationship,emergency_phone) VALUES ('{emp_id}',\"{name}\",\"{address}\",\"{salary}\",\"{dob}\",\"{nin}\",\"{department}\",\"{emergency_name}\",\"{emergency_relation}\",\"{emergency_number}\")"
    mycursor.execute(sql)
    mydb.commit()
    print(emp_id)

mydb.close()
print("Done")
