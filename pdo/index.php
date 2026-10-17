<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-success">
        <div class="container">
            <span class="navbar-brand">Agriculture Information System</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card shadow">
            <div class="card-body p-4">
                <h2 class="mb-4">Farmer CRUD</h2>

                <div class="row g-3">
                    <div class="col-md-6">
                        <a href="create.php" class="btn btn-success w-100 py-3">Create Farmer</a>
                    </div>

                    <div class="col-md-6">
                        <a href="getAll.php" class="btn btn-primary w-100 py-3">Display All Farmers</a>
                    </div>

                    <div class="col-md-6">
                        <a href="getById.php" class="btn btn-info w-100 py-3">Get Farmer By ID</a>
                    </div>

                    <div class="col-md-6">
                        <a href="update.php" class="btn btn-warning w-100 py-3">Update Farmer</a>
                    </div>

                    <div class="col-md-6">
                        <a href="delete.php" class="btn btn-danger w-100 py-3">Delete Farmer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
