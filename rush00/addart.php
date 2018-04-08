<?php

include("inc/header.php"); ?>
<div class="section catalog page">
    <div class="wrapper">
<h1><?php
    echo "<a>Create Article</a> ";
    echo $pageTitle; ?></h1>
<?php
if ($_POST['Category'] == 'book') {
    echo '<form method="post" action="addscr.php">
     <table>
        <tr>
            <th><label for="name">Title</label></th>
            <td><input type="text" name="title" name="title" /></td>
        </tr>
        <tr>
            <th><label for="img">IMG</label></th>
            <td><input type="text" name="img" /></td>
        </tr>
        <tr>
            <th><label for="Price">Price</label></th>
            <td><input type="text"  name="Price" /></td>
        </tr>
        <tr>
            <th><label for="year">Year</label></th>
            <td><input type="text"  name="year" /></td>
        </tr>
        <tr>
            <th><label for="ganre">Genre</label></th>
            <td><input type="text"  name="genre" /></td>
        </tr>
        <tr>
            <th><label for="format">Format</label></th>
            <td><input type="text"  name="format" /></td>
        </tr>
        <tr>
            <th><label for="authors">Authors</label></th>
            <td><input type="text"  name="authors" /></td>
        </tr>
        <tr>
            <th><label for="publisher">Publisher</label></th>
            <td><input type="text"  name="publisher" /></td>
        </tr>
        <tr>
            <th><label for="isbn">ISBN</label></th>
            <td><input type="text"  name="isbn" /></td>
        </tr>
        <input style="display: none" type="text" name="category" value="book"/>
    </table>
    <input type="submit" name="submit" value="Send" />
</form>';
}
elseif ($_POST['Category'] == 'movie') {
    echo '<form method="post" action="addscr.php">
    <table>
        <tr>
            <th><label for="title">Title</label></th>
            <td><input type="text" id="title" name="title" /></td>
        </tr>
        <tr>
            <th><label for="img">Img</label></th>
            <td><input type="text" id="img" name="img" /></td>
        </tr>
        <tr>
            <th><label for="price">Price</label></th>
            <td><input type="password" id="price" name="price" /></td>
        </tr>
        <tr>
            <th><label for="year">Year</label></th>
            <td><input type="password" id="year" name="year" /></td>
        </tr>
        <tr>
            <th><label for="genre">Genre</label></th>
            <td><input type="password" id="genre" name="genre" /></td>
        </tr>
        <tr>
            <th><label for="format">Format</label></th>
            <td><input type="password" id="format" name="format" /></td>
        </tr>
        <tr>
            <th><label for="writers">Writers</label></th>
            <td><input type="password" id="writers" name="writers" /></td>
        </tr>
        <tr>
            <th><label for="director">Director</label></th>
            <td><input type="password" id="director" name="director" /></td>
        </tr>
        <tr>
            <th><label for="stars">Stars</label></th>
            <td><input type="password" id="stars" name="stars" /></td>
        </tr>
        <input style="display: none" type="text" name="category" value="movie"/>
    </table>
    <input type="submit" name="submit" value="Send" />
</form>';
}
elseif ($_POST['Category'] == 'music') {
    echo '<form method="post" action="addscr.php">
    <table>
        <tr>
            <th><label for="title">Title</label></th>
            <td><input type="text" id="title" name="title" /></td>
        </tr>
        <tr>
            <th><label for="img">Img</label></th>
            <td><input type="text" id="img" name="img" /></td>
        </tr>
        <tr>
            <th><label for="price">Price</label></th>
            <td><input type="password" id="price" name="price" /></td>
        </tr>
        <tr>
            <th><label for="year">Year</label></th>
            <td><input type="password" id="year" name="year" /></td>
        </tr>
        <tr>
            <th><label for="genre">Genre</label></th>
            <td><input type="password" id="genre" name="genre" /></td>
        </tr>
        <tr>
            <th><label for="format">Format</label></th>
            <td><input type="password" id="format" name="format" /></td>
        </tr>
        <tr>
            <th><label for="artist">Artist</label></th>
            <td><input type="password" id="artist" name="artist" /></td>
        </tr>
        <input style="display: none" type="text" name="category" value="<?php echo $_POST["Category"];?>
    </table>
    <input type="submit" name="submit" value="Send" />
</form>';
}
else{
    header("location:http://localhost:8100/admin.php");
}
?>
    </div>
</div>
<?php include("inc/footer.php"); ?>