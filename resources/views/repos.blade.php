<!DOCTYPE html>
<html>
<head>
    <title>GitHub Repo Explorer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        #repos {
            white-space: pre-wrap;
            background: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="mt-5">GitHub Repo Explorer</h1>
    <form id="repoForm" class="mt-4">
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
            <label for="language">Language:</label>
            <input type="text" class="form-control" id="language" name="language">
        </div>
        <div class="form-group">
            <label for="limit">Limit:</label>
            <select class="form-control" id="limit" name="limit">
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Get Repos</button>
    </form>
    <div id="repos" class="mt-4">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Owner Name</th>
                <th>Stars</th>
                <th>Forks</th>
                <th>Link</th>
            </tr>
            </thead>
            <tbody id="repos_data">
            <!-- Repositories will be displayed here -->
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#repoForm').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '/get-repos',
                method: 'GET',
                data: $(this).serialize(),
                success: function(data) {
                    data.items.forEach(function(repo) {
                        $('#repos_data').append(`
                            <tr>
                                <td>${repo.name}</td>
                                <td>${repo.owner.login}</td>
                                <td>${repo.stargazers_count}</td>
                                <td>${repo.forks_count}</td>
                                <td><a href="${repo.html_url}" target="_blank">Link</a></td>
                            </tr>
                        `);
                    });
                },
                error: function(error) {
                    console.error('Error fetching repositories:', error);
                }
            });
        });

    });
</script>
</body>
</html>
