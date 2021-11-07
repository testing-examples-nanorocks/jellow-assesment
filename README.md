# JellowAssesment

## API endpoints

<a href="https://ibb.co/JsHDZ8c"><img src="https://i.ibb.co/bKXctY6/Screenshot-from-2021-10-31-03-26-39.png" alt="Screenshot-from-2021-10-31-03-26-39" border="0"></a>

## For Laravel API 
  - We use homestead as dev environment (https://laravel.com/docs/8.x/homestead)
  - For Homestead.yaml we have 
  ```
  ---
ip: "192.168.10.10"
memory: 2048
cpus: 2
provider: virtualbox

authorize: ~/.ssh/id_rsa.pub

keys:
    - ~/.ssh/id_rsa

folders:
  - map: <project_path>/JellowAssesment
    to: /home/vagrant/code/JellowAssesment/

sites:
  - map: jellow.repo
    to: /home/vagrant/code/JellowAssesment/jellow-laravel/public
    
databases:
    - homestead

features:
    - mariadb: false
    - ohmyzsh: false
    - webdriver: false
    - mysql8: true
  ```
  
  - Don't forget to add ``` jellow.repo 192.168.10.10 ``` in ```/etc/hosts```
  - On root in laravel project run `mv .env.example .env`
  - Check that you have a DB with name ```jellow```
  - When vagrant homestead is setup you can run: 
    - ```vagrant up # to start to box```
    - ```vagrant shh # for ssh the box```
    - Navigate to root in the laravel project inside homestead and run:
      - ```php artisan migrate --seed``` This will set the tables for the DB and populate data.
  - You're done. Try to access the API on http://jellow.repo   

## For Vue App 
 - Navigate to the root of the vueJS app
 - run: `npm i`
 - run: `npm run serve`
 - open http://localhost:8080/
 - done :)
