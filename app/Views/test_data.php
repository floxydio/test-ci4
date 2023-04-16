<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Test View</title>
</head>

<body>
   <!-- foreach data from data["product"] -->
   <?php foreach ($product as $p) : ?>
      <p><?= $p['detail'] ?> </p>
      <!-- Edit -->
      <!-- <form action="/update-test/<?= $p['id'] ?>" method="post">
         <input type="text" name="detail" placeholder="detail" value="<?= $p['detail'] ?>">
         <button type="submit">Submit</button> -->
   <?php endforeach; ?>
   <!-- insert data -->
   <br>
   <br>
   <br>
   <p>For Insert Data</p>
   <form action="/insert-test" method="post">
      <input type="text" name="name" placeholder="name">
      <input type="text" name="detail" placeholder="detail">
      <input type="text" name="gambar" placeholder="gambar">
      <button type="submit">Submit</button>
</body>

</html>
