
<?php

$conn = mysqli_connect('localhost', 'root', '', 'library');
session_start();

if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome to the Library</h1>
    <p>You are currently logged in as <?php echo $_SESSION['name']; ?>.</p>

    <table class="striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Author</th>
      <th>Category</th>
      <th>Publisher</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = "SELECT b.*, a.name as author_name, c.name as category_name, e.name as editura_name 
        FROM books b 
        JOIN authors a on b.id_author = a.id 
        JOIN category c on b.id_category = c.id 
        JOIN editura e on b.id_editura = e.id";
      
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result))
         
      {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['author_name'].'</td>';
        echo '<td>'.$row['category_name'].'</td>';
        echo '<td>'.$row['editura_name'].'</td>';
        echo '<td>' ?>
        <form action="delete.php" method="post" style="display: inline-block; margin: 0 1em">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <button class="waves-effect waves-light red lighten-4 btn btn-small">
          <i class="material-icons red-text">delete</i>
        </button>
      </form>
      <?php
        '</td>';
        echo '</tr>';
      }
      $conn->close();
    ?>
  </tbody>
</table>



    <div style="display: flex; align-items: center; justify-content: center; height: 100vh">
    <form action="login.php">
        <input type="submit" value="Logout">
    </form>
    <form action="addbook.php">
        <input type="submit" value="Populeaza baza de date">
    </form>
    <form action="book.php">
        <input type="submit" value="Adauga carte">
    </form>
    </div>
</body>
</html>


