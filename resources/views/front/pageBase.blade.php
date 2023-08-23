@extends('front.head')

{{-- 網頁各自名稱 --}}
@section('title')
    @yield('title')
@endsection


@section('otherCss')
    <link rel="stylesheet" href="/css/event/homepage/pageStyle.css">
    @yield('otherCss')
@endsection



{{-- 分頁共用樣式 --}}
@section('sectionPage')
    <div class="sectionPage">
        <div class="sectionBG">
            <div class="container">
                <div class="btnBoxLeft">
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
                <div class="boxRight">
                    <div class="textTitle">
                        {{-- 內文標題 --}}
                        @yield('textTitle')
                    </div>
                    <div class="textBox">
                        {{-- 內文 --}}
                        @yield('textBox')
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione porro veritatis esse labore vel animi dolore eaque dolorem et, harum tempora omnis autem id minus rem perferendis repellendus nobis iusto, architecto delectus inventore, officiis maiores nostrum. Labore unde voluptas accusamus, quod dignissimos asperiores, odio iure dolorum doloribus a necessitatibus delectus illum possimus eaque autem assumenda explicabo cum quas? Fugit nemo ducimus consequuntur et illum nisi. Nulla saepe suscipit architecto obcaecati libero explicabo delectus necessitatibus non repellendus, officiis, et autem alias beatae, nobis quisquam sit aspernatur voluptatum porro ipsa reprehenderit incidunt maiores corrupti consequuntur? Necessitatibus repellat aperiam sapiente quaerat adipisci dolorum commodi recusandae veniam maiores? Dolorum inventore molestias, beatae fugit velit officiis accusamus, iure voluptatum repellat voluptates pariatur temporibus sint praesentium tempora illo quae earum? Voluptatem sint maxime, tempora voluptatibus dolorum eveniet perspiciatis aut est, enim error aspernatur, excepturi ex velit. Architecto omnis minima minus voluptates possimus perferendis, aliquam earum quae debitis veritatis eligendi velit, consectetur sequi ipsam non, adipisci ex quibusdam iure nisi totam? Dignissimos quibusdam blanditiis amet voluptatem odit illo nostrum excepturi recusandae vero voluptatibus accusantium corporis ad facilis, ipsam laboriosam cumque magni? Neque architecto molestiae corporis sunt possimus fugit nam, magni cum incidunt quo praesentium, voluptatum nobis aperiam? Quisquam nobis ipsa porro repellat excepturi at, recusandae, veniam sunt molestias voluptatum nemo voluptatem minima. A, eveniet explicabo iusto, enim quibusdam tempora at aliquam ipsum voluptatem officia nulla? Voluptatem totam maiores repellat asperiores ducimus quasi, ipsum nam earum consectetur, nesciunt sit id blanditiis quis quam sapiente vero? Dolorum dolor autem sed! Sequi animi dolores ipsum earum saepe in nesciunt iure? Eos obcaecati est possimus sed quae cumque. Veniam numquam unde deleniti maxime voluptatibus fugit sint quidem voluptas non hic soluta impedit libero nihil possimus, quis quod. Esse sapiente tenetur iste totam! Quo omnis porro a unde excepturi voluptatem pariatur earum quis fuga, iste, possimus nam iusto quaerat culpa obcaecati soluta assumenda optio ratione eum. Fugiat est, facilis expedita tempore quo saepe provident, quam nisi omnis aliquam distinctio non cum molestiae laborum voluptatibus laboriosam pariatur delectus, recusandae molestias reiciendis culpa velit aut perferendis. Architecto neque eaque quam reprehenderit, labore minus esse aperiam? Corrupti doloremque alias consectetur quisquam, eum sed maxime iure itaque similique asperiores nulla id quasi hic veritatis deleniti vitae fugiat voluptates. Quos repellat eius cumque reiciendis ut, impedit culpa facilis deserunt nulla fugiat error, voluptas ipsa! Similique quia consequuntur saepe assumenda ex dignissimos illum nihil, aspernatur tempora nesciunt, repudiandae eum! Quam optio iusto eveniet sit, a debitis, impedit nobis autem repellat quasi quisquam. Blanditiis ad possimus enim velit dolor necessitatibus dolore aspernatur eligendi autem iste qui, laborum omnis amet temporibus, nesciunt illo sint fugiat voluptates molestias animi quo ipsam corrupti sequi esse. Quia vero unde vitae, optio explicabo quod in nihil molestiae? Praesentium asperiores placeat voluptates molestias labore consequuntur quod ad nemo, dolorum, dignissimos fugiat. Asperiores maiores molestias debitis totam aperiam laborum ut commodi similique sint. Esse consequatur possimus eius culpa, officia ipsum impedit nihil cum repellat quaerat natus aliquid aut ex soluta labore voluptas voluptate quasi magni quae!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @yield('script')
@endsection
