# phpDirectoriesFilesLinksGenerator

This is a shell script written in php. Probably works on all systems.

This script will read all subdirectories in a given directory and create a json list of those directories, 
then descend into each subdirectory and create a json list of all pdf files present.

There is a pre-existing index.html with corresponding main.css and mainDirs.js files. 
The script gererates a json list file called directoriesJSONlist.js
The mainDirs.js will create the webpage of links to the sub directories.

And there is a pre-exisitng subDir.html with corresponding mainFiles.js file.
The script generates filesJSONlist.js for each subdirectory for all the pdf files.
The pre-existing subDir.html file will be copied into each subdirectory as index.html.
The pre-existing mainFiles.js will create the webpage of links to all the pdf files

In summary you will have the following files to begin with(not including the subdirectories and pdf files in each)

/08final.php

/index.html

/subDirs.html

/main.css

/mainDirs.js

/mainFiles.js

And after executing 08final.php you should have additionally

/directoriesJSONlist.js

/exampleSubDirectory01/filesJSONlist.js

/exampleSubDirectory01/subDirs.html

/exampleSubDirectory02/filesJSONlist.js

/exampleSubDirectory02/subDirs.html

And so on.
