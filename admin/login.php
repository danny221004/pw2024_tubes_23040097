<!DOCTYPE HTML>
<html>
    <head>
        <title>Halaman Login</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <style>

    .container-login{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    padding: 20px 25px;
    width: 300px;
    background-color: rgba(0,0,0,.7);
    box-shadow: 0 0 10px rgba(255,255,255,.3);}

    .container-login h1{
        text-align: center;
        color: #fafafa;
        margin-bottom: 30px;
        text-transform: uppercase;
        border-bottom: 4px solid #2979ff;
    }

    .container-login label{
        text-align: left;
        color: #90caf9; }

        .container-login form input{
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid #2979ff;
            color: #fff;
            font-size: 20px;
        }
        .container-login form button{
            width: 100%;
            padding: 5px 0;
            margin-top: 10px;
            border: none;
            background-color:#2979ff;
            font-size: 18px;
            color: #fafafa;
        }
</style>
    <body>
    <div class="container-login">
          <h1>Login</h1>
          <form method="post" action="logincek.php">
                <label>Username</label><br>
                <input type="text" name="username"><br>
                <label>Password</label><br>
                <input type="password" name="password"><br>
                <button>Log in</button>
            </form>
            <a href="daftar.php">
                <button>Register</button>
      </a>
        </div>      
    </body>
</html>