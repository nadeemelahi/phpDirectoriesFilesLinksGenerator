var $appendHere = document.getElementById("appendHere"),
	len = directories.length,
	i, $p, $a;

for(i=len-1;i>-1;i--){
	$p = document.createElement("p");
	$a = document.createElement("a");
	$a.href = "./" + directories[i];
	$a.textContent = directories[i];
	$p.appendChild($a);
	$appendHere.appendChild($p);

}
