#!/bin/bash

###################################
owner="$(stat -c %U ${PWD})"
group="$(stat -c %G ${PWD})"

echo "#################"
echo "Setting Permissions"
echo "#################"
read -e -p  "Application installation starting.... "


# set basedir of installation, no trailing slash
baseDir=$PWD
storageLink=${baseDir}/public/storage
publicDir=$PWD/public
scriptDir=$PWD/scripts


read -e -p "Shall we proceed? " -i "yes" proceed
if [[ ! $proceed == "yes" ]]; then
    echo "Exiting ... Please try again"
    exit
fi

echo "####################"
echo "installing composer globally ..."
echo "####################"
echo @php "%~dp0composer.phar" %*>composer.bat

Set-Content composer.bat '@php "%~dp0composer.phar" %*'

composer -V

echo "####################"
echo "installing packages ..."
echo "####################"
composer install

#.htaccess file check
htaccessFile=${baseDir}/.htaccess
if [[ ! -f  "$htaccessFile" ]];then
    #.htaccess file not existing, create it?
    read -e -p "Create .htaccess file? " -i "yes" reply
    if [[  $reply == "yes" ]];
    then
        echo "##############"
        echo "creating .htaccess file ..."
        echo "##############"
        #cp ${scriptDir}/root_access.txt $htaccessFile

    fi
fi

#.htaccess in public directory
publicHtaccess=${publicDir}/.htaccess
if [[ ! -f  "$publicHtaccess" ]];then
    #.htaccess file not existing, cerate it?
    read -e -p "Create public/.htaccess file? " -i "yes" reply
    if [[  $reply == "yes" ]];
    then
        echo "##############"
        echo "creating public/.htaccess file ..."
        echo "##############"
        cp ${scriptDir}/public_access.txt $publicHtaccess
    fi
fi

#npm install check
npmDir=${baseDir}/node_modules
if [[ ! -d  "$npmDir" ]];then
    #.htaccess file not existing, cerate it?
    read -e -p "Run npm install? " -i "yes" reply
    if [[  $reply == "yes" ]];
    then
        echo "##############"
        echo "installing npm ..."
        echo "##############"
        npm install --unsafe-perm node-sass
        npm install --save-dev laravel-mix-merge-manifest gulp
        npm install gulp-postcss autoprefixer gulp-jshint jshint gulp-sass gulp-clean-css gulp-concat gulp-uglify gulp-rename gulp-rtlcss --save-dev
        npm run dev
    fi
fi

#storage link
if [[ ( -L "${storageLink}" ) && ( -d "${storageLink}" ) ]];
then
        echo "storage link exists..."
        echo "unlinking it..."
        unlink ${baseDir}/public/storage
fi



echo "##############"
echo "creating the storage link ..."
echo "##############"

#removing storage link if already existing
if [ -d "$storageLink" ]; then
        /bin/rm ${storageLink}
fi


php artisan storage:link
# setting ownership of storage link
chown -h ${owner}:${group} ${storageLink}


#set -e



# fix ownership that might have been overwritten by upgrade
echo "##############"
echo "setting owner and group ..."
echo "##############"

#ideal for local server
chown -R $owner:$group ${baseDir}
chown -R root:root ${baseDir}/vendor


#changing storage folder mod
chmod -R ug+rwx storage
chmod 775 bootstrap/cache/

echo
#echo "[DONE]"
echo
echo "########################"
echo "!!! don't forget to:"
echo -e "\t\t - create .env file"
echo -e "\t\t - update DB configuration"
echo -e "\t\t - Run database migration to create db tables"
read -e -p "Run npm install? " -i "yes" reply
php artisan migrate
echo -e "\t\t - then run: php artisan key:generate"
read -e -p "Create database key:? " -i "yes" reply
php artisan key:generate
echo
echo "########################"

# refresh script
echo "artisan refresh configuration..."
php artisan cache:clear
php artisan config:cache
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
composer dump-autoload
echo -e "\t\t - Installation successfully completed"
echo "[DONE]"
