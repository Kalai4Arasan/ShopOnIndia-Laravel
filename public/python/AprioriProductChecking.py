#!/usr/bin/env python
# coding: utf-8

# In[23]:


from apyori import apriori
import mysql.connector as sql


# In[24]:


database=sql.connect(host="localhost",username="root",password="",database="Shopping")


# In[25]:


run=database.cursor()


# In[26]:


run.execute("select category,user_id from buys")
temp = run.fetchall()
print(temp)
run.execute("select count(distinct user_id) from buys")
temp1=run.fetchone()
run.execute("select distinct(user_id) from buys")
temp2=run.fetchall()
getID=[]
for i in temp2:
    getID.append(i[0])
print(getID)
total=[]
for ID in temp2:
    myresult=[]
    for data in temp:
        if(ID[0]==data[1]):
            li=[]
            li.append(data[0])
            myresult.append(li)
    total.append(myresult)

run.execute("select category,user_id from histories")
temp = run.fetchall()
print(temp)
run.execute("select count(distinct user_id) from histories")
temp1=run.fetchone()
run.execute("select distinct(user_id) from histories")
temp2=run.fetchall()
for i in temp2:
    getID.append(i[0])
print(getID)
for ID in temp2:
    myresult=[]
    for data in temp:
        if(ID[0]==data[1]):
            li=[]
            li.append(data[0])
            myresult.append(li)
    total.append(myresult)    
    
print(total)


# In[27]:


index=0
for result in total:
    itemset=list(apriori(result,min_support=0.05))
    max=0
    for i in itemset:
        if(max<i.support):
            value,=i.items
            max=i.support
            cat=value
    print(max,cat)
    run.execute("select * from categories where user_id = %d " % getID[index])
    ids=run.fetchall()
    if(len(ids)==0):
        query= """insert into categories (user_id,category) values (%d, '%s') """
        record= (getID[index],cat)
        run.execute(query% record)
        database.commit()
        print("inserted")
    else:
        query= """update categories set category='%s' where user_id=%d"""
        record= (cat,getID[index])
        run.execute(query% record)
        database.commit()
        print("altered")
    index+=1
    


# In[28]:


run.execute("select count(*) from histories")
hist=run.fetchone()
if(hist[0]>=100):
    run.execute("TRUNCATE table histories")
    print("Truncated")
else:
    print("Not Truncated")


# In[ ]:




