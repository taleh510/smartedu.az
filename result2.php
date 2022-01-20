<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nəticələrim</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- Page style -->
    <link rel="stylesheet" href="./resources/css/stylee.css">
    <!-- responsive style -->
    <link rel="stylesheet" href="./resources/css/responsivee.css">
</head>

<body>
    <!-- Header Start -->
    <header>
        <div class="container">
            <div class="row navg">
                <div class="col-lg-4">
                    <a href="index.html">
                        <div class="logo-img">
                            <img src="./resources/img/Group 180.svg" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-8">
                    <div class="header-item">
                        <button class="balance" type="button" data-bs-toggle="modal" data-bs-target="#balance"><i class="far fa-wallet"></i> Balansım <span>0.00</span></button>
                        <a href="profile.html">
                            <div class="profile-img">
                                <div class="p-img">
                                    <img src="./resources/img/profile-img-1.jpg" alt="">
                                </div>
                                <span>Nəzrin Əliyeva</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    
     <!-- Modal balance Start -->
     <div class="modal fade" id="balance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="dr">
                        <img src="./resources/img/Group 74.svg" alt="">
                        <h3>Balansı Artır</h3>
                    </div>
                    <div class="br">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="total-balance">
                        <h4>Cari balans: <span>0 azn</span></h4>
                    </div>
                    <form action="">
                        <label for="">Məbləğ (azn) </label>
                        <div class="b-i">
                            <input type="text" name="" id="" placeholder="1-100 azn">
                            <button>Ödəniş et</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" data-bs-dismiss="modal">Daxil ol</button>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Modal balance End -->
    <!-- Results section start -->
    <section class="results">
        <div class="container">
            <div class="result-head">
                <div class="result-heading">
                    <h1>
                        11- ci sinif buraxılış imtahan sualları
                    </h1>
                </div>
                <div class="students-name">
                    <h4>Şagird: Əliyeva Nəzrin</h4>
                    <p>Ümumi bal: 300</p>
                </div>
                <div class="search">
                    <div class="for-search">
                        <i class="fal fa-search"></i>
                        <input type="text" placeholder="Sual nömrəsi axtar">
                    </div>
                    <button>
                        Axtar
                    </button>
                </div>
                <div class="answers">
                    <div class="answer-item ">
                        <div class="true">
                            <div class="true-answer">
                            </div>
                        </div>
                        <p>Düzgün cavablar</p>
                    </div>
                    <div class="answer-item">
                        <div class="false">
                            <div class="false-answer">
                            </div>
                        </div>
                        <p>Səhv cavablar</p>
                    </div>
                </div>
                <div class="answer-number">
                    <p>
                        Düzgün cavabların sayı: 15
                    </p>
                    <p>
                        Səhv cavabların sayı: 15
                    </p>
                </div>
            </div>
            <div class="question-cards">
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual 1</h4>
                            <p>
                                İsmin hansı halında olan sözlər yalnız feili xəbərli cümlələrdə işlənir?
                            </p>
                        </div>
                        <div class="questions-answer">
                            <h4>Cavab</h4>
                            <div class="q-answers">
                                <div class="answer-group">
                                    <input type="radio"  class="wrong-answer" id="" name="wrong-answer" value="" checked>
                                    <p> A) Yerlik</p>
                                </div>
                                <div class="answer-group">
                                    <input type="radio"  class="answer" id="" name="answer" value="" disabled>
                                    <p>A) Yerlik</p>
                                </div>
                                <div class="answer-group">
                                    <input type="radio"  class="answer" id="" name="answer" value="" disabled>
                                    <p>A) Yerlik</p>
                                </div>
                                <div class="answer-group">
                                    <input type="radio" class="right-answer" id="" name="answer" value="" checked>
                                    <p>A) Yerlik</p>
                                </div>
                                <div class="answer-group">
                                    <input type="radio"  class="answer" id="" name="wrong-answer" value="" disabled>
                                    <p>A) Yerlik</p>
                                </div>
                            </div>
                        </div>
                        <div class="explanation">
                            <h4>Izahi</h4>
                            <div class="explain">
                                <div class="explain-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual 2</h4>
                            <p>
                                İsmin hansı halında olan sözlər yalnız feili xəbərli cümlələrdə işlənir?
                            </p>
                        </div>
                        <div class="questions-answer">
                            <h4>Cavab</h4>
                            <div class="open-answer">
                                <div class="open-answer-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="explanation">
                            <h4>Izahi</h4>
                            <div class="explain">
                                <div class="explain-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual 2</h4>
                            <div class="voice-question">
                                <audio controls autoplay muted>
                                    <source src="https://www.youtube.com/watch?v=ptJVWT6Oco4" type="audio/ogg">
                                  Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                        <div class="questions-answer">
                            <h4>Cavab</h4>
                            <div class="open-answer">
                                <div class="open-answer-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="explanation">
                            <h4>Izahi</h4>
                            <div class="explain">
                                <div class="explain-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual 2</h4>
                            <p>
                                İsmin hansı halında olan sözlər yalnız feili xəbərli cümlələrdə işlənir?
                            </p>
                            <div class="video-question">
                                <video width="" height="240" controls>
                                    <source src="movie.mp4" type="video/mp4">
                                    <source src="movie.ogg" type="video/ogg">
                                  Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="questions-answer">
                            <h4>Cavab</h4>
                            <div class="open-answer">
                                <div class="open-answer-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="explanation">
                            <h4>Izahi</h4>
                            <div class="explain">
                                <div class="explain-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="question-card">
                    <div class="question-content">
                        <div class="question">
                            <h4>Sual 2</h4>
                            <p>
                                İsmin hansı halında olan sözlər yalnız feili xəbərli cümlələrdə işlənir?
                            </p>
                            <div class="match">
                                <div class="left-side">
                                    <p>1.Sözlər</p>
                                    <p>2.Sözlər</p>
                                    <p>3.Sözlər</p>
                                    <p>4.Sözlər</p>
                                    <p>5.Sözlər</p>
                                </div>
                                <div class="right-side">
                                    <p>A) Yerlik</p>
                                    <p>A) Adlıq</p>
                                    <p>A) Yönlük</p>
                                    <p>A) Çıxışlıq</p>
                                    <p>A) Təsirlik</p>
                                </div>
                            </div>
                        </div>
                        <div class="questions-answer">
                            <h4>Cavab</h4>
                            <div class="open-answer">
                                <div class="open-answer-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="explanation">
                            <h4>Izahi</h4>
                            <div class="explain">
                                <div class="explain-content">
                                    <p>
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="result-btn">
                <button>Nəticələrim</button>
            </div>
        </div>
    </section>
    <!-- Results section end -->
    <!-- Js load -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>