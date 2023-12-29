<!DOCTYPE html>
<html lang="en">

<head>
    <title>《仙俠世界貳》遊戲商城</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Digeam 掘夢網,線上遊戲,免費遊戲,3D">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://xx2.digeam.com/">
    <meta property="og:title" content="">
    <meta property="article:author" content="https://www.facebook.com">
    <meta property="og:image" content="/img/event/homepage/thumbnail_1200x628.jpg" />
    <link rel="icon" href="/img/event/prereg/favicon.ico" sizes="16x16">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="/css/event/webmall/style.css?v2.3">
</head>

<body>
    <div id="wrap" class="wrap">

        <div class="main">
            <div class="loading" v-if="loading == true">
                <div class="dots">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

            <div class="mask" v-if="mask == true || popB == true" @click="close()"></div>

            <nav class="nav">
                <ul class="list">
                    <li><a href="https://xx2.digeam.com/index" class="logo"></a></li>
                    <li @click="changeNav('produce')">商品列表</li>
                    <li @click=" popB = true ">使用說明</li>
                    <li @click="changeNav('depot')">購物倉庫</li>
                    <li><a href="https://www.digeam.com/member/billing" target="_blank">點數儲值</a></li>
                </ul>

                <a href="https://www.digeam.com/login" v-if="login == -99" class="login">登入</a>

                <form id="logout-form" action="https://www.digeam.com/logout" method="POST" class="user"
                    v-else="login == 1">
                    <input type="hidden" name="return_url" id="return_url"
                        value={{ base64_encode('https://xx2.digeam.com/webmall') }}>
                    <span class="account">帳號：%[user.account]</span>
                    <span class="point">點數：%[user.point]</span>
                    <button class="logout">登出</button>
                    <form>
            </nav>

            <section class="produce" v-if="navTab == 'produce'">
                <article class="carousel">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide swiper-slide" v-for="img in carousel" :key="img.id">
                                <a :href="img.url"><img :src="img.file_name" alt=""></a>
                            </div>

                        </div>
                        {{-- <p class="swiper-button-prev swiper_btn"></p>
                        <p class="swiper-button-next swiper_btn"></p> --}}
                        <div class="swiper-pagination"></div>
                    </div>


                </article>

                <article class="produceWrap">
                    <ul class="produceTab">
                        <li :class="{ 'active': liTab == 'hot' }" @click="changeLi('hot')">熱門商品</li>
                        <li :class="{ 'active': liTab == 'special' }" @click="changeLi('special')">特別販售</li>
                    </ul>
                    <div class="produceList" v-if="liTab == 'hot'">
                        <div class="item" v-for="item in sortItem.hotItem" :key="item.id">
                            <div class="itemIconBox" @click="itemInfo( item.id )">
                                <img :src="item.img" :alt="item.title">
                            </div>
                            <p class="itemName">%[ item.title ]</p>
                            <div class="line"></div>
                            <div class="itemNote">
                                <span v-if="item.limit_type == 1" class="limit">全服限購<span
                                        class="limitNum">%[item.limit_count ]</span>個</span>

                                <span v-else-if="item.limit_type == 2" class="limit">帳號限購<span class="limitNum">%[
                                        item.limit_count ]</span>個</span>

                                <span v-else-if="item.limit_type == 3" class="limit">全服區間限購<span class="limitNum">%[
                                        item.limit_count ]</span>個</span>

                                <span v-else-if="item.limit_type == 4" class="limit">帳號區間限購<span class="limitNum">%[
                                        item.limit_count ]</span>個</span>

                                <span v-else class="limit"><span class="limitNum"></span></span>

                                <b class="itemPoint">%[ item.price ]點</b>
                            </div>
                            <div class="itemBuy">
                                <label for="itemNum">數量
                                    <select name="itemNum" id="itemNum" @change="changeNum($event,item.id)">
                                        <option v-for="num in (item.limit_type !== 0 ? 1 : 10)" :value="num"
                                            :key="num">%[ num ]</option>
                                    </select>
                                </label>

                                <button class="buy"
                                    @click="buyPop(buyId[item.id] || 1 , item.id , item.title ,  item.price )">購買</button>
                            </div>
                        </div>
                    </div>

                    <div class="produceList" v-if="liTab == 'special'">
                        <div class="item" v-for="item in sortItem.specialItem" :key="item.id">
                            <div class="itemIconBox" @click="itemInfo( item.id )">
                                <img :src="item.img" alt=" %[ item.title ]">
                            </div>
                            <p class="itemName">%[ item.title ]</p>
                            <div class="line"></div>
                            <div class="itemNote">
                                <span v-if="item.limit_type == 1" class="limit">全服限購<span
                                        class="limitNum">%[item.limit_count ]</span>個</span>

                                <span v-else-if="item.limit_type == 2" class="limit">帳號限購<span class="limitNum">%[
                                        item.limit_count ]</span>個</span>

                                <span v-else-if="item.limit_type == 3" class="limit">全服區間限購<span class="limitNum">%[
                                        item.limit_count ]</span>個</span>

                                <span v-else-if="item.limit_type == 4" class="limit">帳號區間限購<span class="limitNum">%[
                                        item.limit_count ]</span>個</span>

                                <span v-else class="limit"><span class="limitNum"></span></span>

                                <b class="itemPoint">%[ item.price ]點</b>
                            </div>
                            <div class="itemBuy">
                                <label for="itemNum">數量
                                    <select name="itemNum" id="itemNum" @change="changeNum($event,item.id)">
                                        <option v-for="num in (item.limit_type !== 0 ? 1 : 10)" :value="num"
                                            :key="num">%[ num ]</option>
                                    </select>
                                </label>

                                <button class="buy"
                                    @click="buyPop(buyId[item.id] || 1 , item.id , item.title ,  item.price )">購買</button>
                            </div>
                        </div>
                    </div>

                </article>
            </section>

            <section class="depot" v-if="navTab == 'depot'">
                <article class="feedBack" v-if="feedBack !== false">
                    <b class="feedBackTitle">%[feedBack.title]</b>
                    <div class="line"></div>
                    <sub>達成活動累積消費額度，系統將自動發獎至購物倉庫中。</sub>
                    <div class="timeLine">%[feedBack.start] - %[feedBack.end]</div>
                    <span>當前累積消費金額:<span class="spend">%[ user.spend ]</span></span>
                    <div class="feedBackBox">
                        <div class="itemBox" v-for="(item , index) in feedBack.item" :key="index"
                            :class="{ active: user.spend >= item.price }">
                            <p class="priceTitle">累積消費金額 %[item.price]</p>
                            <span v-for="(item , index) in item.item_names">%[item]</span>
                        </div>
                    </div>
                </article>

                <article class="charWrap">
                    <div class="charBox">
                        <b class="user" v-if="login == 1">你好，%[user.account]</b>
                        <b class="user" v-else>你好，請先登入</b>

                        <select name="serveList" id="serveList" v-model="selectedServeId">
                            <option value="">請選擇伺服器</option>
                            <option :value="1801">十方鎮</option>
                        </select>

                        <select name="charList" id="charList" v-model="selectedCharId">
                            <option value="">請選擇角色</option>
                            <option v-for="item in user.charList" :key="item.charid" :value="item.charid">%[
                                item.name
                                ]</option>
                        </select>
                    </div>

                </article>

                <article class="userDepot">
                    <b class="depotTitle">購物倉庫</b>
                    <div class="line"></div>
                    {{-- <sub>商品購買、被贈與後，於購物倉庫、禮物中心的存放時間為30天，超過30天後即過期無法領取。</sub> --}}
                    <table>
                        <thead>
                            <th>道具名稱</th>
                            <th>持有數量</th>
                            <th>獲得方式</th>
                            <th>領取數量</th>
                            <th>狀態</th>
                        </thead>
                        <tbody>
                            <tr v-for="item in user.buyList" :key="item.id">
                                <td>%[ item.item_name ]</td>
                                <td>%[ item.count ]</td>
                                <td>%[ item.reason ]</td>
                                <td>
                                    <select name="itemNum" id="itemNum" @change="changeGetItemNum($event,item.id)">
                                        <option v-for="num in (item.count > 10 ? 10 : item.count)"
                                            :value="num">
                                            %[ num ]</option>
                                    </select>
                                </td>
                                <td><button class="getItem"
                                        @click="getItem( selectedServeId  , selectedCharId , item.id , getId[item.id] || 1)">領取</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </article>

                <!-- <article class="feedBack" v-if="feedBack !== false">
                    <b class="feedBackTitle">%[feedBack.title]</b>
                    <div class="line"></div>
                    <sub>達成活動累積消費額度，系統將自動發獎至購物倉庫中。</sub>
                    <div class="timeLine">%[feedBack.start] - %[feedBack.end]</div>
                    <span>當前累積消費金額:<span class="spend">%[ user.spend ]</span></span>
                    <div class="feedBackBox">
                        <div class="itemBox" v-for="(item , index) in feedBack.item" :key="index"
                            :class="{ active: user.spend >= item.price }">
                            <p class="priceTitle">累積消費金額 %[item.price]</p>
                            <span v-for="(item , index) in item.item_names">%[item]</span>
                        </div>
                    </div>
                </article> -->
            </section>

            <div class="popS" v-if="popS == true">
                <div class="isInfo" v-if="isInfo == true">
                    <div class="up">
                        <div class="itemBox">
                            <div class="itemIconBox">
                                <img :src="pop_info.img" alt="">
                            </div>
                            <div class="itemTxt">
                                <pre class="itemName"> %[pop_info.name]</pre>
                                <pre class="itemTime" v-if="pop_info.start != null && pop_info.end != null">區間限定%[pop_info.start]至<br>%[pop_info.end]</pre>
                            </div>
                        </div>
                        <p class="itemInfo" v-html="pop_info.info"></p>
                    </div>
                    <button class="close" @click="close()">關閉</button>
                </div>
                <div class="isBuy" v-else-if="isBuy == true">
                    <b class="subTitle">確定是否購買？</b>
                    <div class="line"></div>
                    <p class="itemName">%[ pop_buy.name ]</p>
                    <div class="numBox">
                        <p class="numTxt">數量</p>
                        <p class="itemNum">%[ pop_buy.num ]&nbsp;個</p>
                    </div>
                    <div class="totalBox">
                        <p class="totalTxt">共計</p>
                        <p class="totalNum">%[ pop_buy.total ]&nbsp;點</p>
                    </div>
                    <div class="btnBox">
                        <button class="close" @click="close()">取消</button>
                        <button class="buy" @click="buy( pop_buy.id , pop_buy.num)">購買</button>
                    </div>
                </div>
            </div>

            <div class="popB" v-if="popB == true">
                <b class="useInfo">使用說明</b>
                <ul>
                    <li>商品購買完成後，需至購物倉庫點選領取，才會發放至帳號內的郵件中。​</li>
                    <li>於購物倉庫領取商品，每次領取的最大數量為10個。</li>
                    <li>於購物倉庫領取物品後，系統將在30分鐘內發放至帳號內的郵件中。</li>
                    <li>商品購買後，購物倉庫的存放時間為30天，超過30天後即過期無法領取。</li>
                    <li>消費者進行消費時，請勿開啟多重視窗登入不同帳號進行消費，如因上述操作導致系統扣點異常，恕不進行補償。</li>
                    <li>商品在購買完成之後，將無法退換商品，或要求進行任何取消及變更。</li>
                    <li>部分商品有消耗或時效性設定，實際效果或限制依遊戲設定為主。</li>
                    <li>部分商品有購買條件限制，消費前請詳閱商品說明。</li>
                    <li>部分商品為機會中獎商品，消費者購買或參與活動不代表即可獲得特定商品。</li>
                    <li>購買前請務必確認消費帳號內已有角色，若因未創建角色導致該帳號無法正常取得商品，不予以補還點數或商品或其他等值商品。</li>
                    <li>《仙俠世界貳網頁商城》中所購買的商品皆為「不可交易」，選購前請務必再三確認。購買完成後不得要求更換為「可交易道具或其他商品」，亦不得要求更換為現金、點數或其他等值商品。</li>
                    <li>發現活動或領獎機制發生系統或其他異常，請於第一時間透過「 掘夢網線上客服中心 」進行回報，若逕行利用該異常取得非屬原活動機制應得之獎勵者，本公司有權終止其進行遊戲。</li>
                    <li>領取虛寶商品前，請確認郵件、背包是否有足夠空間；如因郵件、背包空間不足發生無法領取，或導致物品消失之情況，則不另作補償。</li>
                    <li>玩家使用《仙俠世界貳網頁商城》之同時，即同意接受本商城之活動辦法與使用說明之規範，如不同意或有違反，應視為無參加資格，或本公司得取消其使用資格，如因此有致生損害於本公司或其他任何第三人，本公司得向參加者請求損害賠償，參加者應負一切相關責任。
                    </li>
                    <li>掘夢網保留變更、取消或終止本活動的權利，包括但不限於本活動條款及活動辦法。</li>
                </ul>
            </div>

            <div class="popA" v-if="popA == true">
                <b class="msg">%[ isMsg ]</b>
                <button class="close" @click="close()">關閉</button>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/vue@3.2.4/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="/js/event/webmall/login.js?v10.41"></script>

</html>
