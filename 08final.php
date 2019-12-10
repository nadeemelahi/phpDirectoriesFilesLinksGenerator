#!/usr/bin/php
<?php

$dirPath = "./";
$dirListingAsc = scandir($dirPath);

//echo "in ascending order -default";
//print_r($dirListingAsc);

$len = sizeof($dirListingAsc);
//echo "len: " . $len;

//echo "\n";
//echo "current directory: " . getcwd();
echo "\n";

$directoriesOnly = [];
for($i=2;$i<$len;$i++){
	if(is_dir($dirListingAsc[$i])){
		array_push($directoriesOnly, $dirListingAsc[$i]);
	}
}

//print_r($directoriesOnly);


$len = sizeof($directoriesOnly);

$jsonList = "var directories = [\n" ;
for($i=0;$i<$len-1;$i++){
	$jsonList .= "\"" . $directoriesOnly[$i] . "\"" . ",\n";  
}
$jsonList .=  "\"" . $directoriesOnly[$len-1] . "\""  . "\n";  
$jsonList .=  "];\n";  
print_r($jsonList);

$directoriesJSONfile = fopen("directoriesJSONlist.js", "w") or die("Unable to open file!");
fwrite($directoriesJSONfile, $jsonList);
fclose($directoriesJSONfile);

$currentDirectory;
$subDirectoryListing = [];
$allFilesInDirectory = [];
$len2;
$jsonListSubDir; 
$subDirFilesJSONfile; 
$fileData = [];

for($i=0;$i<$len;$i++){
	chdir($directoriesOnly[$i]);
	$currentDirectory = getcwd();
	echo "current directory: " . $currentDirectory;

	$subDirectoryListing = scandir($currentDirectory);
	echo "subDirectoryListing: \n";
	print_r($subDirectoryListing);


	$len2 = sizeof($subDirectoryListing);
	for($j=2;$j<$len2;$j++){
		if(!is_dir($subDirectoryListing[$j])){
			$fileData = pathinfo($subDirectoryListing[$j]);
			if($fileData["extension"] == "pdf"){
				array_push($allFilesInDirectory,$subDirectoryListing[$j]);
			}
			$fileData = [];
		}
	}

	//print_r($allFilesInDirectory);
	$jsonListSubDir = "var files = [\n";
	$len2 = sizeof($allFilesInDirectory);
	$jsonListSubDir .= "\"" . $allFilesInDirectory[0] . "\"" . "\n";
	for($j=1;$j<$len2;$j++){
		$jsonListSubDir .= ",\"". $allFilesInDirectory[$j] . "\"" . "\n";
	}
	$jsonListSubDir .= "];\n";
	print_r($jsonListSubDir);

	$subDirFilesJSONfile = fopen("filesJSONlist.js","w") or die("Unable to open file!");
	fwrite($subDirFilesJSONfile,$jsonListSubDir);
	fclose($subDirFilesJSONfile);	

	$subDirectoryListing = [];
	$allFilesInDirectory = [];

	// copy ../subDirs.html to ./subDirs.html
	copy("../subDirs.html", "./index.html");

	chdir("..");
	echo "\n";
}

echo "\n\n";

