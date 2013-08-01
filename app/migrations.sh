"*** RUNNING Migrations : Starts ***"

Console/cake Migrations.migration run all
echo "*** RUNNING Migrations : Ends ***"

echo "*** Providing full permission to tmp folder ***"
sudo chmod -R 777 tmp/*
