[![Build Status](https://travis-ci.com/Dundgren/mvc-proj.svg?branch=main)](https://travis-ci.com/Dundgren/mvc-proj) [![Build Status](https://scrutinizer-ci.com/g/Dundgren/mvc-proj/badges/build.png?b=main)](https://scrutinizer-ci.com/g/Dundgren/mvc-proj/build-status/main) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Dundgren/mvc-proj/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Dundgren/mvc-proj/?branch=main) [![Code Coverage](https://scrutinizer-ci.com/g/Dundgren/mvc-proj/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/Dundgren/mvc-proj/?branch=main)

# Project for the course MVC
This app was created as an end project for the course MVC. The main focus isn't really the game itself but the tools used in the creation process and the design pattern of the codebase. Some of the focus is for example on unit-tests, validators and the use of continous integration. A big emphasis is also placed on the design pattern model-view-controller.

## Tools
This project has been created using Laravel. For testing several tools have been installed; Phpcs, phpcbf, phpcpd, phpmd, phpstan and phpunit. For continous integration both Travis and Scrutinizer are used. The relevant badges can be found at the top of this document.

## Structure
The main code for the game itself is placed in the "app" directory. Here you will find the models and controllers. The views are found under "resources/views". Each page has its own folder with at least an index-file. The routes are found under the "routes" directory in the file web.php. The tests are placed in the directory "test" and is divided in 3 folders. The entrypoint for the app is through the "public" folder. An .htaccess-file is placed there for access via a web-server. The config files for all validators can be found at the base directory.

## Installing
Clear cache 2
composer dump
make clean-all install 1
htaccess 
npm install
create .env
copy example to .env
php artisan key:generate

## Playing
Game21 is simply blackjack but with dice. Here are the rules if you haven't played it before: The goal for the player is to get a higher number than the house or exactly 21. The player rolls first and may continue to roll until the score reaches 21 (automatic win), over 21 (instant loss) or until the player chooses to stop. After the player has rolled the house will roll to achieve the same results. If the house achieves a higher, equal or a score of 21 the player loses. If the house achieves a score over 21 the player wins.

To start the game you first choose the number of dice. This decides how many dice will be rolled each time. Then you must choose an amount to bet. When pressing start the player will have automatically rolled once already. You then may continue to roll or stop. After stopping the bot (house) will continue to roll until it achieves the same or higher score than the player or until it goes bust.

By winning the player gains the amount that was bet from the house. By losing the player loses this money to the house. If the player achieves a blackjack (score of 21) the player will win 1.5 times the amount bet. The house, however, will not be rewarded this way.

