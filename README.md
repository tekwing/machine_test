# machine_test

# 1. Login -> Common page for both User and Admin 
     url => http://127.0.0.1:8000/
     Credentials for admin => User_id : admin & passwword : 1234
     Credentials for User => User_id : user & passwword : 1234
     
# 2.  Login
      Both admin and user redirected to same page after login. But user has no access to create shop if he then shows error message 

# 3. Shop Creation 
     Click Add shop on sidebar and enter required data. the shop will be created and appears in search result.

# 4. Location fetching 
     After login software ask to give location access. if location given it fetches longitute and latitude and show it in field. after that if user click search shop button it fetches 
     nearest shop. based on distance in kilometer it shows nearest shop first

     user can also edit co-ordinate (latitude and longitude) and view proper result . for every search it Plot the location on map.

# 5. Database
     MIgration file contains tables schema.
     DB seeder file has data for testing.
     
     ![Screenshot (16)](https://github.com/tekwing/machine_test/assets/166939239/fa0d02d9-afda-4951-b900-6bf91cca931d)

     ![Screenshot (17)](https://github.com/tekwing/machine_test/assets/166939239/c72a309d-8859-4521-8a1c-c15616cab7cd)

     ![Screenshot (18)](https://github.com/tekwing/machine_test/assets/166939239/d59a4fb5-b80d-4c3d-a01c-9788a874f5fc)



