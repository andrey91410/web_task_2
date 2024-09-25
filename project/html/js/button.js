var count = 0;
document.getElementById("myButton").onclick = function () {
        count++;
	if (count % 2 == 0) {
                document.getElementById("demo").innerHTML = "";
	} else {
                var img = document.createElement("img");
                img.src = "https://kartinkof.club/uploads/posts/2022-03/1648349409_11-kartinkof-club-p-memi-pro-univer-11.jpg";
                document.getElementById("demo").appendChild(img);
	}
}


