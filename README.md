# enay
Maternal and Child
-----------------------------------------------------------------------------
Setup Instructions

git clone https://github.com/kimcharnova/enay.git

Install node.js https://nodejs.org/dist/v10.15.3/node-v10.15.3-x64.msi

On your DBMS administration tool, e.g. phpMyAdmin, create a database and name it 'enay'.

The enay Repository has a folder named enay which has a subfolder also named enay which contains all the files. 

In the subfolder enay:
-Open the file 'env.example'
-Copy its content
-Paste it in a new file
-Change its database name to 'enay'
-Change its credentials if necessary
-Save it as '.env' in the subfolder 'enay'

On cmd:
Get into the local directory of the repository (in the subfolder 'enay').
-Enter 'composer update'
-Enter 'php artisan key:generate'
-Enter 'npm install'
-Enter 'php artisan migrate'
-Enter 'php artisan serve'

Note:
Enter 'npm run dev' whenever there are changes in the resources or after performing 'git pull ...'