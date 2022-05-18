<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>ABC HealthCare</title>
</head>
<body class="container flex flex-column">
    <header class="header"></header>

    <nav>
        <div class="nav">
            <a href="index.php" class="nav-item">Home</a>
            <a href="centre_view_all.php" class="nav-item">Centres</a>
            <a href="patient_view_all.php" class="nav-item">Patients</a>
            <a href="contact_us.php" class="nav-item">Contact</a>
            <a href="about_us.php" class="nav-item">About</a>
        </div>
    </nav>

    <main class="main">
        <h1 class="mt-1 mb-1">Alan McFadden</h1>
            
        <table class="table">
            <tbody>
                <tr>
                    <th>Address</th>
                    <td>38 Liam McGearailt Pl, Duntahane Rd Fermoy Co Cork</td>
                    <td rowspan="7" class="centered">
                        <img src="images/default_patient.png" alt="Default patient image">
                    </td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>(025) 340776</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <a href="mailto:alan18550@boranora.com">
                            alan18550@boranora.com
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>Date of birth</th>
                    <td>1939-11-12</td>
                </tr>
                <tr>
                    <th>Medical insurance</th>
                    <td>VHI</td>
                </tr>
                <tr>
                    <th>Preferences</th>
                    <td>Email</td>
                </tr>
                <tr>
                    <th>Medical centre</th>
                    <td>Swords Health Centre</td>
                </tr>
            </tbody>
        </table>

        <form method="post">
            <div class="mt-1 buttons">
                <button type="submit" class="button warning" formaction="patient_update_form.php">Update</button>
                <button type="submit" class="button danger" formaction="patient_delete_form.php">Delete</button>
            </div>
        </form>
    </main>

    <footer class="footer">
        <p>&copy; 2022, all rights reserved.</p>
    </footer>
</body>
</html>