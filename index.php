<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        :root {
            --coffe: ; /* Changed to blue */
        }

        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
    color:black;
}

body {
    background: url('bg.png') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    height: 100vh;
    width: 100vw;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container {
    width: 80%;
    min-height: 80%;
    margin: auto;
    padding: 1rem 0;
    color: black;
    background: rgba(255, 255, 255, 0.046);
    border-radius: 1rem;
    position: relative; /* Allow positioning of the buttons */
}

nav {
    display: flex;
    align-items: center;
    justify-content: flex-end; /* Move items to the right */
    width: 100%;
    padding: 1rem;
    position: absolute;
    top: 0;
    right: 0;
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: flex-end;
    gap: 2rem;
}
nav ul li a {
    all: unset;
    font-weight: 400;
    font-size: 20px;
    letter-spacing: 1px;
    cursor: pointer;
    transition: .3s ease-in;
    position: relative;
    padding: 0.5rem 1.5rem;
    border:  2px solid #A8E6CF; /* Green border */
    border-radius: 0.5rem;
    background-color: #D4F1E4;  /* Light green background */
    text-align: center;
    text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.8); /* Light shadow */
}

nav ul li a:hover {
    background-color: #218838; /* Darker green on hover */
    color: white; /* Change text color to white on hover */
    border-color: #1e7e34; /* Darker green border on hover */
}




.content {
    display: flex;
    justify-content: space-between;
    gap: 1rem;
    width: 80%;
    margin: auto;
    align-items: center;
    min-height: 60vh;
}

.content .text {
    width: 50%;
}

.content .text h1 {
    font-size: 3vw;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: black;
    line-height: 110%;
    margin-bottom: 1.5rem;
}

.content .text p {
    font-weight: 300;
    font-size: 1vw;
    color:black;
}

.content img {
    width: 450px;
}

@media only screen and (max-width: 850px) {
    nav, .content, .text {
        width: 90% !important;
    }
    nav #logo {
        font-size: 23px;
    }
    nav ul {
        gap: 2rem;
    } 
    .content {
        flex-direction: column-reverse;
        justify-content: center;
        text-align: center;
        width: 100%;
        margin-bottom: 1rem;
    }
    .content h1 {
        font-size: 40px !important;
    }
    .content p {
        font-size: 16px !important;
        text-align: center;
    }
    .content img {
        width: 150px;
    }
}

@media only screen and (max-width: 550px) {  
    nav ul {
        gap: 1.5rem;
    }
    nav ul a {
        font-size: 14px !important;
    }
    .content h1 {
        font-size: 30px !important;
    }
    .content p {
        font-size: 14px !important;
    }
    .content img {
        width: 100px;
    }
}

    </style>
</head>
<body>
    <div class="container">
        <nav>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="employee.php">Employee</a></li>
                <li><a href="admin_login.php">Admin</a></li>
            </ul>
        </nav>
        <div class="content">


        </div>
    </div>
</body>
</html>
