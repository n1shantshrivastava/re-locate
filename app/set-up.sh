#copy & move the database.php.default & core.php.default to original names
if [-f "Config/database.php"]; then
  echo "Database File already exists"
else
  echo "Copying database.php.default to database.php"
  sudo cp Config/database.php.default Config/database.php
fi

#=======================================================================

if [-f "Config/core.php"]; then
  echo "Core File already exists"
else
  echo "Copying core.php.default to core.php"
  sudo cp Config/core.php.default Config/core.php
fi

#======================================================================
#Checking if the tmp folder is created or not.
if [ -d "tmp"]; then
	if [ -d "tmp/cache" "tmp/logs" "tmp/session"]; then
		if [ -d "tmp/cache/models" "tmp/cache/persistent" "tmp/cache/views"]; then
			echo "Folders already present : tmp/cache/models | tmp/cache/persistent | tmp/cache/views"
		else 
			echo "***Creating  Directory Structure : tmp -> cache -> models | persistent | views ***"
			mkdir -p "tmp/cache/{models,persistent,views}"
		fi
	else 
		echo "***Creating  Directory Structure : cache | logs | session ***"
		mkdir -p "tmp/{cache,logs,session}"
	fi
else
	echo "***Creating  Directory Structure : cache | logs | session ***"
	mkdir -p "tmp/{cache,logs,session}"

	echo "***Creating  Directory Structure : tmp -> cache -> models | persistent | views ***"
	mkdir -p "tmp/cache/{models,persistent,views}"	
fi

#=========================================================================
#checking for logs files and creating it

if [ -f "tmp/logs/error.log" -a -f "tmp/logs/debug.log"]; then
	echo "*** Error and Debug logs already present"
else
	echo "*** Creating error.log and debug.log"
	touch "tmp/logs/{error.log, debug.log}"
fi