<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Queen-Burger/CSS/style.css">
</head>
<style>
.footer {
    background-color: #222;
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 14px;
}

.footer-logo img {
    width: 150px;
    height: auto;
}


.footer a {
    color: #fff;
    text-decoration: none;
}

.footer a:hover {
    color: #ccc;
    text-decoration: underline;
}

.footer ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.footer ul li {
    display: inline-block;
    margin-bottom: 10px;
}

.footer ul li:last-child {
    margin-bottom: 0;
}

.footer .social-media {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.footer .social-media a {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;
    margin-right: 10px;
    border-radius: 50%;
    background-color: #fff;
    color: #222;
    transition: background-color 0.3s ease;
}

.footer .social-media a:hover {
    background-color: #222;
    color: #fff;
}

.footer-bottom {
    margin-top: 20px;
    font-size: 12px;
}
</style>
<footer class="footer">
    <div class="footer-wrapper">
        <div class="footer-logo">
            <img src="/Queen-Burger/Images/bg.png" alt="Your logo">
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-social-media">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2023 Queen Burger. All rights reserved.</p>
    </div>
</footer>
