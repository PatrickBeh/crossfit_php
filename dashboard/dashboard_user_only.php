
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/style_dashboard.css">
</head>
<body>
    <header>
        <div class="navbar__logo">
            <div class="logo">
                
                    <a href="#"><img src="../crossfit-icon.png" alt=""></a>
                    <div class="text__logo">
                        <a href="#"><h1>Crossfit Southport</h1></a>
                        <a href="#"><p>Lorem ipsum dolor sit amet.</p></a>
                    </div>
            </div>
            <!-- This section it's not been manipulated by css (find the issue to fix) -->
            <div class="welcome__user">
                <h1>Welcome to your dashboard (add user's name)</h1>
            </div>
        </div>
        <div class="navbar__form">
            <!-- --------------Login section--------------- -->
            <!-- Apply PHP here to use the user's name from database -->
            <button>Logout</button>
        </div>
    </header>
    <main>
        <div class="main--wrapper">
            <div class="list__section">
                <h2>WODs registered for you</h2>
                <div class="list__section__wrapper">
                    <!-- Here will be the wod asigned from staff to this user. -->
                </div>
            </div>
        </div>
    </main>
</body>
</html>