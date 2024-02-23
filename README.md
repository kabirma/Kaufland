Junior PHP Developer Test (Kaufland)
# Data Feed
Reading XML, JSON, CSV file & Saving in Database

Muhammad Ahmer
muhammadahmer.004@gmail.com

1. Importing is done in a simple way I created three different functions to handle XML, JSON and CSV for the moment having a different storage to make the application more expendable, All File Processing Code is in Controller, All Database related code is in Model, while there are three entities Post.php, Category.php and Brand.php and lastly the test are present in test folder.

2. Then after this I am converting the data in array and using Doctrine Batch Insert saving it to a Postgresql/MySql database I used Doctrine to be able to manage multiple database without changing code using Doctrine ORM, I am using a postgresql-dump/mysql-dump to create the necessary tables in the start then rest of the work is automated. The database dump are in thier respective folders mysql-dump and pgsql-dump, we can also extend this to SQlite if we want with little work only.

3. Table structure is divided into 3 Tables Post thier Categories and Brands, and using simple Many to One our Post I am saving all of them in a Batch.

4. I have also written PHPUnit Test on the Model Process function as its the core of the App to test its functionality, I am using a JSON Object for this purpose

5. I am logging the errors in a logs.txt file by using Try and Catch with Throwable and Exceptions and have stored that function in a trait.

6. I am also using Memcached in order to have a fetch records from cache and have better processing time.

7. I am also using Docker inorder to make sure this code can be run everywhere without having the problem of matching the platform specs

8. Docker contains container for PHP, Nginx, Mysql/Postgresql Memcache and Adminer to use for viewing database. Also at the moment Postgresql configuration is commented, so MySQL will work, DockerFile also contain code to run PHPUnit test and it require Copy of all files in root to mounted space, as this was taking to much space and causing me a lot of processing on my system its commented at the moment.

9. Database Configuration is in model.PHP, I have commented the Postgresql configuration and using MySQL and there is also sql_model set to '' due to the reason that some data in xml file for caffienetype contains null or empty value and I set mysql field for this to be enum.

STEPS To START PROJECT

1. Install Docker/Run Docker
2. Run Command docker-compose up --build

