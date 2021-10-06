`I have the documentation for this solution at` https://documenter.getpostman.com/view/3707157/UUy66PyL

To run this code in your local machine

 - run  __git clone _github_url___ on your git enabled terminal
 
 - cd into the root folder
 
 - run __composer install__ to install all dependencies
 
 - run tests with __php ./vendor/bin/phpunit__
 
 Ensure you have php and symfony cli installed.
 
 Strat  the aplication by running __symfony server:start__
 
 ### For Palindrome
 
 http ```GET```
 /checker/palindrome/anna
 
 ### For Anagram
 http ```POST```
 /checker/anagram
 
 ### For Pangram
 
 http ```POST```
 /checker/anagram
 
 Application methods are contained in
 
 `./src/controller/CheckerController.php`
 
 Tests are contained in
 
 `.tests/CheckerTest.php`
 
 ***Documentation***
 https://documenter.getpostman.com/view/3707157/UUy66PyL