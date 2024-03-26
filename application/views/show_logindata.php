<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
      border: 1px solid black;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    h2 {
      margin-left: 15px;

    }
  </style>
</head>

<body>
  <h2>Student Details</h2>
  <div class=" mx-2 d-md-flex justify-content-md-end">
    <a href="<?= base_url() . "demo_controller/get_data" ?>"><button class="btn btn btn-primary me-md-2" type="button">Add</button></a>
  </div>
  <div class="p-3">
    <table>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Class</th>
        <th>Section</th>
        <th>collega</th>
        <th>Action</th>
      </tr>
      <?php
      if (is_array($result) || is_object($result)) {
        foreach ($result as $value) { ?>
          <tr>
            <td><?= isset($value['name']) ? $value['name'] : ''; ?></td>
            <td><?= isset($value['email']) ? $value['email'] : ''; ?></td>
            <td><?= isset($value['phone']) ? $value['phone'] : ''; ?></td>
            <td><?= isset($value['class']) ? $value['class'] : ''; ?></td>
            <td><?= isset($value['section']) ? $value['section'] : ''; ?></td>
            <td><?= isset($value['collega']) ? $value['collega'] : ''; ?></td>
            <td>
              <a href="<?= base_url() . "demo_controller/get_data/?id=" . $value['id'] ?>"><button class="btn btn-outline-secondary mx-2 px-3" type="button">Edit</button></a>
              <a href="<?= base_url() . "demo_controller/delete_data/?id=" . $value['id'] ?>"><button class="btn btn-outline-secondary" type="button">Delete</button></button></a>
            </td>
          </tr>
      <?php }
      }
      ?>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>