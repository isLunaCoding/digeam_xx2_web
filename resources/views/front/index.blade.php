@extends('front.head')

@section('title')
    <title>《仙俠世界貳》官網</title>
@endsection



@section('thumbnail')
    <meta property="og:image" content="https://xx2.digeam.com/homepage/img/homepage/thumbnail_1200x628.jpg">
@endsection



@section('otherCss')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection



@section('section1Container')
    <div class="container">
        <div class="btnBox1">
            <a target="_blank" class="buttonDownload" href="https://www.digeam.com/index"><img
                    src="/img/event/homepage/buttonDownload.jpg"></a>
            <div class="btnBox2">
                <a class="register" target="_blank" href="https://www.digeam.com/index">
                    <img src="/img/event/homepage/imgRegister.png">
                    帳號註冊
                </a>
                <a class="addValue" target="_blank" href="https://www.digeam.com/index">
                    <img src="/img/event/homepage/imgAddValue.png">
                    儲值中心
                </a>

                <div class="btnBox3">
                    <a class="OTP" target="_blank" href="https://www.digeam.com/index">
                        <img src="/img/event/homepage/imgOTP.png">
                        OTP申請
                    </a>
                    <div class="line"></div>
                    <a class="customerService" target="_blank" href="https://www.digeam.com/index">
                        <img src="/img/event/homepage/imgCustomerService.png">
                        聯繫客服
                    </a>
                </div>

            </div>
        </div>
        <div class="swiper">
            <div class="sw">
                <img src="/img/event/homepage/S1BN530.jpg" alt="">
            </div>
            <div class="sw">2</div>
            <div class="sw">3</div>
        </div>
        <div class="news">
            <div class="newsBtnBox">
                <div class="newsTab">
                    <button class="newsBtn newsBtnNA new" data-news="NA">NEW</button>
                    <button class="newsBtn newsBtnNB activity" data-news="NB">活動</button>
                    <button class="newsBtn newsBtnNC systemBox" data-news="NC">系統</button>
                </div>
                <a class="btnMore" href="">More</a>
            </div>
            <div class="line"></div>
            <div class="newsContainer">
                <div class="text textNA">
                    <ul>
                        <li class="textli ">
                            <a class="TOP" href="">
                                <div class="textBox">
                                    <div class="textTitle">1111111111112</div>
                                    <div class="textTime">2023/8/21</div>
                                </div>
                            </a>
                        </li>
                        <li class="textli ">
                            <a class="NEW" href="">
                                <div class="textBox">
                                    <div class="textTitle">12</div>
                                    <div class="textTime">123</div>
                                </div>
                            </a>
                        </li>
                        <li class="textli ">
                            <a class="normal" href="">
                                <div class="textBox">
                                    <div class="textTitle">12</div>
                                    <div class="textTime">123</div>
                                </div>
                            </a>
                        </li>
                        <li class="textli normal">123</li>
                        <li class="textli normal">123</li>
                        <li class="textli normal">123</li>
                        <li class="textli normal">123</li>
                    </ul>
                </div>
                <div class="text textNB">2</div>
                <div class="text textNC">3</div>
            </div>
        </div>
    </div>
@endsection



@section('section2')
    <div class="section2">
        <div class="sectionBG">
            <div class="charBox">
                <div class="btnBox">
                    <div class="charBtn" data-char="cha1"><img src="/img/event/homepage/char_icon1.png"></div>
                    <div class="charBtn" data-char="cha2"><img src="/img/event/homepage/char_icon2.png"></div>
                    <div class="charBtn" data-char="cha3"><img src="/img/event/homepage/char_icon3.png"></div>
                    <div class="charBtn" data-char="cha4"><img src="/img/event/homepage/char_icon4.png"></div>
                    <div class="charBtn" data-char="cha5"><img src="/img/event/homepage/char_icon5.png"></div>
                    <div class="charBtn" data-char="cha6"><img src="/img/event/homepage/char_icon6.png"></div>
                    <div class="charBtn" data-char="cha7"><img src="/img/event/homepage/char_icon7.png"></div>
                    <div class="charBtn" data-char="cha8"><img src="/img/event/homepage/char_icon8.png"></div>
                </div>
                <div class="cha cha1">
                    <div class="textBox textBox1">
                        <img src="/img/event/homepage/char_name1.png">
                        <img src="/img/event/homepage/char_feature1.png">
                        <p>
                            潛行暗殺者,善隱忍,精伏擊。本身擁有超強的近身戰鬥實力,伺機而動,常以風馳電掣的手段予敵致命一擊。事了拂衣而去,行蹤莫測難辨。<br>
                            使用雙刃。近戰法系輸出，擁有隱身技能的絕影峰十分適合作為團隊中偵查兵的存在，高爆發的技能保證其單體傷害。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array1)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha2">
                    <div class="textBox textBox2">
                        <img src="/img/event/homepage/char_name2.png">
                        <img src="/img/event/homepage/char_feature2.png">
                        <p>
                            法力無邊，佛法精深。可將佛力凝聚肉體，形成萬帳金光的法像金身，擁有無窮無盡的神力來退魔伏妖。<br>
                            使用槍。近戰物理輸出職業，單體輸出較高，控制技能較多。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array2)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha3">
                    <div class="textBox textBox3">
                        <img src="/img/event/homepage/char_name3.png">
                        <img src="/img/event/homepage/char_feature3.png">
                        <p>
                            天生具有皇者霸氣，是與生俱來的強者。每次逢敵都是以命養戰，鬼神見之都要避讓。一但開戰，必定至死方休。<br>
                            使用雙斧。近戰物理職業，擁有卓越的絕地反殺能力，是戰場上不可多得的戰鬥主力。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array3)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha4">
                    <div class="textBox textBox4">
                        <img src="/img/event/homepage/char_name4.png">
                        <img src="/img/event/homepage/char_feature4.png">
                        <p>
                            神脈正統，天器傳人，善借五行之力，幻化出無形劍式，配合靈動的身法，給予敵人致命打擊。
                            <br>使用劍。遠程法系輸出，可以控制大量敵人，並給予傷害，但是血防較為薄弱，容易被集火擊殺。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array4)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha5">
                    <div class="textBox textBox5">
                        <img src="/img/event/homepage/char_name5.png">
                        <img src="/img/event/homepage/char_feature5.png">
                        <p>
                            善觀星卜卦，奇門遁甲。常肩負長弓行走世間，以三尺玄羽懲惡揚善。在戰場上無論是拒敵還是追殺，都有著絕對的掌控權。
                            <br>使用弓。遠程物理輸出。靈巧的身形可以躲避近戰的攻擊，遠距離的射程可以將敵人逐一擊殺。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array5)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha6">
                    <div class="textBox textBox6">
                        <img src="/img/event/homepage/char_name6.png">
                        <img src="/img/event/homepage/char_feature6.png">
                        <p>
                            悲天憫人者，以普渡蒼生為己念。善使琴音震撼軍心，精用仙法救死扶傷。通過各種輔助能力，助戰友立於不敗之地。
                            <br>使用琴。治癒+控制系職業，不僅可以實現輸出的作用，也可以扮演團隊治療的角色。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array6)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha7">
                    <div class="textBox textBox7">
                        <img src="/img/event/homepage/char_name7.png">
                        <img src="/img/event/homepage/char_feature7.png">
                        <p>
                            嫉惡如仇，心存大是非。視軍令如山，在戰場上抵禦千軍，斬妖除魔。配合無所畏懼的決心，對敵人造成心靈與肉體的雙重傷害。
                            <br>使用重劍。近戰物理職業，當之無愧的坦克職業，擁有強大的防禦力和生存能力，是團隊中不可缺少的存在。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array7)">技能介紹&rarr; </button>
                    </div>
                </div>
                <div class="cha cha8">
                    <div class="textBox textBox8">
                        <img src="/img/event/homepage/char_name8.png">
                        <img src="/img/event/homepage/char_feature8.png">
                        <p>
                            擁有超凡的自癒能力，能善用丹藥賜予萬玉頃刻恢復生機之能，自保能力強，在戰爭中充當著治癒者的身份。
                            <br>使用法仗。治癒系職業，無論是副本還是戰鬥都不可或缺的職業之一，有了該職業相當於多了一條命。
                        </p>
                        <button class="skillInt" onclick="skillInt(char_Array8)">技能介紹&rarr; </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



@section('section3')
    <div class="section3">
        <div class="sectionBG">
            <div class="container">
                <div class="title"><img src="/img/event/homepage/section3title.png"></div>
                <div class="gallery_container">
                    <div class="gallery_wrap threeD_gallery_wrap">
                        <div class="gallery_item threeD_gallery_item gallery_left_middle">
                            <img src="/img/event/homepage/section3swiperImg1.jpg" class="show">
                        </div>

                        <div class="gallery_item threeD_gallery_item front_side">
                            <img src="/img/event/homepage/section3swiperImg1.jpg" class="show">
                        </div>

                        <div class="gallery_item threeD_gallery_item gallery_right_middle">
                            <img src="/img/event/homepage/section3swiperImg1.jpg" class="show">
                        </div>

                        <div class="gallery_item threeD_gallery_item gallery_out">
                            <img src="/img/event/homepage/section3swiperImg1.jpg" class="show">
                        </div>

                    </div>
                    <button class="prev"><img src="/img/event/homepage/arrowL.png"></button>
                    <button class="next"><img src="/img/event/homepage/arrowR.png"></button>
                </div>
                <a href=""><img src="/img/event/homepage/section3moreBtn.jpg"></a>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script src="/js/event/homepage/swiper.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(function() {
            $('.gallery_container').gallery_slider({
                imgNum: 4
            });
        })
    </script>
@endsection
