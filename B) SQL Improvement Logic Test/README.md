## Time Taken
Time taken to complete this is around 1 hours

## Solutions

Solutions are as below. And pretty quite simple

1. Each table creation must follow best practice design, must be indexed especially for join table. e.g. using a proper primary key, foreign key mostly is more than enough, this will help the query time especially when dealing with big data size.

2. Use a proper datatype, for example DATE and TIME will be stored in DATETIME or TIMESTAMP, using varchar(255) instead to limit rather than TEXT datatype, and use CHAR(1) instead of VARCHAR(1). 

3. When use DATETIME or DATE datatype always use YYYY-MM-DD date format or ISO date format that suits your SQL Engine. Other regional formats like DD-MM-YYY, MM-DD-YYYY will not be stored properly. 

4. Choose MyISAM storage engine. choose INNODB storage engine. Choosing wrong storage engine will affect the performance

5. Use VIEWS, are virtual tables that do not store any data of their own but display data stored in other tables. In other words, VIEWS are nothing but SQL Queries. A view can contain all or a few rows from a table. A MySQL view can show data from one table or many tables. By doing this the data has been pre-generated once and very useful for query search especially for big data cases.

