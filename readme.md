# Running the app
- Make sure you have noeo4j working.
- run composer update.
- update neo4j db info at config/database.php
- run: php artisan neo4j:migrate
- run: php artisan db:seed
#What is Done
-Gaph nodes of persons and edges (Person Follow another).
-Crud Operations in persons.
-r and Unfollow Endpoints (Make Edge and Remove Edge).
-Validations in Requests.
-All Apis Accept Json Body.
-Apis collection is here
https://documenter.getpostman.com/view/8779895/SVmsULAe?version=latest
