var $appendHere = document.getElementById("appendHere"),
	len = files.length,
	i, $p, $a;

for(i=len-1;i>-1;i--){
	$p = document.createElement("p");
	$a = document.createElement("a");
	$a.href = "./" + files[i];
	$a.textContent = files[i];
	$p.appendChild($a);
	$appendHere.appendChild($p);

}
