<?php
include 'db.php';

// Fetch all developers sorted by position
$query = "SELECT * FROM developers1 ORDER BY position ASC";
$result = $conn->query($query);

$developers = [];
while ($row = $result->fetch_assoc()) {
    $developers[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Developers</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: 'Poppins', sans-serif;
    background: #f4f4f4;
    padding: 20px;
    margin: 0;
}

.admin-container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

th {
    background: #007bff;
    color: white;
}

input {
    width: 100%;
    padding: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    padding: 6px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.move-up, .move-down {
    background: #f0ad4e;
    color: white;
}

.deleteDev {
    background: red;
    color: white;
}

#saveChanges {
    background: green;
    color: white;
    margin-top: 10px;
}

</style>
<body>

    <div class="admin-container">
        <h2>📌 Manage Developers</h2>

        <!-- Developer Management Table -->
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name (EN)</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="developerList">
                <?php foreach ($developers as $index => $dev): ?>
                    <tr data-id="<?php echo $dev['id']; ?>">
                        <td><?php echo $index + 1; ?></td>
                        <td><input type="text" class="name_en" value="<?php echo htmlspecialchars($dev['name_en']); ?>"></td>
                        <td>
                            <button class="move-up">🔼</button>
                            <button class="move-down">🔽</button>
                        </td>
                        <td>
                            <button class="deleteDev" data-id="<?php echo $dev['id']; ?>">🗑</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button id="saveChanges">💾 Save</button>
        <button id="addDeveloperBtn">➕ Add New Developer</button>
    </div>


    <script>
        $(document).ready(function () {
            // Add Developer
            $("#addDeveloperBtn").click(function () {
                $("#developerList").append(`
                    <tr>
                        <td>#</td>
                        <td><input type="text" class="name_en" placeholder="Enter Developer Name (EN)"></td>
                        <td>
                            <button class="move-up">🔼</button>
                            <button class="move-down">🔽</button>
                        </td>
                        <td><button class="deleteDev">🗑</button></td>
                    </tr>
                `);
            });

            // Move Position Up
            $(document).on("click", ".move-up", function () {
                var row = $(this).closest("tr");
                row.prev().before(row);
            });

            // Move Position Down
            $(document).on("click", ".move-down", function () {
                var row = $(this).closest("tr");
                row.next().after(row);
            });

            // Delete Developer
            $(document).on("click", ".deleteDev", function () {
                var row = $(this).closest("tr");
                var id = $(this).data("id");

                if (id) {
                    if (confirm("Are you sure you want to delete this developer?")) {
                        $.post("delete_developer.php", { id: id }, function (response) {
                            alert(response);
                            row.remove();
                        });
                    }
                } else {
                    row.remove();
                }
            });

            // Save Changes
            $("#saveChanges").click(function () {
                var developerData = [];
                $("#developerList tr").each(function (index) {
                    var id = $(this).data("id") || null;
                    var name_en = $(this).find(".name_en").val();
                    var position = index + 1;

                    if (name_en) {
                        developerData.push({ id: id, name_en: name_en, position: position });
                    }
                });

                $.post("save_developers.php", { developers: developerData }, function (response) {
                    alert(response);
                    location.reload();
                });
            });
        });

    </script>

</body>
</html>
