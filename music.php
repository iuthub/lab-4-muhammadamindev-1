<html>
<body>
<link rel="stylesheet" type="text/css" href="style1.css">
<form action="searchByAlbum.php" method="POST">
    <label>Album:
        <input type="text" id="album1" placeholder="Enter Album Name" name="album1" />
        <button name="subject" type="submit" value="search">search</button>
</form>
<form action="firstpageSorted2.php" method="post">
    <button name="subject" type="submit" value="search">back</button>
</form>
</html>
</body>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style1.css">
<form action="searchByArtist.php" method="POST">
    <label>Artist name:</label>
    <input type="text" id="user" placeholder="Enter Artist Name" name="user" />
    <button name="subject" type="submit" value="search">search</button>
</form>
<form action="firstpageSorted2.php" method="post">
    <button name="subject" type="submit" value="search">back</button>
</form>
</html>
</body>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style1.css">
<form action="searchByGenre.php" method="post">
    <label class="heading">Genre:</label><br>
    <input type="radio" name="Genre1" value="rock"><label>Rock</label><br>
    <input type="radio" name="Genre1" value="pop"><label>Pop</label><br>
    <input type="radio" name="Genre1" value="hip"><label>Hip</label><br>
    <input type="radio" name="Genre1" value="clasical"><label>Clasical</label><br>
    <input type="radio" name="Genre1" value="jazz"><label>Jazz</label><br>
    <input type="radio" name="Genre1" value="Blues"><label>Blues</label><br>
    <input type="radio" name="Genre1" value="Electronic"><label>Electronic</label><br>
    <input type="radio" name="Genre1" value="Hip Hop"><label>Hip Hop</label><br>
    <input type="radio" name="Genre1" value="Rap"><label>Rap</label><br>
    <input type="radio" name="Genre1" value="r&b"><label>R&B</label><br>
    <input type="radio" name="Genre1" value="Alternative Music"><label>Alternative Music</label><br>
    <input type="radio" name="Genre1" value="Reggoe"><label>Reggoe</label><br>
    <button name="subject" type="submit"  value="search">search</button>
</form>
<form action="firstpageSorted2.php" method="post">
    <button name="subject" type="submit" value="search">back</button>
</form>
</body>
</html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style1.css">
<form action="searchByMood.php" method="post">
    <label class="heading">Mood:</label>
    <input type="radio" name="Moods" value="sad"><label>sad</label>
    <input type="radio" name="Moods" value="silent"><label>silent</label>
    <input type="radio" name="Moods" value="rocking"><label>rocking</label>
    <input type="radio" name="Moods" value="good"><label>good</label>
    <button name="subject" type="submit" value="search">search</button>
</form>
<form action="firstpageSorted2.php" method="post">
    <button name="subject" type="submit" value="search">back</button>
</form>
</body>
</html>
<html>
<body>
<link rel="stylesheet" type="text/css" href="style1.css">

<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Music";
$artist_name1 = $_POST['user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select A.artist_name,T.link,T.track_name,G.genre_name,Al.album_name,T.year from Artist A join Tracks T join Genre G join Album al on A.id=T.id AND T.genre_id=G.genre_id AND Al.album_id=T.album_id where A.artist_name like '%$artist_name1%' ";
$result = $conn->query($sql);
//$queryResult = mysql_fetch_array($result);

if ($result->num_rows > 0)
{
    for($i = 0; $i < $result->num_rows; $i++)
    {
        $row = $result->fetch_assoc();
        echo "Artist name: " . $row["artist_name"]. "<br>";
        echo " Track Name: " . $row["track_name"].  "<br>";
        echo " Genre: " . $row["genre_name"] . "<br>";
        echo "Album Name :" . $row["album_name"] ."<br>";
        echo "Year :" . $row["year"] . "<br>";
        // echo "LINK :" . $row["link"] ."<br>";

        $ho = $row["link"];

        echo "<audio controls='controls'>";
        echo "<source src='$ho'  />";
        echo "</audio>";
        echo "<br>";
        echo "----------------------------------------"."<br>";
    }
} else {
    echo "<h1>0 results</h1>";
}
$sql1 = "update tracks set count=count+1 where id = (select id from Artist where artist_name like '%$artist_name1%'); ";
$conn->query($sql1);
$conn->close();
?>
<form action="searchByArtist1.php" method="post">
    <button name="subject" type="submit" value="search">back</button>
</form>
<form action="firstpageSorted2.php" method="post">
    <button name="subject" type="submit" value="search">Main Page</button>
</form>
</body>
</html>


