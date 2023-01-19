<button type="button" onclick="location.href='addbook.php'">Add more Authors, Categories and Editure</button>
<form>
  <label for="authors-select">Authors:</label>
  <select id="authors-select" name="authors">
    <?php
      $conn = new mysqli("localhost", "root", "", "library");
      $query = "SELECT * FROM authors";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      }
      $conn->close();
    ?>
  </select>
  <br>
  <label for="category-select">Category:</label>
  <select id="category-select" name="category">
    <?php
      $conn = new mysqli("localhost", "root", "", "library");
      $query = "SELECT * FROM category";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      }
      $conn->close();
    ?>
  </select>
  <br>
  <label for="editura-select">Editura:</label>
  <select id="editura-select" name="editura">
    <?php
      $conn = new mysqli("localhost", "root", "", "library");
      $query = "SELECT * FROM editura";
      $result = mysqli_query($conn, $query);
      while($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
      }
      $conn->close();
    ?>
  </select>
 
  <br>
  <label for="book-name">Book Name:</label>
  <input type="text" id="book-name" name="book-name">
  <br>
  <button type="button" onclick="saveBook()">Save Book</button>
  <div id="message"></div> 
  
<script>
  function saveBook() {
    var authorId = document.getElementById("authors-select").value;
    var categoryId = document.getElementById("category-select").value;
    var edituraId = document.getElementById("editura-select").value;
    var bookName = document.getElementById("book-name").value;

    // Use XMLHttpRequest to send a POST request to the server with the new book information
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "savebook.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      var xhr = new XMLHttpRequest();
    xhr.open("POST", "savebook.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Handle the response from the server here
        var message = document.getElementById("message");
        message.textContent = "The book was added successfully";
        message.style.color = "green";
      }
    };
    xhr.send("author_id=" + authorId + "&category_id=" + categoryId + "&editura_id=" + edituraId + "&book_name=" + bookName);
  }
</script>