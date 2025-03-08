<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$dbname = "homespector";

// Connect to Database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch All Sections
$result = $conn->query("SELECT * FROM services");
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['section']] = $row['content'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Froala Editor CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/css/froala_editor.pkgd.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.14/css/froala_style.min.css" rel="stylesheet">


    <!-- jQuery & Froala JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.0.16/js/froala_editor.pkgd.min.js"></script>
</head>
<style>
/* 🌍 Global Styles */
body {
    background: #f0f4ff;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    color: #333;
}

/* 📌 Admin Panel Container */
.container {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.15);
    max-width: 1100px;
    margin: 50px auto;
    min-height: 100vh;
    animation: fadeIn 0.5s ease-in-out;
}

/* 🏆 Headings */
h2 {
    color: #6a11cb;
    text-align: center;
    font-weight: 600;
    font-size: 32px;
}

h3 {
    color: #2575fc;
    margin-top: 20px;
    font-size: 24px;
}

/* 🎨 Forms */
form {
    background: #f8f9ff;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* ✏️ Froala Editor */
.froala-editor {
    width: 100%;
    min-height: 700px !important;
    max-height: 1000px !important;
    overflow-y: auto;
    border-radius: 8px;
    border: 1px solid #ccc;
    padding: 10px;
}

/* 🌟 Froala Editor Container */
.fr-box {
    width: 100%;
    min-height: 500px !important;
    max-height: 800px !important;
}

/* 🔘 Buttons */
button {
    font-size: 18px;
    font-weight: bold;
    padding: 14px 30px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    display: block;
    width: 100%;
}

/* 🟣 Primary Button */
.btn-primary {
    background: #6a11cb;
    color: white;
    box-shadow: 0 4px 6px rgba(106, 17, 203, 0.3);
}

.btn-primary:hover {
    background: #4b0fa8;
    box-shadow: 0 6px 10px rgba(75, 15, 168, 0.3);
}

/* 🖼️ Carousel Container */
.carousel-container {
    background: #ffffff;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 0px 5px 12px rgba(0, 0, 0, 0.15);
    margin-bottom: 40px;
}

/* 🎞️ Carousel Styling */
.carousel2 {
    background: #f8f9ff;
    padding: 40px 0;
    text-align: center;
}

.carousel-inner img {
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    border-radius: 12px;
    box-shadow: 0px 6px 14px rgba(0, 0, 0, 0.15);
}

/* 🎭 Carousel Buttons */
.carousel-control-prev,
.carousel-control-next {
    width: 55px;
    height: 55px;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    filter: brightness(0) invert(1);
}
/* Fix Froala Toolbar Layout */
.fr-toolbar {
    display: flex !important;
    flex-wrap: wrap !important;
    justify-content: start !important;
    background: #f9f9f9 !important;
    border-radius: 8px 8px 0 0 !important;
    padding: 8px !important;
}

/* Ensure toolbar buttons stay aligned */
.fr-toolbar .fr-btn-grp {
    display: flex !important;
    flex-wrap: nowrap !important;
}

/* Fix Editor Box */
.fr-box {
    border: 1px solid #ddd !important;
    border-radius: 8px !important;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1) !important;
    background: #fff !important;
    padding: 10px;
}

/* Editor Wrapper */
.fr-wrapper {
    border-radius: 0 0 8px 8px !important;
    padding: 10px !important;
    min-height: 250px;
    overflow-y: auto;
}

/* Make editor text clear and readable */
.fr-element {
    font-size: 16px !important;
    color: #333 !important;
    padding: 10px !important;
    line-height: 1.6 !important;
    border-radius: 5px !important;
}


/* 📱 Responsive Design */
@media (max-width: 1024px) {
    .container {
        max-width: 90%;
        padding: 25px;
    }

    h2 {
        font-size: 28px;
    }

    textarea {
        min-height: 250px;
    }

    .froala-editor, .fr-box {
        min-height: 500px !important;
        max-height: 800px !important;
    }
}

@media (max-width: 768px) {
    .container {
        max-width: 95%;
        padding: 20px;
    }

    .froala-editor, .fr-box {
        min-height: 400px !important;
        max-height: 700px !important;
    }

    button {
        font-size: 16px;
        padding: 12px 25px;
    }
}

/* 🌟 Animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

</style>
<body>
    <div class="container">
        <h2>Admin Panel</h2>
        
        <?php foreach ($data as $section => $content) { ?>
            <form class="update-form" method="post">
                <h3><?php echo ucfirst($section); ?></h3>

                <!-- Froala Editor -->
                <textarea name="editorContent" class="froala-editor"><?php echo htmlspecialchars_decode($content); ?></textarea>
                <input type="hidden" name="section" value="<?php echo $section; ?>">

                <!-- Save Button -->
                <button type="button" class="btn-primary save-content">Save Changes</button>
            </form>
            <hr>
        <?php } ?>
    </div>

    <!-- JavaScript for AJAX Updates -->
    <script>
        $(document).ready(function() {
            $('.froala-editor').each(function() {
                new FroalaEditor(this, {
                    height: 600,
                    theme: "royal",
                    imageUploadURL: 'update_services.php', // Corrected
                    imageUploadMethod: 'POST',
                    fileUploadURL: 'update_services.php', // Optional file upload
                    toolbarButtons: [
                        'bold', 'italic', 'underline', 'strikeThrough', 'fontSize', 'color', 'align', 
                        'insertImage', 'insertVideo', 'insertFile', 'html'
                    ]
                });
            });

            // AJAX for saving content
            $(".save-content").click(function() {
                let form = $(this).closest(".update-form");
                let formData = new FormData(form[0]);

                $.ajax({
                    url: "update_services.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        let data = JSON.parse(response);
                        alert(data.message || data.error);
                    }
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>
