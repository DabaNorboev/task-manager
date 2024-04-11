<form class="login">
    <h2>Welcome, User!</h2>
    <p>Please register</p>
    <input type="text" placeholder="User Name" />
    <input type="password" placeholder="Password" />
    <input type="submit" value="Log In" />
    <div class="links">
        <a href="/login">login</a>
    </div>
</form>
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    body {
        background: #c0c0c0;
        font-family: Raleway, sans-serif;
        color: #666;
    }

    .registration {
        margin: 20px auto;
        padding: 40px 50px;
        max-width: 300px;
        border-radius: 5px;
        background: #fff;
        box-shadow: 1px 1px 1px #666;
    }
    .registration input {
        width: 100%;
        display: block;
        box-sizing: border-box;
        margin: 10px 0;
        padding: 14px 12px;
        font-size: 16px;
        border-radius: 2px;
        font-family: Raleway, sans-serif;
    }

    .registration input[type=text],
    .registration input[type=password] {
        border: 1px solid #c0c0c0;
        transition: .2s;
    }

    .registration input[type=text]:hover {
        border-color: #F44336;
        outline: none;
        transition: all .2s ease-in-out;
    }

    .registration input[type=submit] {
        border: none;
        background: #EF5350;
        color: white;
        font-weight: bold;
        transition: 0.2s;
        margin: 20px 0;
    }

    .registration input[type=submit]:hover {
        background: #F44336;
    }

    .registration h2 {
        margin: 20px 0 0;
        color: #EF5350;
        font-size: 28px;
    }

    .registration p {
        margin-bottom: 40px;
    }

    .links {
        display: table;
        width: 100%;
        box-sizing: border-box;
        border-top: 1px solid #c0c0c0;
        margin-bottom: 10px;
    }

    .links a {
        display: table-cell;
        padding-top: 10px;
    }

    .links a:first-child {
        text-align: left;
    }

    .links a:last-child {
        text-align: right;
    }

    .registration h2,
    .registration p,
    .registration a {
        text-align: center;
    }

    .registration a {
        text-decoration: none;
        font-size: .8em;
    }

    .registration a:visited {
        color: inherit;
    }

    .registration a:hover {
        text-decoration: underline;
    }
</style>
